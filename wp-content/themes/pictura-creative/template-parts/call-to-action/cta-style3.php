<section class="cta cta_style3 text-center" style="background: <?php echo get_field('cta_background_color',"option");?>">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-sm-12 m-auto">
        <div class="cta_text" data-aos="fade-up">
          <h4 class="regular"><?php echo get_field('call_to_action_content',"option");?></h4>
        </div>
        <?php
        $link = get_field( 'button' ,"option");
        if ( get_field( 'button_size' ,"option") ) {
          $btnSize = 'btn-' . get_field( 'button_size' ,"option");
        } else {
          $btnSize = 'btn-small';
        }
        if ( $link ) {
          $link_url = $link[ 'url' ];
          $link_title = $link[ 'title' ]; 
          $link_target = $link[ 'target' ] ? $link[ 'target' ] : '_self';
          ?>
        <div class="cta-link" data-aos="fade-up"><a class="btn btn-<?php echo get_field('button_style',"option").' '. $btnSize;?>" href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>"> <?php echo $link_title; ?> -> </a></div>
        <?php } ?>
      </div>
    </div>
  </div>
  </div>
</section>
