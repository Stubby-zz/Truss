<?php
function my_mce_before_init_insert_formats( $init_array ) {  
  
  foreach ( glob( EDITOR_STYLES_DIR . '*.php' ) as $file ) {
    include ( $file );
  }

  $init_array['style_formats'] = json_encode( $style_formats );  
  
  return $init_array;  
  
} 

add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );  