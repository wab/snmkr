<?php

	/**
 	* Template Name: Accueil
 	*/

	$actus_args = array(
		'posts_per_page' => '3',
		'category__not_in' => array( 3 )	
	);
	
?>

<?php 
	$actualites = new WP_Query( $actus_args );
	if ( $actualites->have_posts() ) : ?>
		<h1 class="text-center"><span class="fa fa-coffee"></span> Actualités</h1>
		<?php while ( $actualites->have_posts() ) : $actualites->the_post(); ?>
		  <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
		<?php endwhile; ?>
		
		<p class="text-right"><span class="fa fa-plus"></span>   <a href="<?php echo get_permalink( 1044 ); ?>">toutes les actualités</a></p>

<?php endif; ?>
<?php wp_reset_query(); ?>
