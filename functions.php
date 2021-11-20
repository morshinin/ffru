<?php

if (! isset($content_width)) {
  $content_width = 1200;
}

if ( ! function_exists( 'ffru_setup' )) :

  function ffru_setup() {
    // make theme available for translation.
    // Translations can be placed in the /languages/ directory.
    load_theme_textdomain( 'ffru', get_template_directory() . '/languages' );
    // Add default posts and comments RSS feed links to <head>.
    add_theme_support( 'automatic-feed-links' );
    // Enable support for post thumbnails and featured images.
    add_theme_support( 'post-thumbnails' );
    // Add support for two custom navigation menus.
    register_nav_menus( array(
      'primary' => __( 'Главное меню', 'ffru' ),
      'secondary' => __( 'Второе меню', 'ffru' ),
      'third' => __('Третье меню', 'ffru'),
      'four' => __('Четвертое меню', 'ffru')
    ));
    // Enable support for the following post formats:
    // aside, gallery, quote, image, and video
    add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ));
  }
endif;
// ffru
add_action( 'after_setup_theme', 'ffru_setup' );

// Adding theme customizer support
function ffru_theme_customizer($wp_customize) {
$wp_customize->add_section('ffru_logo_section', array(
  'title' => __('Logo', 'ffru'),
  'priority' => 30,
  'description' => 'Загрузите лого'
));
$wp_customize->add_setting('ffru_logo');
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'ffru', array(
  'label' => __('Logo', 'ffru'),
  'section' => 'ffru_logo_section',
  'settings' => 'ffru_logo',
)));
}
add_action('customize_register', 'ffru_theme_customizer');

// Register sidebars
 if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'Sidebar 1',));


remove_action('wp_head', 'wp_generator');


// Add polls
add_action('activate_wp-polls/wp-polls.php', 'tc_add_poll_permissions');
function tc_add_poll_permissions()	{
	$add_role = get_role('editor');
	if(!$add_role->has_cap('manage_polls')) {
		$add_role->add_cap('manage_polls');
	}
}

/*function ffru_register_theme_customizer($wp_customize) {
  $wp_customize->add_section(
      'ffru_advanced_options',
      array(
          'title' => 'Продвинутые опции',
          'priority' => 201
        )
    );

  $wp_customize->add_setting(
      'ffru_background_image',
      array(
          'default' => '',
          'transport' => 'postMessage'
        )
    );
}
add_action('customize_register', 'ffru_register_theme_customizer');*/

function ffru_google_adsense_placement_function() {
  $output='<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-6375493062685680",
    enable_page_level_ads: true
  });
</script>';
  echo $output;
}
add_action('wp_head','ffru_google_adsense_placement_function');
