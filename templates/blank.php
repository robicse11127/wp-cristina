<?php
/**
 * Template Name: Blank
 */
get_header();
	// Loop.
	while ( have_posts() ) : the_post();
		the_content();
	endwhile;
get_footer();