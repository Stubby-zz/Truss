<?php
/* Creates pages defined in the pages manifest */

//  Only run these migrations if we're currently in wp-admin (this prevents heavy loads on the front-end)
add_action( 'init', 'init_pages' );

function init_pages() {
  
  foreach ( glob( PAGES_DIR . '*.php' ) as $file ) {
    
    include ( $file );
    $completed[] = $file;
 
  }
  
  if ( $pages ) {
 
    foreach ( $pages as $page ) {
 
      register_page( $page );
 
    }

  }
  
}

?>