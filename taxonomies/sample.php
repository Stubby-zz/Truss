<?php

$taxonomies[] = array(
                  'taxonomy'    => 'sample_taxonomy',
                  'object_type' => 'sample',
                  'args'        => array(
                                    'labels' => array(
                                                  'name'          => 'Sample Category', 
                                                  'add_new_item'  => 'Add Sample Category',
                                                  'new_item_name' => 'New Sample Category'
                                                ),
                                    'show_ui'       => true,
                                    'swho_tagcloud' => false,
                                    'hierarchical'  => true,
                                  )

                      );