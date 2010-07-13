=== Impostercide ===
Tags: comments, spoof, imposter
Contributors: skippy, ipstenu
Requires at least: 2.1
Tested up to: 3.0
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=5227973
Stable tag: 1.6

Impostercide prevents unauthenticated users from "signing" a comment with a registered users email addrress.

== Description ==

**This was written by Scott Merrill, AKA Skippy, who left the WordPress project in 2007.  After rescuing this plugin, I began to use it on a couple sites, and decided to take care of it as best I could. I take no credit for the coolness.**

Impostercide prevents unauthenticated users from "signing" a comment with a registered users email address, name or URL.

==Changelog==

** version 1.6 **

* Re-released under GPL (per http://skippy.net/wordpress-plugins-discontinued#comment-8300 )
* Replaced `die()` with `wp_die()`
* Changed formatting to look 'pretty'

** Version 1.5 **

* Initial version by Ipstenu. All I did was change commenting and move it to a subfolder.

** Version 1 **

* Impostercide Copyright (c) 2005 Scott Merrill (skippy@skippy.net), discontinued in 2007.
* many thanks to Mark Jaquith for the name "Impostercide"

== Installation ==

** WordPress Single Site **

1. Unpack the *.zip file and extract the `/impostercide/` folder and the files.
2. Using an FTP program, upload the full `/impostercide/` folder to your WordPress plugins directory (i.e: `/wp-content/plugins/impostercide/`).
3. Go to Plugins > Installed and activate the plugin.

** WordPress MultiSite **

I strongly recommend that you use this as MUST USE only.

1. Unpack the *.zip file and extract the `/impostercide/` folder and the files.
2. Using an FTP program, copy ONLY `impostercide.php` file to your WordPress Must Use plugins directory (i.e: `/wp-content/mu-plugins/impostercide.php`).

== Frequently Asked Questions ==

= Will this work on older versions of WordPress? =

Yes.

= Will this work on MultiSite? =

Again, yes.  I suggest putting it in `mu-plugins`, but it works fine both ways.

== Screenshots ==
1. Error message when you try and post as a registered user