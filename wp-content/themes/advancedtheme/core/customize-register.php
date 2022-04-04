<?php
defined('ABSPATH') || die;

/* ------------------------------------------------ REMOVE SECTION ------------------------------------------------ */

$wp_customize->remove_section('colors');
$wp_customize->remove_section('background_image');

/* ------------------------------------------------ LOGO & TITLE SECTION ------------------------------------------------ */

$wp_customize->add_section('title_tagline', array(
    'title'       => esc_html__('Logo & Title', 'advanced-theme'),
    'description' => 'Logo & Title',
    'priority'    => 1,
));

$wp_customize->add_setting( 'advanced_theme_setting_load_menu_logo',
    array(
        'default'    => true,
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control('advanced_theme_control_load_menu_logo',
    array(
        'label'      => __( 'Use Logo', 'advanced-theme' ),
        'type'       => 'checkbox',
        'settings'   => 'advanced_theme_setting_load_menu_logo',
        'section'    => 'title_tagline',
    )
);

$wp_customize->add_setting('advanced_theme_setting_sticky_image_upload',
    array(
        'default'    => get_template_directory_uri() . '/assets/images/logo.png',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'advanced_theme_control_sticky_image_upload',
        array(
            'label'    => esc_html__('Sticky Logo Image', 'advanced-theme'),
            'section'  => 'title_tagline',
            'settings' => 'advanced_theme_setting_sticky_image_upload'
        )
    )
);

$wp_customize->add_setting('advanced_theme_setting_sticky_logo_width',
    array(
    'default'           => '70',
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
));

$wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'advanced_theme_control_sticky_logo_width', array(
    'type'     => 'range-value',
    'section'  => 'title_tagline',
    'settings' => 'advanced_theme_setting_sticky_logo_width',
    'label'    => esc_html__('Sticky Logo width:', 'advanced-theme'),
    'input_attrs' => array(
        'min'    => 1,
        'max'    => 700,
        'step'   => 1,
        'suffix' => 'px',
    ),
) ) );

$wp_customize->add_setting(
    'advanced_theme_setting_image_upload',
    array(
        'default'    => get_template_directory_uri() . '/assets/images/logo.png',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'advanced_theme_control_image_upload',
        array(
            'label'    => esc_html__('Logo Image', 'advanced-theme'),
            'section'  => 'title_tagline',
            'settings' => 'advanced_theme_setting_image_upload',
        )
    )
);

$wp_customize->add_setting('advanced_theme_setting_logo_width', array(
    'default'    => '90',
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
));

$wp_customize->add_control(
    new Customizer_Range_Value_Control( $wp_customize, 'advanced_theme_control_logo_width', array(
        'type'     => 'range-value',
        'section'  => 'title_tagline',
        'settings' => 'advanced_theme_setting_logo_width',
        'label'    => esc_html__('Logo Width:', 'advanced-theme'),
        'input_attrs' => array(
            'min'    => 1,
            'max'    => 500,
            'step'   => 1,
            'suffix' => 'px',
        ),
        ))
);

$wp_customize->add_setting('advanced_theme_setting_logo_height', array(
    'default'    => '50',
    'type'       => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport'  => 'postMessage',
));

$wp_customize->add_control(
    new Customizer_Range_Value_Control( $wp_customize, 'advanced_theme_control_logo_height', array(
        'type'     => 'range-value',
        'section'  => 'title_tagline',
        'settings' => 'advanced_theme_setting_logo_height',
        'label'    => esc_html__('Logo Height:', 'advanced-theme'),
        'input_attrs' => array(
            'min'    => 1,
            'max'    => 500,
            'step'   => 1,
            'suffix' => 'px',
        ),
        ))
);

/* ------------------------------------------------ BODY LAYOUTS SECTION ------------------------------------------------ */

$wp_customize->add_panel('advanced_theme_general_custom_settings', array(
    'title'    => esc_html__('General Settings', 'advanced-theme'),
    'priority' => 2,
));

$wp_customize->add_section( 'advanced_theme_layouts',
    array(
        'title'       => __( 'Layout Settings', 'advanced-theme' ),
        'priority'    => 1,
        'capability'  => 'edit_theme_options',
        'description' => __('Allows you to customize some example settings for Advanced-Theme.', 'advanced-theme'),
        'panel'       => 'advanced_theme_general_custom_settings',
    )
);

