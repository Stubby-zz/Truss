<?php
$metaboxes[] =  [
                  'id'        => 'post_teaser_meta_box',
                  'title'     => 'Post Teaser',
                  'callback'  => 'post_teaser_meta_box',
                  'post_type' => 'post',
                  'context'   => 'normal',
                  'priority'  => 'high',
                ];