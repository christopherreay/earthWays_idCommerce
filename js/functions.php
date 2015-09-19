<?php

/* This file should contain all the functions of the child theme. Most of the theme's functions can be overwritten (some are critical and shouldn't be tampered with). 

--- Below you have a full list of the ones which you can look up in the parent theme's functions.php file and redeclare here:

- krown_retina (to disable retina images by setting the cookie always to False)
- krown_setup (to add things at theme setup - should be modified with care)
- krown_analytics
- krown_filter_wp_title (to change how the theme's title appears)
- krown_excerptlength_post (to change the lenght of the post's excerpt in carousel shortcode)
- krown_excerptlength_post_big (to change the lenght of the post's excerpt in the blog view)
- krown_excerptmore (to change the chars which appear after the post's excerpt)
- krown_excerpt
- krown_search_form (to modify the structure of the search form)
- krown_pagination
- krown_check_page_title (builds up the title of the page)
- krown_custom_header (outputs custom headers for pages)
- krown_sidebar (to determine the sidebar)
- krown_sidebar_output (to insert the sidebar)
- krown_share_buttons (adds social sharing buttons)

--- Below you have a list of the ones which you can look up in the parent theme's includes/custom-styles.php file and redeclare here:

- krown_custom_css (if you want to get rid of the custom css output in the DOM and move everything here) 

--- Below you have a list of the ones which you can look up in the parent theme's includes/ignitiondeck-functions.php file and redeclare here:

- krown_add_dashboard_links (adds dashboard links when IDE is activated)
- krown_author_profile (builds up the author profile on ID archive pages)
- krown_id_ppp (sets ID projects per page in ID archives)

*/

include( 'includes/plugins.php' ); // Includes the plugins all over again

function earthWays_custom_scripts(){
    
    // Register and Enqueue a Stylesheet
    // get_template_directory_uri will look up parent theme location
    wp_register_style( 'metro_css', get_stylesheet_directory_uri() . '/includes/metro/css/metro.css');
    wp_enqueue_style( 'metro_css' );
    wp_register_style( 'metro_css_icons', get_stylesheet_directory_uri() . '/includes/metro/css/metro-icons.css');
    wp_enqueue_style( 'metro_css_icons' );
    
    // Register and Enqueue a Script
    // get_stylesheet_directory_uri will look up child theme location
    wp_register_script( 'metro_js', get_stylesheet_directory_uri() . '/includes/metro/js/metro.js', array('jquery'));
    wp_enqueue_script( 'metro_js' );
    
}

function add_slug_body_class( $classes ) {
global $post;
if ( isset( $post ) ) {
$classes[] = $post->post_type . '-' . $post->post_name;
}
return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );


add_action('wp_enqueue_scripts', 'earthWays_custom_scripts');

