<?php use Roots\Sage\Nav; ?>

<nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fuild">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo get_home_url(); ?>">snmkr</a>          
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navigation">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new Nav\SageNavWalker(), 'menu_class' => 'nav navbar-nav']);
      endif;
      ?>
      
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <div class="input-group">
            <input type="search" class="form-control" placeholder="Recherche">
            <div class="input-group-addon"><span class="fa fa-search"></span></div>
          </div>
          <button type="submit" class=" sr-only">Rechercher</button>
        </div>
      </form>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
