<?php $extraClass = get_sub_field("extra_class");?>
<section class="container grid-fixedGrid <?php echo $extraClass ?>" style="background-color: <?php if (get_sub_field("home_section_background")) {echo get_sub_field("home_section_background");} else {echo '#fff';
    if (get_sub_field('main_title_class')) {$mainClass = get_sub_field('main_title_class');}
    if (get_sub_field('main_title_color')) {$mainColor = get_sub_field('main_title_color');}
    if (get_sub_field('content_class')) {$contentClass = get_sub_field('content_class');}
    if (get_sub_field('content_color')) {$contentColor = get_sub_field('content_color');}
    $quote = get_sub_field('main_sub_title');
    $quoteby = get_sub_field('quote_by');
}
?>">
    <div class="container p-0" style="max-width:1180px;">
        <div class="row contain" style="position:relative;">
            <div class="alter">
                <?php
if (get_sub_field('main_title')) {
    echo '<p class="customer-title ' . $mainClass . ' ' . $mainColor . ' bold text-left">' . get_sub_field('main_title') . '</p>';
}?>
                <?php if (get_sub_field('main_content')) {
    echo '<div class="bold main_content customer-content text-left ' . $contentClass . ' ' . $contentColor . '">' . get_sub_field('main_content') . '</div>';
}?>

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
    if (get_sub_field("content_color")) {$contentColor = get_sub_field("content_color");}?>
                <section class="test">
                    <div class="container-test">
                        <div class="right-div text-<?php echo $text_style; ?>" data-aos="fade-up">
                            <div class=" ">
                                <?php if (get_sub_field('content')) {?> <div
                                    class="stretched-text <?php echo $contentColor . ' ' . $contentClass; ?> testi-content">
                                    <?php echo get_sub_Field('content'); ?>
                                </div>
                                <?php }?>
                                <div class="testi-detail bold">
                                    <?php if (get_sub_field('title')) {?>
                                    <span class=" m-0 bold <?php echo $titleClass . ' ' . $titleColor; ?>">
                                        <?php echo get_sub_Field('title') . ', ' . get_sub_Field('sub_title'); ?>
                                    </span>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="left-div" data-aos="fade-up">
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
                </section>
                <?php
    if ($quote && $i == 1) {
        echo '<div class="quotes max-content-customer"><p class="text-center about-img-txt ">' . $quote . '</p></div>';
        echo '<div class="container text-center mid-gold p-st pt-0 quoteby">' . $quoteby . '</div>';
    }
    $i++;endwhile;?>
            </div>
        </div>
    </div>
</section>
