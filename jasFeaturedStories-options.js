jQuery(document).ready(function(){
	highlightCurrentSelection();
	
	jQuery('.jasFeaturedStories-jasFeaturedStories-options-php select').change(function(){
		var stub;
		var $this = jQuery(this);
		$this.attr('name').match('post') ? stub = 'post' : stub = 'tag';
		jQuery('#' + $this.attr('name').replace('_' + stub,'_link')).val($this.val());
		$this.siblings('select, input[type=text]').removeClass('current');
		$this.addClass('current')
	});
	
	jQuery('.jasFeaturedStories-jasFeaturedStories-options-php input.link').keyup(function(){
		var $this = jQuery(this);
		$this.siblings('select, input[type=text]').removeClass('current');
		$this.addClass('current');
	})
	
	jQuery('input.preview').click(function(){
		window.open(jQuery('h1#site-heading a:first-child').attr('href') + '/?jasFeaturedStoriesPreview=1','preview');
		return false;
	})
});

function highlightCurrentSelection() {
	jQuery('.jasFeaturedStories-jasFeaturedStories-options-php select option[selected=selected]').parent().addClass('current');
	
	jQuery('.jasFeaturedStories-jasFeaturedStories-options-php input.link').each(function(){
		$this = jQuery(this);
		if ($this.siblings('select.current').length == 0) $this.addClass('current');
	})
	
	if (jQuery('.jasFeaturedStories-jasFeaturedStories-options-php input.link').siblings('select.current').length == 0)
		jQuery('.jasFeaturedStories-jasFeaturedStories-options-php input.link').addClass('current');
	
}