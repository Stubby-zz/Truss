<?php
/* Handles post type registration from the psot type manifest */
foreach ( glob( POST_TYPES_DIR . '*.php' ) as $file ) {
  include ( $file );
}

if ( $post_types ) {

  foreach ( $post_types as $post_type ) {
    register_post_type( 
                      $post_type['post_type'], 
                      $post_type['args'] 
    );
  }

}
