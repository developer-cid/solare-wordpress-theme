<?php

if (!defined('ABSPATH')) {
    exit;
}


/**
 * Theme setup.
 */
function solare_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ]);
}

add_action('after_setup_theme', 'solare_theme_setup');


/**
 * Load theme styles and scripts.
 */
function solare_enqueue_assets()
{
    $theme_uri = get_template_directory_uri();
    $version   = wp_get_theme()->get('Version');


    /*
     * Main theme stylesheet.
     */
    wp_enqueue_style(
        'solare-style',
        get_stylesheet_uri(),
        [],
        $version
    );


    /*
     * Tailwind CDN.
     *
     * Temporary while migrating the original static site.
     */
    wp_enqueue_script(
        'solare-tailwind',
        'https://cdn.tailwindcss.com',
        [],
        null,
        false
    );


    /*
     * Original SOL.ARE Tailwind configuration.
     *
     * Must execute after Tailwind CDN.
     */
    $tailwind_config = <<<'JS'
tailwind.config = {
    theme: {
        extend: {
            colors: {
                solar: {
                    50: '#fff9e6',
                    100: '#fff0b3',
                    200: '#ffe066',
                    300: '#ffcc33',
                    400: '#ffb800',
                    500: '#f4a900',
                    600: '#d99100',
                    700: '#ad7300',
                    800: '#815600',
                    900: '#543800'
                },

                brandgreen: {
                    50: '#f0fdf4',
                    100: '#dcfce7',
                    200: '#bbf7d0',
                    300: '#86efac',
                    400: '#4ade80',
                    500: '#22c55e',
                    600: '#16a34a',
                    700: '#15803d',
                    800: '#166534',
                    900: '#14532d'
                }
            },

            boxShadow: {
                soft: '0 24px 70px rgba(15, 23, 42, .12)',
                card: '0 12px 40px rgba(15, 23, 42, .09)'
            }
        }
    }
};
JS;

    wp_add_inline_script(
        'solare-tailwind',
        $tailwind_config,
        'after'
    );


    /*
     * Shared mobile menu.
     */
    wp_enqueue_script(
        'solare-menu',
        $theme_uri . '/assets/js/menu.js',
        [],
        filemtime(get_template_directory() . '/assets/js/menu.js'),
        true
    );


    /*
     * Homepage functionality.
     */
    if (is_front_page()) {

        wp_enqueue_script(
            'solare-faq',
            $theme_uri . '/assets/js/faq.js',
            [],
            $version,
            true
        );

        wp_enqueue_script(
            'solare-assets',
            $theme_uri . '/assets/js/assets.js',
            [],
            $version,
            true
        );

        wp_enqueue_script(
            'solare-animations',
            $theme_uri . '/assets/js/animations.js',
            [],
            $version,
            true
        );
    }


    /*
     * Solar Planner functionality.
     */
    if (is_page('solar-planner')) {

        wp_enqueue_script(
            'solare-estimator-config',
            $theme_uri . '/assets/js/estimator-config.js',
            [],
            $version,
            true
        );

        wp_enqueue_script(
            'solare-estimator-templates',
            $theme_uri . '/assets/js/estimator-templates.js',
            ['solare-estimator-config'],
            $version,
            true
        );

        wp_enqueue_script(
            'solare-estimator',
            $theme_uri . '/assets/js/estimator.js',
            [
                'solare-estimator-config',
                'solare-estimator-templates',
            ],
            $version,
            true
        );

        wp_enqueue_script(
            'solare-animations',
            $theme_uri . '/assets/js/animations.js',
            [],
            $version,
            true
        );
    }
}

add_action('wp_enqueue_scripts', 'solare_enqueue_assets');

/**
 * Register Projects custom post type.
 */
function solare_register_project_post_type()
{
    $labels = [
        'name'               => 'Projects',
        'singular_name'      => 'Project',
        'menu_name'          => 'Projects',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Project',
        'edit_item'          => 'Edit Project',
        'new_item'           => 'New Project',
        'view_item'          => 'View Project',
        'search_items'       => 'Search Projects',
        'not_found'          => 'No projects found',
        'not_found_in_trash' => 'No projects found in Trash',
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-hammer',
        'supports'           => [
            'title',
            'editor',
            'thumbnail',
        ],
        'has_archive'        => false,
        'rewrite'            => [
            'slug' => 'project',
        ],
    ];

    register_post_type('solare_project', $args);
}

add_action('init', 'solare_register_project_post_type');