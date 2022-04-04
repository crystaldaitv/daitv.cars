<?php
defined('ABSPATH') || die;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php advancedThemeEntryHeader(); ?>
    </header>
    <div class="entry-content">
        <?php the_content(); ?>
        <?php if ( is_single() ) : advancedThemeEntryTag(); endif; ?>
    </div>
</article>