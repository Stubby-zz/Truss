<?php

// Here's a neat way to hide all those hideous /wp-content/themes/theme_name/* urls in your theme.

$non_wp_permalinks[] = array( 
                          'rule'    => 'stylesheets/(.*)',  
                          'rewrite' => 'wp-content/themes/'. THEME_NAME . '/stylesheets/$1' 
                      );  

$non_wp_permalinks[] = array(
                          'rule'    => 'js/(.*)',
                          'rewrite' => 'wp-content/themes/'. THEME_NAME . '/javascripts/$1'  
                      );

$non_wp_permalinks[] = array(
                          'rule'    => 'images/(.*)',
                          'rewrite' => 'wp-content/themes/'. THEME_NAME . '/images/$1',  
                      );

$non_wp_permalinks[] = array(
                          'rule'    => 'fonts/(.*)',
                          'rewrite' => 'wp-content/themes/'. THEME_NAME . '/fonts/$1',  
                      );