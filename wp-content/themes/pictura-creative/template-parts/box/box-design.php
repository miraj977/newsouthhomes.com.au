<?php $extraClass = get_sub_field("extra_class");?>
<section class="container box-section box-normal <?php echo $extraClass ?>" style="background-image:url(<?php echo get_sub_field('background_image'); ?>);background-color:<?php if (get_sub_field("background_color")) {echo get_sub_field("background_color");} else {echo '#fff';}?>
">
    <?php $box_link_style = get_sub_field('box_link_style');
$box_align = get_sub_field('align_content');
?>
    <div class="container">
        <div class="row design-contain">
            <div class="col-sm-12 col-lg-12">
                <?php if (get_sub_field("sub_title")) {?>

                <<?php echo get_sub_field("heading_title_tag"); ?> class="box-sub-title st2-rt text-center">
                    <?php the_sub_field('sub_title');?>
                </<?php echo get_sub_field("sub_title_tag"); ?>>

                <?php }?>
                <?php if (get_sub_field("title")) {?>
                <?php
if (get_sub_field("title")) {

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
        $title_tag = 'h4';
    }

    if (get_sub_field("title_align")) {
        $title_align = get_sub_field("title_align");
    } else {
        $title_align = 'left';
    }

    $color = get_sub_field("title_color");

    $title = get_sub_field("title");
    ?>
                <<?php echo $title_tag; ?> data-aos="fade-up"
                    class="t2 <?php echo $italic . ' ' . $titleStyle . ' text-' . $title_align ?> pb-35"
                    style="color:<?php echo $color; ?>"> <?php echo $title; ?> </<?php echo $title_tag; ?>>
                <?php }?>
                <?php
}?>

                <?php if (get_sub_field("content")) {?>

                <p class="box-top-content p-lg max-content text-center main_content">
                    <?php the_sub_field('content');?>
                </p>

                <?php }?>
            </div>


            <?php $col = get_sub_field('number_of_columns');
$col = 12 / $col;
if (have_rows('box_content')):
    while (have_rows('box_content')): the_row();?>
            <div data-aos="fade-up" class="col-sm-12 col-md-6 col-lg-<?php echo $col; ?>  p-0 text-left">
                <div class="box-full" style="background-color:<?php if (get_sub_field("box_background_color")) {echo get_sub_field("box_background_color");}
        ?>">
                    <!-- IMAGE -->
                    <div class="box-img" style="height:100%;">
                        <?php $image = get_sub_field('icon');
        $url = $image['url'];
        $title = $image['title'];
        $alt = $image['alt'];
        $link = get_sub_field('box_link');
        if ($link) {$link_url = $link['url'];} else { $link_url = "#";}
        echo '<a href="' . $link_url . '">';
        if ($image) {?>
                        <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
                        <?php } else {?>
                        <img src="<?php echo get_template_directory_uri() . '/images/placeholder.jpg'; ?>"
                            alt="placeholder" title="placeholder" />
                        <?php }?>
                        </a>
                    </div>

                    <!-- title -->
                    <div class="box-content ">
                        <?php if (get_sub_field('box_title')) {?>
                        <p class="box-title"><?php echo get_sub_Field('box_title'); ?></p>
                        <?php }?>

                        <?php if (get_sub_field('box_content')) {?>
                        <div class="box-text "><?php echo get_sub_Field('box_content'); ?></div>
                        <?php }?>

                        <?php
        if (get_sub_field('button_size')) {
            $btnSize = 'btn-' . get_sub_field('button_size');
        } else {
            $btnSize = 'btn-small';
        }
        $link = get_sub_field('box_link');
        if ($link) {$link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';?>
                        <!-- <div class="content-link"><a class="btn btn-<?php //echo $box_link_style . ' ' . $btnSize; ?>"
																																														                                href="<?php //echo $link_url; ?>" target="<?php //echo $link_target; ?>">
																																														                                <?php //echo $link_title; ?>
																																														                            </a></div> -->
                        <?php }?>
                    </div>
                </div>
            </div>
            <?php endwhile;else:endif;?>
        </div>
    </div>
</section>
