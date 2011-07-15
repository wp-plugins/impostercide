=== Impostercide ===
Contributors: Ipstenu, skippy
Tags: comments, spoof, imposter, multisite, wpmu
Requires at least: 2.1
Tested up to: 3.2.1
Stable tag: 1.6.1
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=5227973

Impostercide prevents unauthenticated users from "signing" a comment with a registered users email addrress.

== Description ==

Impostercide prevents unauthenticated users from "signing" a comment with a registered users email address, name or URL.  There is no interface from the admin's end, no options to select.  Simply install, turn it on, and watch the spammers get stopped.

**Misc**

* [Donate](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=5227973)
* [Plugin Site](http://code.ipstenu.org/impostercide/)

==Changelog==

**Version 1.6.1**

* Switched logged in check to is_user_logged_in()  (thanks Chip!)
* Genericized the error message (again, Chip)

**Version 1.6**

* Re-released under GPL (per http://skippy.net/wordpress-plugins-discontinued#comment-8300 )
* Replaced `die()` with `wp_die()`
* Changed formatting to look 'pretty'

**Version 1.5**

* Initial version by Ipstenu. All I did was change commenting and move it to a subfolder. (This was only ever released on my websites)

**Version 1**

* Impostercide Copyright (c) 2005 Scott Merrill (skippy@skippy.net), discontinued in 2007.
* many thanks to Mark Jaquith for the name "Impostercide"

== Installation ==

**WordPress Single Site**

1. Unpack the *.zip file and extract the `/impostercide/` folder and the files.
2. Using an FTP program, upload the full `/impostercide/` folder to your WordPress plugins directory (i.e: `/wp-content/plugins/impostercide/`).
3. Go to Plugins > Installed and activate the plugin.

**WordPress MultiSite**

I strongly recommend that you use this as MUST USE only.

1. Unpack the *.zip file and extract the `/impostercide/` folder and the files.
2. Using an FTP program, copy ONLY `impostercide.php` file to your WordPress Must Use plugins directory (i.e: `/wp-content/mu-plugins/impostercide.php`).

== Frequently Asked Questions ==

= Will this work on older versions of WordPress? =

This will work on WordPress from version 2.1 and up.

= Will this work on MultiSite? =

Again, yes.  I suggest putting it in `mu-plugins`, but it works fine both ways.

= Can this catch innocents? =

Yes, but ... well. The only person I've caught is someone who is, apparently, pathalogically incapable of remembering that he HAS an account on the site, and he needs to LOG IN with said account. He also claims to forget his password and that WordPress doesn't email it to him, so I'm pretty much chucking his complaint as a problem with the user, and not the tool.


== Screenshots ==
1. Error message when you try and post as a registered user
