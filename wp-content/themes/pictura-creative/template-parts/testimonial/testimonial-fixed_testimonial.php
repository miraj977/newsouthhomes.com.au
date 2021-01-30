<?php $extraClass = get_sub_field("extra_class");?>
<section class="testimonial testimonial_slider <?php echo $extraClass ?>" style="background-color:<?php echo get_sub_field("testimonial_background_color") ?>
" data-aos="fade-up">
    <div class="container">
        <div class="row contain" style="max-width:90%;">
            <div class="col-sm-12 " data-aos="fade-up">
                <?php if (get_sub_field("title")) {
    echo get_template_part('template-parts/title/title', 'style');

}?>
                <?php
$post_object = get_sub_field('choose_testimonial');
$testimonialId = get_sub_field('choose_testimonial');
if ($post_object):
    $post = $post_object;
    setup_postdata($post);
    ?>
                <div class="testimonial-content">
                    <?php $content = get_the_content();
    $content = strip_tags($content)?>
                    <h5 class="demiBold"><?php echo $content ?></h5>
                    <p class="bold"><?php the_title();?></p>
                    <?php //echo get_field("client_name",$testimonialId)?>
                </div>
                <?php wp_reset_postdata();
    wp_reset_query();?>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>
