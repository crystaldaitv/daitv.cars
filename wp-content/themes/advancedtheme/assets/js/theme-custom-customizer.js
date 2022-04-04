/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ) {

    // Load menu logo
    wp.customize( 'advanced_theme_setting_load_menu_logo', function( value ) {
        value.bind( function( newval ) {
            if (newval === true) {
                $('.logo-content').show();
                $('.site-info-content').hide();
            } else {
                $('.logo-content').hide();
                $('.site-info-content').show();
            }
        } );
    } );

    // Logo image
    wp.customize( 'advanced_theme_setting_image_upload', function( value ) {
        value.bind( function( newval ) {
            $('#logo-link').css('background-image', 'url("' + newval + '")');
        } );
    } );

    // Logo width
    wp.customize( 'advanced_theme_setting_logo_width', function( value ) {
        value.bind( function( newval ) {
            $('#logo-link').css('width', newval + 'px');
        } );
    } );

    // Logo height
    wp.customize( 'advanced_theme_setting_logo_height', function( value ) {
        value.bind( function( newval ) {
            $('#logo-link').css('height', newval + 'px');
        } );
    } );

    // Background color
    wp.customize( 'advanced_theme_setting_background_color', function( value ) {
        value.bind( function( newval ) {
            $('body#wp_body_layout_home').css('background-image', 'url("' + newval + '")');
        } );
    } );

    // Background image
    wp.customize( 'advanced_theme_setting_background_image', function( value ) {
        value.bind( function( newval ) {
            $('body#wp_body_layout_home').css('background-image', 'url("' + newval + '")');
        } );
    } );

    // Site font size
    wp.customize( 'advanced_theme_setting_fontsize', function( value ) {
        value.bind( function( newval ) {
            $('body#wp_body_layout_home').css('font-size', newval + 'px' );
            $('#content').css('font-size', newval + 'px' );
            $('#sidebar').css('font-size', newval + 'px' );
        } );
    } );

    // Line height
    wp.customize( 'advanced_theme_setting_line_height', function( value ) {
        value.bind( function( newval ) {
            $('#page-container #main-content').css('line-height', newval + 'em' );
        } );
    } );

    // Heading font-size
    wp.customize( 'advanced_theme_setting_header_text_size', function( value ) {
        value.bind( function( newval ) {
            $('h1, h2, h3, h4, h5, h6').css('font-size', newval + 'rem' );
        } );
    } );

    // Heading letter spacing
    wp.customize( 'advanced_theme_setting_header_letter_spacing', function( value ) {
        value.bind( function( newval ) {
            $('h1, h2, h3, h4, h5, h6').css('letter-spacing', newval + 'px' );
        } );
    } );

    // Heading line height
    wp.customize( 'advanced_theme_setting_header_line_height', function( value ) {
        value.bind( function( newval ) {
            $('h1:not(.site-name-header), h2:not(.site-name-header), h3, h4, h5, h6').css('line-height', newval + 'em' );
        } );
    } );

    // Body link color
    wp.customize( 'advanced_theme_setting_body_link_color', function( value ) {
        value.bind( function( newval ) {
            $('article p:not(.post-meta) a, .comment-edit-link, .pinglist a, .pagination a, a:not(.site-title-link):not(.post-link):not(.advanced-theme-menu-link)').css('color', newval );
        } );
    } );

    // Body text color
    wp.customize( 'advanced_theme_setting_body_text_color', function( value ) {
        value.bind( function( newval ) {
            $('body #page-container').css('color', newval );
        } );
    } );

    // Header text color
    wp.customize( 'advanced_theme_setting_header_text_color', function( value ) {
        value.bind( function( newval ) {
            $('#page-container h1, #page-container h2, #page-container h3, #page-container h4, #page-container h5, #page-container h6, #page-container .post-link').css('color', newval );
        } );
    } );

    // Header font-style
    wp.customize( 'advanced_theme_setting_body_header_font_style', function( value ) {
        value.bind( function( newval ) {
            var list =  newval.split('|');
            if ($.inArray('Bold', list) != -1) {
                $('#page-container h1, #page-container h2, #page-container h3, #page-container h4, #page-container h5, #page-container h6, #page-container .post-link').css('font-weight', 'bold' );
            } else {
                $('#page-container h1, #page-container h2, #page-container h3, #page-container h4, #page-container h5, #page-container h6, #page-container .post-link').css('font-weight', 'initial' );
            }

            if ($.inArray('Italic', list) != -1) {
                $('#page-container h1, #page-container h2, #page-container h3, #page-container h4, #page-container h5, #page-container h6, #page-container .post-link').css('font-style', 'italic' );
            } else {
                $('#page-container h1, #page-container h2, #page-container h3, #page-container h4, #page-container h5, #page-container h6, #page-container .post-link').css('font-style', 'initial' );
            }

            if ($.inArray('Uppercase', list) != -1) {
                $('#page-container h1, #page-container h2, #page-container h3, #page-container h4, #page-container h5, #page-container h6, #page-container .post-link').css('text-transform', 'uppercase' );
            } else {
                $('#page-container h1, #page-container h2, #page-container h3, #page-container h4, #page-container h5, #page-container h6, #page-container .post-link').css('text-transform', 'lowercase' );
            }

            if ($.inArray('Underline', list) != -1) {
                $('#page-container h1, #page-container h2, #page-container h3, #page-container h4, #page-container h5, #page-container h6, #page-container .post-link').css('text-decoration', 'underline' );
            } else {
                $('#page-container h1, #page-container h2, #page-container h3, #page-container h4, #page-container h5, #page-container h6, #page-container .post-link').css('text-decoration', 'initial' );
            }
        } );
    } );

    wp.customize( 'advanced_theme_setting_content_width', function( value ) {
        value.bind( function( newval ) {
            $('body #page-container').css('width', newval + '%' );
        } );
    } );

    wp.customize( 'advanced_theme_setting_load_sidebar', function( value ) {
        value.bind( function( newval ) {
            if (newval === true) {
                $('#sidebar').css('display', '' );
            } else {
                $('#sidebar').css('display', 'none' );
            }
        } );
    } );

    // Header & Menu generate
    wp.customize( 'advanced_theme_setting_menu_height', function( value ) {
        value.bind( function( newval ) {
            $('#page-header .advanced-theme-menu').css('height', newval + 'px' );
        } );
    } );

    wp.customize( 'advanced_theme_setting_menu_text_size', function( value ) {
        value.bind( function( newval ) {
            $('#page-header .advanced-theme-menu a').css('font-size', newval + 'px' );
        } );
    } );

    wp.customize( 'advanced_theme_setting_menu_link_font_style', function( value ) {
        value.bind( function( newval ) {
            var list =  newval.split('|');
            if ($.inArray('Bold', list) != -1) {
                $('#page-header .advanced-theme-menu a').css('font-weight', 'bold' );
            } else {
                $('#page-header .advanced-theme-menu a').css('font-weight', 'initial' );
            }

            if ($.inArray('Italic', list) != -1) {
                $('#page-header .advanced-theme-menu a').css('font-style', 'italic' );
            } else {
                $('#page-header .advanced-theme-menu a').css('font-style', 'initial' );
            }

            if ($.inArray('Uppercase', list) != -1) {
                $('#page-header .advanced-theme-menu a').css('text-transform', 'uppercase' );
            } else {
                $('#page-header .advanced-theme-menu a').css('text-transform', 'lowercase' );
            }

            if ($.inArray('Underline', list) != -1) {
                $('#page-header .advanced-theme-menu a').css('text-decoration', 'underline' );
            } else {
                $('#page-header .advanced-theme-menu a').css('text-decoration', 'initial' );
            }
        } );
    } );

    wp.customize( 'advanced_theme_setting_menu_header_color', function( value ) {
        value.bind( function( newval ) {
            $('#page-header .advanced-theme-menu a').css('color', newval );
        } );
    } );

    wp.customize( 'advanced_theme_setting_menu_active_link_color', function( value ) {
        value.bind( function( newval ) {
            $('#page-header .advanced-theme-menu a:active').css('color', newval );
        } );
    } );

    wp.customize( 'advanced_theme_setting_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            $('#page-header .advanced-theme-menu').css('background-color', newval );
        } );
    } );

    wp.customize( 'advanced_theme_setting_sub_menu_text_size', function( value ) {
        value.bind( function( newval ) {
            $('#page-header .advanced-theme-menu .sub-menu li a').css('font-size', newval + 'px' );
        } );
    } );

    wp.customize( 'advanced_theme_setting_sub_menu_border_top', function( value ) {
        value.bind( function( newval ) {
            $('#page-header .advanced-theme-menu .sub-menu').css('border-top-width', newval + 'px' );
        } );
    } );

    wp.customize( 'advanced_theme_setting_sub_menu_dropdown_width', function( value ) {
        value.bind( function( newval ) {
            $('#page-header .advanced-theme-menu .sub-menu').css('width', newval + 'px' );
        } );
    } );

    wp.customize( 'advanced_theme_setting_sub_menu_background_color', function( value ) {
        value.bind( function( newval ) {
            $('#page-header .advanced-theme-menu .sub-menu').css('background-color', newval );
        } );
    } );

    wp.customize( 'advanced_theme_setting_sub_menu_background_color_hover', function( value ) {
        value.bind( function( newval ) {
            $('#page-header .advanced-theme-menu .sub-menu:hover').css('background-color', newval );
        } );
    } );

    wp.customize( 'advanced_theme_setting_sub_menu_border_top_color', function( value ) {
        value.bind( function( newval ) {
            $('#page-header .advanced-theme-menu .sub-menu').css('border-top-color', newval );
        } );
    } );

    wp.customize( 'advanced_theme_setting_sub_menu_text_color', function( value ) {
        value.bind( function( newval ) {
            $('#page-header .advanced-theme-menu .sub-menu li a').css('color', newval );
        } );
    } );

    // Sidebar generate
    wp.customize( 'advanced_theme_setting_sidebar_width', function( value ) {
        value.bind( function( newval ) {
            $('#sidebar').css('width', newval + '%' );
        } );
    } );

    wp.customize( 'advanced_theme_setting_sidebar_background_color', function( value ) {
        value.bind( function( newval ) {
            $('#sidebar').css('background-color', newval );
        } );
    } );

    wp.customize( 'advanced_theme_setting_sidebar_link_color', function( value ) {
        value.bind( function( newval ) {
            $('#sidebar a').css('color', newval );
        } );
    } );

    wp.customize( 'advanced_theme_setting_sidebar_header_color', function( value ) {
        value.bind( function( newval ) {
            $('#sidebar h1, #sidebar h2, #sidebar h3, #sidebar h4, #sidebar h5, #sidebar h6').css('color', newval );
        } );
    } );

    wp.customize( 'advanced_theme_setting_sidebar_text_color', function( value ) {
        value.bind( function( newval ) {
            $('#sidebar p, #sidebar span').css('color', newval );
        } );
    } );

    // Sidebar Header font-style
    wp.customize( 'advanced_theme_setting_sidebar_header_font_style', function( value ) {
        value.bind( function( newval ) {
            var list =  newval.split('|');
            if ($.inArray('Bold', list) != -1) {
                $('#sidebar h1, #sidebar h2, #sidebar h3, #sidebar h4, #sidebar h5, #sidebar h6, #sidebar .post-link').css('font-weight', 'bold' );
            } else {
                $('#sidebar h1, #sidebar h2, #sidebar h3, #sidebar h4, #sidebar h5, #sidebar h6, #sidebar .post-link').css('font-weight', 'initial' );
            }

            if ($.inArray('Italic', list) != -1) {
                $('#sidebar h1, #sidebar h2, #sidebar h3, #sidebar h4, #sidebar h5, #sidebar h6, #sidebar .post-link').css('font-style', 'italic' );
            } else {
                $('#sidebar h1, #sidebar h2, #sidebar h3, #sidebar h4, #sidebar h5, #sidebar h6, #sidebar .post-link').css('font-style', 'initial' );
            }

            if ($.inArray('Uppercase', list) != -1) {
                $('#sidebar h1, #sidebar h2, #sidebar h3, #sidebar h4, #sidebar h5, #sidebar h6, #sidebar .post-link').css('text-transform', 'uppercase' );
            } else {
                $('#sidebar h1, #sidebar h2, #sidebar h3, #sidebar h4, #sidebar h5, #sidebar h6, #sidebar .post-link').css('text-transform', 'lowercase' );
            }

            if ($.inArray('Underline', list) != -1) {
                $('#sidebar h1, #sidebar h2, #sidebar h3, #sidebar h4, #sidebar h5, #sidebar h6, #sidebar .post-link').css('text-decoration', 'underline' );
            } else {
                $('#sidebar h1, #sidebar h2, #sidebar h3, #sidebar h4, #sidebar h5, #sidebar h6, #sidebar .post-link').css('text-decoration', 'initial' );
            }
        } );
    } );

    // Footer Setting Render
    wp.customize( 'advanced_theme_setting_footer_setting_top_padding', function( value ) {
        value.bind( function( newval ) {
            $('#wp_body_layout_home #footer-bottom').css('padding-top', newval + 'px' );
        } );
    } );

    wp.customize( 'advanced_theme_setting_footer_setting_bottom_padding', function( value ) {
        value.bind( function( newval ) {
            $('#wp_body_layout_home #footer-bottom').css('padding-bottom', newval + 'px' );
        } );
    } );

    wp.customize( 'advanced_theme_setting_footer_setting_background_color', function( value ) {
        value.bind( function( newval ) {
            $('#wp_body_layout_home #page-footer').css('background-color', newval );
        } );
    } );

    wp.customize( 'advanced_theme_setting_footer_custom_credits', function( value ) {
        value.bind( function( newval ) {
            $('#page-copyright').empty();
            $('#page-copyright').append( newval );
        } );
    } );

    wp.customize( 'advanced_theme_setting_footer_setting_copyright_color', function( value ) {
        value.bind( function( newval ) {
            $('#page-copyright').css('color', newval );
        } );
    } );

    wp.customize( 'advanced_theme_setting_footer_setting_copyright_line_height', function( value ) {
        value.bind( function( newval ) {
            $('#page-copyright').css('line-height', newval );
        } );
    } );

    wp.customize( 'advanced_theme_setting_footer_setting_widget_header_size', function( value ) {
        value.bind( function( newval ) {
            $('#footer-widgets h1, #footer-widgets h2, #footer-widgets h3, #footer-widgets h4, #footer-widgets h5, #footer-widgets h6').css('font-size', newval + 'px' );
        } );
    } );

    wp.customize( 'advanced_theme_setting_footer_setting_header_font_style', function( value ) {
        value.bind( function( newval ) {
            var list =  newval.split('|');
            if ($.inArray('Bold', list) != -1) {
                $('#footer-widgets h1, #footer-widgets h2, #footer-widgets h3, #footer-widgets h4, #footer-widgets h5, #footer-widgets h6').css('font-weight', 'bold' );
            } else {
                $('#footer-widgets h1, #footer-widgets h2, #footer-widgets h3, #footer-widgets h4, #footer-widgets h5, #footer-widgets h6').css('font-weight', 'initial' );
            }

            if ($.inArray('Italic', list) != -1) {
                $('#footer-widgets h1, #footer-widgets h2, #footer-widgets h3, #footer-widgets h4, #footer-widgets h5, #footer-widgets h6').css('font-style', 'italic' );
            } else {
                $('#footer-widgets h1, #footer-widgets h2, #footer-widgets h3, #footer-widgets h4, #footer-widgets h5, #footer-widgets h6').css('font-style', 'initial' );
            }

            if ($.inArray('Uppercase', list) != -1) {
                $('#footer-widgets h1, #footer-widgets h2, #footer-widgets h3, #footer-widgets h4, #footer-widgets h5, #footer-widgets h6').css('text-transform', 'uppercase' );
            } else {
                $('#footer-widgets h1, #footer-widgets h2, #footer-widgets h3, #footer-widgets h4, #footer-widgets h5, #footer-widgets h6').css('text-transform', 'lowercase' );
            }

            if ($.inArray('Underline', list) != -1) {
                $('#footer-widgets h1, #footer-widgets h2, #footer-widgets h3, #footer-widgets h4, #footer-widgets h5, #footer-widgets h6').css('text-decoration', 'underline' );
            } else {
                $('#footer-widgets h1, #footer-widgets h2, #footer-widgets h3, #footer-widgets h4, #footer-widgets h5, #footer-widgets h6').css('text-decoration', 'initial' );
            }
        } );
    } );

    wp.customize( 'advanced_theme_setting_footer_setting_widget_text_size', function( value ) {
        value.bind( function( newval ) {
            $('body #footer-bottom').css('font-size', newval + 'em' );
        } );
    } );

    wp.customize( 'advanced_theme_setting_footer_setting_widget_line_height', function( value ) {
        value.bind( function( newval ) {
            $('body #footer-bottom').css('line-height', newval + 'em' );
        } );
    } );

    wp.customize( 'advanced_theme_setting_footer_setting_widget_text_style', function( value ) {
        value.bind( function( newval ) {
            var list =  newval.split('|');
            if ($.inArray('Bold', list) != -1) {
                $('#footer-bottom').css('font-weight', 'bold' );
            } else {
                $('#footer-bottom').css('font-weight', 'initial' );
            }

            if ($.inArray('Italic', list) != -1) {
                $('#footer-bottom').css('font-style', 'italic' );
            } else {
                $('#footer-bottom').css('font-style', 'initial' );
            }

            if ($.inArray('Uppercase', list) != -1) {
                $('#footer-bottom').css('text-transform', 'uppercase' );
            } else {
                $('#footer-bottom').css('text-transform', 'lowercase' );
            }

            if ($.inArray('Underline', list) != -1) {
                $('#footer-bottom').css('text-decoration', 'underline' );
            } else {
                $('#footer-bottom').css('text-decoration', 'initial' );
            }
        } );
    } );

    wp.customize( 'advanced_theme_setting_footer_setting_widget_text_color', function( value ) {
        value.bind( function( newval ) {
            $('body #footer-bottom').css('color', newval );
        } );
    } );

    wp.customize( 'advanced_theme_setting_footer_setting_widget_link_color', function( value ) {
        value.bind( function( newval ) {
            $('body #footer-bottom a').css('color', newval );
        } );
    } );

    wp.customize( 'advanced_theme_setting_footer_setting_widget_header_color', function( value ) {
        value.bind( function( newval ) {
            $('#footer-widgets h1, #footer-widgets h2, #footer-widgets h3, #footer-widgets h4, #footer-widgets h5, #footer-widgets h6').css('color', newval );
        } );
    } );

    // Blog Post Render

    wp.customize( 'advanced_theme_setting_display_author', function( value ) {
        value.bind( function( newval ) {
            if (newval === true) {
                $('.entry-meta .author').css('display', 'inline-block' );
            } else {
                $('.entry-meta .author').css('display', 'none' );
            }
        } );
    } );

    wp.customize( 'advanced_theme_setting_display_date', function( value ) {
        value.bind( function( newval ) {
            if (newval === true) {
                $('.entry-meta .date-published').css('display', 'inline-block' );
            } else {
                $('.entry-meta .date-published').css('display', 'none' );
            }
        } );
    } );

    wp.customize( 'advanced_theme_setting_display_category', function( value ) {
        value.bind( function( newval ) {
            if (newval === true) {
                $('.entry-meta .category').css('display', 'inline-block' );
            } else {
                $('.entry-meta .category').css('display', 'none' );
            }
        } );
    } );

    wp.customize( 'advanced_theme_setting_display_comments', function( value ) {
        value.bind( function( newval ) {
            if (newval === true) {
                $('.entry-meta .meta-reply').css('display', 'inline-block' );
            } else {
                $('.entry-meta .meta-reply').css('display', 'none' );
            }
        } );
    } );

} )( jQuery );