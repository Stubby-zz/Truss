<?php
/* Handles permalink registration from the permalink manifests */

add_action( 'init', 'init_permalinks' );

function init_permalinks() {

  global $wp_rewrite;

  foreach ( glob( PERMALINKS_DIR . '*.php' ) as $file ) {
    include ( $file );
  }

  if ( $wp_permalinks ) {

    register_permalinks( $wp_permalinks );

  }

  if ( $non_wp_permalinks ) {

    foreach ( $non_wp_permalinks as $non_wp_permalink ) {
      $new_non_wp_permalinks[$non_wp_permalink['rule']] = $non_wp_permalink['rewrite'];
    }

    $wp_rewrite->non_wp_rules += $new_non_wp_permalinks;  
    $wp_rewrite->flush_rules();

  }


}

?>