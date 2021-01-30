<header id="masthead" class="site-header container">
    <div class="container">
        <div class="row space">
            <div class="col-sm-6 col-md-6 col-lg-3 logo-margin">
                <div class="site-branding"> <a href="<?php echo site_url(); ?>" class="logo main_logo">
                        <?php if (get_field("banner") || is_front_page() || is_home() || is_page(array('sydney-metro', 'central-coast', 'illawarra'))) {?>
                        <img src="<?php echo get_field("logo", "option") ?>" style="width:158px;" />
                        <?php } else if (is_single() || is_search() || (!get_field("banner"))) {?>
                        <img src="<?php echo get_field("sticky_logo", "option") ?>" style="width:158px;" />
                        <?php } else {?>
                        <img src="<?php echo get_field("logo", "option") ?>" style="width:158px;" />
                        <?php }?>
                    </a>
                    <a href="<?php echo site_url(); ?>" class="logo sticky_logo"> <img
                            src="<?php echo get_field("sticky_logo", "option") ?>" style="width:158px;" /> </a>
                </div>
                <!-- .site-branding -->
            </div>
            <div class="col-lg-6 lg-nav">
                <nav id="site-navigation" class="main-navigation">
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                        <?php esc_html_e('Primary Menu', 'pictura-creative');?>
                    </button>
                    <?php
wp_nav_menu(array(
    'theme_location' => 'menu-1',
    'menu_id' => 'primary-menu',
));
?>
                </nav>
            </div>


            <div class="col-sm-6 col-md-6 col-lg-3 mobile-menu-div">
                <ul id="search" class="menu" style="display:flex;justify-content:flex-end;">
                    <li class="searchMenu"><a href="#openSearch">Search</a></li>

                    <?php if (get_field("enquiry_popup", "option") == 1) {?>
                    <li><a href="#popup" class="enquiry_btn">GET IN TOUCH</a></li>
                    <?php }?>
                </ul>
                <nav id="site-navigation-mobile" class="main-navigation nav-mobile">
                    <ul id="mobile-menu">
                        <li style="list-style-type:none;padding: 0.5rem 0;"><a href="#" class="burger">
                                <?php if (!get_field('banner') && !is_front_page()) {
    $img = "burger.svg";
} else { $img = "white-burger.svg";}
							if(is_page(array('sydney-metro','central-coast','illawarra'))){
								$img = "white-burger.svg";
							}
							?>
                                <img src="<?php echo get_template_directory_uri() ?>/images/<?php echo $img; ?>"
                                    style="max-width:none;margin-top:4px" id="white-burger" />
                                <img src="<?php echo get_template_directory_uri() ?>/images/burger.svg"
                                    style="max-width:none;margin-top:4px" id="black-burger" />
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>

        </div>
    </div>
</header>
<?php echo get_template_part('template-parts/header/inner', 'page-banner'); ?>
