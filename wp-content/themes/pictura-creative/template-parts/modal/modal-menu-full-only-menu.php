<div class="menu-half-only-menu">
    <span class="logo-menu">
        <a href="<?php echo site_url(); ?>"><img
                            src="<?php echo get_field("logo", "option") ?>" style="width:158px;" /></a></span>
    <span class="modal-close"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/close_icon_grey.svg"
            ?></span>

    <form class="searchForm searchForm2" action="<?php echo site_url();?>" method="get" style="position:absolute;top:112px;">
        <input type="text" name="s" id="searchinput" placeholder="Search this site…" value="<?php the_search_query();?>"
            style="border-bottom:2px solid white;border-radius:0 !important;" />
        <input type="submit" alt="Search" class="burger-search" />
    </form>

    <div class="col-sm-12">
        <?php
wp_nav_menu(array(
    'theme_location' => 'menu-1',
    'menu' => 'Full screen menu',
));
?>
    </div>
</div>
