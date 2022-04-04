<?php
defined('ABSPATH') || die;

if (is_shop()) {
    $page_id = get_option('woocommerce_shop_page_id');
} else {
    $page_id = $post->ID;
}
$field_id_value     = get_post_meta($page_id);
$page_title_content = (isset($field_id_value['page_title_content'][0]) && '' !== $field_id_value['page_title_content'][0]) ? $field_id_value['page_title_content'][0] : '0';
if ($page_title_content === '1') {
    add_filter('woocommerce_show_page_title', '__return_false');
}
get_header(); ?>

<div id="main-content" class="main-content">
    <div id="container" class="wrapper_content">
        <div id="content">
            <section id="content-area" class="content-area">
                <?php woocommerce_content(); ?>
            </section>
        </div>
        <div id="sidebar"><?php get_sidebar(); ?></div>
    </div>
</div>

<?php get_footer(); ?>
