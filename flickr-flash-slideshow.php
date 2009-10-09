<?php
/*
Plugin Name: Flickr Slideshow
Plugin URI: http://www.pezholio.co.uk/flickr-slideshow
Description: Adds a Flickr Slideshow to a Wordpress post or page
Version: 1.0
Author: Stuart Harrison
Author URI: http://www.pezholio.co.uk

-----------------------------------------------------
Copyright 2009  Stuart Harrison  (email : pezholio@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
-----------------------------------------------------

See readme file for change-logs.
*/

function flickr_slideshow($text){
	$regex = '#\[flickr]((?:[^\[]|\[(?!/?flickr])|(?R))+)\[/flickr]#';
	if (is_array($text)) {
		//Read the Width/Height Parameters, if given
	    $param = explode(",", $text[1]);
		$others = "";
		if(isset($param[1]) && is_numeric($param[1])){
			$others = ' width="' .trim($param[1]) . '"';
		} else {
			$others = ' width="300"';
		}
		if(isset($param[2]) && is_numeric($param[2])){
			$others .= ' height="' .trim($param[2]) . '"';
		} else {
			$others = ' height="300"';
		}
		
		$photos = strpos($param[0], "photos");
		$sets = strpos($param[0], "sets");
		$groups = strpos($param[0], "groups");
		
		if ($photos !== false && $sets === false) {
		$id = rtrim(substr($param[0], $photos), "/");
		$id = str_replace("photos/", "", $id);
		$url = "http://www.flickr.com/slideShow/index.gne?user_id=". $id;
		} elseif ($sets !== false) {
		$id = rtrim(substr($param[0], $sets), "/");
		$id = str_replace("sets/", "", $id);
		$url = "http://www.flickr.com/slideShow/index.gne?set_id=". $id;
		} elseif ($groups !== false) {
		$id = rtrim(substr($param[0], $groups), "/");
		$id = str_replace("groups/", "", $id);
		$url = "http://www.flickr.com/slideShow/index.gne?group_id=". $id;
		}
		
		//generate the IFRAME tag
        $text = '<iframe align="center" src="'.$url.'" '.$others.' frameBorder="0" scrolling="no"></iframe>';
    }
	return preg_replace_callback($regex, 'flickr_slideshow', $text);
}

add_filter('the_content', 'flickr_slideshow');
?>