<?php
$posts[] = array( 
                'post_title'    => 'sample',
                'post_type'     => 'sample',
                'post_status'   => 'publish',
                'post_metas'    => array( '_sample_meta' => 'Here is some sample meta data' ),
                //  Using 'unique' prevents this post from being automatically duplicated.
                'unique'        => true,
              );