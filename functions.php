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
    $theme_dir = get_template_directory();
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
     *
     * Used across the website.
     */
    wp_enqueue_script(
        'solare-menu',
        $theme_uri . '/assets/js/menu.js',
        [],
        filemtime($theme_dir . '/assets/js/menu.js'),
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
            filemtime($theme_dir . '/assets/js/faq.js'),
            true
        );

        wp_enqueue_script(
            'solare-assets',
            $theme_uri . '/assets/js/assets.js',
            [],
            filemtime($theme_dir . '/assets/js/assets.js'),
            true
        );
    }


    /*
     * Reveal animations.
     *
     * Homepage:
     * - Automatically animates homepage sections and service cards.
     *
     * About Us:
     * - Only animates elements explicitly marked with
     *   .reveal-on-scroll.
     *
     * Solar Planner:
     * - Only animates elements explicitly marked with
     *   .reveal-on-scroll.
     *
     * Other pages:
     * - animations.js is not loaded.
     */
    if (
        is_front_page() ||
        is_page('about-us') ||
        is_page('solar-planner')
    ) {

        wp_enqueue_script(
            'solare-animations',
            $theme_uri . '/assets/js/animations.js',
            [],
            filemtime($theme_dir . '/assets/js/animations.js'),
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
            filemtime(
                $theme_dir .
                '/assets/js/estimator-config.js'
            ),
            true
        );

        wp_enqueue_script(
            'solare-estimator-templates',
            $theme_uri . '/assets/js/estimator-templates.js',
            ['solare-estimator-config'],
            filemtime(
                $theme_dir .
                '/assets/js/estimator-templates.js'
            ),
            true
        );

        wp_enqueue_script(
            'solare-estimator',
            $theme_uri . '/assets/js/estimator.js',
            [
                'solare-estimator-config',
                'solare-estimator-templates',
            ],
            filemtime(
                $theme_dir .
                '/assets/js/estimator.js'
            ),
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
        'labels'       => $labels,
        'public'       => true,
        'show_in_rest' => true,
        'menu_icon'    => 'dashicons-hammer',

        'supports' => [
            'title',
            'editor',
            'thumbnail',
        ],

        'has_archive' => false,

        'rewrite' => [
            'slug' => 'project',
        ],
    ];

    register_post_type(
        'solare_project',
        $args
    );
}

add_action(
    'init',
    'solare_register_project_post_type'
);


/**
 * Register FAQ custom post type.
 */
function solare_register_faq_post_type()
{
    $labels = [
        'name'               => 'FAQs',
        'singular_name'      => 'FAQ',
        'menu_name'          => 'FAQs',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New FAQ',
        'edit_item'          => 'Edit FAQ',
        'new_item'           => 'New FAQ',
        'view_item'          => 'View FAQ',
        'search_items'       => 'Search FAQs',
        'not_found'          => 'No FAQs found',
        'not_found_in_trash' => 'No FAQs found in Trash',
    ];

    $args = [
        'labels' => $labels,

        /*
         * FAQs are managed through the WordPress CMS
         * but do not have their own public frontend page.
         */
        'public'       => false,
        'show_ui'      => true,
        'show_in_menu' => true,
        'show_in_rest' => true,

        'menu_icon' => 'dashicons-editor-help',

        /*
         * Title  = Question
         * Editor = Answer
         *
         * page-attributes enables menu_order so FAQs
         * can have a defined display order.
         */
        'supports' => [
            'title',
            'editor',
            'page-attributes',
        ],
    ];

    register_post_type(
        'solare_faq',
        $args
    );
}

add_action(
    'init',
    'solare_register_faq_post_type'
);

/**
 * Register Testimonials custom post type.
 * Title = Customer name; Editor = customer review.
 */
function solare_register_testimonial_post_type()
{
    $labels = [
        'name' => 'Testimonials',
        'singular_name' => 'Testimonial',
        'menu_name' => 'Testimonials',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Testimonial',
        'edit_item' => 'Edit Testimonial',
        'new_item' => 'New Testimonial',
        'view_item' => 'View Testimonial',
        'search_items' => 'Search Testimonials',
        'not_found' => 'No testimonials found',
        'not_found_in_trash' => 'No testimonials found in Trash',
    ];

    $args = [
        'labels' => $labels,
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-format-quote',
        'supports' => [
            'title',
            'editor',
            'page-attributes',
        ],
    ];

    register_post_type('solare_testimonial', $args);
}

add_action('init', 'solare_register_testimonial_post_type');

/**
 * Validate contact information for the
 * SOL.ARE Lead & Site Assessment Form.
 *
 * Form ID: 1036
 * Email:    Field #2
 * Phone:    Field #4
 *
 * Rules:
 * - At least Email OR Phone Number is required.
 * - Email format is handled by the WPForms Email field.
 * - Philippine mobile numbers must be valid when provided.
 */
function solare_validate_lead_contact($fields, $entry, $form_data)
{
    if ((int) $form_data['id'] !== 1036) {
        return;
    }

    $email = isset($fields[2]['value'])
        ? trim($fields[2]['value'])
        : '';

    $phone = isset($fields[4]['value'])
        ? trim($fields[4]['value'])
        : '';

    /*
     * Require at least one contact method.
     */
    if ($email === '' && $phone === '') {
        wpforms()->process->errors[1036][2] =
            'Please provide either your email address or phone number.';

        wpforms()->process->errors[1036][4] =
            'Please provide either your email address or phone number.';

        return;
    }

    /*
     * Validate Philippine mobile number when provided.
     *
     * Accepted examples:
     * 09171234567
     * +639171234567
     * 639171234567
     *
     * Spaces and hyphens are allowed.
     */
    if ($phone !== '') {

        $normalized_phone = preg_replace(
            '/[\s\-()]/',
            '',
            $phone
        );

        $valid_phone = preg_match(
            '/^(?:\+63|63|0)9\d{9}$/',
            $normalized_phone
        );

        if (!$valid_phone) {
            wpforms()->process->errors[1036][4] =
                'Please enter a valid Philippine mobile number, e.g. 09171234567.';
        }
    }
}

add_action(
    'wpforms_process',
    'solare_validate_lead_contact',
    10,
    3
);