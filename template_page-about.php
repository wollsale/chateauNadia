<?php /* Template Name: Page About (Multilang Template) */

get_header() ?>

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
    <div class="hero hero--about">
        <div class="container">
            <div class="block-split">
                <div class="media">
                    <img src=" <?php if ($image) : echo $image;
                                endif; ?>" />
                </div>
                <div class="content">
                    <div class="title-head">
                        <?php if ($title_default) : echo '<h2>' . $title_default . '</h2>';
                        endif; ?>
                        <?php if ($title_handwritten) : echo '<h2>' . $title_handwritten . '</h2>';
                        endif; ?>
                    </div>
                    <p><?php if ($text) : echo $text;
                        endif; ?></p>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<!-- END BLOCK #1 -->

</header>

<main>

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
            <div class="container">
                <div class="block-split">
                    <div class="content">
                        <div class="title-head">
                            <?php if ($title_default) : echo '<h2>' . $title_default . '</h2>';
                            endif; ?>
                            <?php if ($title_handwritten) : echo '<h2>' . $title_handwritten . '</h2>';
                            endif; ?>
                        </div>
                        <p><?php if ($text) : echo $text;
                            endif; ?></p>
                    </div>
                    <div class="media">
                        <img src=" <?php if ($image) : echo $image;
                                    endif; ?>" />
                    </div>
                </div>
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
        <section class="quote">
            <blockquote class="container">
                <h2 class="quote__main">
                    <?php if ($title_default) : echo $title_default;
                    endif; ?>
                    <?php if ($title_handwritten) : ?> <span>
                        <?php echo $title_handwritten;
                    endif; ?> </span>
                </h2>
                <p><?php if ($text) : echo $text;
                    endif; ?></p>
            </blockquote>
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
            <div class="container">
                <div class="block-split">
                    <div class="media">
                        <img src=" <?php if ($image) : echo $image;
                                    endif; ?>" />
                    </div>
                    <div class="content">
                        <div class="title-head">
                            <?php if ($title_default) : echo '<h2>' . $title_default . '</h2>';
                            endif; ?>
                            <?php if ($title_handwritten) : echo '<h2>' . $title_handwritten . '</h2>';
                            endif; ?>
                        </div>
                        <p><?php if ($text) : echo $text;
                            endif; ?></p>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- END BLOCK #4 -->

</main>

<?php get_footer() ?>