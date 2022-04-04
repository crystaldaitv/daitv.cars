<?php
defined('ABSPATH') || die;

define( 'THEME_URL', get_template_directory_uri() );
define( 'THEME_DIR', get_stylesheet_directory() );
define( 'CORE', THEME_DIR . '/core' );
define('THEME_NAME', 'advancedtheme');
define('THEME_MODE_OPTION_SETTING_NAME', 'theme_mods_' . THEME_NAME);
define('ADVANCED_THEME_OPTION_NAME', 'advanced_theme_option');
define('ADVANCED_THEME_VERSION', '1.0.0');

/**
* Load file init.php
**/
require_once( CORE . '/init.php' );

/**
* Default $content_width of Theme content
**/
if ( ! isset( $content_width ) ) {
    $content_width = 1920;
}

/**
* Set function is supported by theme
**/
if ( ! function_exists( 'advancedThemeSetup' ) ) {
    function advancedThemeSetup() {
    /*
    * Language translate
    */
    $language_folder = THEME_DIR . '/languages';
    load_theme_textdomain( 'advanced-theme', $language_folder );

    /*
    * Add auto RSS Feed links
    */
    add_theme_support( 'automatic-feed-links' );

    /*
    * Add post thumbnail function
    */
    add_theme_support( 'post-thumbnails' );

    /*
    * Add auto title-tag function
    */
    add_theme_support( 'title-tag' );

    /*
    * Add post format function
    */
    add_theme_support( 'post-formats',
    array(
      'image',
      'video',
      'gallery',
      'quote',
      'link'
    )
    );

    /*
    * Add custom background function
    */
    $default_background = array(
    'default-color' => '#e8e8e8',
    );
    add_theme_support( 'custom-background', $default_background );

    /*
    * Add menu to theme
    */
    register_nav_menu ( 'primary-menu', __('Primary Menu', 'advanced-theme') );

    /*
    * create sidebar to theme
    */
    $sidebar = array(
    'name'          => __('Primary Sidebar', 'advanced-theme'),
    'id'            => 'main-sidebar',
    'description'   => 'Primary sidebar of Advanced Theme',
    'class'         => 'advanced-theme-sidebar main-sidebar',
    'before_title'  => '<h3 class="advanced-theme-sidebar-title widgettitle">',
    'after_title'   => '</h3>'
    );

    register_sidebar( $sidebar );
    }

    add_action('after_setup_theme', 'advancedThemeSetup');
  }

if (! function_exists( 'advancedThemeLogo' )) {
    /**
     * Theme logo function
     **/
    function advancedThemeLogo() {?>
        <div class="logo_container logo_global">
        <?php if ( is_home() ) {
            printf('<div class="logo-content">
                <h1 class="logo"><a id="logo-link" class="logo-link" href="%1$s" title="%2$s"></a></h1></div>',
                get_bloginfo( 'url' ),
                get_bloginfo( 'description' )
            );
            printf('<div class="site-info-content">
                <h1 class="site-title"><a id="site-link" class="site-link" href="%1$s" title="%2$s">%3$s</a></h1>
                <p class="site-tagline">%4$s</p></div>',
                get_bloginfo( 'url' ),
                get_bloginfo( 'name' ),
                get_bloginfo( 'name' ),
                get_bloginfo( 'description' )
            );
        } else {
            printf('<div class="logo-content">
                <p class="logo"><a id="logo-link" class="logo-link" href="%1$s" title="%2$s"></a></p></div>',
                get_bloginfo( 'url' ),
                get_bloginfo( 'description' )
            );
            printf('<div class="site-info-content">
                <p class="site-title"><a id="site-link" class="site-link" href="%1$s" title="%2$s">%3$s</a></p>
                <p class="site-tagline">%4$s</p></div>',
                get_bloginfo( 'url' ),
                get_bloginfo( 'name' ),
                get_bloginfo( 'name' ),
                get_bloginfo( 'description' )
            );
        } ?>
        </div>
    <?php }
}

 if ( ! function_exists( 'advancedThemeMenu' ) ) {
     /**
     * Theme menu function
      **/
     function advancedThemeMenu( $slug ) {
         $menu = array(
            'theme_location' => $slug,
            'container' => 'nav',
            'container_class' => $slug . ' advanced-theme-container-menu',
            'items_wrap'      => '<ul id="%1$s" class="%2$s sf-menu advanced-theme-menu">%3$s</ul>',
         );
         wp_nav_menu( $menu );
     }
 }

