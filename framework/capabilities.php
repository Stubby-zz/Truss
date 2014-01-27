<?php
/*
  Handles role capabilities
*/

add_filter( 'init', 'init_capabilities' );

function init_capabilities( $capabilities ) {

  foreach ( glob( CAPABILITIES_DIR . '*.php' ) as $file ) {
    include ( $file );
  }

  foreach ( $capabilities as $capability ) {
    $role = get_role( $capability["role"] );
    $role->add_cap( $capability["cap"] );
  }

}
?>