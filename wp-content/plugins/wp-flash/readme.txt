=== WP Flash & Ruffle ===
Contributors: CyberSEO
Author: CyberSEO
Author URI: http://www.cyberseo.net/
Donate link: http://www.cyberseo.net/donate/
Tags: flash, animation, swf
Requires at least: 5.6
Tested up to: 5.6
Stable tag: 3.3

Flash animation into WordPress blog posts, pages and RSS feeds. Both Adobe and Ruffle Flash players are supported. 

== Description ==

The WP-Flash & Ruffle plugin (developed by [CyberSEO.net](http://www.cyberseo.net/ "CyberSEO.net")) allows you to easily insert Adobe Flash animation into WordPress blog posts and pages. The plugin supports both [Adobe Flash Player](https://www.adobe.com/products/flashplayer.html "Adobe Flash Player") and [Ruffle Flash Player emulator](https://ruffle.rs/ "Ruffle Flash Player emulator"). 

Ruffle is a Flash Player emulator written in Rust. Ruffle runs natively on all modern operating systems as a standalone application, and on all modern browsers through the use of WebAssembly. Leveraging the safety of the modern browser sandbox and the memory safety guarantees of Rust, we can confidently avoid all the security pitfalls that Flash had a reputation for. Ruffle puts Flash back on the web, where it belongs - including iOS and Android!

Designed to be easy to use and install, users or website owners may install the web version of Ruffle and existing flash content will "just work", with no extra configuration required. Ruffle will detect all existing Flash content on a website and automatically "polyfill" it into a Ruffle player, allowing seamless and transparent upgrading of websites that still rely on Flash content.

Ruffle is an entirely open source project maintained by volunteers. We're all passionate about the preservation of internet history, and we were drawn to working on this project to help preserve the many websites and plethora of content that will no longer be accessible when users can no longer run the official Flash Player. If you would like to help support this project, we welcome all contributions of any kind - even if it's just playing some old games and seeing how well they run.


Use the following shortcode to insert Adobe Flash animation into your posts and pages:

`[swf:url width height bgcolor wmode]`


where:

* url - the URL of a SWF file (flash object);
* width - a width of the flash object;
* height - a height of the flash object;
* bgcolor - a background color (optional);
* wmode - wmode, e.g. transparent (optional).

== Installation ==

1. Upload 'wp-flash' to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= Where can I get support? =

https://wordpress.org/support/plugin/wp-flash/

== Screenshots ==

The plugin has no user interface.

== Changelog ==

= 3.3 =
* Ruffle Flash Player emulator now supported.

= 3.2 =
* Fully compatible with WordPress 5.6.

= 3.1 =
* Fully compatible with WordPress 5.2.

= 3.0 =
* Fully compatible with PHP 7.
* Fully compatible with WordPress 5.1.1. 

= 2.0 =
* Fully compatible with WordPress 5.0.1.

= 1.9 =
* Fully compatible with WordPress 4.9.7.

= 1.8 =
* Fully compatible with WordPress 4.9.1.

= 1.7 =
* Fully compatible with WordPress 4.9.

= 1.6 =
* Fully compatible with WordPress 4.7.

= 1.5 =
* Fully compatible with WordPress 4.1.1.

= 1.4 =
* Fully compatible with WordPress 4.1.

= 1.3 =
* Fully compatible with WordPress 4.0.1.

= 1.2 =
* The optional 'bgcolor' and 'wmode' parameters were added.

= 1.1 =
* Initial public release.

== Upgrade Notice ==

Upgrade using the automatic upgrade in WordPress Admin.