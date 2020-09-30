<?php
/**
 * The loop that displays a page
 *
 * The loop displays the posts and the post content. See
 * https://codex.wordpress.org/The_Loop to understand it and
 * https://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-page.php.
 *
 */
?>

<?php
if ( have_posts() ) {
  while ( have_posts() ) :
    the_post();
  ?>

    <div <?php if(has_post_thumbnail()) { echo 'class="has-feat-image"'; } ?>>
      <div id="content">

        <?php system2018_get_breadcrumbs(); ?>

        <?php if(has_post_thumbnail()) : ?>
          <div class="featured-image">
              <?php the_post_thumbnail( 'full' ); ?>
          </div>
        <?php endif; ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <?php if ( is_front_page() ) { ?>
            <h2 class="entry-title"><?php the_title(); ?></h2>
          <?php } else { ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>
          <?php } ?>

          <div class="entry-content">

            <?php the_content(); ?>

            <?php
            wp_link_pages(
              array(
                'before' => '<div class="page-link">' . __( 'Pages:', 'system2018' ),
                'after'  => '</div>',
              )
            );
            ?>
            <?php edit_post_link( __( 'Edit', 'system2018' ), '<span class="edit-link">', '</span>' ); ?>
          </div><!-- .entry-content -->
        </div><!-- #post-## -->

        <?php //comments_template( '', true ); ?>
      </div>
    </div>

<?php endwhile;
}; // end of the loop. ?>
