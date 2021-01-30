<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pictura_Creative
 */

get_header();
  while ( have_posts() ) : the_post(); 
if(get_field("show_page_info") == 1)
{
	echo get_template_part("template-parts/page","heading");	
}

get_template_part("template-parts/page","fullWidth");	
 endwhile; 
get_footer();