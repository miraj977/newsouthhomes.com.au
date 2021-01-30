<?php
/**
 * Template Name: Career
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other
 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pictura_Creative
 */

get_header();
while ( have_posts() ): the_post();
if ( get_field( "show_page_info" ) == 1 ) {
  echo get_template_part( "template-parts/page", "heading" );
}

$pageLayout = get_field( "choose_layout" );
get_template_part( "template-parts/page", "fullWidth" );

if ( have_rows( 'job_openings' ) ):
  ?>
<section class="activeJobs">
<div class="container">
<div class="row">
  <?php  while ( have_rows('job_openings') ) : the_row();
	if(!get_sub_field("application_close")){?>
  
    <div class="col-md-6 col-sm-12">
		<div class="job_row" data-aos="fade-up">
      <h4 class="demiBold "><?php echo get_sub_field("job_title"); ?></h4>
      <?php echo get_sub_field("job_description"); ?>
      <?php
		
		if(get_field( 'button_size' ))
		{
			$btnSize = 'btn-'.get_field( 'button_size' );
		}
		else
		{
			$btnSize ='btn-small';
		}
        $link = get_sub_field( 'apply_now_link' );
        if ( $link ) {
          $link_url = $link[ 'url' ];
          $link_title = $link[ 'title' ];
          $link_target = $link[ 'target' ] ? $link[ 'target' ] : '_self';
          ?>
        <div class="content-link"><a class="btn btn-<?php echo get_field('apply_now_button_style') .' '. $btnSize;?>" href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>"> <?php echo $link_title; ?> </a></div>
        <?php  }?>
			
     
    </div>
    </div>
    <?php  } endwhile; ?>
	  </div>
</div>
</section>

<section class="expireJobs">
<div class="container">
<div class="row">
	<?php  while ( have_rows('job_openings') ) : the_row();
	if(get_sub_field("application_close")){?>
  
    <div class="col-md-4 col-sm-12 mb-40">
		<div class="job_column" data-aos="fade-up">
      <h4 class="demiBold text-white"><?php echo get_sub_field("job_title"); ?></h4>
			<div class="small">Applications Close <?php echo get_sub_field('application_close');?> </div>
      <?php echo get_sub_field("job_description"); ?>
      <?php
		
		if(get_field( 'button_size' ))
		{
			$btnSize = 'btn-'.get_field( 'button_size' );
		}
		else
		{
			$btnSize ='btn-small';
		}
        $link = get_sub_field( 'apply_now_link' );
        if ( $link ) {
          $link_url = $link[ 'url' ];
          $link_title = $link[ 'title' ];
          $link_target = $link[ 'target' ] ? $link[ 'target' ] : '_self';
          ?>
        <div class="content-link"><a class="btn btn-<?php echo get_field('apply_now_button_style') .' '. $btnSize;?>" href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>"> <?php echo $link_title; ?> </a></div>
        <?php  }?>
			
     
    </div>
    </div>
    <?php  } endwhile; ?>
	
  </div>
</div>
</section>
<?php
endif;
endwhile;
get_footer();
