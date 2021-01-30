<?php $extraClass = get_sub_field("extra_class");

if(get_sub_field("padding_top") !=""){
	$paddingt = "; padding-top: ".get_sub_field('padding_top')."px !important;";
}
if(get_sub_field('padding_bottom') !=""){
	$paddingb = "; padding-bottom: ".get_sub_field('padding_bottom')."px !important;";
}

if(get_sub_field('reduce_padding') ==1){
	$rp = ";padding: 20px 0 !important;";
}
?>
<section class="grid-fixedGrid container <?php echo $extraClass;?>"
    style="background-color: <?php 
	if (get_sub_field("section_background")) {echo get_sub_field("section_background");} else {echo "#fff";}
		 if(get_sub_field('padding_top') !=""){echo $paddingt;} 
		 if(get_sub_field('padding_bottom') !=""){echo $paddingb;}
		   if(get_sub_field('reduce_padding') ==1){echo $rp;}
		   ?>">
    <div class="container">
        <div class="row contain">

            <?php $grid_link_style = get_sub_field('link_style');
if (get_sub_field('button_size')) {
    $btnSize = 'btn-' . get_sub_field('button_size');
} else {
    $btnSize = 'btn-small';
}
$text_style = get_sub_field("align_content_in_box");?>
			
            <?php $i = 1;while (have_rows('full_width_grid')): the_row();
			
    if (get_sub_field("title_class")) {$titleClass = get_sub_field("title_class");}
    if (get_sub_field("title_color")) {$titleColor = get_sub_field("title_color");}
    if (get_sub_field("content_class")) {$contentClass = get_sub_field("content_class");}
    if (get_sub_field("content_color")) {$contentColor = get_sub_field("content_color");}
	if(get_sub_field("image_first")==1){$order="order: 0 !important;";}

    ?>

            <div class="strecth-row">

                <div class="col-md-6 col-sm-12 col-text align-self-center text-<?php echo $text_style; ?>"
                    data-aos="fade-up">
                    <div class=" ">
                        <?php if (get_sub_field('title')) {?>
                        <h4 class="stretched-title <?php echo $titleClass . ' ' . $titleColor; ?>">
                            <?php echo get_sub_Field('title'); ?></h4>
                        <?php }?>

                        <?php if (get_sub_field('content')) {?>
                        <div class="stretched-text <?php echo $contentClass . ' ' . $contentColor; ?>">
                            <?php echo get_sub_Field('content'); ?></div>
                        <?php }?>
                        <?php
    $link = get_sub_field('link');
    if ($link) {$link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';?>
                        <div class="content-link"><a class="btn btn-<?php echo $grid_link_style . ' ' . $btnSize; ?>"
                                href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>">
                                <?php echo $link_title; ?>
                            </a></div>
                        <?php }?>

                    </div>
                </div>

                <div class="col-md-6 col-sm-12 col-img  align-self-center" data-aos="fade-up" style="<?php echo $order;?>">
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

            <?php
    $i++;endwhile;?>
        </div>
    </div>
</section>
