<?php

/**
 * Template Name: Full Width Template
 */

get_header();

$one_page = watson_get_theme_options('ct_watson_one_page');

if ($one_page) {
    $menu_locations = get_nav_menu_locations();
    $menu_primary = $menu_locations['primary-menu'];
}

?>

<?php if ($one_page && $menu_locations && $menu_primary && is_front_page()) { ?>
    <?php
    $menu = wp_get_nav_menu_object($menu_primary);
    $menu_items = wp_get_nav_menu_items($menu->term_id);

    $page_ids = array();

    foreach ($menu_items as $menu_item) {
        if ($menu_item->object == 'page') {
            $page_ids[] = $menu_item->object_id;
        }
    }

    $args = array(
        'post_type' => 'page',
        'post__in'  => $page_ids,
        'posts_per_page' => count($page_ids),
        'orderby'       => 'post__in'
    );

    $custom_query = new WP_Query($args);

    if ($custom_query->have_posts()) {
        while ($custom_query->have_posts()) {
            $custom_query->the_post();
    ?>

            <section id="<?php echo esc_attr($post->post_name); ?>" class="pt-page">

                <?php if (get_page_template_slug($post)  === 'full-width-template.php') : ?>
                    <?php get_template_part('sections/page_content_section'); ?>
                <?php else : ?>
                    <div class="section-container">
                        <?php get_template_part('sections/page_content_section'); ?>
                    </div>
                <?php endif; ?>
            </section>

    <?php
        }
    }

    ?>

<?php } else { ?>

    <?php
    while (have_posts()) {
        the_post();
    ?>
        <section id="pt-section" class="pt-page">
            <?php get_template_part('sections/page_content_section'); ?>
        </section>
<?php
    }
}
get_footer();
