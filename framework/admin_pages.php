<?php
/* Creates pages defined in the pages manifest */

add_action( 'admin_menu', 'init_admin_pages' );

function init_admin_pages() {
  
  foreach ( glob( ADMIN_PAGES_DIR . '*.php' ) as $file ) {
    include ( $file );
  }

  if ( $admin_pages ) {
    foreach ( $admin_pages as $admin_page ) {

      add_menu_page( 
                $admin_page['page_title'], 
                $admin_page['menu_title'], 
                $admin_page['capability'], 
                $admin_page['menu_slug'], 
                $admin_page['function'], 
                $admin_page['icon_url'], 
                $admin_page['position']
      );

      if ( $admin_page['sub_pages'] ) {
        
        foreach ( $admin_page['sub_pages'] as $sub_page ) {
           add_submenu_page( 
            $admin_page['menu_slug'], 
            $sub_page['page_title'], 
            $sub_page['menu_title'], 
            $sub_page['capability'],
            $sub_page['menu_slug'], 
            $sub_page['function']
          );
        }
      }
    }

  }

}

?>