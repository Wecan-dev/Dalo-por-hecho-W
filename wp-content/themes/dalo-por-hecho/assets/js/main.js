$(function () {
	"use strict";

	$('[data-toggle="offcanvas"]').on("click", function () {
		$(".offcanvas-collapse").toggleClass("open");
	});
});

// $(document).ready(function () {
// 	$('.navbar .dropdown').hover(function () {
// 			$(this).find('.dropdown-menu').first().stop(true, true).slideDown(150);
// 		}, function () {
// 			$(this).find('.dropdown-menu').first().stop(true, true).slideUp(105)
// 		});
// 	});

// Menú fixed
$(window).scroll(function () {
	if ($(document).scrollTop() > 70 && $(window).width() >= 768) {
		// $('.navbar-fixed-js').addClass('top');
		// $('.navbar-fixed-js').removeClasss('top');
	} else {
		// $('.navbar-fixed-js').removeClass('fixed');
		// $('.nav-link').removeClass('fixed-color');
		// $('.nav-top__header').removeClass('nav-top__header--detele');
		// $("#iso").removeClass('img-size').attr('src', 'assets/img/logo.jpeg').removeClass('scroll-up');
		// $('.navbar').addClass('top');
		// $('.navbar-fixed-js').addClass('top');
		// $('.navbar-fixed-js').removeClasss('top');
	}
});

$(".nav-tabs").on("click", "li", function () {
	$(".nav-tabs li.active").removeClass("active");
	$(this).addClass("active");
	if(".tab-step2.active"){
		$(".tab-step1").addClass("check-tab");
	}
  if(".tab-step3.active"){
		$(".tab-step2").addClass("check-tab");
  }
  if(".tab-step4.active"){
		$(".tab-step3").addClass("check-tab");
  }
});
