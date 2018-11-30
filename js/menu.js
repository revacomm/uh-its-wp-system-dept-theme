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
});