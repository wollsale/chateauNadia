<?php
$quote = get_field('quote');
if ($quote) : ?>
    <section class="quote">
        <?php
        $author = $quote->post_content;
        $content = $quote->post_title;
        ?>
        <blockquote class="container">
            <?php if ($content) : ?>
                <p class="quote__main"><?php echo $content; ?></p>
            <?php endif; ?>
            <?php if ($author) : ?>
                <?php echo $author; ?>
            <?php endif; ?>
        </blockquote>
    </section>
<?php endif; ?>