<?php 
// the query
$query_bannieres = new WP_Query( 'post_type=bannieres'); ?>

<?php if ( $query_bannieres->have_posts() ) : ?>


<aside class="bannieres section">
  <div class="container-fluid">
    <ul class="list-unstyled row">
    
            <!-- pagination here -->
    
            <!-- the loop -->
            <?php while ( $query_bannieres->have_posts() ) : $query_bannieres->the_post(); ?>
            
    
            <li class="col-md-3 col-sm-6">
    
              <?php 
    
              $image = get_field('image');
              $url = get_field('lien');
    
              if( !empty($image) ): 
    
                // vars
                
                $title = $image['title'];
                $alt = $image['alt'];
    
                // thumbnail
                $size = 'banniere';
                $thumb = $image['sizes'][ $size ];
    
                ?>
    
                
    
                <a href="http://<?php echo $url; ?>" title="<?php echo $title; ?>">
    
                  <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" class="img-responsive img-thumbnail" />
    
                </a>
    
    
              <?php endif; ?>
    
    
            </li>
    
            <?php endwhile; ?>
            <!-- end of the loop -->
    
            <!-- pagination here -->
    </ul>
  </div>
  
</aside>

<?php wp_reset_postdata(); ?>

<?php endif; ?>