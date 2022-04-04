<?php
defined('ABSPATH') || die;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-thumbnail">
        <?php
        if (function_exists('advancedThemeBreadcrumbs')) { advancedThemeBreadcrumbs(); }
        advancedThemePostThumbnail(); ?>
    </div>
    <header class="entry-header">
        <?php advancedThemeEntryHeader(); ?>
    </header>
    <div class="entry-content"><?php advancedThemeEntryContent(); ?><?php ( is_single() ? advancedThemeEntryTag() : '' ); ?></div>
    <div class="entry-meta"><?php advancedThemeEntryMeta(); ?></div>
</article>