<?php

function solare_enqueue_assets() {
  $theme_uri = get_template_directory_uri();

  wp_enqueue_style(
    'solare-style',
    get_stylesheet_uri()
  );

  if (is_front_page()) {
    wp_enqueue_script(
      'solare-menu',
      $theme_uri . '/assets/js/menu.js',
      [],
      null,
      true
    );

    wp_enqueue_script(
      'solare-faq',
      $theme_uri . '/assets/js/faq.js',
      [],
      null,
      true
    );
  }

  if (is_page('solar-planner')) {
    wp_enqueue_script(
      'solare-estimator-config',
      $theme_uri . '/assets/js/estimator-config.js',
      [],
      null,
      true
    );

    wp_enqueue_script(
      'solare-estimator-templates',
      $theme_uri . '/assets/js/estimator-templates.js',
      ['solare-estimator-config'],
      null,
      true
    );

    wp_enqueue_script(
      'solare-estimator',
      $theme_uri . '/assets/js/estimator.js',
      ['solare-estimator-config', 'solare-estimator-templates'],
      null,
      true
    );
  }
}

add_action('wp_enqueue_scripts', 'solare_enqueue_assets');