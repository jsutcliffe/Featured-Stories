<?php
/*
	Plugin Name: JAS Featured Stories 2
	Plugin URI: n/a
	Description: A configurable banner
	Version: 0.2
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
		add_options_page(__('Featured Stories v2', 'jasFeaturedStories'), __('Featured Stories v2', 'jasFeaturedStories'), 'manage_options', 'jasFeaturedStories/jasFeaturedStories-options.php') ;
	}
}

### Function: Enqueue jasFeaturedStoriesStylesheets
add_action('wp_print_styles', 'jasFeaturedStories_stylesheets');
function jasFeaturedStories_stylesheets() {
	if(@file_exists(TEMPLATEPATH.'/jasFeaturedStories.css')) {
		wp_enqueue_style('jasFeaturedStories', get_stylesheet_directory_uri().'/jasFeaturedStories.css', false, '1.10', 'all');		
	} else {
		wp_enqueue_style('jasFeaturedStories', plugins_url('jasFeaturedStories/jasFeaturedStories.css'), false, '1.10', 'all');
	}
}

### Function: Enqueue jasFeaturedStoriesScript
add_action('wp_print_scripts', 'jasFeaturedStories_scripts');
function jasFeaturedStories_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('jasFeaturedStories', plugins_url('jasFeaturedStories/jasFeaturedStories.js'), 'jquery');
}

add_action('admin_print_scripts', 'jasfs_admin_scripts');
function jasfs_admin_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('jasFeaturedStories', plugins_url('jasFeaturedStories/jasFeaturedStories-options.js'), 'jquery');
}

add_action('admin_print_styles', 'jasfs_admin_styles');
function jasfs_admin_styles() {
	wp_enqueue_style('jasFeaturedStories', plugins_url('jasFeaturedStories/jasFeaturedStories-options.css'));
}

function jasFeaturedStories() {
	$jasFeaturedStories_options = get_option('jasFeaturedStories_options');
	
	//preview mode, showing the saved options and not the published options
	$pub = '';
	if(isset($_GET['jasFeaturedStoriesPreview'])) {
	    if(!$_GET['jasFeaturedStoriesPreview']) $pub = '_pub';
	}
?>

<div id="featured-stories-wrapper">
<input type="hidden" id="featured-stories-cycle-time" value="<?php echo $jasFeaturedStories_options['cycle_time'.$pub] ?>" />
<ul id="featured-stories" <?php if($jasFeaturedStories_options['scroll'.$pub] == 'on') echo 'class="jasFeaturedStoriesScroll"' ?>>
	<?php
		$prim = false;
		$sec = false;
		$tert = false;

		$url = $jasFeaturedStories_options['story1_link'.$pub];
		$postId = url_to_postid($url);
		$post = get_post($postId);
		$title = stripslashes(stripslashes($jasFeaturedStories_options['story1_headline'.$pub]));
		
		if(strlen($title) == 0) {
			$title = $post->post_title;
		}
		$abstract = stripslashes(stripslashes($jasFeaturedStories_options['story1_abstract'.$pub]));
		
		$size = '&w=214&h=120';
		if($jasFeaturedStories_options['story1_primary'] == true) {
			$class = 'primary';
			$size = '&w=428&h=241';
			if(!$prim) {
				$class = 'primary current';
				$prim = true;
			}
		} elseif (!$sec) {
			$class = 'secondary';
			$sec = true;
		} elseif(!tert) {
			$class = 'tertiary';
			$tert = true;
		}
		
		$imagesrc = '';
		if(strlen($jasFeaturedStories_options['story1_imageUrl']) > 0) {
			$imagesrc = $jasFeaturedStories_options['story1_imageUrl'];
		} else {
			if(function_exists('catch_that_image')) {
				$imagesrc = catch_that_image($post);
			}
		}
	?>
	<li class="<?php echo $class; ?>" id="story1">
    	
        <a class="panel" href="<?php echo $url; ?>" style="background-image:url('<?php bloginfo('template_directory'); ?>/timthumb/timthumb.php?src=<?php echo $imagesrc . $size ?>&zc=1');">
        	<div class="text-container">
            	<h2><?php echo $title; ?></h2>
            	<p><?php echo $abstract; ?></p>
            </div>
        </a>
        <!-- End Featured Box Panel -->
    </li>
    <?php
		$url = $jasFeaturedStories_options['story2_link'.$pub];
		$postId = url_to_postid($url);
		$post = get_post($postId);
		$title = stripslashes(stripslashes($jasFeaturedStories_options['story2_headline'.$pub]));
		if(strlen($title) == 0) {
			$title = $post->post_title;
		}
		$abstract = stripslashes(stripslashes($jasFeaturedStories_options['story2_abstract'.$pub]));
		
		$size = '&w=214&h=120';
		if($jasFeaturedStories_options['story2_primary'] == true) {
			$class = 'primary';
			$size = '&w=428&h=241';
			if(!$prim) {
				$class = 'primary current';
				$prim = true;
			}
		} elseif (!$sec) {
			$class = 'secondary';
			$sec = true;
		} else {
			$class = 'tertiary';
			$tert = true;
		}
		
		$imagesrc = '';
		if(strlen($jasFeaturedStories_options['story2_imageUrl']) > 0) {
			$imagesrc = $jasFeaturedStories_options['story2_imageUrl'];
		} else {
			if(function_exists('catch_that_image')) {
				$imagesrc = catch_that_image($post);
			}
		}
	?>
    <li class="<?php echo $class; ?>" id="story2">
        <a class="panel" href="<?php echo $url; ?>" style="background-image:url('<?php bloginfo('template_directory'); ?>/timthumb/timthumb.php?src=<?php echo $imagesrc . $size ?>&zc=1');">
        	<div class="text-container">
            	<h2><?php echo $title; ?></h2>
            	<p><?php echo $abstract; ?></p>
            </div>
        </a>
        <!-- End Featured Box Panel -->
    </li>
    <?php
		$url = $jasFeaturedStories_options['story3_link'.$pub];
		$postId = url_to_postid($url);
		$post = get_post($postId);
		$title = stripslashes(stripslashes($jasFeaturedStories_options['story3_headline'.$pub]));
		if(strlen($title) == 0) {
			$title = $post->post_title;
		}
		$abstract = stripslashes(stripslashes($jasFeaturedStories_options['story3_abstract'.$pub]));
		
		$size = '&w=214&h=120';
		if($jasFeaturedStories_options['story3_primary'] == true) {
			$class = 'primary';
			$size = '&w=428&h=241';
			if(!$prim) {
				$class = 'primary current';
				$prim = true;
			}
		} elseif (!$sec) {
			$class = 'secondary';
			$sec = true;
		} else {
			$class = 'tertiary';
			$tert = true;
		}
		
		$imagesrc = '';
		if(strlen($jasFeaturedStories_options['story3_imageUrl']) > 0) {
			$imagesrc = $jasFeaturedStories_options['story3_imageUrl'];
		} else {
			if(function_exists('catch_that_image')) {
				$imagesrc = catch_that_image($post);
			}
		}
	?>
    <li class="<?php echo $class; ?>" id="story3">
        <a class="panel" href="<?php echo $url; ?>" style="background-image:url('<?php bloginfo('template_directory'); ?>/timthumb/timthumb.php?src=<?php echo $imagesrc . $size ?>&zc=1');">
        	<div class="text-container">
            	<h2><?php echo $title; ?></h2>
            	<p><?php echo $abstract; ?></p>
            </div>
        </a>
        <!-- End Featured Box Panel -->
    </li>
    <?php
		$url = $jasFeaturedStories_options['story4_link'.$pub];
		$postId = url_to_postid($url);
		$post = get_post($postId);
		$title = stripslashes(stripslashes($jasFeaturedStories_options['story4_headline'.$pub]));
		if(strlen($title) == 0) {
			$title = $post->post_title;
		}
		$abstract = stripslashes(stripslashes($jasFeaturedStories_options['story4_abstract'.$pub]));
		
		$size = '&w=214&h=120';
		if($jasFeaturedStories_options['story4_primary'] == true) {
			$class = 'primary';
			$size = '&w=428&h=241';
			if(!$prim) {
				$class = 'primary current';
				$prim = true;
			}
		} elseif (!$sec) {
			$class = 'secondary';
			$sec = true;
		} else {
			$class = 'tertiary';
			$tert = true;
		}
		
		$imagesrc = '';
		if(strlen($jasFeaturedStories_options['story4_imageUrl']) > 0) {
			$imagesrc = $jasFeaturedStories_options['story4_imageUrl'];
		} else {
			if(function_exists('catch_that_image')) {
				$imagesrc = catch_that_image($post);
			}
		}
	?>
    <li class="<?php echo $class; ?>" id="story4">
        <a class="panel" href="<?php echo $url; ?>" style="background-image:url('<?php bloginfo('template_directory'); ?>/timthumb/timthumb.php?src=<?php echo $imagesrc . $size ?>&zc=1');">
        	<div class="text-container">
            	<h2><?php echo $title; ?></h2>
            	<p><?php echo $abstract; ?></p>
            </div>
        </a>
        <!-- End Featured Box Panel -->
    </li>
    <?php
		$url = $jasFeaturedStories_options['story5_link'.$pub];
		$postId = url_to_postid($url);
		$post = get_post($postId);
		$title = stripslashes(stripslashes($jasFeaturedStories_options['story5_headline'.$pub]));
		if(strlen($title) == 0) {
			$title = $post->post_title;
		}
		$abstract = stripslashes(stripslashes($jasFeaturedStories_options['story5_abstract'.$pub]));
		
		$size = '&w=214&h=120';
		if($jasFeaturedStories_options['story5_primary'] == true) {
			$class = 'primary';
			$size = '&w=428&h=241';
			if(!$prim) {
				$class = 'primary current';
				$prim = true;
			}
		} elseif (!$sec) {
			$class = 'secondary';
			$sec = true;
		} else {
			$class = 'tertiary';
			$tert = true;
		}
		
		$imagesrc = '';
		if(strlen($jasFeaturedStories_options['story5_imageUrl']) > 0) {
			$imagesrc = $jasFeaturedStories_options['story5_imageUrl'];
		} else {
			if(function_exists('catch_that_image')) {
				$imagesrc = catch_that_image($post);
			}
		}
	?>
    <li class="<?php echo $class; ?>" id="story5">
        <a class="panel" href="<?php echo $url; ?>" style="background-image:url('<?php bloginfo('template_directory'); ?>/timthumb/timthumb.php?src=<?php echo $imagesrc . $size ?>&zc=1');">
        	<div class="text-container">
            	<h2><?php echo $title; ?></h2>
            	<p><?php echo $abstract; ?></p>
            </div>
        </a>
        <!-- End Featured Box Panel -->
    </li>
</ul>
</div>

<?php
}
?>