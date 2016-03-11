<?php
/* Creates posts defined in the posts manifest. */

//  Only run these migrations if we're currently in wp-admin (this prevents heavy loads on the front-end)
if ( is_admin() ) { add_action( 'init', 'init_posts' ); }

function init_posts() {
  
  $completed = ( get_site_option( 'post_migrations' ) ) ? get_site_option( 'post_migrations' ) : array();
  foreach ( glob( POSTS_DIR . '*.php' ) as $file ) {
    include ( $file );
  }
  
  
  delete_site_option( 'post_migrations' );
  add_site_option( 'post_migrations', $completed );

  if ( $posts ) {
  
    foreach ( $posts as $post ) {
  
      register_post( $post );
  
    }
  
  }

}

?>