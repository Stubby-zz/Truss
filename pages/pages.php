<?php
$pages[] =  [ 
              'post_title'    => 'Home',
              'post_name'     => 'home',
              'post_type'     => 'page',
              'post_status'   => 'publish',
              'post_template' => 'page.home.php',
              'post_content'  => '<h1>A sample page</h1><p>This is a sample page</p>',
              'post_metas'    =>  [
                                    "background-image" => "/images/manly-hands.jpg",
                                  ],
            ];
?>