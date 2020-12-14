<?php /* Template Name: Sous-Page */

get_header() ?>
<!-- INTRODUCTION -->
<?php
$title = get_the_title();
$image = get_the_post_thumbnail($post->ID, 'full');
$slider = get_field('hero_slider');
?>
<?php if ($title) : ?>
    <!-- <div class="hero" data-sal="fade" data-sal-duration="1000" data-delay="1000"> -->
    <div class="hero">
        <div class="container">
            <h1 class="title"><?php echo $title; ?></h1>
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
    <?php include 'parts/grid-large.php'; ?>

    <!-- TESTIMONIALS -->
    <?php include 'parts/testimonials.php'; ?>

    <!-- QUOTES -->
    <?php include 'parts/quotes.php'; ?>

    <!-- VIDEOS -->
    <?php include 'parts/videos.php'; ?>
</main>


<?php get_footer() ?>