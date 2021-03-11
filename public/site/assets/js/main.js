$(document).ready(function () {


  $('.navbar-toggler1').click(function(){
    $('.fixed-nav').toggleClass("bg-light");
    $('.fixed-nav').toggleClass("openNav1");
  });

  $('.our-button').click(function () {
    $(this).toggleClass('chang');
  });


    //start change position nav
  $(window).on("scroll", function () {
    if ($(window).scrollTop() > 100 ) {
        $('.fixed-nav').css("position","relative");
    }else {
      $('.fixed-nav').css("position","fixed");
        }
  });







  $('.owl-carousel').owlCarousel({
    loop:true,
    center: true,
    margin:60,
    stagePadding: false,
    dots:false,
    nav:true,
    navText:["<div class='nav-btn prev-slide'><i class='fas fa-chevron-left'></i></div>","<div class='nav-btn next-slide'><i class='fas fa-chevron-right'></i></div>"],
    autoplay:true,
    //autoWidth:true,
    autoplayTimeout:3000,
    responsive:{
        0:{
            nav:false,
            items:1
        },
        600:{
            nav:false,
            items:2
        },
        1000:{
            items:3
        }
    }
});




















  });