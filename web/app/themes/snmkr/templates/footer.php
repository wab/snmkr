<a href="#top" class="backtop scroll"><span class="fa fa-caret-up"></span></a>
<div class="footer" >
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-offset-2 col-lg-8 col-md-10">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div role="navigation">
                  <h2 class="h3"><span class="fa fa-folder-open"></span> Le syndicat</h2>
                  <hr>
                  <ul class="list-unstyled">
                    <?php wp_list_pages( 'child_of=808&depth=1&title_li='); ?> 
                  </ul>
                </div>
              </div><!-- .col -->
              <div class="col-md-3 col-sm-6">
                <div role="navigation">
                  <h2 class="h3"><span class="fa fa-graduation-cap"></span> La profession</h2>
                  <hr>
                  <ul class="list-unstyled">
                    <?php wp_list_pages( 'child_of=810&depth=1&title_li='); ?>
                  </ul>
                </div>
              </div><!-- .col -->
              <div class="col-md-3 col-sm-6">
                <div role="navigation">
                  <h2 class="h3"><span class="fa fa-gavel"></span> Les textes</h2>
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