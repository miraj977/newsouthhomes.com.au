<?php $extraClass = get_sub_field("extra_class");
if (get_sub_field("heading_class")) {$headingClass = get_sub_field("heading_class");}
if (get_sub_field("heading_tag")) {$headingTag = get_sub_field("heading_tag");}
if (get_sub_field("sub_tag")) {$subTag = get_sub_field("sub_tag");}
if (get_sub_field("heading_font_color")) {$headingColor = get_sub_field("heading_font_color");}
if (get_sub_field("title_class")) {$titleClass = get_sub_field("title_class");}
if (get_sub_field("title_primary_color")) {$titleColor = get_sub_field("title_primary_color");}
if (get_sub_field("content_class")) {$contentClass = get_sub_field("content_class");}
if (get_sub_field("content_color")) {$contentColor = get_sub_field("content_color");}
?>
<section class="grid-text <?php echo $extraClass ?>" style="background-color:<?php if (get_sub_field("grid_background_color")) {echo get_sub_field("grid_background_color");} else {echo '#fff';}
?>;text-align:<?php echo get_sub_field('align_content'); ?>">
    <?php $grid_link_style = get_sub_field('grid_link_style')?>
    <div class="container">
        <div class="row contain">
            <?php
if (get_sub_field('button_size')) {
    $btnSize = 'btn-' . get_sub_field('button_size');
} else {
    $btnSize = 'btn-small';
}
if (get_sub_field("title")) {?>
            <div class="col-sm-12">
                <?php	echo get_template_part('template-parts/title/title', 'style'); ?>
            </div><?php
}?>
            <?php $col = get_sub_field('number_of_columns');
$col = 12 / $col;
if (have_rows('grid_content')):
    while (have_rows('grid_content')): the_row();
        if (get_sub_field("heading_class")) {$headingClass = get_sub_field("heading_class");}
        if (get_sub_field("heading_tag")) {$headingTag = get_sub_field("heading_tag");}
        if (get_sub_field("sub_tag")) {$subTag = get_sub_field("sub_tag");}
        if (get_sub_field("heading_font_color")) {$headingColor = get_sub_field("heading_font_color");}
        if (get_sub_field("title_class")) {$titleClass = get_sub_field("title_class");}
        if (get_sub_field("title_primary_color")) {$titleColor = get_sub_field("title_primary_color");}
        if (get_sub_field("content_class")) {$contentClass = get_sub_field("content_class");}
        if (get_sub_field("content_color")) {$contentColor = get_sub_field("content_color");}
        ?>
            <div data-aos="fade-up" class="col-sm-12 mb-40 col-md-<?php echo $col; ?>">
                <!-- title -->
                <div class="grid-content pb-0">
                    <?php if (get_sub_field('grid_title')) {?>
                    <h4 class="grid-title <?php echo $titleClass . ' ' . $titleColor; ?>">
                        <?php echo get_sub_Field('grid_title'); ?></h4>
                    <?php }?>

                    <?php if (get_sub_field('grid_content')) {?>
                    <div class=" gridText mb-0 <?php echo $contentClass . ' ' . $contentColor; ?>">
                        <?php echo get_sub_Field('grid_content'); ?>
                    </div>
                    <?php }?>

                    <?php $link = get_sub_field('grid_link');

        if ($link) {$link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';?>
                    <div class="content-link"><a class="btn btn-<?php echo $grid_link_style; ?>"
                            href="<?php echo $link_url . ' ' . $btnSize; ?>" target="<?php echo $link_target; ?>">
                            <?php echo $link_title; ?>
                        </a></div>
                    <?php }?>
                </div>
            </div>
            <?php endwhile;else:endif;?>
        </div>
    </div>
</section>
