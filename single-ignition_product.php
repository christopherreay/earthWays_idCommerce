<?php
/**
 * The Template for displaying all single projects.
 */
get_header(); ?>

  <?php while ( have_posts() ) : the_post(); 

    $project_id = get_post_meta( $post->ID, 'ign_project_id', true );
    $author = get_user_by( 'id', $post->post_author );
    $updates = html_entity_decode( stripslashes( apply_filters( 'idcf_updates_text', get_post_meta( $post->ID, 'ign_updates', true ) ) ) );
    $faqs = html_entity_decode( stripslashes( get_post_meta( $post->ID, 'ign_faqs', true ) ) );
    $video = get_post_meta( $post->ID, 'ign_product_video', true );
    $img_1 = has_post_thumbnail( $post->ID ) ? wp_get_attachment_url( get_post_thumbnail_id(), 'full' ) : get_post_meta( $post->ID, 'ign_product_image1', true );
    $gallery = array(
      $img_1,
      get_post_meta( $post->ID, 'ign_product_image2', true ),
      get_post_meta( $post->ID, 'ign_product_image3', true ),
      get_post_meta( $post->ID, 'ign_product_image4', true )
    );
    $project_long_desc = get_post_meta( $post->ID, 'ign_project_long_description', true );

    $retina = krown_retina();

  ?>

    <div id="project-container" class="krown-tabs responsive-on clearfix">

      <ul class="titles clearfix">
        <li><h5><?php _e( 'Description', 'krown' ); ?></h5></li>
        <?php if ( $updates != '' ) : ?><li><h5><?php _e( 'Updates', 'krown' ); ?></h5></li><?php endif; ?>
        <?php if ( $faqs != '' ) : ?><li><h5><?php _e( 'FAQ', 'krown' ); ?></h5></li><?php endif; ?>
        <?php if ( comments_open() && ot_get_option( 'krown_allow_id_comments', 'true' ) == 'true' ) : ?><li><h5><?php _e( 'Comments', 'krown' ); ?></h5></li><?php endif; ?>
        <?php if ( ot_get_option( 'krown_allow_id_backers', 'false' ) == 'true'  || ot_get_option( 'krown_allow_id_backers', 'false' ) == 'trueidc' ) : ?><li><h5><?php _e( 'Backers', 'krown' ); ?></h5></li><?php endif; ?>
      </ul>

      <div class="contents clearfix">

        <div id="description">

          <div class="project-header">

            <?php if ( $video != '' ) : ?>

              <div class="video-container topImageThingForProject">
                <?php if ( strpos( $video, 'iframe' ) > -1 ) {
                  echo html_entity_decode( stripslashes( $video ) );
                } else {
                  echo $wp_embed->run_shortcode( '[embed width="845" height="474"]' . $video . '[/embed]' );
                }  ?>
              </div>

            <?php else : ?>

              <div class="flexslider mini topImageThingForProject">
                <ul class="slides">

                <?php foreach ( $gallery as $slide ) {

                  if ( $slide != '' ) {

                    $img = aq_resize( $slide, $retina === 'true' ? 1690 : 845, null, false, false );   
                    echo '<li class="slide"><img src="' . $img[0]. '" width="' . $img[1] . '" height="' . $img[2] . '" alt="" /></li>';

                  }

                } ?>

                </ul>
              </div>

            <?php endif; ?>

          </div>

          <div class="project-content">

            <?php 

              krown_share_buttons( $post->ID );

              echo do_action( 'id_content_before', $project_id );
              do_action( 'id_before_content_description', $project_id, $post->ID );

              echo "<div id='longDescription'>";
                the_content();

              
                if ( $project_long_desc != '' ) echo nl2br( html_entity_decode( $project_long_desc ) );
              echo "</div>";

              if ( function_exists( 'idstretch_install' ) ) {
                echo do_shortcode( '[project_stretch_goals product="' . $project_id . '"]' ); 
              }

              echo do_action( 'id_content_after', $project_id );

            ?>

          </div>

        </div>

        <?php if ( $updates != '' ) : ?>

          <div id="updates" class="project-content">

            <?php

              echo do_shortcode( $updates );
              do_action( 'id_updates', array( 'product' => $project_id ) ); 

            ?>

          </div>

        <?php endif; ?>

        <?php if ( $faqs != '' ) : ?>

          <div id="faqs" class="project-content">

            <?php 

              echo do_shortcode( $faqs );       
              do_action( 'id_faqs', array( 'product' => $project_id ) );

            ?>

          </div>

        <?php endif; ?>

        <?php if ( comments_open() && ot_get_option( 'krown_allow_id_comments', 'true' ) == 'true' ) : ?>

          <div id="comments" class="">
            <?php comments_template(); ?>
          </div>

        <?php endif; ?>

        <?php if ( ot_get_option( 'krown_allow_id_backers', 'false' ) == 'true' || ot_get_option( 'krown_allow_id_backers', 'false' ) == 'trueidc' ) : ?>

          <div id="backers" class="project-content">

            <?php if ( ot_get_option( 'krown_allow_id_backers' ) == 'trueidc' ) : 

              mdid_backers_list( $project_id );

            else :

              $project = new ID_Project( $project_id );
              $post_id = $project->get_project_postid();
              $the_project = $project->the_project();
              $project_orders = ID_Order::get_orders_by_project( $project_id );

              echo '<h3 id="comments_title">' . __( 'Backers', 'krown' ) . ' (' . sizeof( $project_orders ) . ')' . '</h3>';

              if ( ! empty( $project_orders ) ) : ?>

                <ol id="comments-list">

                <?php foreach( array_reverse( $project_orders ) as $order ) : ?>

                  <li class="comment clearfix">

                    <div class="comment-avatar"><?php echo get_avatar( $order->email, ( isset( $retina ) && $retina === 'true' ? 130 : 65 ), $default='' ); ?></div>

                    <div class="comment-content">

                      <div class="comment-meta clearfix">

                        <h6 class="comment-title"><?php echo $order->first_name . ' ' . $order->last_name; ?>&nbsp;</h6>
                        <span class="comment-date"><?php echo krown_id_ago( strtotime( $order->created_at ) ); ?></span>

                      </div>

                      <strong class="comment-price"><?php echo apply_filters( 'id_price_format', $order->prod_price, $order->id ); ?></strong>

                    </div>

                  </li>

                <?php endforeach; ?>

                </ol>

              <?php else : ?>

                <p class="post-excerpt"><?php _e( 'Nobody has backed this project yet. Be the first one!', 'krown' ); ?></p>

              <?php endif; ?>

            <?php endif; ?>

          </div>

        <?php endif; ?>

      </div>

      <aside id="project-sidebar">

        <div class="rtitle"><p><?php _e( 'Back this Project', 'krown' ); ?></p></div>

        <?php 

          if ( function_exists( 'id_projectPageWidget' ) ) {
            echo id_projectPageWidget( array( 'product' => $project_id ) ); 
          } ?>

          <!--if show author -->

          <div id="project-p-author" class="panel clearfix">

            <div class="comment-avatar">
              <?php echo get_avatar( $author->user_email, ( isset( $retina ) && $retina === 'true' ? 130 : 65 ), $default = '' ); ?>
            </div>

            <div class="comment-content">

              <span><?php _e( 'Project by', 'krown' ); ?></span>

              <h6><?php echo esc_attr( $author->display_name ); ?></h6>

              <ul class="author-meta">

                <li><?php 

                  $count = krown_count_posts( $author->ID, 'ignition_product' );
                  echo sprintf( _n( '1 Project', '%s Projects', $count, 'krown' ), $count );
                ?></li>

                <li><a href="<?php echo get_author_posts_url( $author->ID ); ?>?post_type=ignition_product"><?php _e( 'View Profile', 'krown' ); ?></a></li>

              </ul>

            </div>

          </div>

      </aside>

    </div>

  <?php endwhile; ?>

<?php get_footer(); ?>