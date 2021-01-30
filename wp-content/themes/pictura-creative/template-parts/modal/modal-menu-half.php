<div class="menu-half"> <span class="modal-close"><img src="<?php echo get_stylesheet_directory_uri();?>/images/close-black.svg" ?></span>
  <?php
  wp_nav_menu( array(
    'theme_location' => 'menu-1',
    'menu' => 'Full screen menu',
  ) );
  ?>
  <div class="menu-wrap-bottom">
    <div class="menu-contact">
      <?php if(get_field("email","option")){?>
      <a href="<?php echo get_field("email","option");?>"><b>E</b> <?php echo get_field("email","option");?></a>
      <?php } ?>
      <br>
      <?php if(get_field("phone","option")){?>
      <a href="<?php echo get_field("phone","option");?>"><b>P </b><?php echo get_field("phone","option");?></a>
      <?php } ?>
      <?php if(get_field("address_1","option")){?>
      <div class="f_address">
        <p><b>A</b> <?php echo get_field("address_1","option")?> </p>
      </div>
      <?php } ?>
    </div>
    <div class="menu-social">
      <ul class="footer_social black_social">
        <?php if(get_field("facebook","option")){?>
        <li><a href="<?php echo get_field("facebook","option");?>" target="_blank" class="facebook" >Facebook</a></li>
        <?php } ?>
        <?php if(get_field("instagram","option")){?>
        <li><a href="<?php echo get_field("instagram","option");?>" target="_blank" class="instagram" >Instagram</a></li>
        <?php } ?>
        <?php if(get_field("facebook","option")){?>
        <li><a href="<?php echo get_field("facebook","option");?>"  target="_blank" class="twitter" >Twitter</a></li>
        <?php } ?>
        <?php if(get_field("facebook","option")){?>
        <li><a href="<?php echo get_field("facebook","option");?>" target="_blank" class="youtube" >Youtube</a></li>
        <?php } ?>
        <?php if(get_field("facebook","option")){?>
        <li><a href="<?php echo get_field("facebook","option");?>" target="_blank" class="google" >Google+</a></li>
        <?php } ?>
        <?php if(get_field("linkedin","option")){?>
        <li><a href="<?php echo get_field("linkedin","option");?>" target="_blank" class="linkedin" >linkedin</a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
</div>
