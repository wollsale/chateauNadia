<section class="dresses">
    <div class="container">
        <?php
        $title_default = get_field('dresses_title_default');
        $title_handwritter = get_field('dresses_title_handwritten');
        $text = get_field('dresses_text');
        ?>
        <!-- Block #1 -->
        <div class="intro">
            <div class="title-head">
                <h2><?php if ($title_default) : echo $title_default;
                    endif; ?></h2>
                <h2><?php if ($title_handwritter) : echo $title_handwritter;
                    endif; ?></h2>
            </div>
            <div class="content">
                <?php if ($text) : echo $text;
                endif; ?>
            </div>
        </div>

        <?php
        $args = array('post_type' => 'robes');
        $the_query = new WP_Query($args);
        ?>

        <?php if (have_posts()) : ?>
            <ul class="dresses__list">
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <li class="dresses__item card card--dresses">
                        <div class="card__cover">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                        </div>
                        <div class="card__content">
                            <h3 class="card__title"><?php the_title(); ?></h3>
                            <div class="card__descr">
                                <?php the_content(); ?>
                            </div>
                        </div>
                        <div class="card__cover card__hover">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                        </div>
                    </li>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </ul>
        <?php endif; ?>
    </div>
</section>