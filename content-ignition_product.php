<?php
/**
 * The default template for displaying IgnitionDeck projects.
 */

	$project_id = get_post_meta( $post->ID, 'ign_project_id', true );
	$project = new ID_Project( $project_id );
	$post_id = $project->get_project_postid();

	$raised = apply_filters('id_funds_raised', $project->get_project_raised(), $project->get_project_postid());
	$percent = apply_filters('id_percentage_raised', $project->percent(), apply_filters('id_funds_raised', $project->get_project_raised(), $post_id, true), $post_id, apply_filters('id_project_goal', $project->the_goal(), $post_id, true));

	$colors = get_option( 'krown_colors' );
	$retina = krown_retina();
	
?>

	<article class="krown-id-item">

		<?php 

			if ( has_post_thumbnail( $post->ID ) ) {
				$image = aq_resize( wp_get_attachment_url( get_post_thumbnail_id(), 'full' ), $retina === 'true' ? 510 : 255, null, false, false );
				$img_obj = '<a class="fancybox-thumb" href="' . get_permalink( $post->ID ) . '"><figure class="img"><img src="' . $image[0] . '" width="' . $image[1] . '" height="' . $image[2] . '" alt="' . get_the_title() . '" /></figure><span></span></a>';
			} else if ( get_post_meta( $post->ID, 'ign_product_image1', true ) != '' ) {
				$image = aq_resize( get_post_meta( $post->ID, 'ign_product_image1', true ), $retina === 'true' ? 510 : 255, null, false, false );
				$img_obj = '<a class="fancybox-thumb" href="' . get_permalink( $post->ID ) . '"><figure class="img"><img src="' . $image[0] . '" width="' . $image[1] . '" height="' . $image[2] . '" alt="' . get_the_title() . '" /></figure><span></span></a>';
			} else {
				$img_obj = '';
			}

			echo $img_obj;

		?>

		

    <div class="container">

			<a href="<?php the_permalink(); ?>"><h3 class="title"><?php the_title(); ?></h3></a>

			<div class="cats"><?php krown_categories( $post->ID, 'project_category' ); ?></div>

			<section class="content"><?php echo get_post_meta( $post->ID, 'ign_project_description', true ); ?></section>

      <aside class="meta">

        <div class="krown-pie small" data-color="<?php echo ( intval( $percent ) > 99 ? $colors['pie3'] : $colors['pie2'] ); ?>"><div class="holder"><span class="value" data-percent="<?php echo $percent; ?>"><?php echo $percent; ?><sup>%</sup></span></div></div>

        <ul>
          <li><span><?php echo $raised . '</span> ' . __( 'Pledged', 'krown' ); ?></li>
          <li><span><?php echo $project->days_left() . '</span> ' . __( 'Days to go', 'krown' ); ?></li>
        </ul>

      </aside>

		</div>

	</article>