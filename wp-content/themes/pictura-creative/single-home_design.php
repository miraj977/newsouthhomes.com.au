<style>
.house2,
.house3,
.house4,
.house5,
.house-icon2,
.house-icon3,
.house-icon4,
.house-icon5 {
    display: none;
}

#f1 {
    background: #9b8f63;
    color: #fff;
}

</style>
<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Pictura_Creative
 */
get_header();
$termsBath = get_the_terms(get_the_ID(), 'bathrooms');
$termsBath = array_shift($termsBath);
$storey = get_the_terms(get_the_ID(), 'storeys');
$storey = array_shift($storey);
$bedroom = get_the_terms(get_the_ID(), 'bedrooms');
$bedroom = array_shift($bedroom);
$type = get_the_terms(get_the_ID(), 'home_types');
$type = array_shift($type);
$car = get_the_terms(get_the_ID(), 'garage');
$car = array_shift($car);

?>
<section class="grid pb-0 pt-80 container single-home" style="background-color:#F8F8F8;">
    <div class="container">
        <div class="row contain">
            <div class="title-bar col-12">
                <div class="left-title">
                    <h1 class="t1 black"><?php echo get_the_title(); ?>
                    </h1>
                    <?php
$g = 1;
while (have_rows('home_details')): the_row();
    while (have_rows('facades')): the_row();
        if (get_sub_field('house_area')) {
            echo '<span class="p-lg black single-icon"><span class="icon-number2 house-icon' . $g . '"><img class="home-icon areaIcon" src="' . get_template_directory_uri() . '/images/area2.svg" />' . get_sub_field('house_area') . 'm&#178;</span>';
        }

        if (!empty(get_sub_field('bedroom'))) {
            echo '<span class="icon-number2 house-icon' . $g . '"><img class="bedIcon" src="' . get_template_directory_uri() . '/images/Bed@2x.svg" />';
            echo str_replace("Bedrooms", "", get_sub_field('bedroom')) . '</span>';
        }

        if (!empty(get_sub_field('bathroom'))) {?>
                    <span class="icon-number2 house-icon<?php echo $g; ?>">
                        <?php
        echo '<img class="bathIcon" src="' . get_template_directory_uri() . '/images/Bathtub@2x.svg" />';
            echo str_replace("Bathroom", "", str_replace("Bathrooms", "", get_sub_field('bathroom')));
            echo "</span>";
        }

        if (!empty(get_sub_field('garage'))) { ?>
                        <span class="icon-number2 house-icon<?php echo $g; ?>"><?php
        echo '<img class="bathIcon car-icon" src="' . get_template_directory_uri() . '/images/car.svg" />';

            echo get_sub_field('garage') . "</span>";
        }
        $g++;
    endwhile;
endwhile;
?>
                </div>
                <?php
while (have_rows('home_details')): the_row();?>
                <div class="right-title">
                    <p><a onclick="addURL('<?php echo get_the_title() ?>')"
                            class="btn white enquire-btn lg-btn single-btn enquiry_btn">ENQUIRE ABOUT THIS PROJECT</a>
                    </p>
                    <?php $m = 1;while (have_rows('facades')): the_row();?>
                    <p class="house<?php echo $m; ?>">
                        <a class="btn mid-gold single-btn bold brochure-btn lg-btn" href="<?php
        echo get_sub_field('brochure')['url'];
        ?>">DOWNLOAD
                            BROCHURE (PDF)</a>
                    </p><?php $m++;endwhile;?>
                </div>
                <?php endwhile;?>
            </div>

            <!-- BUTTON LOOP STARTS HERE -->
            <div class="facade-btns">
                <?php
$f = 1;
while (have_rows('home_details')): the_row();
    while (have_rows('facades')): the_row();?>
                <button id="f<?php echo $f; ?>"
                    class="p-lg bold facade-btn"><?php echo get_sub_field('title'); ?></button>
                <?php
        $f++;
    endwhile;
endwhile;
echo '</div>';
// BUTTON LOOP ENDS HERE

$j = 1;
while (have_rows('home_details')): the_row();
    while (have_rows('facades')): the_row();?>

                <div class="col-12 product-desc house<?php echo $j; ?>">
                    <?php if (get_sub_field('description')) {?><p class="st3 black bold">Description</p>
                    <?php echo get_sub_field('description');
            echo '<div class="flex two-cols-div">';

            if (get_sub_field('left_content')) {
                echo '<div class="col-lg-5 col-sm-12 two-cols">' . get_sub_field("left_content") . '</div>';
            }
            if (get_sub_field('right_content')):
                echo '<div class="col-lg-5 col-sm-12 two-cols">' . get_sub_field("right_content") . '</div>';
            endif;
            echo '</div>';
        }
        ?>
                </div>
                <?php
        $j++;
    endwhile;?>
            </div>
        </div>
        <?php
    $k = 1;
    while (have_rows('facades')): the_row();
        $img = get_sub_field('product_image');
        if ($img): ?>
