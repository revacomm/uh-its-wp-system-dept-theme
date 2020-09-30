<?php
/**
 * Template Name: One column, no sidebar
 * Template Post Type: post, page, article
 * A custom page template without sidebar.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 */

get_header(); ?>

  <main id="main_area" class="one-column" role="main">
    <div id="main_content" class="container">

      <?php
      /*
       * Run the loop to output the page.
       * If you want to overload this in a child theme then include a file
       * called loop-page.php and that will be used instead.
       */
      get_template_part( 'loop', 'page' );
      ?>

<?php get_footer(); ?>
