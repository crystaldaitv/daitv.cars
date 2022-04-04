<?php
defined('ABSPATH') || die;

/**
 * Contains methods for customizing the theme customization screen.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @since MyTheme 1.0
 */

/**
 * Check for WP_Customizer_Control existence before adding custom control because WP_Customize_Control
 * is loaded on customizer page only
 *
 * @see _wp_customize_include()
 */

// Customize controls
if ( !class_exists( 'Customizer_Range_Value_Control' ) ) {
    require_once(CORE . '/class-customizer-range-value-control.php');
}

if ( !class_exists( 'AdvancedThemeCustomizeControl' ) ) {
    require_once(CORE . '/class-advanced-theme-customizer-control.php');
}

if (!function_exists('theme_font_style_choices')) {
    /**
     * Return font style options
     *
     * @param string $option Check value return
     *
     * @return array
     */
    function theme_font_style_choices($option = '')
    {
        if ($option === 'menus_logo') {
            return array(
                'Horizontal Left'   => 'left',
                'Horizontal Center' => 'center',
                'Horizontal Right'  => 'right',
                'Stacked Center A'  => 'centerA',
            );
        } elseif ($option === 'footer_menu') {
            return array(
                'Left'   => 'left',
                'Center' => 'center',
                'Right'  => 'right',
            );
        }
        return array(
            'format_bold'       => 'Bold',
            'format_italic'     => 'Italic',
            'title'             => 'Uppercase',
            'format_underlined' => 'Underline',
        );
    }
}

class MyTheme_Customize {
    /**
     * This hooks into 'customize_register' (available as of WP 3.4) and allows
     * you to add new sections and controls to the Theme Customize screen.
     *
     * Note: To enable instant preview, we have to actually write a bit of custom
     * javascript. See live_preview() for more.
     *
     * @see add_action('customize_register',$func)
     * @param \WP_Customize_Manager $wp_customize
     * @link http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
     * @since MyTheme 1.0
     */
    public static function register ( $wp_customize ) {
        require_once CORE . '/customize-register.php';
    }

