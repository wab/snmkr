<?php use Roots\Sage\Nav; ?>
<!-- burger -->
<button type="button" class="menu-icon collapsed" data-toggle="collapse" data-target="#navigation">
  <span class="sr-only">Toggle navigation</span>
  <span></span>
  <svg x="0" y="0" width="34px" height="34px" viewBox="0 0 34 34">
      <circle cx="17" cy="17" r="16"></circle>
  </svg>
</button>
<!-- navigation -->
<nav id="navigation" class="collapse nav-collapse" role="navigation">
  <?php
    if (has_nav_menu('primary_navigation')) :
      wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'navigation-principale list-unstyled', 'link_before' => '<span class="fa-icon"></span><span class="intitule">', 'link_after' => '</span>', 'walker' => new Nav\SageNavWalker()] );
    endif;
    ?>
  <hr>
  <?php get_search_form(); ?>
</nav>
