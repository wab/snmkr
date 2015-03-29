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
?>

<?php if((is_archive() || is_single()) && !is_post_type_archive() && !is_singular( 'regions' ) ) : ?>
	<ul class="list-unstyled list-categories">
		<?php wp_list_categories($categories); ?>
	</ul>
	<hr>
<?php endif; ?>
<div class="row">
	<?php if( !is_post_type_archive('regions') && !is_singular( 'regions' ) ) : ?>

	<div class="sidebar-zone">
	  <p><a href="#" class="btn btn-lg btn-info"><span class="fa fa-pencil-square-o"></span> J'adhère au SNMKR</a></p>
	  <aside class="">
	    <h2 class="h3">La newsletter</h2>
	    <form>
	    <div class="form-group">
	      <label class="sr-only" for="mail">votre email</label>
	      <div class="input-group">
	        <div class="input-group-addon"><span class="fa fa-envelope"></span></div>
	        <input type="email" class="form-control" id="mail" placeholder="votre email">
	      </div>
	    </div>
	    <div class="form-group">
	     <button type="submit" class="btn btn-primary"><span class="fa fa-send"></span> S'inscrire</button>
	    </div>
	  </form>
	  </aside>
	  <hr>
	  <nav class="reseaux">
	    <h2 class="h3">Suivre le SNMKR</h2>
	    <ul class="list-unstyled row">
	      <li class="col-xs-2"><a href="#"><span class="fa fa-twitter-square"></a></li>
	      <li class="col-xs-2"><a href="#"><span class="fa fa-facebook-square"></a></a></li>
	      <li class="col-xs-2"><a href="#"><span class="fa fa-linkedin-square"></a></a></li>
	    </ul>
	  </nav>
	  <hr>
	  <aside class="acces">
	    <h2 class="h3">Accéder</h2>
	    <ul class="list-unstyled row">
	      <li class="col-xs-3"><a href="http://www.onrek.fr/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/logo-onrek.jpg" alt="onrek"><span>onrek</span></a></li>
	      <li class="col-xs-3"><a href="http://www.onrek.fr/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/logo-apek.jpg" alt="apek"><span>apek</span></a></li>
	      <li class="col-xs-3"><a href="http://www.onrek.fr/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/logo-ujmk.jpg" alt="ujmk"><span>ujmk</span></a></li>
	      <li class="col-xs-3"><a href="http://www.onrek.fr/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/logo-umko.jpg" alt="umko"><span>umko</span></a></li>
	    </ul>
	  </aside>
	  <hr>  
	</div> <!-- .sidebar-zone -->

	<?php endif; ?>

	<div class="sidebar-zone">
	  <aside>
	    <h2 class="h3">Les sections</h2>
	     <div id="map"></div>
	  </aside>
	</div> <!-- .map -->
	
	<div class="sidebar-zone widgets">
		<?php dynamic_sidebar('sidebar-primary'); ?>
	</div>
		

</div> <!-- .row-->