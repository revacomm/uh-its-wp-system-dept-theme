<?php
/**
 * System 2018 functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, system2018_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see https://codex.wordpress.org/Theme_Development and
 * https://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'system2018_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see https://codex.wordpress.org/Plugin_API.
 *
 */

/*
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) ) {
  $content_width = 640;
}

/* Tell WordPress to run system2018_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'system2018_setup' );

if ( ! function_exists( 'system2018_setup' ) ) :
  /**
   * Set up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which runs
   * before the init hook. The init hook is too late for some features, such as indicating
   * support post thumbnails.
   *
   * To override system2018_setup() in a child theme, add your own system2018_setup to your child theme's
   * functions.php file.
   *
   */
  function system2018_setup() {

    // This theme styles the visual editor with editor-style.css to match the theme style.
    add_editor_style();

    // Post Format support. You can also use the legacy "gallery" or "asides" (note the plural) categories.
    //add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );

    // This theme uses post thumbnails
    add_theme_support( 'post-thumbnails' );

    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory
     */
    load_theme_textdomain( 'system2018', get_template_directory() . '/languages' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
      array(
        'main' => __('Top Navigation', 'system2018'),
        'primary' => __( 'Primary Navigation', 'system2018' ),
      )
    );
  }
endif;

/*
 * add anchor links
 */
function system2018_enqueue_scripts() {
  if( is_page_template('page-anchor.php') ){
    include( get_stylesheet_directory() . '/lib/anchor-links/anchor-links.php' );
  }
}
add_action( 'wp_enqueue_scripts', 'system2018_enqueue_scripts' );

if ( ! function_exists( 'system2018_admin_header_style' ) ) :
  /**
   * Style the header image displayed on the Appearance > Header admin panel.
   *
   * Referenced via add_custom_image_header() in system2018_setup().
   *
   */
  function system2018_admin_header_style() {
  ?>
  <style type="text/css" id="system2018-admin-header-css">
  /* Shows the same border as on front end */
  #headimg {
  border-bottom: 1px solid #000;
  border-top: 4px solid #000;
  }
  /* If header-text was supported, you would style the text with these selectors:
  #headimg #name { }
  #headimg #desc { }
  */
  </style>
  <?php
  }
endif;

/**
 * Expand the width of the Gutenberg Editor
 */
function system2018_admin_styles()
{
  echo '
        <style>
            /* Main column width */
            .wp-block {
                max-width: 1080px;
            }
 
            /* Width of "wide" blocks */
            .wp-block[data-align="wide"] {
                max-width: 1080px;
            }
 
            /* Width of "full-wide" blocks */
            .wp-block[data-align="full"] {
                max-width: none;
            }	
        </style>
    ';
}

add_action('admin_head', 'system2018_admin_styles');

/**
 * Set the post excerpt length to 40 characters.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 *
 *
 */
function system2018_excerpt_length( $length ) {
  return 40;
}
add_filter( 'excerpt_length', 'system2018_excerpt_length' );

if ( ! function_exists( 'system2018_continue_reading_link' ) ) :
  /**
   * Return a "Continue Reading" link for excerpts.
   *
   * @return string The "Continue Reading" HTML link.
   */
  function system2018_continue_reading_link() {
    return ' ';
  }
endif;

/**
 * Replace "[...]" with an ellipsis and system2018_continue_reading_link().
 *
 * "[...]" is appended to automatically generated excerpts.
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 */
function system2018_auto_excerpt_more( $more ) {
  if ( ! is_admin() ) {
    return ' &hellip;' . system2018_continue_reading_link();
  }
  return $more;
}
add_filter( 'excerpt_more', 'system2018_auto_excerpt_more' );

/**
 * Add a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 *
 */
function system2018_custom_excerpt_more( $output ) {
  if ( has_excerpt() && ! is_attachment() && ! is_admin() ) {
    $output .= system2018_continue_reading_link();
  }
  return $output;
}
add_filter( 'get_the_excerpt', 'system2018_custom_excerpt_more' );

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override system2018_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 *
 */
