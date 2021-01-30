<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Pictura_Creative
 */

get_header();

?>
<section class="grid pt-80 container" style="background-color:#fff;">
    <div class="container">
        <div class="row contain" style="max-width: 980px;">
            <?php
//echo get_field("start_date", false, false); ?>

            <a onClick="javascript:history.go(-1)" class="back bold p-st black p-lr-20"><span class="arrow">→</span>All
                Events</a>
            <div class="title-bar col-12">
                <div class="left-title">
                    <p class="p-md black bold"><?php echo get_field('date_time'); ?></p>
                    <h1 class=" <?php echo get_field('title_class') . ' ' . get_field('title_primary_color'); ?>">
                        <?php echo get_the_title(); ?>
                    </h1>
                </div>
                <div class="right-title">
                    <p><a href="<?php echo site_url() ?>/register?id=<?php echo get_the_ID(); ?>"
                            class="btn register-btn ">REGISTER</a></p>
                </div>
            </div>
            <div class="tags">
                <?php
$tags = get_tags(get_the_ID());
foreach ($tags as $tag) {
    echo '<span class="tag p-sm black">' . $tag->name . '</span>';
}

?>
            </div>
            <div class="event-img-div">
                <img class="contain" style="width:100%;" src="<?php echo get_field('image')['url'] ?>"
                    alt="<?php echo get_the_title(); ?>" />
            </div>
            <div
                class="col-12 event-content <?php echo get_field('content_class') . ' ' . get_field('content_color'); ?>">
                <?php echo get_field('content'); ?>
            </div>

            <div class="calendar-button">
                <?php
$start_date = get_field("date_time", false, false); // EDIT THIS WITH YOUR OWN VALUE
$end_date = get_field("end_date", false, false); // EDIT THIS WITH YOUR OWN VALUE
if ($start_date != '') {
    $start_date = strtotime($start_date);
    $start_date = wp_date("Ymd\THis", $start_date);
}
if ($end_date != '') {
    $end_date = strtotime($end_date);
    $end_date = wp_date('Ymd\THis', $end_date);
}
?>
                <a href="https://calendar.google.com/calendar/u/0/r/eventedit?text=<?php echo get_field('event_name', get_the_ID()) ?>&dates=<?php echo $start_date . '/' . $end_date; ?>
&details=<?php echo wp_strip_all_tags(get_field('content')); ?>&location=<?php echo get_field('address');
?>&trp=false&sprop=<?php echo get_the_permalink(); ?>&sf=true
" class=" calendar-btn " style="margin-left:10px;" target="_blank">GOOGLE CALENDAR</a>
                <a href="<?php echo get_feed_link('calendar'); ?>?id=<?php echo get_the_ID(); ?>"
                    class=" calendar-btn ">ICAL EXPORT</a>
            </div>
        </div>
    </div>

</section>
<?php
wp_reset_postdata();
wp_reset_query();
?>
<hr class="container" style="background: #fff;
    margin: 0 auto;
    position: absolute;
    left: 0;
    right: 0;
    width: calc(100% - 40px);
    opacity: 0.4;max-width: 1160px;">
<section class="blogs blog_grid container<?php echo $extraClass ?>"
    style="background-color:<?php if (get_sub_field("blog_background_color")) {echo get_sub_field("blog_background_color");} else {echo '#fff';}?> ">
    <p class="st2 mid-gold bold container contain event-related" style="padding-bottom:50px">Related Events</p>
    <div class="container">
        <div class="row contain">

            <?php if (get_sub_field("title")) {?>
            <div class="col-sm-12" data-aos="fade-up">
                <?php	echo get_template_part('template-parts/title/title', 'style'); ?>
            </div><?php
}?>
            <?php
$query = new WP_Query(array(
    'post_type' => 'event',
    'posts_per_page' => 3,
    'order' => 'DESC',
    'orderby' => 'date',
    'post_status' => 'publish',
));
if ($query->have_posts()) {
    while ($query->have_posts()): $query->the_post();
        $datetime = get_field('date_time');
        $currentdatetime = date("j F Y g:i a");
        $dt = date("Y-m-d", strtotime($datetime));
        $ct = date("Y-m-d", strtotime($currentdatetime));
        if (($dt > $ct) && get_post_field('post_name', get_post()) != basename($_SERVER['REQUEST_URI'])) {
            ?>
            <div class="col-sm-12 mb-40 col-md-4" data-aos="fade-up">
                <div class="blog-grid">
                    <div class="blog-img">
                        <?php if (get_field('image', get_the_ID())) {
                echo '<a href="<?php echo get_permalink(); ?>">';
                        ?><img src=<?php echo get_field('image', get_the_ID())['url']; ?>><?php
    echo '</a>';
            } else { ?>
                        <img src="<?php echo get_template_directory_uri() . '/images/placeholder.jpg'; ?>"
                            alt="placeholder" title="placeholder" />
                        <?php }?>
                    </div>
                    <div class="blog-content">
                        <h4><a href="<?php echo get_permalink(); ?>" class="mid-gold"><?php the_title();?></a></h4>
                        <div class="blogDetail-date" data-aos="fade-up">
                            <span class="black p-st"><?php echo get_the_date(); ?></span>&nbsp;&nbsp;
                        </div>
                        <?php
    $content = get_the_content();
            $content = strip_tags($content);
            echo substr($content, 0, 120);
            $read_link_style = get_sub_field("read_more_style");
            if (get_sub_field('button_size')) {
                $btnSize = 'btn-' . get_sub_field('button_size');
            } else {
                $btnSize = 'btn-small';
            }
            ?>

                        <div class="content-link" id="mobile-btn" style="display:none;"><a
                                class="btn btn-<?php echo $read_link_style . ' ' . $btnSize; ?>"
                                href="<?php echo get_permalink(); ?>">Read More → </a></div>
                    </div>
                </div>
            </div>
            <?php
    } else {?>
            <script>
            // jQuery('.blogs').hide();
            </script>
            <?php }
    endwhile;}
wp_reset_postdata();
wp_reset_query();
?>
        </div>
    </div>
</section>

<?php get_footer();?>