if ( ! function_exists( 'advancedThemePagination' ) ) {
    /**
    * Divide pagination of theme.
    * Type: Newer Posts & Older Posts
    * advancedThemePagination()
    **/
    function advancedThemePagination() {
        /*
         * Return blank if < 2
         */
        if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
            return '';
        }
        ?>

        <nav class="pagination" role="navigation">
        <?php if ( get_next_post_link() ) : ?>
            <div class="prev"><?php next_posts_link( __('Older Posts', 'advanced-theme') ); ?></div>
        <?php endif; ?>

        <?php if ( get_previous_post_link() ) : ?>
            <div class="next"><?php previous_posts_link( __('Newer Posts', 'advanced-theme') ); ?></div>
        <?php endif; ?>

        </nav><?php
    }
}

if (!function_exists('advancedThemePostThumbnail')) {
    /**
     * Function get thumbnail
     *
     * @return void
     */
    function advancedThemePostThumbnail()
    {
        if (post_password_required() || is_attachment()) {
            return;
        }

        if (is_singular()) :
            ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail('thumbnail') ?>
            </div>
        <?php else :
            ?>
            <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
                <?php
                the_post_thumbnail('post-thumbnail', array('alt' => get_the_title()));
                ?>
            </a>

        <?php endif;
    }
}

if ( ! function_exists( 'advancedThemeEntryHeader' ) ) {
    /**
    * Show post's title of the post functions
    * post's title will display in the entry-title
    * else ...
    * advancedThemeEntryHeader()
    **/
    function advancedThemeEntryHeader() {
        if ( is_single() ) : ?>
            <h1 class="entry-title"><a class="post-link" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
    <?php else : ?>
            <h2 class="entry-title"><a class="post-link" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
        <?php
    endif;
    }
}

if ( ! function_exists( 'advancedThemeEntryContent' ) ) {
    /**
    * This function show content of the post
    * show excerpt (the_excerpt)
    * its show ...
    * advancedThemeEntryContent()
    **/
    function advancedThemeEntryContent() {
        if ( !is_single() && !is_page() ) :
            the_excerpt();
        else :
            the_content();

            // Show pagination
            $link_pages = array(
                'before' => __('<p>Page:', 'advanced-theme'),
                'after' => '</p>',
                'nextpagelink' => __( 'Next page', 'advanced-theme' ),
                'previouspagelink' => __( 'Previous page', 'advanced-theme' )
            );
            wp_link_pages( $link_pages );
        endif;
    }
}

if ( ! function_exists( 'advancedThemeEntryTag' ) ) {
    /**
     * Show tags
     * advancedThemeEntryTag()
     **/
    function advancedThemeEntryTag() {
        if ( has_tag() ) :
            echo '<div class="entry-tag">';
                printf( __('Tagged in %1$s', 'advanced-theme'), get_the_tag_list( '', ', ' ) );
            echo '</div>';
        endif;
    }
}

if (!function_exists('advancedThemeEntryMeta')) {
    /**
     * Function add entry meta
     *
     * @return void
     */
    function advancedThemeEntryMeta()
    {
        if (!is_page()) {
            echo '<div class="entry-meta-content">';

            the_tags('Tagged with: ', ' • ', '<br />');

            //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- output html not escaping
            printf(__('<span class="author">Posted by %1$s</span>', 'advanced-theme'), get_the_author());
            //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- output html not escaping
            printf(__('<span class="date-published"> %1$s</span>', 'advanced-theme'), get_the_date());
            //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- output html not escaping
            printf(__('<span class="category"> %1$s</span>', 'advanced-theme'), get_the_category_list(', '));
            echo ' <span class="meta-reply">';
            comments_popup_link(
                __('Leave a comment', 'advanced-theme'),
                __('One comment', 'advanced-theme'),
                __('% comments', 'advanced-theme'),
                'advanced-theme-comments',
                __('Comments Off', 'advanced-theme')
            );
            echo '</span>';

            echo '</div>';
        }
    }
}

