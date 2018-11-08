<?php
/**
 * Template for displaying the footer
 *
 * Contains the closing of the id=main div and all content
 * after. Calls sidebar-footer.php for bottom widgets.
 *
 */
?>

</div></main>
<footer>
<?php if ( is_active_sidebar( 'footer-widget-area' ) ) : ?>
   <div id="footer_top">
      <div id="footer_top_content">
         <ul class="xoxo">
         <?php dynamic_sidebar( 'footer-widget-area' ); ?>
         </ul>
      </div>
   </div>
<?php endif; ?>
   <div id="footer_btm">
      <div id="footer_btm_content">

         <div class="uh_col c1_4">
            <img src="<?php echo get_template_directory_uri(); ?>/images/footer-logo.png" srcset="<?php echo get_template_directory_uri(); ?>/images/footer-logo.png 1x, <?php echo get_template_directory_uri(); ?>/images/footer-logo-2x.png 2x" alt="uh manoa logo" /><br />2444 Dole Street<br />Honolulu, HI 96822
         </div>
         <div class="uh_col c2_4">
            An <a href="https://www.hawaii.edu/offices/eeo/policies/">equal opportunity/affirmative action institution</a><br />
            Use of this site implies consent with our <a href="https://www.hawaii.edu/infotech/policies/itpolicy.html">Usage Policy</a><br />
            copyright &copy; 2018 <a href="https://www.hawaii.edu/">University of Hawai&#699;i</a>
         </div>
         <div class="uh_col c3_4">
            <ul>
               <li><a href="https://www.hawaii.edu/calendar/">Calendar</a></li>
               <li><a href="https://www.hawaii.edu/directory/">Directory</a></li>
               <li><a href="https://www.hawaii.edu/emergency/">Emergency Information</a></li>
               <li><a href="https://myuh.hawaii.edu/">MyUH</a></li>
               <li><a href="http://workatuh.hawaii.edu/">Work at UH</a></li>
            </ul>
         </div>
         <div class="uh_col c4_4">
<div id="footer_smrow"><a href="https://twitter.com/UHawaiiNews"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-twitter.png" alt="twitter" class="footer_smicon" /></a> &nbsp; <a href="https://www.facebook.com/universityofhawaii"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-facebook.png" alt="facebook" class="footer_smicon" /></a> &nbsp; <a href="https://instagram.com/uhawaiinews/"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-instagram.png" alt="instagram" class="footer_smicon" /></a> &nbsp; <a href="http://www.flickr.com/photos/uhawaii"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-flickr.png" alt="flickr" class="footer_smicon" /></a> &nbsp; <a href="https://www.youtube.com/user/uhmagazine"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-youtube.png" alt="youtube" class="footer_smicon" /></a></div>

         <p><a href="https://www.hawaii.edu/contact/">Contact UH</a><br />
         If required, information contained on this website can be made available in an alternative format upon request.</p>
         <p><a href="https://get.adobe.com/reader/">Get Adobe Acrobat Reader</a></p>
         </div>
      </div>
   </div>
</footer><?php

	/*
	 * Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?></body>
</html>
