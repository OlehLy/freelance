<?php


function site_files() {
   wp_enqueue_style('site_font', get_theme_file_uri('/assets/fonts/gothamrndssm_book.eot'));
   wp_enqueue_style('site_font_two', get_theme_file_uri('/assets/fonts/gothamrndssm_book.ttf'));
   wp_enqueue_style('site_font_two', get_theme_file_uri('/assets/fonts/gothamrndssm_book.woff'));
   wp_enqueue_style('site_font_two', get_theme_file_uri('/assets/fonts/gothamrndssm_medium.eot'));
   wp_enqueue_style('site_font_two', get_theme_file_uri('/assets/fonts/gothamrndssm_medium.ttf'));
   wp_enqueue_style('site_font_two', get_theme_file_uri('/assets/fonts/gothamrndssm_medium.woff'));
   wp_enqueue_style('site_main_styles', get_theme_file_uri('/assets/styles/main.css'));

   wp_deregister_script('jquery');
   wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js');
   wp_enqueue_script('jquery');
   wp_enqueue_script('site_main_scripts', get_theme_file_uri('/assets/js/main.js'), array('jquery'), '1.0', true);
   wp_enqueue_script('site_jquery_scripts', get_theme_file_uri('/assets/js/libraries/jquery.min.js'), array('jquery'), '1.0', true);
 }
 
 add_action('wp_enqueue_scripts', 'site_files');

 add_theme_support('post-thumbnails');
 add_theme_support('title-tag');
 add_theme_support('custom-logo');

 add_filter( 'upload_mimes', 'svg_upload_allow' );


function svg_upload_allow( $mimes ) {
  $mimes['svg']  = 'image/svg+xml';

  return $mimes;
}


add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

  // WP 5.1 +
  if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) ){
     $dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
  }
  else {
     $dosvg = ( '.svg' === strtolower( substr( $filename, -4 ) ) );
  }

  // mime тип был обнулен, поправим его
  // а также проверим право пользователя
  if( $dosvg ){

     // разрешим
     if( current_user_can('manage_options') ){

        $data['ext']  = 'svg';
        $data['type'] = 'image/svg+xml';
     }
     // запретим
     else {
        $data['ext']  = false;
        $data['type'] = false;
     }

  }

  return $data;
}

function custom_logo_classes($html) {
   $classes_to_add = 'header_logo __anim _slide-x'; // укажите сюда свои классы
   return str_replace('custom-logo-link', 'custom-logo-link ' . $classes_to_add, $html);
}

add_filter('get_custom_logo', 'custom_logo_classes');

function register_my_menus() {
   register_nav_menus(
     array(
       'header-menu' => __( 'Header Menu' )
     )
   );
 }
 add_action( 'init', 'register_my_menus' );
 

 function mytheme_customize_register($wp_customize) {
   // Добавляем секцию в Customizer
   $wp_customize->add_section('mytheme_footer_options', array(
       'title'    => __('Footer Options', 'mytheme'),
       'priority' => 120,
   ));

   // Добавляем настройку для логотипа футера
   $wp_customize->add_setting('footer_logo', array(
       'default'           => '',
       'sanitize_callback' => 'esc_url_raw',
   ));

   // Добавляем контроллер для загрузки изображения
   $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo_control', array(
       'label'    => __('Footer Logo', 'mytheme'),
       'section'  => 'mytheme_footer_options',
       'settings' => 'footer_logo',
   )));
}
add_action('customize_register', 'mytheme_customize_register');

function my_widgets_init() {
   register_sidebar( array(
       'name'          => 'Custom Footer',
       'id'            => 'custom_footer',
       'before_widget' => '<div>',
       'after_widget'  => '</div>',
       'before_title'  => '<p class="footer_line">',
       'after_title'   => '</p>',
   ) );
}
add_action( 'widgets_init', 'my_widgets_init' );




?>