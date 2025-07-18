<?php

//  include_once 'disable-emojis.php';

// we need this to load the parent styles
// https://developer.wordpress.org/themes/advanced-topics/child-themes/
function theme_enqueue_styles()
{
   $parenthandle = 'go-child-style'; 
   $theme = wp_get_theme();

   wp_enqueue_style(
      $parenthandle,
      get_template_directory_uri() . '/style.css',
      array('go-style'),  // if the parent theme code has a dependency, copy it to here
      $theme->get('Version')
   );

   wp_enqueue_style(
      'child-style',
      get_stylesheet_uri(),
      array($parenthandle),
      $theme->get('Version') // this only works if you have Version in the style header
   );
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');