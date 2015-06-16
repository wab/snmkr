<?php 
	$categories = array(
		'orderby'            => 'name',
		'order'              => 'ASC',
		'style'              => 'list',
		'show_count'         => 1,
		'hide_empty'         => 1,
		'use_desc_for_title' => 1,
		'title_li'           => '',
		'depth'              => 1,
		'taxonomy'           => 'category'
    );
    
    $regions = array(
		'post_type'    => 'regions',
		'post_status'  => 'publish',
		'show_date'    => '',
		'sort_column'  => 'menu_order, post_title',
	        'sort_order'   => '',
		'title_li'     => '',
		'depth'              => 1,
    );

    function archive_nav_display() {

		if ( is_home() ) {
		  // blog page
			return true;
		}
		elseif ( is_search() || is_archive() && !is_post_type_archive('regions') ) {
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

</div>