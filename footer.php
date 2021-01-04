<?php
// Set page via Slug
$page = get_page_by_path('footer-' . get_bloginfo('language'));
?>


<footer class="footer">
    <?php
    // Get contact group
    $button = get_field("floating_button", $page->ID);
    $button_title = $button['title'];
    $button_link = $button['link'];
    $button_icon = $button['icon']['url'];
    ?>
    <?php if ($button_link) : ?>
        <a class="floatingButton" href="<?php echo $button_link; ?>">
            <?php if ($button_icon) : ?>
                <div class="floatingButton__icon" style="background-image: url('<?php echo $button_icon; ?>');"></div>
            <?php endif; ?>
            <?php echo $button_title; ?>
        </a>
    <?php endif; ?>
    <div class="container">
        <div class="row">
            <?php
            // Get contact group
            $contact = get_field("contact", $page->ID);
            $contact_title = $contact['title'];
            $contact_phone = $contact['phone'];
            $contact_address = $contact['address'];
            $contact_email = $contact['email'];
            ?>
            <?php if ($contact_title) : ?> <h3><?php echo $contact_title; ?></h3><?php endif; ?>
            <ul class="details">
                <?php if ($contact_phone) : ?><li><a class="icon-before icon-phone" href="tel:<?php echo $contact_phone; ?>"><?php echo $contact_phone; ?></a></li><?php endif; ?>
                <?php if ($contact_address) : ?><li><a class="icon-before icon-address" href="https://www.google.com/search?q=<?php echo $contact_address; ?>" target="_blank"><?php echo $contact_address; ?></a></li><?php endif; ?>
                <?php if ($contact_email) : ?><li><a class="icon-before icon-mail" href="mail:<?php echo $contact_email; ?>"><?php echo $contact_email; ?></a></li><?php endif; ?>
                <img class="map" src="<?php echo get_template_directory_uri(); ?>/assets/icons/map.png" alt="">
            </ul>
        </div>
        <div class="row">
            <?php
            // Get hours group
            $hours = get_field("hours", $page->ID);
            $hours_title = $hours['title'];
            $open_hours = $hours['open_hours'];
            ?>
            <?php if ($hours_title) : ?><h3><?php echo $hours_title; ?></h3><?php endif; ?>
            <?php if ($open_hours) : ?>
                <ul class="hours">
                    <?php
                    foreach ($open_hours as $item) :
                        echo '<li><span class="days">' . $item['days'] . '</span><span class="hour">' . $item['hours'] . '</span></li>';
                    endforeach; ?>
                </ul>
            <?php endif; ?>
            <?php
            // Get Footer Menu
            wp_nav_menu(array('theme_location' => 'footer'));
            ?>
            <?php
            // Get hours group
            $socials = get_field("socials", $page->ID);
            $socials_facebook = $socials['facebook'];
            $socials_instagram = $socials['instagram'];
            ?>
            <?php if ($socials_facebook or $socials_instagram) : ?>
                <ul class="socials">
                    <?php if ($socials_facebook) : ?><li><a href="<?php echo $socials_facebook; ?>" target="_blank" class="icon icon-facebook-dark"><span class="hidden"><?php echo $socials_facebook; ?></span></a></li><?php endif; ?>
                    <?php if ($socials_instagram) : ?><li><a href="<?php echo $socials_instagram; ?>" target="_blank" class="icon icon-instagram-dark"><span class="hidden"><?php echo $socials_instagram; ?></span></a></li><?php endif; ?>
                </ul>
            <?php endif; ?>
        </div>
        <div class="row trophee">
            <?php
            // Get Trophees
            $trophee = get_field("trophee", $page->ID);
            ?>
            <?php if ($trophee) : ?>
                <img src="<?php echo $trophee['sizes']['medium']; ?>" alt="">
            <?php endif; ?>
        </div>
    </div>

    <div class="footer__bottom">
        <?php
        // Get hours group
        $copyrights = get_field("copyrights", $page->ID);
        $copyrights_label = $copyrights['label'];
        $copyrights_signature = $copyrights['signature']['text'];
        $copyrights_logo = $copyrights['signature']['logo'];
        ?>

        <?php if ($copyrights_label) : ?>
            <div class="copyright">
                <?php echo $copyrights_label; ?>
            </div>
        <?php endif; ?>

        <?php if ($copyrights_signature) : ?>
            <div class="agency">
                <a href="https://www.lux-agence.com/" target="_blank"><?php echo $copyrights_signature; ?><img class="agency__logo" src="<?php echo $copyrights_logo['url']; ?>" alt=""></a>
            </div>
        <?php endif; ?>
    </div>

    <link href=" https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Allura&family=Playfair+Display:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">

</footer>
<?php wp_footer() ?>
</body>

</html>