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
                <div class="title-head">
                    <h2><?php echo $testimonials_title_default; ?></h2>
                    <h2><?php echo $testimonials_title_handwritten; ?></h2>
                </div>
                <p><?php echo $testimonials_text; ?></p>
            </div>
            <ul class="slider">
                <?php $i = 0;
                foreach ($featured_testi as $post) :
                    $i++;
                    setup_postdata($post);
                    $title = $post->post_title;
                    $content = $post->post_content;
                ?>
                    <li class="slider__item testimonial" data-slide="<?php echo $i; ?>">
                        <blockquote>
                            <div class="content"><?php echo $content; ?></div>
                            <footer><?php echo $title; ?></footer>
                        </blockquote>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="slider__bullets">
                <?php $i = 0;
                foreach ($featured_testi as $post) :
                    $i++;
                ?>
                    <div class="slider__bullet" data-slide="<?php echo $i; ?>"></div>
                <?php endforeach; ?>
            </div>

        </section>
        <?php
        wp_reset_postdata(); ?>
    <?php elseif (sizeof($featured_testi) <= 1) : ?>
        <section class="testimonials">
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