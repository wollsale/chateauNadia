<?php get_header() ?>
<!-- INTRODUCTION -->
<?php
$title = get_the_title();
$image = get_the_post_thumbnail($post->ID, 'full');
?>
<?php if ($title) : ?>
    <div class="hero" data-sal="fade" data-sal-duration="1000" data-delay="1000">
        <div class="container">
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


<?php
$content = get_the_content();

if ($content) : ?>
    <main>
        <div class="container post-content">
            <h1><?php echo $title; ?></h1>
            <?php echo $content; ?>
        </div>
    </main>
<?php endif; ?>


<?php get_footer() ?>