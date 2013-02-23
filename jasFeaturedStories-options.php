<?php
### Variables Variables Variables
$base_name = plugin_basename('jasFeaturedStories/jasFeaturedStories-options.php');
$base_page = 'admin.php?page='.$base_name;
if(isset($_GET['mode'])) $mode = trim($_GET['mode']);
$jasFeaturedStories_settings = array('jasFeaturedStories_options');

### get options
$jasFeaturedStories_options = get_option('jasFeaturedStories_options');

$optionsArray = array('story1_headline','story1_abstract','story1_link','story1_imageUrl','story1_primary',
					  'story2_headline','story2_abstract','story2_link','story2_imageUrl','story2_primary',
					  'story3_headline','story3_abstract','story3_link','story3_imageUrl','story3_primary',
					  'story4_headline','story4_abstract','story4_link','story4_imageUrl','story4_primary',
					  'story5_headline','story5_abstract','story5_link','story5_imageUrl','story5_primary',
					  'cycle_time'.'scroll');

foreach($optionsArray as $option) {
	if(!isset($jasFeaturedStories_options[$option])) {
		$jasFeaturedStories_options[$option] = '';
	}
	if(!isset($jasFeaturedStories_options[$option.'_pub'])) {
		$jasFeaturedStories_options[$option.'_pub'] = '';
	}
	$update_jasFeaturedStories_queries[] = update_option('jasFeaturedStories_options', $jasFeaturedStories_options);
}

