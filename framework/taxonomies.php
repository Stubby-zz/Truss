<?php
/* Handles taxonomy registration from the taxonomy manifest */

foreach ( glob( TAXONOMIES_DIR . '*.php' ) as $file ) {
  include ( $file );
}
  

if ( !empty( $taxonomies ) ) {

  foreach ( $taxonomies as $taxonomy ) {
    register_taxonomy( 
                    $taxonomy['taxonomy'], 
                    $taxonomy['object_type'], 
                    $taxonomy['args'] 
    );  
  }

}

