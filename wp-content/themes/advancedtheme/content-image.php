<?php
defined('ABSPATH') || die;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php advancedThemePostThumbnail(); ?>
        <?php advancedThemeEntryHeader(); ?>
        <?php
            /*
            * Count the attachment on each post
            */
            $attachments = get_children( array( 'post_parent'=>$post->ID ) );
            $attachment_number = count($attachments);
            printf( __('This image post contains %1$s photos', 'advanced-theme'), $attachment_number );
        ?>
    </header>
    <div class="entry-content">
        <?php advancedThemeEntryContent(); ?>
        <?php ( is_single() ? advancedThemeEntryTag() : '' ); ?>
    </div>
</article>