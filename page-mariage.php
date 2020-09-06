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
    <?php include 'parts/grid-large.php'; ?>

    <!-- DRESSES -->
    <?php include 'parts/dresses.php'; ?>

    <!-- TESTIMONIALS -->
    <?php include 'parts/testimonials.php'; ?>

    <!-- QUOTES -->
    <?php include 'parts/quotes.php'; ?>

    <!-- VIDEOS -->
    <?php include 'parts/videos.php'; ?>

</main>

<?php get_footer() ?>