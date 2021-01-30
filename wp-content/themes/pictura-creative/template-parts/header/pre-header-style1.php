<div class="pre-header style1" style="background-color: <?php  echo get_field("pre_header_background_color","option");?>">
<div class="container">
	
	<div class="row">
	<div class="col-xs-12 col-sm-4 align-self-center" >
		<div class="top_left">
		<p><?php echo get_field("pre_header_left_content","option");?></p></div></div>
		<div class="col-xs-12 col-sm-8 align-self-center">
			<div class="top_right">
			<p><a class="tele" href="tel:<?php echo get_field("pre_header_right_content","option");?>"><?php echo get_field("pre_header_right_content","option");?></a></p>
			<?php if(get_field("enquiry_popup","option") == 1){?>
			<a href="#popup" class="enquiry_btn">Enquire now</a>
			<?php } ?>
			
			<?php if(get_field("get_in_touch","option") == 1){?>
			<a href="/contact" class="get_in_btn">Get in touch</a>
			<?php } ?>
		</div></div>
	</div>
	</div>


</div>