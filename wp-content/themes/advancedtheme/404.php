<?php
defined('ABSPATH') || die;

get_header();
?>
<div id="main-content" class="main-content">
    <div id="container" class="wrapper_content"> 
        <div id="content"> 
            <section id="content-area" class="content-area">
            <?php
                _e('<h2>404 NOT FOUND</h2>', 'advanced-theme');
                _e('<p>The article you were looking for was not found, but maybe try looking again!</p>', 'advanced-theme');
                get_search_form();
                _e('<h3>Content categories</h3>', 'advanced-theme');
                echo '<div class="404-catlist">';
                wp_list_categories( array( 'title_li' => '' ) );
                echo '</div>';
                _e('<h3>Tag Cloud</h3>', 'advanced-theme');
                wp_tag_cloud();
            ?>
            </section>
        </div>
        <section id="sidebar"><?php get_sidebar(); ?></section>
    </div>
</div>
     
<?php get_footer(); ?>