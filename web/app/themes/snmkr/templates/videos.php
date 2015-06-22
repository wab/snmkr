<?php 
// the query
$query_videos = new WP_Query( 'post_type=video&posts_per_page=1'); ?>

<?php if ( $query_videos->have_posts() ) : ?>


<aside class="videos section">
  <div class="row">

    <div class="col-md-6 col-md-offset-3">
    
            <!-- pagination here -->
    
            <!-- the loop -->
            <?php while ( $query_videos->have_posts() ) : $query_videos->the_post(); ?>
            
              <!-- 16:9 aspect ratio -->
              <div class="embed-responsive embed-responsive-16by9">
                <?php the_content(); ?>
              </div>
    
                    
            <?php endwhile; ?>
            <!-- end of the loop -->
    
            <!-- pagination here -->
    </ul>
  </div>
  
</aside>

<?php wp_reset_postdata(); ?>

<?php endif; ?>