<?php $content_bg = get_sub_field("content_background_color");
$extraClass = get_sub_field("extra_class");
if (get_sub_field("heading_class")) {$headingClass = get_sub_field("heading_class");}
if (get_sub_field("heading_title_tag")) {$headingTag = get_sub_field("heading_title_tag");}
if (get_sub_field("heading_primary_color") && get_sub_field('use_heading_color')) {$headingColor = get_sub_field("heading_primary_color");}
if (get_sub_field("title_class")) {$titleClass = get_sub_field("title_class");}
if (get_sub_field("sub_title_class")) {$subtitleClass = get_sub_field("sub_title_class");}
if (get_sub_field("sub_title_tag")) {$subtag = get_sub_field("sub_title_tag");}
if (get_sub_field("sub_title_class_copy")) {$subtitleClassc = get_sub_field("sub_title_class_copy");}
if (get_sub_field("sub_title_color_sub")) {$subcolorc = get_sub_field("sub_title_color_sub");}
if (get_sub_field("sub_title_tag_copy")) {$subtagc = get_sub_field("sub_title_tag_copy");}
if (get_sub_field("title_primary_color") && get_sub_field('title_primary_color')) {$titleColor = get_sub_field("title_primary_color");}
if (get_sub_field("content_class")) {$contentClass = get_sub_field("content_class");}
if (get_sub_field("content_color") && get_sub_field('use_content_color') == 1) {$contentColor = get_sub_field("content_color");}

