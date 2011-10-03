<?php
/*
Plugin Name: Impostercide
Plugin URI: http://tech.ipstenu.org/my-plugins/impostercide/
Description: Impostercide prevents unauthenticated users from "signing" a comment with a registered users email address.
Version: 1.7
Author: Mika Epstein, Scott Merrill
Author URI: http://www.ipstenu.org/

Copyright 2005-07 Scott Merrill (skippy@skippy.net)
Copyright 2010-11 Mika Epstein (email: ipstenu@ipstenu.org)

    This file is part of Impostercide, a plugin for WordPress.

    Impostercide is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 2 of the License, or
    (at your option) any later version.

    Impostercide is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with WordPress.  If not, see <http://www.gnu.org/licenses/>.
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

$imposter_message = '<h2>Possible Imposter</h2> <p>You are attempting to post a comment with information (i.e. email address or login ID) belonging to a registered user. If you have an account on this site, please login to make your comment. Otherwise, please try again with different information.</p>';

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

return $data;
}
endif;

?>