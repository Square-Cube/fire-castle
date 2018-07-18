/* Products Slider
===============================*/
$(document).ready(function () {
    
    "use strict";
    $(".logos-list").owlCarousel({
        loop: true,
        nav: false,
        slideSpeed: 2000,
        paginationSpeed: 2000,
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        items : 7,
        itemsDesktop : [1199, 5],
        itemsDesktopSmall : [991, 4],
        itemsTablet: [767, 3],
        itemsMobile : [480, 1],
        navigation : false,
        pagination : false,
        autoplay: true
    });
});
/*Smooth Scroll
================================*/
$(document).ready(function () {
    "use strict";
    function goToByScroll(id) {
        $('html , body').animate({
            scrollTop: $(id).offset().top
        }, 'slow');
    }
    $('.custom-scroll a').click(function () {
        goToByScroll($(this).attr('href'));
        return false;
    });
});
/* Mix It Up
=============================*/
$(document).ready(function () {
    "use strict";
    $('.projects-fliter-items').mixItUp();
    
});
