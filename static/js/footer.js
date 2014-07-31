/* This js is after anything else on the page */

(function($) {
  
  $( document ).ready(function() {
    
    // $("#sif-menu >> a").prop("href", "#");
//    $(".sif-submenu").hide();
    $(".glyphicon.glyphicon-chevron-up.pull-right").click(function(e) {
      console.log($(this).toggleClass('glyphicon-chevron-up glyphicon-chevron-down'));
      console.log($(this).next().toggle('fast'));
    });
    
    var reload = false;
    $(window).on("resize load", function() {
      if ($(".sampleClass").css("float") == "none" ) {
        reload = true;
        var desired_width = $("#sidebar").width()/2 - 10;
        $('#sidebar .widget').css("width", desired_width);
        var container = document.querySelector('#sidebar');
        var msnry = new Masonry( container, {
          itemSelector: '.widget', 
          "gutter": 20
        });
      }
    });
    $(window).on("resize", function() {
      if ($(".sampleClass").css("float") == "left" && reload) {
        window.location.href = window.location.href;
        reload = false;
      }
    });
  });
  
})(jQuery);