<?php $extraClass = get_sub_field("extra_class");?>
<section class="grid grid-normal <?php echo $extraClass ?>"
    style="background-color:<?php if (get_sub_field("grid_background_color")) {echo get_sub_field("grid_background_color");} else {echo '#fff';}?>?>;text-align:<?php echo get_sub_field('align_content'); ?>">
    <?php $grid_link_style = get_sub_field('grid_link_style')?>
    <div class="container">
        <div class="row contain">
            <?php if (get_sub_field('button_size')) {
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
    while (have_rows('grid_content')): the_row();?>
            <div class="col-sm-12 mb-40 col-md-<?php echo $col; ?>" data-aos="fade-up">
                <!-- IMAGE -->
                <div class="grid-img">
                    <?php $image = get_sub_field('image');
        $url = $image['url'];
        $title = $image['title'];
        $alt = $image['alt'];
        if ($image) {?>
                    <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
                    <?php } else {?>
                    <img src="<?php echo get_template_directory_uri() . '/images/placeholder.jpg'; ?>" alt="placeholder"
                        title="placeholder" />
                    <?php }?>
                </div>

                <!-- title -->
                <div class="grid-content ">
                    <?php if (get_sub_field('grid_title')) {?>
                    <h4 class="grid-title"><?php echo get_sub_Field('grid_title'); ?></h4>
                    <?php }?>

                    <?php if (get_sub_field('grid_content')) {?>
                    <div class="gridText "><?php echo get_sub_Field('grid_content'); ?></div>
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
