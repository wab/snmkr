
<div class="jumbotron">
	<h2>Édito du président <small>février 2015</small></h2>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit architecto molestiae placeat, ullam, earum magnam possimus enim blanditiis...</p>
	<p><a class="btn btn-primary" href="#">Lire la suite</a></p>
</div> <!-- .jumbotron -->

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
