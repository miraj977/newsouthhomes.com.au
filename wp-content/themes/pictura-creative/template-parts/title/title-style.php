 <?php
if (get_sub_field("title_class")) {$titleClass = get_sub_field("title_class");}
if (get_sub_field("title_primary_color") && get_sub_field('use_primary_color')) {$titleColor = get_sub_field("title_primary_color");}

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
     class="sectionTitle <?php echo $titleClass . ' ' . $titleColor; ?> <?php echo $italic . ' ' . $titleStyle . ' text-' . $title_align ?>"
     style="color:<?php echo $color; ?>;"> <?php echo $title; ?>
 </<?php echo $title_tag; ?>>
 <?php }?>
