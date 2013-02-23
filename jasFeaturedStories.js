jQuery(document).ready(function(){
	jQuery('#featured-stories.jasFeaturedStoriesScroll li:not(li.primary)').hover(function(){
		jQuery(this).find('p').slideDown(100);
	}, function(){
		jQuery(this).find('p').slideUp(50);
	});
	
	// create pips for primary items
	if(jQuery('#featured-stories li.primary').length > 1) {
		var jasfs_ul = jQuery(document.createElement('ul'));
		jasfs_ul.addClass('jasfs_pips');
		for(i = 0, il = jQuery('#featured-stories li.primary').length; i < il; i++) {
			var jasfs_li = jQuery(document.createElement('li'));
			var related_slide = jQuery(jQuery('#featured-stories li.primary')[i]);
			jasfs_li
				.attr('title',related_slide.find('h2').text())
				.appendTo(jasfs_ul)
				.click(function(){
					if(!jQuery(this).hasClass('current')) {
						changeSlide(jQuery(this).prevAll().length);
						clearInterval(t);
					}
				});
		}
		jasfs_ul.insertAfter('#featured-stories');
		jQuery('.jasfs_pips li:first-child').addClass('current');
		
		var t = setInterval('changeSlide("next")',parseInt(jQuery('#featured-stories-cycle-time').val())*1000);
	}
});

var changeSlide = function(slide) {
	if(slide == 'next') {
		slide = (jQuery('.jasfs_pips li.current').prevAll().length + 1) % jQuery('.jasfs_pips li').length;
	}
	jQuery(jQuery('#featured-stories li.primary')[slide])
		.css({zIndex:6,opacity:0})
		.animate({opacity:1}, 300, function(){
			jQuery(this).css({zIndex:5}).siblings().css({zIndex:1});
		});
		
	jQuery(jQuery('.jasfs_pips li')[slide]).addClass('current').siblings().removeClass('current');
}