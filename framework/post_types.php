<?php
/* Handles post type registration from the psot type manifest */
add_action( "init", "init_truss_post_types" );

function init_truss_post_types() {

  foreach ( glob( POST_TYPES_DIR . '*.php' ) as $file ) {
    include ( $file );
  }
    

  if ( $post_types ) {

    foreach ( $post_types as $post_type ) {
      register_post_type( 
                        $post_type['post_type'], 
                        $post_type['args'] 
      );

      if ( $post_type["columns"] ) {
      }

    }

  } 
}

function truss_post_type_edit_columns( $columns ) {
  global $post_type;
  return $post_type["columns"];
}
