<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 **
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */
 
?>
<section class="no-results not-found">
	<header class="page-header">
		<h3 class="page-title"><?php echo esc_html__( 'Error 404-Page NOT Found', 'koband' ); ?></h3>
	</header><!-- .page-header -->

	<div class="page-content">
		<div class="content">
			<div class="conent_holder">
				<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

					<p><?php printf( esc_html__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'koband' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

				<?php elseif ( is_search() ) : ?>

					<p><?php echo esc_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'koband' ); ?></p>

				<?php else : ?>

					<p><?php echo esc_html__( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'koband' ); ?></p></br>

				<?php endif; ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div><!-- .page-content -->
</section><!-- .no-results -->