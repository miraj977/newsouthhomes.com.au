<?php
/**
 * Template Name: Services
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
?>

<section class="services grid-normal" >
	
<div class="container">
<div class="row">
	<?php
	 $query = new WP_Query( array(
    'post_type' => 'service',
    'posts_per_page' => -1,
    'order' => 'ASC',
    'orderby' => 'date',
    'post_status' => 'publish'
  ) );
    while ( $query->have_posts() ) : $query->the_post(); ?>
		<div data-aos="fade-up" class="col-sm-12 col-md-3 ">
			<div class="service-grid">
			<!-- IMAGE -->
			<div class="grid-img">
			<?php the_post_thumbnail();	 ?>
			</div>
			
			<!-- title -->
			<div class="service-content text-center">
			
			<h4 class="grid-title"><?php the_title();?></h4>
			<div class="grid-text "><?php $content = get_the_content();
	  $content = strip_tags($content);
	  echo substr($content, 0, 80);?></div>
			
			<div class="content-link">
				<a class="btn-style1" href="<?php echo get_the_permalink(); ?>" >
			Read more
			</a></div>
			
			</div>
			</div>
		</div>
<?php endwhile;  ?> 
</div>
</div>
</section>
<?php 
endwhile;
get_footer();
