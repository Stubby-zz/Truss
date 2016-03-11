<?php
foreach ( glob( SHORTCODES_DIR . '*.php' ) as $file ) {
  include ( $file );
}

if ( $shortcodes ) { 

  foreach ( $shortcodes as $shortcode ) {

    add_shortcode( $shortcode["tag"], $shortcode["callback"] );

  }

}