if (!function_exists('advancedThemeComment')) {
    /**
     * Template for comments and ping_backs.
     * Used as a callback by wp_list_comments() for displaying the comments.
     *
     * @param array  $comment Data comment
     * @param array  $args    Args
     * @param string $depth   Comment lever
     *
     * @return void
     */
    function advancedThemeComment($comment, $args, $depth)
    {
        // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
        $GLOBALS['comment'] = $comment;
        switch ($comment->comment_type) {
            case 'pingback':
            case 'trackback':
                ?>
                <li class="post pingback">
                <p><?php esc_attr_e('Pingback:', 'advanced-theme'); ?><?php comment_author_link(); ?><?php edit_comment_link(__('Edit', 'advanced-theme'), '<span class="edit-link">', '<span>'); ?></p>
                <?php
                break;
            default:
                ?>
            <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <article id="comment-<?php comment_ID(); ?>" class="comment-inner">

                    <div class="flex-row align-top">
                        <div class="flex-col">
                            <div class="comment-author mr-half">
                                <?php echo get_avatar($comment, 70); ?>
                            </div>
                        </div><!-- .large-3 -->

                        <div class="flex-col flex-grow">
                            <?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- already escaped
                            printf(__('%s <span class="says">says:</span>', 'advanced-theme'), sprintf('<cite class="strong fn">%s</cite>', get_comment_author_link())); ?>
                            <?php if ((int)$comment->comment_approved === 0) : ?>
                                <em><?php esc_attr_e('Your comment is awaiting moderation.', 'advanced-theme'); ?></em>
                                <br/>
                            <?php endif; ?>

                            <div class="comment-content"><?php comment_text(); ?></div>


                            <div class="comment-meta commentmetadata uppercase is-xsmall clear">
                                <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                                    <time datetime="<?php comment_time('c'); ?>" class="pull-left">
                                        <?php
                                        // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- already escaped
                                        printf(_x('%1$s at %2$s', '1: date, 2: time', 'advanced-theme'), get_comment_date(), get_comment_time());
                                        ?>
                                    </time>
                                </a>
                                <?php edit_comment_link(__('Edit', 'advanced-theme'), '<span class="edit-link ml-half strong">', '<span>'); ?>

                                <div class="reply pull-right">
                                    <?php
                                    comment_reply_link(array_merge($args, array(
                                        'depth'     => $depth,
                                        'max_depth' => $args['max_depth'],
                                    )));
                                    ?>
                                </div><!-- .reply -->
                            </div><!-- .comment-meta .commentmetadata -->

                        </div><!-- .flex-col -->
                    </div><!-- .flex-row -->
                </article>
                <!-- #comment -->

                <?php
                break;
        };
    }
}

if (!function_exists('advancedThemeGetCommentForm')) {
    /**
     * Function echo form comment
     *
     * @return void
     */
    function advancedThemeGetCommentForm()
    {
        $args = array(
            'id_form' => 'advanced_theme_form_comment',
            'id_submit' => 'advanced_theme_submit_comment',
            'comment_notes_before' => '',
            'comment_field' => '<p class="comment-form-comment"><textarea id="comment_textarea" class="form-control" name="comment" placeholder="Comment" cols="45" rows="8"  aria-required="true" required="required"></textarea></p>',
            'title_reply_before' => '<h5 id="reply-title" class="comment-reply-title">',
            'title_reply_after' => '</h5>',
        );

        echo esc_attr(comment_form($args));
    }
}

if (!function_exists('advancedThemeWidgets')) {
    /**
     * Function add widgets footer
     *
     * @param string $position Position widgets
     *
     * @return void
     */
    function advancedThemeWidgets($position)
    {
        if ($position === 'footer') {
            /* The footer widget area is triggered if any of the areas
            * have widgets. So let's check that first.
            *
            * If none of the sidebars have widgets, then let's bail early.
            */
            if (!is_active_sidebar('first-footer-widget-area')
                && !is_active_sidebar('second-footer-widget-area')
                && !is_active_sidebar('third-footer-widget-area')
                && !is_active_sidebar('fourth-footer-widget-area')
            ) {
                return;
            } ?>
            <aside class="fatfooter" role="complementary">
                <?php
                if (is_active_sidebar('first-footer-widget-area')) : ?>
                    <div class="first quarter left widget-area">
                        <?php dynamic_sidebar('first-footer-widget-area'); ?>
                    </div><!-- .first .widget-area -->
                <?php endif;
                if (is_active_sidebar('second-footer-widget-area')) : ?>
                    <div class="second quarter widget-area">
                        <?php dynamic_sidebar('second-footer-widget-area'); ?>
                    </div><!-- .second .widget-area -->
                <?php endif;
                if (is_active_sidebar('third-footer-widget-area')) : ?>
                    <div class="third quarter widget-area">
                        <?php dynamic_sidebar('third-footer-widget-area'); ?>
                    </div><!-- .third .widget-area -->
                <?php endif;
                if (is_active_sidebar('fourth-footer-widget-area')) : ?>
                    <div class="fourth quarter right widget-area">
                        <?php dynamic_sidebar('fourth-footer-widget-area'); ?>
                    </div><!-- .fourth .widget-area -->
                <?php endif; ?>
            </aside><!-- #fatfooter -->
            <?php
        } elseif ($position === 'header') {
            if (!is_active_sidebar('header-widget-area')) {
                return;
            }
            ?>
            <div id="header-widget-area" class="full-width widget-area">
                <?php dynamic_sidebar('header-widget-area'); ?>
            </div><!-- .widget-area -->
            <?php
        }
    }
}

