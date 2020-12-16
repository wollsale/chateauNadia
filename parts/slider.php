<?php

if (sizeof($slider) >= 1) : ?>
    <div class="hero-slider ">
        <div class="js-heroslider">
            <?php foreach ($slider as $slide) :
                $url = strval($slide['url']);
            ?>
                <img src="<?php echo wp_get_attachment_image($slide['ID'], 'full'); ?>">
            <?php endforeach; ?>
        </div>
    </div>
<?php endif ?>