<!--         <div class="single-img-div house<?php echo $k; ?>">

            <img class="single-img mySlides" src="<?php echo $img['url']; ?>" alt="<?php echo get_the_title(); ?>" />
        </div> -->
        <?php endif;
    $k++;
endwhile;

$h = 1;
while (have_rows('facades')): the_row();?>
        <div class="flex floor-plan" id="<?php echo 'show' . $h; ?>">
            <p class="st2 bold black contain pb-5" style="width:100%;margin-bottom:30px">Specifications</p>
            <div class="contain flex container main-floorplan">
                <div class="col-lg-8 col-md-7 col-sm-12 floorplan-img" style="padding-left:0px">
                    <?php $floorplan = get_sub_field('floor_plan');
    ?>

                    <div class="white-bg" id="lightgallery<?php echo $h; ?>" style="display:flex">

                        <a href="<?php echo $floorplan['url'] ?>">
                            <img src="<?php echo $floorplan['url']; ?>">
                        </a>

                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 white-bg p-lr-20 dimension-div">
                    <table class="dim-tbl">

                        <p class="st3 dimension">Dimensions</p>
                        <tr class="dimension-tr">
                            <td class="p-st grey">House Area</td>
                            <td class=" p-st bold"><?php if (get_sub_field('house_area')) {echo get_sub_field('house_area') . 'm&#178;';} else {echo 'N/A';}
    ;
    ?></td>
                        </tr>
                        <tr class="dimension-tr">
                            <td class="p-st grey">Width</td>
                            <td class=" p-st bold"><?php if (get_sub_field('width')) {echo get_sub_field('width') . 'm';} else {echo 'N/A';}
    ;
    ?></td>
                        </tr>

                        <?php while (have_rows('dimensions')): the_row();
        ?>
                        <tr class="dimension-tr">
                            <td class="p-st grey"><?php echo get_sub_field('dimension_type');
        ?></td>
                            <td class=" p-st bold"><?php
        //echo get_sub_field('dimension_measurement');
        echo str_replace('m2', 'm&#178;', get_sub_field('dimension_measurement'));
        ?></td>
                        </tr>
                        <?php endwhile;
    ?>
                    </table>
                </div>
            </div>
        </div>
        <?php $h++;endwhile;?>
        <div class="container tab-container">
            <div class="row contain">
                <div class="tabs">
                    <?php $count = 1;
$i = 1;
while (have_rows('facades')): the_row();?>
                    <input type="radio" class="<?php echo 'click' . $i; ?>" name="tabs"
                        id="<?php echo get_sub_field('title'); ?>" <?php if ($count == 1) {echo "checked";}?>>
                    <label for="<?php echo get_sub_field('title'); ?>"
                        class="p-lg black bold"><?php echo get_sub_field('title'); ?></label>
                    <div class="tab">
                        <p class="black st2 bold" style="padding-top: 50px;padding-bottom:14px;padding-left:20px;">
                            Facades
                        </p>
                        <?php $images = get_sub_field('gallery');
    $size = 'full';
    if ($images): ?>
                        <div class="grids product">
                            <div class="product-gallery">
                                <div class="product-image i<?php echo $i; ?> col-lg-10 col-md-10 col-sm-12">
                                    <img class="active" src=" <?php echo $images[0]['url']; ?>">
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12
										 <?php $darrow = 1;
    foreach ($images as $image_id):
        if ($darrow > 4) {
            // echo "product-icon";
        }
        $darrow++;
    endforeach;
    ?>  ">
                                    <ul class="image-list <?php echo 'ii' . $count; ?>">
                                        <?php foreach ($images as $image_id): ?>
                                        <li class=" image-item"><img src=" <?php echo $image_id['url']; ?>"></li>
                                        <?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <?php
endif;
$i++;?>
                    </div>
                    <?php $count++;endwhile;?>
                </div>
            </div>
        </div>
        <?php
$l = 1;
while (have_rows('facades')): the_row();?>
        <div class="container white-bg house<?php echo $l; ?>">
            <div class="row contain">
                <?php if (get_sub_field("video_link") || get_sub_field("w_link")): ?>
                <section class="grid container <?php echo $extraClass ?>" id="related-video-div"
                    style="background-color: <?php if (get_sub_field('background_color')) {echo get_sub_field('background_color');} else {echo "#fff;";}?>">
                    <div class="container">
                        <div class="row contain">
                            <div class="col-sm-12">
                                <div class="flex card-blocks" style="justify-content:space-around;">
                                    <?php if (get_sub_field("video_link")): ?>

                                    <?php $video = get_sub_field('video_link');?>
                                    <div class="related-vid">
                                        <p class="st2 black">Video</p>
                                        <?php $video = str_replace("watch?v=", "embed/", $video);?>
                                        <iframe width="580px" height="394px" src="<?php echo $video; ?>"
                                            allow="encrypted-media" allowfullscreen></iframe>
                                    </div>
                                    <?php endif;?>
                                    <?php if (get_sub_field("w_link")): ?>

                                    <?php $video = get_sub_field('w_link');?>
                                    <div class="related-vid">
                                        <p class="st2 black">3D Walkthrough </p>
                                        <?php $video = str_replace("watch?v=", "embed/", $video);?>
                                        <iframe width="580px" height="394px" src="<?php echo $video; ?>"
                                            allow="encrypted-media" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </section>
                <?php endif;?>
            </div>
        </div>
        <?php $l++;endwhile;endwhile;?>
