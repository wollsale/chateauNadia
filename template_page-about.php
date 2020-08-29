<?php /* Template Name: Page About (Multilang Template) */

get_header() ?>
</header>

<main>
    <!-- BLOCK #1 -->
    <?php
    $block_1 = get_field('block_1');
    if ($block_1) :
        $title_default = $block_1['title_default'];
        $title_handwritten = $block_1['title_handwritten'];
        $text = $block_1['text'];
        $image = $block_1['image'];
        $image = wp_get_attachment_image_src($image, 'large')[0];
    ?>
        <section>
            <img src=" <?php if ($image) : echo $image;
                        endif; ?>" />
            <div>
                <h1>
                    <?php if ($title_default) : echo $title_default;
                    endif; ?>
                    <?php if ($title_handwritten) : ?> <span>
                        <?php echo $title_handwritten;
                    endif; ?> </span>
                </h1>
                <p><?php if ($text) : echo $text;
                    endif; ?></p>
            </div>
        </section>
    <?php endif; ?>
    <!-- END BLOCK #1 -->

    <!-- BLOCK #2 -->
    <?php
    $block_2 = get_field('block_2');
    if ($block_2) :
        $title_default = $block_2['title_default'];
        $title_handwritten = $block_2['title_handwritten'];
        $text = $block_2['text'];
        $image = $block_2['image'];
        $image = wp_get_attachment_image_src($image['ID'], 'large')[0];
    ?>
        <section>
            <img src=" <?php if ($image) : echo $image;
                        endif; ?>" />
            <div>
                <h2>
                    <?php if ($title_default) : echo $title_default;
                    endif; ?>
                    <?php if ($title_handwritten) : ?> <span>
                        <?php echo $title_handwritten;
                    endif; ?> </span>
                </h2>
                <p><?php if ($text) : echo $text;
                    endif; ?></p>
            </div>
        </section>
    <?php endif; ?>
    <!-- END BLOCK #2 -->

    <!-- BLOCK #3 -->
    <?php
    $block_3 = get_field('block_3');
    if ($block_3) :
        $title_default = $block_3['title_default'];
        $title_handwritten = $block_3['title_handwritten'];
        $text = $block_3['text'];
    ?>
        <section>
            <div>
                <h2>
                    <?php if ($title_default) : echo $title_default;
                    endif; ?>
                    <?php if ($title_handwritten) : ?> <span>
                        <?php echo $title_handwritten;
                    endif; ?> </span>
                </h2>
                <p><?php if ($text) : echo $text;
                    endif; ?></p>
            </div>
        </section>
    <?php endif; ?>
    <!-- END BLOCK #3 -->

    <!-- BLOCK #4 -->
    <?php
    $block_4 = get_field('block_4');
    if ($block_4) :
        $title_default = $block_4['title_default'];
        $title_handwritten = $block_4['title_handwritten'];
        $text = $block_4['text'];
        $image = $block_4['image'];
        $image = wp_get_attachment_image_src($image['ID'], 'large')[0];
    ?>
        <section>
            <img src=" <?php if ($image) : echo $image;
                        endif; ?>" />
            <div>
                <h2>
                    <?php if ($title_default) : echo $title_default;
                    endif; ?>
                    <?php if ($title_handwritten) : ?> <span>
                        <?php echo $title_handwritten;
                    endif; ?> </span>
                </h2>
                <p><?php if ($text) : echo $text;
                    endif; ?></p>
            </div>
        </section>
    <?php endif; ?>
    <!-- END BLOCK #4 -->

</main>

<?php get_footer() ?>