<?php $extraClass = get_sub_field("extra_class");?>
<section class="grid-stretched <?php echo $extraClass?>">
<div class="row-stretched"  data-aos="fade-up" >
	
	<?php $grid_link_style  =  get_sub_field('link_style');
    if(get_sub_field( 'button_size' ))
    {
      $btnSize = 'btn-'.get_sub_field( 'button_size' );
    }
    else
    {
      $btnSize ='btn-small';
    }
	$text_style = get_sub_field("align_content_in_box");?>
<?php $i=1; while ( have_rows( 'full_width_grid' ) ): the_row();?>
		
	<div class="strecth-row">
	
	
	
		<div    class="col-md-6 col-sm-12 col-text full-text text-<?php echo $text_style;?>" style="background: <?php echo get_sub_field('background_color');?>">
			<div class="stretched-content stretched-right" data-aos="fade-up">
			<?php if(get_sub_field('title')) { ?>
			<h4 class="stretched-title"><?php echo get_sub_Field('title');?></h4>
			<?php }?>
			
			<?php if(get_sub_field('content')) { ?>
			<div class="stretched-text "><?php echo get_sub_Field('content');?></div>
			<?php }?>
				<?php 
					
						   $link = get_sub_field('link');
			if($link) {	 $link_url = $link['url'];
			$link_title = $link['title'];
			$link_target = $link['target'] ? $link['target'] : '_self';		?>
			<div class="content-link"><a class="btn btn-<?php echo $grid_link_style;?>" href="<?php echo $link_url.' '. $btnSize; ?>" target="<?php echo $link_target; ?>">
			<?php echo $link_title; ?>
			</a></div>
			<?php  }?>
				
			</div>
	</div>
    <?php $image = get_sub_field('full_image');
      $url = $image['url'];
      $title = $image['title'];
      $alt = $image['alt'];
    ?>
		<div class="col-md-6 col-sm-12 full-img col-img "  style="background-image: url('<?php echo $url?>')">
			<img src="<?php echo $url;?>" class="strecthImg" alt="<?php echo $alt;?>"/>
	</div>	</div>
		
		<?php 
$i++; endwhile;?>	
</div>
</section>