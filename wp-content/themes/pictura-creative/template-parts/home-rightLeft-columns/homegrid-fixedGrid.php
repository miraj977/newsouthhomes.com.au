<?php $extraClass = get_sub_field("extra_class");if (is_front_page()) {$extraClass .= " mob-pb-0";}?>
<section class="container grid-fixedGrid <?php echo $extraClass ?>" style="background-color: <?php if (get_sub_field("home_section_background")) {echo get_sub_field("home_section_background");} else {echo '#fff';}
?>;">
    <div class="container">
        <div class="row contain-home" style="position:relative;max-width: 1220px;">
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
    echo '<div class="p-lg main_content text-center max-content ' . $contentClass . ' ' . $contentColor . '">' . get_sub_field('main_content') . '</div>';
}?>
            <div class="alter">
                <?php while (have_rows('home_full_width_grid')): the_row();
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
                <section class="test">
                    <div class="container-test">
                        <div class="left-div">
                            <?php $image = get_sub_field('full_image');
    $url = $image['url'];
    $title = $image['title'];
    $alt = $image['alt'];
    ?>

                            <div class="stretched-img">
                                <img src="<?php echo $url; ?>" alt="<?php echo $alt ?>" />
                            </div>
                        </div>
                        <div class="right-div">
                            <div class="content-div text-left">
                                <?php if (get_sub_field('sub_title')) {?>
                                <<?php if ($headingTag) {echo $headingTag;} else {echo 'h4';}?>
                                    class="stretched-title sub_title <?php echo $headingClass . ' ' . $headingColor; ?>">
                                    <?php echo get_sub_Field('sub_title'); ?>
                                </<?php if ($headingTag) {echo $headingTag;} else {echo 'h4';}?>>
                                <?php }?>
                                <?php if (get_sub_field('title')) {?>
                                <<?php if ($titleTag) {echo $titleTag;} else {echo 'h4';}?>
                                    class="stretched-title title2 main_title text-left <?php echo $titleClass . ' ' . $titleColor; ?>">
                                    <?php echo get_sub_Field('title'); ?>
                                </<?php if ($titleTag) {echo $titleTag;} else {echo 'h4';}?>>
                                <?php }?> <?php if (get_sub_field('content')) {?>
                                <div class="stretched-text <?php echo $contentColor . ' ' . $contentClass; ?>">
                                    <?php echo wp_trim_words(get_sub_field('content'), 35, ' ...'); ?>
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
                        </div>
                </section>
                <?php
    $i++;endwhile;?>
            </div>
        </div>
    </div>
</section>
