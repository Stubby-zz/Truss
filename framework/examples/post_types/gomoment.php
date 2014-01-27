<?php 

$post_types[] = array(
                  'post_type' => 'sample',
                  'args'      =>   array(
                                      'labels'      => post_type_labels( 'Sample Post Type' ),
                                      'public'      => true,
                                      'has_archive' => true,
                                      'rewrite' => array( 
                                                      'slug'       => 'sample', 
                                                      'with_front' => false 
                                                    ),
                                      'menu_icon'   => 'dashicons-hammer',
                                      'supports'    => array(
                                                            'title', 
                                                            'editor', 
                                                            'author', 
                                                            'thumbnail', 
                                                            'excerpt', 
                                                            'trackbacks', 
                                                            'custom-fields', 
                                                            'comments', 
                                                            'revisions', 
                                                            'page-attributes',
                                                            'post-formats'
                                                        ),
                                      'show_in_menu' => 'default_settings',
                                    ) 
                );