<a href="#main_area" id="skip2main">Skip to Main Content</a>
<div id="header_top">
  <div id="header_top_content" class="container">
    <nav id="header_btm" role="navigation" aria-label="main navigation">
      <button class="menu-toggle" role="button" aria-expanded="false"><span class="screen-reader-text">Open Mobile Menu</span></button>
    </nav>
    <div id="header_dropdown_container">
      <ul>
        <li class="header-dropdown-menu">
          <a href="#" class="link-container"><span class="parent-dropdown">UH Manoa</span><span class="caret" aria-hidden="true"></span></a>
          <ul id="header_mainmenu_dropdown">
            <li id="header_dropdown_search">
              <div class="dropdown_search_container"><?php get_search_form(); ?></div>
            </li>
            <?php if (has_nav_menu('main')) : ?>
              <?php wp_nav_menu(
                array(
                  'theme_location'  => 'main',
                  'menu_id'         => 'menu-main-menu',
                  'container'       => false,
                  'container_id'    => '',
                  'depth'           => 1,
                )
              ); ?>
            <?php else : ?>
              <li><a class="link-container" href="https://www.hawaii.edu/"><span>UH Home</span></a></li>
              <li><a class="link-container" href="https://www.hawaii.edu/calendar/"><span>Calendar</span></a></li>
              <li><a class="link-container" href="https://www.hawaii.edu/directory/"><span>Directory</span></a></li>
              <li><a class="link-container" href="https://myuh.hawaii.edu/"><span>MyUH</span></a></li>
              <li><a class="link-container" href="http://workatuh.hawaii.edu/"><span>Work at UH</span></a></li>
            <?php endif; ?>
          </ul>
        </li>

        <li class="header-dropdown-menu">
          <a href="#" rel="home" class="link-container"><span class="parent-dropdown"><?php bloginfo('name'); ?></span><span class="caret" aria-hidden="true"></span></a>
          <ul id="header_submenu_dropdown">

            <?php if (has_nav_menu('primary')) : ?>
              <?php wp_nav_menu(
                array(
                  'theme_location'  => 'primary',
                  'menu_id'         => 'header_btm_content_dropdown',
                  'container'       => false,
                  'container_id'    => false,
                  'depth'           => 3,
                  'link_after' => '<span class="caret" aria-hidden="true"></span>'
                )
              ); ?>
            <?php else : ?>

              <?php
              $menu = array(
                'depth'        => 3,
                'sort_column'  => 'menu_order, post_title',
                'menu_class'   => 'menu page-menu',
                'menu_id'      => 'header_btm_content_dropdown',
                'echo'         => 1,
                'authors'      => '',
                'sort_column'  => 'menu_order',
                'link_before'  => '',
                'link_after' => '<span class="caret" aria-hidden="true"></span>'
              );
              wp_page_menu($menu); ?>

            <?php endif; ?>
          </ul>
        </li>
      </ul>


    </div>
    <div id="header_midrow">
      <?php get_search_form(); ?>
    </div>
    <div id="header_smrow">
      <a href="https://twitter.com/UHawaiiNews">
        <img src="<?php echo get_template_directory_uri(); ?>/images/icon-twitter.png" alt="twitter" class="header_smicon" />
      </a> &nbsp;
      <a href="https://www.facebook.com/universityofhawaii">
        <img src="<?php echo get_template_directory_uri(); ?>/images/icon-facebook.png" alt="facebook" class="header_smicon" />
      </a> &nbsp;
      <a href="https://instagram.com/uhawaiinews/">
        <img src="<?php echo get_template_directory_uri(); ?>/images/icon-instagram.png" alt="instagram" class="header_smicon" />
      </a> &nbsp;
      <a href="http://www.flickr.com/photos/uhawaii">
        <img src="<?php echo get_template_directory_uri(); ?>/images/icon-flickr.png" alt="flickr" class="header_smicon" />
      </a> &nbsp;
      <a href="https://www.youtube.com/user/uhmagazine">
        <img src="<?php echo get_template_directory_uri(); ?>/images/icon-youtube.png" alt="youtube" class="header_smicon" />
      </a>
    </div>
  </div>
</div>