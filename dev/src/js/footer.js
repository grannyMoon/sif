/* This js is after anything else on the page */

(function($) {

  $( document ).ready(function() {

    /**
     * Rotate chevron and show sub elements
     */
    // $(".sif-submenu").hide();
    $(".sif-menu-link").click(function(e) {

      var $this = $(this), transitionTime = 300;

      var rotateDirection = '90';
      if ($this.hasClass('glyphicon-chevron-left')) {
        rotateDirection = "-90";
      }
      $this.animate({rotate: rotateDirection}, transitionTime, function() {
        $this.css("transform", "");
        $this.toggleClass('glyphicon-chevron-left glyphicon-chevron-down');
      });
      $(this).next().toggle(transitionTime);
    });

    // Show Masonry in two cols
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