    /**
     * This will output the custom WordPress settings to the live theme's WP head.
     *
     * Used by hook: 'wp_head'
     *
     * @see add_action('wp_head',$func)
     * @since MyTheme 1.0
     */
    public static function header_output() {
        $themeOptions = get_option('advanced_theme_option');
        if (!$themeOptions) {
            $themeOptions = array();
        }
        $customCss = (isset($themeOptions['customCss'])) ? $themeOptions['customCss'] : '';
        $customHead = (isset($themeOptions['customHead'])) ? $themeOptions['customHead'] : '';
        $customBody = (isset($themeOptions['customBody'])) ? $themeOptions['customBody'] : '';
        ?>
        <!--Customizer CSS-->
        <style type="text/css" id="advanced-theme-customize-style">
            <?php self::generate_css('.logo-content', 'display', 'advanced_theme_setting_load_menu_logo'); ?>
            <?php self::generate_css('#logo-link', 'background-image', 'advanced_theme_setting_image_upload'); ?>
            <?php self::generate_css('#logo-link', 'width', 'advanced_theme_setting_logo_width', '', 'px'); ?>
            <?php self::generate_css('#logo-link', 'height', 'advanced_theme_setting_logo_height', '', 'px'); ?>
            <?php self::generate_css('body#wp_body_layout_home', 'background-color', 'advanced_theme_setting_background_color'); ?>
            <?php self::generate_css('body#wp_body_layout_home', 'background-image', 'advanced_theme_setting_background_image'); ?>
            <?php self::generate_css('body#wp_body_layout_home, #content, #sidebar', 'font-size', 'advanced_theme_setting_fontsize', '', 'px'); ?>
            <?php self::generate_css('#page-container #main-content', 'line-height', 'advanced_theme_setting_line_height', '', 'em'); ?>
            <?php self::generate_css('h1, h2, h3, h4, h5, h6', 'font-size', 'advanced_theme_setting_header_text_size', '', 'rem'); ?>
            <?php self::generate_css('h1, h2, h3, h4, h5, h6', 'letter-spacing', 'advanced_theme_setting_header_letter_spacing', '', 'px'); ?>
            <?php self::generate_css('h1:not(.site-name-header), h2:not(.site-name-header), h3, h4, h5, h6', 'line-height', 'advanced_theme_setting_header_line_height', '', 'em'); ?>
            <?php self::generate_css('article p:not(.post-meta) a, .comment-edit-link, .pinglist a, .pagination a, a:not(.site-title-link):not(.post-link):not(.advanced-theme-menu-link)', 'color', 'advanced_theme_setting_body_link_color'); ?>
            <?php self::generate_css('body #page-container', 'color', 'advanced_theme_setting_body_text_color'); ?>
            <?php self::generate_css('#page-container h1, #page-container h2, #page-container h3, #page-container h4, #page-container h5, #page-container h6, #page-container .post-link', 'color', 'advanced_theme_setting_header_text_color'); ?>
            <?php self::generate_css('#page-container h1, #page-container h2, #page-container h3, #page-container h4, #page-container h5, #page-container h6, #page-container .post-link', 'font-style', 'advanced_theme_setting_body_header_font_style'); ?>
            <?php self::generate_css('body #page-container', 'width', 'advanced_theme_setting_content_width', '', '%'); ?>
            <?php self::generate_css('#sidebar', 'display', 'advanced_theme_setting_load_sidebar'); ?>
            /* Header & Menu render */
            <?php self::generate_css('#page-header .advanced-theme-menu a', 'color', 'advanced_theme_setting_menu_header_color'); ?>
            <?php self::generate_css('#page-header .advanced-theme-menu', 'height', 'advanced_theme_setting_menu_height', '', 'px'); ?>
            <?php self::generate_css('#page-header .advanced-theme-menu a', 'font-size', 'advanced_theme_setting_menu_text_size', '', 'px'); ?>
            <?php self::generate_css('#page-header .advanced-theme-menu a', 'font-style', 'advanced_theme_setting_menu_link_font_style'); ?>
            <?php self::generate_css('#page-header .advanced-theme-menu a:active', 'color', 'advanced_theme_setting_menu_active_link_color'); ?>
            <?php self::generate_css('#page-header .advanced-theme-menu', 'background-color', 'advanced_theme_setting_menu_background_color'); ?>
            <?php self::generate_css('#page-header .advanced-theme-menu .sub-menu li a', 'font-size', 'advanced_theme_setting_sub_menu_text_size', '', 'px'); ?>
            <?php self::generate_css('#page-header .advanced-theme-menu .sub-menu', 'border-top-width', 'advanced_theme_setting_sub_menu_border_top', '', 'px'); ?>
            <?php self::generate_css('#page-header .advanced-theme-menu .sub-menu', 'width', 'advanced_theme_setting_sub_menu_dropdown_width', '', 'px'); ?>
            <?php self::generate_css('#page-header .advanced-theme-menu .sub-menu', 'background-color', 'advanced_theme_setting_sub_menu_background_color'); ?>
            <?php self::generate_css('#page-header .advanced-theme-menu .sub-menu:hover', 'background-color', 'advanced_theme_setting_sub_menu_background_color_hover'); ?>
            <?php self::generate_css('#page-header .advanced-theme-menu .sub-menu', 'border-top-color', 'advanced_theme_setting_sub_menu_border_top_color'); ?>
            <?php self::generate_css('#page-header .advanced-theme-menu .sub-menu li a', 'color', 'advanced_theme_setting_sub_menu_text_color'); ?>
            /* Sidebar render */
            <?php self::generate_css('#sidebar', 'width', 'advanced_theme_setting_sidebar_width', '', '%'); ?>
            <?php self::generate_css('#sidebar', 'background-color', 'advanced_theme_setting_sidebar_background_color'); ?>
            <?php self::generate_css('#sidebar a', 'color', 'advanced_theme_setting_sidebar_link_color'); ?>
            <?php self::generate_css('#sidebar h1, #sidebar h2, #sidebar h3, #sidebar h4, #sidebar h5, #sidebar h6', 'color', 'advanced_theme_setting_sidebar_header_color'); ?>
            <?php self::generate_css('#sidebar p, #sidebar span', 'color', 'advanced_theme_setting_sidebar_text_color'); ?>
            <?php self::generate_css('#sidebar h1, #sidebar h2, #sidebar h3, #sidebar h4, #sidebar h5, #sidebar h6', 'font-style', 'advanced_theme_setting_sidebar_header_font_style'); ?>
            /* Footer render */
            <?php self::generate_css('#wp_body_layout_home #footer-bottom', 'padding-top', 'advanced_theme_setting_footer_setting_top_padding', '', 'px'); ?>
            <?php self::generate_css('#wp_body_layout_home #footer-bottom', 'padding-bottom', 'advanced_theme_setting_footer_setting_bottom_padding', '', 'px'); ?>
            <?php self::generate_css('#wp_body_layout_home #page-footer', 'background-color', 'advanced_theme_setting_footer_setting_background_color'); ?>
            <?php self::generate_css('#page-copyright', 'color', 'advanced_theme_setting_footer_setting_copyright_color'); ?>
            <?php self::generate_css('#page-copyright', 'line-height', 'advanced_theme_setting_footer_setting_copyright_line_height', '', 'em'); ?>
            <?php self::generate_css('#footer-widgets h1, #footer-widgets h2, #footer-widgets h3, #footer-widgets h4, #footer-widgets h5, #footer-widgets h6', 'font-size', 'advanced_theme_setting_footer_setting_widget_header_size', '', 'px'); ?>
            <?php self::generate_css('#footer-widgets h1, #footer-widgets h2, #footer-widgets h3, #footer-widgets h4, #footer-widgets h5, #footer-widgets h6', 'font-style', 'advanced_theme_setting_footer_setting_header_font_style'); ?>
            <?php self::generate_css('body #footer-bottom', 'font-size', 'advanced_theme_setting_footer_setting_widget_text_size', '', 'em'); ?>
            <?php self::generate_css('body #footer-bottom', 'line-height', 'advanced_theme_setting_footer_setting_widget_line_height', '', 'em'); ?>
            <?php self::generate_css('body #footer-bottom', 'font-style', 'advanced_theme_setting_footer_setting_widget_text_style'); ?>
            <?php self::generate_css('body #footer-bottom', 'color', 'advanced_theme_setting_footer_setting_widget_text_color'); ?>
            <?php self::generate_css('body #footer-bottom a', 'color', 'advanced_theme_setting_footer_setting_widget_link_color'); ?>
            <?php self::generate_css('#footer-widgets h1, #footer-widgets h2, #footer-widgets h3, #footer-widgets h4, #footer-widgets h5, #footer-widgets h6', 'color', 'advanced_theme_setting_footer_setting_widget_header_color'); ?>
            /* Blog Post render */
            <?php self::generate_css('.entry-meta .author', 'display', 'advanced_theme_setting_display_author'); ?>
            <?php self::generate_css('.entry-meta .date-published', 'display', 'advanced_theme_setting_display_date'); ?>
            <?php self::generate_css('.entry-meta .category', 'display', 'advanced_theme_setting_display_category'); ?>
            <?php self::generate_css('.entry-meta .meta-reply', 'display', 'advanced_theme_setting_display_comments'); ?>
            /* Generate custom code theme options */
            <?php
                if ($customCss !== '') {
                    echo $customCss;
                }
                if ($customHead !== '') {
                    echo $customHead;
                }
                if ($customBody !== '') {
                    echo $customBody;
                }
            ?>
        </style>
        <!--/Customizer CSS-->
        <?php
    }

