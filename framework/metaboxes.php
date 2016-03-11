<?php
/* Handles creation of metaboxes defined in the manifest */

add_action( 'add_meta_boxes', 'register_meta_boxes');
add_action( 'save_post', 'save_meta_boxes', 1, 1);


//  This handles most meta box behaviors.
// 
//  The format of your meta box must be such that the form fields are named metaboxes[meta_key]
//  and each meta box must have a nonce to verify its presence.

function save_meta_boxes( $post_id ) {

  $meta_box = $_POST["meta_boxes"];
  
  if (count( $meta_box ) > 0 ) {

    foreach( $meta_box as $key => $value) {

        $meta_key = "_" . $key;

        $new_meta_value = ( isset( $meta_box[$key] ) ) ? $meta_box[$key] : false;

        if( $new_meta_value or $new_meta_value == 0 ) {
          delete_post_meta( $post_id, $meta_key );
          add_post_meta( $post_id, $meta_key, $new_meta_value );
        }
        
      }
    }

  }


function register_meta_boxes() {

  foreach ( glob( METABOXES_DIR . '*.php' ) as $file ) {
    include ( $file );
  }

  if ( $metaboxes ) {
    
    foreach ( $metaboxes as $metabox ) {

      if ( $metabox['post_type'] == 'all' ) {

        $post_types = get_post_types();

        foreach ( $post_types as $post_type ) {

            add_meta_box(
              $metabox['id'], 
              $metabox['title'], 
              $metabox['callback'], 
              $post_type, 
              $metabox['context'],
              $metabox['priority'], 
              $metabox['callback_args']
            );

        }

      } else {

        add_meta_box(
          $metabox['id'], 
          $metabox['title'], 
          $metabox['callback'], 
          $metabox['post_type'], 
          $metabox['context'],
          $metabox['priority'], 
          $metabox['callback_args']
        );

      }

      if ( $metabox['save_callback'] ) {
        add_action( 'save_post', $metabox['function'], $metabox['priority'], $metabox['arguments'] );
      }

    }

  }

}