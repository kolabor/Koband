<?php
/**
 * 
 *
 * Koband Theme Comments
 *
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

get_header(); ?>
<?php if ( post_password_required() )
    	return;
?>
<div class="container">
    <div class="row">
        
            
               
                    <div class=" col-12 comment-main rounded">
                    <div class="row">

                     
                        <?php if ( have_comments() ) : ?>
                            <h2 class="comments-title">
                                <?php
                                    printf( _nx( 'One thought on "%2$s"', '%1$s thoughts on "%2$s"', get_comments_number(), 'comments title', 'koband' ),
                                        number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
                                ?>
                            </h2>
                      </div>
                  
                            <ol class="row comment-list">
                                <?php
                                    wp_list_comments( array(
                                        'style'       => 'ol',
                                        'short_ping'  => true,
                                        'avatar_size' => 40,
                                    ) );
                                ?>
                            </ol><!-- .comment-list -->
                     
                            <?php
                                // Are there comments to navigate through?
                                if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
                            ?>
                            <nav class="navigation comment-navigation" role="navigation">
                                <h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'koband' ); ?></h1>
                                <div class="nav-previous"><?php previous_comments_link( _e( '&larr; Older Comments', 'koband' ) ); ?></div>
                                <div class="nav-next"><?php next_comments_link( _e( 'Newer Comments &rarr;', 'koband' ) ); ?></div>
                            </nav><!-- .comment-navigation -->
                            <?php endif; // Check for comment navigation ?>
                     
                            <?php if ( ! comments_open() && get_comments_number() ) : ?>
                            <p class="no-comments"><?php _e( 'Comments are closed.' , 'koband' ); ?></p>
                            <?php endif; ?>
                     
                        <?php endif; // have_comments() ?>
                     
                        <?php comment_form(); ?>
                    
                    </div>
          
            
       <!-- #comments -->
 </div>
</div>