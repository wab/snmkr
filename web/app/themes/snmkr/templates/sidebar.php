<?php 
	$categories = array(
		'show_option_all'    => '',
		'orderby'            => 'name',
		'order'              => 'ASC',
		'style'              => 'list',
		'show_count'         => 1,
		'hide_empty'         => 1,
		'use_desc_for_title' => 1,
		'child_of'           => 0,
		'feed'               => '',
		'feed_type'          => '',
		'feed_image'         => '',
		'exclude'            => '',
		'exclude_tree'       => '',
		'include'            => '',
		'hierarchical'       => 1,
		'title_li'           => '',
		'show_option_none'   => __( '' ),
		'number'             => null,
		'echo'               => 1,
		'depth'              => 1,
		'current_category'   => 1,
		'pad_counts'         => 0,
		'taxonomy'           => 'category',
		'walker'             => null
    );
    
    $regions = array(
		'post_type'    => 'regions',
		'post_status'  => 'publish',
		'show_date'    => '',
		'sort_column'  => 'menu_order, post_title',
	        'sort_order'   => '',
		'title_li'     => '', 
    );
?>
<div class="sidebar-wrapper">
	

	<?php if((is_search() || is_archive() || is_single()) && !is_post_type_archive() && !is_singular( 'regions' ) ) : ?>
		<nav class="well">
			<ul class="list-unstyled list-categories">
				<?php wp_list_categories($categories); ?>
			</ul>
		</nav>
	<?php endif; ?>
	
	<?php if( is_post_type_archive('regions') || is_singular( 'regions' ) ) : ?>
		<nav class="well">
			<ul class="list-unstyled list-categories">
				<?php wp_list_pages($regions); ?>
			</ul>
		</nav>
	<?php endif; ?>
	<div class="row">

		<div class="sidebar-zone">
		  
		  <p><a href="<?php bloginfo( 'url' ); ?>/adherer-au-snmkr" class="btn btn-lg btn-info"><span class="fa fa-pencil-square-o"></span> J'adhère au SNMKR</a></p>

		  <hr>
		  
		  <?php get_template_part('templates/newsletter'); ?>

		  <hr>
		  
		  <nav class="reseaux">
		  	<h2 class="h4">Suivre le snmkr</h2>
		    <ul class="list-unstyled row">
		      <li class="col-xs-2"><a href="http://www.twitter.com/snmkr1"><span class="fa fa-twitter-square"></a></li>
		      <li class="col-xs-2"><a href="#"><span class="fa fa-facebook-square"></a></a></li>
		      <li class="col-xs-2"><a href="#"><span class="fa fa-linkedin-square"></a></a></li>
		    </ul>
		  </nav>
		  
		</div> <!-- .sidebar-zone -->
		
		<div class="sidebar-zone">
			<?php dynamic_sidebar('sidebar-primary'); ?>
		</div>
			

	</div> <!-- .row-->

</div>