function krown_check_page_title() {

    global $post;

    $page_title = $page_subtitle = '';

    if ( is_404() ) {

      // 404
      $page_title = __( '404', 'krown' );
      $page_subtitle = __( 'Page Not Found', 'krown' );

    } else if ( is_search() ) {

      // Search
      $page_title = __( 'Search Results', 'krown' );
      $page_subtitle = __( 'For', 'krown' ) . ' "' . get_search_query() . '"';

    } else if ( is_page_template( 'template-slider.php' ) ) {

      // Page with slider
      $page_title = '';

    } else {

      // Regular pages

      $page_title = get_the_title();
      $page_subtitle = get_post_meta( $post->ID, 'krown_page_subtitle', true );

      // Portfolio posts vs Blog posts
      if( is_singular( 'ignition_product' ) ) {

        $page_title     = get_the_title( $post->ID );
        $page_subtitle  = "An Earth Ways Crowdfunding Project";

      } else if ( is_singular( 'post' ) ) {

        $page_title = get_the_title( $post->ID );
        $page_subtitle = '<aside class="post-meta">
          <ul>
            <li class="date"><a href="' . get_permalink() . '"><time pubdate datetime="' . get_the_time( 'c' ) . '">' . get_the_time( __( 'F j, Y', 'krown' ) ) . '</time></a></li>
            <li class="comments"><a href="' . get_permalink() . '#comments">' . __( 'Comments', 'krown' ) . ' ' . get_comments_number( '0', '1', '%' ) . '</a></li>
          </ul>
        </aside>';

      }

      // Archives

      if ( is_category() ) {

        $page_title = __( 'Categories Archives', 'krown' );
        $page_subtitle = get_category( get_query_var( 'cat' ) )->name;

      } else if ( is_author() ) {

        $page_title = __( 'Author Archives', 'krown' );
        $page_subtitle = get_userdata( get_query_var( 'author' ) )->display_name;

      } else if ( is_tag() ) {

        $page_title = __( 'Tags Archives', 'krown' );
        $page_subtitle = single_tag_title( '', false );

      } else if ( is_day() ) {

        $page_title = __( 'Daily Archives', 'krown' );
        $page_subtitle = get_the_date();

      } else if ( is_month() ) {

        $page_title = __( 'Monthly Archives', 'krown' );
        $page_subtitle = get_the_date( 'F Y' );

      } else if ( is_year() ) {

        $page_title = __( 'Yearly Archives', 'krown' );
        $page_subtitle = get_the_date( 'Y' );

      } else if ( get_query_var( 'taxonomy' ) == 'project_category' ) {

        $page_title = __( 'Categories Archives', 'krown' );
        $page_subtitle = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) )->name; 

      } else if ( is_archive() ) {

        $page_title = __( 'Archives', 'krown' );

      }

    }

    // Return by case
    if ( $page_title != '' ) {
      return '<header id="page-title"><h1 class="title">' . $page_title . '</h1>' . ( $page_subtitle != '' ? '<h2 class="subtitle">' . $page_subtitle . '</h2>' : '' ) . '</header>';
    } else {
      return '';
    }

  }