### Form Processing 
// Update Options
if(!empty($_POST['Save']) || !empty($_POST['Publish'])) {
	if (!isset($jasFeaturedStories_options)) $jasFeaturedStories_options = array();

	//save changes
	$jasFeaturedStories_options['story1_headline'] = addslashes($_POST['jasFeaturedStories_story1_headline']);
	$jasFeaturedStories_options['story1_abstract'] = addslashes($_POST['jasFeaturedStories_story1_abstract']);
	$jasFeaturedStories_options['story1_link'] = addslashes($_POST['jasFeaturedStories_story1_link']);
	$jasFeaturedStories_options['story1_imageUrl'] = addslashes($_POST['jasFeaturedStories_story1_imageUrl']);
	$jasFeaturedStories_options['story1_primary'] = $_POST['jasFeaturedStories_story1_primary'];

	$jasFeaturedStories_options['story2_headline'] = addslashes($_POST['jasFeaturedStories_story2_headline']);
	$jasFeaturedStories_options['story2_abstract'] = addslashes($_POST['jasFeaturedStories_story2_abstract']);
	$jasFeaturedStories_options['story2_link'] = addslashes($_POST['jasFeaturedStories_story2_link']);
	$jasFeaturedStories_options['story2_imageUrl'] = addslashes($_POST['jasFeaturedStories_story2_imageUrl']);
	$jasFeaturedStories_options['story2_primary'] = $_POST['jasFeaturedStories_story2_primary'];

	$jasFeaturedStories_options['story3_headline'] = addslashes($_POST['jasFeaturedStories_story3_headline']);
	$jasFeaturedStories_options['story3_abstract'] = addslashes($_POST['jasFeaturedStories_story3_abstract']);
	$jasFeaturedStories_options['story3_link'] = addslashes($_POST['jasFeaturedStories_story3_link']);
	$jasFeaturedStories_options['story3_imageUrl'] = addslashes($_POST['jasFeaturedStories_story3_imageUrl']);
	$jasFeaturedStories_options['story3_primary'] = $_POST['jasFeaturedStories_story3_primary'];
	
	$jasFeaturedStories_options['story4_headline'] = addslashes($_POST['jasFeaturedStories_story4_headline']);
	$jasFeaturedStories_options['story4_abstract'] = addslashes($_POST['jasFeaturedStories_story4_abstract']);
	$jasFeaturedStories_options['story4_link'] = addslashes($_POST['jasFeaturedStories_story4_link']);
	$jasFeaturedStories_options['story4_imageUrl'] = addslashes($_POST['jasFeaturedStories_story4_imageUrl']);
	$jasFeaturedStories_options['story4_primary'] = $_POST['jasFeaturedStories_story4_primary'];
	
	$jasFeaturedStories_options['story5_headline'] = addslashes($_POST['jasFeaturedStories_story5_headline']);
	$jasFeaturedStories_options['story5_abstract'] = addslashes($_POST['jasFeaturedStories_story5_abstract']);
	$jasFeaturedStories_options['story5_link'] = addslashes($_POST['jasFeaturedStories_story5_link']);
	$jasFeaturedStories_options['story5_imageUrl'] = addslashes($_POST['jasFeaturedStories_story5_imageUrl']);
	$jasFeaturedStories_options['story5_primary'] = $_POST['jasFeaturedStories_story5_primary'];

	
	$jasFeaturedStories_options['cycle_time'] = $_POST['jasFeaturedStories_cycle_time'];
	$jasFeaturedStories_options['scroll'] = $_POST['jasFeaturedStories_scroll'];
	$updatedPublished = 'updated';

	if (!empty($_POST['Publish'])) {
		//update published items
		$jasFeaturedStories_options['story1_headline_pub'] = $jasFeaturedStories_options['story1_headline'];
		$jasFeaturedStories_options['story1_abstract_pub'] = $jasFeaturedStories_options['story1_abstract'];
		$jasFeaturedStories_options['story1_link_pub'] = $jasFeaturedStories_options['story1_link'];
		$jasFeaturedStories_options['story1_imageUrl_pub'] = $jasFeaturedStories_options['story1_imageUrl'];
		$jasFeaturedStories_options['story1_primary_pub'] = $jasFeaturedStories_options['story1_primary'];

		$jasFeaturedStories_options['story2_headline_pub'] = $jasFeaturedStories_options['story2_headline'];
		$jasFeaturedStories_options['story2_abstract_pub'] = $jasFeaturedStories_options['story2_abstract'];
		$jasFeaturedStories_options['story2_link_pub'] = $jasFeaturedStories_options['story2_link'];
		$jasFeaturedStories_options['story2_imageUrl_pub'] = $jasFeaturedStories_options['story2_imageUrl'];
		$jasFeaturedStories_options['story2_primary_pub'] = $jasFeaturedStories_options['story2_primary'];

		$jasFeaturedStories_options['story3_headline_pub'] = $jasFeaturedStories_options['story3_headline'];
		$jasFeaturedStories_options['story3_abstract_pub'] = $jasFeaturedStories_options['story3_abstract'];
		$jasFeaturedStories_options['story3_link_pub'] = $jasFeaturedStories_options['story3_link'];
		$jasFeaturedStories_options['story3_imageUrl_pub'] = $jasFeaturedStories_options['story3_imageUrl'];
		$jasFeaturedStories_options['story3_primary_pub'] = $jasFeaturedStories_options['story3_primary'];
		
		$jasFeaturedStories_options['story4_headline_pub'] = $jasFeaturedStories_options['story4_headline'];
		$jasFeaturedStories_options['story4_abstract_pub'] = $jasFeaturedStories_options['story4_abstract'];
		$jasFeaturedStories_options['story4_link_pub'] = $jasFeaturedStories_options['story4_link'];
		$jasFeaturedStories_options['story4_imageUrl_pub'] = $jasFeaturedStories_options['story4_imageUrl'];
		$jasFeaturedStories_options['story4_primary_pub'] = $jasFeaturedStories_options['story4_primary'];
		
		$jasFeaturedStories_options['story5_headline_pub'] = $jasFeaturedStories_options['story5_headline'];
		$jasFeaturedStories_options['story5_abstract_pub'] = $jasFeaturedStories_options['story5_abstract'];
		$jasFeaturedStories_options['story5_link_pub'] = $jasFeaturedStories_options['story5_link'];
		$jasFeaturedStories_options['story5_imageUrl_pub'] = $jasFeaturedStories_options['story5_imageUrl'];
		$jasFeaturedStories_options['story5_primary_pub'] = $jasFeaturedStories_options['story5_primary'];

		$jasFeaturedStories_options['cycle_time_pub'] = $_POST['jasFeaturedStories_cycle_time'];
		$jasFeaturedStories_options['scroll_pub'] = $_POST['jasFeaturedStories_scroll'];
		$updatedPublished = 'published';
	}

	$update_jasFeaturedStories_queries = array();
	$update_jasFeaturedStories_text = array();
	$update_jasFeaturedStories_queries[] = update_option('jasFeaturedStories_options', $jasFeaturedStories_options);
	$update_jasFeaturedStories_text[] = __('Featured Stories options', 'jasFeaturedStories');
	$i = 0;
	$text = '';
	foreach($update_jasFeaturedStories_queries as $update_jasFeaturedStories_query) {
		if($update_jasFeaturedStories_query) {
			$text .= '<font color="green">'.$update_jasFeaturedStories_text[$i].' '.__($updatedPublished, 'jasFeaturedStories').'</font><br />';
		}
		$i++;
	}
	if(empty($text)) {
		$text = '<font color="red">'.__('No Featured Stories options ' . $updatedPublished, 'jasFeaturedStories').'</font>';
	}
}

