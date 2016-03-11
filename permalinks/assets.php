<?php

// Here's a neat way to hide all those hideous /wp-content/themes/theme_name/* urls in your theme.

$non_wp_permalinks[] =  [
                          'rule'    => 'vendor/(.*)',
                          'rewrite' => 'wp-content/themes/'. THEME_NAME . '/vendor/$1'
                        ];

$non_wp_permalinks[] =  [
                          'rule'    => 'css/(.*)',
                          'rewrite' => 'wp-content/themes/'. THEME_NAME . '/css/$1'
                        ];

$non_wp_permalinks[] =  [
                          'rule'    => 'scripts/(.*)',
                          'rewrite' => 'wp-content/themes/'. THEME_NAME . '/scripts/$1'
                        ];

$non_wp_permalinks[] =  [
                          'rule'    => 'images/(.*)',
                          'rewrite' => 'wp-content/themes/'. THEME_NAME . '/images/$1',
                        ];

$non_wp_permalinks[] =  [
                          'rule'    => 'fonts/(.*)',
                          'rewrite' => 'wp-content/themes/'. THEME_NAME . '/fonts/$1',
                        ];
?>
