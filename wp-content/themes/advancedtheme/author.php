<?php
defined('ABSPATH') || die;

get_header();
?>

<div id="main-content" class="main-content">
    <div id="container" class="wrapper_content">
        <div id="content">
            <section id="content-area" class="content-area">
                <div class="author-box">
                    <?php
                        echo '<div class="author-avatar">'. get_avatar( get_the_author_meta( 'ID' ) ) . '</div>';
                        printf( '<h3>'. __( 'Posts by %1$s', 'advanced-theme' ) . '</h3>', get_the_author() );
                        echo '<p>'. get_the_author_meta( 'description' ) . '</p>';
                        if ( get_the_author_meta( 'user_url' ) ) : printf( __('<a href="%1$s" title="Visit to %2$s website">Visit to my website</a>', 'advanced-theme'),
                        get_the_author_meta( 'user_url' ), get_the_author() );
                        endif;
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
        <div> id="sidebar"><?php get_sidebar(); ?></div>
    </div>
</div>

<?php get_footer(); ?>

