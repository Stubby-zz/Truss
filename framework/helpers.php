<?php
/* Core helper functions */
$helper_files = opendir( HELPERS_DIR );

foreach ( glob( HELPERS_DIR . '*.php' ) as $file ) {
  include ( $file );
}


function register_page( $args ) {
  $args['post_type'] = 'page';
  $args['unique'] = 'true';
  register_post( $args );
}

function register_permalink( $args ) {
  add_rewrite_rule( $args['rule'], $args['rewrite'], $args['position'] );
}

function register_permalinks( $args ) {
  foreach ( $args as $permalink ) {
    register_permalink( $permalink );
  }
}

function post_type_labels( $name ) {

  $singular_name = substr( $name, 0, -1 );
  $singular_name = ( substr( $singular_name, -2, 2 ) == "ie" ) ? substr( $singular_name, 0, -2 ) . "y" : $singular_name;

  return array(
    'name'               => $name,
    'singular_name'      => $singular_name,
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New ' . $singular_name,
    'edit_item'          => 'Edit ' . $singular_name,
    'new_item'           => 'New ' . $singular_name,
    'all_items'          => 'All ' . $name,
    'view_item'          => 'View ' . $singular_name,
    'search_items'       => 'Search ' . $name,
    'not_found'          =>  'No ' . $name . ' found',
    'not_found_in_trash' => 'No ' . $name . ' found in Trash', 
    'parent_item_colon'  => '',
    'menu_name'          => $name
  );

}

?>