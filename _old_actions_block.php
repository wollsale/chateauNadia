<!-- ACTION BLOCKS -->
<?php
$action_1 = get_field('action');
$action_2 = get_field('action_2');
$action_3 = get_field('action_3');

$actions = array($action_1, $action_2, $action_3);

if (count($actions) > 0) : ?>
    <section class="actions">
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