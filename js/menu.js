/**
 * This file contains general scripts for front end behavior.
 */
$(document).ready(function () {
  $(".sub-menu li a").attr('tabindex','0');
  $("a[href^='#']").on("focus",function() {
    $(this).next(".sub-menu").show();
  });
  $(".sub-menu li:last-child a").on("focusout",function() {
    $(".sub-menu").hide();
  });
  $(".menu-toggle").on("click",function() {
    $(this).toggleClass("open");
      $("#header_btm_content > ul").toggle();
      $(this).attr('aria-expanded', function (i, attr) {
      return attr == 'true' ? 'false' : 'true'
    });
  });
  $(".menu-toggle").on("touchstart",function(e) {
    e.preventDefault();
      $("#header_btm_content > ul").toggle();
  });
  $(".menu-toggle.on").on("touchstart",function(e) {
    e.preventDefault();
      $("#header_btm_content > ul").toggle();
  });
});