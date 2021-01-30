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
<section class="grid pb-0 pt-80 container single-home white-bg" style="background-color:#F8F8F8;">
    <div class="container">
        <div class="row contain">
            <div class="title-bar col-12">
                <div class="left-title">
                    <h1 class="t1 black"><?php echo get_the_title(); ?>
                    </h1>
                    <?php
while (have_rows('completed_home_details')): the_row();if (get_sub_field('house_area')) {echo '<span class="p-lg black mr-20 bold single-icon"><span class="icon-number2"><img class="bedIcon home-icon" src="' . get_template_directory_uri() . '/images/area2.svg" />' . get_sub_field('house_area') . 'm&#178;</span>';}
endwhile;

if (!empty($bedroom)) {
    $bedroom = $bedroom->name;
    echo '<span class="icon-number2"><img class="bedIcon" src="' . get_template_directory_uri() . '/images/Bed@2x.svg" />';
    echo str_replace("Bedrooms", "", $bedroom) . '</span>';
}

if (!empty($termsBath)) {?>
                    <span class="icon-number2">
                        <?php
echo '<img class="bathIcon" src="' . get_template_directory_uri() . '/images/Bathtub@2x.svg" />';
    $bathroom = $termsBath->name;
    echo str_replace("Bathroom", "", str_replace("Bathrooms", "", $bathroom));
    echo "</span>";
}

if (!empty($car)) { ?>
                        <span class="icon-number2"><?php
echo '<img class="bathIcon car-icon" src="' . get_template_directory_uri() . '/images/car.svg" />';

    echo $car->name . "</span>";
}
?>
                </div>
                <?php
while (have_rows('completed_home_details')): the_row();?>
                <div class="right-title">
                    <p><a  onclick="addURL('<?php echo get_the_title() ?>')" class="btn white enquire-btn lg-btn single-btn enquiry_btn">ENQUIRE ABOUT THIS PROJECT</a></p>
                    <p><a class="btn single-btn mid-gold bold brochure-btn lg-btn"
                            href="<?php echo get_sub_field('brochure')['url']; ?>">DOWNLOAD
                            BROCHURE (PDF)</a></p>
                </div>
                <?php endwhile;?>
            </div>
            <?php
while (have_rows('completed_home_details')): the_row();?>
            <div class="col-12 product-desc">
                <p class="st3 black bold">Description</p>
                <?php echo get_sub_field('description');
    echo '<div class="flex two-cols-div">';
    if (get_sub_field('left_content')):
        echo '<div class="col-lg-5 col-sm-12 two-cols">' . get_sub_field("left_content") . '</div>';
    endif;
    if (get_sub_field('right_content')):
        echo '<div class="col-lg-5 col-sm-12 two-cols">' . get_sub_field("right_content") . '</div>';
    endif;
    echo '</div>';

    ?>
            </div>
            <?php $imgs = get_sub_field('product_image');
    if ($imgs): ?>
            <div class="w3-content w3-display-container single-img-div">
                <?php $i = 0;
    foreach ($imgs as $img) {?>
                <img class="single-img mySlides" src="<?php echo $img['url'] ?>" alt="<?php echo get_the_title(); ?>" />
                <?php $i++;}?>
                <?php if ($i > 1): ?>
                <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
                <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
                <?php endif;?>
            </div>
            <?php endif;?>
        </div>
    </div>

    <div class="flex floor-plan">
        <p class="st2 bold black contain pb-5" style="width:100%;margin-bottom:30px">Specifications</p>
        <div class="contain flex container main-floorplan">
            <div class="col-lg-8 col-md-7 col-sm-12 floorplan-img" style="padding-left:0px">
                <?php $floorplan = get_sub_field('floor_plan');?>

                <div class="white-bg" id="lightgallery" style="display:flex">
                    <?php foreach ($floorplan as $floor): ?>
                    <a href="<?php echo $floor['url'] ?>">
                        <img src="<?php echo $floor['url']; ?>">
                    </a>
                    <?php endforeach;?>
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
                        <td class=" p-st bold"><?php echo str_replace('m2','m&#178;',get_sub_field('dimension_measurement'));
    ?></td>
                    </tr>

                    <?php endwhile;
?>
                </table>
            </div>
        </div>
    </div>
    <div class="container">
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


            <?php endwhile;?>

        </div>
    </div>
    </div>
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
<script>
jQuery('#button').click(function() {
    window.location.reload();

});
</script>
<script>
const activeImage1 = document.querySelector(".i1 .active");
const productImages1 = document.querySelectorAll(".ii1 img");

function changeImage1(e) {
    activeImage1.src = e.target.src;
}

productImages1.forEach(image => image.addEventListener("click", changeImage1));

const activeImage2 = document.querySelector(".i2 .active");
const productImages2 = document.querySelectorAll(".ii2 img");

function changeImage2(e) {
    activeImage2.src = e.target.src;
}

productImages2.forEach(image => image.addEventListener("click", changeImage2));

const activeImage3 = document.querySelector(".i3 .active");
const productImages3 = document.querySelectorAll(".ii3 img");

function changeImage3(e) {
    activeImage3.src = e.target.src;
}

productImages3.forEach(image => image.addEventListener("click", changeImage3));

const activeImage4 = document.querySelector(".i4 .active");
const productImages4 = document.querySelectorAll(".ii4 img");

function changeImage4(e) {
    activeImage4.src = e.target.src;
}

productImages4.forEach(image => image.addEventListener("click", changeImage4));

const activeImage5 = document.querySelector(".i5 .active");
const productImages5 = document.querySelectorAll(".ii5 img");

function changeImage5(e) {
    activeImage5.src = e.target.src;
}

productImages5.forEach(image => image.addEventListener("click", changeImage5));
</script>
<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery("#lightgallery").lightGallery({
        mode: 'lg-zoom-in-big',
    });
});
</script>
<script>
jQuery(window).resize(function() {
    if (jQuery(document).width() > 991) {
        jQuery('#filters-desktop').removeClass('hide');
        jQuery('#hnl-desktop').removeClass('hide');
    }
    if (jQuery(document).width() < 450) {
        jQuery('.enquire-btn').text('ENQUIRE');
        jQuery('.brochure-btn').text('DOWNLOAD BROCHURE');
    } else {
        jQuery('.enquire-btn').text('ENQUIRE ABOUT THIS PROJECT');
        jQuery('.brochure-btn').text('DOWNLOAD BROCHURE (PDF)');

    }

});

if (jQuery(document).width() < 450) {
    jQuery('.enquire-btn').text('ENQUIRE ');
    jQuery('.brochure-btn').text('DOWNLOAD BROCHURE');
} else {
    jQuery('.enquire-btn').text('ENQUIRE ABOUT THIS PROJECT');
    jQuery('.brochure-btn').text('DOWNLOAD BROCHURE (PDF)');

}

var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
    showDivs(slideIndex += n);
}

function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    if (n > x.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = x.length
    }
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    x[slideIndex - 1].style.display = "block";
}
	function addURL(title) {
		//var new= "Completed Projects: " + title;
		jQuery("#dynamic_title").val(title);
    if (history.pushState) {
        var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?title=' +
            title;
        window.history.pushState({
            path: newurl
        }, '', newurl);
    }
   // console.log(newurl);
}
</script>
