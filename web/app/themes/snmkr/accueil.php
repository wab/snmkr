<?php

	/**
 	* Template Name: Accueil
 	*/

	$sticky = get_option( 'sticky_posts' );

	$sticky_args = array(
		'post__in' => $sticky,
		'posts_per_page' => '1',
	);

	$actus_args = array(
		'posts_per_page' => '1',
		'post__not_in' => $sticky,
		'tax_query' => array(
	        array(
			    'taxonomy' => 'post_format',
			    'field' => 'slug',
			    'terms' => array('post-format-quote'),
			    'operator' => 'NOT IN'
			)
    	)	
	);

	// the queries
	$sticky_query = new WP_Query( $sticky_args );
	
?>




	<div class="jumbotron">

	<!-- pagination here -->


		<div class="owl-carousel">
		
			

		</div> <!-- /owl-carousel -->

	<!-- pagination here -->

	</div> <!-- .jumbotron -->


<?php if ( $sticky_query->have_posts() ) : ?>
<!-- the loop -->
	<?php while ( $sticky_query->have_posts() ) : $sticky_query->the_post(); ?>
		<div>
			<?php if (get_post_format() == 'quote') : ?>

				<?php 
				$attachment_id = 392; // attachment ID
				$image_attributes = wp_get_attachment_image_src( $attachment_id ); // returns an array
				if( $image_attributes ) {
				?> 
					<!-- <img src="<?php echo $image_attributes[0]; ?>" width="<?php echo $image_attributes[1]; ?>" height="<?php echo $image_attributes[2]; ?>" class="pull-right img-thumbnail"> -->
				<?php } ?>
			
			<?php endif; ?>
			
			<?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
		</div>
	<?php endwhile; ?>
	<!-- end of the loop -->
<?php endif; ?>

<?php wp_reset_query(); ?>

<?php 
	$actualites = new WP_Query( $actus_args );
	if ( $actualites->have_posts() ) : ?>
	<hr>
	<div class="actualites">
		<?php while ( $actualites->have_posts() ) : $actualites->the_post(); ?>
		  <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
		<?php endwhile; ?>
	</div><!-- /.actualites -->
	<p class="text-right"><span class="fa fa-plus"></span>   <a href="<?php echo get_permalink( 1044 ); ?>">toutes les actualités</a></p>

<?php endif; ?>
<?php wp_reset_query(); ?>
