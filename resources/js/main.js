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




//SVG of icons

var removeSVG = '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 22 22" style="enable-background:new 0 0 22 22;" xml:space="preserve"><g><g><path class="fill" d="M16.1,3.6h-1.9V3.3c0-1.3-1-2.3-2.3-2.3h-1.7C8.9,1,7.8,2,7.8,3.3v0.2H5.9c-1.3,0-2.3,1-2.3,2.3v1.3c0,0.5,0.4,0.9,0.9,1v10.5c0,1.3,1,2.3,2.3,2.3h8.5c1.3,0,2.3-1,2.3-2.3V8.2c0.5-0.1,0.9-0.5,0.9-1V5.9C18.4,4.6,17.4,3.6,16.1,3.6z M9.1,3.3c0-0.6,0.5-1.1,1.1-1.1h1.7c0.6,0,1.1,0.5,1.1,1.1v0.2H9.1V3.3z M16.3,18.7c0,0.6-0.5,1.1-1.1,1.1H6.7c-0.6,0-1.1-0.5-1.1-1.1V8.2h10.6L16.3,18.7L16.3,18.7z M17.2,7H4.8V5.9c0-0.6,0.5-1.1,1.1-1.1h10.2c0.6,0,1.1,0.5,1.1,1.1V7z"/></g><g><g><path class="fill" d="M11,18c-0.4,0-0.6-0.3-0.6-0.6v-6.8c0-0.4,0.3-0.6,0.6-0.6s0.6,0.3,0.6,0.6v6.8C11.6,17.7,11.4,18,11,18z"/></g><g><path class="fill" d="M8,18c-0.4,0-0.6-0.3-0.6-0.6v-6.8C7.4,10.2,7.7,10,8,10c0.4,0,0.6,0.3,0.6,0.6v6.8C8.7,17.7,8.4,18,8,18z"/></g><g><path class="fill" d="M14,18c-0.4,0-0.6-0.3-0.6-0.6v-6.8c0-0.4,0.3-0.6,0.6-0.6c0.4,0,0.6,0.3,0.6,0.6v6.8C14.6,17.7,14.3,18,14,18z"/></g></g></g></svg>';
var completeSVG = '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 22 22" style="enable-background:new 0 0 22 22;" xml:space="preserve"><rect y="0" class="noFill" width="22" height="22"/><g><path class="fill" d="M9.7,14.4L9.7,14.4c-0.2,0-0.4-0.1-0.5-0.2l-2.7-2.7c-0.3-0.3-0.3-0.8,0-1.1s0.8-0.3,1.1,0l2.1,2.1l4.8-4.8c0.3-0.3,0.8-0.3,1.1,0s0.3,0.8,0,1.1l-5.3,5.3C10.1,14.3,9.9,14.4,9.7,14.4z"/></g></svg>';


//Click on the add button -
//If there is text inside item field add the text to the ToDo list
document.getElementById('add').addEventListener('click',function() {
 var value = document.getElementById('thing').value;
 if(value){
  addThingToDo(value);
  document.getElementById('thing').value = '';
  }
});

function removeEvent(){
  var item = this.parentNode.parentNode;
  var parent = item.parentNode;
  parent.removeChild(item);
}

function completeEvent(){
  var item = this.parentNode.parentNode;
  var parent = item.parentNode;
  var id = parent.id;
  var target;

  if(id == 'todo'){
    //This event is going to be completed for the first time
    target = document.getElementById('completed');
  }
  else {
    //This event is going to be re-completed
    target = document.getElementById('todo');
  }
  parent.removeChild(item);
  target.insertBefore(item, target.childNodes[0]);
}


//Adds a new thing in ToDo list

function addThingToDo(thing){

  var list = document.getElementById('todo');

  var buttons = document.createElement('div');
  buttons.classList.add('buttons');

  var item = document.createElement('li');
  item.innerText = thing;

  var remove = document.createElement('button');
  remove.classList.add('remove');
  remove.innerHTML = removeSVG;

  // Remove event
  remove.addEventListener('click', removeEvent);

  var complete = document.createElement('button');
  complete.classList.add('complete');
  complete.innerHTML = completeSVG;

  //Complete event
  complete.addEventListener('click', completeEvent);


  buttons.appendChild(remove);
  buttons.appendChild(complete);
  item.appendChild(buttons);

  list.insertBefore(item, list.childNodes[0]);
}
