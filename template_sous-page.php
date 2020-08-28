<?php /* Template Name: Sous-Page (template) */

get_header() ?>

<!-- HERO -->
<?php
$image = get_the_post_thumbnail($post->ID, 'large');
$title = get_the_title();
?>

<?php if ($title) : ?>
    <div class="hero">
        <h1><?php echo $title; ?></h1>
        <?php if ($image) : ?>
            <div class="banner">
                <?php echo $image; ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>

</header>

<main>
    <!-- INTRODUCTION -->
    <?php
    $intro_block_1 = get_field('first_block');

    if ($intro_block_1) : ?>

        <section class="intro">
            <?php
            if ($intro_block_1) :
                $title_default = $intro_block_1['default'];
                $title_handwritter = $intro_block_1['handwritten'];
                $text = $intro_block_1['text_content'];
                $button_title = $intro_block_1['button_title'];
                $button_url = $intro_block_1['button_url'];
            ?>
                <!-- Block #1 -->
                <div class="block">
                    <h2><?php if ($title_default) : echo $title_default;
                        endif; ?></h2>
                    <h2><?php if ($title_handwritter) : echo $title_handwritter;
                        endif; ?></h2>
                    <p><?php if ($text) : echo $text;
                        endif; ?></p>
                    <a href="<?php if ($button_url) : echo $button_url;
                                endif; ?>"><?php echo $button_title; ?></a>
                </div>

            <?php endif; ?>

            <!-- Gallery Images -->
            <?php
            $images = get_field('gallery');
            $size = 'full';
            if ($images) : ?>
                <ul>
                    <?php foreach ($images as $image) : ?>
                        <li>
                            <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </section>

    <?php endif; ?>


    <!-- TESTIMONIALS -->
    <?php
    $featured_testi = get_field('testimonials_selection');
    $testimonials_title_default = get_field('testimonials_title')['testimonials_default_title'];
    $testimonials_title_handwritten = get_field('testimonials_title')['testimonials_handwritten_title'];
    $testimonials_text = get_field('testimonials_text');

    if ($featured_testi) {
        if (sizeof($featured_testi) > 1) : ?>
            <section class="testimonials">
                <div class="intro">
                    <h2><?php echo $testimonials_title_default; ?></h2>
                    <h2><?php echo $testimonials_title_handwritten; ?></h2>
                    <p><?php echo $testimonials_text; ?></p>
                </div>
                <ul>
                    <?php foreach ($featured_testi as $post) :
                        setup_postdata($post);
                        $title = $post->post_title;
                        $content = $post->post_content;
                    ?>
                        <li>
                            <?php echo $content; ?>
                            <?php echo $title; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
            <?php
            wp_reset_postdata(); ?>
        <?php elseif (sizeof($featured_testi) <= 1) : ?>
            <section class="videos">
                <div class="intro">
                    <?php echo $testimonials_title_default; ?>
                    <?php echo $testimonials_title_handwritten; ?>
                </div>
                <?php foreach ($featured_testi as $post) :
                    setup_postdata($post);
                    $url = get_field('video_youtube_url');
                    $embed = wp_oembed_get($url);
                ?>
                    <?php echo $embed; ?>
                <?php endforeach; ?>
            </section>
    <?php wp_reset_postdata();
        endif;
    } ?>


    <!-- QUOTES -->
    <?php
    $quote = get_field('quote');
    if ($quote) : ?>
        <section class="quote">
            <?php
            $author = $quote->post_content;
            $content = $quote->post_title;
            ?>
            <div>
                <?php if ($content) : ?>
                    <p><?php echo $content; ?></p>
                <?php endif; ?>
                <?php if ($author) : ?>
                    <?php echo $author; ?>
                <?php endif; ?>
            </div>

        </section>
    <?php endif; ?>



    <!-- VIDEOS -->
    <?php
    $featured_vids = get_field('videos_selection');
    $video_title_default = get_field('video_title')['video_default_title'];
    $video_title_handwritten = get_field('video_title')['handwritten_title'];

    if ($featured_vids) {
        if (sizeof($featured_vids) > 1) : ?>
            <section class="videos">
                <?php if ($video_title_default or $video_title_handwritten) : ?>
                    <div class="intro">
                        <?php echo $video_title_default; ?>
                        <?php echo $video_title_handwritten; ?>
                    </div>
                <?php endif; ?>
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
                <?php if ($video_title_default or $video_title_handwritten) : ?>
                    <div class="intro">
                        <?php echo $video_title_default; ?>
                        <?php echo $video_title_handwritten; ?>
                    </div>
                <?php endif; ?>
                <?php foreach ($featured_vids as $post) :
                    setup_postdata($post);
                    $url = get_field('video_youtube_url');
                    $embed = wp_oembed_get($url);
                ?>
                    <?php echo $embed; ?>
                <?php endforeach; ?>
            </section>
    <?php wp_reset_postdata();
        endif;
    } ?>

</main>


<?php get_footer() ?>