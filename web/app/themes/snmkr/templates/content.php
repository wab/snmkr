<?php if ( is_home() && is_sticky()) : $btn_class = 'btn btn-primary'; else : $btn_class = 'btn btn-default btn-sm'; endif; ?>

<?php if ( has_post_format( 'quote' )) : ?>
	<article <?php post_class(); ?>>
		<h2 class="h3">Édito du président <small><?php the_date('F Y');?></small> </h2>
		<?php the_excerpt(); ?>
		<p class="text-right"><a href="<?php the_permalink(); ?>" class="<?php echo $btn_class; ?>"><span class="fa fa-hand-o-right"></span> Lire la suite</a></p>
	</article>
	
<?php else : ?>
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
			<p class="text-right"><a href="<?php the_permalink(); ?>" class="<?php echo $btn_class; ?>"><span class="fa fa-hand-o-right"></span> Lire la suite</a></p>
		</div><!-- .media-body -->
	</article><!-- .media -->
<?php endif; ?>