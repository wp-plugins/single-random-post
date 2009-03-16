<?php
/*
Plugin Name: Single Random Post
Plugin URI: http://isthisablog.com
Description: This plugin will allow you to display a single post selected at random from your post database
Version: 1.02
Author: Daniel Costalis
Author URI: http://isthisablog.com
*/
/*  Copyright 2009  Daniel Costalis  (email : dcostalis@gmail.com)

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
					    */
					    function single_random_post() {
					    global $wpdb;
					    $query = "SELECT id, post_title, post_name FROM $wpdb->posts WHERE ((post_status='publish') AND (post_type = 'post') AND ($wpdb->posts.post_password = '')) ORDER BY RAND() LIMIT 1";
					    $randompost = $wpdb->get_results($query);
					    $post = $randompost[0];
					    $post_title = htmlspecialchars(stripslashes($post->post_title));
					    $showpost .= "<a href=\"" . get_permalink($post->id) . "\" title=\"". $post_title ."\">" . $post_title ."</a>\n";
					    echo $showpost;	
					    }

