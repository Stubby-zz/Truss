<?php
/* Core helper functions */

foreach ( glob( HELPERS_DIR . '*.php' ) as $file ) {
  include ( $file );
}
?>