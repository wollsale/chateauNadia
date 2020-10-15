<?php
$intro_block_1 = get_field('first_block');
$intro_block_2 = get_field('second_block');

if ($intro_block_1 or $intro_block_2) : ?>

    <section class="intro grid<?php if (!$intro_block_2) {
                                    echo ' grid--min';
                                } ?>">
        <?php
        if ($intro_block_1) :
            $title_default = $intro_block_1['default'];
            $title_handwritter = $intro_block_1['handwritten'];
            $text = $intro_block_1['text_content'];
            $button_title = $intro_block_1['button_title'];
            $button_url = $intro_block_1['button_url'];
        ?>
            <!-- Block #1 -->
            <div class="block formating" data-sal="slide-up" data-sal-duration="800" data-sal-easing="ease-out">
                <div class="head">
                    <h2><?php if ($title_default) : echo $title_default;
                        endif; ?></h2>
                    <h2><?php if ($title_handwritter) : echo $title_handwritter;
                        endif; ?></h2>
                </div>
                <div class="content">
                    <p><?php if ($text) : echo $text;
                        endif; ?></p>
                </div>
                <?php if ($button_url) : ?><div class="actions">
                    <a class="button" href="<?php echo $button_url; ?>"><?php echo $button_title; ?></a>
                </div><?php endif; ?>
            </div>

        <?php endif; ?>

        <? if($intro_block_2):
                $title_default = $intro_block_2['default'];
                $title_handwritter = $intro_block_2['handwritten'];
                $text = $intro_block_2['text_content'];
                $button_title = $intro_block_2['title'];
                $button_url = $intro_block_2['url'];
            ?>
        <!-- Block #2 -->
        <div class="block" data-sal="slide-up" data-sal-duration="800" data-sal-easing="ease-out">
            <div class="head">
                <h2><?php if ($title_default) : echo $title_default;
                    endif; ?></h2>
                <h2><?php if ($title_handwritter) : echo $title_handwritter;
                    endif; ?></h2>
            </div>
            <div class="content">
                <?php if ($text) : echo $text;
                endif; ?>
            </div>
            <?php if ($button_url) : ?><div class="actions">
                <a class="button" href="<?php echo $button_url; ?>"><?php echo $button_title; ?></a>
            </div><?php endif; ?>
        </div>

    <?php endif; ?>

    <!-- Gallery Images -->
    <?php
    $images = get_field('gallery');
    $size = 'full';
    if ($images) : ?>
        <?php foreach ($images as $image) : ?>
            <div class="images" style="--aspect-ratio: 1/1;" class="images" data-sal="slide-up" data-sal-duration="800" data-sal-easing="ease-out">
                <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    </section>

<?php endif; ?>