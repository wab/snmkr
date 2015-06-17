<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header class="page-header">
      <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
    <div class="entry-content">
      <?php if ( has_post_thumbnail() ) : ?>
        <p><?php the_post_thumbnail('full', array( 'class' => 'img-responsive' )); ?></p>
      <?php endif; ?>
      <?php if (in_category('editos')) : 
        $imgedito = wp_get_attachment_image_src( 392, 'media' );
      ?>
        <img src="<?php echo $imgedito[0]; ?>" alt="Stéphane Michel" class="img-thumbnail alignright">
      <?php endif; ?>
      <?php the_content(); ?>
    </div>
    <footer>
      <p class="text-right"><?php get_template_part('templates/entry-meta'); ?></p>
      <?php comments_template('/templates/share.php'); ?>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
