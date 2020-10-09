<?php get_header() ?>
</header>

<main>

    <div class="container padded">
        <?php
        if (have_posts()) : ?>
            <ul>
                <?php while (have_posts()) :
                    the_post();
                    $title = get_the_title();
                    $thumbnail = get_the_post_thumbnail($post->ID, 'large'); ?>
                    <li class="card card--blog">
                        <a href="<?php echo get_permalink($post->ID) ?>" target="_blank" class="card__link">
                            <div class="card__cover">
                                <?php if ($thumbnail) : ?><div class="banner"><?php echo $thumbnail; ?></div><?php endif; ?>
                            </div>
                            <div class="card__content">
                                <?php if ($title) : ?><h2 class="card__title"><?php echo $title; ?></h2><?php endif; ?>
                                <span class="button card__button">Lire l'article au complet</span>
                            </div>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>
    </div>

</main>

<?php get_footer(); ?>