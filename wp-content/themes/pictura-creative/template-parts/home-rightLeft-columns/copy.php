<?php $extraClass = get_sub_field("extra_class");if (is_front_page()) {$extraClass .= " mob-pb-0";}?>
<section class="container grid-fixedGrid <?php echo $extraClass ?>" style="background-color: <?php if (get_sub_field("home_section_background")) {echo get_sub_field("home_section_background");} else {echo '#fff';}
?>">
    <div class="container">
        <div class="row contain">
            <div class="max-content-div">

                <?php if (get_sub_field('main_sub_title')) {
    echo '<h3 class="st2-rt text-center grey">' . get_sub_field('main_sub_title') . '</h3>';
}?>
                <?php
if (get_sub_field('main_title_class')) {$mainClass = get_sub_field('main_title_class');}
if (get_sub_field('main_title_color')) {$mainColor = get_sub_field('main_title_color');}
if (get_sub_field('content_class')) {$contentClass = get_sub_field('content_class');}
if (get_sub_field('content_color')) {$contentColor = get_sub_field('content_color');}

if (get_sub_field('main_title')) {
    echo '<h2 class=" ' . $mainClass . ' ' . $mainColor . ' text-center">' . get_sub_field('main_title') . '</h2>';
}?>
                <?php if (get_sub_field('main_content')) {
    echo '<div class="max-content-div p-lg main_content text-cetner ' . $contentClass . ' ' . $contentColor . '">' . get_sub_field('main_content') . '</div>';
}?>
            </div>
            <?php $grid_link_style = get_sub_field('home_link_style');
if (get_sub_field('home_button_size')) {
    $btnSize = 'btn-' . get_sub_field('button_size');
} else {
    $btnSize = 'btn-small';
}
$text_style = get_sub_field("home_align_content_in_box");?>
            <?php $i = 1;
while (have_rows('home_full_width_grid')): the_row();
    if (get_sub_field("title_class")) {$titleClass = get_sub_field("title_class");}
    if (get_sub_field("title_tag")) {$titleTag = get_sub_field("title_tag");}
    if (get_sub_field("title_primary_color")) {$titleColor = get_sub_field("title_primary_color");}
    if (get_sub_field("sub_tag")) {$headingTag = get_sub_field("sub_tag");}
    if (get_sub_field("heading_class")) {$headingClass = get_sub_field("heading_class");}
    if (get_sub_field("heading_font_color")) {$headingColor = get_sub_field("heading_font_color");}
    if (get_sub_field("content_class")) {$contentClass = get_sub_field("content_class");}
    if (get_sub_field("content_color")) {$contentColor = get_sub_field("content_color");}
    $link = get_sub_field('link');
    $link_url = $link['url'];

    ?>


            <div class="strecth-row stretch-home contain">

                <div class="col-md-12 col-lg-5 col-sm-12 col-text align-self-center box-text-shadow text-<?php echo $text_style; ?>"
                    data-aos="fade-up">
                    <div class=" ">
                        <?php if (get_sub_field('sub_title')) {?>
                        <<?php if ($headingTag) {echo $headingTag;} else {echo 'h4';}?>
                            class="stretched-title sub_title <?php echo $headingClass . ' ' . $headingColor; ?>">
                            <?php echo get_sub_Field('sub_title'); ?>
                        </<?php if ($headingTag) {echo $headingTag;} else {echo 'h4';}?>>
                        <?php }?>
                        <?php if (get_sub_field('title')) {?>
                        <<?php if ($titleTag) {echo $titleTag;} else {echo 'h4';}?>
                            class="stretched-title title2 main_title text <?php echo $titleClass . ' ' . $titleColor; ?>">
                            <?php echo get_sub_Field('title'); ?>
                        </<?php if ($titleTag) {echo $titleTag;} else {echo 'h4';}?>>
                        <?php }?> <?php if (get_sub_field('content')) {?> <div
                            class="stretched-text <?php echo $contentColor . ' ' . $contentClass; ?>">
                            <?php echo wp_trim_words(get_sub_field('content'), 35, ' ...'); ?>
                        </div>
                        <?php }?>
                        <?php

    if ($link) {
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';?>
                        <div class="content-links home-content-explore"><a
                                class="btn gold-link btn-<?php echo $grid_link_style . ' ' . $btnSize; ?>"
                                href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>">
                                <?php echo $link_title; ?>
                            </a></div>
                        <?php }?>

                    </div>
                </div>

                <div class="col-md-12 col-lg-7 col-sm-12 col-img scale-img align-self-center box-img-shadow"
                    data-aos="fade-up">
                    <?php $image = get_sub_field('full_image');
    $url = $image['url'];
    $title = $image['title'];
    $alt = $image['alt'];
    ?>

                    <div class="stretched-img">
                        <img src="<?php echo $url; ?>" alt="<?php echo $alt ?>" />
                    </div>
                </div>
            </div>

            <?php
    $i++;endwhile;?>
        </div>
    </div>
</section>
