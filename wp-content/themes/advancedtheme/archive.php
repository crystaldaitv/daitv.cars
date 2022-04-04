<?php
defined('ABSPATH') || die;

get_header();
?>
<div id="main-content" class="main-content">
    <div id="container" class="wrapper_content">
        <div id="content">
            <section id="content-area" class="content-area">
                <div class="archive-title">
                    <h2>
                        <?php
                        if ( is_tag() ) :
                            printf( __('Posts Tagged: %1$s','advanced-theme'), single_tag_title( '', false ) );
                        elseif ( is_category() ) :
                            printf( __('Posts Categorized: %1$s','advanced-theme'), single_cat_title( '', false ) );
                        elseif ( is_day() ) :
                            printf( __('Daily Archives: %1$s','advanced-theme'), get_the_time('l, F j, Y') );
                        elseif ( is_month() ) :
                            printf( __('Monthly Archives: %1$s','advanced-theme'), get_the_time('F Y') );
                        elseif ( is_year() ) :
                            printf( __('Yearly Archives: %1$s','advanced-theme'), get_the_time('Y') );
                        endif;
                        ?>
                    </h2>
                </div>
                <?php if ( is_tag() || is_category() ) : ?>
                    <div class="archive-description">
                        <?php echo term_description(); ?>
                    </div>
                <?php endif; ?>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content', get_post_format() ); ?>
                <?php endwhile; ?>
                    <?php advancedThemePagination();?>
                <?php else : ?>
                    <?php get_template_part( 'content', 'none' ); ?>
                <?php endif; ?>
            </section>
        </div>
        <div id="sidebar"><?php get_sidebar(); ?></div>
    </div>
</div>

<?php get_footer(); ?>

