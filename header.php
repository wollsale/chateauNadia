<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name');
            wp_title();  ?></title>
    <?php wp_head() ?>
</head>

<body>
    <header>
        <div class="topbar">
            <div class="topbar__head"><?php pll_the_languages(); ?></div>
            <div class="topbar__main">
                <a class="brand" href="<?php echo get_home_url(); ?>"><?php bloginfo('name') ?></a>
                <nav>
                    <?php wp_nav_menu(); ?>
                </nav>
            </div>
        </div>