    /**
     * This outputs the javascript needed to automate the live settings preview.
     * Also keep in mind that this function isn't necessary unless your settings
     * are using 'transport'=>'postMessage' instead of the default 'transport'
     * => 'refresh'
     *
     * Used by hook: 'customize_preview_init'
     *
     * @see add_action('customize_preview_init',$func)
     * @since MyTheme 1.0
     */
    public static function live_preview() {
        wp_enqueue_script(
            'mytheme-themecustomizer',
            get_template_directory_uri() . '/assets/js/theme-custom-customizer.js',
            array(  'jquery', 'customize-preview' ),
            '',
            true
        );
    }

    /**
     * This will generate a line of CSS for use in header output. If the setting
     * ($mod_name) has no defined value, the CSS will not be output.
     *
     * @uses get_theme_mod()
     * @param string $selector CSS selector
     * @param string $style The name of the CSS *property* to modify
     * @param string $mod_name The name of the 'theme_mod' option to fetch
     * @param string $prefix Optional. Anything that needs to be output before the CSS property
     * @param string $postfix Optional. Anything that needs to be output after the CSS property
     * @param bool $echo Optional. Whether to print directly to the page (default: true).
     * @return string Returns a single line of CSS with selectors and a property.
     * @since MyTheme 1.0
     */
    public static function generate_css( $selector, $style, $mod_name, $prefix = '', $postfix = '', $echo = true ) {
        $return             = '';
        $mod                = get_theme_mod($mod_name);
        $themeModOption     = get_option('theme_mods_' . THEME_NAME);
        $imageSettings      = array(
            'advanced_theme_setting_image_upload',
            'advanced_theme_setting_background_image'
        );
        $fontStyleTypeList  = array(
            'advanced_theme_setting_body_header_font_style',
            'advanced_theme_setting_sidebar_header_font_style',
            'advanced_theme_setting_menu_link_font_style',
            'advanced_theme_setting_footer_setting_header_font_style',
            'advanced_theme_setting_footer_setting_widget_text_style'
        );
        $loadOptions        = array(
            'advanced_theme_setting_load_menu_logo',
            'advanced_theme_setting_load_sidebar',
            'advanced_theme_setting_display_author',
            'advanced_theme_setting_display_date',
            'advanced_theme_setting_display_category',
            'advanced_theme_setting_display_comments'
        );

        // Generate font style option
        if (in_array($mod_name, $fontStyleTypeList)) {
            if ($mod_name === 'advanced_theme_setting_body_header_font_style') {
                if (isset($themeModOption['advanced_theme_setting_body_header_font_style'])) {
                    $type = $themeModOption['advanced_theme_setting_body_header_font_style'];
                    $type = explode( '|', $type );
                    if (!empty($type)) {
                        self::advancedThemeGenerateFontStyle($selector, $type, true);
                    }
                } else {
                    $return = sprintf('%s { font-weight : initial; font-style : initial; text-transform : initial; text-decoration : initial; }',
                        $selector
                    );
                    if ( $echo ) {
                        echo $return;
                    }
                }
            } elseif ($mod_name === 'advanced_theme_setting_sidebar_header_font_style') {
                if (isset($themeModOption['advanced_theme_setting_sidebar_header_font_style'])) {
                    $type = $themeModOption['advanced_theme_setting_sidebar_header_font_style'];
                    $type = explode( '|', $type );
                    if (!empty($type)) {
                        self::advancedThemeGenerateFontStyle($selector, $type, true);
                    }
                } else {
                    $return = sprintf('%s { font-weight : initial; font-style : initial; text-transform : initial; text-decoration : initial; }',
                        $selector
                    );
                    if ( $echo ) {
                        echo $return;
                    }
                }
            } elseif ($mod_name === 'advanced_theme_setting_menu_link_font_style') {
                if (isset($themeModOption['advanced_theme_setting_menu_link_font_style'])) {
                    $type = $themeModOption['advanced_theme_setting_menu_link_font_style'];
                    $type = explode( '|', $type );
                    if (!empty($type)) {
                        self::advancedThemeGenerateFontStyle($selector, $type, true);
                    }
                } else {
                    $return = sprintf('%s { font-weight : initial; font-style : initial; text-transform : initial; text-decoration : initial; }',
                        $selector
                    );
                    if ( $echo ) {
                        echo $return;
                    }
                }
            } elseif ($mod_name === 'advanced_theme_setting_footer_setting_header_font_style') {
                if (isset($themeModOption['advanced_theme_setting_footer_setting_header_font_style'])) {
                    $type = $themeModOption['advanced_theme_setting_footer_setting_header_font_style'];
                    $type = explode( '|', $type );
                    if (!empty($type)) {
                        self::advancedThemeGenerateFontStyle($selector, $type, true);
                    }
                } else {
                    $return = sprintf('%s { font-weight : initial; font-style : initial; text-transform : initial; text-decoration : initial; }',
                        $selector
                    );
                    if ( $echo ) {
                        echo $return;
                    }
                }
            } elseif ($mod_name === 'advanced_theme_setting_footer_setting_widget_text_style') {
                if (isset($themeModOption['advanced_theme_setting_footer_setting_widget_text_style'])) {
                    $type = $themeModOption['advanced_theme_setting_footer_setting_widget_text_style'];
                    $type = explode( '|', $type );
                    if (!empty($type)) {
                        self::advancedThemeGenerateFontStyle($selector, $type, true);
                    }
                } else {
                    $return = sprintf('%s { font-weight : initial; font-style : initial; text-transform : initial; text-decoration : initial; }',
                        $selector
                    );
                    if ( $echo ) {
                        echo $return;
                    }
                }
            }
        } elseif (in_array($mod_name, $loadOptions)) {
            // Generate load option
            if ($mod_name === 'advanced_theme_setting_load_menu_logo') {
                $loadSidebar = $themeModOption['advanced_theme_setting_load_menu_logo'];
                self::advancedThemeGenerateDisplayStyle($mod_name, $selector, $loadSidebar, true);
            }
            if ($mod_name === 'advanced_theme_setting_load_sidebar') {
                $loadSidebar = $themeModOption['advanced_theme_setting_load_sidebar'];
                self::advancedThemeGenerateDisplayStyle($mod_name, $selector, $loadSidebar, true);
            } elseif ($mod_name === 'advanced_theme_setting_display_author') {
                $displayAuthor = $themeModOption['advanced_theme_setting_display_author'];
                self::advancedThemeGenerateDisplayStyle($mod_name, $selector, $displayAuthor, true);
            } elseif ($mod_name === 'advanced_theme_setting_display_date') {
                $displayDate = $themeModOption['advanced_theme_setting_display_date'];
                self::advancedThemeGenerateDisplayStyle($mod_name, $selector, $displayDate, true);
            } elseif ($mod_name === 'advanced_theme_setting_display_category') {
                $displayCategory = $themeModOption['advanced_theme_setting_display_category'];
                self::advancedThemeGenerateDisplayStyle($mod_name, $selector, $displayCategory, true);
            } elseif ($mod_name === 'advanced_theme_setting_display_comments') {
                $displayReply = $themeModOption['advanced_theme_setting_display_comments'];
                self::advancedThemeGenerateDisplayStyle($mod_name, $selector, $displayReply, true);
            }
        } else {
            // Generate theme mods option
            if ( ! empty( $mod ) ) {
                // Images render
                if (in_array($mod_name, $imageSettings)) {
                    $return = sprintf('%s { %s: url("%s"); }',
                        $selector,
                        $style,
                        $prefix.$mod.$postfix
                    );
                    if ( $echo ) {
                        echo $return;
                    }
                } elseif (in_array($mod_name, $fontStyleTypeList)) {
                    if (!empty($themeModOption) && $themeModOption !== false) {
                        if (isset($themeModOption['advanced_theme_setting_body_header_font_style'])) {
                            $type = $themeModOption['advanced_theme_setting_body_header_font_style'];
                            $type = explode( '|', $type );
                            if (in_array('Bold', $type)) {
                                $return = sprintf('%s { font-weight : bold; }',
                                    $selector
                                );
                                if ( $echo ) {
                                    echo $return;
                                }
                            } elseif(!in_array('Bold', $type)) {
                                $return = sprintf('%s { font-weight : initial; }',
                                    $selector
                                );
                                if ( $echo ) {
                                    echo $return;
                                }
                            }

                            if(in_array('Italic', $type)) {
                                $return = sprintf('%s { font-style : italic; }',
                                    $selector
                                );
                                if ( $echo ) {
                                    echo $return;
                                }
                            } elseif(!in_array('Italic', $type)) {
                                $return = sprintf('%s { font-style : initial; }',
                                    $selector
                                );
                                if ( $echo ) {
                                    echo $return;
                                }
                            }

                            if(in_array('Uppercase', $type)) {
                                $return = sprintf('%s { text-transform : uppercase; }',
                                    $selector
                                );
                                if ( $echo ) {
                                    echo $return;
                                }
                            } elseif(!in_array('Uppercase', $type)) {
                                $return = sprintf('%s { text-transform : initial; }',
                                    $selector
                                );
                                if ( $echo ) {
                                    echo $return;
                                }
                            }

                            if(in_array('Underline', $type)) {
                                $return = sprintf('%s { text-decoration : underline; }',
                                    $selector
                                );
                                if ( $echo ) {
                                    echo $return;
                                }
                            } elseif(!in_array('Underline', $type)) {
                                $return = sprintf('%s { text-decoration : initial; }',
                                    $selector
                                );
                                if ( $echo ) {
                                    echo $return;
                                }
                            }

                            if ((!in_array('Bold', $type) && !in_array('Italic', $type) &&
                                !in_array('Uppercase', $type) && !in_array('Underline', $type))) {
                                $return = sprintf('%s { font-weight : initial; font-style : initial; text-transform : initial; text-decoration : initial; }',
                                    $selector
                                );
                                if ( $echo ) {
                                    echo $return;
                                }
                            }
                        } else {
                            $return = sprintf('%s { font-weight : initial; font-style : initial; text-transform : initial; text-decoration : initial; }',
                                $selector
                            );
                            if ( $echo ) {
                                echo $return;
                            }
                        }

                        // sidebar header font style
                        if (isset($themeModOption['advanced_theme_setting_sidebar_header_font_style'])) {
                            $type2 = $themeModOption['advanced_theme_setting_sidebar_header_font_style'];
                            $type2 = explode( '|', $type2 );
                            if (in_array('Bold', $type2)) {
                                $return = sprintf('%s { font-weight : bold; }',
                                    $selector
                                );
                                if ( $echo ) {
                                    echo $return;
                                }
                            } elseif(!in_array('Bold', $type2)) {
                                $return = sprintf('%s { font-weight : initial; }',
                                    $selector
                                );
                                if ( $echo ) {
                                    echo $return;
                                }
                            }

                            if(in_array('Italic', $type2)) {
                                $return = sprintf('%s { font-style : italic; }',
                                    $selector
                                );
                                if ( $echo ) {
                                    echo $return;
                                }
                            } elseif(!in_array('Italic', $type2)) {
                                $return = sprintf('%s { font-style : initial; }',
                                    $selector
                                );
                                if ( $echo ) {
                                    echo $return;
                                }
                            }

                            if(in_array('Uppercase', $type2)) {
                                $return = sprintf('%s { text-transform : uppercase; }',
                                    $selector
                                );
                                if ( $echo ) {
                                    echo $return;
                                }
                            } elseif(!in_array('Uppercase', $type2)) {
                                $return = sprintf('%s { text-transform : initial; }',
                                    $selector
                                );
                                if ( $echo ) {
                                    echo $return;
                                }
                            }

                            if(in_array('Underline', $type2)) {
                                $return = sprintf('%s { text-decoration : underline; }',
                                    $selector
                                );
                                if ( $echo ) {
                                    echo $return;
                                }
                            } elseif(!in_array('Underline', $type2)) {
                                $return = sprintf('%s { text-decoration : initial; }',
                                    $selector
                                );
                                if ( $echo ) {
                                    echo $return;
                                }
                            }

                            if ((!in_array('Bold', $type2) && !in_array('Italic', $type2) &&
                                !in_array('Uppercase', $type2) && !in_array('Underline', $type2))) {
                                $return = sprintf('%s { font-weight : initial; font-style : initial; text-transform : initial; text-decoration : initial; }',
                                    $selector
                                );
                                if ( $echo ) {
                                    echo $return;
                                }
                            }
                        } else {
                            $return = sprintf('%s { font-weight : initial; font-style : initial; text-transform : initial; text-decoration : initial; }',
                                $selector
                            );
                            if ( $echo ) {
                                echo $return;
                            }
                        }

                    }
                } else {
                    // Default render
                    $return = sprintf('%s { %s:%s; }',
                        $selector,
                        $style,
                        $prefix.$mod.$postfix
                    );
                    if ( $echo ) {
                        echo $return;
                    }
                }
            }
        }

        return $return;
    }

