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
    <?php include 'parts/testimonials.php'; ?>

    <!-- QUOTES -->
    <?php include 'parts/quotes.php'; ?>

    <!-- VIDEOS -->
    <?php include 'parts/videos.php'; ?>

</main>


<?php get_footer() ?>