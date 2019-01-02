<?php


?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="fa-events-icons-ready">
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php
    /*
             * Print the <title> tag based on what is being viewed.
             */
            global $page, $paged;

            wp_title('|', true, 'right');

    // Add the blog name.
            bloginfo('name');

    // Add the blog description for the home/front page.
            $site_description = get_bloginfo('description', 'display');
            if ($site_description && (is_home() || is_front_page())) {
                echo " | $site_description";
            }

    // Add a page number if necessary:
            if (($paged >= 2 || $page >= 2) && !is_404()) {
                echo esc_html(' | ' . sprintf(__('Page %s', 'system2018'), max($paged, $page)));
            }
            ?>
    </title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/webdev.css">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/icon.png" />
    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/menu.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700" rel="stylesheet">
    <script src="https://use.fontawesome.com/bfcbe1540c.js"></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>><a href="#main_area" id="skip2main">Skip to Main Content</a>
    <header id="top">
        <div id="header_top">
            <div id="header_top_content">
            <ul id="header_mainmenu">
                <li><a href="https://www.hawaii.edu/">Home</a></li>
                <li><a href="https://www.hawaii.edu/calendar/">Calendar</a></li>
                <li><a href="https://www.hawaii.edu/directory/">Directory</a></li>
                <li><a href="https://myuh.hawaii.edu/">MyUH</a></li>
                <li><a href="http://workatuh.hawaii.edu/">Work at UH</a></li>
            </ul>
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
        <div id="header_mid">
            <div class="container">
            <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" >
                <img id="header_mid_logo" src="<?php echo get_template_directory_uri(); ?>/images/uh-nameplate.png" srcset="<?php echo get_template_directory_uri(); ?>/images/uh-nameplate.png 1x, <?php echo get_template_directory_uri(); ?>/images/uh-nameplate-2x.png 2x" alt="University of Hawai&#699;i at M&#257;noa" />
            </a>
            <?php get_search_form(); ?>
            </div>
        </div>
        <div id="department_name">
            <div class="container">
                <div class="site-name-description">
                    <h1 id="header_sitename">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                    </h1>
                    <?php if ($site_description) : ?>
                    <div id="header_sitedescription">
                        <?php echo $site_description; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <nav id="header_btm">
            <button class="menu-toggle" aria-expanded="false">Menu <span class="screen-reader-text">Open Mobile Menu</span></button>
            <?php if (has_nav_menu('primary')) : ?>

            <div id="header_btm_content">
                <?php wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'menu_id' => 'header_sitemenu',
                        'container' => false,
                        'container_id' => false,
                        'depth' => 2
                    )
                ); ?>
            </div>

            <?php else : ?>

            <?php $menu = array(
                'depth' => 1,
                'sort_column' => 'menu_order, post_title',
                'menu_class' => 'menu page-menu',
                'menu_id' => 'header_btm_content',
                'echo' => 1,
                'authors' => '',
                'sort_column' => 'menu_order',
                'link_before' => '',
                'link_after' => '',
            );
            wp_page_menu($menu); ?>

            <?php endif; ?>

            <?php get_search_form(); ?>
        </nav>
    </header>

    <main id="main_area">
        <div id="main_content">
            <div id="content">
                <?php system2018_get_breadcrumbs(); ?>
                <h1 class="entry-title">Web Developer Accessibility</h1>
                <section id="intro" aria-labelledby="intro-heading">
                    <h1 id="entry-title intro-heading">Introduction</h1>
                    <p>Web accessibility refers to the inclusive practice of removing barriers that prevent interaction with, or access to websites, by people with disabilities. When sites are correctly designed, developed, and edited, all users have equal access to information and functionality.</p>
                    <p>While a lot of documentation currently exists online describing how to create accessible web-based content, a lot of it is arguably hard to digest and doesn’t address the “how-to” in a concise and practical way. This document aims to provide an easy general guideline for UH web-developers to follow when creating their web-applications and static-pages.</p>
                </section>

                <section id="scanner-issue" aria-labelledby="scanner-heading">
                    <h2 id="scanner-heading">The Scanner "Issue"</h2>
                    <p>Many web developers often turn to one of the many available automatic web-accessibility checkers such as <a href="https://developers.google.com/web/tools/lighthouse/" target="_blank" rel="noopener">Google Lighthouse</a>, <a href="https://chrome.google.com/webstore/detail/siteimprove-accessibility/efcfolpjihicnikpmhnmphjhhpiclljc?hl=en-US" target="_blank" rel="noopener">Siteimprove's Chrome extension</a>, or an online tool like <a href="https://achecker.ca/checker/index.php" target="_blank" rel="noopener">'acheckera''</a>. While these tools are incredibly helpful and should be in every front-end web-developer’s toolkit, they cannot be solely relied on when ensuring that web-content is accessible. </p>
                    <p>Scanners are fantastic at ensuring big ticket items like alt-text, color contrast ratios, and aria-roles are all being used properly, but they can’t cover the entire spectrum of what makes a site accessible. Some things not checked include: <strong>ARIA landmarks, keyboard navigation, focus state indicators, hidden-state checking</strong> and various others that this article will quickly address.</p>
                </section>

                <section id="landmarks" aria-labelledby="landmarks-heading">
                    <h2 id="landmarks-heading">ARIA Landmarks &amp; Semantic HTML</h2>
                    <p>An aspect that makes web-pages truly accessible are ARIA landmarks. You can think of ARIA landmarks as a form of "table of contents" for screen-reader users. They effectively allow screen-readers to jump around to logical sections of a page in a quick fashion. Without landmarks, a screen-reader user would be read giant blocks of text when they navigate to the main content of a page.</p>

                    <pre>
                        <code class="language-html">
                        &lt;body>
                            &lt;div id="header">
                                &lt;div id="top-nav">

                                &lt;/div>
                            &lt;/div>

                            &lt;div class="page-container">
                                &lt;div id="main-content">

                                &lt;/div>

                                &lt;div id="sidebar">

                                &lt;/div>
                            &lt;/div>

                            &lt;div id="footer">

                            &lt;/div>
                        &lt;/body>
                        </code>
                    </pre>
                    <span class="code-caption">An example of common unaccessible markup. To make this accessible, add “role” attributes on each div.</span>

                    <p>The easiest way to implement ARIA landmarks is to simply use the semantic tags that HTML5 comes with out of the box. Using semantic tags eliminates the need to remember different ARIA roles such as “banner” and “complementary”, and instead allows you to compose your document with easier to remember tags such as <code class="language-html">&lt;header&gt;</code>, <code class="language-html">&lt;main&gt;</code>, and <code class="language-html">&lt;aside&gt;</code>. When combined with your favorite HTML linter, you can easily ensure your markup is semantic and properly written.</p>

                    <pre>
                        <code class="language-html">
                        &lt;body>
                            &lt;header>
                                &lt;nav>

                                &lt;/nav>
                            &lt;/header>

                            &lt;div class="page-container">
                                &lt;main>

                                &lt;/main>

                                &lt;aside>

                                &lt;/aside>
                            &lt;/div>

                            &lt;footer>

                            &lt;/footer>
                        &lt;/body>
                        </code>
                    </pre>
                    <span class="code-caption">An example of accessible markup. Accessible technologies know where the main page content is as well as supplementary material.</span>
                    <p>To handle the aforementioned case of “reading a giant block of text”, developers can rely on tags such as <code class="language-html">&lt;article&gt;</code> and <code class="language-html">&lt;section&gt;</code> to cut their documents into logical chunks. When using these tags, developers need to ensure that they are labeling and using them properly as just using them isn’t enough to be accessible.</p>

                    <pre>
                        <code class="language-html">
                        &lt;main>
                            &lt;article id="what-accessibility" aria-labelledby="accessibility-heading">

                            &lt;h2 id="accessibility-heading">What makes an accessible page?&lt;/h2>
                            &lt;p class="body-text">Read on to find out&lt;/p>

                            &lt;section id="intro" aria-labelledby="intro-heading">
                                &lt;h3 id="intro-heading">Semantic markup&lt;/h3>
                            &lt;/section>

                            &lt;/article>
                        &lt;/main>
                        </code>
                    </pre>
                    <span class="code-caption">An example of sectioning off logical chunks in your markup.</span>
                    <p>There are plenty of general good HTML practices that accessibility calls for, but the gist of it goes as follows:</p>
                    <ol>
                    <li>
                        <strong>Use semantic tags properly.</strong> Try to reserve <code class="language-html">&lt;div&gt;</code>’s purely for layout and styling reasons as much as possible. Refer to this helpful MDN article for a list of all semantic tags. Remember to adhere to limits on tags like <code class="language-html">&lt;main&gt;</code>!
                    </li>
                    <li>
                        <strong>Label your elements.</strong> Use “aria-label” and “aria-labelledby” liberally. Refer to the above markup for a practical example.
                    </li>
                    <li>
                        <strong>Structure your content.</strong> Layout your HTML in a way that makes sense. Headings come first, followed by paragraph text, etc.. If you remove your CSS files from your site, your web content should still follow a logical and sensible reading order.
                    </li>
                    </ol>
                    <p>Semantic and well structured HTML is almost the entirety of the accessibility battle. While there are definitely other nuances to accessibility that aren’t covered purely by HTML (‘position: absolute’, AJAX, and dynamically displayed content), well structured markup is the building block for accessible web content.</p>
                </section>

                <section id="keyboard" aria-labelledby="keyboard-heading">
                    <h2 id="keyboard-heading">Keyboard Navigation &amp; Focus State</h2>
                    <p>Users with motor impairments may rely on a keyboard or switch device to navigate web content, so establishing an accessible navigation layout is imperative to ensuring an accessible experience for all users.</p>
                    <p>As a keyboard navigator traverses through a webpage, they <strong>focus</strong> on various interactive controls that are displayed on a page such as links, inputs, and buttons. It’s important to ensure that every item that is focusable has a clearly defined <strong><em>focus indicator</em></strong>. By default, web browsers usually ship with a default set of style definitions that will handle this for developers. For example, Chrome’s blue outline and Firefox’s dashed border are two “out-of-the-box” focus indicators. However, these default styles are often overwritten via CSS, which poses a problem if handled improperly.</p>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/chromefocus.png" alt="Example of Chrome's blue outline focus indicator" class="example-photo">
                    <span class="code-caption">Chrome's default focus outline indicator</span>
                    <p>This isn’t to say developers <em>have</em> to use the default focus indicators built in to their browsers. One common example of focus on <code class="language-html">&lt;button&gt;</code> elements is an outline. However, this can sometimes be a visually undesireable effect that clashes with the visual theme your content is going for. Instead of just removing the outline via <code class="language-css">outline: none;</code> in CSS, consider creating an effect like darkening or lightening the background or even scaling the size of the button on focus. For example:</p>
                    <div class="flex">
                    <pre>
                        <code class="language-css">
                            .primary-btn {
                                [...] /* other styles omitted for brevity */
                                background: linear-gradient(-180deg, #636abd, #474fac);
                                outline: none;
                            }

                            .primary-btn:focus {
                                background: linear-gradient(-180deg, #6e76d1, #545eca); /* lighten the background */
                                transform: translateY(-1px) scale(1.05); /* slightly raise and increase the size */
                            }
                        </code>
                    </pre>
                    <button class="primary-btn">Focus Me!</button>
                    </div>
                    <p>Can be an alternative that still provides a clear indication of focus to a user while removing the default focus styling.</p>
                </section>

                <section id="dom-order" aria-labelledby="dom-order-heading">
                    <h2 id="dom-order-heading">DOM Order</h2>
                    <p>DOM order can generally be referred to as the order in which elements are written in your HTML. For example, consider the following markup:</p>
                    <pre>
                    <code class="language-html">
                        &lt;button class="primary-btn">First&lt;/button>
                        &lt;button class="primary-btn">Second&lt;/button>
                        &lt;button class="primary-btn">Third&lt;/button>
                    </code>
                    </pre>
                    <p>Pressing Tab will cause your focus to move through the buttons in an order you would expect.</p>
                    <div class="buttons">
                    <button class="primary-btn">First</button>
                    <button class="primary-btn">Second</button>
                    <button class="primary-btn">Third</button>
                    </div>
                    <p>It’s important to be aware of common CSS rules that can sometimes “break” the corresponding DOM order and expected Tab order on your page. 3 of the most common ways to break this coupling of order is via: Floats, Flexbox, and CSS grid. The snippet below will result in a decoupling of DOM order and Tab order. Feel free to try tabbing through these buttons to see the disparity for yourself.</p>
                    <pre>
                    <code class="language-html">
                        &lt;div style="display: flex;">
                            &lt;button class="primary-btn" style="order: 3;">First&lt;/button>
                            &lt;button class="primary-btn">Second&lt;/button>
                            &lt;button class="primary-btn">Third&lt;/button>
                        &lt;/div>
                    </code>
                    </pre>
                    <div class="buttons" style="display: flex;">
                    <button class="primary-btn" style="order: 3;">First</button>
                    <button class="primary-btn">Second</button>
                    <button class="primary-btn">Third</button>
                    </div>
                </section>

                <section id="hidden-content" aria-labelledby="hidden-content-heading">
                    <h2 id="hidden-content-heading">Hidden Content &amp; tabindex</h2>
                    <p>In cases that developers have content that isn't currently displayed (but will be at some point) but also needs to be focus-navigable like a responsive side-nav, they would need to utilize the ‘tabindex’ HTML attribute to manage the focus of their page. Generally, whenever new or dynamic content is displayed on a page, it’s an accessible pattern to have the current focus jump to that new content.</p>
                    <p><strong>‘tabindex’</strong>, in conjunction with <a href="https://developer.mozilla.org/en-US/docs/Web/API/HTMLElement/focus" target="_blank" rel="noopener">focus()</a>, allows developers to explicitly handle tab ordering on their web-content when necessary.  ‘tabindex’ can be applied to any element — although it is not necessarily useful on every element — and takes a range of integer values.</p>
                    <p><strong>‘tabindex=0’:</strong> Inserts an element into the natural tab order. The element can be focused by pressing the Tab key, and the element can be focused by calling its <code class="language-javascript">focus()</code> method.</p>
                    <p><strong>‘tabindex=-1’:</strong> Removes an element from the natural tab order, but the element can still be focused by calling its <code class="language-javascript">focus()</code> method.</p>
                    <div class="negative">
                        <pre>
                            <code class="language-html">
                                &lt;button class="primary-btn" tabindex="-1">I'm not focusable&lt;/button>
                            </code>
                        </pre>

                        <button class="primary-btn" tabindex="-1">
                            I'm not focusable
                        </button>
                    </div>
                    <p>Any tabindex greater than 0 jumps the element to the front of the natural tab order. If there are multiple elements with a tabindex greater than 0, the tab order starts from the lowest value that is greater than zero and works its way up. Using a tabindex greater than 0 is considered an <strong>anti-pattern</strong>.</p>
                    <h3>Jumping Focus</h3>
                    <p>As mentioned earlier, whenever ‘dynamic’ content is shown on the page, it’s ideal to jump the current focus to that new content. To do this, you would select the content area, give it a tabindex of -1 so that it doesn't appear in the natural tab order, and call its <code class="language-javascript">focus()</code> method. Below is a snippet showing one way to accomplish this:</p>
                    <pre>
                        <code class='language-javascript'>
                            const dynamicButton = document.querySelector('#dynamic-toggler');
                            const hiddenContent = document.querySelector('.message');

                            dynamicButton.addEventListener('click', () => {
                                // toggle the visibility and opacity to show the item
                                hiddenContent.style.visibility = 'visible'; // visibility must be set before toggling focus
                                hiddenContent.style.opacity = '1';

                                hiddenContent.focus(); // &lt;- important!
                            })
                        </code>
                    </pre>
                    <span class="code-caption">If you are unfamiliar with arrow functions, you can refer to: <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Functions/Arrow_functions" target="_blank" rel="noopener noreferrer">https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Functions/Arrow_functions</a></span>

                    <p>You can also see this in action by clicking the button below. The focus will be indicated by a blue outline.</p>
                    <button class="primary-btn dynamic" id="dynamic-toggler">
                        Show Dynamic Content
                    </button>

                    <div class="message" tabindex="-1">
                        <h4>This Is Some Dynamic Content</h4>
                        <p>
                            You should see the focus indicator on this element. It is
                            indicated by a blue outline.
                        </p>
                        <a href="#" class="message-link">Focus Link</a>
                    </div>

                    <p>There are plenty of good practices when it comes to keyboard navigation and focus, but the gist of it goes as follows:</p>
                    <ol>
                    <li><strong>Ensure logical tab order.</strong> Tabbing through the page follows the visual layout. Users cannot focus on elements offscreen or hidden.</li>
                    <li><strong>All interactive controls are keyboard focusable.</strong> Ensure that there is an apparent focus indicator for all controls.</li>
                    <li><strong>Focus new content when it’s displayed.</strong> Use tabindex and <code class="language-javascript">focus()</code> to accomplish this.</li>
                    <li><strong>Avoid adding focus to non-interactive items.</strong> Headings and plain text generally do not need to be focusable.</li>
                    <li><strong>Prevent focus trapping.</strong> Ensure your keyboard users always have a method to escape or navigate through elements. Modals and dialogs are often culprits of this.</li>
                    </ol>
                </section>

                <section id="hidden-elements" aria-labelledby="hidden-elements-heading">
                    <h2 id="hidden-elements-heading">Handling Hidden Elements</h2>
                    <p>It is common for web content to dynamically display or render elements depending on certain criteria or conditions such as viewport width. Due to the increasing popularity and utilization of mobile browsers and various screen sizes, dynamic content has become more prominent than ever before. It is a web developers responsibility to ensure these types of content are still accessible while still providing rich user experiences.</p>
                    <p>Thankfully, browsers have a few native ways of signaling to assistive technologies when an element is hidden.</p>
                    <img class="hiddenElImg" src="<?php echo get_template_directory_uri(); ?>/images/hidden.png" alt="Use display: none or visibility: hidden to signal to assistive technologies when content is out of view.">
                    <p><code class="language-css">display: none;</code>This CSS rule will signal to assistive technologies that an element is to not be parsed. Keep in mind that <code class="language-css">display: none;</code> also removes an element from the document flow and will cause elements on the page to ‘shift’ if this is dynamically toggled.</p>
                    <p><code class="language-css">visibility: hidden;</code>This CSS rule will also signal to assistive technologies than an element is to not be parsed. This rule does not remove an element from the document flow and will prevent sudden shifting in your site.</p>
                    <img class="hiddenElImg" src="<?php echo get_template_directory_uri(); ?>/images/showing.png" alt="Use display: block or visibility: visible to signal to assistive technologies when content is out of view. As it implies, other display properties also work as well.">
                    <p><strong>HTML ‘hidden’ attribute.</strong> This attribute behaves similarly to <code class="language-css">display: none;</code>. It removes an element from the document flow and will cause elements to shift if it is dynamically added. Generally, you should try to use either of the two options above before reaching for this. </p>
                </section>

                <section id="conclusion" aria-labelledby="conclusion-heading">
                    <h2 id="conclusion-heading">Conclusion &amp; More Resources</h2>
                    <p>Web accessibility doesn’t need to be a daunting topic. While there is admittedly a lot of nuance and information to consider when it comes to accessibility, there are a lot of good general practices that will cover the majority of all web content. In general, ITS recommends:</p>
                    <ol>
                    <li><strong>Audit your site with an automated checker.</strong> Google Lighthouse or Siteimprove’s Chrome extension will give detailed reports on problem items and how to fix them.</li>
                    <li><strong>Create semantic HTML.</strong> Refer above for info on this.</li>
                    <li><strong>Test your site with a keyboard.</strong> Fix any focus issues you come across.</li>
                    <li><strong>Test your site with a screen reader.</strong> Ensure all content on the page is reachable with a screen reader.</li>
                    </ol>
                    <p>Please keep in mind that this article <strong>does not</strong> cover all aspects of web-accessibility. There are other important topics such as <strong>aria-live regions</strong> that should be reviewed and learned about as well if you expect to utilize AJAX in your web-pages. This article intends to serve as a quick guideline or reference point for common accessibility patterns that will help developers reach AA compliance in a ‘true’ fashion.</p>
                    <p>For more detailed information on web accessibility and the topics here, Google has an excellent article at: <a href="https://developers.google.com/web/fundamentals/accessibility/" target="_blank" rel="noopener noreferrer">https://developers.google.com/web/fundamentals/accessibility/</a></p>
                    <p>Additionally, Google offers a free course on web accessibility available at: <a href="https://www.udacity.com/course/web-accessibility--ud891" target="_blank" rel="noopener noreferrer">https://www.udacity.com/course/web-accessibility--ud891</a></p>
                </section>
            </div>
        </div>
    </main>

    <footer>
        <div id="footer_top">
            <div id="footer_top_content">
                <div class="footer-top-left-column contact-info">
                    <address>
                    <h2><?php bloginfo('name'); ?></h2>
                    <?php if (get_theme_mod('address')) : ?>
                        <?php echo get_theme_mod('address');
                        endif; ?>
                    <?php if (get_theme_mod('city')) : ?>
                        <br /><?php echo get_theme_mod('city');
                                endif; ?>
                    </address>
                    <?php if (get_theme_mod('telephone') || get_theme_mod('fax') || get_theme_mod('email')) : ?>
                    <div class="contact">
                        <strong>Contact Us</strong>
                        <?php if (get_theme_mod('telephone')) : ?>
                            <div class="telephone">Telephone: <?php echo get_theme_mod('telephone'); ?></div>
                        <?php endif; ?>
                        <?php if (get_theme_mod('fax')) : ?>
                            <div class="fax">Fax: <?php echo get_theme_mod('fax'); ?></div>
                        <?php endif; ?>
                        <?php if (get_theme_mod('email')) : ?>
                            <div class="fax">Email: <?php echo get_theme_mod('email'); ?></div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="footer-top-middle-column">
                    <?php if (is_active_sidebar('footer-widget-area')) : ?>
                    <ul class="xoxo">
                    <?php dynamic_sidebar('footer-widget-area'); ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
            <div class="footer-top-right-column social-media-links">
                <?php if (get_theme_mod('flickr') || get_theme_mod('instagram') || get_theme_mod('twitter') || get_theme_mod('facebook') || get_theme_mod('youtube')) : ?>
                    <div class="sm-header">Find Us On</div>
                <?php endif; ?>
                <?php if (get_theme_mod('flickr')) : ?>
                    <a class="flickr" href="//www.flickr.com/photos/<?php echo get_theme_mod('flickr'); ?>"><i class="fa fa-flickr" aria-hidden="true"></i><span class="screen-reader-text">Flickr</span></a>
                <?php endif; ?>
                <?php if (get_theme_mod('instagram')) : ?>
                    <a class="instagram" href="//www.instagram.com/<?php echo get_theme_mod('instagram'); ?>"><i class="fa fa-instagram" aria-hidden="true"></i><span class="screen-reader-text">Instagram</span></a>
                <?php endif; ?>
                <?php if (get_theme_mod('twitter')) : ?>
                    <a class="twitter" href="//www.twitter.com/<?php echo get_theme_mod('twitter'); ?>"><i class="fa fa-twitter" aria-hidden="true"></i><span class="screen-reader-text">Twitter</span></a>
                <?php endif; ?>
                <?php if (get_theme_mod('facebook')) : ?>
                    <a class="facebook" href="//www.facebook.com/<?php echo get_theme_mod('facebook'); ?>"><i class="fa fa-facebook" aria-hidden="true"></i><span class="screen-reader-text">Facebook</span></a>
                <?php endif; ?>
                <?php if (get_theme_mod('youtube')) : ?>
                    <a class="youtube" href="//www.youtube.com/user/<?php echo get_theme_mod('youtube'); ?>"><i class="fa fa-youtube-play" aria-hidden="true"></i><span class="screen-reader-text">YouTube</span></a>
                <?php endif; ?>
            </div>
        </div>
        <div id="footer_btm">
            <div id="footer_btm_content">

                <div class="uh_col c1_4">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/footer-logo.png" srcset="<?php echo get_template_directory_uri(); ?>/images/footer-logo.png 1x, <?php echo get_template_directory_uri(); ?>/images/footer-logo-2x.png 2x" alt="uh system logo" /><br />2444 Dole Street<br />Honolulu, HI 96822
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
        <a href="#top" class="go-top">
            <span class="fa fa-chevron-up" aria-hidden="true"></span>
        </a>
    </footer>

    <?php wp_footer(); ?>
    <script src="<?php echo get_template_directory_uri(); ?>/js/bundle.js"></script>
</body>
</html>

