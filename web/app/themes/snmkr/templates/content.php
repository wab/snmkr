<article <?php post_class('media'); ?>>
	
	<?php if ( has_post_thumbnail() ) : ?>
		<a class="media-left media-top" href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail('media'); ?>
		</a>
	<?php endif; ?>

	<div class="media-body">
		
		<h2 class="media-heading h3"><?php the_title(); ?> <small><?php if (!is_post_type_archive('regions')) {get_template_part('templates/entry-meta');}  ?></small></h2>
		<?php the_excerpt(); ?>
		<span class="fa fa-hand-o-right"></span> <a href="<?php the_permalink(); ?>">Lire la suite</a>
	</div><!-- .media-body -->
</article><!-- .media -->
