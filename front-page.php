<?php 

	if (is_front_page() && kolabor_band_has_featured_posts() ) {
		// Include the featured contend template.
		get_template_part( 'featured-content' );
	}
?>



get_header();
?>


<?php get_footer(); ?>

