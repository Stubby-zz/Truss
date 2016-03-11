<?php
/* Handles nav menu registration from the menus manifest */

foreach ( glob( NAV_MENUS_DIR . '*.php' ) as $file ) {
  include ( $file );
}

if ( $nav_menus ) {

  foreach ( $nav_menus as $nav_menu ) {
    register_nav_menu( 
                      $nav_menu['args']['location'],
                      $nav_menu['args']['description']
    );
  }

}
