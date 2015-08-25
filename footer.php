<?php
/**
 * The footer of the theme
 */
?>

    </div>

    <?php krown_sidebar(); ?>
  
    <!-- Inner Wrapper End -->
    </div>

  <!-- Main Wrapper End -->
  </div>

  <!-- Footer #1 Wrapper Start -->

  <?php if(get_option('rb_o_ftrtype', 'full') == 'full') : ?>

  <footer id="footer1" class="footer clearfix">

    <div class="krown-column-row wrapper clearfix">

      <?php if( get_option( 'rb_o_ftrareas', 'four' ) == 'four' ) : ?>

        <div class="krown-column-container span3">
          <?php if ( is_active_sidebar( 'krown_footer_widget_1' ) )
            dynamic_sidebar( 'krown_footer_widget_1' ); ?>
        </div>

        <div class="krown-column-container span3 clearfix">
          <?php if ( is_active_sidebar( 'krown_footer_widget_2' ) )
            dynamic_sidebar( 'krown_footer_widget_2' ); ?>
        </div>

        <div class="krown-column-container span3 clearfix">
          <?php if ( is_active_sidebar( 'krown_footer_widget_3' ) )
            dynamic_sidebar( 'krown_footer_widget_3' ); ?>
        </div>

        <div class="krown-column-container span3">
          <?php if ( is_active_sidebar( 'krown_footer_widget_4' ) )
            dynamic_sidebar( 'krown_footer_widget_4' ); ?>
        </div>

      <?php elseif ( get_option( 'rb_o_ftrareas' ) == 'three' ) : ?>

        <div class="krown-column-container span4">
          <?php if ( is_active_sidebar('krown_footer_widget_1' ) )
            dynamic_sidebar( 'krown_footer_widget_1' ); ?>
        </div>

        <div class="krown-column-container span4 clearfix">
          <?php if ( is_active_sidebar( 'krown_footer_widget_2' ) )
            dynamic_sidebar( 'krown_footer_widget_2' ); ?>
        </div>

        <div class="krown-column-container span4">
          <?php if ( is_active_sidebar( 'krown_footer_widget_3' ) )
            dynamic_sidebar( 'krown_footer_widget_3' ); ?>
        </div>

      <?php elseif ( get_option( 'rb_o_ftrareas' ) == 'two' ) : ?>

        <div class="krown-column-container span6">
          <?php if ( is_active_sidebar( 'krown_footer_widget_1' ) )
            dynamic_sidebar( 'krown_footer_widget_1' ); ?>
        </div>

        <div class="krown-column-container span6">
          <?php if ( is_active_sidebar( 'krown_footer_widget_2' ) )
            dynamic_sidebar( 'krown_footer_widget_2' ); ?>
        </div>

      <?php elseif ( get_option( 'rb_o_ftrareas' ) == 'one' ) : ?>

        <div class="krown-column-container span12">
          <?php if ( is_active_sidebar( 'krown_footer_widget_1' ) )
            dynamic_sidebar( 'krown_footer_widget_1' ); ?>
        </div>

      <?php endif; ?>


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




    </footer>

    <?php endif; ?>

  <!-- Footer #1 Wrapper End -->

  <!-- Footer #2 Wrapper Start -->

  <footer id="footer2" class="footer clearfix">

    <div class="wrapper clearfix">

      <div class="left clearfix">
        <?php if ( is_active_sidebar( 'krown_footer_widget_5' ) )
          dynamic_sidebar( 'krown_footer_widget_5' ); ?>
      </div>

      <div class="right clearfix">
        <?php if ( is_active_sidebar('krown_footer_widget_6' ) )
          dynamic_sidebar( 'krown_footer_widget_6' ); ?>
      </div>

    </div>

    </footer>
  <!-- Footer End -->


  <!-- GTT Button -->
  <a id="top" href="#"></a> 

  <!-- IE7 Message Start -->
  <div id="oldie">
    <p><?php _e('This is a unique website which will require a more modern browser to work!', 'krown'); ?><br /><br />
    <a href="https://www.google.com/chrome/" target="_blank"><?php _e('Please upgrade today!', 'krown'); ?></a>
    </p>
  </div>
  <!-- IE7 Message End -->

  <?php wp_footer(); ?>

</body>
</html>