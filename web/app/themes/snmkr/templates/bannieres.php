<?php 
// the query
$query_bannieres = new WP_Query( 'post_type=bannieres&posts_per_page=3'); ?>

<?php if ( $query_bannieres->have_posts() ) : ?>


<aside class="bannieres">
  
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8 col-md-offset-2">
        <ul class="row list-unstyled">

          <!-- pagination here -->

          <!-- the loop -->
          <?php while ( $query_bannieres->have_posts() ) : $query_bannieres->the_post(); ?>
          

          <li class="col-sm-4">

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

              

              <a href="<?php echo $url; ?>" title="<?php echo $title; ?>">

                <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" class="img-responsive img-thumbnail" />

              </a>


            <?php endif; ?>


          </li>

          <?php endwhile; ?>
          <!-- end of the loop -->

          <!-- pagination here -->
        </ul>
      </div>
    </div>
  </div>
  
</aside>

<?php wp_reset_postdata(); ?>

<?php endif; ?>