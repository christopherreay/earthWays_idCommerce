<!DOCTYPE html>
<!--[if lt IE 8]> <html <?php language_attributes(); ?> class="ie7 ie" xmlns="http://www.w3.org/1999/xhtml"> <![endif]-->
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8 ie" xmlns="http://www.w3.org/1999/xhtml"> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->
<head>

  <!-- META -->

  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
  <meta name="format-detection" content="telephone=no">

  

  <!-- LINKS -->

  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <?php if ( get_option( 'krown_fav' ) != '' ) : ?>

  <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_option( 'krown_fav' ); ?>" />

  <?php endif; ?>

  <?php 
    $ign_project_description = get_post_meta( $post->ID, 'ign_project_description', true ); 
    if ($ign_project_description != "")
    { echo  '<meta property="og:description"  content="'.$ign_project_description.'">' ."\r\n".
            '<meta name="description"         content="'.$ign_project_description.'">' ."\r\n".
            '<meta itemprop="description"     content="'.$ign_project_description.'">' ."\r\n".
            '<meta name="twitter:description" content="'.$ign_project_description.'">' ."\r\n";
    }
  ?>

  <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

  <!-- WP HEAD -->

  <?php wp_head(); ?>

  
    
</head>

<body id="body" <?php body_class( get_option( 'krown_sticky', 'regular-header' ) . ' no-touch ' . ( isset( $post ) ? get_post_meta( $post->ID, 'krown_page_layout', true ) : '' ) . ' no-js' . ' earthWays_backerTheme' ); ?>>

    <!-- Header Start -->
    <header id="header" class="clearfix">

      <div class=" clearfix">

        <div class="wrapper clearfix">

          <!-- Logo Start -->
        <?php 

        $logo = get_option( 'krown_logo' );
        $logo_x2 = get_option( 'krown_logo_x2' );

        if ( $logo == '' ) {
          $logo = get_template_directory_uri() . '/images/logo.png';
        }
        if ( $logo_x2 == '' ) {
          $logo_x2 = $logo;
        }

        ?>

        <a id="logo" href="<?php echo home_url(); ?>" style="width:<?php echo get_option( 'krown_logo_width', '117' ); ?>px;height:<?php echo get_option( 'krown_logo_height', '23' ); ?>px">
          <img class="default" src="<?php echo $logo; ?>" alt="<?php bloginfo( 'name' ); ?>" />
          <img class="retina" src="<?php echo $logo_x2; ?>" alt="<?php bloginfo('name'); ?>" />
        </a>
        <!-- Logo End -->

           <!-- Menu Start -->
            <nav id="main-menu" class="clearfix right" data-nav-text="<?php _e( '--- Navigate ---', 'krown' ); ?>">

          <?php if ( has_nav_menu( 'primary' ) ) {

            wp_nav_menu( array(
              'container' => false,
              'menu_class' => 'clearfix top-menu',
              'echo' => true,
              'before' => '',
              'after' => '',
              'link_before' => '',
              'link_after' => '',
              'depth' => 2,
              'theme_location' => 'primary',
              'walker' => new Krown_Nav_Walker()
              )
            );

          } ?>

        </nav>  
        <!-- Menu End -->


        <!-- start of pretty bubble -->
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
                <span>We've spent a lot of time on our Terms and Conditions. Egalitarian Business Practice.</span>
              </div>
            </a>
          </div>
          <div class="tile-label">
              <a href="terms-and-conditions"><span class="tile-label-span">T's & C's</span></a>
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
                <span>Check out our projects, everyone is worth your money, and reading them will make you happy</span>
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
      <!-- end of pretty bubble -->

    </div>

    </div>

  </header>
  <!-- Header End -->

  <!-- Main Wrapper Start -->

  <div id="content" class="clearfix <?php echo krown_sidebar_class(); ?><?php echo krown_md_ch_class(); ?>"<?php echo get_option( 'krown_sticky' ) == 'sticky-header' ? ' style="top:' . ( get_option( 'krown_logo_height', '23' ) + 77 ) . 'px"' : ''; ?>>

    <?php krown_custom_header(); ?>

    <div class="clearfix wrapper">

      <?php echo krown_check_page_title(); ?>

      <?php if ( krown_sidebar_class() == 'layout-left-sidebar' || krown_sidebar_class() == 'layout-right-sidebar' ) : ?>

        <div class="sidebar-content <?php echo get_post_meta( $post->ID, 'krown_page_style', true ); ?>">

      <?php else : ?>

        <div class="normal-content <?php echo get_post_meta( $post->ID, 'krown_page_style', true ); ?>">

      <?php endif; ?>