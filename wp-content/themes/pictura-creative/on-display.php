<?php
/**
 * Template Name:On Display
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pictura_Creative
 */

get_header();
while (have_posts()): the_post();

    echo get_template_part('template-parts/page', 'fullWidth');
endwhile;
?>
<?php
wp_reset_postdata();
wp_reset_query();

get_footer();
