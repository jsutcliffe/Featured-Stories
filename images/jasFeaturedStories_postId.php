<?php
/*
	Plugin Name: JAS Featured Stories
	Plugin URI: n/a
	Description: A configurable banner
	Version: 0.1
	Author: Jonathan Sutcliffe
	Author URI: http://www.jonathansutcliffe.com
	License: GPL2

    Copyright 2010 Jonathan Sutcliffe (email : jonathan.a.sutcliffe@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
?>

<?php

/*
Expected functionality:
1) Ability to edit text and links
2) Ability to upload new background images
3) Ability to configure number of stories
4) Automation for most popular stories?
*/

### Function: Comment Navigation Option Menu
add_action('admin_menu', 'jasFeaturedStories_menu');
function jasFeaturedStories_menu() {
	if (function_exists('add_options_page')) {
		add_options_page(__('Featured Stories', 'jasFeaturedStories'), __('Featured Stories', 'jasFeaturedStories'), 'manage_options', 'jasFeaturedStories/jasFeaturedStories-options.php') ;
	}
}

### Function: Enqueue jasFeaturedStories Stylesheets
add_action('wp_print_styles', 'jasFeaturedStories_stylesheets');
function jasFeaturedStories_stylesheets() {
	if(@file_exists(TEMPLATEPATH.'/jasFeaturedStories.css')) {
		wp_enqueue_style('jasFeaturedStories', get_stylesheet_directory_uri().'/jasFeaturedStories.css', false, '1.10', 'all');		
	} else {
		wp_enqueue_style('jasFeaturedStories', plugins_url('jasFeaturedStories/jasFeaturedStories.css'), false, '1.10', 'all');
	}
}

### Function: Enqueue jasFeaturedStories Script
add_action('wp_print_scripts', 'jasFeaturedStories_scripts');
function jasFeaturedStories_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('jasFeaturedStories', plugins_url('jasFeaturedStories/jasFeaturedStories.js'), 'jquery');
}

add_action('admin_print_scripts', 'my_admin_scripts');
function my_admin_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
}

add_action('admin_print_styles', 'my_admin_styles');
function my_admin_styles() {
	wp_enqueue_style('thickbox');
}

function jasFeaturedStories() {
	$jasFeaturedStories_options = get_option('jasFeaturedStories_options');

//exploring an idea -- using just a postId for the majority of information
	$featuredStories = array("10","4","1");
	$storyCount = 0;
?>
<ul id="featured-stories">
<?php
	foreach ($featuredStories as $postId) {
		$post = get_post($postId);
		$title = $post->post_title;
		$excerpt = $post->post_excerpt;
		$link = get_permalink($postId);
		$storyCount++;
?>
	<li<?php if($storyCount == count($featuredStories)) echo(' class="last"'); ?>>
	    <!-- Begin Featured Box Panel -->
    	<div class="panel" style="background-image:url('/wp-content/themes/rockpapershotgun/images/hermann-120.jpg')">
        	<div class="text-container">
            	<h2><a href="<?php echo $link; ?>"><?php echo $title; ?></a></h2>
            	<p><?php echo $excerpt; ?> <a href="<?php echo $link; ?>">Read&nbsp;&rarr;</a></p>
            </div>
        </div>
        <!-- End Featured Box Panel -->
    </li>
<?php
	}
?>
</ul>
<?php
}
?>




