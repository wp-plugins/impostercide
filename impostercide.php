<?php
/*
Plugin Name: Impostercide
Plugin URI: http://code.ipstenu.org/impostercide/
Description: Impostercide prevents unauthenticated users from "signing" a comment with a registered users email address.
Version: 1.6
Author: Mika Epstein
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

if ( ($user_ID > 0) && ($comment_author_email == $user_email) ) {
        // It's a logged in user, so it's good.
        return $data;
}

// if we've made it this far, then we don't know who this commenter is.

// Let's get the login URL, we'll need this later
$the_login_url = get_bloginfo('url');
$the_login_url .= "/wp_login.php";

// a name was supplied, so let's check the login names
if ('' != $comment_author) {
        $result = $wpdb->get_var("SELECT count(ID) FROM $wpdb->users WHERE user_login='$comment_author'");
        if ($result > 0) {
			$bad_author = '<h2>Possible Imposter</h2> <p>The name you provided ('.$comment_author.') belongs to a registered user. Please <a href="'.$the_login_url.'">Login</a> to make your comment.</p>';
			wp_die( __( $bad_author), 'Error: Imposter Detected' );
        }
}

// an email was supplied, so let's see if we know about it
if ('' != $comment_author_email) {
        $result = $wpdb->get_var("SELECT count(ID) FROM $wpdb->users WHERE user_email='$comment_author_email'");
        if ($result > 0) {
			$bad_author_email = '<h2>Possible Imposter</h2> <p>The email address you provided ('.$comment_author_email.') belongs to a registered user. Please <a href="'.$the_login_url.'">Login</a> to make your comment.</p>';
			wp_die( __( $bad_author_email), 'Error: Imposter Detected' );
		}
}

// a URL was supplied, so let's check that
if ('' != $comment_author_url) {
        $result = $wpdb->get_var("SELECT count(ID) FROM $wpdb->users WHERE user_url='$comment_author_url'");
        if ($result > 0) {
			$bad_author_url = '<h2>Possible Imposter</h2> <p>The URL you provided ('.$comment_author_url.') belongs to a registered user. Please <a href="'.$the_login_url.'">Login</a> to make your comment.</p>';
			wp_die( __( $bad_author_url), 'Error: Imposter Detected' );
        }
}

return $data;
}
endif;

?>