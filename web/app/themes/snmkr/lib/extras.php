<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Config;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Config\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }
  else {
    $classes[] = 'nosidebar';
  }


  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <p class="text-right"><a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a></p>';
}
//add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

// Admin bar
show_admin_bar( false );

//add_filter('woocommerce_show_page_title', '__return_false');
//remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
remove_action( 'admin_notices', 'woothemes_updater_notice' );

function sage_sidebar_on_special_page($sidebar) {
  if (is_page_template('accueil.php')) {
    return true;
  }
  return $sidebar;
}

add_filter('sage/display_sidebar', __NAMESPACE__ . '\\sage_sidebar_on_special_page');

function bgclass($classes) {
  // add 'class-name' to the $classes array
  $classes[] = 'bg-'.rand(1,2);
  // return the $classes array
  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\bgclass');
