<?php
/**
 * 
 *
 * Koband Theme Category
 *
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

get_header(); ?>
<div class="container">
	<div class="row">
		<header class="author-header"> <?php
			$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));?>
		    <h1><?php _e('Posts by ', 'koband');?><?php echo $curauth->nickname; ?>:</h1>
				<?php if (get_the_author_meta('description')) : ?>
					<div class="author-description"><?php the_author_meta('description'); ?></div>
				<?php endif; ?>
				<?php if (have_posts() ) : ?>
				<!--start loop --> 
					<?php while (have_posts() ) : the_post(); ?>
						<div id="news-photo"><?php the_post_thumbnail(array(400,400)); ?></div>
						<div class="container">
							<div class="col-sm news-details">
							<div class="news-details-category"><?php _e('Category : ', 'koband');?><?php the_category();?></div>
							<div class="news-details-date"><?php _e('Posted at : ', 'koband');?><?php the_time( get_option( 'date_format' ) ); ?></div>
							<div class="news-details-tag"><?php the_tags(); ?></div>
						<h1><div id="news-title"><?php the_title();?></div></h1>
							<div class="row">
								<div class="col-sm">
									<div id="news-content"><?php the_content(); ?></div>
								</div>
							</div>
						</div>
					<?php endwhile; 
				endif; ?> 
		</header>
	</div>
</div>
<?php 
get_sidebar();
get_footer(); ?>