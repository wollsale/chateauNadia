<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name');
            wp_title();  ?></title>
    <?php wp_head() ?>
</head>

<?php
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

<body>
    <header>
        <div class="topbar">
            <div class="topbar__head">
                <div class="left">
                    <?php if ($phone) : ?>
                        <a href="tel:<?php echo $phone; ?>" target="_blank">TEL: <?php echo $phone; ?></a>
                    <?php endif; ?>
                </div>
                <div class="right">
                    <?php if ($facebook or $instagram) : ?>
                        <ul class="socials">
                            <?php if ($facebook) : ?><li><a href="<?php echo $facebook; ?>" target="_blank" class="icon icon--stamp icon-facebook"><span class="hidden"><?php echo $facebook; ?></span></a></li><?php endif; ?>
                            <?php if ($instagram) : ?><li><a href="<?php echo $instagram; ?>" target="_blank" class="icon icon--stamp icon-instagram"><span class="hidden"><?php echo $instagram; ?></span></a></li><?php endif; ?>
                        </ul>
                    <?php endif; ?>
                    <ul class="lang">
                        <?php pll_the_languages(); ?>
                    </ul>
                </div>
            </div>
            <div class="topbar__main">
                <?php
                $custom_logo_id = get_theme_mod('custom_logo');
                $custom_logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
                $site_url = get_home_url();
                $site_name = get_bloginfo('name');
                if ($custom_logo_url) : ?>
                    <a href="<?php echo $site_url; ?>" class="brand">
                        <h1 class="hidden"><?php echo $site_name; ?></h1>
                        <img src="<?php echo $custom_logo_url; ?>" alt="<?php echo $site_name; ?>">
                    </a>
                <?php endif; ?>
                <nav>
                    <?php wp_nav_menu(); ?>
                </nav>
            </div>
        </div>