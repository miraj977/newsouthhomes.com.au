<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pictura_Creative
 */

get_header();
?>
<section class="page-heading">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="text-<?php echo get_field("alignment",$blogPageId) ?>">
          <?php if(get_field("subtitle",$blogPageId)){?>
          <h4><?php the_archive_title();?></h4>
          <?php }?>
          <h1 class="heading"><?php echo get_the_title($blogPageId);?></h1>
        </div>
      </div>
    </div>
  </div>
</section>
				
<section class="blog-list">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-lg-9 col-sm-12">
        <?php
        if ( have_posts() ):
          while ( have_posts() ):
            the_post();

        get_template_part( 'template-parts/blog/blog', 'listpage' );

        endwhile;
        endif;
        ?>
       
        
      </div>
      <div class="col-md-4 col-lg-3 col-sm-12">
        <div class="sidebar blogSidebar">
          <?php dynamic_sidebar("blog-sidebar"); ?>
        </div>
      </div>
		<div class="col-sm-12">
		<nav class="pagination">
				<?php pagination_bar(); ?>
				</nav>						
		</div>
		
    </div>
  </div>
</section>
<?php
get_footer();
