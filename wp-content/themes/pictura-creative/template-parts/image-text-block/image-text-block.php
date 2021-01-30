<?php $extraClass = get_sub_field("extra_class");?>
<section class="guarantee container <?php echo $extraClass ?>"
    style="background-color: <?php echo get_sub_field("background_color"); ?>; padding:-1px 0px;">
    <div class="">
        <div class="row">

            <?php $grid_link_style = get_sub_field('link_style');
if (get_sub_field('button_size')) {
    $btnSize = 'btn-' . get_sub_field('button_size');
} else {
    $btnSize = 'btn-small';
}
$text_style = get_sub_field("home_align_content_in_box");?>
            <?php $i = 1;while (have_rows('home_full_width_grid')): the_row();?>

            <div class="strecth-row">

                <div class="col-md-6 col-sm-12 col-text align-self-center img-text-div p-lr-20 text-<?php echo $text_style; ?>"
                    style="margin:0;">
                    <div class=" ">
                        <?php if (get_sub_field('sub_title')) {?>
                        <p class="stretched-title box-sub-title st2-rt white">
                            <?php echo get_sub_Field('sub_title'); ?></p>
                        <?php }?>
                        <?php if (get_sub_field('title')) {?>
                        <p class="guarantee-title stretched-title mid-gold t2" style="color:#fff;">
                            <?php echo get_sub_Field('title'); ?>
                        </p>
                        <?php }?>

                        <?php if (get_sub_field('content')) {?>
                        <p class="stretched-text img-text-content"><?php echo get_sub_Field('content'); ?></p>
                        <?php }?>
                        <?php
    $link = get_sub_field('link');
    if ($link) {$link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';?>
                        <div class="content-link "><a
                                class="btn gold-link card_title btn-<?php echo $grid_link_style . ' ' . $btnSize; ?>"
                                href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>">
                                <?php echo $link_title; ?>
                            </a></div>
                        <?php }?>

                    </div>
                </div>
                <?php $image = get_sub_field('full_image');
    $url = $image['url'];
    $title = $image['title'];
    $alt = $image['alt'];
    ?>
                <div class="col-md-6 col-sm-12 col-img img-text-img align-self-center"
                    style="background-image:url('<?php echo $url; ?>'); background-position:top center;">


                    <!-- <div class="stretched-img">
																			                        <img src="<?php echo $url; ?>" alt="<?php echo $alt ?>" />
																			                    </div> -->
                </div>
            </div>

            <?php
    $i++;endwhile;?>
        </div>
    </div>
</section>
