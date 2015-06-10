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
                
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/logo-snmkr.png" alt="SNMKR" class="logo">
                <hr>
                <h1 class="sr-only">
                  <span class="text-primary">S</span>yndicat <br class="hidden-sm hidden-xs"><span class="text-primary">N</span>ational des<br><span class="text-primary">M</span>asseurs <br class="hidden-sm hidden-xs"><span class="text-primary">K</span>inésithérapeutes <br class="hidden-sm hidden-xs"><span class="text-primary">R</span>ééducateurs
                </h1>
                <h2 class="h3">Proposer, informer, défendre &hellip;</h2>
              </div>
              <div class="col-md-6 col-md-offset-1">
                <?php get_template_part('templates/searchform'); ?>
              </div>
            </div>

            <div class="row">
              <div class="col-md-10">
                <div class="text-right">
                  <?php get_template_part('templates/edito'); ?>
                </div>
              </div>
            </div>
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

    <div class="callactions section">

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="text-center"><a href="#" class="btn btn-lg btn-info"><span class="fa fa-paper-plane"></span> s'inscrire à la newsletter</a> <a href="#" class="btn btn-lg btn-primary"><span class="fa fa-pencil-square-o "></span> adhérer au SNMKR</a></div>
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

    <section class="section-map section">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <h1 class="text-center"><span class="fa fa-flag"></span> Les sections</h1>
              <div id="map"></div>
                    <p><span class="fa fa-plus"></span> <a href="<?php bloginfo('url') ?>/regions">voir toutes les sections</a></p>
            </div>
          </div>
        </div>
    </section>

    <div class="section-widgets section">
      <?php get_template_part('templates/widgets'); ?>
    </div>

    <?php
      get_template_part('templates/footer');
      wp_footer();
    ?>
    
  </body>
</html>
