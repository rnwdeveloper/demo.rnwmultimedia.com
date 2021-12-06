$(document).ready(function() {
	$('.sub_menu').click(function() {
		$('.sub_menu').children("span").addClass('hiiamdown');
	});


	$('.toogle_btn').click(function() {
		$('.side_Menu').toggleClass("showsidebar");
		$('.main_content').toggleClass("showsidebar");
	});


	$( function() {
	    $( "#datepicker" ).datepicker();
	});


	$(window).scroll(function() {
		var header = $('.top_header');
		var scroll = $(window).scrollTop();

		if (scroll >= 40) {
			header.addClass('fixed');
		}
		else{
			header.removeClass('fixed');
		}
	});

	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	});
	$('.create_new_lead').click(function() {
		$("aside").toggleClass('right_show');
		$('.main_content').toggleClass('right_show');
		$('.right_side').toggleClass('right_show');
	});
	$('.close_side_bar').click(function() {
		$('.main_content').removeClass('right_show');
		$('.right_side').removeClass('right_show');
		$("aside").removeClass('right_show');
	});
	$('.chate_btn_in').click(function() {
		$('.chate_box').toggleClass('chat_box_show');
	});
	$('.chate_btn_in').click(function() {
		$(this).children("i").toggleClass('fa-envelope-open').addClass('fa-close');
	});
});
$(document).ready(function($) {
	var path = window.location.pathname.split("/").pop();
	if (path == '') {
		path = 'index.php';
	}
	var target = $('.side_all_menu_block li a[href="'+path+'"]');
	target.addClass('active');
});
$(document).ready(function() {
	if ('.side_all_menu_sub_menu li a.active') {
		$('.side_all_menu_sub_menu').addClass('show');
	}
	else {
		$('.side_all_menu_sub_menu').removeClass('show');
	}
});