function metroMenu()
{ return '<!-- start of pretty bubble -->
      <div class="tile-area fg-white tile-area-scheme-dark" style="width: 100%;">
  <!--<div class="tile-area-controls">
    <button class="image-button icon-right bg-transparent fg-white bg-hover-dark no-border"><span class="sub-header no-margin text-light">Sergey Pimenov</span> <span class="icon mif-user"></span></button>
    <button class="square-button bg-transparent fg-white bg-hover-dark no-border" onclick="showSearch()"><span class="mif-search"></span></button>
    <button class="square-button bg-transparent fg-white bg-hover-dark no-border" onclick="showSettings()"><span class="mif-cog"></span></button>
    <a href="../tiles.html" class="square-button bg-transparent fg-white bg-hover-dark no-border"><span class="mif-switch"></span></a>
  </div>
  -->
  <div class="tile-group" style="left: 0px;">

    <div class="tile-container">
      
      <div class="tile op-light logo-tile showOver1180" data-role="tile">
        <div class="tile-content">
          <div class="image-container image-format-square" style="width: 100%;">
            <div class="frame">
              <a href="/">
                <div style="width: 100%; height: 150px; border-radius: 0px; background-image: url(/wp-content/uploads/2014/10/earthlogo2.png); background-size: contain; background-repeat: no-repeat; background-position: center center">
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="tile op-light logo-tile tile-wide showUnder1180" data-role="tile">
        <div class="tile-content">
          <div class="image-container image-format-square" style="width: 100%;">
            <div class="frame">
              <a href="/">
                <div style="width: 100%; height: 150px; border-radius: 0px; background-image: url(/wp-content/uploads/2014/10/earthlogo2.png); background-size: contain; background-repeat: no-repeat; background-position: center center">
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="tile op-green" data-role="tile">
        <div class="tile-content slide-up-2">
          <div class="slide">
            <div class="image-container image-format-square" style="width: 100%;">
              <div class="frame">
                <div style="width: 100%; height: 150px; border-radius: 0px; background-image: url(/wp-content/uploads/manualUploads/donateBee.jpg); background-size: cover; background-repeat: no-repeat; background-position-x: -25px">
                </div>
              </div>
            </div>
          </div>
          <div class="slide-over  op-green text-small padding10">
            <a href="make-a-donation">
              <div class="anchorFiller">
                <span>We charge 0% commission. Donate to support ethical projects</span>
              </div>
            </a>
          </div>
          <div class="tile-label">
              <a href="make-a-donation"><span class="tile-label-span">Donate</span></a>
          </div>
        </div>
      </div></a>
      
      <div class="tile op-green" data-role="tile">
        <div class="tile-content slide-up-2">
          <div class="slide">
            <div class="image-container image-format-square" style="width: 100%;">
              <div class="frame">
                <div style="width: 100%; height: 150px; border-radius: 0px; background-image: url(/wp-content/uploads/manualUploads/termsAndConditions_beeFlower.jpg); background-size: cover; background-repeat: no-repeat;">
                </div>
              </div>
            </div>
          </div>
          <div class="slide-over  op-green text-small padding10">
            <a href="terms-and-conditions">
              <div class="anchorFiller">
                <span>We\'ve spent a lot of time on our Terms and Conditions. Egalitarian Business Practice.</span>
              </div>
            </a>
          </div>
          <div class="tile-label">
              <a href="terms-and-conditions"><span class="tile-label-span">T\'s & C\'s</span></a>
          </div>
        </div>
      </div>

      <div class="tile op-green" data-role="tile">
        <div class="tile-content slide-up-2">
          <div class="slide">
            <div class="image-container image-format-square" style="width: 100%;">
              <div class="frame">
                <div style="width: 100%; height: 150px; border-radius: 0px; background-image: url(/wp-content/uploads/manualUploads/discover.beeFlower.jpg); background-size: cover; background-repeat: no-repeat;">
                </div>
              </div>
            </div>
          </div>
          <div class="slide-over  op-green text-small padding10">
            <a href="discover">
              <div class="anchorFiller">
                <span>Check out our projects, every one is worth your money, and reading them will make you happy</span>
              </div>
            </a>
          </div>
          <div class="tile-label">
             <a href="discover"> <span class="tile-label-span">Discover</span></a>
          </div>
        </div>
      </div>

      <div class="tile op-green" data-role="tile">
        <div class="tile-content slide-up-2">
          <div class="slide">
            <div class="image-container image-format-square" style="width: 100%;">
              <div class="frame">
                <div style="width: 100%; height: 150px; border-radius: 0px; background-image: url(/wp-content/uploads/manualUploads/create.beeFlower.jpg); background-size: cover; background-repeat: no-repeat;">
                </div>
              </div>
            </div>
          </div>
          <div class="slide-over  op-green text-small padding10">
            <a href="dashboard/?create_project=1">
              <div class="anchorFiller">
                <span>Leverage our platform and community for 0% commission fund raising on Ethicaly Mindful Projects</span>
              </div>
            </a>
          </div>
          <div class="tile-label">
              <a href="dashboard/?create_project=1"><span class="tile-label-span">Create</span></a>
          </div>
        </div>
      </div>

      <div class="tile op-green" data-role="tile">
        <div class="tile-content slide-up-2">
          <div class="slide">
            <div class="image-container image-format-square" style="width: 100%;">
              <div class="frame">
                <div style="width: 100%; height: 150px; border-radius: 0px; background-image: url(/wp-content/uploads/manualUploads/about.jpg); background-size: cover; background-repeat: no-repeat;">
                </div>
              </div>
            </div>
          </div>
          <div class="slide-over  op-green text-small padding10">
            <a href="about-us">
              <div class="anchorFiller">
                <span>Learn about us. Who we are, why we do what we do.</span>
              </div>
            </a>
          </div>
          <div class="tile-label">
              <a href="about-us"><span class="tile-label-span">About</span></a>
          </div>
        </div>
      </div>
      
      <div class="tile op-green" data-role="tile">
        <div class="tile-content slide-up-2">
          <div class="slide">
            <div class="image-container image-format-square" style="width: 100%;">
              <div class="frame">
                <div style="width: 100%; height: 150px; border-radius: 0px; background-image: url(/wp-content/uploads/manualUploads/contact.jpg); background-size: cover; background-repeat: no-repeat;">
                </div>
              </div>
            </div>
          </div>
          <div class="slide-over  op-green text-small padding10">
            <a href="contact">
              <div class="anchorFiller">
                <span>Send us messages. Anything! On Topic or Off. Complaints or Compliments or Chat</span>
              </div>
            </a>
          </div>
          <div class="tile-label">
              <a href="contact"><span class="tile-label-span">Contact</span></a>
          </div>
        </div>
      </div>

    </div>
  </div>
           
      </div>
      <!-- end of pretty bubble -->';
}

?>