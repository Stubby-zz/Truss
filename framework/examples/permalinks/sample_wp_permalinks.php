<?php
$wp_permalinks[] = array(
                      'rule'     => '^oscars/([^/]*)/?',
                      'rewrite'  => 'index.php?pagename=oscars&ticket_event=$matches[1]',
                      'position' => 'top',
                    );