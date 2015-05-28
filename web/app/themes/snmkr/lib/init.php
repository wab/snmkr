<?php

namespace Roots\Sage\Init;

use Roots\Sage\Assets;

/**
 * Theme setup
 */
function setup() {
  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/sage-translations
  load_theme_textdomain('sage', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus([
    'primary_navigation' => __('Primary Navigation', 'sage'),
    'snmkr' => 'snmkr',
    'profession' => 'profession'
  ]);

  // Add post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');
  set_post_thumbnail_size(800, 450, true );
  add_image_size('media', 100, 100, true ); // Media Post Thumbnail dimensions (cropped)
  add_image_size('banniere', 640, 360, true );
  // Add post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote']);

  // Add HTML5 markup for captions
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list']);

  // Tell the TinyMCE editor to use a custom stylesheet
  add_editor_style(Assets\asset_path('styles/editor-style.css'));

  //woocommerce
   add_theme_support( 'woocommerce' );
}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');

/**
 * Register sidebars
 */
function widgets_init() {
  register_sidebar([
    'name'          => 'Accueil',
    'id'            => 'zone-1',
    'before_widget' => '<aside class="widget %1$s %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h1 class="h2">',
    'after_title'   => '</h1>'
  ]);

  register_sidebar([
    'name'          => 'zone 2',
    'id'            => 'zone-2',
    'before_widget' => '<aside class="widget %1$s %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h1 class="h3">',
    'after_title'   => '</h1>'
  ]);

  register_sidebar([
    'name'          => 'zone 3',
    'id'            => 'zone-3',
    'before_widget' => '<aside class="widget %1$s %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h1 class="h3">',
    'after_title'   => '</h1>'
  ]);
}
add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');
