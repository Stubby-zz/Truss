<?php
/* Creates posts defined in the posts manifest. */
add_action( 'init', 'init_sidebars' );

function init_sidebars() {

  foreach ( glob( SIDEBARS_DIR . '*.php' ) as $file ) {
    include ( $file );
  }

  if ( $sidebars ) {

    foreach ( $sidebars as $sidebar ) {
      register_sidebar( $sidebar );
    }
  

  }


}
