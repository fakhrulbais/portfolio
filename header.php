<?php

/**
 * The header of our theme
 */

$watson_animation_type = watson_get_theme_options('ct_watson_animation_type');
$watson_random_animation = 'false';

if ($watson_animation_type === 'animate-0' || $watson_animation_type === '') {
    $watson_random_animation = 'true';
}

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> data-random-animation="<?php echo esc_attr($watson_random_animation); ?>" data-animation="<?php echo esc_attr($watson_animation_type); ?>">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <?php if (watson_get_theme_options('ct_watson_preloader')) : ?>
        <!--Preloader Start-->
        <div class="preloader">
            <div class="loader">
                <h4><?php echo esc_html(watson_get_theme_options('ct_watson_preloader_text')); ?></h4>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <!--Preloader End-->
    <?php endif; ?>

    <div id="page">

        <?php get_template_part('sections/header_section'); ?>

        <?php get_template_part('sections/blog_sidebar_section'); ?>

        <!--Main Start-->
        <div id="main" class="site-main">