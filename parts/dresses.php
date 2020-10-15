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
                <h2 data-sal="slide-up" data-sal-duration="800" data-sal-easing="ease-out"><?php if ($title_default) : echo $title_default;
                                                                                            endif; ?></h2>
                <h2 data-sal="slide-up" data-sal-duration="800" data-sal-easing="ease-out"><?php if ($title_handwritter) : echo $title_handwritter;
                                                                                            endif; ?></h2>
            </div>
            <div class="content" data-sal="slide-up" data-sal-duration="800" data-sal-easing="ease-out">
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
                <?php while ($the_query->have_posts()) : $the_query->the_post();
                    $hover = get_field('dress_visible_image'); ?>
                    <li class="dresses__item card card--dresses" data-sal="slide-up" data-sal-duration="800" data-sal-easing="ease-out">
                        <div class="card__cover">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                        </div>
                        <div class="card__content">
                            <h3 class="card__title"><?php the_title(); ?></h3>
                            <div class="card__descr">
                                <?php the_content(); ?>
                            </div>
                        </div>
                        <?php if ($hover) : ?>
                            <div class="card__cover card__hover">
                                <img src="<?php echo get_field('dress_visible_image')['url']; ?>" alt="">
                            </div>
                        <?php else : ?>
                            <div class="card__cover card__hover">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                            </div>
                        <?php endif; ?>
                    </li>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </ul>
        <?php endif; ?>
    </div>
</section>