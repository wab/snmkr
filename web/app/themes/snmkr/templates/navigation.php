<?php use Roots\Sage\Nav; ?>

<nav class="navigation-principale" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="" id="navigation">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'list-unstyled', 'link_before' => '<span class="fa-icon"></span><span class="intitule">', 'link_after' => '</span>'] );
      endif;
      ?>
      
      <?php get_search_form(); ?>

    </div><!-- /.navbar-collapse -->
</nav>
