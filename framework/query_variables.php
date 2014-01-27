<?php
/* Handles query variable registration from the query variables manifest */

add_filter( 'query_vars', 'init_query_variables' );

function init_query_variables( $public_query_vars ) {

  foreach ( glob( QUERY_VARIABLES_DIR . '*.php' ) as $file ) {
    include ( $file );
  }

  return $public_query_vars;

}
?>