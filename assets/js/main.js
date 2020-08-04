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

//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function () {
	if (animating) return false;
	animating = true;

	current_fs = $(this).parent();
	next_fs = $(this).parent().next();

	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

	//show the next fieldset
	next_fs.show();
	//hide the current fieldset with style
	current_fs.animate(
		{ opacity: 0 },
		{
			step: function (now, mx) {
				//as the opacity of current_fs reduces to 0 - stored in "now"
				//1. scale current_fs down to 80%
				scale = 1 - (1 - now) * 0.2;
				//2. bring next_fs from the right(50%)
				left = now * 50 + "%";
				//3. increase opacity of next_fs to 1 as it moves in
				opacity = 1 - now;
				current_fs.css({
					transform: "scale(" + scale + ")",
					position: "absolute",
				});
				next_fs.css({ left: left, opacity: opacity });
			},
			duration: 800,
			complete: function () {
				current_fs.hide();
				animating = false;
			},
			//this comes from the custom easing plugin
			easing: "easeInOutBack",
		}
	);
});