// Website Content Width (%)
$wp_customize->add_setting( 'advanced_theme_setting_content_width',
    array(
        'default'    => '90',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'advanced_theme_control_content_width', array(
    'type'     => 'range-value',
    'section'  => 'advanced_theme_layouts',
    'settings' => 'advanced_theme_setting_content_width',
    'label'    => __( 'Website Content Width (%)' ),
    'priority' => 1,
    'input_attrs' => array(
        'min'    => 50,
        'max'    => 100,
        'step'   => 1,
        'suffix' => '%', //optional suffix
    ),
) ) );

$wp_customize->add_setting( 'advanced_theme_setting_load_sidebar',
    array(
        'default'    => true,
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control('advanced_theme_control_load_sidebar',
    array(
        'label'      => __( 'Load Sidebar', 'advanced-theme' ),
        'type'       => 'checkbox',
        'settings'   => 'advanced_theme_setting_load_sidebar',
        'priority'   => 2,
        'section'    => 'advanced_theme_layouts',
    )
);


/* ------------------------------------------------ BODY BACKGROUND SECTION ------------------------------------------------ */

$wp_customize->add_section( 'advanced_theme_background',
    array(
        'title'       => __( 'Background', 'advanced-theme' ),
        'priority'    => 2,
        'capability'  => 'edit_theme_options',
        'description' => __('Allows you to customize some example settings for Advanced-Theme.', 'advanced-theme'),
        'panel'       => 'advanced_theme_general_custom_settings',
    )
);

$wp_customize->add_setting( 'advanced_theme_setting_background_color',
    array(
        'default'    => '#fafafa',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'advanced_theme_control_background_color',
    array(
        'label'      => __( 'Background Color', 'advanced-theme' ),
        'settings'   => 'advanced_theme_setting_background_color',
        'priority'   => 1,
        'section'    => 'advanced_theme_background',
    )
) );

$wp_customize->add_setting(
    'advanced_theme_setting_background_image',
    array(
        'default'   => '',
        'transport' => 'postMessage',
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'advanced_theme_control_background_image',
        array(
            'label'    => esc_html__('Background Image', 'advanced-theme'),
            'section'  => 'advanced_theme_background',
            'settings' => 'advanced_theme_setting_background_image',
        )
    )
);

/* ------------------------------------------------ BODY TYPOGRAPHY SECTION ------------------------------------------------ */

$wp_customize->add_section( 'advanced_theme_typography',
    array(
        'title'       => __( 'Typography', 'advanced-theme' ),
        'priority'    => 2,
        'capability'  => 'edit_theme_options',
        'description' => __('Allows you to customize some example settings for Advanced-Theme.', 'advanced-theme'),
        'panel'       => 'advanced_theme_general_custom_settings',
    )
);

// Body Text Size settings
$wp_customize->add_setting( 'advanced_theme_setting_fontsize',
    array(
        'default'    => '14',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'advanced_theme_control_fontsize', array(
    'type'     => 'range-value',
    'section'  => 'advanced_theme_typography',
    'settings' => 'advanced_theme_setting_fontsize',
    'label'    => __( 'Body Text Size' ),
    'priority' => 1,
    'input_attrs' => array(
        'min'    => 13,
        'max'    => 40,
        'step'   => 1,
        'suffix' => 'px', //optional suffix
    ),
) ) );

//Body Line Height (em) settings
$wp_customize->add_setting( 'advanced_theme_setting_line_height',
    array(
        'default'    => '1.5',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'advanced_theme_control_line_height', array(
    'type'     => 'range-value',
    'section'  => 'advanced_theme_typography',
    'settings' => 'advanced_theme_setting_line_height',
    'label'    => __( 'Body Line Height' ),
    'priority' => 2,
    'input_attrs' => array(
        'min'    => 0.8,
        'max'    => 3,
        'step'   => 0.1,
        'suffix' => 'em', //optional suffix
    ),
) ) );

//Heading Text Size (rem) settings
$wp_customize->add_setting( 'advanced_theme_setting_header_text_size',
    array(
        'default'    => '1.5',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'advanced_theme_control_header_text_size', array(
    'type'     => 'range-value',
    'section'  => 'advanced_theme_typography',
    'settings' => 'advanced_theme_setting_header_text_size',
    'label'    => __( 'Header Text Size' ),
    'priority' => 3,
    'input_attrs' => array(
        'min'    => 0.8,
        'max'    => 5,
        'step'   => 0.1,
        'suffix' => 'rem', //optional suffix
    ),
) ) );

//Header Letter Spacing settings
$wp_customize->add_setting( 'advanced_theme_setting_header_letter_spacing',
    array(
        'default'    => '1.2',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'advanced_theme_control_header_letter_spacing', array(
    'type'     => 'range-value',
    'section'  => 'advanced_theme_typography',
    'settings' => 'advanced_theme_setting_header_letter_spacing',
    'label'    => __( 'Header Letter Spacing' ),
    'priority' => 4,
    'input_attrs' => array(
        'min'    => 0.5,
        'max'    => 5,
        'step'   => 0.1,
        'suffix' => 'px', //optional suffix
    ),
) ) );

//Header Line Height (em) settings
$wp_customize->add_setting( 'advanced_theme_setting_header_line_height',
    array(
        'default'    => '1.2',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'advanced_theme_control_header_line_height', array(
    'type'     => 'range-value',
    'section'  => 'advanced_theme_typography',
    'settings' => 'advanced_theme_setting_header_line_height',
    'label'    => __( 'Header Line Height' ),
    'priority' => 5,
    'input_attrs' => array(
        'min'    => 0.5,
        'max'    => 4,
        'step'   => 0.1,
        'suffix' => 'em', //optional suffix
    ),
) ) );

// Header Font Style
$wp_customize->add_setting( 'advanced_theme_setting_body_header_font_style', array(
    'default'       => '|Bold',
    'type'          => 'theme_mod',
    'capability'    => 'edit_theme_options',
    'transport'     => 'postMessage',
));

$wp_customize->add_control(new AdvancedThemeCustomizeControl($wp_customize, 'advanced_theme_control_body_header_font_style', array(
    'label'     => esc_html__('Header Font Style', 'advanced-theme'),
    'settings'  => 'advanced_theme_setting_body_header_font_style',
    'section'   => 'advanced_theme_typography',
    'priority'  => 6,
    'type'      => 'font_style',
    'icon'      => 'material-icons',
    'choices'   => theme_font_style_choices(),
)));

// Body Link Color
$wp_customize->add_setting( 'advanced_theme_setting_body_link_color',
    array(
        'default'    => '#444',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'advanced_theme_control_body_link_color',
    array(
        'label'      => __( 'Body Link Color', 'advanced-theme' ),
        'settings'   => 'advanced_theme_setting_body_link_color',
        'priority'   => 7,
        'section'    => 'advanced_theme_typography',
    )
) );

// Body Text Color
$wp_customize->add_setting( 'advanced_theme_setting_body_text_color',
    array(
        'default'    => '#444',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'advanced_theme_control_body_text_color',
    array(
        'label'      => __( 'Body Text Color', 'advanced-theme' ),
        'settings'   => 'advanced_theme_setting_body_text_color',
        'priority'   => 8,
        'section'    => 'advanced_theme_typography',
    )
) );

// Header text Color
$wp_customize->add_setting( 'advanced_theme_setting_header_text_color',
    array(
        'default'    => '#444',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'advanced_theme_control_header_text_color',
    array(
        'label'      => __( 'Header Text Color', 'advanced-theme' ),
        'settings'   => 'advanced_theme_setting_header_text_color',
        'priority'   => 9,
        'section'    => 'advanced_theme_typography',
    )
) );

/* ------------------------------------------------ HEADER & MENU SECTION ------------------------------------------------ */

$wp_customize->add_panel('advanced_theme_panel_header_and_menu', array(
    'title'    => esc_html__('Header & Menus', 'advanced-theme'),
    'priority' => 3,
));

$wp_customize->add_section( 'advanced_theme_section_main_menu_layout',
    array(
        'title'       => __( 'Main menu layout', 'advanced-theme' ),
        'priority'    => 1,
        'capability'  => 'edit_theme_options',
        'description' => __('Allows you to customize some example settings for Advanced-Theme.', 'advanced-theme'),
        'panel'       => 'advanced_theme_panel_header_and_menu',
    )
);

$wp_customize->add_setting( 'advanced_theme_setting_menu_height',
    array(
        'default'    => '40',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'advanced_theme_control_menu_height', array(
    'type'     => 'range-value',
    'section'  => 'advanced_theme_section_main_menu_layout',
    'settings' => 'advanced_theme_setting_menu_height',
    'label'    => __( 'Menu Height' ),
    'priority' => 1,
    'input_attrs' => array(
        'min'    => 30,
        'max'    => 300,
        'step'   => 1,
        'suffix' => 'px', //optional suffix
    ),
) ) );

// Text Size (px)
$wp_customize->add_setting( 'advanced_theme_setting_menu_text_size',
    array(
        'default'    => '14',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'advanced_theme_control_menu_text_size', array(
    'type'     => 'range-value',
    'section'  => 'advanced_theme_section_main_menu_layout',
    'settings' => 'advanced_theme_setting_menu_text_size',
    'label'    => __( 'Text Size (px)' ),
    'priority' => 2,
    'input_attrs' => array(
        'min'    => 9,
        'max'    => 40,
        'step'   => 1,
        'suffix' => 'px', //optional suffix
    ),
) ) );

//Header Font Style
$wp_customize->add_setting( 'advanced_theme_setting_menu_link_font_style', array(
    'default'       => '|Bold',
    'type'          => 'theme_mod',
    'capability'    => 'edit_theme_options',
    'transport'     => 'postMessage',
));

$wp_customize->add_control(new AdvancedThemeCustomizeControl($wp_customize, 'advanced_theme_control_menu_link_font_style', array(
    'label'     => esc_html__('Font style', 'advanced-theme'),
    'settings'  => 'advanced_theme_setting_menu_link_font_style',
    'section'   => 'advanced_theme_section_main_menu_layout',
    'priority'  => 3,
    'type'      => 'font_style',
    'icon'      => 'material-icons',
    'choices'   => theme_font_style_choices(),
)));

$wp_customize->add_setting( 'advanced_theme_setting_menu_header_color',
    array(
        'default'    => '#222',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'advanced_theme_control_menu_header_color',
    array(
        'label'      => __( 'Text Color', 'advanced-theme' ),
        'settings'   => 'advanced_theme_setting_menu_header_color',
        'priority'   => 4,
        'section'    => 'advanced_theme_section_main_menu_layout',
    )
) );

$wp_customize->add_setting( 'advanced_theme_setting_menu_active_link_color',
    array(
        'default'    => '#50a7ec',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'advanced_theme_control_menu_active_link_color',
    array(
        'label'      => __( 'Active Link Color', 'advanced-theme' ),
        'settings'   => 'advanced_theme_setting_menu_active_link_color',
        'priority'   => 5,
        'section'    => 'advanced_theme_section_main_menu_layout',
    )
) );

$wp_customize->add_setting( 'advanced_theme_setting_menu_background_color',
    array(
        'default'    => '#ffffff',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'advanced_theme_control_menu_background_color',
    array(
        'label'      => __( 'Background Color', 'advanced-theme' ),
        'settings'   => 'advanced_theme_setting_menu_background_color',
        'priority'   => 6,
        'section'    => 'advanced_theme_section_main_menu_layout',
    )
) );

// SUB MENU
$wp_customize->add_section( 'advanced_theme_section_sub_menu_setting',
    array(
        'title'       => __( 'Submenu Setting', 'advanced-theme' ),
        'priority'    => 2,
        'capability'  => 'edit_theme_options',
        'description' => __('Allows you to customize some example settings for Advanced-Theme.', 'advanced-theme'),
        'panel'       => 'advanced_theme_panel_header_and_menu',
    )
);

// Text Size (px)
$wp_customize->add_setting( 'advanced_theme_setting_sub_menu_text_size',
    array(
        'default'    => '16',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'advanced_theme_control_sub_menu_text_size', array(
    'type'     => 'range-value',
    'section'  => 'advanced_theme_section_sub_menu_setting',
    'settings' => 'advanced_theme_setting_sub_menu_text_size',
    'label'    => __( 'Text Size (px)' ),
    'priority' => 1,
    'input_attrs' => array(
        'min'    => 9,
        'max'    => 40,
        'step'   => 1,
        'suffix' => 'px', //optional suffix
    ),
) ) );

$wp_customize->add_setting( 'advanced_theme_setting_sub_menu_border_top',
    array(
        'default'    => '1',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'advanced_theme_control_sub_menu_border_top', array(
    'type'     => 'range-value',
    'section'  => 'advanced_theme_section_sub_menu_setting',
    'settings' => 'advanced_theme_setting_sub_menu_border_top',
    'label'    => __( 'Border Top (px)' ),
    'priority' => 2,
    'input_attrs' => array(
        'min'    => 0,
        'max'    => 20,
        'step'   => 1,
        'suffix' => 'px', //optional suffix
    ),
) ) );


$wp_customize->add_setting( 'advanced_theme_setting_sub_menu_dropdown_width',
    array(
        'default'    => '200',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'advanced_theme_control_sub_menu_dropdown_width', array(
    'type'     => 'range-value',
    'section'  => 'advanced_theme_section_sub_menu_setting',
    'settings' => 'advanced_theme_setting_sub_menu_dropdown_width',
    'label'    => __( 'Dropdown Width (px)' ),
    'priority' => 3,
    'input_attrs' => array(
        'min'    => 160,
        'max'    => 600,
        'step'   => 1,
        'suffix' => 'px', //optional suffix
    ),
) ) );

$wp_customize->add_setting( 'advanced_theme_setting_sub_menu_background_color',
    array(
        'default'    => '#ffffff',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'advanced_theme_control_sub_menu_background_color',
    array(
        'label'      => __( 'Background Color', 'advanced-theme' ),
        'settings'   => 'advanced_theme_setting_sub_menu_background_color',
        'priority'   => 4,
        'section'    => 'advanced_theme_section_sub_menu_setting',
    )
) );

$wp_customize->add_setting( 'advanced_theme_setting_sub_menu_background_color_hover',
    array(
        'default'    => '#50a7ec1a',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'advanced_theme_control_sub_menu_background_color_hover',
    array(
        'label'      => __( 'Background Color Hover', 'advanced-theme' ),
        'settings'   => 'advanced_theme_setting_sub_menu_background_color_hover',
        'priority'   => 5,
        'section'    => 'advanced_theme_section_sub_menu_setting',
    )
) );

$wp_customize->add_setting( 'advanced_theme_setting_sub_menu_border_top_color',
    array(
        'default'    => '#fafafa',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'advanced_theme_control_sub_menu_border_top_color',
    array(
        'label'      => __( 'Border Top Submenu Color', 'advanced-theme' ),
        'settings'   => 'advanced_theme_setting_sub_menu_border_top_color',
        'priority'   => 6,
        'section'    => 'advanced_theme_section_sub_menu_setting',
    )
) );

$wp_customize->add_setting( 'advanced_theme_setting_sub_menu_text_color',
    array(
        'default'    => '#000',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'advanced_theme_control_sub_menu_text_color',
    array(
        'label'      => __( 'Text Color', 'advanced-theme' ),
        'settings'   => 'advanced_theme_setting_sub_menu_text_color',
        'priority'   => 7,
        'section'    => 'advanced_theme_section_sub_menu_setting',
    )
) );

/* ------------------------------------------------ SIDEBAR SECTION ------------------------------------------------ */

$wp_customize->add_section( 'advanced_theme_section_sidebar',
    array(
        'title'       => __( 'Sidebar', 'advanced-theme' ),
        'priority'    => 4,
        'capability'  => 'edit_theme_options',
        'description' => __('Allows you to customize some example settings for Advanced-Theme.', 'advanced-theme'),
    )
);

$wp_customize->add_setting( 'advanced_theme_setting_sidebar_width',
    array(
        'default'    => '28',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'advanced_theme_control_sidebar_width', array(
    'type'     => 'range-value',
    'section'  => 'advanced_theme_section_sidebar',
    'settings' => 'advanced_theme_setting_sidebar_width',
    'label'    => __( 'Website Sidebar Width (%)' ),
    'priority' => 1,
    'input_attrs' => array(
        'min'    => 5,
        'max'    => 50,
        'step'   => 1,
        'suffix' => '%', //optional suffix
    ),
) ) );

$wp_customize->add_setting( 'advanced_theme_setting_sidebar_background_color',
    array(
        'default'    => '#f9fbfd',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'advanced_theme_control_sidebar_background_color',
    array(
        'label'      => __( 'Sidebar Background Color', 'advanced-theme' ),
        'settings'   => 'advanced_theme_setting_sidebar_background_color',
        'priority'   => 2,
        'section'    => 'advanced_theme_section_sidebar',
    )
) );

$wp_customize->add_setting( 'advanced_theme_setting_sidebar_link_color',
    array(
        'default'    => '#42495d',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'advanced_theme_control_sidebar_link_color',
    array(
        'label'      => __( 'Sidebar Link Color', 'advanced-theme' ),
        'settings'   => 'advanced_theme_setting_sidebar_link_color',
        'priority'   => 3,
        'section'    => 'advanced_theme_section_sidebar',
    )
) );

$wp_customize->add_setting( 'advanced_theme_setting_sidebar_header_color',
    array(
        'default'    => '#42495d',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'advanced_theme_control_sidebar_header_color',
    array(
        'label'      => __( 'Header Text Color', 'advanced-theme' ),
        'settings'   => 'advanced_theme_setting_sidebar_header_color',
        'priority'   => 4,
        'section'    => 'advanced_theme_section_sidebar',
    )
) );

$wp_customize->add_setting( 'advanced_theme_setting_sidebar_text_color',
    array(
        'default'    => '#91a8c5',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'advanced_theme_control_sidebar_text_color',
    array(
        'label'      => __( 'Text Color', 'advanced-theme' ),
        'settings'   => 'advanced_theme_setting_sidebar_text_color',
        'priority'   => 5,
        'section'    => 'advanced_theme_section_sidebar',
    )
) );

//Header Font Style
$wp_customize->add_setting( 'advanced_theme_setting_sidebar_header_font_style', array(
    'default'       => '|Bold|Uppercase',
    'type'          => 'theme_mod',
    'capability'    => 'edit_theme_options',
    'transport'     => 'postMessage',
));

$wp_customize->add_control(new AdvancedThemeCustomizeControl($wp_customize, 'advanced_theme_control_sidebar_header_font_style', array(
    'label'     => esc_html__('Header Font Style', 'advanced-theme'),
    'settings'  => 'advanced_theme_setting_sidebar_header_font_style',
    'section'   => 'advanced_theme_section_sidebar',
    'priority'  => 6,
    'type'      => 'font_style',
    'icon'      => 'material-icons',
    'choices'   => theme_font_style_choices(),
)));

/* ------------------------------------------------ FOOTER SETTING SECTION ------------------------------------------------ */

$wp_customize->add_section( 'advanced_theme_section_footer_setting',
    array(
        'title'       => __( 'Footer Setting', 'advanced-theme' ),
        'priority'    => 5,
        'capability'  => 'edit_theme_options',
        'description' => __('Allows you to customize some example settings for Advanced-Theme.', 'advanced-theme'),
    )
);

$wp_customize->add_setting( 'advanced_theme_setting_footer_setting_top_padding',
    array(
        'default'    => '50',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'advanced_theme_control_footer_setting_top_padding', array(
    'type'     => 'range-value',
    'section'  => 'advanced_theme_section_footer_setting',
    'settings' => 'advanced_theme_setting_footer_setting_top_padding',
    'label'    => __( 'Top padding footer (px)' ),
    'priority' => 1,
    'input_attrs' => array(
        'min'    => 5,
        'max'    => 300,
        'step'   => 1,
        'suffix' => 'px', //optional suffix
    ),
) ) );

$wp_customize->add_setting( 'advanced_theme_setting_footer_setting_bottom_padding',
    array(
        'default'    => '50',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'advanced_theme_control_footer_setting_bottom_padding', array(
    'type'     => 'range-value',
    'section'  => 'advanced_theme_section_footer_setting',
    'settings' => 'advanced_theme_setting_footer_setting_bottom_padding',
    'label'    => __( 'Bottom padding footer (px)' ),
    'priority' => 2,
    'input_attrs' => array(
        'min'    => 5,
        'max'    => 300,
        'step'   => 1,
        'suffix' => 'px', //optional suffix
    ),
) ) );

$wp_customize->add_setting( 'advanced_theme_setting_footer_setting_background_color',
    array(
        'default'    => '#2a2727',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'advanced_theme_setting_footer_control_background_color',
    array(
        'label'      => __( 'Background color', 'advanced-theme' ),
        'settings'   => 'advanced_theme_setting_footer_setting_background_color',
        'priority'   => 3,
        'section'    => 'advanced_theme_section_footer_setting',
    )
) );

$wp_customize->add_setting( 'advanced_theme_setting_footer_custom_credits',
    array(
        'default'    =>'Designed by DaiDev Company | Powered by WordPress',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control('advanced_theme_control_footer_custom_credits',
    array(
        'label'      => __( 'Copyright content', 'advanced-theme' ),
        'type'       => 'textarea',
        'settings'   => 'advanced_theme_setting_footer_custom_credits',
        'priority'   => 4,
        'section'    => 'advanced_theme_section_footer_setting',
    )
);

$wp_customize->add_setting( 'advanced_theme_setting_footer_setting_copyright_color',
    array(
        'default'    => '#eeeeee',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'advanced_theme_control_footer_setting_copyright_color',
    array(
        'label'      => __( 'Copyright color', 'advanced-theme' ),
        'settings'   => 'advanced_theme_setting_footer_setting_copyright_color',
        'priority'   => 4,
        'section'    => 'advanced_theme_section_footer_setting',
    )
) );

$wp_customize->add_setting( 'advanced_theme_setting_footer_setting_copyright_line_height',
    array(
        'default'    => '1',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'advanced_theme_control_footer_setting_copyright_line_height', array(
    'type'     => 'range-value',
    'section'  => 'advanced_theme_section_footer_setting',
    'settings' => 'advanced_theme_setting_footer_setting_copyright_line_height',
    'label'    => __( 'Copyright Line Height (px)' ),
    'priority' => 5,
    'input_attrs' => array(
        'min'    => 0.5,
        'max'    => 9,
        'step'   => 0.1,
        'suffix' => 'em', //optional suffix
    ),
) ) );

$wp_customize->add_setting( 'advanced_theme_setting_footer_setting_widget_header_size',
    array(
        'default'    => '20',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'advanced_theme_setting_footer_control_widget_header_size', array(
    'type'     => 'range-value',
    'section'  => 'advanced_theme_section_footer_setting',
    'settings' => 'advanced_theme_setting_footer_setting_widget_header_size',
    'label'    => __( 'Widget header size' ),
    'priority' => 6,
    'input_attrs' => array(
        'min'    => 13,
        'max'    => 50,
        'step'   => 1,
        'suffix' => 'px', //optional suffix
    ),
) ) );

$wp_customize->add_setting( 'advanced_theme_setting_footer_setting_header_font_style', array(
    'default'       => '|Bold|Uppercase',
    'type'          => 'theme_mod',
    'capability'    => 'edit_theme_options',
    'transport'     => 'postMessage',
));

$wp_customize->add_control(new AdvancedThemeCustomizeControl($wp_customize, 'advanced_theme_control_footer_setting_header_font_style', array(
    'label'     => esc_html__('Header Font style', 'advanced-theme'),
    'settings'  => 'advanced_theme_setting_footer_setting_header_font_style',
    'section'   => 'advanced_theme_section_footer_setting',
    'priority'  => 7,
    'type'      => 'font_style',
    'icon'      => 'material-icons',
    'choices'   => theme_font_style_choices(),
)));

$wp_customize->add_setting( 'advanced_theme_setting_footer_setting_widget_text_size',
    array(
        'default'    => '1.2',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'advanced_theme_setting_footer_control_widget_text_size', array(
    'type'     => 'range-value',
    'section'  => 'advanced_theme_section_footer_setting',
    'settings' => 'advanced_theme_setting_footer_setting_widget_text_size',
    'label'    => __( 'Widget text size (em)' ),
    'priority' => 8,
    'input_attrs' => array(
        'min'    => 0.5,
        'max'    => 6,
        'step'   => 0.1,
        'suffix' => 'em', //optional suffix
    ),
) ) );

$wp_customize->add_setting( 'advanced_theme_setting_footer_setting_widget_line_height',
    array(
        'default'    => '1.2',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'advanced_theme_control_footer_setting_widget_line_height', array(
    'type'     => 'range-value',
    'section'  => 'advanced_theme_section_footer_setting',
    'settings' => 'advanced_theme_setting_footer_setting_widget_line_height',
    'label'    => __( 'Widget Line Height (em)' ),
    'priority' => 9,
    'input_attrs' => array(
        'min'    => 0.5,
        'max'    => 6,
        'step'   => 0.1,
        'suffix' => 'em', //optional suffix
    ),
) ) );

$wp_customize->add_setting( 'advanced_theme_setting_footer_setting_widget_text_style', array(
    'default'       => '|Bold|Uppercase',
    'type'          => 'theme_mod',
    'capability'    => 'edit_theme_options',
    'transport'     => 'postMessage',
));

$wp_customize->add_control(new AdvancedThemeCustomizeControl($wp_customize, 'advanced_theme_control_footer_setting_header_font_style', array(
    'label'     => esc_html__('Widget text style', 'advanced-theme'),
    'settings'  => 'advanced_theme_setting_footer_setting_widget_text_style',
    'section'   => 'advanced_theme_section_footer_setting',
    'priority'  => 10,
    'type'      => 'font_style',
    'icon'      => 'material-icons',
    'choices'   => theme_font_style_choices(),
)));

$wp_customize->add_setting( 'advanced_theme_setting_footer_setting_widget_text_color',
    array(
        'default'    => '#eeeeee',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'advanced_theme_control_footer_setting_widget_text_color',
    array(
        'label'      => __( 'Widget Text Color', 'advanced-theme' ),
        'settings'   => 'advanced_theme_setting_footer_setting_widget_text_color',
        'priority'   => 11,
        'section'    => 'advanced_theme_section_footer_setting',
    )
) );

$wp_customize->add_setting( 'advanced_theme_setting_footer_setting_widget_link_color',
    array(
        'default'    => '#eeeeee',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'advanced_theme_control_footer_setting_widget_link_color',
    array(
        'label'      => __( 'Widget Link Color', 'advanced-theme' ),
        'settings'   => 'advanced_theme_setting_footer_setting_widget_link_color',
        'priority'   => 12,
        'section'    => 'advanced_theme_section_footer_setting',
    )
) );

$wp_customize->add_setting( 'advanced_theme_setting_footer_setting_widget_header_color',
    array(
        'default'    => '#eeeeee',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'advanced_theme_control_footer_setting_widget_header_color',
    array(
        'label'      => __( 'Widget Header Color', 'advanced-theme' ),
        'settings'   => 'advanced_theme_setting_footer_setting_widget_header_color',
        'priority'   => 13,
        'section'    => 'advanced_theme_section_footer_setting',
    )
) );

/* ------------------------------------------------ BLOG POST SECTION ------------------------------------------------ */

$wp_customize->add_section( 'advanced_theme_section_blog_post_style',
    array(
        'title'       => __( 'Blog/Post style', 'advanced-theme' ),
        'priority'    => 6,
        'capability'  => 'edit_theme_options',
        'description' => __('Allows you to customize some example settings for Advanced-Theme.', 'advanced-theme'),
    )
);

$wp_customize->add_setting( 'advanced_theme_setting_display_author',
    array(
        'default'    => true,
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control('advanced_theme_control_display_author',
    array(
        'label'      => __( 'Display Author', 'advanced-theme' ),
        'type'       => 'checkbox',
        'settings'   => 'advanced_theme_setting_display_author',
        'priority'   => 1,
        'section'    => 'advanced_theme_section_blog_post_style',
    )
);

$wp_customize->add_setting( 'advanced_theme_setting_display_date',
    array(
        'default'    => true,
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control('advanced_theme_control_display_date',
    array(
        'label'      => __( 'Display Date', 'advanced-theme' ),
        'type'       => 'checkbox',
        'settings'   => 'advanced_theme_setting_display_date',
        'priority'   => 2,
        'section'    => 'advanced_theme_section_blog_post_style',
    )
);

$wp_customize->add_setting( 'advanced_theme_setting_display_category',
    array(
        'default'    => true,
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control('advanced_theme_control_display_category',
    array(
        'label'      => __( 'Display category', 'advanced-theme' ),
        'type'       => 'checkbox',
        'settings'   => 'advanced_theme_setting_display_category',
        'priority'   => 3,
        'section'    => 'advanced_theme_section_blog_post_style',
    )
);

$wp_customize->add_setting( 'advanced_theme_setting_display_comments',
    array(
        'default'    => true,
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'postMessage',
    )
);

$wp_customize->add_control('advanced_theme_control_display_comments',
    array(
        'label'      => __( 'Display comments', 'advanced-theme' ),
        'type'       => 'checkbox',
        'settings'   => 'advanced_theme_setting_display_comments',
        'priority'   => 4,
        'section'    => 'advanced_theme_section_blog_post_style',
    )
);

//4. We can also change built-in settings by modifying properties. For instance, let's make some stuff use live preview JS...
$wp_customize->get_setting( 'advanced_theme_setting_load_menu_logo' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_image_upload' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_logo_width' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_logo_height' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_background_color' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_background_image' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_fontsize' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_line_height' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_header_text_size' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_header_letter_spacing' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_header_line_height' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_body_link_color' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_body_text_color' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_header_text_color' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_body_header_font_style' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_content_width' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_load_sidebar' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_menu_header_color' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_menu_height' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_menu_text_size' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_menu_link_font_style' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_menu_active_link_color' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_menu_background_color' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_sub_menu_text_size' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_sub_menu_border_top' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_sub_menu_dropdown_width' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_sub_menu_background_color' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_sub_menu_background_color_hover' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_sub_menu_border_top_color' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_sub_menu_text_color' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_sidebar_width' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_sidebar_background_color' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_sidebar_link_color' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_sidebar_header_color' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_sidebar_text_color' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_sidebar_header_font_style' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_footer_setting_top_padding' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_footer_setting_bottom_padding' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_footer_setting_background_color' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_footer_setting_copyright_color' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_footer_setting_copyright_line_height' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_footer_setting_widget_header_size' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_footer_setting_widget_text_size' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_footer_setting_header_font_style' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_footer_setting_widget_line_height' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_footer_setting_widget_text_style' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_footer_setting_widget_text_color' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_footer_setting_widget_link_color' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_footer_setting_widget_header_color' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_display_author' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_display_date' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_display_category' )->transport = 'postMessage';
$wp_customize->get_setting( 'advanced_theme_setting_display_comments' )->transport = 'postMessage';