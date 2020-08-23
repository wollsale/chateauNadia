
    <footer>
    <?php
        // wp_nav_menu([
        //     'theme_location' => 'footer',s
        //     'container' => false,
        // ])
        // ?>

        
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

                if($phone or $addresss or $mail) : ?>

                <ul>
                    <?php if($phone) : ?><li><a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></li><?php endif; ?>
                    <?php if($address) : ?><li><a href="<?php echo $maps; ?>" target="_blank"><?php echo $address; ?></a></li><?php endif; ?>
                    <?php if($mail) : ?><li><a href="mail:<?php echo $mail; ?>"><?php echo $mail; ?></a></li><?php endif; ?>
                </ul>

                <?php endif;

                if($hours): ?>
                    
                <ul>
                    <?php foreach($hours as $item):
                        $days = $item['days'];
                        $hours = $item['hours']; ?>
                    
                    <?php if($days): ?><li><span><?php echo $days ?></span><span> = <?php echo $hours ?></span></li><?php endif; ?>
                
                    <?php endforeach; ?>
                
                </ul>
                
                <?php endif;
            endif;
        }
    ?>

    </footer>
    <?php wp_footer() ?>
</body>
</html>