</section>
<?php
wp_reset_postdata();
wp_reset_query();
if (have_rows('cards', "option")):
    while (have_rows('cards', "option")): the_row();
        if (get_row_layout() == 'cards') {
            echo get_template_part('template-parts/cards/cards');
        }
    endwhile;
endif;

get_footer();?>

<script type="text/javascript">
const activeImage1 = document.querySelector(".i1 .active");
const productImages1 = document.querySelectorAll(".ii1 img");
jQuery(document).on('click', '.ii1 img', function() {
    jQuery('.active').attr('src', this.src);
});

const activeImage2 = document.querySelector(".i2 .active");
const productImages2 = document.querySelectorAll(".ii2 img");
jQuery(document).on('click', '.ii2 img', function() {
    jQuery('.active').attr('src', this.src);
});

const activeImage3 = document.querySelector(".i3 .active");
const productImages3 = document.querySelectorAll(".ii3 img");
jQuery(document).on('click', '.ii3 img', function() {
    jQuery('.active').attr('src', this.src);
});

const activeImage4 = document.querySelector(".i4 .active");
const productImages4 = document.querySelectorAll(".ii4 img");
jQuery(document).on('click', '.ii4 img', function() {
    jQuery('.active').attr('src', this.src);
});

const activeImage5 = document.querySelector(".i5 .active");
const productImages5 = document.querySelectorAll(".ii5 img");
jQuery(document).on('click', '.ii5 img', function() {
    jQuery('.active').attr('src', this.src);
});
</script>

<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery("#lightgallery1").lightGallery({
        mode: 'lg-zoom-in-big',
    });
    jQuery("#lightgallery2").lightGallery({
        mode: 'lg-zoom-in-big',
    });
    jQuery("#lightgallery3").lightGallery({
        mode: 'lg-zoom-in-big',
    });
    jQuery("#lightgallery4").lightGallery({
        mode: 'lg-zoom-in-big',
    });
    jQuery("#lightgallery5").lightGallery({
        mode: 'lg-zoom-in-big',
    });
    jQuery("#lightgallery6").lightGallery({
        mode: 'lg-zoom-in-big',
    });
    jQuery('#show2').hide();
    jQuery('#show3').hide();
    jQuery('#show4').hide();
    jQuery('#show5').hide();
    jQuery('.house-icon2').hide();
    jQuery('.house-icon3').hide();
    jQuery('.house-icon4').hide();
    jQuery('.house-icon5').hide();
    jQuery('.house2').hide();
    jQuery('.house3').hide();
    jQuery('.house4').hide();
    jQuery('.house5').hide();
});

if (jQuery(document).width() < 450) {
    jQuery('.enquire-btn').text('ENQUIRE ');
    jQuery('.brochure-btn').text('DOWNLOAD BROCHURE');
} else {
    jQuery('.enquire-btn').text('ENQUIRE ABOUT THIS PROJECT');
    jQuery('.brochure-btn').text('DOWNLOAD BROCHURE (PDF)');
}
jQuery(window).resize(function() {
    if (jQuery(document).width() < 450) {
        jQuery('.enquire-btn').text('ENQUIRE ');
        jQuery('.brochure-btn').text('DOWNLOAD BROCHURE');
    } else {
        jQuery('.enquire-btn').text('ENQUIRE ABOUT THIS PROJECT');
        jQuery('.brochure-btn').text('DOWNLOAD BROCHURE (PDF)');
    }
});

