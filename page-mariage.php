<?php get_header() ?>

        <h1><?php the_title(); ?></h1>
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
        
        <!-- QUOTES -->
        <?php 
            $args = array ( 'post_type' => 'quotes');
            $the_query = new WP_Query($args);
        ?>
        
        <?php 
        $quote = get_field('quote');
        if($quote) : ?>
        <section class="quote">
            
            <?php
            $content = $quote->post_content;
            $author = $quote->post_title;
            ?>
            
            <div>
                <?php if($content) { echo $content; } ?>
                <?php if($author) { echo $author; } ?>
            </div>
        
        </section>
        <?php endif; wp_reset_postdata(); ?>

        <!-- VIDEOS -->
        <?php
        $featured_vids = get_field('videos_selection');
        $video_title_default = get_field('video_title')['video_default_title'];
        $video_title_handwritten = get_field('video_title')['handwritten_title'];

        if (sizeof($featured_vids) > 1) : ?>
            <section class="videos">
                <div class="intro">
                    <?php echo $video_title_default; ?>
                    <?php echo $video_title_handwritten; ?>
                </div>
                <ul>
                    <?php foreach ($featured_vids as $post) :
                        setup_postdata($post);
                        $url = get_field('video_youtube_url');
                        $embed = wp_oembed_get($url);
                    ?>
                        <li>
                            <?php echo $embed; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
            <?php
            wp_reset_postdata(); ?>
        <?php elseif (sizeof($featured_vids) <= 1) : ?>
            <section class="videos">
                <div class="intro">
                    <?php echo $video_title_default; ?>
                    <?php echo $video_title_handwritten; ?>
                </div>
                <?php foreach ($featured_vids as $post) :
                    setup_postdata($post);
                    $url = get_field('video_youtube_url');
                    $embed = wp_oembed_get($url);
                ?>
                    <?php echo $embed; ?>
                <?php endforeach; ?>
            </section>
        <?php wp_reset_postdata();
        endif; ?>

    </main>

<?php get_footer() ?>