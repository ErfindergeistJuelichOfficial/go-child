<?php

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

function egj_redirect_function() {
    if (is_page('mobilitaetstag')) {
        wp_redirect( home_url('/2025/09/21/rueckblick-mobilitaetstag-2025/'), 301 );
        exit;
    }

    if (is_page('endof10')) {
        wp_redirect( home_url('/2025/09/30/end-of-10-veranstaltungsreihe-umstieg-auf-linux/'), 301 );
        exit;
    }

    if (is_page('handyrecycling')) {
        wp_redirect( home_url('/2025/10/01/handy-recycling-bei-uns/'), 301 );
        exit;
    }
}
add_action('template_redirect', 'egj_redirect_function');

// disable xmlrpc
add_filter( 'xmlrpc_enabled', '__return_false' );

