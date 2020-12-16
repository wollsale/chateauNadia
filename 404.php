<?php /* Template Name: 404 */

get_header() ?>

</header>

<main class="error-404">
    <div class="content">
        <h1><?php pll_e('error-title', '404'); ?></h1>
        <p><?php pll_e('error-message', '404'); ?></p>
        <a href="<?php echo get_home_url(); ?>" class="button"><?php pll_e('error-button', '404'); ?></a>
    </div>
</main>