jQuery(document).ready(function($){
	
	$('#nav-brand').click(function(){

        $('html, body').animate({
           scrollTop: $("#logo").offset().top
         }, 2000);
    });

	$('.top-link-footer').click(function(){

        $('html, body').animate({
           scrollTop: $("#logo").offset().top
         }, 2000);
    });

	$("a[href='#about']").click(function(){

        $('html, body').animate({
           scrollTop: $("#about").offset().top
         }, 2000);

	});

	$("a[href='#portfolio']").click(function(){

        $('html, body').animate({
           scrollTop: $("#portfolio").offset().top
         }, 2000);

	});

	$("a[href='#resume']").click(function(){

        $('html, body').animate({
           scrollTop: $("#resume").offset().top
         }, 2000);

	});

	$("a[href='#contact']").click(function(){

        $('html, body').animate({
           scrollTop: $("#contact").offset().top
         }, 2000);

	});

	$('.main-navigation').waypoint('sticky');

	var container = $(".project");
	container.imagesLoaded(function(){
		container.masonry({

			itemSelector : '.project-block',
			isAnimated : true
		});
	});
	/*
	$(function(){
		$("#project-container").masonry({

			itemSelector : '.project-block',
			isAnimated : true
		});
	});
	*/

});
