<?php

require_once(get_template_directory() . '/inc/defines.php');

// Scripts import config
require_once(get_template_directory() . '/inc/scripts-config.php');

// Customizer config
require_once(get_template_directory() . '/inc/customizer/customizer-config.php');

// Default theme options
require_once(get_template_directory() . '/inc/default-theme-options.php');

// Hooks Config
require_once(get_template_directory() . '/inc/hooks-config.php');

if (!function_exists('watson_get_theme_options')) {

    function watson_get_theme_options($option_id)
    {

        global $watson_default_theme_options;

        $default_value = false;
        if (isset($watson_default_theme_options) && isset($watson_default_theme_options[$option_id])) {

            $default_value  = $watson_default_theme_options[$option_id];
        }

        return get_theme_mod($option_id, $default_value);
    }
}

if (!function_exists('watson_get_post_meta')) {

    function watson_get_post_meta($post_id, $meta_key, $single = true)
    {
        return get_post_meta($post_id, $meta_key, $single);
    }

}

if (!function_exists('watson_is_build_with_elementor')) {

    function watson_is_built_with_elementor($post_id = null)
    {

        if (!class_exists('\Elementor\Plugin')) {
            return false;
        }

        if ($post_id == null) {
            $post_id = get_the_ID();
        }

        if (is_singular() && \Elementor\Plugin::$instance->db->is_built_with_elementor($post_id)) {
            return true;
        }

        return false;
    }
}

// TGM
require_once ( get_template_directory() . '/inc/plugins/plugins.php' );

// Add theme support
require_once ( get_template_directory() . '/inc/theme-support-config.php');

// Menu Config
require_once(get_template_directory() . '/inc/menu-config.php');

// Setup Config
require_once(get_template_directory() . '/inc/setup-config.php');

// Ocdi Config
require_once(get_template_directory() . '/inc/ocdi-setup.php');

// Blog Config
require_once(get_template_directory() . '/inc/blog-config.php');