<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
                        </ul>
                    <?php endif; ?>
                    <div class="lang__wrapper">
                        <p><?php
                            $currLang = get_bloginfo('language');
                            if ($currLang == "fr-CA") { // Replace condition with your language code.
                                echo 'FR';
                            } else {
                                echo 'EN';
                            } ?></p>
                        <ul class="lang">
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
                    </div>
                    <nav class="head-nav nav">
                        <?php wp_nav_menu(array('theme_location' => 'header')); ?>
                    </nav>
                </div>
            </div>
        </div>