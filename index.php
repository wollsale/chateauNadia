<?php get_header() ?>

<!-- INTRODUCTION -->
<?php
$content = get_the_content();
$image = get_the_post_thumbnail($post->ID, 'full');
?>

<?php if ($content) : ?>
    <div class="hero">
        <div class="container">
            <div class="content">
                <?php echo $content; ?>
            </div>
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
    <!-- Block #1 -->
    <?php
    $content_block = get_field('first_block');

    if ($content_block) :
        $title_default = $content_block['default'];
        $title_handwritter = $content_block['handwritten'];
        $text = $content_block['content'];
        $button_title = $content_block['button_title'];
        $button_url = $content_block['button_url'];
        $image = $content_block['image'];
        $image = wp_get_attachment_image_src($image, 'large')[0];
    ?>
        <section class="about">
            <div class="container">
                <div class="content">
                    <h2 class="title-default"><?php if ($title_default) : echo $title_default;
                                                endif; ?></h2>
                    <h2 class="title-handwritten"><?php if ($title_handwritter) : echo $title_handwritter;
                                                    endif; ?></h2>
                    <p><?php if ($text) : echo $text;
                        endif; ?></p>
                </div>
                <div class="media">
                    <a class="button" href="<?php if ($button_url) : echo $button_url;
                                            endif; ?>"><?php echo $button_title; ?></a>
                    <?php if ($image) : ?><img src="<?php echo $image; ?>" alt="">
                    <?php else : ?><div class="placeholder"></div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

    <?php endif; ?>

    <!-- VIDEOS -->
    <?php include 'parts/videos.php'; ?>

    <!-- QUOTES -->
    <?php include 'parts/quotes.php'; ?>

    <!-- TESTIMONIALS -->
    <?php include 'parts/testimonials.php'; ?>
</main>


<?php get_footer() ?>