function system2018_widgets_init() {
  // Area 1, located at the top of the sidebar.
  register_sidebar(
    array(
      'name'          => __( 'Primary Widget Area', 'system2018' ),
      'id'            => 'primary-widget-area',
      'description'   => __( 'Add widgets here to appear in your sidebar.', 'system2018' ),
      'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
      'after_widget'  => '</li>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    )
  );
  // Area 2, located in the footer. Empty by default.
  register_sidebar(
    array(
      'name'          => __( 'Footer Widget Area', 'system2018' ),
      'id'            => 'footer-widget-area',
      'description'   => __( 'An optional widget area for your site footer.', 'system2018' ),
      'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
      'after_widget'  => '</li>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    )
  );

  // Area 3, located on the homepage. Empty by default.
  register_sidebar(
    array(
      'name'          => __( 'Homepage Widget Area', 'system2018' ),
      'id'            => 'homepage-widget-area',
      'description'   => __( 'An optional widget area for your site homepage.', 'system2018' ),
      'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
      'after_widget'  => '</li>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    )
  );

  // Area 4, located on the footer. Empty by default.
  register_sidebar(
    array(
      'name'          => __('Footer Widget Area Full Width', 'system2018'),
      'id'            => 'full-footer-widget-area',
      'description'   => __('A widget area for your footer that takes up the whole width of the container.', 'system2018'),
      'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
      'after_widget'  => '</li>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    )
  );

}
/** Register sidebars by running system2018_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'system2018_widgets_init' );

/**
 * Remove the default styles that are packaged with the Recent Comments widget.
 *
 * To override this in a child theme, remove the filter and optionally add your own
 * function tied to the widgets_init action hook.
 *
 * This function uses a filter (show_recent_comments_widget_style) new in WordPress 3.1
 * to remove the default style. Using System 2018 1.2 in WordPress 3.0 will show the styles,
 * but they won't have any effect on the widget in default System 2018 styling.
 *
 */
function system2018_remove_recent_comments_style() {
  add_filter( 'show_recent_comments_widget_style', '__return_false' );
}
add_action( 'widgets_init', 'system2018_remove_recent_comments_style' );

if ( ! function_exists( 'system2018_posted_on' ) ) :
  /**
   * Print HTML with meta information for the current post-date/time and author.
   *
   */
  function system2018_posted_on() {
    printf(
      __( '<span class="posted-on"><span class="%1$s"><span class="fa fa-clock-o" aria-hidden="true"></span></span> %2$s</span>', 'system2018' ),
      'meta-prep',
      sprintf(
        '<span class="entry-date">%3$s</span>',
        get_permalink(),
        esc_attr( get_the_time() ),
        get_the_date()
      ),
      sprintf(
        '<span class="author vcard"></span>',
        get_author_posts_url( get_the_author_meta( 'ID' ) ),
        esc_attr( sprintf( __( 'View all posts by %s', 'system2018' ), get_the_author() ) ),
        get_the_author()
      )
    );
  }
endif;

if ( ! function_exists( 'system2018_categories' ) ) :
    /**
     * Print HTML with meta information for the current categories.
     *
     */
    function system2018_categories() {
        if ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
            $posted_in = __( '<span class="categories"><span class="fa fa-tags" aria-hidden="true"></span> %1$s</span>', 'system2018' );
        } else {
            $posted_in = __( '', 'system2018' );
        }
        // Prints the string, replacing the placeholders.
        printf(
            $posted_in,
            get_the_category_list( ', ' ),
            get_permalink(),
            the_title_attribute( 'echo=0' )
        );
    }
endif;

if ( ! function_exists( 'system2018_faq_topics' ) ) :
    /**
     * Print HTML with meta information for the current categories.
     *
     */
    function system2018_faq_topics() {

        global $post;
        if ( is_object_in_taxonomy( get_post_type(), 'faq-topics' ) ) {
            $posted_in = __( '<span class="faq-topics"><span class="fa fa-question" aria-hidden="true"></span> %1$s</span>', 'system2018' );
        } else {
            $posted_in = __( '', 'system2018' );
        }
        // Prints the string, replacing the placeholders.
        printf(
            $posted_in,
            get_the_term_list( $post->ID, 'faq-topics','',', ' ),
            get_permalink(),
            the_title_attribute( 'echo=0' )
        );
    }
endif;

if ( ! function_exists( 'system2018_posted_in' ) ) :
  /**
   * Print HTML with meta information for the current post (category, tags and permalink).
   *
   */
  function system2018_posted_in() {
    // Retrieves tag list of current post, separated by commas.
    $tag_list = get_the_tag_list( '', ', ' );
    if ( $tag_list && ! is_wp_error( $tag_list ) ) {
      $posted_in = __( '%2$s', 'system2018' );
    /*} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
      $posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'system2018' );*/
    } else {
      $posted_in = __( '', 'system2018' );
    }
    // Prints the string, replacing the placeholders.
    printf(
      $posted_in,
      get_the_category_list( ' ' ),
      $tag_list,
      get_permalink(),
      the_title_attribute( 'echo=0' )
    );
  }
endif;

/**
 * Retrieve the IDs for images in a gallery.
 *
 */
function system2018_get_gallery_images() {
  $images = array();

  if ( function_exists( 'get_post_galleries' ) ) {
    $galleries = get_post_galleries( get_the_ID(), false );
    if ( isset( $galleries[0]['ids'] ) ) {
      $images = explode( ',', $galleries[0]['ids'] );
    }
  } else {
    $pattern = get_shortcode_regex();
    preg_match( "/$pattern/s", get_the_content(), $match );
    $atts = shortcode_parse_atts( $match[3] );
    if ( isset( $atts['ids'] ) ) {
      $images = explode( ',', $atts['ids'] );
    }
  }

  if ( ! $images ) {
    $images = get_posts(
      array(
        'fields'         => 'ids',
        'numberposts'    => 999,
        'order'          => 'ASC',
        'orderby'        => 'menu_order',
        'post_mime_type' => 'image',
        'post_parent'    => get_the_ID(),
        'post_type'      => 'attachment',
      )
    );
  }

  return $images;
}

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 *
 */
function system2018_widget_tag_cloud_args( $args ) {
  $args['largest']  = 22;
  $args['smallest'] = 8;
  $args['unit']     = 'pt';
  $args['format']   = 'list';

  return $args;
}
add_filter( 'widget_tag_cloud_args', 'system2018_widget_tag_cloud_args' );

/**
 *
 * Add default pages to theme
 *
 */
// On theme activation, create some default content if it doesn't exist
function system2018_create_default_pages($old_name, $old_theme = false) {
    // List of default pages to create
    $default_pages = array(
        array(
            'name' => "Home",
            'content' => "<p>This is your home page. Insert a featured image and drop in some content.</p>",
        ),
        array(
            'name' => "About",
            'content' => "<p>Insert content about your department here. <a href='http://hawaii.edu/access/' title='accessibility at UH'>Accessibility notes</a></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>",
        ),
        array(
            'name' => "News",
            'content' => "<p>This can be your blog or news page. You can set this as your posts page in WP Dashboard > Settings > Reading. You can also rename the page.</p>",
        ),
    );

    // Create default pages if they don't already exist
    $all_pages = get_pages(array(
        'post_type' => 'page',
        'post_status' => 'publish,private',
    ));
    foreach($default_pages as $new_page) {
        $page_exists = false;
        foreach ($all_pages as $page) {
            if ($page->post_title == $new_page['name']) {
                $page_exists = true;
                break;
            }
        }
        if (!$page_exists) {
            wp_insert_post(array(
                'post_title' => $new_page['name'],
                'post_name' => sanitize_title($new_page['name']),
                'post_status' => 'publish',
                'post_type' => 'page',
                'post_content' => $new_page['content'],
            ));
        }
    }
      // Use a static front page
    $home = get_page_by_title( 'Home' );
    update_option( 'page_on_front', $home->ID );
    update_option( 'show_on_front', 'page' );
}
add_action("after_switch_theme", "system2018_create_default_pages", 10, 2);


/**
 * Prints breadcrumbs.
 */
if ( ! function_exists( 'system2018_get_breadcrumbs') ) :
function system2018_get_breadcrumbs() {

    // Settings
    $separator          = '<span class="fa fa-angle-right" aria-hidden="true" title="breadcrumb-separator"></span>';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = 'Home';

    // Get the query & post information
    global $post,$wp_query;

    // Do not display on the homepage
    if ( !is_front_page() ) {

        // Build the breadcrums
        echo '<nav aria-label="Breadcrumb" id="' . $breadcrums_id . '">';
        echo '<ol class="' . $breadcrums_class . '">';

        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        echo '<li class="separator separator-home"> ' . $separator . ' </li>';

        if ( is_home() ) {

            echo '<li class="item-current item-posts" aria-current="page"><span class="bread-current bread-posts">' . single_post_title() . '</span></li>';

        } elseif ( is_archive() ) {

            echo '<li class="item-current item-archive" aria-current="page"><span class="bread-current bread-archive">' . get_the_archive_title() . '</span></li>';

        } else if ( is_single() ) {

            $posts_page = get_option( 'page_for_posts', true );
            $our_title = get_the_title( $posts_page );
            $posts_url = get_permalink( $posts_page );
            $posts_type = get_post_type_object(get_post_type());
            $post_type_title = esc_html($posts_type->label);

            echo '<li class="item-posts"><a class="bread-link" href="' . get_post_type_archive_link(get_post_type()) . '" title="' . $post_type_title . '">'. $post_type_title . '</a></li>';
            echo '<li class="separator"> ' . $separator . ' </li>';
            echo '<li class="item-current item-post" aria-current="page"><span class="bread-current bread-post">' . get_the_title() . '</span></li>';

        } else if ( is_page() ) {

            // Standard page
            if( $post->post_parent ){

                // If child page, get parents
                $anc = get_post_ancestors( $post->ID );

                // Get parents in the right order
                $anc = array_reverse($anc);

                // Parent page loop
                foreach ( $anc as $ancestor ) {
                    echo '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    echo '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }

                // Current page
                echo '<li class="item-current item-page" aria-current="page"><span class="bread-current bread-page"> ' . get_the_title() . '</span></li>';

            } else {

                // Just display current page if not parents
                echo '<li class="item-current item-page" aria-current="page"><span class="bread-current bread-page"> ' . get_the_title() . '</span></li>';

            }

        } else if ( get_query_var('paged') ) {

            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '" aria-current="page"><span class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</span></li>';

        } else if ( is_search() ) {

            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '" aria-current="page"><span class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</span></li>';

        } elseif ( is_404() ) {

            // 404 page
            echo '<li aria-current="page">' . 'Error 404' . '</li>';
        }

        echo '</ol>';
        echo '</nav>';

    }
}
endif;

/**
 * Hide menu items from non-superadmins
 */
function my_remove_menu_pages() {

    global $user_ID;

    if ( !is_super_admin() ) {
        remove_menu_page( 'plugins.php' );
        remove_submenu_page( 'themes.php', 'themes.php' );
        remove_submenu_page( 'themes.php', 'nav-menus.php' );
        remove_submenu_page( 'themes.php', 'widgets.php' );
        remove_submenu_page( 'tools.php', 'ms-delete-site.php');
    }
}
add_action( 'admin_init', 'my_remove_menu_pages' );

// disable all comments
add_action('admin_init', function () {
    // Redirect any user trying to access comments page
    global $pagenow;

    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }

    // Remove comments metabox from dashboard
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

    // Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});

/**
 * Edit Customize panel
 */
function system2018_customize_register( $wp_customize ) {
    // hide custom css
    $wp_customize->remove_section( 'custom_css' );
    // remove site icon
    $wp_customize->remove_control('site_icon');

    $wp_customize->add_setting('banner_image');
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'banner_image_control', array(
      'label' => __('Banner Image', 'system2018'),
      'section' => 'title_tagline',
      'settings' => 'banner_image',
    )));
    
    $wp_customize->add_section( 'contact-info' , array(
        'title' => __( 'Contact Information', 'system2018' ),
        'description' => __( 'Input your unit contact and social media information. Save/Publish to make sure your information displays. If you do not have a social media account or do not want to display it, leave the field blank.', 'system2018' )
    ) );

    // Add Global Fields to Customizer.
    // Add Address Line 1
    $wp_customize->add_setting( 'address' , array( 'default' => 'XXX Campus Road, Building Rm #' ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'address', array(
        'label' => __( 'Address Line 1', 'system2018' ),
        'section' => 'contact-info',
        'settings' => 'address',
    ) ) );
    // Add Address Line 2
    $wp_customize->add_setting( 'office' , array( 'default' => 'Building, Room #' ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'office', array(
        'label' => __( 'Address Line 2', 'system2018' ),
        'section' => 'contact-info',
        'settings' => 'office',
    ) ) );
    // Add Address Line 3
    $wp_customize->add_setting( 'city' , array( 'default' => 'Honolulu, Hawai‘i 96822' ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'city', array(
        'label' => __( 'Address Line 3', 'system2018' ),
        'section' => 'contact-info',
        'settings' => 'city',
    ) ) );
    // Telephone
    $wp_customize->add_setting( 'telephone' , array( 'default' => '(808) 956-XXXX' ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'telephone', array(
        'label' => __( 'Telephone', 'system2018' ),
        'section' => 'contact-info',
        'settings' => 'telephone',
    ) ) );
     // Fax
    $wp_customize->add_setting( 'fax' , array( 'default' => '(808) 956-0000' ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fax', array(
        'label' => __( 'Fax', 'system2018' ),
        'section' => 'contact-info',
        'settings' => 'fax',
    ) ) );
    // Email
    $wp_customize->add_setting( 'email' , array( 'default' => 'email@hawaii.edu' ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'email', array(
        'label' => __( 'Email', 'system2018' ),
        'section' => 'contact-info',
        'settings' => 'email',
    ) ) );
        // Flickr
    $wp_customize->add_setting( 'flickr' , array( 'default' => '' ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'flickr', array(
        'label' => __( 'Flickr', 'system2018' ),
        'section' => 'contact-info',
        'settings' => 'flickr',
        'description' => 'Your flickr username.'
    ) ) );
    // Instagram
    $wp_customize->add_setting( 'instagram' , array( 'default' => '' ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'instagram', array(
        'label' => __( 'Instagram', 'system2018' ),
        'section' => 'contact-info',
        'settings' => 'instagram',
        'description' => 'Your Instagram username.'
    ) ) );
    // Twitter
    $wp_customize->add_setting( 'twitter' , array( 'default' => '' ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'twitter', array(
        'label' => __( 'Twitter', 'system2018' ),
        'section' => 'contact-info',
        'settings' => 'twitter',
        'description' => 'Your Twitter handle.'
    ) ) );
    // Facebook
    $wp_customize->add_setting( 'facebook' , array( 'default' => '' ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'facebook', array(
        'label' => __( 'Facebook', 'system2018' ),
        'section' => 'contact-info',
        'settings' => 'facebook',
        'description' => 'Your Facebook handle.'
    ) ) );
    // YouTube
    $wp_customize->add_setting( 'youtube' , array( 'default' => '' ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'youtube', array(
        'label' => __( 'YouTube', 'system2018' ),
        'section' => 'contact-info',
        'settings' => 'youtube',
        'description' => 'Your YouTube username.'
    ) ) );
    $wp_customize->add_setting('display_home_widget', array(
        'default'    => '1'
    ));
    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        'display_home_widget',
        array(
          'label'     => __('Display home widget as sidebar', 'system2018'),
          'section'   => 'static_front_page',
          'settings'  => 'display_home_widget',
          'type'      => 'checkbox',
        )
      )
    );
    $wp_customize->add_setting('display_footer_widget', array(
      'default'    => 1
    ));
    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        'display_footer_widget',
        array(
          'label'     => __('Display footer widget area', 'system2018'),
          'section'   => 'static_front_page',
          'settings'  => 'display_footer_widget',
          'type'      => 'checkbox',
        )
      )
    );
    $wp_customize->add_setting('display_new_footer_widget', array(
      'default'    => 0
    ));
    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        'display_new_footer_widget',
        array(
          'label'     => __('Display full-width footer widget area', 'system2018'),
          'section'   => 'static_front_page',
          'settings'  => 'display_new_footer_widget',
          'type'      => 'checkbox',
        )
      )
    );
}
add_action( 'customize_register', 'system2018_customize_register' );

