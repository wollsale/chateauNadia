<?php /* Template Name: Sous-Page */

get_header() ?>
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
    <?php
    if ($_POST['submit']) {
        $to = 'wollsale@gmail.com';
        $content = $_POST['contact-name'];

        echo $_POST['contact-name'];
    } ?>

    <form id="formid" action="" method="POST">
        <input type="text" name="contact-name" value="" />
        <input type="submit" name="submit" value="submit" />
    </form>

</main>

<?php get_footer() ?>