    /**
     * Generate font styles
     *
     * @param string  $selector  CSS selector
     * @param array   $type      Type values
     * @param boolean $echo      Display
     *
     * @since MyTheme 1.0
     */
    public static function advancedThemeGenerateFontStyle($selector, $type, $echo = true) {
        if (in_array('Bold', $type)) {
            $return = sprintf('%s { font-weight : bold; }',
                $selector
            );
            if ( $echo ) {
                echo $return;
            }
        } elseif(!in_array('Bold', $type)) {
            $return = sprintf('%s { font-weight : initial; }',
                $selector
            );
            if ( $echo ) {
                echo $return;
            }
        }

        if(in_array('Italic', $type)) {
            $return = sprintf('%s { font-style : italic; }',
                $selector
            );
            if ( $echo ) {
                echo $return;
            }
        } elseif(!in_array('Italic', $type)) {
            $return = sprintf('%s { font-style : initial; }',
                $selector
            );
            if ( $echo ) {
                echo $return;
            }
        }

        if(in_array('Uppercase', $type)) {
            $return = sprintf('%s { text-transform : uppercase; }',
                $selector
            );
            if ( $echo ) {
                echo $return;
            }
        } elseif(!in_array('Uppercase', $type)) {
            $return = sprintf('%s { text-transform : initial; }',
                $selector
            );
            if ( $echo ) {
                echo $return;
            }
        }

        if(in_array('Underline', $type)) {
            $return = sprintf('%s { text-decoration : underline; }',
                $selector
            );
            if ( $echo ) {
                echo $return;
            }
        } elseif(!in_array('Underline', $type)) {
            $return = sprintf('%s { text-decoration : initial; }',
                $selector
            );
            if ( $echo ) {
                echo $return;
            }
        }

        if ((!in_array('Bold', $type) && !in_array('Italic', $type) &&
            !in_array('Uppercase', $type) && !in_array('Underline', $type))) {
            $return = sprintf('%s { font-weight : initial; font-style : initial; text-transform : initial; text-decoration : initial; }',
                $selector
            );
            if ( $echo ) {
                echo $return;
            }
        }
    }

