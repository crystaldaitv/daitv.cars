<?php
defined('ABSPATH') || die;

get_header();
?>

<div id="main-content" class="main-content">
    <div id="container" class="wrapper_content">
        <div id="content">
            <section id="content-area" class="content-area">
                <div class="search-zinfo">
                    <?php
                        $search_query = new WP_Query( 's='.$s.'&showposts=-1' );
                        $search_keyword = esc_html( $s, 1);
                        $search_count = $search_query->post_count;
                        printf( __('<h6 class="search-title">Search results for <strong>%1$s</strong>. We found <strong>%2$s</strong> articles for you.</h6>', 'advanced-theme'), $search_keyword, $search_count );
                    ?>
                </div>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content', get_post_format() ); ?>
                <?php endwhile; ?>
                    <?php advancedThemePagination();?>
                <?php else : ?>
                    <?php get_template_part( 'content', 'none' ); ?>
                <?php endif; ?>
            </section>
        </div>
        <section id="sidebar"><?php get_sidebar(); ?></section>
    </div>
</div>

<?php get_footer(); ?>

