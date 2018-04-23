<?php
/**
 * The Template for displaying all single posts
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

get_header(); ?>

	<?php if (have_posts() ) : ?>
		<!--start loop --> 
		<?php while (have_posts() ) : the_post(); ?>
			<div id="news-photo"><?php the_post_thumbnail(array(400,400)); ?></div>
			<div class="container">
			<h1><div id="news-title" class="section_heading"><?php the_title();?></div></h1>
				<div class="row">
					<div class="col-sm">
						<small><?php the_author(); ?><?php the_category();?><?php the_time( get_option( 'date_format' ) ); ?> <!--|| <?php// the_tag(); ?> || <?php //edit_post_link(); ?>--></small>
						<div id="news-content"><?php the_content(); ?></div>
					</div>
				</div>
			</div>
		<?php endwhile; 
	endif; ?>
		
		<!--comment section starts here-->
	
	<?php 	
			//Get only the approved comments 
			// If comments are open or we have at least one comment, load up the comment template.
		 if ( comments_open() || get_comments_number() ) :
		     comments_template();
		 endif;
		$args = array(
		    'status' => 'approve'
		);
		/* 
		// The comment Query
		$comments_query = new WP_Comment_Query;
		$comments = $comments_query->query( $args );
		 
		// Comment Loop
		if ( $comments ) {
		    foreach ( $comments as $comment ) {
		        echo '<p>' . $comment->comment_content . '</p>';
		    }
		} else {
		    echo 'No comments found.';
		}*/
		?>
<?php 
get_sidebar();
get_footer(); ?>