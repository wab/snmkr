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
		<article class="edito text-left">			
			<div>
				<h2>Édito du président <small><?php the_date('F Y');?></small></h2>
				<hr>
				<?php the_excerpt(); ?>
				<p><span class="fa fa-hand-o-right"></span> <a href="<?php the_permalink(); ?>">Lire la suite</a></p>
			</div>
		</article>
	<?php endwhile; ?>
	<!-- end of the loop -->
<?php endif; ?>

<?php wp_reset_query(); ?>