<?php
	$sticky = get_option( 'sticky_posts' );

	$sticky_args = array(
		'post__in' => $sticky,
		'posts_per_page' => '2',
	);

	$mainquery = array(
		'posts_per_page' => '4',
		'post__not_in' => $sticky
	);

	// the queries
	$sticky_query = new WP_Query( $sticky_args );
	
?>

<div class="jumbotron">
	<?php if ( $sticky_query->have_posts() ) : ?>
	
	<!-- pagination here -->
	

		<div class="owl-carousel">
	
		<!-- the loop -->
		<?php while ( $sticky_query->have_posts() ) : $sticky_query->the_post(); ?>
			<div>
			<?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
			</div>
		<?php endwhile; ?>
		<!-- end of the loop -->

		</div>

	<!-- pagination here -->
	

<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

</div> <!-- .jumbotron -->

<?php wp_reset_query(); ?>

<?php query_posts($mainquery); ?>

<div class="actualites">
	<h2>Actualités &amp; communiqués</h2>
    <hr>
	<?php if (!have_posts()) : ?>
	  <div class="alert alert-warning">
	    <?php _e('Sorry, no results were found.', 'sage'); ?>
	  </div>
	  <?php get_search_form(); ?>
	<?php endif; ?>

	<?php while (have_posts()) : the_post(); ?>
	  <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
	<?php endwhile; ?>
</div><!-- /.actualites -->

<hr>
<p class="text-right"><span class="fa fa-plus"></span>   <a href="#">toutes les actualités</a></p>

<?php
// Reset Query
wp_reset_query();
?>
