<?php
/**
 *Template Name: Single Storey
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pictura_Creative
 */

get_header();
while (have_posts()): the_post();

    echo get_template_part('template-parts/page', 'fullWidth');
endwhile;
?>


<script>
// jQuery(':input[data-filter="double-storey"]').prop('disabled', true);
jQuery(document).ready(function(){
	jQuery(':input[data-filter="double-storey"]').on("click", function(event) { 
	 event.preventDefault();
	  window.open('<?php echo site_url()."/home-designs/double-storey";?>', '_blank');
	});
});
jQuery(':input[data-filter="single-storey"]').prop('checked', true).click();
</script>

<style>
input[data-filter="double-storey"]+span {
    
}

input[data-filter="single-storey"]+span {
    background-color: #e7e8e9;
    color: #2a2a2a;
    border: 2px solid #404040;
    background: url(http://localhost:8888/newsouthhomes.com.au/wp-content/themes/pictura-creative/css/../images/check-black.svg) #e7e8e9;
    background-repeat: no-repeat;
    background-position-x: right;
}

</style>


<?php //echo do_shortcode('[am_post_grid btn_all="yes"]');
// global $wpdb;
// $custom_post_type = "home_designs";
// $results = $wpdb->get_results($wpdb->prepare("SELECT * FROM wp_posts WHERE post_status = 'publish'"), ARRAY_A);
// echo "<pre>";
// print_r($results);
// echo "</pre>";exit;
?>
<section class="project-list container grid">
    <div class="container p-0">
        <div class="row contain">
            <!--------------------product loop ----------->
            <div class="col-md-12 col-lg-3 col-sm-12 p-0 filter-main">
                <?php echo get_template_part('template-parts/home-design/section', 'filter-desktop'); ?>
                <?php echo get_template_part('template-parts/home-design/section', 'filter-tablet'); ?>
            </div>
            <div class="col-md-12 col-lg-9 col-sm-12 hd-col">
                <div class="row">
                    <div id="noResultsFound"
                        style="color:#fff;font-size: 20px;text-align: center;width: 100%;vertical-align: middle;position: absolute;top: 352px;  ">
                        No Results found</div>
                    <div class="projectWrap">
                        <?php
global $wp_query;

$query = new WP_Query(array(
    'post_type' => 'home_design',
    'tax_query' => array(
        array(
            'taxonomy' => 'storeys',
            'field' => 'slug',
            'terms' => 'single-storey',
        )),
    'posts_per_page' => 16,
    'paged' => 1,
    'order' => 'DESC',
    'orderby' => 'date',
    'post_status' => 'publish',

));

$count = $query->found_posts;
$posts_per_page = 16;
$page_number_max = ceil($count / $posts_per_page);
if ($query->have_posts()) {
    while ($query->have_posts()): $query->the_post();
        $termsBath = get_the_terms($post->ID, 'bathrooms');
        $termsBath = array_shift($termsBath);
        $storey = get_the_terms($post->ID, 'storeys');
        $storey = array_shift($storey);
        $bedroom = get_the_terms($post->ID, 'bedrooms');
        $bedroom = array_shift($bedroom);
        $type = get_the_terms($post->ID, 'home_types');
        $type = array_shift($type);
        $car = get_the_terms($post->ID, 'garage');
        $car = array_shift($car);
        $type = get_the_terms($post->ID, 'home_types');
        $type = array_shift($type);
        $size = get_the_term_list(get_the_ID(), 'home_size', '', ',');
        preg_match('~>\K[^<>]*(?=<)~', $size, $match);

        $tag = "size" . $match[0];
        $lot = get_the_term_list(get_the_ID(), 'lot_size', '', ',');
        preg_match('~>\K[^<>]*(?=<)~', $lot, $match2);
        $lot = "lot" . $match2[0];

        ?>
                        <div class="col-sm-12 col-md-6 col-lg-4 p-0 workItem show-workItem mix <?php echo " " . $bedroom->slug . "bed  " . $storey->slug . " " . $termsBath->slug . "bath " . $type->slug; ?>"
                            data-aos="fade-up">
                            <div class="project-grid ">
                                <a href=" <?php echo get_permalink(); ?>">
                                    <div class="img-pad"
                                        style="padding-bottom: 65%;position:relative;width: 100%;height:100%;">
                                        <?php
    while (have_rows('home_details')): the_row();
            //  print_r(get_sub_field('image'));
            ?>

                                        <img src="<?php echo get_sub_field('image')['url'] ?>"
                                            alt="<?php echo get_the_title(); ?>"
                                            style="position:absolute;height:100%;width:100%;" />
                                        <?php

            break;
        endwhile;
        ?>
                                    </div>

                                    <div class="projectMeta">

                                        <div class="projectIcons">
                                            <h5 class="p-lg gold-9b hd-title"><?php echo get_the_title(); ?>
                                            </h5>
                                            <?php
    $bedroom = $bedroom->name;
        if (!empty($bedroom)) {
            echo '<span class="icon-number"><img class="bedIcon" src="' . get_template_directory_uri() . '/images/Bed@2x.svg" />';
            echo str_replace("Bedrooms", "", $bedroom) . '</span>';
        } else {
            echo '<span class="icon-number"><img class="bedIcon" src="' . get_template_directory_uri() . '/images/Bed@2x.svg" />';
            echo '-</span>';

        }
        if (!empty($termsBath)) {?><span class="icon-number"><?php
    echo '<img class="bathIcon" src="' . get_template_directory_uri() . '/images/Bathtub@2x.svg" />';
            $bathroom = $termsBath->name;
            echo str_replace("Bathroom", "", str_replace("Bathrooms", "", $bathroom));
            echo "</span>";
        } else { ?><span class="icon-number"><?php
    echo '<img class="bathIcon" src="' . get_template_directory_uri() . '/images/Bathtub@2x.svg" />';
            echo "-</span>";

        }
        if (!empty($car)) { ?><span class="icon-number"><?php
    echo '<img class=" car-icon-hd" src="' . get_template_directory_uri() . '/images/car.svg" />';
            $car = $car->name;
            echo $car;
            echo "</span>";
        } else { ?><span class="icon-number"><?php
    echo '<img class=" car-icon-hd" src="' . get_template_directory_uri() . '/images/car.svg" />';
            echo "-</span>";

        }
        ?>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php
endwhile;
} else {echo "<div class='text-center p-lg' style='display:flex; justify-content:center;width:100%;margin-top:2vh;'>Sorry. No Results found.</div>";}

?>
                    </div>

                    <?php if ($page_number_max > 1) {?>
                    <nav class="loadMore text-center"> <a href="#" class="loadmoreProjects btn-green btn">Load More
                            ↓</a> </nav>

                    <?php }?>
                </div>
            </div>
        </div>
</section>
<?php
wp_reset_postdata();
wp_reset_query();

get_footer();?>
<script>
jQuery('#button').click(function() {
    window.location.reload();

});
jQuery(window).resize(function() {
    //console.log('resizing');
    if (jQuery(document).width() > 991) {
        //console.log('>991');
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
</script>
