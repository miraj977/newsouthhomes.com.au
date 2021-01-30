<?php
if (is_front_page() || is_page(array('sydney-metro', 'central-coast', 'illawarra'))) {
    ?>
<?php echo do_shortcode("[hero-slider-fullScreen]"); ?>
<?php
} else if (is_home()) {
    $blogPageId = get_option('page_for_posts');

    if (get_field('banner', $blogPageId)) {
        ?>
<div class="banner container" style="background-image: url('<?php echo get_the_post_thumbnail_url($blogPageId); ?>')">
    <?php if (get_field("banner_text", $blogPageId)) {?>
    <div class="banner-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 text-<?php echo get_field('alignment'); ?>">
                    <h5 class="text-white"><?php echo get_field("banner_subtitle", $blogPageId) ?></h5>
                    <h1 class="t1 banner-text text-white contain"><?php the_field("banner_text", $blogPageId);?></h1>
                    <?php

            if (get_field('button_size')) {
                $btnSize = 'btn-' . get_field('button_size');
            } else {
                $btnSize = 'btn-small';
            }
            $link = get_field('banner_button');
            if ($link) {
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                    <div class="content-link"><a
                            class="btn btn-<?php echo get_field('choose_banner_button_style') . ' ' . $btnSize; ?>"
                            href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>">
                            <?php echo $link_title; ?> </a></div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
    <?php }?>
</div>
<?php
}
} else {
    global $post;
    if (get_field('banner', $post->ID)) {
        here?>
<div class="banner container" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')">
    <?php if (get_field("banner_text")) {?>
    <div class="banner-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 text-<?php echo get_field('alignment'); ?>">

                    <h1 class="t1 text-white contain  banner-text"><?php the_field("banner_text", $blogPageId);?></h1>

                </div>
            </div>
        </div>
    </div>
    <?php }?>
</div>
<?php }}?>
