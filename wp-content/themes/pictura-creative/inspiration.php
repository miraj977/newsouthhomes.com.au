<?php
/**
 * Template Name: Inspiration
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pictura_Creative
 */

get_header();
if (!isset($_GET['i'])) {
    while (have_posts()): the_post();
        if (get_field("show_page_info") == 1) {
            echo get_template_part("template-parts/page", "heading");
        }
        echo get_template_part("template-parts/page", "fullWidth");

    endwhile;
    while (have_rows("flexible_rows")): the_row();
        if (get_row_layout() == 'gallery_block'):
            $extraClass = get_sub_field("extra_class");?>
<section class="grid pt-0 container <?php echo $extraClass ?> inspiration-main"
    style="background-color: <?php if (get_sub_field('background_color')) {echo get_sub_field('background_color');} else {echo "#fff";}?>;">
    <div class="container">
        <div class="row contain">
            <div class="inspiration-padding" data-aos="fade-up">
                <div class="flex card-blocks">
                    <?php while (have_rows("cards")): the_row();
                $gallery = get_sub_field('gallery');
                $title = get_sub_field('gallery_title');
                $pageid = get_sub_field('page_link')->ID;
                ?>
                    <div class="card-margin inspire-card">
                        <a href="<?php echo the_permalink() . '?i=' . $pageid . '&t=' . $title; ?>" data-aos="fade-up">
                            <img class="card-img" src="<?php echo $gallery['url'] ?>" alt="Card Image"
                                style="width:100%;">
                            <div class="card-content-div inspire-card-content p-lg">
                                <span><?php echo $title; ?> </span><span style="font-size: 30px;">⭢</span>

                            </div>
                        </a>
                    </div>
                    <?php endwhile;?>

                </div>
            </div>
        </div>
    </div>
</section>
<?php
    endif;endwhile;
} elseif (isset($_GET['i']) && !empty($_GET['i'])) {
    $id = $_GET['i'];
    $title = $_GET['t'];
    $extraClass = get_sub_field("extra_class");
    $child = get_pages('child_of=1552');

    ?>
<section class="grid container pt-0 <?php echo $extraClass ?>" style="background-color: #f8f8f8;padding-top:0px !important;
>">
    <div class="container">
        <div class="row contain">
            <div class="col-12 flex inspiration-cat" style="flex-wrap:nowrap;">
                <div class="pre-drop">
                    <a href="<?php echo site_url() ?>/get-inspired/inspiration-lookbook"
                        class="back bold st2 mid-gold"><span class="arrow">→</span><?php echo $title; ?></a>
                </div>
                <div class="col-6 flex drop" style="justify-content:flex-end;">
                    <div class="cust">
                        <select class="d-sel2 white-bg text-left" style="font-size:16px;padding-left:15px;padding-right:20px;"
                            onchange="location = this.value;">
                            <option value="<?php echo site_url() . '/get-inspired/inspiration-lookbook?i=&t=All Photos'; ?>">
                                All</option>
                            <?php
foreach ($child as $c => $v) {
        $ids = $v->ID;
        $titles = $v->post_title;
        if ($id == $ids) {$selected = "selected";} else { $selected = "";}
        echo '<option ' . $selected . ' value="' . site_url() . '/get-inspired/inspiration-lookbook?i=' . $ids . '&t=' . $titles . '">' . $titles . '</option>';
    }

    ?>
                        </select>
                    </div>

                </div>
            </div>
            <div class="col-sm-12 inspiration-sub" style="margin:auto 0;" data-aos="fade-up">
                <div id="lightgallery" class="flex card-blocks">
                    <?php

    $images = get_field('image_gallery', $id);
    foreach ($images as $img) {?>
                    <a href="<?php echo $img['url'] ?>" class="card-margin inspire-card" style="margin:9px"
                        data-aos="fade-up">
                        <img src="<?php echo $img['url'] ?>" />
                    </a>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
} elseif ($_GET['t'] == 'All Photos') {

    $title = $_GET['t'];
    $child = get_pages('child_of=1552');

    ?>
<section class="grid container pt-0 <?php echo $extraClass ?>" style="background-color: #f8f8f8;padding-top:0px !important;
;>">
    <div class="container">
        <div class="row contain">
            <div class="col-12 flex inspiration-cat" style="flex-wrap:nowrap;">
                <div class="pre-drop">
                    <a href="<?php echo site_url() ?>/get-inspired/inspiration-lookbook"
                        class="back bold st2 mid-gold"><span class="arrow">→</span><?php echo $title; ?></a>
                </div>
                <div class="col-6 flex" style="justify-content:flex-end;flex-wrap:nowrap;">
                    <div class="cust">
                        <select class="d-sel2 white-bg text-left" style="font-size:16px;padding-left:15px;"
                            onchange="location = this.value;">
                            <option selected
                                value="<?php echo site_url() . '/get-inspired/inspiration-lookbook?i=&t=All'; ?>">
                                All</option>
                            <?php
foreach ($child as $c => $v) {
        $id = $v->ID;
        $title = $v->post_title;
        echo '<option value="' . site_url() . '/get-inspired/inspiration-lookbook?i=' . $id . '&t=' . $title . '">' . $title . '</option>';
    }

    ?>
                        </select>
                    </div>
                </div>
            </div>
            <div style="margin:auto 0;" data-aos="fade-up">
                <div id="lightgallery" class="flex card-blocks">
                    <?php

    foreach ($child as $c => $v) {
        $id = $v->ID;
        $title = $v->post_title;
        $images = get_field('image_gallery', $id);
        foreach ($images as $img) {?>

                    <a href="<?php echo $img['url'] ?>" data-aos="fade-up" class="card-margin inspire-card">
                        <img src="<?php echo $img['url'] ?>" />
                    </a>

                    <?php }}?>
                </div>

                <!-- status elements -->
                <div class="scroller-status text-center">
                    <div class="infinite-scroll-request loader-ellips">
                        ...
                    </div>
                    <p class="infinite-scroll-last">End of content</p>
                    <p class="infinite-scroll-error">No more pages to load</p>
                </div>

                <!-- pagination has path -->
                <p class="pagination">
                    <a class="pagination__next" href="page2.html">Next page</a>
                </p>
            </div>
        </div>
    </div>
<!--     </div> -->

</section>
<?php

}

get_footer();?>
<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery("#lightgallery").lightGallery();
});

jQuery('#lightgallery').infiniteScroll({
    path: '.pagination__next',
    append: '.inspire-card',
    status: '.scroller-status',
    hideNav: '.pagination',
});
</script>
