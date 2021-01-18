<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- GOOGLE ANALYTICS -->
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-93225800-1', 'auto');
        ga('send', 'pageview');
    </script>
    <!-- End Google Analytics -->

    <!-- META -->
    <?php wp_head() ?>
    <!-- Description -->
    <meta name="description" content="<?php if (is_single()) {
                                            single_post_title('', true);
                                        } else {
                                            bloginfo('name');
                                            echo " - ";
                                            bloginfo('description');
                                        } ?>" />
    <!-- image -->
    <?php $thumbnail = get_the_post_thumbnail_url($post->ID, 'medium'); ?>
    <meta property="og:image" content="<?php if ($thumbnail) : echo $thumbnail;
                                        endif; ?>">
    <meta name="twitter:image" content="<?php if ($thumbnail) : echo $thumbnail;
                                        endif; ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/icons/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri() ?>/assets/icons/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri() ?>/assets/icons/favicons/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri() ?>/assets/icons/favicons/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri() ?>/assets/icons/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="theme-color" content="#ffffff">
</head>


<?php
$starry = get_field('starry_background');

$args = array(
    'role' => 'Administrator'
);

$users = get_users($args);

foreach ($users as $user) {
    $id = $user->ID;
    $id = 'user_' . $id;
    $reference = get_field('reference', $id);

    if ($reference) :
        $phone = get_field('phone', $id);
        $facebook = get_field('facebook', $id);
        $instagram = get_field('instagram', $id);
        $pinterest = get_field('pinterest', $id);
    endif;
}
?>

<body <?php
        if ($starry) : body_class('starry');
        else : body_class();
        endif; ?>>
    <header>
        <div class="topbar">
            <div class="topbar__head">
                <div class="left">
                    <?php if ($phone) : ?>
                        <a href="tel:<?php echo $phone; ?>" target="_blank">TEL: <?php echo $phone; ?></a>
                    <?php endif; ?>
                    <!-- prise-de-rendez-vous -->
                    <?php
                    $currLang = get_bloginfo('language');

                    if ($currLang == "fr-CA") {
                        $url = get_site_url() . '/prise-de-rendez-vous';
                    } else {
                        $url = get_site_url() . '/appointment';
                    } ?></p>
                    <a class="topbar__cta" href="<?php echo $url; ?>"><?php pll_e('Prendre rendez-vous'); ?></a>
                </div>
                <div class="right">
                    <?php if ($facebook or $instagram) : ?>
                        <ul class="socials">
                            <?php if ($facebook) : ?><li><a href="<?php echo $facebook; ?>" target="_blank" class="icon icon-facebook"><span class="hidden"><?php echo $facebook; ?></span></a></li><?php endif; ?>
                            <?php if ($instagram) : ?><li><a href="<?php echo $instagram; ?>" target="_blank" class="icon icon-instagram"><span class="hidden"><?php echo $instagram; ?></span></a></li><?php endif; ?>
                            <?php if ($pinterest) : ?><li><a href="<?php echo $pinterest; ?>" target="_blank" class="icon icon-pinterest"><span class="hidden"><?php echo $pinterest; ?></span></a></li><?php endif; ?>
                        </ul>
                    <?php endif; ?>
                    <div class="lang__wrapper">
                        <div data-show data-target="lang">
                            <p>
                                <?php
                                $currLang = get_bloginfo('language');
                                if ($currLang == "fr-CA") { // Replace condition with your language code.
                                    echo 'FR';
                                } else {
                                    echo 'EN';
                                } ?>
                            </p>
                        </div>
                        <ul class="lang" data-id="lang" data-state="hidden">
                            <?php pll_the_languages(); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="topbar__main" data-sticky="false">
                <div class="container">
                    <div class="flex">
                        <?php
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $custom_logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
                        $site_url = get_home_url();
                        $site_name = get_bloginfo('name');
                        if ($custom_logo_url) : ?>
                            <a href="<?php echo $site_url; ?>" class="brand">
                                <h1 class="hidden"><?php echo $site_name; ?></h1>
                                <img src="<?php echo $custom_logo_url; ?>" alt="<?php echo $site_name; ?>" class="brand__logo" style="--scale:2;">
                            </a>
                        <?php endif; ?>
                        <a href="#" class="nav-trigger">Menu</a>
                        <nav class="head-nav nav mobile-nav" data-state="close">
                            <?php wp_nav_menu(array('theme_location' => 'header')); ?>
                        </nav>
                    </div>
                    <nav class="head-nav nav desktop-nav">
                        <?php wp_nav_menu(array('theme_location' => 'header')); ?>
                    </nav>
                </div>
            </div>
        </div>