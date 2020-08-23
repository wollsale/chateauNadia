<?php get_header() ?>

        <h1><?php the_title(); ?></h1>
    </header>
    
    <main>
        <?php if(get_the_content()): ?>
        <section id="dresses">
            <div class="intro">
                <?php the_content(); ?>
            </div>
        <?php endif; ?>
        
            <?php 
                $args = array ( 'post_type' => 'robes');
                $the_query = new WP_Query($args);
            ?>

            <?php if(have_posts()) : ?>
            <ul>
            <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <li>
                    <h3><?php the_title(); ?></h3>
                    <?php the_content(); ?>
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                </li>
            <?php endwhile; wp_reset_postdata(); ?>
            </ul>
        </section>
        <?php endif; ?>

        <section id="quote">
            <?php if( get_field('quote') ): ?>
                <blockquote>
                    <p><?php the_field('quote'); ?></p>
                    <?php if( get_field('author') ): ?>
                        <footer><?php the_field('author'); ?></footer>
                    <?php endif; ?>
                </blockquote>
            <?php endif; ?>
        </section>

        <?php
        $action_1 = get_field('action');
        $action_2 = get_field('action_2');
        $action_3 = get_field('action_3');

        $actions = array($action_1, $action_2, $action_3);

        if(count($actions) > 0) :?>
        <section id="actions">
        <?php
            foreach ($actions as &$item) {
                $title = $item['title']['basic'] . " " . $item['title']['handwritten'];
                $content = $item['text'];
                $button = [
                    'title' => $item['button']['title'],
                    'url' => $item['button']['url']
                ];
                $image = $item['image']['sizes']['medium'];

                ?>
                <div class="action">
                    <img src="<?php echo $image ?>" alt="">
                    <h3><?php echo $title ?></h3>
                    <p><?php echo $content ?></p>
                    <a href="<?php echo $button['url'] ?>"><?php echo $button['title'] ?></a>
                </div>
                <?php
            }
            ?>
        </section>
        <?php endif; ?>
    </main>

<?php get_footer() ?>