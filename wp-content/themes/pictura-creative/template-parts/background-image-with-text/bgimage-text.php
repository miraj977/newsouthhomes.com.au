<?php $extraClass = get_sub_field("extra_class");?>
<section class="bgImage <?php echo $extraClass?>" style="background-image:url('<?php echo get_sub_field("image")?>') ">
	<div class="container">
	<div class="row" data-aos="fade-up" >
		<?php if(get_sub_field("text_align")=="center"){
		$class="col-md-12 col-lg-8 textCenter";
		}else
		{
		$class="col-md-12";
		} ?>
		<div class="<?php echo $class?>">
		<?php if(get_sub_field("title")){ 
		echo get_template_part( 'template-parts/title/title', 'style' );
		 } ?>
		<h2 class="bgText mb-0 text-<?php echo get_sub_field("text_align");?>" style="color: <?php echo get_sub_field(text_color);?>; ">
			<?php echo get_sub_field("text");?>
			</h2>		
		</div>
		</div>
	</div>
</section>