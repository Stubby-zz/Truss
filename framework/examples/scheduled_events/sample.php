<?php

$scheduled_events[] = array(
                         "timestamp"  => strtotime( "+1 minute", time( 'timestamp' ) ),
                         "recurrence" => "hourly",
                         "hook"       => "hourly_events",
                         "args"       => array(),
                     );