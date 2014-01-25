jQuery(document).ready(function($) {
	$('.hamburger').on('click', function(e){
		e.preventDefault();
		$('body').toggleClass('push-left');
		$('.menu').toggleClass('active');
		$('.hamburger').toggleClass('close');
	})
	$(function() {
		$( "#why .purple" ).tabs({show: 'fade', hide: 'fade'});
	});
});

if (!Modernizr.svg) {
	$('img[src$=".svg"]').each(function()
	{
		$(this).attr('src', $(this).attr('src').replace('.svg', '.png'));
	});
}