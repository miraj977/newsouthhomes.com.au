<?php
/**
 * Template Name: Completed Projects
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pictura_Creative
 */

get_header();
while (have_posts()): the_post();

    echo get_template_part('template-parts/page', 'fullWidth');
endwhile;
?>

<?php //echo do_shortcode('[am_post_grid btn_all="yes"]');
// global $wpdb;
// $custom_post_type = "home_designs";
// $results = $wpdb->get_results($wpdb->prepare("SELECT * FROM wp_posts WHERE post_status = 'publish'"), ARRAY_A);
// echo "<pre>";
// print_r($results);
// echo "</pre>";exit;
if (is_page('completed-projects')) {$class = "pt-0";}
?>
<section class="project-list container grid <?php echo $class; ?> completed-project-list">
    <div class="">
        <div class="row contain">
            <!--------------------product loop ----------->
            <div class="col-md-12 col-lg-3 col-sm-12 p-0 filter-main">
                <?php echo get_template_part('template-parts/home-design/section', 'filter-desktop'); ?>
                <?php echo get_template_part('template-parts/home-design/section', 'completed-tablet'); ?>
            </div>
            <div class="col-md-12 col-lg-9 col-sm-12 hd-col">
                <div class="row">
					 <div id="noResultsFound"
                        style="color:#fff;font-size: 20px;text-align: center;width: 100%;vertical-align: middle;position: absolute;top: 352px;  ">
                        No Results found</div>
                    <div class="projectWrap">
                        <?php

$query = new WP_Query(array(
    'post_type' => 'completed_projects',
    'posts_per_page' => -1,
//     'paged' => 1,
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
        $car = get_the_terms($post->ID, 'garage');
        $car = array_shift($car);
        $type = get_the_terms($post->ID, 'home_types');
        $type = array_shift($type);
        $size = 'size' . get_sub_field('home_size', $post->ID);
        $lot = 'lot' . get_sub_field('lot_size', $post->ID);

        ?>
                        <div class="col-sm-12 col-md-6 col-lg-4 p-0  workItem show-workItem mix <?php echo " " . $bedroom->slug . 'bed' . " " . $storey->slug . " " . $termsBath->slug . 'bath' . " " . $type->slug . " " . $size . " " . $lot; ?>">
                             <div class="project-grid ">
                                <a href=" <?php echo get_permalink(); ?>">
                                    <div class="img-pad"
                                        style="padding-bottom: 65%;position:relative;width: 100%;height:100%;">
                                        <?php
    while (have_rows('completed_home_details')): the_row();
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
} else {echo "<div class='text-center p-lg no-result'>Sorry. No Results found.</div>";}

?>
                    </div>

                    <?php if ($page_number_max > 1) {?>
<!--                     <nav class="loadMore text-center"> <a href="#" class="loadmoreProjects btn-green btn">Load More
                            ↓</a> </nav> -->

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
jQuery('#hidefilter3').click(function() {
    jQuery('.desktop').toggleClass('hide');
    AOS.refresh();
    jQuery(this).text(function(i, text) {
        return text === "SHOW FILTERS" ? "HIDE FILTERS" : "SHOW FILTERS";
    });
    jQuery('#hidefilter4').text(function(i, text) {
        return text === "SHOW FILTERS" ? "HIDE FILTERS" : "SHOW FILTERS";
    });
});
jQuery('#hidefilter4').click(function() {
    jQuery('.desktop').toggleClass('hide');
    AOS.refresh();
    jQuery(this).text(function(i, text) {
        return text === "SHOW FILTERS" ? "HIDE FILTERS" : "SHOW FILTERS";
    });
    jQuery('#hidefilter3').text(function(i, text) {
        return text === "SHOW FILTERS" ? "HIDE FILTERS" : "SHOW FILTERS";
    });
    jQuery('#hidefilter3').text('SHOW FILTERS');

});

// jQuery('#projects').lazyload();
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

