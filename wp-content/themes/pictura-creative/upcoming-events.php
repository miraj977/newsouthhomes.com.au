<?php
/**
 * Template Name:Upcoming Events
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
// $custom_post_type = "events";
// $results = $wpdb->get_results($wpdb->prepare("SELECT * FROM wp_posts WHERE post_status = 'publish'"), ARRAY_A);
// echo "<pre>";
// print_r($results);
// echo "</pre>";exit;

?>

<section class="event-list container grid white-bg">
    <div class="container">
        <div class="row contain">
            <!--------------------product loop ----------->

            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="row">
                    <div class="projectWrap">
                        <?php

$query = new WP_Query(array(
    'post_type' => 'tribe_events',
    'posts_per_page' => -1,
//     'paged' => 1,
    'order' => 'DESC',
	'meta_key' => '_EventStartDate',
    'orderby' => 'meta_value',
    'post_status' => 'publish',

));

$count = $query->found_posts;
$posts_per_page = -1;
$page_number_max = ceil($count / $posts_per_page);
$disp = $disp1 = 0;
$i = 1;
if ($query->have_posts()) {
    while ($query->have_posts()): $query->the_post();
        $dt = get_post_meta(get_the_ID(), '_EventStartDate')[0];
        $de = get_post_meta(get_the_ID(), '_EventEndDate')[0];
		$dta = date("Y-m-d",strtotime($dt));
        $ct = date("Y-m-d");
        $st = date("d F Y &\\nb\\sp;  h:i a",strtotime($dt));
        $se = date("d F Y &\\nb\\sp;  h:i a",strtotime($de));
        if($st != $se){
            $sn = date("h:i a",strtotime($de));
            $date = $st.' - '.$sn;
        }else{
            $date = $st;
        }
        
        if ($ct <= $dta) {
            ?>

                        <?php if ($disp == 0) {?>
                        <p class="st2 black events-p upcoming"><?php echo date('F j, Y');
                ?> Onwards</p>
                        <?php }?>
                        <div class="col-sm-12 col-md-12 col-lg-12 p-0" data-aos="fade-up">
                            <div class="event-list-div flex" style="justify-content:space-between;">
                                <div class="col-lg-7 col-md-7 col-sm-12 event-desc p-0">
                                    <div class="projectIcons-2">
                                        <p class="p-st bold black m-0"><?php echo $date; ?></p>
                                        <a href="<?php the_permalink()?>">
                                            <h5 class="event-list-title mid-gold st2">
                                                <?php echo the_title(); ?>
                                            </h5>
                                        </a>
                                        <p class="event-date-p black m-0" style="padding-bottom:20px;"><?php print_r(tribe_get_venue_single_line_address( get_the_ID(), $link = false )); ?></p>

                                        <?php
    $contentClass = get_field('content_class');
            $contentColor = get_field('content_color');
            echo "<div class='event" . $i . ' ' . $contentClass . ' ' . $contentColor . " lot-description'>" . the_content() . "</div>"
            ?>
                                        <div class="anchor-div" id="event<?php echo $i; ?>">

                                            <a class="p-sm mid-gold show-btn event<?php echo $i . 'btn'; ?>">Show
                                                More</a>&nbsp;
                                            <a data-id="event<?php echo $i; ?>" id="e<?php echo $i; ?>"
                                                class="anch<?php echo $i; ?>">
                                                <img src="<?php echo get_template_directory_uri() ?>/images/downevent.svg"
                                                    class="show-arrow rotate2">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="buttons-event flex">
                                        <a href="<?php echo site_url() ?>/register?id=<?php echo get_the_ID(); ?>&title=<?php echo the_title(); ?>"
                                            class="btn register-btn">REGISTER</a>
                                        <a href="<?php the_permalink();?>" class="btn details-btn">DETAILS</a>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-12 p-0 event-img">
                                    <?php $image = get_field('image')['url'];?>
                                    <?php echo get_the_post_thumbnail(); ?>
                                </div>
                            </div>
                        </div>
                        <?php $disp++;
        } else {?>
                        <?php if ($disp1 == 0) {?>
                        <p class="st2 black events-p pt-100 past">Past Events</p>
                        <?php if ($disp1 > 3) {$hide = "display:none;";}}
            ?>
                        <div class="col-sm-12 col-md-12 col-lg-12 p-0" data-aos="fade-up" style="<?php echo $hide; ?>">
                            <div class="event-list-div flex grey-event" style="justify-content:space-between;">
                                <div class="col-lg-7 col-md-7 col-sm-12 event-desc p-0">
                                    <div class="projectIcons-2">
                                        <p class="p-st bold grey m-0"><?php echo $date; ?></p>
                                        <a href="<?php the_permalink()?>">
                                            <h5 class="event-list-title mid-gold st2">
                                                <?php echo the_title(); ?>
                                            </h5>
                                        </a>
                                        <p class="event-date-p grey m-0" style="padding-bottom:20px;"><?php print_r(tribe_get_venue_single_line_address( get_the_ID(), $link = false )); ?></p>

                                        <?php
    $contentClass = get_field('content_class');
            $contentColor = get_field('content_color');
            echo "<div class='event" . $i . ' ' . $contentClass . ' ' . $contentColor . " lot-description'>" . the_content() . "</div>"
            ?>
                                        <div class="anchor-div" id="event<?php echo $i; ?>">

                                            <a class="p-sm mid-gold show-btn event<?php echo $i . 'btn'; ?>">Show
                                                More</a>&nbsp;
                                            <a data-id="event<?php echo $i; ?>" id="e<?php echo $i; ?>"
                                                class="anch<?php echo $i; ?>">
                                                <img src="<?php echo get_template_directory_uri() ?>/images/downevent.svg"
                                                    class="show-arrow rotate2">
                                            </a>
                                        </div>
                                    </div>
									<div class="buttons-event flex">
                                        <a href="<?php echo site_url() ?>/register?id=<?php echo get_the_ID(); ?>&title=<?php echo the_title(); ?>"
                                            class="btn register-btn">REGISTER</a>
                                        <a href="<?php the_permalink();?>" class="btn details-btn">DETAILS</a>
                                    </div>

                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-12 p-0 event-img">
                                    <?php $image = get_field('image')['url'];?>
                                    <?php echo get_the_post_thumbnail(); ?>
                                </div>

                            </div>
                        </div>
                        <?php $disp1++;
        }

        $i++;endwhile;
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
jQuery(document).on('click', '.anchor-div', function() {
    let id = jQuery(this).attr('id');
    jQuery('.' + id + ' p').toggleClass('hide-event');
    jQuery('.' + id + 'btn').text(function(i, text) {
        return text === "Show less " ? "Show more  " : "Show less ";
    });
    jQuery('#' + id + ' img').toggleClass('rotate');
    jQuery('#' + id + ' img').toggleClass('rotate2');
    //console.log('.' + id + ' img');
});
</script>
