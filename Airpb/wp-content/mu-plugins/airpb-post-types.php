<?php
function site_post_types() {

  // Faq
register_post_type('faq', array(
  'rewrite' => array('slug' => 'faq'),
  'supports' => array('title', 'editor'),
  'public' => true,
  'show_in_rest' => true,
  'labels' => array(
    'name' => 'Faq',
    'add_new_item' => 'Add new faq',
    'edit_item' => 'Edit faq',
    'all_items' => 'All faq',
    'singular_name' => 'Faq',
  ),
  'menu_icon' => 'dashicons-editor-ul',
));

  // Faq
  register_post_type('team', array(
   'rewrite' => array('slug' => 'team'),
   'supports' => array('title', 'editor', 'thumbnail'),
   'public' => true,
   'show_in_rest' => true,
   'labels' => array(
     'name' => 'Team',
     'add_new_item' => 'Add new co-worker',
     'edit_item' => 'Edit co-worker',
     'all_items' => 'All co-workers',
     'singular_name' => 'Team',
   ),
   'menu_icon' => 'dashicons-groups',
 ));

}

add_action('init', 'site_post_types');

?>