<?php get_header() ?>

        <h1><?php the_title(); ?></h1>
    </header>
    
    <main>
        <section>
            <?php
            $top_left = get_field('images')['image_top_left']['sizes']['medium'];
            $bottom_left = get_field('images')['image_bottom_left']['sizes']['medium'];
            $bottom_center = get_field('images')['image_bottom_center']['sizes']['medium'];
            $bottom_right = get_field('images')['image_bottom_right']['sizes']['medium'];
            ?>
            <div>
                <?php the_content(); ?>
                <img src="<?php if($top_left) : echo $top_left; endif; ?>" alt="">
            </div>
            <div>
                <img src="<?php if($top_left) : echo $bottom_left; endif; ?>" alt="">
                <img src="<?php if($top_left) : echo $bottom_center; endif; ?>" alt="">
                <img src="<?php if($top_left) : echo $bottom_right; endif; ?>" alt="">
            </div>
        </section>

        <section>
            <?php if( get_field('quote') ): ?>
            <h2><?php the_field('quote'); ?></h2>
            <?php endif; ?>
            <?php if( get_field('author') ): ?>
            <p><?php the_field('author'); ?></p>
            <?php endif; ?>
        </section>
    </main>

<?php get_footer() ?>