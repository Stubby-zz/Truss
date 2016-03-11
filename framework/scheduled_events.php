<?php
foreach ( glob( EVENTS_DIR . '*.php' ) as $file ) {
  include ( $file );
}
  

if ( $scheduled_events ) {
  foreach ( $scheduled_events as $event ) {
    if ( wp_get_schedule( $event["hook"] ) != $event["recurrence"] ){
      wp_schedule_event( $event["timestamp"], $event["recurrence"], $event["hook"], $event["args"] );      
    }
  }

}

?>