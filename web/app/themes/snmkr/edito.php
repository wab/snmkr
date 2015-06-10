<?php

	$sticky = get_option( 'sticky_posts' );

	$sticky_args = array(
		'post__in' => $sticky,
		'posts_per_page' => '1',
	);

	// the queries
	$sticky_query = new WP_Query( $sticky_args );
	
?>

<?php if ( $sticky_query->have_posts() ) : ?>
<!-- the loop -->
	<?php while ( $sticky_query->have_posts() ) : $sticky_query->the_post(); ?>
		<article class="edito">			
			<h2>Édito du président <small><?php the_date('F Y');?></small></h2>
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>" class="btn btn-primary"><span class="fa fa-hand-o-right"></span> Lire la suite</a>
		</article>
	<?php endwhile; ?>
	<!-- end of the loop -->
<?php endif; ?>

<?php wp_reset_query(); ?>