### create drop-down list of latest 50 posts
$args = array('post_type' => 'post', 'numberposts' => 50);
$posts = get_posts($args);
function ddlRecentPosts($story) {
	global $jasFeaturedStories_options, $posts;

	$html = 'Post: ';
	$html .= '<select onchange="document.getElementById(this.getAttribute(\'name\').replace(\'_post\',\'_link\')).setAttribute(\'value\',this.value)" name="jasFeaturedStories_' . $story . '_post">';
	$html .= "<option value='NO-LINK-SET'>Select post</option>";
	foreach ($posts as $post){
		$post_link = get_permalink($post->ID);
				
		if ($jasFeaturedStories_options[$story . '_link'] == get_permalink($post->ID)) {
			$html .= "<option selected='selected' value='{$post_link}'>";
		} else {
			$html .= "<option value='{$post_link}'>";
		}
		
		$html .= "{$post->post_title}</option>";
	}	
	$html .= '</select><br />';
	echo $html;

	$tags = get_tags();
	$html = 'Or tag: ';
	$html .= '<select name="jasFeaturedStories_' . $story . '_tag">';
	//onchange="document.getElementById(this.getAttribute(\'name\').replace(\'_tag\',\'_link\')).setAttribute(\'value\',this.value)"
	$html .= "<option value='NO-LINK-SET'>Select tag</option>";
	foreach (get_tags() as $tag){
		$tag_link = get_tag_link($tag->term_id);

		if ($jasFeaturedStories_options[$story . '_link'] == $tag_link) {
			$html .= "<option selected='selected' value='{$tag_link}'>";
		} else {
			$html .= "<option value='{$tag_link}'>";
		}

		$html .= "{$tag->name}</option>";
	}	
	$html .= '</select><br />';
	echo $html;
	?>
	
	Or custom link: <input id="jasFeaturedStories_<?php echo $story; ?>_link" class="link" name="jasFeaturedStories_<?php echo $story; ?>_link" type="text" value="<?php echo $jasFeaturedStories_options[$story . '_link'] ?>" size="50" />

	<?php
}
?>

<?php if(!empty($text)) { echo '<!-- Last Action --><div id="message" class="updated fade"><p>'.$text.'</p></div>'; } ?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo plugin_basename(__FILE__); ?>" enctype="multipart/form-data">
<div class="wrap"> 
	<?php screen_icon(); ?>
	<h2><?php _e('Featured Stories Options', 'jasFeaturedStories'); ?></h2>
	
	<input type="hidden" id="blog-url" value="<?php echo get_bloginfo( 'url' ); ?>"/> 

