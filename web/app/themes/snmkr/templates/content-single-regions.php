<?php 
use Roots\Sage\Utils;

while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header class="page-header">
      <h1 class="entry-title"><small>Région</small> <?php the_title(); ?></h1>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>

      <?php if (Utils\has_subpages()) : ?>
       
        <?php 

        $args_subpages = array(
          'post_parent' => $post->ID,
          'post_type' => 'regions',
          'posts_per_page'=> 20
        );

        $query_subpages = new WP_Query($args_subpages);


        ?>

        <!-- pagination here -->

        <!-- the loop -->
        <?php while ( $query_subpages->have_posts() ) : $query_subpages->the_post(); ?>
          <h2 class=""><?php the_title(); ?></h2>
          <?php the_content(); ?>
          <hr>
        <?php endwhile; ?>
        <!-- end of the loop -->

        <!-- pagination here -->

        <?php wp_reset_postdata(); ?>

    <?php endif; ?>

    </div>

  </article>
<?php endwhile; ?>
