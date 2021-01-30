<div class="menu-full"> 
	<span class="modal-close"><img src="<?php echo get_stylesheet_directory_uri();?>/images/close_icon_grey.svg" ?></span>
  <div class="menu-wrap-top">
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
  </div>
  <div class="menu-wrap-bottom">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <?php if(get_field("address_1","option")){?>
          <div class="f_address">
          
            <b>A </b><?php echo get_field("address_1","option")?>
            <?php if(get_field("phone","option")){?>
            <a href="<?php echo get_field("phone","option");?>"><b>P</b> <?php echo get_field("phone","option");?></a>
            <?php } ?>
            <?php if(get_field("email","option")){?>
            <a href="<?php echo get_field("phone","option");?>"><b>E </b><?php echo get_field("email","option");?></a>
            <?php } } ?>
          </div>
          <div class="menu-social">
            <ul class="footer_social white_social">
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
    </div>
  </div>
</div>
