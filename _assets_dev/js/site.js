jQuery(document).ready(function($) {
	jQuery('.hamburger').on('click', function(e){
		e.preventDefault();
		jQuery('body').toggleClass('push-left');
		jQuery('.menu').toggleClass('active');
		jQuery('.hamburger').toggleClass('close');
	})

	jQuery('.slider').bxSlider({ 
		pagerCustom: 			'.tabs', 
		easing: 				'ease-in-out',
		adaptiveHeight: 		true,
		speed: 					750,
		adaptiveHeightSpeed: 	1000,
		useCSS: 				true,
		touchEnabled: 			false,
		controls: 				false,
		onSlideAfter: function (currentSlideNumber, totalSlideQty, currentSlideHtmlObject) {
		    console.log(currentSlideHtmlObject);
		    $('.active-slide').removeClass('active-slide');
		    $('.slider>li').eq(currentSlideHtmlObject + 1).addClass('active-slide')
		},
		onSliderLoad: function () {
		    $('.slider>li').eq(1).addClass('active-slide')
		},
	});

	jQuery('.modal').magnificPopup({type:'ajax'});
});

if (!Modernizr.svg) {
	jQuery('img[src$=".svg"]').each(function()
	{
		jQuery(this).attr('src', $(this).attr('src').replace('.svg', '.png'));
	});
}