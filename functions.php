<?php

/*
*
* THEME STYLES
*
*/
function theme_styles()
{
    wp_enqueue_style('main', get_template_directory_uri() . '/assets/style/app.css');
}

add_action('wp_enqueue_scripts', 'theme_styles');



/*
*
* THEME SUPPORT
*
*/
function theme_supports()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'En tête du menu');
    register_nav_menu('footer', 'Pied de page');

    add_image_size('post-thumbnail', 350, 215, true);
}
add_action('after_setup_theme', 'theme_supports');


/*
*
* CUSTOM POST TYPE
*
*/

function theme_types()
{
    register_post_type('robes', [
        'label' => 'Robes',
        'public' => true,
        'menu_position' => 4,
        'menu_icon' => 'dashicons-star-filled',
        'supports' => ['title', 'editor', 'thumbnail'],
        'show_in_rest' => true,
        'has_archive' => false,
    ]);
    register_post_type('testimonials', [
        'label' => 'Témoignages',
        'public' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-testimonial',
        'supports' => ['title', 'editor'],
        'show_in_rest' => true,
        'has_archive' => false,
    ]);
    register_post_type('quotes', [
        'label' => 'Citations',
        'public' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-format-quote',
        'supports' => ['title', 'editor'],
        'show_in_rest' => true,
        'has_archive' => false,
    ]);
    register_post_type('videos', [
        'label' => 'Vidéos',
        'public' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-video-alt3',
        'supports' => ['title'],
        'show_in_rest' => true,
        'has_archive' => false,
    ]);
}
add_action('init', 'theme_types');
