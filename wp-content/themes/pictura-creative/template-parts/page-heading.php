<section class="page-heading">
<div class="container">
	<div class="row">
	<div class="col-sm-12" data-aos="fade-up">
		<div class="text-<?php echo get_field("alignment") ?>">
			<?php if(get_field("subtitle")){?>
			<h4><?php echo get_field("subtitle");?></h4>
			<?php }?>
			<h1 class="heading"><?php the_title();?></h1>
			<?php global $pageId; ?>
			<p><?php the_content($pageId);?></p>
		</div>
		</div>
	</div>
	
	</div>
</section>