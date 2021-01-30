<?php $extraClass = get_sub_field("extra_class");?>
<?php $content_bg = get_sub_field("content_background_color");
if(get_sub_field("content_text")) {?>
<section  class="content <?php echo $extraClass?> text-<?php echo get_sub_field( 'align_content' );?>" style="<?php if($content_bg){  echo 'background-color:'.$content_bg; } ?>">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-lg-12" data-aos="fade-up">
        <?php if(get_sub_field("title")){ 
	echo get_template_part( 'template-parts/title/title', 'style' );		
		 } ?>
      
        <div class="content-text" style="color:<?php echo get_sub_field('font_color') ?>"> <?php echo get_sub_field("content_text");?> </div>
        <?php
		
		if(get_sub_field( 'button_size' ))
		{
			$btnSize = 'btn-'.get_sub_field( 'button_size' );
		}
		else
		{
			$btnSize ='btn-small';
		}
        $link = get_sub_field( 'content_button_link' );
        if ( $link ) {
          $link_url = $link[ 'url' ];
          $link_title = $link[ 'title' ];
          $link_target = $link[ 'target' ] ? $link[ 'target' ] : '_self';
          ?>
        <div class="content-link"><a class="btn btn-<?php echo get_sub_field('content_button_style') .' '. $btnSize;?>" href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>"> <?php echo $link_title; ?> </a></div>
        <?php  }?>
		  
		  
      </div>
		
    </div>
  </div>
</section>
<?php } ?>
<?php echo do_shortcode('['.get_sub_field("shortcode").']')?>