<?php
define ( 'ADMIN_PAGES_DIR', __DIR__ . "/../../admin_pages/" );
define ( 'EDITOR_STYLES_DIR', __DIR__ . "/../../editor_styles/" );
define ( 'HELPERS_DIR', __DIR__ . "/../../helpers/" );
define ( 'METABOXES_DIR', __DIR__ . "/../../metaboxes/" );
define ( 'NAV_MENUS_DIR', __DIR__ . "/../../menus/" );
define ( 'PAGES_DIR' , __DIR__ . "/../../pages/" );
define ( 'PERMALINKS_DIR', __DIR__ . "/../../permalinks/" );
define ( 'POST_TYPES_DIR', __DIR__ . "/../../post_types/" );
define ( 'POSTS_DIR', __DIR__ . "/../../posts/" );
define ( 'QUERY_VARIABLES_DIR', __DIR__ . "/../../query_variables/" );
define ( 'SCHEDULED_EVENTS_DIR', __DIR__ . "/../../scheduled_events/" );
define ( 'SHORTCODES_DIR' , __DIR__ . "/../../shortcodes/" );
define ( 'TAXONOMIES_DIR', __DIR__ . "/../../taxonomies/" );
define ( 'VIEWS_DIR', __DIR__ . "../../../views/" );

$name = next( explode( '/themes/', get_stylesheet_directory() ) );
define ( 'THEME_NAME', $name );

define ( 'THEME_FULL_NAME', 'd20crit' );
?>