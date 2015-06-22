<?php

use Roots\Sage\Config;
use Roots\Sage\Wrapper;
use Roots\Sage\Nav;

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
      //get_template_part('templates/navbar');
    ?>

  

    <header class="header">
      
       <div class="section">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-2 text-center">
                <?php get_template_part('templates/header'); ?>
              </div>
              <div class="col-md-6 col-md-offset-1">
                <?php get_template_part('templates/searchform-accueil'); ?>
              </div>
            </div>

            <div class="row">
              <div class="col-md-10">
                <div class="text-right">
                  <?php get_template_part('templates/edito'); ?>
                </div>
              </div>
            </div>

            <div class="chevron"><a href="#anchor" class="smoothscroll"><span class="fa fa-angle-down"></span></a></div>

         </div>
       </div>

    </header>

    <nav class="navigation">
      <div class="container-fluid">
             <?php
              if (has_nav_menu('primary_navigation')) :
                wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'navigation-principale list-unstyled list-inline', 'link_before' => '<span class="fa-icon"></span><span class="intitule">', 'link_after' => '</span>', 'walker' => new Nav\SageNavWalker()] );
              endif;
              ?>
      </div>
    </nav>

    <div class="callactions section" id="anchor">

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3 col-md-offset-3">
            <div class="text-center">
             <p>
               <a href="<?php echo get_permalink( 1052 ); ?>" class="btn btn-lg btn-primary"><span class="fa fa-pencil-square-o "></span> adhérer au SNMKR</a>
             </p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="text-center">
              <p>
                <a href="http://eepurl.com/bq9K0f" class="btn btn-lg btn-info"><span class="fa fa-paper-plane"></span> s'inscrire à la newsletter</a>
              </p>
           </div>
          </div>
        </div>
      </div>

    </div>

    <section class="actualites section">
      
      <div class="container-fluid">
          <div class="row">

            <div class="col-md-6 col-md-offset-3">
                
                <?php include Wrapper\template_path(); ?>

            </div>
          </div>        
      </div><!-- .container-fluid -->

    </section><!-- /.wrap -->

    <?php get_template_part('templates/videos'); ?>

    <?php get_template_part('templates/bannieres'); ?>

    <?php get_template_part('templates/aside'); ?>

    <?php get_template_part('templates/widgets'); ?>

    <?php
      get_template_part('templates/footer');
      wp_footer();
    ?>
    
  </body>
</html>
