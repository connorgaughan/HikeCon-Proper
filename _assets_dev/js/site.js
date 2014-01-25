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
	$('.front nav li.scroll a').on('click', function(e){
		e.preventDefault();
		$('html, body').animate({
			scrollTop: $( $.attr(this, 'title') ).offset().top-50
		}, 500, function(){
			$('body').removeClass('push-left');
			$('.menu').removeClass('active');
			$('.hamburger').removeClass('close');
		});
	})
});

if (!Modernizr.svg) {
	$('img[src$=".svg"]').each(function()
	{
		$(this).attr('src', $(this).attr('src').replace('.svg', '.png'));
	});
}