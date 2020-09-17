<?php

if (sizeof($slider) >= 1) : ?>
    <div class="hero-slider">
        <?php foreach ($slider as $slide) :
            $url = $slide['url'];
        ?>
            <img src="<?php echo $url; ?>" alt="">
        <?php endforeach; ?>
    </div>
<?php endif ?>