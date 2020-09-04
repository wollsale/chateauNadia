<!-- VIDEOS -->
<?php
$featured_vids = get_field('videos_selection');
$video_title_default = get_field('video_title')['video_default_title'];
$video_title_handwritten = get_field('video_title')['handwritten_title'];

if ($featured_vids) {
    if (sizeof($featured_vids) > 1) : ?>
        <section class="videos container">
            <?php if ($video_title_default or $video_title_handwritten) : ?>
                <div class="intro">
                    <h2 class="title-default"><?php echo $video_title_default; ?></h2>
                    <h2 class="title-handwritten"><?php echo $video_title_handwritten; ?></h2>
                </div>
            <?php endif; ?>
            <ul>
                <?php foreach ($featured_vids as $post) :
                    setup_postdata($post);
                    $url = get_field('video_youtube_url');
                    $embed = wp_oembed_get($url);
                ?>
                    <li class="videos__wrapper">
                        <?php echo $embed; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
        <?php
        wp_reset_postdata(); ?>
    <?php elseif (sizeof($featured_vids) <= 1) : ?>
        <section class="videos container">
            <?php if ($video_title_default or $video_title_handwritten) : ?>
                <div class="intro">
                    <h2 class="title-default"><?php echo $video_title_default; ?></h2>
                    <h2 class="title-handwritten"><?php echo $video_title_handwritten; ?></h2>
                </div>
            <?php endif; ?>
            <?php foreach ($featured_vids as $post) :
                setup_postdata($post);
                $url = get_field('video_youtube_url');
                $embed = wp_oembed_get($url);
            ?>
                <div class="videos__wrapper">
                    <?php echo $embed; ?>
                </div>
            <?php endforeach; ?>
        </section>
<?php wp_reset_postdata();
    endif;
} ?>