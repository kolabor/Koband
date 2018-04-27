<?php
/**
 * 
 *
 * Koband Theme Archive
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
		<h1 class="page-title">
			<?php
			if( is_day() ) :
				printf( _e( 'Daily Archives: %s', 'koband' ), get_the_date() );
			elseif ( is_month() ) : 
				printf( _e( 'Monthly Archives: %s', 'koband'), get_the_date( _x('F Y', 'monthly archives date format', 'koband') ) );
			elseif ( is_year() ) :
				printf( _e( 'Yearly Archives: %s', 'koband'), get_the_date( _x('Y', 'yearly archives date format', 'koband') ) )
			else :
				_e( 'Archives', 'koband' );
			endif;
			?>
			<?php if (have_posts() ) : ?>
				<!--start loop --> 
					<?php while (have_posts() ) : the_post(); ?>
						<div id="news-photo"><?php the_post_thumbnail(array(400,400)); ?></div>
						<div class="container">
						<h1><div id="news-title"><?php the_title();?></div></h1>
							<div class="row">
								<div class="col-sm">
									<small><?php the_category();?> <!--|| <?php// the_tag(); ?> || <?php //edit_post_link(); ?>--></small>
									<div id="news-content"><?php the_content(); ?></div>
								</div>
							</div>
						</div>
					<?php endwhile; 
			endif; ?>
		</h1>
	</div>
</div>
<?php 
get_sidebar();
get_footer(); ?>