    /**
     * Generate display styles
     *
     * @param string  $modName          Name
     * @param string  $selector         CSS selector
     * @param boolean $loadOption       Load elements
     * @param boolean $echo             Display
     *
     * @since MyTheme 1.0
     */
    public static function advancedThemeGenerateDisplayStyle($modName, $selector, $loadOption = true, $echo = true) {
        if ($loadOption === true) {
            if ($modName === 'advanced_theme_setting_load_sidebar') {
                $return = sprintf('%s { display : block; }', $selector);
                if ( $echo ) {
                    echo $return;
                }
            } elseif ($modName === 'advanced_theme_setting_load_menu_logo') {
                $return = sprintf('%s { display : block; }', $selector);
                $return1 = sprintf('.site-info-content { display : none; }');

                if ( $echo ) {
                    echo $return;
                    echo $return1;
                }
            } else {
                $return = sprintf('%s { display : inline-block; }', $selector);
                if ( $echo ) {
                    echo $return;
                }
            }

        } else {
            if ($modName === 'advanced_theme_setting_load_menu_logo') {
                $return = sprintf('%s { display : none; }', $selector);
                $return1 = sprintf('.site-info-content { display : block; }');

                if ( $echo ) {
                    echo $return;
                    echo $return1;
                }
            } else {
                $return = sprintf('%s { display : none; }', $selector);
                if ( $echo ) {
                    echo $return;
                }
            }
        }
    }
}