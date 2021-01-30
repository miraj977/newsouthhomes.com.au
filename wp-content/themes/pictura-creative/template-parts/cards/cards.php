<?php if (is_front_page()) {$p0 = "pt-0";}if (!is_front_page()) {
    $pad = "padding-top:100px;";
}
?>

<div class="container p-0 <?php echo $p0; ?> footer-card" style="<?php echo $pad; ?> background-color:<?php if (get_sub_field("section_background_color")) {echo get_sub_field("section_background_color");} else {echo '#fff';}
?>">
    <div class="contain-home card-flex ">
        <?php while (have_rows('cards')): the_row();

    if (get_sub_field("title_class")) {$titleClass = get_sub_field("title_class");}
    if (get_sub_field("title_color")) {$titleColor = get_sub_field("title_color");}
    if (get_sub_field("sub_tag")) {$subtitleTag = get_sub_field("sub_tag");}
    if (get_sub_field("sub_title_class")) {$subtitleClass = get_sub_field("sub_title_class");}
    if (get_sub_field("subtitle_primary_color")) {$subtitleColor = get_sub_field("subtitle_primary_color");}
    if (get_sub_field("content_class")) {$contentClass = get_sub_field("content_class");}
    if (get_sub_field("content_color")) {$contentColor = get_sub_field("content_color");}
    $link = get_sub_field('card_link');
    $link_url = $link['url'];

    ?>

        <div class="card" data-aos="fade-up">
            <a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>">
                <img class="card-img" src="<?php the_sub_field('card_image');?>" alt="Card Image" style="width:100%">
                <div class="card-content-div">
                    <<?php the_sub_field('card_title_tag');?> class=" <?php echo $titleClass . ' ' . $titleColor; ?>
																									">
                        <?php the_sub_field('card_title');?>
                    </<?php the_sub_field('card_title_tag');?>>
                    <div class=" card-content content-links <?php echo $contentClass . ' ' . $contentColor; ?>">
                        <?php echo wp_trim_words(get_sub_field('card_content'), 25, '...'); ?></div>
                    <?php

    if ($link) {
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';?>
                    <div class=" content-links "><a class=" btn gold-link" href="<?php echo $link_url; ?>"
                            target="<?php echo $link_target; ?>">
                            <?php echo $link_title; ?>
                        </a>
                    </div>
                    <?php }?>
                </div>
            </a>
        </div>
        <?php endwhile;?>
    </div>
</div>
