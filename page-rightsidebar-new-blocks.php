<?php

/**
 * Template Name: Right Sidebar New Block
 * Template Post Type: post, page, article
 * A custom page template for pages with the sidebar on the right.
 */

get_header();
?>

<main id="main_area" role="main">
  <div id="main_content" class="container">
    <div class="uhm-block-dropdown row">
      <?php get_template_part('uh-block-dropdown'); ?>
    </div>
    <div class="row">

      <div class="col-xl-9 col-md-12">

        <?php
        /*
           * Run the loop to output the page.
           * If you want to overload this in a child theme then include a file
           * called loop-page.php and that will be used instead.
           */
        get_template_part('loop', 'page-breadcrumb');
        ?>
      </div>

      <aside class="col-xl-3 col-md-12" role="complementary">
        <?php get_sidebar('new-blocks'); ?>
      </aside>
    </div>
    <?php get_footer(); ?>