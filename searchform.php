<?php
/**
 * Template for displaying search form
 */
?>
  <form role="search" method="get" class="search-form" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label for="s" class="assistive-text screen-reader-text"><?php _e( 'Search this site', 'system2018' ); ?></label>
    <input type="search" class="search-field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'system2018' ); ?>" />
    <button type="submit" class="search-submit" name="submit" id="searchsubmit" aria-label="search" value="<?php esc_attr_e( 'Site search', 'system2018' ); ?>"><span class="fa fa-search" aria-hidden="true"></span><span class="screen-reader-text">Search</span></button>
  </form>
