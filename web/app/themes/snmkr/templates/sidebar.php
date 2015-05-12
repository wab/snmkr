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

    function archive_nav_display() {

		if ( is_home() ) {
		  // blog page
			return true;
		}
		elseif ( is_search() || is_archive() ) {
			return true;
		} elseif ( is_single() && !is_woocommerce() && !is_post_type_archive() && !is_singular( 'regions' )) {
			return true;
		} else {
		  //everything else
			return false;
		}
	  
	}
?>
<div class="sidebar-wrapper">

	<?php if( archive_nav_display() ) : ?>
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
		  
		  <p><a href="<?php bloginfo( 'url' ); ?>/boutique/adhesion" class="btn btn-lg btn-primary"><span class="fa fa-pencil-square-o"></span> J'adhère au SNMKR</a></p>

		  <hr>
		  
		  <?php get_template_part('templates/newsletter'); ?>

		  <hr>

	      <?php get_template_part('templates/acces'); ?>

	      <hr>

		</div> <!-- .sidebar-zone -->
		
	    <div class="sidebar-zone">
	      	<aside class="hidden-sm">
				<h2 class="h4">Les sections</h2>
	 			<div id="map"></div>
			</aside>
	 		<p><small><span class="fa fa-plus"></span> <a href="<?php bloginfo('url') ?>/regions">voir toutes les sections</a></small></p>

	    </div><!-- .col -->


	    <div class="sidebar-zone">
	    	
	 		<?php get_template_part('templates/bannieres'); ?>

	    </div>
		
		

	</div> <!-- .row-->

</div>