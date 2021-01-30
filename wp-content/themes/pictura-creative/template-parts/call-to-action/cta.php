<section class="grid container cta-footer text-center" style="background: <?php echo get_sub_field('background_color'); ?>">
    <?php //print_r(get_fields('options'));?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 m-auto">
                <div class="cta_text" data-aos="fade-up">
                    <<?php echo get_sub_field('sub_title_tag'); ?> class="heading_title"><?php echo get_sub_field('sub_title'); ?></<?php echo get_sub_field('sub_title_tag'); ?>>

                    <<?php echo get_sub_field('title_tag'); ?> class="t2 text-white pb-20"><?php echo get_sub_field('title'); ?></<?php echo get_sub_field('title_tag'); ?>>
                    <p class="img-text-content max-content mb-8"><?php echo get_sub_field('content'); ?>
                    </p>
                </div>
                <?php
$link = get_field('button', "option");
if (get_field('button_size', "option")) {
    $btnSize = 'btn-' . get_field('button_size', "option");
} else {
    $btnSize = 'btn-small';
}
if ($link) {
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                <div class="cta-link" data-aos="fade-up">
                    <a class=" cta-call btn-<?php echo get_field('button_style', "option") . ' ' . $btnSize; ?>"
                        href="tel:<?php echo get_field('phone', "option"); ?>" target="<?php echo $link_target; ?>">
                        <?php echo 'Call us on <span style="white-space:nowrap;">' . get_field('phone', "option") . "</span>"; ?>
                    </a> <span class="text-white bold p-lg" style="margin:15px 20px;">or</span>
                    <a class="enquiry_btn cta-enquire btn-<?php echo get_field('button_style', "option") . ' ' . $btnSize; ?>"
                        href="#popup">
                        Enquire online now
                    </a>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
</section>
