(function($) {

	'use strict';

	$(document).ready(function(){
		// SUBMENU ARROW
		$('.site-navigation li:has(ul)').addClass('has-child');

		// SPLIT WORDS
		$('.home-title, .widget-title').splitWords(1);

		// MASONRY
		$('#masonry').masonry({
			columnWidth: 585,
			itemSelector:'.tbox'
		});

		$('.griddy').masonry({
			columnWidth: 390,
			itemSelector:'.post'
		});

		// EQUAL HEIGHT
		function equalHeight(group) {
			var tallest = 0;
			group.each(function() {
				var thisHeight = $(this).height();
				if(thisHeight > tallest) {
					tallest = thisHeight;
				}
			});
			group.height(tallest);
		}
		
		equalHeight($(".col-service"));

	});

	$(window).load(function(){

		// PRELOADER
		$('#preloader').fadeOut('slow',function(){$(this).remove();});

		// Container
		var $container = $('#foliowrap');
		$container.isotope({
			filter:'*',
			animationOptions: {
				duration: 750,
				easing: 'linear',
				queue: false,
			}
		});

		// Isotope Button
		$('#options li a').click(function(){
			var selector = $(this).attr('data-filter');
			$container.isotope({
				filter:selector,
				animationOptions: {
					duration: 750,
					easing: 'linear',
					queue: false,
				}
			});
			return false;
		});

		var $optionSets = $('#options'),
			$optionLinks = $optionSets.find('a');

			$optionLinks.click(function(){
				var $this = $(this);
				// don't proceed if already selected
				if ($this.hasClass('selected')) {
					return false;
				}
				var $optionSet = $this.parents('#options');
				$optionSet.find('.selected').removeClass('selected');
				$this.addClass('selected'); 
			});

		// MENU SCROLL
		$(window).scroll(function () {
			var $this = $(this);
			if ($this.scrollTop() > 240) {
				$('body').addClass('scroll-run');
			} else if($this.scrollTop() < 240){
				$('body').removeClass('scroll-run');
			}
			delete $this.this;
		});
	});

})( jQuery );
