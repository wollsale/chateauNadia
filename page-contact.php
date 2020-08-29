<?php get_header() ?>

<!-- HEADER -->
<?php
$content = get_the_content();
$image = get_the_post_thumbnail($post->ID, 'large');
?>

<?php if ($content) : ?>
    <div class="hero">
        <div class="content">
            <?php echo $content; ?>
        </div>
        <?php if ($image) : ?>
            <div class="banner">
                <?php echo $image; ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>

</header>

<main>

    <?php echo do_shortcode("[ameliabooking]"); ?>

</main>

<?php get_footer() ?>