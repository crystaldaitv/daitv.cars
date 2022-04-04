<?php
defined('ABSPATH') || die;

get_header();
?>

<div id="main-content" class="main-content">
    <div id="container" class="wrapper_content">
        <div id="content">
            <section id="content-area" class="content-area">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content', get_post_format() ); ?>
                    <?php get_template_part( 'author-bio' ); ?>
                    <?php comments_template(); ?>
                <?php endwhile; ?>
                <?php else : ?>
                    <?php get_template_part( 'content', 'none' ); ?>
                <?php endif; ?>
            </section>
        </div>
        <section id="sidebar"><?php get_sidebar(); ?></section>
    </div>
</div>

<?php get_footer(); ?>

