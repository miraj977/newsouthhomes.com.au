<footer class="footer-style2">
<?php if(get_field('footer_topbar','option') == 1) {?>
<div class="footer-top"  style="background-color: <?php echo get_field("footer_top_background_color","option");?>">
  <div class="container">
    <div class="row">
      <div class="col-md-12"> <a href="<?php echo site_url();?>"> <img src="<?php echo get_field('footer_logo','option');?>" /> </a> </div>
    </div>
  </div>
</div>
<?php } ?>
<div class="footer-middle" data-aos="fade-up" style="background-color: <?php echo get_field("copyright_background_color","option");?>">
<div class="container">
  <div class="row">
    <div class="col-md-3 animate visible-animation">
      <?php dynamic_sidebar("footer-1");?>
    </div>
    <div class="col-md-3 animate visible-animation">
      <?php dynamic_sidebar("footer-1");?>
    </div>
    <div class="col-md-3 animate visible-animation">
      <?php dynamic_sidebar("footer-1");?>
    </div>
    <div class="col-md-3 animate visible-animation">
      <?php dynamic_sidebar("footer-1");?>
    </div>
  </div>
</div>
<div class="footer-bottom" data-aos="fade-up" style="background-color: <?php echo get_field("footer_bottom_background_color","option");?>">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php if(get_field("address_1","option")){?>
        <div class="f_address">
          <h5>Location 1</h5>
          <?php echo get_field("address_1","option")?>
          <?php if(get_field("phone","option")){?>
          <a href="<?php echo get_field("phone","option");?>">P <?php echo get_field("phone","option");?></a>
          <?php } ?>
          <?php if(get_field("email","option")){?>
          <a href="<?php echo get_field("phone","option");?>">E <?php echo get_field("email","option");?></a>
          <?php } ?>
        </div>
        <?php } ?>
        <?php if(get_field("address_2","option")){?>
        <div class="f_address f_address2">
          <h5>Location 2</h5>
          <?php echo get_field("address_2","option")?>
          <?php if(get_field("phone","option")){?>
          <a href="<?php echo get_field("phone","option");?>">P <?php echo get_field("phone","option");?></a>
          <?php } ?>
        </div>
        <?php } ?>
  
        <ul class="footer_social white_social">
          <?php if(get_field("facebook","option")){?>
            <li><a href="<?php echo get_field("facebook","option");?>" target="_blank" class="facebook" >Facebook</a></li>
          <?php } ?>
    
          <?php if(get_field("instagram","option")){?>
            <li><a href="<?php echo get_field("instagram","option");?>" target="_blank" class="instagram" >Instagram</a></li>
          <?php } ?>
    
          <?php if(get_field("twitter","option")){?>
            <li><a href="<?php echo get_field("twitter","option");?>"  target="_blank" class="twitter" >Twitter</a></li>
          <?php } ?>
    
          <?php if(get_field("youtube","option")){?>
            <li><a href="<?php echo get_field("youtube","option");?>" target="_blank" class="youtube" >Youtube</a></li>
          <?php } ?>
    
    
          <?php if(get_field("google","option")){?>
            <li><a href="<?php echo get_field("google","option");?>" target="_blank" class="google" >Google+</a></li>
          <?php } ?>
    
          <?php if(get_field("linkedin","option")){?>
            <li><a href="<?php echo get_field("linkedin","option");?>" target="_blank" class="linkedin" >linkedin</a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php if(get_field('copyright','option') == 1) {?>
<div class="copyright"  style="background-color: <?php echo get_field("footer_background_color","option");?>">
  <div class="container">
    <div class="row">
      <div class="col-md-8"><?php echo get_field("copy_right_text","option") ?></div>
      <div class="col-md-4">
        <div class="policy_thanks"><?php echo get_field("copy_right_links","option");?></div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
</footer>
