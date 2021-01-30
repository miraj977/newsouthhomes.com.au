<?php $extraClass = get_sub_field("extra_class");?>

<section class="blogs blog_grid container<?php echo $extraClass ?>"
    style="background-color:<?php if (get_sub_field("blog_background_color")) {echo get_sub_field("blog_background_color");} else {echo '#fff';}?> ">
    <p class="st2 mid-gold bold container contain" style="padding-bottom:30px">Related Posts</p>
    <div class="container p-0">
        <div class="row contain">

            <?php if (get_sub_field("title")) {?>
            <div class="col-sm-12" data-aos="fade-up">
                <?php	echo get_template_part('template-parts/title/title', 'style'); ?>
            </div><?php
}?>
            <?php $query = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'order' => 'DESC',
    'orderby' => 'date',
    'post_status' => 'publish',
));
if ($query->have_posts()) {
    while ($query->have_posts()): $query->the_post();?>
            <div class="col-sm-12 mb-40 col-md-4" data-aos="fade-up">
                <div class="blog-grid">
                    <div class="blog-img">
                        <?php if (has_post_thumbnail()) {
            echo '<a href="<?php echo get_permalink(); ?>">';
                        the_post_thumbnail();
                        echo '</a>';
                        } else {?>
                        <img src="<?php echo get_template_directory_uri() . '/images/placeholder.jpg'; ?>"
                            alt="placeholder" title="placeholder" />
                        <?php }?>
                    </div>
                    <div class="blog-content">
                        <h4><a href="<?php echo get_permalink(); ?>"><?php the_title();?></a></h4>
                        <div class="blogDetail-date" data-aos="fade-up">
                            <span class="black bold p-st"><?php echo get_the_date(); ?></span>&nbsp;&nbsp;
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

                        <div class="content-link" id="mobile-btn" style="display:none;"><a class="btn btn-<?php echo $read_link_style . ' ' . $btnSize; ?>"
											                                href="<?php echo get_permalink(); ?>">Read More → </a></div>
                    </div>
                </div>
            </div>
            <?php
endwhile;}
wp_reset_postdata();
wp_reset_query();
?>
        </div>
    </div>
</section>
