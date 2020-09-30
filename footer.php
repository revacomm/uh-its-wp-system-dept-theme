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
   <?php if (get_theme_mod('display_footer_widget') == 1) : ?>
   <div id="footer_top">
      <div id="footer_top">
         <div class="container pt-4 pb-5" id="footer_top_content">
            <div class="row">
               <div class="footer-top-left-column contact-info col-md-8">
                  <h2><?php bloginfo( 'name' ); ?></h2>
                  <address>
                     <?php if(get_theme_mod('address')) : ?>
                        <?php echo get_theme_mod('address');
                     endif; ?>
                     <?php if(get_theme_mod('office')) : ?>
                        <br /><?php echo get_theme_mod('office');
                     endif; ?>
                     <?php if(get_theme_mod('city')) : ?>
                        <br /><?php echo get_theme_mod('city');
                     endif; ?>
                  </address>
                  <?php if( get_theme_mod('telephone') || get_theme_mod('fax') || get_theme_mod('email')) : ?>
                     <div class="contact">
                        <strong>Contact Us</strong>
                        <?php if(get_theme_mod('telephone')) : ?>
                           <div class="telephone">Telephone: <?php echo get_theme_mod('telephone'); ?></div>
                        <?php endif; ?>
                        <?php if(get_theme_mod('fax')) : ?>
                           <div class="fax">Fax: <?php echo get_theme_mod('fax'); ?></div>
                        <?php endif; ?>
                        <?php if(get_theme_mod('email')) : ?>
                           <div class="fax">Email: <?php echo get_theme_mod('email'); ?></div>
                        <?php endif; ?>
                     </div>
                  <?php endif; ?>
                  <?php if( get_theme_mod('flickr') || get_theme_mod('instagram') || get_theme_mod('twitter') || get_theme_mod('facebook') || get_theme_mod('youtube')) : ?>
                     <div class="sm-header">Find Us On</div>
                  <?php endif; ?>
                  <?php if(get_theme_mod('flickr')) : ?>
                     <a class="flickr" href="//www.flickr.com/photos/<?php echo get_theme_mod('flickr'); ?>"><i class="fa fa-flickr" aria-hidden="true"></i><span class="screen-reader-text">Flickr</span></a>
                  <?php endif; ?>
                  <?php if(get_theme_mod('instagram')) : ?>
                     <a class="instagram" href="//www.instagram.com/<?php echo get_theme_mod('instagram'); ?>"><i class="fa fa-instagram" aria-hidden="true"></i><span class="screen-reader-text">Instagram</span></a>
                  <?php endif; ?>
                  <?php if(get_theme_mod('twitter')) : ?>
                     <a class="twitter" href="//www.twitter.com/<?php echo get_theme_mod('twitter'); ?>"><i class="fa fa-twitter" aria-hidden="true"></i><span class="screen-reader-text">Twitter</span></a>
                  <?php endif; ?>
                  <?php if(get_theme_mod('facebook')) : ?>
                     <a class="facebook" href="//www.facebook.com/<?php echo get_theme_mod('facebook'); ?>"><i class="fa fa-facebook" aria-hidden="true"></i><span class="screen-reader-text">Facebook</span></a>
                  <?php endif; ?>
                  <?php if(get_theme_mod('youtube')) : ?>
                     <a class="youtube" href="//www.youtube.com/user/<?php echo get_theme_mod('youtube'); ?>"><i class="fa fa-youtube-play" aria-hidden="true"></i><span class="screen-reader-text">YouTube</span></a>
                  <?php endif; ?>
               </div>
               <div class="footer-top-middle-column col-md-4">
                  <?php if ( is_active_sidebar( 'footer-widget-area' ) ) : ?>
                     <ul class="xoxo">
                     <?php dynamic_sidebar( 'footer-widget-area' ); ?>
                     </ul>
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php endif; ?>

  <?php if (get_theme_mod('display_new_footer_widget') == 1) : ?>
    <?php if (is_active_sidebar('full-footer-widget-area')) : ?>
      <div id="footer_top_second">
        <div id="footer_widget_area_full" class="container">
          <ul class="xoxo">
            <?php dynamic_sidebar('full-footer-widget-area'); ?>
          </ul>
        </div>
      </div>
    <?php endif; ?>
  <?php endif; ?>

   <div id="footer_btm">
      <div id="footer_btm_content" class="container pt-5 pb-5">
         <div class="row">
            <div class="uh_col col-md-3">
               <img class="pb-3" src="<?php echo get_template_directory_uri(); ?>/images/footer-logo.png" srcset="<?php echo get_template_directory_uri(); ?>/images/footer-logo.png 1x, <?php echo get_template_directory_uri(); ?>/images/footer-logo-2x.png 2x" alt="uh system logo" /><br />2444 Dole Street<br />Honolulu, HI 96822
            </div>
            <div class="uh_col col-md-3">
               An <a href="https://www.hawaii.edu/offices/eeo/policies/">equal opportunity/affirmative action institution</a><br />
               Use of this site implies consent with our <a href="https://www.hawaii.edu/infotech/policies/itpolicy.html">Usage Policy</a><br />
               copyright &copy; 2018 <a href="https://www.hawaii.edu/">University of Hawai&#699;i</a>
            </div>
            <div class="uh_col col-md-3">
               <ul>
                  <li><a href="https://www.hawaii.edu/calendar/">Calendar</a></li>
                  <li><a href="https://www.hawaii.edu/directory/">Directory</a></li>
                  <li><a href="https://www.hawaii.edu/emergency/">Emergency Information</a></li>
                  <li><a href="https://myuh.hawaii.edu/">MyUH</a></li>
                  <li><a href="http://workatuh.hawaii.edu/">Work at UH</a></li>
               </ul>
            </div>
            <div class="uh_col col-md-3">
               <div id="footer_smrow"><a href="https://twitter.com/UHawaiiNews"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-twitter.png" alt="twitter" class="footer_smicon" /></a> &nbsp; <a href="https://www.facebook.com/universityofhawaii"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-facebook.png" alt="facebook" class="footer_smicon" /></a> &nbsp; <a href="https://instagram.com/uhawaiinews/"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-instagram.png" alt="instagram" class="footer_smicon" /></a> &nbsp; <a href="http://www.flickr.com/photos/uhawaii"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-flickr.png" alt="flickr" class="footer_smicon" /></a> &nbsp; <a href="https://www.youtube.com/user/uhmagazine"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-youtube.png" alt="youtube" class="footer_smicon" /></a></div>

               <p><a href="https://www.hawaii.edu/contact/">Contact UH</a><br />
               If required, information contained on this website can be made available in an alternative format upon request.</p>
               <p><a href="https://get.adobe.com/reader/">Get Adobe Acrobat Reader</a></p>
            </div>
         </div>
      </div>
   </div>
   <a href="#top" class="go-top">
      <span class="fa fa-chevron-up" aria-hidden="true"></span>
      <span class="sr-only">Go to Top</span>
   </a>
   <!-- Global site tag (gtag.js) - Google Analytics -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=UA-121177752-1"></script>
   <script>
     window.dataLayer = window.dataLayer || [];
     function gtag(){dataLayer.push(arguments);}
     gtag('js', new Date());

     gtag('config', 'UA-121177752-1');
   </script>
</footer>

<?php wp_footer(); ?>
</body>
</html>