?>
<?php if (is_front_page() || is_page(array('sydney-metro', 'central-coast', 'illawarra'))) {

    ?>
<script>
jQuery(document).ready(function() {
    jQuery('#location').css('background-size', '0px');
});
</script>
<div class="search-form container">
    <div class="text-center">
        <p class="p-md search-title bold">FIND YOUR DREAM HOME <span>OR HOUSE & LAND PACKAGE</span><a
                class="scroll-arrow"><img src="<?php echo get_template_directory_uri(); ?>/images/downarrow.svg"></a>
        </p>

        <form id="home-form" action="<?php echo site_url() . '/home-designs'; ?>" method="POST"
            class="form-srch desktop-form">

            <div class="ck-button btn-one">
                <label>
                    <input type="checkbox" value="newhomes" class="input-check" id="newhomes" checked>
                    <span class="check-span"><img src="<?php echo get_template_directory_uri() ?>
/images/house@2x.png" width="24px">&nbsp; New
                        Homes</span>
                </label>
            </div>
            <div class="ck-button btn-two">
                <label>
                    <input type="checkbox" value="houselands" class="input-check" id="houselands">
                    <span class="check-span">
                        <img src="<?php echo get_template_directory_uri() ?>/images/house-brown@2x.png" width="24px"
                            id="check-img">
                        <img src="<?php echo get_template_directory_uri() ?>/images/whitehnl.png" width="24px"
                            id="check-img2">&nbsp;
                        House &
                        Land</span>
                </label>
            </div>
            <div class=" select">
                <!-- Design Type Select Starts Here -->
                <select id="location" name="location" class="ht">
                    <option class="place-select" selected disabled id="icon">
                        Design Type</option>

                    <?php

    $hometypes = get_terms(array(
        'taxonomy' => array('home_types', 'storeys'),
        'hide_empty' => false,
    ));

    foreach ($hometypes as $ht) {
        ?>
                    <option style="font-family:'BasisGrotesquePro-Rg' !important;" value="<?php echo $ht->slug; ?>
								"><?php echo $ht->name; ?></option>
                    <?php }?>
                </select>
                <!-- Location Select Starts Here -->
                <select id="location" name="region" class="loc">
                    <option class="place-select" selected disabled id="icon">
                        Location</option>
                    <?php
$location = get_terms(array(
        'taxonomy' => 'region',
        'hide_empty' => false,
    ));
    foreach ($location as $loc) {
        ?>
                    <option style="font-family:'BasisGrotesquePro-Rg' !important;" value="<?php echo $loc->slug; ?>
								"><?php echo $loc->name; ?></option>
                    <?php }?>
                </select>
            </div>

            <div class="icon-wrap">
                <div class="select">

                    <select id="beds" name="bedroom">
                        <option selected disabled>Beds</option>
                        <?php
$bedrooms = get_terms(array(
        'taxonomy' => 'bedrooms',
        'hide_empty' => false,
    ));
    foreach ($bedrooms as $bed) {
        ?>
                        <option value="<?php echo $bed->slug; ?>
								"><?php echo str_replace('Bedroom', '', str_replace('Bedrooms', '', $bed->name)); ?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="select">

                    <select id="baths" name="bathroom">
                        <option selected disabled>Baths</option>
                        <?php
$baths = get_terms(array(
        'taxonomy' => 'bathrooms',
        'hide_empty' => false,
    ));
    foreach ($baths as $termsBath) {
        ?>
                        <option value="<?php echo $termsBath->slug; ?>
										"><?php echo str_replace('Bathroom', '', str_replace('Bathrooms', '', $termsBath->name)); ?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="select">

                    <select id="cars" name="car">
                        <option selected disabled>Cars</option>
                        <?php
$cars = get_terms(array(
        'taxonomy' => 'garage',
        'hide_empty' => false,
    ));
    foreach ($cars as $car) {
        ?>
                        <option value="<?php echo $car->slug; ?>
														"><?php echo $car->name; ?></option>
                        <?php }?>
                    </select>
                </div>
                <input style="font-family:BasisGrotesquePro-Rg !important;" type="submit" value="Find Your Home →"
                    name="submit" id="submit">
            </div>
        </form>




        <form id="home-form2" action="<?php echo site_url() . '/home-designs'; ?>" method="POST"
            class="tab-form form-srch">

            <div id="home-tab-filter">
                <div class="tab-section-2">
                    <div class="ck-button btn-one">
                        <label>
                            <input type="checkbox" value="newhomes" class="input-check" id="newhomes2" checked>
                            <span class="check-span"><img src="<?php echo get_template_directory_uri() ?>
/images/house@2x.png" width="24px">New
                                Homes</span>
                        </label>
                    </div>
                    <div class="ck-button btn-two">
                        <label>
                            <input type="checkbox" value="houselands" class="input-check" id="houselands2">
                            <span class="check-span">
                                <img src="<?php echo get_template_directory_uri() ?>/images/house-brown@2x.png"
                                    width="24px" id="check-img3">
                                <img src="<?php echo get_template_directory_uri() ?>/images/whitehnl.png" width="24px"
                                    id="check-img4">
                                House &
                                Land</span>
                        </label>
                    </div>
                    <div class="select select-tab">

                        <select id="beds" name="bedroom">
                            <option selected disabled>Beds</option>
                            <?php
$bedrooms = get_terms(array(
        'taxonomy' => 'bedrooms',
        'hide_empty' => false,
    ));
    foreach ($bedrooms as $bed) {
        ?>
                            <option value="<?php echo $bed->slug; ?>
								"><?php echo str_replace('Bedroom', '', str_replace('Bedrooms', '', $bed->name)); ?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="select select-tab">

                        <select id="baths" name="bathroom">
                            <option selected disabled>Baths</option>
                            <?php
$baths = get_terms(array(
        'taxonomy' => 'bathrooms',
        'hide_empty' => false,
    ));
    foreach ($baths as $termsBath) {
        ?>
                            <option value="<?php echo $termsBath->slug; ?>
										"><?php echo str_replace('Bathroom', '', str_replace('Bathrooms', '', $termsBath->name)); ?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="select select-tab car-select">

                        <select id="cars" name="car">
                            <option selected disabled>Cars</option>
                            <?php
$cars = get_terms(array(
        'taxonomy' => 'garage',
        'hide_empty' => false,
    ));
    foreach ($cars as $car) {
        ?>
                            <option value="<?php echo $car->slug; ?>
														"><?php echo $car->name; ?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="tab-section-2">

                    <div class="select select-tab location-select">
                        <!-- Design Type Select Starts Here -->
                        <select id="location" name="location" class="ht">
                            <option class="place-select" selected disabled id="icon">
                                Design Type</option>

                            <?php

    $hometypes = get_terms(array(
        'taxonomy' => 'home_types',
        'hide_empty' => false,
    ));

    foreach ($hometypes as $ht) {
        ?>
                            <option style="font-family:'BasisGrotesquePro-Rg' !important;" value="<?php echo $ht->slug; ?>
								"><?php echo $ht->name; ?></option>
                            <?php }?>
                        </select>
                        <!-- Location Select Starts Here -->
                        <select id="location" name="region" class="loc">
                            <option class="place-select" selected disabled id="icon">
                                Location</option>
                            <?php
$location = get_terms(array(
        'taxonomy' => 'region',
        'hide_empty' => false,
    ));
    foreach ($location as $loc) {
        ?>
                            <option style="font-family:'BasisGrotesquePro-Rg' !important;" value="<?php echo $loc->slug; ?>
								"><?php echo $loc->name; ?></option>
                            <?php }?>
                        </select>
                    </div>


                    <input style="font-family:BasisGrotesquePro-Rg !important;" type="submit" value="Find Your Home →"
                        name="submit" id="submit-home2">
                </div>
            </div>
        </form>
    </div>
</div>
<?php }?>

<?php if (get_sub_field('suburb_map')) {?>
<section class="grid suburb_map container pb-0" style="background: #f8f8f8;">
    <div class="row contain-home">
        <div class="text-center suburb-div">
			<<?php echo $subtagc;?> class="text-center <?php echo $subtitleClassc.' '.$subcolorc;?>"> <?php echo get_sub_field('subtitle_sub'); ?>
            </<?php echo $subtagc;?>>
            <<?php echo $subtag;?> class="t2 mid-gold text-center <?php echo $subtitleClass;?>"> <?php echo get_sub_field('title'); ?>
            </<?php echo $subtag;?>>
            <div class="p-lg grey suburb-desc"><?php echo get_sub_field('suburb_content'); ?>
            </div>
        </div>
        <?php echo get_sub_field('suburb_map'); ?>
        <table>
            <tr class="flex p-lr-20">
                <?php
while (have_rows("suburbs")): the_row();
        echo '<td class="p-md bold black sub-td" width="300px;" style="pading-top:6px;padding-bottom:6px;">';
										if(get_sub_field("sub_link")){
											echo '<a href="'.get_sub_field("sub_link").'" class="p-md bold black">' . get_sub_field("suburb_name") . '</a></td>';
										}else{
											echo get_sub_field("suburb_name") . '</td>';
											
										}
    endwhile;?>
            </tr>
        </table>
    </div>
</section>
<?php }?>
<section class="content container <?php echo $extraClass ?> text-<?php echo get_sub_field('align_content'); ?>"
    style="<?php if ($content_bg) {echo 'background-color:' . $content_bg;} else {echo "#fff";}?>">
    <div class="">
        <div class="row contain-home">
            <div class="col-xs-12 col-lg-12" data-aos="fade-up">
                <?php

if (get_sub_field("content_heading_title")) {

    if (get_sub_field("italic")) {
        $italic = "italic";
    } else {
        $italic = '';
    }

    if (get_sub_field("heading_title_tag")) {
        $title_tag = get_sub_field("heading_title_tag");
    } else {
        $title_tag = 'h3';
    }

    if (get_sub_field("title_align")) {
        $title_align = get_sub_field("title_align");
    } else {
        $title_align = 'left';
    }

    $color = get_sub_field("heading_font_color");

    $title = get_sub_field("content_heading_title");
    ?>
                <<?php echo $title_tag; ?>
                    class="<?php echo $italic . ' ' . $titleStyle . ' text-' . $title_align ?> heading_title <?php echo $headingClass . ' ' . $headingColor; ?>"
                    style="color:<?php echo $color; ?>"> <?php echo $title; ?>
                </<?php echo $title_tag; ?>>
                <?php }

if (get_sub_field("content_title")) {

    if (get_sub_field("title_style")) {
        $titleStyle = get_sub_field("title_style");
    } else {
        $titleStyle = 'bold';
    }

    if (get_sub_field("italic")) {
        $italic = "italic";
    } else {
        $italic = '';
    }

    if (get_sub_field("title_tag")) {
        $title_tag = get_sub_field("title_tag");
    } else {
        $title_tag = 'h3';
    }

    if (get_sub_field("title_align")) {
        $title_align = get_sub_field("title_align");
    } else {
        $title_align = 'left';
    }

    $color = get_sub_field("title_color");

    $title = get_sub_field("content_title");
    ?>
                <<?php echo $title_tag; ?>
                    class="t2 <?php echo $italic . ' ' . $titleStyle . $titleClass . ' ' . $titleColor . ' text-' . $title_align . ' ' . $titleClass ?>"
                    style="color:<?php echo $color; ?>;"> <?php echo $title; ?>
                </<?php echo $title_tag; ?>>
                <?php }?>

                <div class="p-lg max-content <?php echo $contentClass . ' ' . $contentColor; ?>"
                    style="color:<?php echo get_sub_field('font_color') ?>">
                    <?php echo get_sub_field("content_text"); ?> </div>
                <?php

if (get_sub_field('button_size')) {
    $btnSize = 'btn-' . get_sub_field('button_size');
} else {
    $btnSize = 'btn-small';
}
$link = get_sub_field('content_button_link');
if ($link) {
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                <div class="content-link"><a
                        class="btn btn-<?php echo get_sub_field('content_button_style') . ' ' . $btnSize; ?>"
                        href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>">
                        <?php echo $link_title; ?>
                    </a></div>
                <?php }?>


                <?php if (get_sub_field('image_left') && get_sub_field('image_right')) {
    $linkleft = get_sub_field('image_left_link');
    $lefturl = $linkleft['url'];
    $linkright = get_sub_field('image_right_link');
    $righturl = $linkright['url'];

    if (get_sub_field("image_title_class")) {
        $image_title_class = get_sub_field("image_title_class");
    }
    if (get_sub_field("image_title_color")) {
        $image_title_color = get_sub_field("image_title_color");
    }
    ?>
                <div class="image-txt-block">
                    <a href="<?php echo $lefturl; ?>">
                        <div class="col-md-6 img-block">
                            <img src="<?php the_sub_field('image_left');?>">
                            <div class="explore">
                                <?php if (get_sub_field('image_left_title')) {
        $image_title = get_sub_field('image_left_title');
        if (get_sub_field("image_title_tag")) {
            $img_title_tag = get_sub_field("image_title_tag");
        } else {
            $img_title_tag = 'h4';
        }

        ?>
                                <<?php echo $img_title_tag; ?>
                                    class="explore-title <?php echo $image_title_class . ' ' . $image_title_color; ?>">
                                    <?php echo $image_title; ?>
                                </<?php echo $img_title_tag; ?>>

                                <?php }

    //print_r($link);
    if ($linkleft) {

        $link_title_left = $linkleft['title'];
        $link_target_left = $linkleft['target'] ? $linkleft['target'] : '_self';
        ?>
                                <div class="img-link"><a class="btn btn-white" href="<?php echo $lefturl; ?>"
                                        target="<?php echo $link_target_left; ?>">
                                        <?php echo $link_title_left; ?>
                                    </a></div>
                                <?php }?>

                            </div>
                        </div>
                    </a>
                    <a href="<?php echo $righturl; ?>">
                        <div class="col-md-6 img-block">
                            <img src="<?php the_sub_field('image_right');?>">
                            <div class="explore">
                                <?php if (get_sub_field('image_right_title')) {
        $image_title = get_sub_field('image_right_title');
        if (get_sub_field("image_title_tag")) {
            $img_title_tag = get_sub_field("image_title_tag");
        } else {
            $img_title_tag = 'h4';
        }
        ?>
                                <<?php echo $img_title_tag; ?>
                                    class="explore-title <?php echo $image_title_class . ' ' . $image_title_color; ?>">
                                    <?php echo $image_title; ?>
                                </<?php echo $img_title_tag; ?>>

                                <?php }

    //print_r($link);
    if ($linkright) {

        $link_title_right = $linkright['title'];
        $link_target_right = $linkright['target'] ? $linkright['target'] : '_self';
        ?>
                                <div class="img-link"><a class="btn btn-white" href="<?php echo $righturl; ?>"
                                        target="<?php echo $link_target_right; ?>">
                                        <?php echo $link_title_right; ?>
                                    </a></div>
                                <?php }?>

                            </div>
                        </div>
                    </a>
                </div>
                <?php }?>


            </div>
        </div>
    </div>
</section>
<script>
jQuery(document).ready(function() {

    jQuery('.loc').css('display', 'none');
    jQuery('.ht').css({
        'background': 'url("<?php echo get_template_directory_uri() ?>/images/design.png") no-repeat left',
        'background-color': '#fff',
        'background-size': '24px',
        'background-position-x': '11px'
    });


    jQuery('#houselands').click(function() {
        jQuery('#home-form').attr('action', '<?php echo site_url() . "/house-and-land" ?>');
        jQuery('#check-img2').css('display', 'block');
        jQuery('#check-img').css('display', 'none');
        jQuery("#newhomes").prop("checked", false);
        jQuery("#houselands").prop("checked", true);
        jQuery('.ht').css('display', 'none');
        jQuery('.loc').css('display', 'block');
        jQuery('.loc').css({
            'background': 'url("<?php echo get_template_directory_uri() ?>/images/loc.png") no-repeat left',
            'background-color': '#fff',
            'background-size': '16px',
            'background-position-y': '15px',
            'background-position-x': '14px'
        });
    });

    jQuery('#newhomes').click(function() {
        jQuery('#home-form').attr('action', '<?php echo site_url() . "/home-designs" ?>');
        jQuery('#check-img').css('display', 'block');
        jQuery('#check-img2').css('display', 'none');
        jQuery("#houselands").prop("checked", false);
        jQuery("#newhomes").prop("checked", true);
        jQuery('.loc').css('display', 'none');
        jQuery('.ht').css('display', 'block');
        jQuery('.ht').css({
            'background': 'url("<?php echo get_template_directory_uri() ?>/images/design.png") no-repeat left',
            'background-color': '#fff',
            'background-size': '24px',
            'background-position-x': '11px'
        });
    });


    jQuery('#houselands2').click(function() {
        jQuery("#newhomes2").prop("checked", false);
        jQuery("#houselands2").prop("checked", true);
        jQuery('#location').children('option[value="thevalue"]').text('New Text');
        jQuery('.ht').css('display', 'none');
        jQuery('.loc').css('display', 'block');
        jQuery('.loc').css({
            'background': 'url("<?php echo get_template_directory_uri() ?>/images/loc.png") no-repeat left',
            'background-color': '#fff',
            'background-size': '16px',
            'background-position-y': '15px',
            'background-position-x': '14px'
        });
    });

    jQuery('#newhomes2').click(function() {
        jQuery("#houselands2").prop("checked", false);
        jQuery("#newhomes2").prop("checked", true);
        jQuery('.loc').css('display', 'none');
        jQuery('.ht').css('display', 'block');
        jQuery('.ht').css({
            'background': 'url("<?php echo get_template_directory_uri() ?>/images/design.png") no-repeat left',
            'background-color': '#fff',
            'background-size': '24px',
            'background-position-x': '11px'
        });
    });


    jQuery('#houselands2').click(function() {
        jQuery('#home-form2').attr('action', '<?php echo site_url() . "/house-and-land" ?>');
        jQuery('#check-img4').css('display', 'block');
        jQuery('#check-img3').css('display', 'none');
    });

    jQuery('#newhomes2').click(function() {
        jQuery('#home-form2').attr('action', '<?php echo site_url() . "/home-designs" ?>');
        jQuery('#check-img3').css('display', 'block');
        jQuery('#check-img4').css('display', 'none');
    });
	
});
</script>
