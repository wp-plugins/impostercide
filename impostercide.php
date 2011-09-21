<?php
/*
Plugin Name: Impostercide
Plugin URI: http://tech.ipstenu.org/my-plugins/impostercide/
Description: Impostercide prevents unauthenticated users from "signing" a comment with a registered users email address.
Version: 1.6.1
Author: Mika Epstein, Scott Merrill
Author URI: http://www.ipstenu.org/

Impostercide Copyright (c) 2005 Scott Merrill (skippy@skippy.net)
Taken over in 2010 by Mika Epstein (ipstenu@ipstenu.org) under GPL provisons

        This plugin is free software; you can redistribute it and/or modify
        it under the terms of the GNU General Public License as published by
        the Free Software Foundation; either version 2 of the License, or
        (at your option) any later version.

        This plugin is distributed in the hope that it will be useful,
        but WITHOUT ANY WARRANTY; without even the implied warranty of
        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
        GNU General Public License for more details.

*/

add_filter ('preprocess_comment', 'sdm_protect_email');

if (! function_exists ('sdm_protect_email')) :
function sdm_protect_email ($data) {
global $wpdb, $user_ID, $user_login, $user_email;

extract ($data);

if ('' != $comment_type) {
        // it's a pingback or trackback, let it through
        return $data;
}

get_currentuserinfo();

if ( is_user_logged_in() ) {
        // It's a logged in user, so it's good.
        return $data;
}

// if we've made it this far, then we don't know who this commenter is.

// Let's get the login URL, we'll need this later
$the_login_url = get_bloginfo('url');
$the_login_url .= "/wp_login.php";

$imposter_message = '<h2>Possible Imposter</h2> <p>You are attempting to post a comment with information (i.e. email, login ID or website URL) belonging to a registered user. If you have an account, please <a href="'.$the_login_url.'">Login</a> to make your comment. Otherwise, please try again with different information.</p>';

// a name was supplied, so let's check the login names
if ('' != $comment_author) {
        $result = $wpdb->get_var("SELECT count(ID) FROM $wpdb->users WHERE user_login='$comment_author'");
        if ($result > 0) {
			wp_die( __( $imposter_message), 'Error: Imposter Detected' );
        }
}

// an email was supplied, so let's see if we know about it
if ('' != $comment_author_email) {
        $result = $wpdb->get_var("SELECT count(ID) FROM $wpdb->users WHERE user_email='$comment_author_email'");
        if ($result > 0) {
			wp_die( __( $imposter_message), 'Error: Imposter Detected' );
		}
}

// a URL was supplied, so let's check that
if ('' != $comment_author_url) {
        $result = $wpdb->get_var("SELECT count(ID) FROM $wpdb->users WHERE user_url='$comment_author_url'");
        if ($result > 0) {
			wp_die( __( $imposter_message), 'Error: Imposter Detected' );
        }
}

return $data;
}
endif;

?>