<?php

namespace Roots\Sage\Utils;

/**
 * Tell WordPress to use searchform.php from the templates/ directory
 */
function get_search_form() {
  $form = '';
  locate_template('/templates/searchform.php', true, false);
  return $form;
}
add_filter('get_search_form', __NAMESPACE__ . '\\get_search_form');

/**
 * Make a URL relative
 */
function root_relative_url($input) {
  preg_match('|https?://([^/]+)(/.*)|i', $input, $matches);
  if (!isset($matches[1]) || !isset($matches[2])) {
    return $input;
  } elseif (($matches[1] === $_SERVER['SERVER_NAME']) || $matches[1] === $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT']) {
    return wp_make_link_relative($input);
  } else {
    return $input;
  }
}

/**
 * Compare URL against relative URL
 */
function url_compare($url, $rel) {
  $url = trailingslashit($url);
  $rel = trailingslashit($rel);
  if ((strcasecmp($url, $rel) === 0) || root_relative_url($url) == $rel) {
    return true;
  } else {
    return false;
  }
}

/**
 * Check if element is empty
 */
function is_element_empty($element) {
  $element = trim($element);
  return !empty($element);
}

function get_top_parent_id(){
  global $post;
  if ($post->post_parent)   {
    $ancestors=get_post_ancestors($post->ID);
    $root=count($ancestors)-1;
    $parent = $ancestors[$root];
  } else {
    $parent = $post->ID;
  }
  return $parent;
}

// has subpages
function has_subpages() {
    global $post;

    $parent = false;
    $args_subpage = array(
      'child_of' => $post->ID,
      'post_type' => array( 'page', 'regions' )
    );

    $children = get_pages($args_subpage);
    if( count( $children ) > 0 ) {
        $parent = true;
    }

    return $parent;
}

// first subpage
function first_subpage($postId) {

    $args_subpage = array(
      'child_of' => $postId,
      'post_type' => array( 'page', 'regions' )
    );

    $children = get_pages($args_subpage);

    return  $children[0]->post_title;
}
