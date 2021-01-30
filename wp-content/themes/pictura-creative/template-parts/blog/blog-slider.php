<?php $extraClass = get_sub_field("extra_class");?>
<section class="blogs blog_slider <?php echo $extraClass ?>" style="background-color:<?php if (get_sub_field("blog_background_color")) {echo get_sub_field("blog_background_color");} else {echo '#fff';}
?>">
    <div class="container">
        <div class="row">
            <div class="col-sm-12" data-aos="fade-up">
                <?php if (get_sub_field("title")) {
    echo get_template_part('template-parts/title/title', 'style');
}?>
                <?php $btnStyle = get_sub_field("read_more_style");

echo do_shortcode("[blog-slider style='" . $btnStyle . "']");?>
            </div>
        </div>
    </div>
</section>
