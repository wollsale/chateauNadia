<?php

/*
*
* THEME STYLES
*
*/
function theme_styles()
{
    //wp_enqueue_style('main', get_template_directory_uri() . '/assets/style/app.css');
    $cssFilePath = glob(get_template_directory() . '/build/css/main.min.*');
    $cssFileURI = get_template_directory_uri() . '/build/css/' . basename($cssFilePath[0]);
    wp_enqueue_style('site_main_css', $cssFileURI);
    // include the javascript file
    $jsFilePath = glob(get_template_directory() . '/build/js/app.min.js');
    $jsFileURI = get_template_directory_uri() . '/build/js/' . basename($jsFilePath[0]);
    wp_enqueue_script('site_main_js', $jsFileURI, null, null, true);
    // SLICK
    wp_enqueue_style('slider_style', 'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css');
    wp_enqueue_script('slider_js', 'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js', null, null, true);
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
    add_theme_support('custom-logo');

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







/*
*
* TRANSLATION POLYLANG
*
*/

/* FOOTER */
add_action('init', function () {
    /* FOOTER */
    pll_register_string('Château Nadia', 'ChateauNadia', 'Footer', false);
    pll_register_string('Nos heures', 'Hours', 'Footer', false);
    pll_register_string('Copyright', 'Copyright', 'Footer', false);
    pll_register_string('MadeBy', 'MadeBy', 'Footer', false);

    /* SLIDER */
    pll_register_string('Précédent', 'Previous', 'Slider', false);
    pll_register_string('Suivant', 'Next', 'Slider', false);

    /* INSTAGRAM */
    pll_register_string('Suivez-nous', 'Suivez-nous', 'Instagram', false);
    pll_register_string('Sur instagram', 'Sur instagram', 'Instagram', false);

    /* HEADER CTA */
    pll_register_string('Prendre rendez-vous', 'Prendre rendez-vous', 'Topbar', false);
});