if (!function_exists('advancedThemeWidgetsInit')) {
    /**
     * Function create widgets footer
     *
     * @return void
     */
    function advancedThemeWidgetsInit()
    {
        // First footer widget area.
        register_sidebar(array(
            'name' => __('First Footer Widget Area', 'advanced-theme'),
            'id' => 'first-footer-widget-area',
            'description' => __('The first footer widget area', 'advanced-theme'),
            'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));

        // Second Footer Widget Area.
        register_sidebar(array(
            'name' => __('Second Footer Widget Area', 'advanced-theme'),
            'id' => 'second-footer-widget-area',
            'description' => __('The second footer widget area', 'advanced-theme'),
            'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));

        // Third Footer Widget Area, located in the footer. Empty by default.
        register_sidebar(array(
            'name' => __('Third Footer Widget Area', 'advanced-theme'),
            'id' => 'third-footer-widget-area',
            'description' => __('The third footer widget area', 'advanced-theme'),
            'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));

        // Fourth Footer Widget Area, located in the footer. Empty by default.
        register_sidebar(array(
            'name' => __('Fourth Footer Widget Area', 'advanced-theme'),
            'id' => 'fourth-footer-widget-area',
            'description' => __('The fourth footer widget area', 'advanced-theme'),
            'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
    }

    add_action('widgets_init', 'advancedThemeWidgetsInit');
}

if (!function_exists('advancedThemeAssets')) {
    /**
    * Add CSS and Javascript to the Theme
    * Use hook wp_enqueue_scripts() to show them on the front-end
    **/
    function advancedThemeAssets() {
        wp_register_style( 'main-style', get_template_directory_uri() . '/assets/css/style.css', 'all' );
        wp_enqueue_style( 'main-style' );

        wp_register_style( 'superfish-css', get_template_directory_uri() . '/assets/css/superfish.css', 'all' );
        wp_enqueue_style( 'superfish-css' );

        wp_register_script( 'superfish-js', get_template_directory_uri() . '/assets/js/superfish.js', array('jquery') );
        wp_enqueue_script( 'superfish-js' );

        wp_register_script( 'custom-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery') );
        wp_enqueue_script( 'custom-js' );

        wp_register_script( 'advanced-theme-script-js', get_template_directory_uri() . '/assets/js/script.js', array('jquery') );
        wp_enqueue_script( 'advanced-theme-script-js' );
    }
    add_action( 'wp_enqueue_scripts', 'advancedThemeAssets' );
}

if (! function_exists('advancedThemeCustomizeOption')) {
    /**
    * Add all customize option to theme
    * advancedThemeCustomizeOption()
     **/
    function advancedThemeCustomizeOption() {
        require_once CORE . '/advanced-theme-customize-option.php';
        // Setup the Theme Customizer settings and controls...
        add_action( 'customize_register' , array( 'MyTheme_Customize' , 'register' ) );

        // Output custom CSS to live site
        add_action( 'wp_head' , array( 'MyTheme_Customize' , 'header_output' ) );

        // Enqueue live preview javascript in Theme Customizer admin screen
        add_action( 'customize_preview_init' , array( 'MyTheme_Customize' , 'live_preview' ) );
    }
}
add_action('init', 'advancedThemeCustomizeOption');

// Call ajax func when save theme options
if (!function_exists('advancedThemeOptionSettingCallback')) {
    /**
     * Function save custom css
     *
     * @return void
     */
    function advancedThemeOptionSettingCallback()
    {
        $response = array();
        if (isset($_POST['customized'], $_POST['option_nonce'], $_POST['option_name'])
            && wp_verify_nonce(sanitize_key($_POST['option_nonce']), 'option_nonce')
        ) {
            $customized  = $_POST['customized'];
            $option_name = $_POST['option_name'];
        } else {
            $option_name = 'advanced_theme_option';
            $customized  = array('customCss' => '', 'customHead' => '', 'customBody' => '');
        }

        $optionVal = get_option($option_name);
        if (!isset($optionVal) || $optionVal === '') {
            $optionVal = array();
        }
        $optionVal['check_customize'] = 1;
        if (isset($customized)) {
            $optionVal = array_merge($optionVal, $customized);
            update_option($option_name, $optionVal);
        }

        $response['optionVal'] = $optionVal;
        wp_send_json($response);
    }

    add_action('wp_ajax_theme_option_setting', 'advancedThemeOptionSettingCallback');
}

if (!function_exists('advancedThemeOptionDefaultCallback')) {
    /**
     * Function restore default settings
     *
     * @return void
     */
    function advancedThemeOptionDefaultCallback() {
        $optionName  = (isset($_POST['option_name'])) ? $_POST['option_name'] : '';
        $themeFolder = (isset($_POST['theme_folder'])) ? $_POST['theme_folder'] : '';
        $optionNonce = (isset($_POST['option_nonce'])) ? $_POST['option_nonce'] : '';
        $optionSetting = 'theme_mods_' . $themeFolder;
        if ($optionNonce === '') {
            exit();
        }

        if (!class_exists('advancedDefaultTheme')) {
            $defaultThemePath = THEME_DIR . '/includes/default-option-theme.php';
            require_once $defaultThemePath;
        }

        $defaultTheme = new advancedDefaultTheme();
        $defaultCustomizeSettings = $defaultTheme->defaultCustomizerValues();
        $defaultThemeSettings = $defaultTheme->defaultThemeOptionSettings();

        $customizeSettings = get_option($optionSetting);
        $themeOptionSettings = get_option($optionName);
        if ($customizeSettings === false || is_null($customizeSettings)) {
            $customizeSettings = array();
        }
        if ($themeOptionSettings === false || is_null($themeOptionSettings)) {
            $themeOptionSettings = array();
        }

        // Default values for Customize
        if (!empty($customizeSettings)) {
            $customizeResults = array_replace($customizeSettings, $defaultCustomizeSettings);
            update_option($optionSetting, $customizeResults);
        } else {
            update_option($optionSetting, $defaultCustomizeSettings);
        }

        // Default values for Theme Options
        if (!empty($themeOptionSettings)) {
            $themeOptionResults = array_replace($themeOptionSettings, $defaultThemeSettings);
            update_option($optionName, $themeOptionResults);
        } else {
            update_option($optionName, $defaultThemeSettings);
        }

        wp_send_json(array('success' => true, 'message' => 'Reset done!'));
    }

    add_action('wp_ajax_theme_option_default', 'advancedThemeOptionDefaultCallback');
}

if (!function_exists('advancedThemeCustomPostsPerPage')) {
    /**
     * Function custom posts per page
     *
     * @param boolean $query Query
     *
     * @return void
     */
    function advancedThemeCustomPostsPerPage($query = false)
    {
        if (is_admin()) {
            return;
        }

        if (!is_a($query, 'WP_Query') || !$query->is_main_query()) {
            return;
        }
        if (!class_exists('advancedDefaultTheme')) {
            $defaultThemePath = THEME_DIR . '/includes/default-option-theme.php';
            require_once $defaultThemePath;
        }

        $defaultTheme    = new advancedDefaultTheme();
        $defaultSettings = $defaultTheme->defaultThemeOptionSettings();
        $customCss       = get_option('advanced_theme_option', $defaultSettings);

        if ($query->is_category) {
            $query->set('posts_per_page', isset($customCss['numberCat']) ? (int)$customCss['numberCat'] : 6);
        } elseif ($query->is_tag) {
            $query->set('posts_per_page', isset($customCss['numberTag']) ? (int)$customCss['numberTag'] : 5);
        } elseif ($query->is_search) {
            $query->set('posts_per_page', isset($customCss['numberSearch']) ? (int)$customCss['numberSearch'] : 5);
        } elseif ($query->is_archive) {
            $posts_number = isset($customCss['numberArchive']) ? (int)$customCss['numberArchive'] : 5;
            $query->set('posts_per_page', $posts_number);
        }
    }

    add_action('pre_get_posts', 'advancedThemeCustomPostsPerPage');
}

if (file_exists(CORE . '/seo_function.php')) {
    require_once(CORE . '/seo_function.php');
}