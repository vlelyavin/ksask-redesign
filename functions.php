<?php
// Allow large image upload
add_filter('big_image_size_threshold', '__return_false');

// Allow svg upload
function custom_mime_types($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'custom_mime_types');


// Add ACF options page
if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
    'page_title'    => 'Theme General Settings',
    'menu_title'    => 'Theme Settings',
    'menu_slug'     => 'theme-general-settings',
    'capability'    => 'edit_posts',
    'redirect'      => false
  ));
}

foreach (['ua', 'en', 'de'] as $lang) {
  $display_lang = $lang;

  acf_add_options_sub_page([
    'page_title' => "Theme settings " . $lang,
    'menu_title' => __("Theme settings " . $lang),
    'menu_slug' => "theme-settings-" . $lang,
    'post_id' => $lang,
    'capability'    => 'edit_posts',
    'redirect'      => false
  ]);
}

function remove_contactform_css_js()
{
  global $post;
  if ($post->ID == 301 || $post->ID == 302 || $post->ID == 2) {
    wp_enqueue_script('contact-form-7');
    wp_enqueue_style('contact-form-7');
  } else {
    wp_dequeue_script('contact-form-7');
    wp_dequeue_style('contact-form-7');
  }
}
add_action('wp_enqueue_scripts', 'remove_contactform_css_js');


add_filter('wpcf7_autop_or_not', '__return_false');

// Add main navigation menu
function my_theme_setup()
{
  // Add theme support for menus
  add_theme_support('menus');

  add_theme_support( 'post-thumbnails' );

  // 2) (Опционально) Регистрируем один или несколько размеров
  //    – main-post-image: 800×450 пикселей, жесткая обрезка
  add_image_size( 'main-post-image', 800, 450, true );
    
  //    – Еще размер, напр. для миниатюр списка
//   add_image_size( 'list-thumb', 300, 200, true );
	
  // Register navigation menu
  register_nav_menus(array(
    'primary' => 'Primary Menu',
    'footer_1' => 'Footer Menu 1',
    'footer_2' => 'Footer Menu 2',
    'footer_3' => 'Footer Menu 3 (Resources)'
  ));
}

add_action('after_setup_theme', 'my_theme_setup');


// Remove unnecessarry wordpress styles
add_action('init', function () {
  remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
  remove_action('wp_footer', 'wp_enqueue_global_styles', 1);
  remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');
});

add_action('wp_enqueue_scripts', 'theme_deregister_default_styles', 20);

function theme_deregister_default_styles()
{
  wp_dequeue_style('classic-theme-styles');
}
