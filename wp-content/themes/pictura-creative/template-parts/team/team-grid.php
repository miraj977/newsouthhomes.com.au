<?php $extraClass = get_sub_field("extra_class");?>
<section class="team team_grid <?php echo $extraClass?>" style="background-color:<?php echo get_sub_field("team_background_color")?> ">
<div class="container">
	<div class="row">
		<?php if(get_sub_field("title")){ ?>
		<div class="col-sm-12">
			<?php	echo get_template_part( 'template-parts/title/title', 'style' );?>
		</div><?php	
		 } 
		 $query = new WP_Query( array(
    'post_type' => 'team',
    'posts_per_page' => -1,
    'order' => 'ASC',
    'orderby' => 'date',
    'post_status' => 'publish'
  ) );
  if ( $query->have_posts() ) {
		while ( $query->have_posts() ) : $query->the_post(); ?>
		<div data-aos="fade-up" class="col-sm-6 col-xs-12 col-md-4 col-lg-3">
			<div class="team-grid">
			<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo esc_attr( get_the_title()); ?>" class="<?php echo get_sub_field("choose_image_style");?>"/>
			<div class="team-content">
			<?php if(get_field("position")){
			echo "<p class='bold'>". get_field("position")."</p>";		
			} ?>
				<h4><?php the_title();?></h4>
				<?php the_content();?>
			</div></div>
		</div>
		<?php    endwhile; }  wp_reset_postdata(); wp_reset_query();    ?>
	</div>
	</div>
</section>