<?php
$slugs = array('story1', 'story2', 'story3', 'story4', 'story5');
foreach($slugs as $story) {
	switch($story) {
		case 'story1':
			$heading = 'First box story';
			break;
		case 'story2':
			$heading = 'Second box story';
			break;
		case 'story3':
			$heading = 'Third box story';
			break;
		case 'story4':
			$heading = 'Fourth box story';
			break;
		case 'story5':
			$heading = 'Fifth box story';
			break;
		default:
			$heading = 'Story';
			break;
	}
?>
	<div class="jasFeaturedStoriesBlock<?php if($story == 'story1') echo ' first'; ?>">
		<h3><?php _e($heading, 'jasFeaturedStories'); ?></h3>
		<table class="form-table">
			<tr>
				<th scope="row" valign="top"><?php _e('Headline override', 'jasFeaturedStories'); ?></th>
				<td>
					<input type="text" name="jasFeaturedStories_<?php echo $story; ?>_headline" value="<?php echo stripslashes(stripslashes($jasFeaturedStories_options[$story . '_headline'])); ?>" size="50" /> (if left blank will use the post's title)
				</td>
			</tr>
			<tr>
				<th scope="row" valign="top"><?php _e('Abstract', 'jasFeaturedStories'); ?></th>
				<td>
					<textarea cols="40" rows="5" name="jasFeaturedStories_<?php echo $story; ?>_abstract"><?php echo stripslashes(stripslashes($jasFeaturedStories_options[$story . '_abstract'])); ?></textarea>
				</td>
			</tr>
			<tr>
				<th scope="row" valign="top"><?php _e('Link', 'jasFeaturedStories'); ?></th>
				<td>
					<?php ddlRecentPosts($story) ?>
				</td>
			</tr>
			<tr>
				<th scope="row" valign="top"><?php _e('Image override', 'jasFeaturedStories'); ?></label></th>
				<td>
					<input type="text" name="jasFeaturedStories_<?php echo $story; ?>_imageUrl" value="<?php echo stripslashes(stripslashes($jasFeaturedStories_options[$story . '_imageUrl'])); ?>" size="50" /> (if left blank will use the post's image)
				</td>
			</tr>
            <tr>
				<th scope="row" valign="top"><?php _e('Include in main pane', 'jasFeaturedStories'); ?></label></th>
				<td>
					<label><input type="checkbox" name="jasFeaturedStories_<?php echo $story; ?>_primary" <?php if($jasFeaturedStories_options[$story . '_primary'] == 'on') echo 'checked="checked" '; ?>/> Include this item in the main pane</label>
				</td>
			</tr>
		</table>
	</div>
<?php
}
?>
	<div class="jasFeaturedStoriesBlock<?php if($story == 'story1') echo ' first'; ?>">
	<h3><?php _e('Miscellaneous options', 'jasFeaturedStories'); ?></h3>
		<table class="form-table">
			<tr>
				<th scope="row" valign="top"><?php _e('Time to next slide', 'jasFeaturedStories'); ?></th>
				<td>
					<label><input type="text" name="jasFeaturedStories_cycle_time" value="<?php echo $jasFeaturedStories_options['cycle_time']; ?>"/> Time to display each main item, in seconds</label>
				</td>
			</tr>
            <tr>
				<th scope="row" valign="top"><?php _e('Scroll text', 'jasFeaturedStories'); ?></th>
				<td>
					<label><input type="checkbox" name="jasFeaturedStories_scroll" <?php if($jasFeaturedStories_options['scroll'] == 'on') echo 'checked="checked" '; ?>/> Slides story abstract on hover</label>
				</td>
			</tr>
		</table>
	</div>
	
	<p class="submit">
		<input type="submit" name="Save" class="button" value="<?php _e('Save Changes', 'jasFeaturedStories'); ?>" />
		<input type="submit" name="Preview" class="button preview" value="<?php _e('Preview Changes', 'jasFeaturedStories'); ?>" />
		<input type="submit" name="Publish" class="button-primary" value="<?php _e('Publish Changes', 'jasFeaturedStories'); ?>" />
	</p>
</div> 
</form>