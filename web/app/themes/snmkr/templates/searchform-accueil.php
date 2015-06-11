<form role="search" method="get" class="search-form" action="<?= esc_url(home_url('/')); ?>">

  <div class="field">
  	<label class="field-label"><span class="fa fa-search"></span> <?php _e('Search for:', 'sage'); ?></label>
  	<input type="search" value="<?= get_search_query(); ?>" name="s" class="search-field form-control field-control" required>
  </div>

</form>
