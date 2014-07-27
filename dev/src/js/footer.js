/* This js is after anything else on the page */

(function($) {
  
  $( document ).ready(function() {
    $("#sif-menu >> a").prop("href", "#");
    $(".sif-submenu").hide();
    $("#sif-menu >> a").click(function(e) {
      console.log($(this).next().toggle('fast'));
    });
  });
  
})(jQuery);