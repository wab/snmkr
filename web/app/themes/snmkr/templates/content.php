<article <?php post_class('media'); ?>>
	
	<?php if ( has_post_thumbnail() ) : ?>
		<a class="media-left media-top" href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail('media'); ?>
		</a>
	<?php endif; ?>
	
	<div class="media-body">
		<h3 class="media-heading"><?php the_title(); ?></h3>
		<?php get_template_part('templates/entry-meta'); ?>
		<?php the_excerpt(); ?>
		<p class="text-right"><span class="fa fa-hand-o-right"></span> <a href="blog.html">Lire la suite</a></p>
	</div><!-- .media-body -->
</article><!-- .media -->
