<?php 

get_header();

	if (is_front_page() && kolabor_band_has_featured_posts() ) {
		// Include the featured contend template.
		get_template_part( 'featured-content' );
	}




?>


<?php get_footer(); ?>
