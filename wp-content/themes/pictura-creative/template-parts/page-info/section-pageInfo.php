<?php $extraClass = get_sub_field("extra_class");?>
<section class="pageInfo <?php echo $extraClass ?>"
    style="background-color: <?php echo get_sub_field('background_color') ?>">
    <div class="container">
        <div class="row contain">
            <div class="col-sm-12" data-aos="fade-up">
                <?php echo get_template_part('template-parts/title/title', 'style');
?>
            </div>
            <?php
if (get_sub_field("dark_text_alignment") == "left") {
    $order1 = 0;
    $order2 = 1;
} else {
    $order1 = 1;
    $order2 = 0;
}
?>
            <div class="col-md-6 col-lg-6 col-sm-12 order<?php echo $order1 ?>" data-aos="fade-up">
                <h5><?php echo get_sub_field("dark_text") ?></h5>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 order<?php echo $order2 ?>" data-aos="fade-up">
                <?php echo get_sub_field("text") ?>
            </div>
        </div>
    </div>
</section>
