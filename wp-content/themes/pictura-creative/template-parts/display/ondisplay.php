<?php $content_bg = get_sub_field("content_background_color");
$extraClass = get_sub_field("extra_class");
if (get_sub_field("heading_class")) {$headingClass = get_sub_field("heading_class");}
if (get_sub_field("heading_title_tag")) {$headingTag = get_sub_field("heading_title_tag");}
if (get_sub_field("heading_primary_color")) {$headingColor = get_sub_field("heading_primary_color");}
if (get_sub_field("title_class")) {$titleClass = get_sub_field("title_class");}
if (get_sub_field("title_primary_color") && get_sub_field("use_primary_color") == "true") {$titleColor = get_sub_field("title_primary_color");}
if (get_sub_field("content_class")) {$contentClass = get_sub_field("content_class");}
if (get_sub_field("content_color")) {$contentColor = get_sub_field("content_color");}
?>
<section class="content container pt-0 <?php echo $extraClass ?> text-<?php echo get_sub_field('align_content'); ?>"
    style="<?php if ($content_bg) {echo 'background-color:' . $content_bg;} else {echo "#fff";}?>">
    <?php if (have_rows("locations")):
    while (have_rows('locations')): the_row();?>

    <div class="container">
        <div class="row contain">
            <div class="col-xs-12 col-lg-12" data-aos="fade-up">
                <?php

        // print_r(get_field_objects());
        if (get_sub_field("heading_class")) {$headingClass = get_sub_field("heading_class");}
        if (get_sub_field("heading_title_tag")) {$headingTag = get_sub_field("heading_title_tag");}
        if (get_sub_field("heading_primary_color")) {$headingColor = get_sub_field("heading_primary_color");}
        if (get_sub_field("title_class")) {$titleClass = get_sub_field("title_class");}
        if (get_sub_field("title_primary_color") && get_sub_field("use_primary_color") == "true") {$titleColor = get_sub_field("title_primary_color");}
        if (get_sub_field("content_class")) {$contentClass = get_sub_field("content_class");}
        if (get_sub_field("content_color")) {$contentColor = get_sub_field("content_color");}

        ?>
                <div class="col-12 flex-title">
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
                        class="<?php echo $italic . ' ' . $titleStyle . $titleClass . ' ' . $titleColor . ' text-' . $title_align . ' ' . $titleClass ?>"
                        style="color:<?php echo $color; ?>;"> <?php echo $title; ?>
                    </<?php echo $title_tag; ?>>
                    <?php }?>

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
                        class=" <?php echo $italic . ' ' . $titleStyle . ' text-' . $title_align ?> <?php echo $headingClass . ' ' . $headingColor; ?>"
                        style="color:<?php echo $color; ?>;white-space:nowrap;"> <?php echo $title; ?>
                    </<?php echo $title_tag; ?>>
                    <?php }
        ?>
                </div>
                <div class="displayaddress">

                    <div class="col-lg-6 col-sm-12">
                        <div class="p-st max-conten text-left <?php echo $contentClass . ' ' . $contentColor; ?>"
                            style="color:<?php echo get_sub_field('font_color') ?>">
                            <?php echo get_sub_field("content_text"); ?> </div>
                        <?php
        $link = get_sub_field('content_button_link');
        if (!$link) {
            $link = "#";
        }?>
                        <div class="info">
                            <p class="p-md bold">Address</p>
                            <p class="p-st"><?php echo get_sub_field('address'); ?></p>
                            <a href="<?php echo $link; ?>" class="gold-link grey display-direction">Get Directions →</a>
                        </div>
                        <div class="info">
                            <p class="p-md bold">Phone</p>
                            <p class="p-st display-phone"><a class="p-st" href="tel:<?php echo get_sub_field('phone');
        ?>"><?php echo get_sub_field('phone'); ?></a></p>
                        </div>
                        <div class=" info">
                            <p class="p-md bold">Opening Hours</p>
                            <p class="p-st"><?php echo get_sub_field('opening_hours'); ?></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 map-iframe pb-50">
                        <?php echo get_sub_field('map_iframe'); ?>
                    </div>
                </div>

                <?php $featured_posts = get_sub_field('designs_on_display');
        if ($featured_posts) {
            ?>
                <p class="mid-gold st2 bold container dod-title">Designs on Display</p>
                <div class="designondisplay">
                    <?php foreach ($featured_posts as $featured_post) {
                $args = array(
                    'p' => $featured_post,
                    'post_type' => 'any',
                );
                $query = array_shift(query_posts($args));

                if ($query->post_title):
                    $termsBath = get_the_terms($query->ID, 'bathrooms');
                    $termsBath = array_shift($termsBath);
                    $storey = get_the_terms($query->ID, 'storeys');
                    $storey = array_shift($storey);
                    $bedroom = get_the_terms($query->ID, 'bedrooms');
                    $bedroom = array_shift($bedroom);
                    $storey = array_shift($storey);
                    $car = get_the_terms($query->ID, 'garage');
                    $car = array_shift($car);

                    ?>
                    <div class="col-sm-12 col-md-6 col-lg-3 p-0" data-aos="fade-up">
                        <div class="project-grid ">
                            <a href=" <?php echo $query->guid; ?>">
								<div class="img-pad" style="padding-bottom: 65%;position:relative;width: 100%;height:100%;">
                                <img src="<?php echo get_field_objects($featured_post)['home_details']['value'][0]['image']['url'] ?>"
                                        style="position:absolute;height:100%;width:100%;" />
 </div>
                                    <div class="projectMeta">
                                        <div class="projectIcons">
                                            <h5 class="p-lg gold-9b hd-title"><?php echo $query->post_title; ?>
                                            </h5>
                                            <?php
    $bedroom = $bedroom->name;
        if (!empty($bedroom)) {
            echo '<span class="icon-number"><img class="bedIcon" src="' . get_template_directory_uri() . '/images/Bed@2x.svg" />';
            echo str_replace("Bedrooms", "", $bedroom) . '</span>';
        } else {
            echo '<span class="icon-number"><img class="bedIcon" src="' . get_template_directory_uri() . '/images/Bed@2x.svg" />';
            echo '-</span>';

        }
        if (!empty($termsBath)) {?><span class="icon-number"><?php
    echo '<img class="bathIcon" src="' . get_template_directory_uri() . '/images/Bathtub@2x.svg" />';
            $bathroom = $termsBath->name;
            echo str_replace("Bathroom", "", str_replace("Bathrooms", "", $bathroom));
            echo "</span>";
        } else { ?><span class="icon-number"><?php
    echo '<img class="bathIcon" src="' . get_template_directory_uri() . '/images/Bathtub@2x.svg" />';
            echo "-</span>";

        }
        if (!empty($car)) { ?><span class="icon-number"><?php
    echo '<img class=" car-icon-hd" src="' . get_template_directory_uri() . '/images/car.svg" />';
            $car = $car->name;
            echo $car;
            echo "</span>";
        } else { ?><span class="icon-number"><?php
    echo '<img class=" car-icon-hd" src="' . get_template_directory_uri() . '/images/car.svg" />';
            echo "-</span>";

        }
        ?>
                                        </div>
                                    </div>
                            </a>
                        </div>
                    </div>
                    <?php
            //     endwhile;
                endif;
            }}
        ?>
                </div>
            </div>

        </div>
    </div>
    <?php
    endwhile;
endif;
?>
</section>
