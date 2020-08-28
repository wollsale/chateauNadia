<?php get_header() ?>
</header>

<main>

    <?php
    if (have_posts()) : ?>
        <ul>
            <?php while (have_posts()) :
                the_post();
                $title = get_the_title();
                $thumbnail = get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
                <li>
                    <?php if ($thumbnail) : ?><div class="banner"><?php echo $thumbnail; ?></div><?php endif; ?>
                    <?php if ($title) : ?><h2><?php echo $title; ?></h2><?php endif; ?>
                    <a href="<?php echo get_permalink($post->ID) ?>" target="_blank">Lire l'article au complet</a>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>

</main>

<?php get_footer(); ?>