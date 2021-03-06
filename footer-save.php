<footer class="footer">
    <div class="container">
        <?php
        // wp_nav_menu([
        //     'theme_location' => 'footer',s
        //     'container' => false,
        // ])
        // 
        ?>


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
                $address = get_field('address', $id);
                $maps = get_field('maps', $id);
                $mail = get_field('mail', $id);
                $hours = get_field('hours', $id);
                $facebook = get_field('facebook', $id);
                $instagram = get_field('instagram', $id);
        ?>

                <div class="row">

                    <?php if ($phone or $addresss or $mail) : ?>

                        <h3><?php pll_e('ChateauNadia'); ?></h3>
                        <ul class="details">
                            <?php if ($phone) : ?><li><a class="icon-before icon-phone" href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></li><?php endif; ?>
                            <?php if ($address) : ?><li><a class="icon-before icon-address" href="<?php echo $maps; ?>" target="_blank"><?php echo $address; ?></a></li><?php endif; ?>
                            <?php if ($mail) : ?><li><a class="icon-before icon-mail" href="mail:<?php echo $mail; ?>"><?php echo $mail; ?></a></li><?php endif; ?>
                            <img class="map" src="<?php echo get_template_directory_uri(); ?>/assets/icons/map.png" alt="">
                        </ul>

                    <?php endif; ?>
                </div>

                <div class="row">
                    <?php if ($hours) : ?>
                        <h3><?php pll_e('Hours'); ?></h3>
                        <ul class="hours">
                            <?php $i = 0;
                            foreach ($hours as $item) :
                                $days = [
                                    pll__('Lundi au Mercredi'),
                                    pll__('Jeudi au Vendredi'),
                                    pll__('Samedi'),
                                    pll__('Dimanche'),
                                ];
                                $hours = $item['hours']; ?>

                                <?php if ($days) : ?>
                                    <li><span class="days"><?php echo $days[$i] ?></span><span class="hour"><?php echo $hours ?></span></li>
                                <?php endif; ?>

                            <?php $i++;
                            endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <?php wp_nav_menu(array('theme_location' => 'footer')); ?>
                    <?php if ($facebook or $instagram) : ?>
                        <ul class="socials">
                            <?php if ($facebook) : ?><li><a href="<?php echo $facebook; ?>" target="_blank" class="icon icon-facebook-dark"><span class="hidden"><?php echo $facebook; ?></span></a></li><?php endif; ?>
                            <?php if ($instagram) : ?><li><a href="<?php echo $instagram; ?>" target="_blank" class="icon icon-instagram-dark"><span class="hidden"><?php echo $instagram; ?></span></a></li><?php endif; ?>
                        </ul>
                    <?php endif; ?>
                </div>
        <?php endif;
        }
        ?>
    </div>

    <div class="footer__bottom">
        <div class="copyright">
            <?php pll_e('Copyright'); ?>
        </div>

        <div class="agency">
            <a href="https://www.lux-agence.com/" target="_blank"><?php pll_e('MadeBy'); ?><img class="agency__logo" src="<?php echo get_template_directory_uri(); ?>/assets/icons/agency.png" alt=""></a>
        </div>
    </div>

    <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Allura&family=Playfair+Display:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">

</footer>
<?php wp_footer() ?>
</body>

</html>