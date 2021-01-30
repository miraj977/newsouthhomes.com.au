<?php $extraClass = get_sub_field("extra_class");?>
<section class="projects project_slider <?php echo $extraClass ?>"
    style="background-color:<?php echo get_sub_field("project_background_color") ?> ">
    <div class="container">
        <div class="row contain" data-aos="fade-up">
            <div class="col-sm-12">
                <?php if (get_sub_field("title")) {
    echo get_template_part('template-parts/title/title', 'style');
}?>
                <?php $btnStyle = get_sub_field("read_more_style");
echo do_shortcode("[project-slider style='" . $btnStyle . "']");?>
            </div>
        </div>
    </div>
</section>
