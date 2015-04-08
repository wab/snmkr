<?php

use Roots\Sage\Config;
use Roots\Sage\Wrapper;

?>

<?php get_template_part('templates/head'); ?>
  <body <?php body_class("top"); ?>>
    <!--[if lt IE 9]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('templates/navbar');
    ?>
    <div class="wrap" role="document">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-2 hidden-xs">
            <?php get_template_part('templates/header'); ?>
          </div> <!-- .col-md-2 -->

            <main class="main" role="main">
              
              <?php include Wrapper\template_path(); ?>
            
            </main><!-- /.main -->

            <div class="sidebar" role="complementary">

              <?php include Wrapper\sidebar_path(); ?>
              
            </div><!-- /.sidebar -->
            
          <?php if (is_front_page()) : ?>
            <div class="col-lg-2 visible-lg">
              <?php dynamic_sidebar('sidebar-secondary'); ?>
            </div>
          <?php endif; ?>
            
                
        </div><!--  /.row -->

      </div><!-- .container-fluid -->
    </div><!-- /.wrap -->

    <?php
      if (is_home()) {
        get_template_part('templates/bannieres');
      }
      get_template_part('templates/footer');
      wp_footer();
    ?>
    
  </body>
</html>
