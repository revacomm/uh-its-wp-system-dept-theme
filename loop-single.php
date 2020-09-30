<?php
/**
 * The loop that displays a single post
 *
 * The loop displays the posts and the post content. See
 * https://codex.wordpress.org/The_Loop to understand it and
 * https://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-single.php.
 *
 */
?>

<?php
if ( have_posts() ) {
  while ( have_posts() ) :
    the_post();
  ?>

    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <h1 class="entry-title"><?php the_title(); ?></h1>

      <div class="entry-meta">
        <?php if(!(in_category(array('directory', 'faq','events')))): ?>
          <?php system2018_posted_on(); ?>
        <?php endif; ?>
        <?php system2018_categories(); ?>
        <?php $terms = get_the_terms( $post->ID , 'faq-topics' );
        if ($terms): ?>
          <?php system2018_faq_topics(); ?>
        <?php endif; ?>
      </div><!-- .entry-meta -->

      <div class="entry-content">
        <?php if(has_post_thumbnail()) : ?>
          <div class="featured-image">
              <?php the_post_thumbnail( 'full' ); ?>
          </div>
        <?php endif; ?>
        <?php if( has_excerpt() ) { ?>
          <em>Excerpt</em>
          <?php the_excerpt(); ?>
        <?php }; ?>
        <?php the_content(); ?>
        <?php
        wp_link_pages(
          array(
            'before' => '<div class="page-link">' . __( 'Pages:', 'system2018' ),
            'after'  => '</div>',
          )
        );
        ?>
      </div><!-- .entry-content -->

      <?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries ?>
        <div id="entry-author-info">
          <div id="author-avatar">
            <?php
            /** This filter is documented in author.php */
            echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'system2018_author_bio_avatar_size', 60 ) );
            ?>
          </div><!-- #author-avatar -->
          <div id="author-description">
            <h2><?php printf( __( 'About %s', 'system2018' ), get_the_author() ); ?></h2>
            <?php the_author_meta( 'description' ); ?>
            <div id="author-link">
              <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
                <?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'system2018' ), get_the_author() ); ?>
              </a>
            </div><!-- #author-link -->
          </div><!-- #author-description -->
        </div><!-- #entry-author-info -->
      <?php endif; ?>

      <div class="entry-utility">
        <?php system2018_posted_in(); ?>
      </div><!-- .entry-utility -->
      <?php edit_post_link( __( 'Edit', 'system2018' ), '<span class="edit-link">', '</span>' ); ?>
    </div><!-- #post-## -->

    <div id="nav-below" class="navigation">
      <div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'system2018' ) . '</span> %title' ); ?></div>
      <div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'system2018' ) . '</span>' ); ?></div>
    </div><!-- #nav-below -->

    <?php //comments_template( '', true ); ?>

  <?php endwhile;
}; // end of the loop. ?>
