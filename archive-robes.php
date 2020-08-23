<?php get_header() ?>

    <h1>Robes</h1>

    <?php if(have_posts()) : ?>
    <ul>
    <?php while(have_posts()) : the_post(); ?>
        <li><?php the_title(); ?></li>
    <?php endwhile; ?>
    </ul>
    <?php endif; ?>

<?php get_footer() ?>
