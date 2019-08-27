jQuery(document).ready(function(){

  "use strict";

  // LightBox Options
  $(".attachment").find('a > img:not(.attachment-thumbnail)').parent().attr('rel','gallery').fancybox({
    fitToView: true,
    autoSize :  true,
    margin : 30,
    autoScale : true,
    width : '100%',
    height : '100%',
    showNavArrows: true,
    showCloseButton: true,
    helpers : {
      media : {}
    }
  });

  $(".lightbox").attr('rel','gallery').fancybox({
    fitToView: true,
    autoSize :  true,
    margin : 30,
    autoScale : true,
    width : '100%',
    height : '100%',
    showNavArrows: true,
    showCloseButton: true,
    helpers : {
      media : {}
    }
  });
  //End LightBox Options
  $("#fb1, #ig1, #yt1").on("click", function() {
    var el = $(this);
    if (el.text() == el.data("text-swap")) {
      el.text(el.data("text-original"));
    } else {
      el.data("text-original", el.text());
      el.text(el.data("text-swap"));
    }
  });

  $(".contar-profile ul li").click(function() {

    $(this).toggleClass("active");

  });

  $("#b_fb").click(function() {

    $("#fb").toggleClass("active");

  });

  $("#b_ig").click(function() {

    $("#ig").toggleClass("active");

  });

  $("#b_yt").click(function() {

    $("#yt").toggleClass("active");

  });

  $("#b_linked").click(function() {

    $("#linked").toggleClass("active");

  });

  $("#b_github").click(function() {

    $("#github").toggleClass("active");

  });

  $("#b_spotify").click(function() {

    $("#spotify").toggleClass("active");

  });

  $("#b_steam").click(function() {

    $("#steam").toggleClass("active");

  });

  $("#b_snap").click(function() {

    $("#snap").toggleClass("active");

  });

  $("#b_discord").click(function() {

    $("#discord").toggleClass("active");

  });

  $("#b_skype").click(function() {

    $("#skype").toggleClass("active");

  });
  //start sortable
  $( "#sortable" ).sortable();
  //end sortable

  //Menu Trigger
  $(".menu-trigger").click(function() {

    $(".header").toggleClass("active");
    $(".contar-profile").toggleClass("active");

  });
  //End Menu Trigger

  //header-fullscreen__trigger
  $('.header-fullscreen__trigger').click(function(){

    $('.bars, .bar, .header-fullscreen').toggleClass('active');

  });
  //end header-fullscreen__trigger

  //Detect Menu Item & Add Active Class
  jQuery(function($) {

    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
    $('.header-fullscreen__navbar .main-nav a').each(function() {

     if (this.href === path) {
      $(this).addClass('active');
     }

    });

  });
  //End Detect Menu Item & Add Active Class

});

/* Top Nav Trigger Active */
jQuery(document).ready(function($) {
  var topNav = function() {
    var width = document.body.clientWidth;

    if(width <= 1024) {
      $('.top-nav').addClass('active');
    } else if(width > 1024) {
      $('.top-nav').removeClass('active');
    }
  };

  $(window).resize(function(){
    topNav();
  });

  topNav();
});
/* End Top Nav Trigger Active */
