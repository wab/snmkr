<?php the_content(); ?>
<?php

$args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => $post->ID,
    'order'          => 'ASC',
    'orderby'        => 'menu_order'
 );


$parent = new WP_Query( $args );

if ( $parent->have_posts() ) : ?>

    <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>

        <div id="parent-<?php the_ID(); ?>" class="subpage">

            <h2 class="h3"><?php the_title(); ?></a></h2>

            <p><?php the_excerpt(); ?></p>
            <p><span class="fa fa-hand-o-right"></span> <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Lire la suite</a></p>

        </div>

    <?php endwhile; ?>

<?php endif; wp_reset_query(); ?>

<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