// Add menu order to posts to organize archive pages
add_action( 'admin_init', 'add_posts_order' );
function add_posts_order()
{
    add_post_type_support( 'post', 'page-attributes' );
}

// order posts on archive pages by menu order
add_action( 'pre_get_posts', 'my_change_sort_order');
function my_change_sort_order($query){
    if(is_archive()):
     //If you wanted it for the archive of a custom post type use: is_post_type_archive( $post_type )
       //Set the order ASC or DESC
       $query->set( 'order', 'ASC' );
       //Set the orderby
       $query->set( 'orderby', 'menu_order' );
    endif;
}

// REGISTER NEW TAXONOMIES
// create two taxonomies, genres and writers for the post type "book"
function custom_taxonomies() {

  // Add new gen ed taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name'                       => _x( 'FAQ Topics', 'taxonomy general name', 'textdomain' ),
    'singular_name'              => _x( 'FAQ Topic', 'taxonomy singular name', 'text_domain' ),
    'search_items'               => __( 'Search FAQ Topics', 'text_domain' ),
    'popular_items'              => __( 'Popular FAQ Topics', 'text_domain' ),
    'all_items'                  => __( 'All FAQ Topics', 'text_domain' ),
    'parent_item'                => null,
    'parent_item_colon'          => null,
    'edit_item'                  => __( 'Edit FAQ Topic', 'text_domain' ),
    'update_item'                => __( 'Update FAQ Topic', 'text_domain' ),
    'add_new_item'               => __( 'Add New FAQ Topic', 'text_domain' ),
    'new_item_name'              => __( 'New FAQ Topic', 'text_domain' ),
    'separate_items_with_commas' => __( 'Separate FAQ Topics with commas', 'text_domain' ),
    'add_or_remove_items'        => __( 'Add or remove FAQ Topics', 'text_domain' ),
    'choose_from_most_used'      => __( 'Choose from the most used FAQ Topics', 'text_domain' ),
    'not_found'                  => __( 'No FAQ Topics found.', 'text_domain' ),
    'menu_name'                  => __( 'FAQ Topics', 'text_domain' ),
  );
  $args = array(
    'hierarchical'          => true,
    'labels'                => $labels,
    'show_ui'               => true,
    'show_admin_column'     => true,
    'show_in_nav_menus'     => true,
    'show_tagcloud'         => false,
    'update_count_callback' => '_update_post_term_count',
    'query_var'             => true,
    'rewrite'               => array( 'slug' => 'faq-topics' ),
  );

  register_taxonomy( 'faq-topics', array('post'), $args );
}
// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'custom_taxonomies', 0 );


