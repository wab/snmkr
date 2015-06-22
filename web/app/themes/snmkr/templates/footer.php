<a href="#top" class="backtop smoothscroll"><span class="fa fa-caret-up"></span></a>
<aside class="partenaires section">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-offset-2 col-lg-8 col-md-10 text-right">
        <h1 class="h4">Nos partenaires :</h1>
        <ul class="list-inline">
          <li><a href="http://www.adoha.fr"><img src="<?= get_template_directory_uri(); ?>/dist/images/logo-adoha.png" alt="Adoha"></a></li>
          <li><a href="https://www.cic.fr"><img src="<?= get_template_directory_uri(); ?>/dist/images/logo-cic.png" alt="CIC"></a></li>
          <li><a href="http://www.objectifkine.com/"><img src="<?= get_template_directory_uri(); ?>/dist/images/logo-objectif-kine.png" alt="Objectif Kiné"></a></li>
        </ul>
      </div>
    </div>
  </div>
</aside>
<div class="footer" >
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-offset-2 col-lg-8 col-md-10">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div role="navigation">
                  <h2 class="h3"><span class="fa fa-folder-open"></span> syndicat</h2>
                  <hr>
                  <ul class="list-unstyled">
                    <?php wp_list_pages( 'child_of=808&depth=1&title_li='); ?> 
                  </ul>
                </div>
              </div><!-- .col -->
              <div class="col-md-3 col-sm-6">
                <div role="navigation">
                  <h2 class="h3"><span class="fa fa-graduation-cap"></span> profession</h2>
                  <hr>
                  <ul class="list-unstyled">
                    <?php wp_list_pages( 'child_of=54&depth=1&title_li='); ?>
                  </ul>
                </div>
              </div><!-- .col -->
              <div class="col-md-3 col-sm-6">
                <div role="navigation">
                  <h2 class="h3"><span class="fa fa-gavel"></span> textes</h2>
                  <hr>
                  <ul class="list-unstyled">
                    <?php wp_list_pages( 'child_of=812&depth=1&title_li='); ?>
                  </ul>
                </div>
              </div> <!-- .col -->
              <div class="col-md-3 col-sm-6">
                <div role="navigation">
                  <h2 class="h3"><span class="fa fa-users"></span> Espace Kiné</h2>
                  <hr>
                  <?php wp_list_pages( 'child_of=814&depth=1&title_li='); ?>
                  <hr>
                  <ul class="list-unstyled">
                    <li>
                      <span class="fa fa-pencil-square-o "></span> <a href="#">adhérer au SNMKR</a>
                    </li>
                    <li>
                      <span class="fa fa-paper-plane"></span> <a href="#">s'inscrire à la newsletter</a>
                    </li>
                  </ul>
                </div>
              </div> <!-- .col -->
              
            </div> <!-- .row -->
            
            <footer class="ours" role="contentinfo">
                <hr>
                <p class="text-right"><span class="fa fa-copyright"></span> Syndicat National des Masseurs Kinésithérapeutes Rééducateurs / <a href="<?php bloginfo('url'); ?>/mentions-legales">Mentions légales</a> / <span class="fa fa-sign-in"></span> <a href="<?php echo wp_login_url(); ?>" title="Login">connexion</a></p>
            </footer>
            
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .footer -->