<?php
	use Roots\Sage\Nav;
	use Roots\Sage\Utils;

	global $post;
	$menuclass = 'nomenu';

	if ($post->post_parent)   {
		$ancestors=get_post_ancestors($post->ID);
		$root=count($ancestors)-1;
		$parent = $ancestors[$root];
		$menuclass = 'withmenu';
	} else {
		$parent = $post->ID;
	}

	$args_menu = array(
		'authors'      => '',
		'child_of'     => $parent,
		'date_format'  => get_option('date_format'),
		'depth'        => 0,
		'echo'         => 1,
		'exclude'      => '',
		'include'      => '',
		'link_after'   => '',
		'link_before'  => '',
		'post_type'    => 'page',
		'post_status'  => 'publish',
		'show_date'    => '',
		'sort_column'  => 'menu_order, post_title',
	        'sort_order'   => '',
		'title_li'     => '', 
		'walker'       => new Nav\Custom_Walker_Page()
	);
		
?>

<?php while (have_posts()) : the_post(); ?>
	<div class="row <?php echo $menuclass; ?>">
		
		<?php if ($post->post_parent)   { ?>
			<div class="menu-col">
				<nav class="navigation" role="navigation">
            		<ul class="list-group list-unstyled menu">
						<?php wp_list_pages($args_menu); ?>
					</ul>
				</nav>
	  		</div>
	  	<?php } ?>

		<div class="contenu">
			<?php get_template_part('templates/page', 'header'); ?>
			<?php get_template_part('templates/content', 'page'); ?>
			<?php
			if (Utils\has_subpages()) {
				$mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'desc', 'parent' => $post->ID ) );

				foreach( $mypages as $page ) {		
				?>
					<h2 class="h3"><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></h2>
				<?php
				}
			}	
			?>
		</div>

	</div>
<?php endwhile; ?>