// Edit cache for RSS feeds for ITS site
add_filter( 'wp_feed_cache_transient_lifetime', create_function('$a', 'return 300;') );


/**
 * Register Articles Post Type
 */
function systems_articles_init() {
  $labels = array(
      'name'                  => _x( 'Articles', 'Post type general name', 'article' ),
      'singular_name'         => _x( 'Article', 'Post type singular name', 'article' ),
      'menu_name'             => _x( 'Articles', 'Admin Menu text', 'article' ),
      'name_admin_bar'        => _x( 'Article', 'Add New on Toolbar', 'article' ),
      'add_new'               => __( 'Add New', 'article' ),
      'add_new_item'          => __( 'Add New Article', 'article' ),
      'new_item'              => __( 'New Article', 'article' ),
      'edit_item'             => __( 'Edit Article', 'article' ),
      'view_item'             => __( 'View Article', 'article' ),
      'all_items'             => __( 'All Articles', 'article' ),
      'search_items'          => __( 'Search Articles', 'article' ),
      'parent_item_colon'     => __( 'Parent Articles:', 'article' ),
      'not_found'             => __( 'No articles found.', 'article' ),
      'not_found_in_trash'    => __( 'No articles found in Trash.', 'article' ),
      'featured_image'        => _x( 'Article Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'article' ),
      'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'article' ),
      'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'article' ),
      'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'article' ),
      'archives'              => _x( 'Article archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'article' ),
      'insert_into_item'      => _x( 'Insert into article', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'article' ),
      'uploaded_to_this_item' => _x( 'Uploaded to this article', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'article' ),
      'filter_items_list'     => _x( 'Filter articles list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'article' ),
      'items_list_navigation' => _x( 'Articles list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'article' ),
      'items_list'            => _x( 'Articles list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'article' ),
  );     
  $args = array(
      'labels'             => $labels,
      'description'        => 'Article custom post type.',
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'rewrite'            => array( 'slug' => 'article' ),
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => 20,
      'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields' ),
      'taxonomies'         => array( 'category', 'tag' ),
      'show_in_rest'       => true
  );
    
  register_post_type( 'Article', $args );
}
add_action( 'init', 'systems_articles_init' );

/** Include Article in Tags and Categories */
function article_custom_type_in_categories( $query ) {
  if ( $query->is_main_query()
  && ( $query->is_category() || $query->is_tag() ) ) {
      $query->set( 'post_type', array( 'post', 'article' ) );
  }
}
add_action( 'pre_get_posts', 'article_custom_type_in_categories' );

function article_post_types_order($wp_query)
{
  if (!is_admin() && $wp_query->is_main_query()) {
    $post_type = $wp_query->query['post_type'];
    if ($post_type == 'article') {
      $wp_query->set('orderby', 'date');
      $wp_query->set('order', 'DESC');
    }
  }
}

add_filter('pre_get_posts', 'article_post_types_order');


/** Custom Search for Article*/
function search_article($template)   
{    
  global $wp_query;   
  $post_type = get_query_var('post_type');   
  if( $wp_query->is_search && $post_type == 'article' )   
  {
    return locate_template('search-article.php');  //  redirect to archive-search.php
  }   
  return $template;   
}
add_filter('template_include', 'search_article');

/** Create Tag Taxonomy for Articles */
add_action( 'init', 'create_tag_taxonomies', 0 );

function create_tag_taxonomies() 
{
  $labels = array(
    'name' => _x( 'Article Tags', 'taxonomy general name' ),
    'singular_name' => _x( 'Article Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Tags' ),
    'popular_items' => __( 'Popular Tags' ),
    'all_items' => __( 'All Tags' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Tag' ), 
    'update_item' => __( 'Update Tag' ),
    'add_new_item' => __( 'Add New Tag' ),
    'new_item_name' => __( 'New Tag Name' ),
    'separate_items_with_commas' => __( 'Separate tags with commas' ),
    'add_or_remove_items' => __( 'Add or remove tags' ),
    'choose_from_most_used' => __( 'Choose from the most used tags' ),
    'menu_name' => __( 'Article Tags' ),
  ); 

  register_taxonomy('article-tag','article',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'rewrite' => array( 'slug' => 'article-tag' ),
  ));
}

/**Register Block Styles */
wp_register_style('uh-style', get_template_directory_uri() . '/css/uh-blocks/blocks.css');
add_action('init', function () {
  register_block_style(
    'core/paragraph',
    array(
      'name'         => 'uh-notice-general',
      'label'        => 'General Notice',
      'style_handle' => 'uh-style',
    )
  );

  register_block_style(
    'core/paragraph',
    array(
      'name'         => 'uh-notice-warning',
      'label'        => 'Warning Notice',
      'style_handle' => 'uh-style',
    )
  );

  register_block_style(
    'core/list',
    array(
      'name'         => 'uh-list',
      'label'        => 'UH List',
      'style_handle' => 'uh-style',
    )
  );

  register_block_style(
    'core/group',
    array(
      'name'         => 'uh-full-width-group',
      'label'        => 'Full Width',
      'style_handle' => 'uh-style',
    )
  );
});

/** Featured Posts */
include 'featured-posts/featured_posts.php';


/** Widgets */
 include 'widgets/contact_us.php';


?>