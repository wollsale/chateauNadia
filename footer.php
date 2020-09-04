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
                $hours = get_field('hours', $id); ?>

                <div class="row">

                    <?php if ($phone or $addresss or $mail) : ?>

                        <h3><?php pll_e('ChateauNadia'); ?></h3>
                        <ul class="details">
                            <?php if ($phone) : ?><li><a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></li><?php endif; ?>
                            <?php if ($address) : ?><li><a href="<?php echo $maps; ?>" target="_blank"><?php echo $address; ?></a></li><?php endif; ?>
                            <?php if ($mail) : ?><li><a href="mail:<?php echo $mail; ?>"><?php echo $mail; ?></a></li><?php endif; ?>
                            <img class="map" src="<?php echo get_template_directory_uri(); ?>/assets/icons/maps.png" alt="">
                        </ul>

                    <?php endif; ?>
                </div>

                <div class="row">
                    <?php if ($hours) : ?>
                        <h3><?php pll_e('Hours'); ?></h3>
                        <ul class="hours">
                            <?php foreach ($hours as $item) :
                                $days = $item['days'];
                                $hours = $item['hours']; ?>

                                <?php if ($days) : ?><li><span class="days"><?php echo $days ?></span><span class="hours"><?php echo $hours ?></span></li><?php endif; ?>

                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <?php wp_nav_menu(array('theme_location' => 'footer')); ?>
                </div>
        <?php endif;
        }
        ?>
    </div>

</footer>
<?php wp_footer() ?>
</body>

</html>