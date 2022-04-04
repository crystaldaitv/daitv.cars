<?php
defined('ABSPATH') || die;

get_header();
?>
<div id="main-content" class="main-content">
    <div id="container" class="wrapper_content">
        <div id="content" class="content">
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
        <div id="sidebar"><?php get_sidebar(); ?></div>
    </div>
</div>
<?php get_footer(); ?>

