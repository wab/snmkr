<?php use Roots\Sage\Nav; ?>

<nav class="navigation-principale" role="navigation">
    <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'list-unstyled', 'link_before' => '<span class="fa-icon"></span><span class="intitule">', 'link_after' => '</span>', 'walker' => new Nav\SageNavWalker()] );
      endif;
      ?>
      <hr>
      <?php get_search_form(); ?>
      <hr>
      <ul class="reseaux list-inline">
        <li><a href="http://www.twitter.com/snmkr1"><span class="fa fa-twitter-square"></span></a></li>
        <li><a href="#"><span class="fa fa-facebook-square"></span></a></li>
        <li><a href="#"><span class="fa fa-linkedin-square"></span></a></li>
      </ul>
</nav>
