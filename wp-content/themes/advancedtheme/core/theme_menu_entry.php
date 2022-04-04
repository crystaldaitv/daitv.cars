<?php
defined('ABSPATH') || die;

if (!class_exists('Joomunited\ADVANCEDTHEME\Jutranslation\Jutranslation')) {
    $juTranslatePath = THEME_DIR . '/jutranslation/jutranslation.php';
    require_once ($juTranslatePath);
}

if (!function_exists('menu_theme_call')) {
    /**
     * Function create option theme menu
     *
     * @return void
     */
    function menu_theme_call()
    {
        wp_enqueue_style('codemirror_style_theme', THEME_URL . '/includes' . '/assets/codemirror/codemirror.css', array(), ADVANCED_THEME_VERSION);
        wp_enqueue_style('codemirror_style', THEME_URL . '/includes' . '/assets/codemirror/theme/oceanic-next.css', array(), ADVANCED_THEME_VERSION);

        wp_enqueue_script('codemirror', THEME_URL . '/includes' . '/assets/codemirror/codemirror.js', array(), ADVANCED_THEME_VERSION);
        wp_enqueue_script('codemirrorCss', THEME_URL . '/includes' . '/assets/codemirror/mode/css/css.js', array(), ADVANCED_THEME_VERSION);
        wp_enqueue_script('codemirrorHtmlmixed', THEME_URL . '/includes' . '/assets/codemirror/mode/htmlmixed/htmlmixed.js', array(), ADVANCED_THEME_VERSION);
        wp_enqueue_script('codemirrorJavascript', THEME_URL . '/includes' . '/assets/codemirror/mode/javascript/javascript.js', array(), ADVANCED_THEME_VERSION);
        wp_enqueue_script('codemirrorXml', THEME_URL . '/includes' . '/assets/codemirror/mode/xml/xml.js', array(), ADVANCED_THEME_VERSION);
        wp_enqueue_script('codemirrorText', THEME_URL . '/includes' . '/assets/codemirror/mode/textile/textile.js', array(), ADVANCED_THEME_VERSION);

        wp_enqueue_script('bootstrap_js', THEME_URL . '/includes' . '/assets/bootstrap.js', array(), ADVANCED_THEME_VERSION);
        wp_enqueue_script('bootbox_js', THEME_URL . '/includes' . '/assets/bootbox.js', array(), ADVANCED_THEME_VERSION);

        wp_enqueue_style('ag_cssJU_style', THEME_URL . '/includes' . '/cssJU/css/style.min.css', array(), ADVANCED_THEME_VERSION);
        wp_enqueue_style('ag_waves_style', THEME_URL . '/includes' . '/cssJU/css/waves.min.css', array(), ADVANCED_THEME_VERSION);
        wp_enqueue_style('ag_menu_entry_style', THEME_URL . '/assets/css/menu_entry_style.css', array(), ADVANCED_THEME_VERSION);

        wp_enqueue_script('ag_waves_js', THEME_URL . '/includes' . '/cssJU/js/waves.min.js', array(), ADVANCED_THEME_VERSION);
        wp_enqueue_script('ag_velocity_js', THEME_URL . '/includes' . '/cssJU/js/velocity.min.js', array(), ADVANCED_THEME_VERSION);
        wp_enqueue_script('ag_tabs_js', THEME_URL . '/includes' . '/cssJU/js/tabs.js', array(), ADVANCED_THEME_VERSION);
        wp_enqueue_script('ag_script_js', THEME_URL . '/includes' . '/cssJU/js/script.js', array(), ADVANCED_THEME_VERSION);

        wp_register_script('menu_entry_js',THEME_URL . '/assets/js/menu_entry.js', array( 'jquery' ), ADVANCED_THEME_VERSION);
        wp_enqueue_script('menu_entry_js');


        wp_localize_script('menu_entry_js', 'agThemeText', array(
            'FeaturedImage' => __('Featured Image', 'advanced-theme'),
            'Select' => __('Select', 'advanced-theme'),
            'installed' => __('INSTALLED', 'advanced-theme'),
            'layoutsInThisPack' => __('Layouts In This Pack', 'advanced-theme'),
            'layoutPack' => __('Layout Pack', 'advanced-theme'),
            'RESET_THEME_OPTION' => __('This tool will reset all your theme setting to default! Sure?', 'advanced-theme'),
            'login' => __('This tool will reset all your theme setting to default! Sure?', 'advanced-theme'),
        ));
        ?>
        <?php

        $option = get_option('advanced_theme_option');
        wp_nonce_field('option_nonce', 'option_nonce');

        wp_enqueue_media();

        // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- No action, nonce is not required
        if ((!empty($_GET['page']) && in_array($_GET['page'], array('theme-live-update', 'option-theme', 'theme-translation')))) {
            // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- No action, nonce is not required
            $content_page = $_GET['page'];
        } else {
            $content_page = '';
        }
        /*get folder templates in upload*/

        wp_localize_script('menu_entry_js', 'menu_entry_js', array(
            'ag_theme_option' => $option,
            'content_page' => $content_page,
            'folderTemplates' => '',
            'siteurl' => get_option('siteurl'),
            'ajaxurl' => admin_url( 'admin-ajax.php' )
        ));
        ?>
        <script>
            var ajaxurl = '<?php echo esc_url(admin_url('admin-ajax.php', 'relative')); ?>';
        </script>
        <div id="theme_setting" class="ju-main-wrapper">
            <div class="ju-left-panel-toggle">
                <i class="dashicons dashicons-leftright ju-left-panel-toggle-icon"></i>
            </div>
            <div class="ju-left-panel">
                <div class="ju-logo">
                    <a href="https://www.joomunited.com/" target="_blank">
                        <img src="<?php echo esc_url_raw(THEME_URL . '/assets/images/logo-joomUnited-white.png');?>" alt="JoomUnited logo">
                    </a>
                </div>
                <div class="ju-menu-search">
                    <i class="mi mi-search ju-menu-search-icon"></i>
                    <input type="text" class="ju-menu-search-input" placeholder="Search settings" />
                </div>
                <ul id="config_option" class="tabs ju-menu-tabs">
                    <li class="tab theme_option active">
                        <a href="#theme_advanced" class="link-tab waves-effect waves-light"><?php esc_attr_e('Theme Options', 'advanced-theme'); ?></a>
                    </li>
                    <li class="tab update">
                        <a href="#theme-live-update" class="link-tab waves-effect waves-light"><?php esc_attr_e('Live update', 'advanced-theme'); ?></a>
                    </li>
                    <li class="tab translation">
                        <a href="#theme-translation" class="link-tab waves-effect waves-light"><?php esc_attr_e('Translation', 'advanced-theme'); ?></a>
                    </li>
                </ul>
            </div>
            <div class="ju-right-panel">
                <div id="theme_advanced" class="ju-content-wrapper">
                    <div class="ju-top-tabs-wrapper">
                        <ul class="tabs ju-top-tabs">
                            <li class="tab theme_option active">
                                <a href="#theme_option" class="link-tab"><?php esc_attr_e('Theme Options', 'advanced-theme'); ?></a>
                            </li>
                            <li class="tab custom_code">
                                <a href="#custom_code" class="link-tab"><?php esc_attr_e('Custom Code', 'advanced-theme'); ?></a>
                            </li>
                            <li class="tab advanced">
                                <a href="#advanced" class="link-tab "><?php esc_attr_e('Advanced', 'advanced-theme'); ?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="ju-notice-success message ju-notice-msg">
                        <span ><?php esc_attr_e('All modifications were saved', 'advanced-theme'); ?></span>
                        <i class="dashicons dashicons-dismiss ju-notice-close"></i>
                    </div>
                    <div class="ju-notice-error message ju-notice-msg">
                        <span ><?php esc_attr_e('there was an error', 'advanced-theme'); ?></span>
                        <i class="dashicons dashicons-dismiss ju-notice-close"></i>
                    </div>

                    <?php
                    require_once(THEME_DIR . '/option.php');
                    require_once(THEME_DIR . '/custom.php');
                    require_once(THEME_DIR . '/advanced.php');
                    ?>
                    <a id="saveTable" class="ju-button" title="Save modifications"><?php esc_attr_e('Save Changes', 'advanced-theme'); ?>
                    </a>
                </div>
                <div id="theme-live-update" class="ju-content-wrapper">
                    <div id="theme-update" class="tab-pane">
                        <?php require_once(THEME_DIR . '/live-update.php'); ?>
                    </div>
                </div>
                <div id="theme-translation" class="ju-content-wrapper">
                    <div id="theme-jutranslation-config" class="tab-pane">
                        <?php echo \Joomunited\ADVANCEDTHEME\Jutranslation\Jutranslation::getInput(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- already escaped ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
