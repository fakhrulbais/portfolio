<?php 
/**
 *  The template for displaying 404 pages (not found)
 */ 

get_header();
?>

<section id="error-page" class="pt-page">
    <div class="section-container">
        <div class="error-content">

            <div class="error-title"><?php echo esc_html(watson_get_theme_options('ct_watson_error_title')); ?></div>

            <div class="error-subtitle"><?php echo wp_kses_post(watson_get_theme_options('ct_watson_error_info')); ?></div>

            <a href="<?php echo esc_url(watson_get_theme_options('ct_watson_error_back_button_url')); ?>" class="error-btn btn-main"><?php echo esc_html(watson_get_theme_options('ct_watson_error_back_button')); ?></a>

        </div>
    </div>
</section>

<?php get_footer(); ?>