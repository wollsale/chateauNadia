<?php

if (sizeof($slider) >= 1) : ?>
    <div class="hero-slider ">
        <div class="js-heroslider">
            <?php foreach ($slider as $slide) :
                $url = strval($slide['url']);
            ?>
                <img src="<?php echo $url; ?>">
            <?php endforeach; ?>
        </div>
    </div>
<?php endif ?>