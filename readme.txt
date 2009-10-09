=== Flickr Flash Slideshow ===
Contributors: Pezholio
Tags: flickr,slideshow,flash,flickrslideshow,flickrflashslideshow
Requires at least: 2.3
Tested up to: 2.8.4
Stable tag: 1.0

Flickr flash slideshow can display a standard Flickr Flash slideshow for a user, set or group inside an iFrame

== Description ==
This simple plugin allows users who use the visual editor to be able to display a Flickr slideshow for a user, set or group by simply placing the url in between [flickr][/flickr] tags.

== Installation ==

1. Download and unzip flickr-sideshow.zip 
2. Upload the folder containing `slickr-slideshow.php` to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. To add a slideshow to any post or page just add the markup `[flickr]url,width,height[/flickr]` (without quotes) (where 'url' is the page address of the user, set or group). If no width or height is given, the slideshow defaults to 300px x 300px. 
5. Currently only group ids are supported (i.e. in the format xxxxxx@xx) - if a group has been given a custom name, the slideshow will not work - I'm looking to fix this in future updates.

== Changelog ==

*	**1.0**: Initial public release.