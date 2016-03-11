<?php

// Basic output of data in a <pre> tag
function debug_value( $var, $exit = false ) {
  echo "<pre>";
  var_dump($var);
  echo "</pre>";
  if ( $exit ) { die(); }
}

function underscore_slug( $string ) {
  $spaces = array( " ", "-", "+" );
  return strtolower( str_replace( $spaces, "_", remove_accents( $string ) ) );
}

function conceal_wp_admin() {
  if ( is_admin() &&  !current_user_can( 'manage_options' ) ) {
    render_404();
  }
}

function pluralize( $term ) {
  $term .= ( 's' == substr( $term, -1 ) ) ? "e" : "";
  return $term .= "s";
}


// REST helpers
function rest_headers( $response_type = "json" ) {
  header('Cache-Control: no-cache, must-revalidate');
  header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');

  switch( strtolower( $response_type ) ) {
    case "xml":
      header( 'Content-type: text/xml' );
    break;
    case "json":
    default:
      header( 'Content-type: application/json' );
    break;
  }
}

function rest_error( $args ) {

  header("HTTP/1.0 {$args["code"]}");

  if ( $args["message"] ) {

    $error["error_message"] = $args["message"];
    die( json_encode( $error ) );

  } else {

    die();

  }

}

// Check if a link resolves.
function link_resolves($uri) {
 
  $ch = curl_init($uri);
  curl_setopt($ch, CURLOPT_NOBODY, true);
  curl_exec($ch);
  $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);

  return $code == 200;
}


function random_set( $numbers = 1, $low = false, $high = false ) {
  
  if ( $low and $high ) {

    $random_set = array();
  
    while ( count($arr) < $numbers ) {
  
      $random_number = mt_rand( $low, $high );
  
      if ( !in_array( $random_number, $random_set ) ) { 
        $random_set[] = $random_number;
      }

    }

    return $random_set;

  }

  return false;
}


function template_file_exists( $file ) {
  
  if( is_page_template( $file ) ) {
    $template = get_template_directory() . '/' . $file;
  }
    
  return $template;
}

function render_404() {
  global $wp_query;
  $wp_query->set_404();
  status_header( 404 );
  get_template_part( 404 ); 
  exit();
}

function abandon_http_session( $message ) {
  ob_end_clean();
  header("Connection: close");
  ignore_user_abort(); 
  ob_start();
  
  echo "Operation continuing in the background: " . $message;

  $size = ob_get_length();
  header("Content-Length: $size");
  ob_end_flush();
  flush();
}


// Outputs the contents of a local file into a string using the output buffer.
function get_file_contents($file_name) {
  ob_start();
  include( $file_name );
  $content = ob_get_contents();
  ob_end_clean();
  return $content;
}

function get_post_from_title( $post_title ) {
  global $wpdb;
  $post_id = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_title = '" . $post_title . "'" );
  return $post_id;
}

function register_post( $args ) {
  if ( $args["unique"] == false  or !get_post_from_title( $args['post_title'] ) ) {
    $post = wp_insert_post( $args );
    
    if ( $args['post_template'] ) {
      $template = add_post_meta( $post, '_wp_page_template', $args['post_template'] );
    }

    if ( $args['post_metas'] ) {
      
      foreach ( $args['post_metas'] as $key => $val ) {
        debug_value(add_post_meta( $post, $key, $val ));
      }
    } 

    if ( $args['tax_input'] ) {
      foreach ( $args['tax_input'] as $key => $val ) {
        wp_set_object_terms( $post, $val, $key );
      }
    }
    return $post;
  }

}

function register_page( $args ) {
  $args['post_type'] = 'page';
  $args['unique'] = 'true';
  register_post( $args );
}

function register_permalink( $args ) {
  add_rewrite_rule( $args['rule'], $args['rewrite'], $args['position'] );
}

function register_permalinks( $args ) {
  foreach ( $args as $permalink ) {
    register_permalink( $permalink );
  }
}

function post_type_labels( $name ) {

  $singular_name = substr( $name, 0, -1 );
  $singular_name = ( substr( $singular_name, -2, 2 ) == "ie" ) ? substr( $singular_name, 0, -2 ) . "y" : $singular_name;

  return array(
    'name'               => $name,
    'singular_name'      => $singular_name,
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New ' . $singular_name,
    'edit_item'          => 'Edit ' . $singular_name,
    'new_item'           => 'New ' . $singular_name,
    'all_items'          => 'All ' . $name,
    'view_item'          => 'View ' . $singular_name,
    'search_items'       => 'Search ' . $name,
    'not_found'          =>  'No ' . $name . ' found',
    'not_found_in_trash' => 'No ' . $name . ' found in Trash', 
    'parent_item_colon'  => '',
    'menu_name'          => $name
  );

}

function enable_errors() {
  ini_set( "display_errors", 1 );
  error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT);
}

function get_post_id_from_slug( $post_name, $post_type = "post" ) {

  global $wpdb;
  $id =  $wpdb->get_results( 
                  $wpdb->prepare( 
                              "SELECT id 
                              FROM wp_posts 
                              WHERE post_name='%s'
                              AND post_type = '{$post_type}';", 
                              $post_name
                        )
                ); 
  return intval( $id[0]->id ) || false;

}

function get_post_from_slug( $slug ) {
  $id = get_post_id_from_slug( $slug );
  if ( !$id  ) { return false; }
  else { return get_post( $id ); }
}

function get_ids_of_children( $post_name ) {

  $posts = get_pages(
                  array(
                    'child_of' => get_post_id_from_slug( $post_name )
                  )
            );

  foreach ( $posts as $post ) {
    $ids[] = $post->ID;
  }

  return $ids;

}

function get_slugs_of_children( $post_name ) {  

  $posts = get_pages(
                array(
                  'child_of' => get_post_id_from_slug( $post_name )
                )
            );

  foreach ( $posts as $post ) {
    $slugs[] = $post->post_name;
  }

  return $slugs;
}

function get_post_name( $id ) {
  $post = get_post( $id );
  return $post->post_name;
}

function get_posts_by_meta( $args ) {

  $post_type = ( $args["post_type"] ) ? $args["post_type"] : "post";
  $compare = ( $args["compare"] ) ? $args["compare"] : "=";

  $query_args = array(
            'post_type'   => $post_type,
            'meta_query'  => array(
              array(
                'key' => $args["meta_key"],
                'value' => $args["meta_value"],
                'compare' => $compare
              )
            )
          );

  $query = new WP_Query( $query_args );
  return $query->posts;

}

function activate_required_plugin( $plugin ) {
  $current = get_option( 'active_plugins' );
  $plugin = plugin_basename( trim( $plugin ) );

  if ( !in_array( $plugin, $current ) ) {
      $current[] = $plugin;
      sort( $current );
      do_action( 'activate_plugin', trim( $plugin ) );
      update_option( 'active_plugins', $current );
      do_action( 'activate_' . trim( $plugin ) );
      do_action( 'activated_plugin', trim( $plugin) );
  }

    return null;
}

function render_view( $view, $locals = null ) {
  include( VIEWS_DIR . $view . ".php" );
}
//*/
?>