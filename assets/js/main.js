$(function () {
	"use strict";

	$('[data-toggle="offcanvas"]').on("click", function () {
		$(".offcanvas-collapse").toggleClass("open");
	});
});

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

// ------------step-wizard-------------
$(document).ready(function () {
	$(".nav-tabs > li a[title]").tooltip();

	//Wizard
	$('a[data-toggle="tab"]').on("shown.bs.tab", function (e) {
		var target = $(e.target);

		if (target.parent().hasClass("disabled")) {
			return false;
		}
	});

	$(".next-step").click(function (e) {
		var active = $(".wizard .nav-tabs li.active");
		active.next().removeClass("disabled");
		nextTab(active);
	});
	$(".prev-step").click(function (e) {
		var active = $(".wizard .nav-tabs li.active");
		prevTab(active);
	});
});

function nextTab(elem) {
	$(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
	$(elem).prev().find('a[data-toggle="tab"]').click();
}

$(".nav-tabs").on("click", "li", function () {
	$(".nav-tabs li.active").removeClass("active");
	$(this).addClass("active");
});
