<?php get_header() ?>

<!-- INTRODUCTION -->
<?php
$content = get_the_content();
$image = get_the_post_thumbnail($post->ID, 'full');
$slider = get_field('hero_slider');
?>

<?php if ($content) : ?>
    <div class="hero" data-sal="fade" data-sal-duration="1000" data-delay="1000">
        <div class="container">
            <div class="content">
                <?php echo $content; ?>
            </div>
            <?php if ($slider) : ?>
                <?php include 'parts/slider.php'; ?>
            <?php elseif ($image) : ?>
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
    <!-- Block #1 -->
    <?php
    $content_block = get_field('first_block');

    if ($content_block) :
        $title_default = $content_block['default'];
        $title_handwritten = $content_block['handwritten'];
        $text = $content_block['content'];
        $button_title = $content_block['button_title'];
        $button_url = $content_block['button_url'];
        $image = $content_block['image'];
        $image = wp_get_attachment_image_src($image, 'large')[0];
    ?>
        <section class="about">
            <div class="container">
                <div class="content" data-sal="slide-up" data-sal-duration="800" data-sal-easing="ease-out">
                    <h2 class="title-default"><?php if ($title_default) : echo $title_default;
                                                endif; ?></h2>
                    <h2 class="title-handwritten"><?php if ($title_handwritten) : echo $title_handwritten;
                                                    endif; ?></h2>
                    <p><?php if ($text) : echo $text;
                        endif; ?></p>
                </div>
                <div class="media" data-sal="slide-up" data-sal-duration="800" data-sal-easing="ease-out">
                    <a class="button" href="<?php if ($button_url) : echo $button_url;
                                            endif; ?>"><?php echo $button_title; ?></a>
                    <?php if ($image) : ?><img src="<?php echo $image; ?>" alt="">
                    <?php else : ?><div class="placeholder"></div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- BLOCK #2 -->
        <?php
        $block_2 = get_field('second_block');

        if ($block_2) :
            $title_default = $block_2['title_default'];
            $title_handwritten = $block_2['title_handwritten'];
            $content = $block_2['content'];
            $button_title = $block_2['button_title'];
            $button_url = $block_2['button_url'];
            $text = $block_2['content'];
            $images = $block_2['images'];
        ?>
            <section class="about">
                <div class="container flex-reverse">
                    <div class="media" data-sal="slide-up" data-sal-duration="800" data-sal-easing="ease-out">
                        <a class="button" href="<?php if ($button_url) : echo $button_url;
                                                endif; ?>"><?php echo $button_title; ?></a>

                        <!-- if no images -->
                        <?php if (empty($images)) : ?>
                            <div class="placeholder" style="--height: 400px; opacity:.2;"></div>
                        <?php else : ?>
                            <!-- if single image -->
                            <?php if (count($images) == 1) : ?>
                                <img src="<?php echo $images[0]['url']; ?>" alt="">
                                <!-- if multiple images -->
                            <?php elseif (count($images) > 1) : ?>
                                <?php $slider = $images; ?>
                                <?php include 'parts/slider.php'; ?>
                            <?php endif; ?>
                        <?php endif; ?>

                    </div>

                    <div class="content" data-sal="slide-up" data-sal-duration="800" data-sal-easing="ease-out">
                        <h2 class="title-default"><?php if ($title_default) : echo $title_default;
                                                    endif; ?></h2>
                        <h2 class="title-handwritten"><?php if ($title_handwritten) : echo $title_handwritten;
                                                        endif; ?></h2>
                        <p><?php if ($text) : echo $text;
                            endif; ?></p>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-- END BLOCK #2 -->

    <?php endif; ?>

    <!-- VIDEOS -->
    <?php include 'parts/videos.php'; ?>

    <!-- QUOTES -->
    <?php include 'parts/quotes.php'; ?>

    <!-- TESTIMONIALS -->
    <?php include 'parts/testimonials.php'; ?>

    <!-- INSTAGRAM -->
    <?php include 'parts/instagram.php'; ?>

    <!-- FRONTEND -->
    <img class="blob" src="<?php echo get_template_directory_uri(); ?>/assets/icons/blob_1.png" alt="">
</main>


<?php get_footer() ?>