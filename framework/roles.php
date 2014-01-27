<?php
/*
  Handles user roles
*/

add_filter( 'init', 'init_roles' );

function init_roles( $roles ) {

  foreach ( glob( ROLES_DIR . '*.php' ) as $file ) {
    include ( $file );
  }


  foreach ( $roles as $role ) {
    add_role( $role["role"], $role["display_name"], $role["capabilities"] );
  }

}
?>