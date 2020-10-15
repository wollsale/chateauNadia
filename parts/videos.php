<?php
$featured_vids = get_field('videos_selection');
$video_title_default = get_field('video_title')['video_default_title'];
$video_title_handwritten = get_field('video_title')['handwritten_title'];

if ($featured_vids) {
    if (sizeof($featured_vids) > 1) : ?>
        <section class="videos">
            <div class="container">
                <?php if ($video_title_default or $video_title_handwritten) : ?>
                    <div class="intro" data-sal="slide-up" data-sal-duration="800" data-sal-easing="ease-out">
                        <h2 class="title-default"><?php echo $video_title_default; ?></h2>
                        <h2 class="title-handwritten"><?php echo $video_title_handwritten; ?></h2>
                    </div>
                <?php endif; ?>
                <div class="carousel__wrapper" data-sal="slide-up" data-sal-duration="800" data-sal-easing="ease-out">
                    <div class="carousel">
                        <?php foreach ($featured_vids as $post) :
                            setup_postdata($post);
                            $url = get_field('video_youtube_url');
                            $embed = wp_oembed_get($url);
                        ?>
                            <div class="carousel__item videos__wrapper">
                                <?php echo $embed; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="carousel__controls">
                        <a href="#" class="carousel__control" id="prev"><span class="icon icon-prev"></span><?php pll_e('Previous'); ?></a>
                        <a href="#" class="carousel__control" id="next"><?php pll_e('Next'); ?><span class="icon icon-next"></span></a>
                    </div>
                </div>
            </div>
        </section>
        <?php
        wp_reset_postdata(); ?>
    <?php elseif (sizeof($featured_vids) <= 1) : ?>
        <section class="videos">
            <div class="container">
                <?php if ($video_title_default or $video_title_handwritten) : ?>
                    <div class="intro" data-sal="slide-up" data-sal-duration="800" data-sal-delay="400" data-sal-easing="ease-out">
                        <h2 class="title-default"><?php echo $video_title_default; ?></h2>
                        <h2 class="title-handwritten"><?php echo $video_title_handwritten; ?></h2>
                    </div>
                <?php endif; ?>
                <?php foreach ($featured_vids as $post) :
                    setup_postdata($post);
                    $url = get_field('video_youtube_url');
                    $embed = wp_oembed_get($url);
                ?>
                    <div class="videos__wrapper" data-sal="slide-up" data-sal-duration="800" data-sal-easing="ease-out">
                        <?php echo $embed; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
<?php wp_reset_postdata();
    endif;
} ?>