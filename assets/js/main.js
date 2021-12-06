$(document).ready(function() {
	$('.sub_menu').click(function() {
		$('.sub_menu').children("span").addClass('hiiamdown');
	});
});

$(document).ready(function() {
	$('.toogle_btn').click(function() {
		$('.side_Menu').toggleClass("showsidebar");
		$('.main_content').toggleClass("showsidebar");
	});
});


$( function() {
    $( "#datepicker" ).datepicker();
});


$(document).ready(function() {
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

	$('.create_new_lead1').click(function() {
		$("aside").addClass('right_show');
		$('.main_content').addClass('right_show');
		$('.right_side').addClass('right_show');
	});
	$('#close_side_bar_right').click(function(){
		$('.main_content').removeClass('right_show');
		$('.right_side').removeClass('right_show');
		$("aside").removeClass('right_show');
	});
});

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});


$("#chake2").click(function() {
	$('.todate').addClass('show');
});
$("#chake1").click(function() {
	$('.todate').removeClass('show');
})