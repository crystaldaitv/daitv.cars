<?php
defined('ABSPATH') || die;

class advancedDefaultTheme {
    /**
     * Function advancedDefaultTheme constructor.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Create list default option of theme
     *
     * @return array
     */
    public function defaultCustomizerValues()
    {
        $prefix = 'advanced_theme_setting_';
        $defaultCustomize = array(
            $prefix . 'load_menu_logo' => true,
            $prefix . 'image_upload' => THEME_URL . '/assets/images/logo.png',
            $prefix . 'logo_width' => '90',
            $prefix . 'logo_height' => '50',
            $prefix . 'background_color' => '#fafafa',
            $prefix . 'background_image' => '',
            $prefix . 'fontsize' => '14',
            $prefix . 'line_height' => '1.5',
            $prefix . 'header_text_size' => '1.5',
            $prefix . 'header_letter_spacing' => '1.2',
            $prefix . 'header_line_height' => '1.2',
            $prefix . 'header_text_color' => '#444',
            $prefix . 'header_font_style' => '|Bold',
            $prefix . 'body_link_color' => '#444',
            $prefix . 'body_text_color' => '#444',
            $prefix . 'body_header_font_style' => '|Bold',
            $prefix . 'content_width' => '90',
            $prefix . 'load_sidebar' => true,
            $prefix . 'sticky_logo_width' => '70',
            $prefix . 'sidebar_width' => '28',
            $prefix . 'sidebar_background_color' => '#f9fbfd',
            $prefix . 'sidebar_link_color' => '#42495d',
            $prefix . 'sidebar_header_color' => '#42495d',
            $prefix . 'sidebar_text_color' => '#91a8c5',
            $prefix . 'sidebar_header_font_style' => '|Bold|Uppercase',
            $prefix . 'menu_height' => '40',
            $prefix . 'menu_text_size' => '14',
            $prefix . 'menu_header_color' => '#222',
            $prefix . 'menu_link_font_style' => '|Bold',
            $prefix . 'menu_active_link_color' => '#50a7ec',
            $prefix . 'menu_background_color' => '#ffffff',
            $prefix . 'sub_menu_text_size' => '16',
            $prefix . 'sub_menu_border_top' => '1',
            $prefix . 'sub_menu_dropdown_width' => '200',
            $prefix . 'sub_menu_background_color' => '#ffffff',
            $prefix . 'sub_menu_background_color_hover' => '#50a7ec1a',
            $prefix . 'sub_menu_border_top_color' => '#fafafa',
            $prefix . 'sub_menu_text_color' => '#000',
            $prefix . 'display_author' => true,
            $prefix . 'display_date' => true,
            $prefix . 'display_category' => true,
            $prefix . 'display_comments' => true,
            $prefix . 'footer_setting_top_padding' => '50',
            $prefix . 'footer_setting_bottom_padding' => '50',
            $prefix . 'footer_setting_background_color' => '#2a2727',
            $prefix . 'footer_custom_credits' => 'Designed by DaiDev Company | Powered by WordPress',
            $prefix . 'footer_setting_copyright_color' => '#eeeeee',
            $prefix . 'footer_setting_copyright_line_height' => '1',
            $prefix . 'footer_setting_widget_header_size' => '20',
            $prefix . 'footer_setting_header_font_style' => '|Bold|Uppercase',
            $prefix . 'footer_setting_widget_text_size' => '1.2',
            $prefix . 'footer_setting_widget_line_height' => '1.2',
            $prefix . 'footer_setting_widget_text_style' => '|Bold',
            $prefix . 'footer_setting_widget_text_color' => '#eeeeee',
            $prefix . 'footer_setting_widget_link_color' => '#eeeeee',
            $prefix . 'footer_setting_widget_header_color' => '#eeeeee',
            $prefix . 'copyright_color' => '#eeeeee',
            $prefix . 'copyright_line_height' => '1',
            $prefix . 'widget_header_size' => '20',
            $prefix . 'widget_text_size' => '1.2',
            $prefix . 'widget_line_height' => '1.2',
            $prefix . 'widget_text_style' => '|Bold|Uppercase',
            $prefix . 'widget_text_color' => '#eeeeee',
            $prefix . 'widget_link_color' => '#eeeeee',
            $prefix . 'widget_header_color' => '#eeeeee',
        );
        return $defaultCustomize;
    }

    /**
     * Create default option settings list
     *
     * @return array
     */
    public function defaultThemeOptionSettings() {
        $themeOptionDefault = array(
            'customCss' => '',
            'customHead' => '',
            'customBody' => '',
            'numberCat' => 6,
            'numberTag' => 5,
            'numberSearch' => 5,
            'numberArchive' => 5
        );

        return $themeOptionDefault;
    }

}