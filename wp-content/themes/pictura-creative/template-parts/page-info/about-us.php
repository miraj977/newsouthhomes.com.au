<?php $extraClass = get_sub_field("extra_class");

if (get_sub_field("title_class")) {$titleClass = get_sub_field("title_class");}
if (get_sub_field("title_primary_color")) {$titleColor = get_sub_field("title_primary_color");}

?>
<section class="container p-0 m-150 <?php echo $extraClass ?>" style="background-image:url(<?php echo get_sub_field('background_image'); ?>);background-color:<?php if (get_sub_field("background_color")) {echo get_sub_field("background_color");} else {echo '#fff';}
?>;">

    <div class="container p-0" style="max-width:1220px;">
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
                class=" container about-title <?php echo $italic . ' ' . $titleStyle . ' text-' . $title_align . ' ' . $titleClass . ' ' . $titleColor; ?>"
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

            <div class="strecth-row contain about-img" style="position:relative">


                <div class="col-md-6 col-lg-7 col-sm-12 col-img align-self-center " data-aos="fade-up">
                    <?php $image = get_sub_field('image');
        $url = $image['url'];
        $title = $image['title'];
        $alt = $image['alt'];
        ?>

                    <div class="stretched-img flow-img">
                        <img src="<?php echo $url; ?>" alt="<?php echo $alt ?>" />
                    </div>
                </div>
                <?php if (get_sub_field('image_text')) {?>
                <div class="col-md-6 col-lg-5 flow-text col-sm-12 col-text align-self-center text-<?php echo $text_style; ?>"
                    data-aos="fade-up">
                    <div class=" ">


                        <div class="about-img-txt">
                            <?php echo get_sub_Field('image_text'); ?>
                        </div>


                    </div>
                </div>
                <?php }?>
            </div>
            <?php }
endwhile;
$i = 0;

if (have_rows('timeline')): ?>
            <p class="t2 mid-gold history">History</p>
            <div class="timeline">
                <?php
while (have_rows('timeline')): the_row();
    if (get_sub_field("title_class")) {$titleClass = get_sub_field("title_class");}
    if (get_sub_field("title_primary_color")) {$titleColor = get_sub_field("title_primary_color");}
    if (get_sub_field("year_class")) {$yearClass = get_sub_field("year_class");}
    if (get_sub_field("year_color")) {$yearColor = get_sub_field("year_color");}
    if (get_sub_field("title_tag")) {$titleTag = get_sub_field("title_tag");}
    if (get_sub_field("year_tag")) {$yearTag = get_sub_field("year_tag");}
    if (get_sub_field("year")) {$year = get_sub_field("year");}
    if (get_sub_field("title")) {$title = get_sub_field("title");}
    if ($i % 2 == 0) {$class = "left";} else { $class = "right";}

    ?>
                <?php if ($i % 2 == 0) {echo '<div class="flex">';}?>
                <div class="container-time <?php echo $class; ?>">
                    <div class="content-time <?php echo $class . "-pos"; ?>
	">
                        <<?php echo $yearTag; ?> class=" <?php echo $yearClass . ' ' . $yearColor;
    ?> mb-0"><?php echo $year; ?>
                        </<?php echo $yearTag; ?>>
                        <<?php echo $titleTag; ?> class="<?php echo $titleClass . ' ' . $titleColor;
    ?>"><?php echo $title; ?>
                        </<?php echo $titleTag; ?>>
                        <div class="p-st black"><?php echo get_sub_field('content'); ?></div>
                        <img src="<?php echo get_sub_field('image')['url']; ?>">
                    </div>
                    <?php if ($i % 2 != 0) {echo '</div>';}?>
                </div>
                <?php
    $i++;
endwhile;
echo "</div>";
endif;?>



            </div>
        </div>
</section>
