<?php $extraClass = get_sub_field("extra_class");?>
<section class="quote <?php echo $extraClass?>" style="background-color: <?php echo get_sub_field('background_color')?>">
  <div class="container">
    <div class="row">
      <div class="col-sm-12" data-aos="fade-up"> <?php echo get_template_part ( 'template-parts/title/title', 'style' );
      if ( get_sub_field( "heading" ) ) {
        echo '<h1 class="heading text-' . get_sub_field( "align_headline" ) . '">' . get_sub_field( "heading" ) . '</h1>';
      }
      ?> </div>
      <?php
      if ( get_sub_field( "quote_alignment" ) == "left" ) {
        $order1 = 0;
        $order2 = 1;
      } else {
        $order1 = 1;
        $order2 = 0;
      }
      ?>
      <div class="col-md-5 col-lg-4 col-sm-12  quoteText order<?php echo $order1?>" data-aos="fade-up" >
        <h4><?php echo get_sub_field("quote") ?></h4>
      </div>
      <div class="col-md-7 col-lg-8 col-sm-12 order<?php echo $order2?>" data-aos="fade-up" >
       <?php  if ( get_sub_field( "text_column_title" ) ) {	?>
		  <h4 class="quote-col-title"><?php echo get_sub_field("text_column_title");?></h4>
		  <?php }?>
        <?php echo get_sub_field("text") ?> </div>
    </div>
  </div>
</section>
