<?php
$theme = wp_get_theme();
define('THEMEBASE_CSS', get_template_directory_uri() . '/css');
define('THEMEBASE_JS', get_template_directory_uri() . '/assets/js');
define('THEMEBASE_THEME_NAME', $theme['Name']);
define('THEMEBASE_THEME_VERSION', $theme->get('Version'));
define('THEMEBASE_THEME_DIR', get_template_directory());
define('THEMEBASE_THEME_URI', get_template_directory_uri());
define('THEMEBASE_THEME_IMAGE_URI', get_template_directory_uri() . '/assets/images');
define('THEMEBASE_CHILD_THEME_URI', get_stylesheet_directory_uri());
define('THEMEBASE_CHILD_THEME_DIR', get_stylesheet_directory());
define('THEMEBASE_FRAMEWORK_DIR', get_template_directory() . '/inc');
define('THEMEBASE_ADMIN', get_template_directory() . '/inc/admin');
define('THEMEBASE_FRAMEWORK_FUNCTION', get_template_directory() . '/inc/functions');
define('THEMEBASE_FRAMEWORK_PLUGIN', get_template_directory() . '/inc/plugins');
define('THEMEBASE_CUSTOMIZER_DIR', THEMEBASE_THEME_DIR . '/customizer');

require_once THEMEBASE_FRAMEWORK_PLUGIN . '/functions.php';
require_once THEMEBASE_FRAMEWORK_FUNCTION . '/function.php';
require_once THEMEBASE_FRAMEWORK_FUNCTION . '/woocommerce.php';
require_once THEMEBASE_FRAMEWORK_FUNCTION . '/ajax_search/ajax-search.php';
require_once THEMEBASE_FRAMEWORK_FUNCTION . '/menus/menu.php';
require_once THEMEBASE_FRAMEWORK_FUNCTION . '/menus/class-edit-menu-walker.php';
require_once THEMEBASE_FRAMEWORK_FUNCTION . '/menus/class-walker-nav-menu.php';
require_once THEMEBASE_FRAMEWORK_FUNCTION . '/ajax-account/custom-ajax.php';
require_once THEMEBASE_FRAMEWORK_DIR . '/class-customize.php';
require_once THEMEBASE_FRAMEWORK_DIR . '/class-functions.php';
require_once THEMEBASE_FRAMEWORK_DIR . '/class-helper.php';
require_once THEMEBASE_FRAMEWORK_DIR . '/class-kirki.php';
require_once THEMEBASE_FRAMEWORK_DIR . '/class-static.php';
require_once THEMEBASE_FRAMEWORK_DIR . '/class-templates.php';
require_once THEMEBASE_FRAMEWORK_DIR . '/class-aqua-resizer.php';
require_once THEMEBASE_FRAMEWORK_DIR . '/class-global.php';
require_once THEMEBASE_FRAMEWORK_DIR . '/class-widgets.php';
require_once THEMEBASE_FRAMEWORK_DIR . '/class-wpml.php';
require_once THEMEBASE_FRAMEWORK_DIR . '/class-post-type-blog.php';
require_once THEMEBASE_FRAMEWORK_DIR . '/class-post-type-portfolio.php';
require_once THEMEBASE_FRAMEWORK_DIR . '/class-actions-filters.php';
require_once THEMEBASE_FRAMEWORK_DIR . '/class-enqueue.php';
require_once THEMEBASE_FRAMEWORK_DIR . '/class-custom-style.php';
require_once THEMEBASE_FRAMEWORK_DIR . '/class-minify.php';
if (!isset($content_width)) {
    $content_width = 1170;
}

function themebase_theme_setup()
{
    add_theme_support('post-thumbnails');
    add_theme_support('custom-header');
    add_theme_support(
        'custom-logo',
        array(
            'flex-width' => false,
            'flex-height' => false,
        )
    );

    function header_post_type() {
        $labels = array(
          'name'                  => _x( 'Header', 'Post Type General Name', '' ),
          'singular_name'         => _x( 'Header', 'Post Type Singular Name', '' ),
          'menu_name'             => __( 'Header', '' ),
          'name_admin_bar'        => __( 'All header', '' ),
          'add_new_item'          => __( 'Add new', '' ),
          'add_new'               => __( 'Add new', '' ),
          'new_item'              => __( 'Add new', '' ),
        );
        $args = array(
          'label'                 => __( 'Header', '' ),
          'description'           => __( 'Header', '' ),
          'labels'                => $labels,
          'supports'              => array( 'title','editor','excerpt','author','thumbnail','revisions','comments'),
          'public'                => true,
          'hierarchical'  => false,
          'menu_position'         => 4,
          'can_export'            => true,
          'has_archive'           => true,
          'menu_icon' => 'dashicons-format-chat',
        );
        register_post_type( 'header', $args );
              }
      add_action( 'init', 'header_post_type', 0 );

      function footer_post_type() {
        $labels = array(
          'name'                  => _x( 'Footer', 'Post Type General Name', '' ),
          'singular_name'         => _x( 'Footer', 'Post Type Singular Name', '' ),
          'menu_name'             => __( 'Footer', '' ),
          'name_admin_bar'        => __( 'All Footer', '' ),
          'add_new_item'          => __( 'Add new', '' ),
          'add_new'               => __( 'Add new', '' ),
          'new_item'              => __( 'Add new', '' ),
        );
        $args = array(
          'label'                 => __( 'Footer', '' ),
          'description'           => __( 'Footer', '' ),
          'labels'                => $labels,
          'supports'              => array( 'title','editor','excerpt','author','thumbnail','revisions','comments'),
          'public'                => true,
          'hierarchical'  => false,
          'menu_position'         => 4,
          'can_export'            => true,
          'has_archive'           => true,
          'menu_icon' => 'dashicons-format-chat',
        );
        register_post_type( 'footer', $args );
              }
      add_action( 'init', 'footer_post_type', 0 );

}

add_action('after_setup_theme', 'themebase_theme_setup');