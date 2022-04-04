<?php
defined('ABSPATH') || die;
?>
<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]> <html <?php language_attributes(); ?>> <![endif]-->

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmgp.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <?php wp_head(); ?>
</head>

<body id="wp_body_layout_home" <?php body_class(); ?> >
    <div id="page-container">
        <header id="page-header">
            <div class="logo-header"><?php advancedThemeLogo(); ?></div>
            <div class="menu-header"><?php advancedThemeMenu('primary-menu'); ?></div>
            <div class="show-menu-mobile">
                <i class="material-icons open">reorder</i>
                <i class="material-icons close">close</i>
            </div>
        </header>