<?php
defined('ABSPATH') || die;

/**
 * Create menu
 *
 * @return void
 */
function advancedThemeMenuOptions()
{
    require_once CORE . '/theme_menu_entry.php';

    add_menu_page('Advanced Theme', esc_html__('Theme Options', 'advanced-theme'), 'edit_posts', 'option-theme', 'menu_theme_call', 'dashicons-images-alt2');
    add_submenu_page('option-theme', esc_html__('Live update', 'advanced-theme'), 'Live update', 'manage_options', 'theme-live-update', 'menu_theme_call');
    add_submenu_page('option-theme', esc_html__('Theme Customizer', 'advanced-theme'), esc_html__('Theme Customizer', 'advanced-theme'), 'manage_options', 'customize.php?advanced_theme_customizer_option_set=theme');
    add_submenu_page('option-theme', esc_html__('Translation', 'advanced-theme'), 'Translation', 'manage_options', 'theme-translation', 'menu_theme_call');
}

// Menu Theme options
add_action('admin_menu', 'advancedThemeMenuOptions');
