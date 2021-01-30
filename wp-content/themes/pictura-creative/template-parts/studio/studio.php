<?php
if (get_sub_field("extra_class")) {$extraClass .= get_sub_field("extra_class");}

if (get_sub_field("content_background_color")) {$content_bg = get_sub_field("content_background_color");
}

?>
<section
    class="nh-content p-lr-20 container <?php echo $extraClass ?> text-<?php echo get_sub_field('align_content'); ?>"
    style="<?php if ($content_bg) {echo 'background-color:' . $content_bg;} else {echo "background-color:#ffffff";}?>;padding-top: 0px !important;">
    <div class="contain-container max-content">
        <div class="row contain">
            <?php while (have_rows('blocks')): the_row();
    if (get_sub_field("content_class")) {$contentClass = get_sub_field("content_class");}
    if (get_sub_field("content_color")) {$contentColor = get_sub_field("content_color");}
    if (get_sub_field("title_class")) {$titleClass = get_sub_field("title_class");}
    if (get_sub_field("title_primary_color") && get_sub_field('use_primary_color')) {$titleColor = get_sub_field("title_primary_color");}
    ?>
            <div class="col-xs-12 col-lg-12 style-div" data-aos="fade-up">
                <?php
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
                    class="main-heading studio-title <?php echo $italic . ' ' . $titleStyle . ' ' . $titleClass . ' ' . $titleColor . ' text-' . $title_align ?>"
                    style="color:<?php echo $color; ?>">
                    <?php echo $title; ?>
                </<?php echo $title_tag; ?>>
                <?php }?>

                <div class="text-left studio-content <?php echo $contentClass . ' ' . $contentColor; ?>"
                    style="color:<?php echo get_sub_field('font_color') ?>">
                    <?php echo get_sub_field("content_text"); ?> </div>
                <?php $image = get_sub_field('image');
    if ($image) {?>
                <section class="grid studio-div">
                    <div class="strecth-row stretch-home ">

                        <div class="col-md-6 col-sm-12 col-img resource-img align-self-center box-img-shadow"
                            style="order:1 !important;">
                            <?php
    $url = $image['url'];
        $title = $image['title'];
        $alt = $image['alt'];
        ?>

                            <div class="stretched-img resource-img-div trans">
                                <img src="<?php echo $url; ?>" alt="<?php echo $alt ?>" />
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12 col-text align-self-center box-text-shadow resource-img-txt  text-left"
                            data-aos="fade-up">
                            <div class=" ">
                                <p class="t2 st2 black trans-text"><?php echo get_sub_field('image_title') ?>
                                </p>
                            </div>
                        </div>

                    </div>
                </section>
                <?php }
    ?>
                <section class="count-section pb-0" style="max-width: 850px;">
                    <?php
    $count = 1;

    while (have_rows('elements')): the_row();?>
                    <div class="col-12 flex">
                        <div class="col-2 mid-gold count"><?php echo "0" . $count; ?></div>
                        <div class="col-10 text-left element-content">
                            <p class="st3 mid-gold bold"><?php echo get_sub_field('title'); ?></p>
                            <p class="p-md black"><?php echo get_sub_field('content') ?>
                            </p>
                        </div>
                    </div>
                    <?php $count++;
    endwhile;?>
                </section>


            </div>
            <?php endwhile;?>
            <?php if (get_sub_field('location')) {?>
            <div class=" container text-left contain-container p-lr-20 studio-map">
                <p class="studio-title mid-gold t2">Our Style Studio Location</p>
                <div class="col-12 flex p-0">
                    <div class="col-md-6 col-sm-12 p-0">

                        <p class="p-md black" style="max-width:240px"><?php echo get_sub_field('location'); ?></p>
                        <a href="https://www.google.com/maps/dir//20%2F7+Sefton+Rd,+Thornleigh+NSW+2120/@-33.7221871,151.0829781,17z/data=!4m8!4m7!1m0!1m5!1m1!1s0x6b12a70f00debea1:0x459b77c4336e46f0!2m2!1d151.0851668!2d-33.7221871
" class="gold-link">Get Directions →</a>
                    </div>
                    <div class="col-md-6 col-sm-12 p-0">

                        <?php echo get_sub_field('map_iframe'); ?>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</section>
