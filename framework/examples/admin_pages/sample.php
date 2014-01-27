<?php
$admin_pages[] = array(
                    'page_title' => 'Settings',
                    'menu_title' => 'Default Settings',
                    'menu_slug'  => 'default_settings',
                    'menu_icon'  => 'dashicons-editor-help',
                    'position'   => 22,
                    'function'   => '',
                    'capability' => 'edit_posts',
                    'sub_pages' => array( 
                                      array(
                                          'page_title' => 'Default Settings Settings',
                                          'menu_title' => 'Settings',
                                          'capability' => 'manage_options',
                                          'menu_slug'  => 'settings',
                                          'function'   => 'settings_page'
                                      )
                                    ),
                  );