jQuery(document).on('click', '.click1', function() {
    jQuery('#show1').show();
    jQuery('#show2').hide();
    jQuery('#show3').hide();
    jQuery('#show4').hide();
    jQuery('#show5').hide();
    jQuery('.house-icon1').show();
    jQuery('.house-icon2').hide();
    jQuery('.house-icon3').hide();
    jQuery('.house-icon4').hide();
    jQuery('.house-icon5').hide();
    jQuery('.house1').show();
    jQuery('.house2').hide();
    jQuery('.house3').hide();
    jQuery('.house4').hide();
    jQuery('.house5').hide();
    jQuery('.facade-btn').css({
        'background': '#e7e8e9',
        'color': '#404040'
    });
    jQuery('#f1').css({
        'background': '#9b8f63',
        'color': '#fff'
    });
});
jQuery(document).on('click', '.click2', function() {
    jQuery('#show1').hide();
    jQuery('#show2').show();
    jQuery('#show3').hide();
    jQuery('#show4').hide();
    jQuery('#show5').hide();
    jQuery('.house-icon1').hide();
    jQuery('.house-icon2').show();
    jQuery('.house-icon3').hide();
    jQuery('.house-icon4').hide();
    jQuery('.house-icon5').hide();
    jQuery('.house1').hide();
    jQuery('.house2').show();
    jQuery('.house2').css('display', 'block');
    jQuery('.house-icon2').css('display', 'inline-flex');
    jQuery('.house3').hide();
    jQuery('.house4').hide();
    jQuery('.house5').hide();
    jQuery('.facade-btn').css({
        'background': '#e7e8e9',
        'color': '#404040'
    });
    jQuery('#f2').css({
        'background': '#9b8f63',
        'color': '#fff'
    });
});
jQuery(document).on('click', '.click3', function() {
    jQuery('#show2').hide();
    jQuery('#show1').hide();
    jQuery('#show3').show();
    jQuery('#show4').hide();
    jQuery('#show5').hide();
    jQuery('.house-icon1').hide();
    jQuery('.house-icon2').hide();
    jQuery('.house-icon3').show();
    jQuery('.house-icon4').hide();
    jQuery('.house-icon5').hide();
    jQuery('.house1').hide();
    jQuery('.house2').hide();
    jQuery('.house3').show();
    jQuery('.house3').css('display', 'block');
    jQuery('.house-icon3').css('display', 'inline-flex');
    jQuery('.house5').hide();
    jQuery('.house4').hide();
    jQuery('.facade-btn').css({
        'background': '#e7e8e9',
        'color': '#404040'
    });
    jQuery('#f3').css({
        'background': '#9b8f63',
        'color': '#fff'
    });
});
jQuery(document).on('click', '.click4', function() {
    jQuery('#show1').hide();
    jQuery('#show2').hide();
    jQuery('#show3').hide();
    jQuery('#show4').show();
    jQuery('#show5').hide();
    jQuery('.house-icon1').hide();
    jQuery('.house-icon2').hide();
    jQuery('.house-icon3').hide();
    jQuery('.house-icon4').show();
    jQuery('.house-icon5').hide();
    jQuery('.house1').hide();
    jQuery('.house2').hide();
    jQuery('.house3').hide();
    jQuery('.house4').css('display', 'block');
    jQuery('.house-icon4').css('display', 'inline-flex');
    jQuery('.house4').show();
    jQuery('.house5').hide();
    jQuery('.facade-btn').css({
        'background': '#e7e8e9',
        'color': '#404040'
    });
    jQuery('#f4').css({
        'background': '#9b8f63',
        'color': '#fff'
    });
});
jQuery(document).on('click', '.click5', function() {
    jQuery('#show1').hide();
    jQuery('#show2').hide();
    jQuery('#show3').hide();
    jQuery('#show4').hide();
    jQuery('#show5').show();
    jQuery('.house-icon1').hide();
    jQuery('.house-icon2').hide();
    jQuery('.house-icon3').hide();
    jQuery('.house-icon4').hide();
    jQuery('.house-icon5').show();
    jQuery('.house1').hide();
    jQuery('.house2').hide();
    jQuery('.house3').hide();
    jQuery('.house4').hide();
    jQuery('.house5').css('display', 'block');
    jQuery('.house-icon5').css('display', 'inline-flex');
    jQuery('.house5').show();
    jQuery('.facade-btn').css({
        'background': '#e7e8e9',
        'color': '#404040'
    });
    jQuery('#f5').css({
        'background': '#9b8f63',
        'color': '#fff'
    });
});

jQuery(document).on('click', '#f1', function() {
    jQuery('.click1').attr('checked', 'checked').trigger("click");
});
jQuery(document).on('click', '#f2', function() {
    jQuery('.click2').attr('checked', 'checked').trigger("click");
});
jQuery(document).on('click', '#f3', function() {
    jQuery('.click3').attr('checked', 'checked').trigger("click");
});
jQuery(document).on('click', '#f4', function() {
    jQuery('.click4').attr('checked', 'checked').trigger("click");
});
jQuery(document).on('click', '#f5', function() {
    jQuery('.click5').attr('checked', 'checked').trigger("click");
});

function addURL(title) {
    //var new = "Home Design: " + title;
    jQuery("#dynamic_title").val(title);
    if (history.pushState) {
        var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?title=' +
            title;
        window.history.pushState({
            path: newurl
        }, '', newurl);
    }
}
</script>
