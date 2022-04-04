<?php
defined('ABSPATH') || die;

$customs        = get_option('theme_mods_advancedtheme');
$footer_credits = isset($customs['advanced_theme_setting_footer_custom_credits']) ? $customs['advanced_theme_setting_footer_custom_credits'] : 'Designed by DaiDev Company | Powered by WordPress';
?>
<footer id="page-footer">
<?php if (has_nav_menu('footer-menu')) : ?>
    <div id="footer-nav">
        <?php wp_nav_menu(array(
            'theme_location' => 'footer-menu',
            'container'      => 'nav',
            'menu_class'     => 'advanced-theme-menu advanced-theme-footer-menu',
        )); ?>
    </div>
    <?php endif; ?>
    <div id="footer-bottom">
        <div id="footer-widgets">
            <?php advancedThemeWidgets('footer'); ?>
        </div>
    <?php if ($footer_credits !== '') : ?>
        <div id="page-copyright">
            <?php
            //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- $footer_credits no need for EscapeOutput
            echo $footer_credits;
            ?>
        </div>
    <?php endif; ?>
    </div>
</footer>

</div>  <!--end #page-container-->
<?php wp_footer(); ?>
</body> <!--end body-->
</html>