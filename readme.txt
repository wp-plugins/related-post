=== Related Post ===
	Contributors: paratheme
	Donate link: http://paratheme.com
	Tags: related post
	Requires at least: 3.8
	Tested up to: 4.0
	Stable tag: 1.0
	License: GPLv2 or later
	License URI: http://www.gnu.org/licenses/gpl-2.0.html

	Display Related Post under post by tags and category.

== Description ==

Related Post allows you to display related post under post or other post type via short-code. 

How it is work ?
Related Post will display post list from same categories or tags match for post.

### Star Rating by http://paratheme.com


<strong>Plugin Features</strong><br />

* Responsive admin settings.
* Use via short-code.
* Use on archive(loop) or content.
* can use on single post.

N.B. We are working on this plugin making some fancy star rating.




== Installation ==

1. Install as regular WordPress plugin.<br />
2. Go your plugin setting via WordPress dashboard and find "<strong>Related Post</strong>" activate it.<br />

After activate plugin you will see "Star Rating" menu at left side on WordPress dashboard.<br />

short-code inside content for fixed post id you can use anywhere inside content.

`[related_post themes="flat"]`

Short-code inside loop by dynamic post id you can use anywhere inside loop on .php files.

`<?php
echo do_shortcode( '[related_post themes="flat" id="'.get_the_ID().'"]' ); 
?>`

`Themes: text, flat`

== Screenshots ==

1. screenshot-1


== Changelog ==

	= 1.0 =
	
    * 09/11/2014 Initial release.
