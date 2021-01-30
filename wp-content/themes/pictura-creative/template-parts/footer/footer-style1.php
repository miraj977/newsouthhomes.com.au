<footer>
    <?php if (get_field('footer_topbar', 'option') == 1) {?>
    <div class="footer-top container"
        style="background-color: <?php echo get_field("footer_top_background_color", "option"); ?>">
        <div class="container">
            <div class="row contain">
                <div class="col-sm-3  col-xs-12 align-self-center" data-aos="fade-up">
                    <a href="<?php echo site_url(); ?>">
                        <img src="<?php echo get_field('footer_logo', 'option'); ?>" style="width:158px" />
                    </a>
                </div>

                <div class="col-sm-9 col-xs-12 align-self-center socialMediaLG">
                    <ul class="footer_social white_social">
                        <?php if (get_field("facebook", "option")) {?>
                        <li><a href="<?php echo get_field("facebook", "option"); ?>" target="_blank"
                                class="facebook">Facebook</a></li>
                        <?php }?>

                        <?php if (get_field("instagram", "option")) {?>
                        <li><a href="<?php echo get_field("instagram", "option"); ?>" target="_blank"
                                class="instagram">Instagram</a></li>
                        <?php }?>

                        <?php if (get_field("twitter", "option")) {?>
                        <li><a href="<?php echo get_field("twitter", "option"); ?>" target="_blank"
                                class="twitter">Twitter</a></li>
                        <?php }?>

                        <?php if (get_field("youtube", "option")) {?>
                        <li><a href="<?php echo get_field("youtube", "option"); ?>" target="_blank"
                                class="youtube">Youtube</a></li>
                        <?php }?>


                        <?php if (get_field("google", "option")) {?>
                        <li><a href="<?php echo get_field("google", "option"); ?>" target="_blank"
                                class="google">Google+</a></li>
                        <?php }?>

                        <?php if (get_field("linkedin", "option")) {?>
                        <li><a href="<?php echo get_field("linkedin", "option"); ?>" target="_blank"
                                class="linkedin">linkedin</a></li>
                        <?php }?>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <?php }?>
    <div class="footer-middle container"
        style="background-color: <?php echo get_field("copyright_background_color", "option"); ?>;    margin-top: -1px;">
        <div class="container">
            <div class="row contain">
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12" data-aos="fade-up">
                    <?php if (get_field("phone", "option")) {?>
                    <div class="phone-footer">
                        <span class="nodec">Phone:</span><a href="tel:<?php echo get_field("phone", "option"); ?>">
                            <?php echo get_field("phone", "option"); ?></a>
                    </div>
                    <?php }?>
                    <?php if (get_field("email", "option")) {?>
                    <div class="emailaddress">
                        <span class="nodec">Email:</span><a style="color:#fff;"
                            href="mailto:<?php echo get_field("email", "option"); ?>">
                            <?php echo get_field("email", "option"); ?></a>
                    </div>
                    <?php }?>
                    <?php if (get_field("address_1", "option")) {?>
                    <div class="f_address">
                        <a class="" href="https://www.google.com/maps/place/20%2F7+Sefton+Rd,+Thornleigh+NSW+2120/@-33.722187,151.085167,16z/data=!4m5!3m4!1s0x6b12a70f00debea1:0x459b77c4336e46f0!8m2!3d-33.7221871!4d151.0851668?hl=en
" target="_blank"> <?php echo get_field("address_1", "option") ?></a>
                    </div>
                    <?php }?>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 site-map" data-aos="fade-up">
                    <?php dynamic_sidebar("footer-1");?>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" data-aos="fade-up">
                    <?php dynamic_sidebar("footer-2");?>

                </div>
				<div class="col-sm-9 col-xs-12 align-self-center socialMediaSM">
                    <ul class="footer_social white_social">
                        <?php if (get_field("facebook", "option")) {?>
                        <li><a href="<?php echo get_field("facebook", "option"); ?>" target="_blank"
                                class="facebook"></a></li>
                        <?php }?>

                        <?php if (get_field("instagram", "option")) {?>
                        <li><a href="<?php echo get_field("instagram", "option"); ?>" target="_blank"
                                class="instagram"></a></li>
                        <?php }?>

                        <?php if (get_field("twitter", "option")) {?>
                        <li><a href="<?php echo get_field("twitter", "option"); ?>" target="_blank"
                                class="twitter"></a></li>
                        <?php }?>

                        <?php if (get_field("youtube", "option")) {?>
                        <li><a href="<?php echo get_field("youtube", "option"); ?>" target="_blank"
                                class="youtube"></a></li>
                        <?php }?>


                        <?php if (get_field("google", "option")) {?>
                        <li><a href="<?php echo get_field("google", "option"); ?>" target="_blank"
                                class="google"></a></li>
                        <?php }?>

                        <?php if (get_field("linkedin", "option")) {?>
                        <li><a href="<?php echo get_field("linkedin", "option"); ?>" target="_blank"
                                class="linkedin"></a></li>
                        <?php }?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php if (get_field('copyright', 'option') == 1) {?>
    <div class="copyright container"
        style="background-color: <?php echo get_field("footer_background_color", "option"); ?>;    margin-top: -1px;">
        <div class="container">
            <div class="row contain desktop-copyright">
                <div class="col-sm-9">
                    <p><?php echo get_field("copy_right_text", "option") . '&nbsp;&nbsp;&nbsp;&nbsp;' ?><?php echo get_field("copy_right_links", "option"); ?>
                    </p>
                </div>
                <div class="col-sm-3 text-right site-by">
                    <p>Site by <a href="https://www.picturacreative.com.au" traget="_blank">Pictura Creative</a>
                    </p>
                </div>
            </div>
			<div class="row contain mobile-copyright">
                <div class="col-sm-12">
                    <p><?php echo get_field("copy_right_text", "option");?>
                    </p>
                </div>
				                <div class="col-sm-6 copy-link">
                   <?php echo get_field("copy_right_links", "option"); ?>
                </div>
                <div class="col-sm-6 text-right site-by">
                    <p>Site by <a href="https://www.picturacreative.com.au" traget="_blank">Pictura Creative</a></p>
                </div>
            </div>
        </div>
    </div>
    <?php }?>


</footer>
