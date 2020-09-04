<?php get_header() ?>
        <!-- INTRODUCTION -->
        <?php
        $title = get_the_title();
        $image = get_the_post_thumbnail($post->ID, 'full');
        ?>
        <?php if ($title) : ?>
            <div class="hero">
                <div class="container">
                    <h1 class="title"><?php echo $title; ?></h1>
                    <?php if ($image) : ?>
                        <div class="banner">
                            <?php echo $image; ?>
                        </div>
                    <?php else : ?>
                        <div class="banner placeholder"></div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </header>
    
    <main>
        <!-- INTRODUCTION -->
        <?php 
        $intro_block_1 = get_field('first_block');
        $intro_block_2 = get_field('second_block');

        if($intro_block_1 or $intro_block_2): ?>
            
        <section class="intro">
            <?php
            if($intro_block_1):
                $title_default = $intro_block_1['default'];
                $title_handwritter = $intro_block_1['handwritten'];
                $text = $intro_block_1['text_content'];
            ?>
            <!-- Block #1 -->
            <div class="block">
                <h2><?php if($title_default): echo $title_default; endif; ?></h2>
                <h2><?php if($title_handwritter) : echo $title_handwritter; endif; ?></h2>
                <p><?php if($text) : echo $text; endif; ?></p>
            </div>

            <?php endif; ?>

            <? if($intro_block_2):
                $title_default = $intro_block_2['default'];
                $title_handwritter = $intro_block_2['handwritten'];
                $text = $intro_block_2['text_content'];
                $button_title = $intro_block_2['title'];
                $button_url = $intro_block_2['url'];
            ?>
            <!-- Block #2 -->
            <div class="block">
                <h2><?php if($title_default) : echo $title_default; endif; ?></h2>
                <h2><?php if($title_handwritter) : echo $title_handwritter; endif; ?></h2>
                <p><?php if($text) : echo $text; endif; ?></p>
                <a href="<?php if($button_url) : echo $button_url; endif; ?>"><?php echo $button_title; ?></a>
            </div>

            <?php endif; ?>
            
            <!-- Gallery Images -->
            <?php
            $images = get_field('gallery');
            $size = 'full';
            if($images): ?>
                <ul>
                    <?php foreach( $images as $image ): ?>
                        <li>
                            <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </section>

        <?php endif; ?>
        
        <!-- ROBES -->
        <?php 
            $args = array ( 'post_type' => 'robes');
            $the_query = new WP_Query($args);
        ?>

        <?php if(have_posts()) : ?>
        <section class="robes">
            <ul>
            <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <li>
                    <h3><?php the_title(); ?></h3>
                    <?php the_content(); ?>
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                </li>
            <?php endwhile; wp_reset_postdata(); ?>
            </ul>
        </section>
        <?php endif; ?>

        <!-- TESTIMONIALS -->
        <?php include 'parts/testimonials.php'; ?>
        
        <!-- QUOTES -->
        <?php include 'parts/quotes.php'; ?>

        <!-- VIDEOS -->
        <?php include 'parts/videos.php'; ?>

    </main>

<?php get_footer() ?>