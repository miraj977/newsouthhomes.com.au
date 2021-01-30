<?php
if (get_sub_field("extra_class")) {$extraClass .= get_sub_field("extra_class");}

if (get_sub_field("content_background_color")) {$content_bg = get_sub_field("content_background_color");
}

if (get_sub_field("content_class")) {$contentClass = get_sub_field("content_class");}
if (get_sub_field("content_color")) {$contentColor = get_sub_field("content_color");}
if (get_sub_field("title_class")) {$titleClass = get_sub_field("title_class");}
if (get_sub_field("title_primary_color") && get_sub_field('use_primary_color')) {$titleColor = get_sub_field("title_primary_color");}

if(get_sub_field("padding_top") !=""){
	$paddingt = "; padding-top: ".get_sub_field('padding_top')."px !important;";
}
if(get_sub_field('padding_bottom') !=""){
	$paddingb = "; padding-bottom: ".get_sub_field('padding_bottom')."px !important;";
}
if(get_sub_field("padding_left") !=""){
	$paddingl = "; padding-left: ".get_sub_field('padding_left')."px !important;";
}
if(get_sub_field('padding_right') !=""){
	$paddingr = "; padding-right: ".get_sub_field('padding_right')."px !important;";
}
?>
<section
    class="nh-content p-lr-20 container <?php echo $extraClass ?> text-<?php echo get_sub_field('align_content'); ?>"
    style="<?php if ($content_bg) {echo 'background-color:' . $content_bg;} else {echo "background-color:#fff";}
		  if(get_sub_field('padding_top') !=""){echo $paddingt;} 
		 if(get_sub_field('padding_bottom') !=""){echo $paddingb;}
		  if(get_sub_field('padding_left') !=""){echo $paddingl;} 
		 if(get_sub_field('padding_right') !=""){echo $paddingr;}
		 
		 ?>">
    <div class="contain-container">
        <div class="row contain">
            <div class="col-xs-12 col-lg-12" style="padding:0">
                <?php
if (get_sub_field("content_title")) {

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
        $title_tag = 'h3';
    }

    if (get_sub_field("title_align")) {
        $title_align = get_sub_field("title_align");
    } else {
        $title_align = 'left';
    }

    $color = get_sub_field("title_color");

    $title = get_sub_field("content_title");
    ?>
                <<?php echo $title_tag; ?>
                    class="<?php echo $italic . ' ' . $titleStyle . ' ' . $titleClass . ' ' . $titleColor . ' text-' . $title_align ?>"
                    style="color:<?php echo $color; ?>"> <?php echo $title; ?>
                </<?php echo $title_tag; ?>>
                <?php }?>

                <div class="nh-desc p-lg <?php echo $contentClass . ' ' . $contentColor; ?>"
                    style="color:<?php echo get_sub_field('font_color') ?>">
                    <?php echo get_sub_field("content_text"); ?> </div>
                <?php

if (get_sub_field('button_size')) {
    $btnSize = 'btn-' . get_sub_field('button_size');
} else {
    $btnSize = 'btn-small';
}
$link = get_sub_field('content_button_link');
if ($link) {
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                <div class="content-link"><a
                        class="btn btn-<?php echo get_sub_field('content_button_style') . ' ' . $btnSize; ?>"
                        href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>"> <?php echo $link_title; ?>
                    </a></div>
                <?php }?>
            </div>
        </div>
    </div>
</section>
