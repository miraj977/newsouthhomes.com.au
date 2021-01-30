<?php $extraClass = get_sub_field("extra_class");

if (get_sub_field("title_class")) {$titleClass = "st2";}
if (get_sub_field("title_primary_color")) {$titleColor = get_sub_field("title_primary_color");}

?>
<section class="container m-150 <?php echo $extraClass ?>" style="background-image:url(<?php echo get_sub_field('background_image'); ?>);background-color:<?php if (get_sub_field("background_color")) {echo get_sub_field("background_color");} else {echo '#fff';}
?>;">

    <div class="container p-0">
        <div class="row contain">
            <?php if (get_sub_field("title")) {?> <?php
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
    ?> <<?php echo $title_tag; ?> data-aos="fade-up"
                class="container <?php echo $italic . ' ' . $titleStyle . ' text-' . $title_align . ' ' . $titleClass . ' ' . $titleColor; ?>"
                style="color:<?php echo $color; ?>"> <?php echo $title; ?>
            </<?php echo $title_tag; ?>>
            <?php }?>
            <?php
}?>


            <?php while (have_rows('contents')): the_row();
    if (get_sub_field("title_class")) {$titleClass = get_sub_field("title_class");}
    if (get_sub_field("title_primary_color")) {$titleColor = get_sub_field("title_primary_color");}
    if (get_sub_field("content_class")) {$contentClass = get_sub_field("content_class");}
    if (get_sub_field("content_color")) {$contentColor = get_sub_field("content_color");}

    ?>
            <div class="col-sm-12">
                <?php if (get_sub_field("title")) {?>

                <<?php if ($titleTag) {echo $titleTag;} else {echo "h3";}
        ;?> class="<?php echo $titleClass . ' ' . $titleColor; ?> mb-6">
                    <?php the_sub_field('title');?>
                </<?php if ($titleTag) {echo $titleTag;} else {echo "h3";}
        ;?>>

                <?php }?>

                <?php if (get_sub_field("content")) {?>

                <div class="<?php echo $contentColor . ' ' . $contentClass; ?> mb-40">
                    <?php the_sub_field('content');?>
                </div>

                <?php }?>
            </div>
            <?php if (get_sub_field("image")) {?>
            <div class="col-12 choose-img">
                <img src="<?php echo get_sub_field('image')['url']; ?>">
            </div>
            <?php }?>
            <?php endwhile;?>
        </div>
    </div>
</section>
