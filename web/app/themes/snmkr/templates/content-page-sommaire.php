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

    <ul class="sommaire list-unstyled">

    <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>

        <li id="parent-<?php the_ID(); ?>">
            <a href="<?php the_permalink(); ?>"><span class="fa fa-hand-o-right"></span> <?php the_title(); ?></a>
        </li>

    <?php endwhile; ?>

    </ul>

<?php endif; wp_reset_query(); ?>

<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
