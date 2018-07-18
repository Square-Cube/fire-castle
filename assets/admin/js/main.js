/*Side menu
===================================*/
$(document).ready(function() {
    "use strict";
    $(".icon-bar").click(function() {
        $(".menu-links").toggleClass("in");
    });
});

/*Side Menu
==============================*/
$(document).ready(function() {
    "use strict";
    $(".side-menu-links .sub-menu > a").click(function(e) {
    $(".side-menu-links ul").slideUp(),
        $(this).next().is(":visible") || $(this).next().slideDown(),
    e.stopPropagation()
    })
 });

/* Profile
==============================*/
$(document).ready(function() {
     "use strict";
     $(".top-header-links li .profile-icon").click(function(){
         $(".profile-dropdown").toggleClass("profile-dropdown-active");
     });
 });

/* Toggle Icon
==============================*/
$(document).ready(function() {
     "use strict";
     $(".toggle-icon").click(function(){
         $(".side-menu").toggleClass("side-menu-move");
         $(".page-content").toggleClass("page-content-move");
     });
});

/* Date Picker
=============================*/
$(document).ready(function () {
    "use strict";
    $('.form_datetime').datetimepicker({
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
    $('.form_date').datetimepicker({
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
});

/* Timer Counter
===============================*/
$(document).ready(function () {
    'use strict';
    $('.timer').each(count);
    function count(options) {
        var $this = $(this);
        options = $.extend({}, options || {}, $this.data('countToOptions') || {});
        $this.countTo(options);
      }
});

/* DataTable
==============================*/
 $(document).ready(function() {
     "use strict";
     $('#datatable').DataTable();
     $('#datatableX').DataTable( {
         "scrollX": true
     });
     var clicked = false;
     $(".checkall").on("click", function() {
         $(".radio-wrap input").prop("checked", !clicked);
         clicked = !clicked;
     });
 });
$(document).ready(function () {
    "use strict";
    $('#tags').select2({
        tags: true,
        tokenSeparators: [',']
    });
 });
/*Loading
===============================*/
$(window).on("load", function () {
     "use strict";
    $(".loading .loading-content").fadeOut(function () {
        $(this).parent().fadeOut();
        $("body").css({"overflow-y" : "visible"});
    });
});

/*Side Menu
================================*/
$(document).ready(function () {
    "use strict";
    $( "#spainer" ).click(function() {
        $("#spainer i").addClass('sho');
    });
});

