<?php $extraClass = get_sub_field("extra_class");
if (get_sub_field("heading_class")) {$headingClass = get_sub_field("heading_class");}
if (get_sub_field("heading_tag")) {$headingTag = get_sub_field("heading_tag");}
if (get_sub_field("sub_tag")) {$subTag = get_sub_field("sub_tag");}
if (get_sub_field("heading_font_color")) {$headingColor = get_sub_field("heading_font_color");}
if (get_sub_field("title_class")) {$titleClass = get_sub_field("title_class");}
if (get_sub_field("title_primary_color")) {$titleColor = get_sub_field("title_primary_color");}
if (get_sub_field("content_class")) {$contentClass = get_sub_field("content_class");}
if (get_sub_field("content_color")) {$contentColor = get_sub_field("content_color");}
?>
<section class="grid-text container <?php echo $extraClass ?>"
    style="background-color:#fff;text-align:<?php echo get_sub_field('align_content'); ?>">
    <?php $grid_link_style = get_sub_field('grid_link_style')?>
    <div class="container contain-container">
        <div class="row process contain" style="max-width: 1020px;">
            <?php
if (have_rows('process_block')):
    $count = 1;
    $counter = 1;?>

            <!-- NUMBER -->
            <div class="flex section-div container contain" style="max-width: 1020px;">
                <?php while (have_rows('process_block')): the_row();?>
                <a id="go<?php echo $counter; ?>" href="#step<?php echo $counter; ?>" class="section-tab mid-gold">
                    <?php echo $counter;
        $counter++;
        echo '</a>'; ?><span class="dash"><img
                            src="<?php echo get_template_directory_uri() . '/images/dash.svg' ?>"></span>
                    <?php endwhile;
    echo '</div>';
    // NUMBER END
    while (have_rows('process_block')): the_row();
        if (get_sub_field("heading_class")) {$headingClass = get_sub_field("heading_class");}
        if (get_sub_field("heading_tag")) {$headingTag = get_sub_field("heading_tag");}
        if (get_sub_field("sub_tag")) {$subTag = get_sub_field("sub_tag");}
        if (get_sub_field("heading_font_color")) {$headingColor = get_sub_field("heading_font_color");}
        if (get_sub_field("title_class")) {$titleClass = get_sub_field("title_class");}
        if (get_sub_field("title_primary_color")) {$titleColor = get_sub_field("title_primary_color");}
        if (get_sub_field("content_class")) {$contentClass = get_sub_field("content_class");}
        if (get_sub_field("content_color")) {$contentColor = get_sub_field("content_color");}

        ?>

                    <section class=" col-12 process-container flex" id="<?php echo "step" . $count; ?>">
                        <div data-aos="fade-up" class="col-md-8 col-sm-12 col-xs-12 process-content">
                            <!-- title -->

                            <?php if (get_sub_field('image')) {
            $img = get_sub_field('image');?>
                            <img src=" <?php echo $img['url']; ?>">
                            <?php }?>
                            <?php if (get_sub_field('content')) {?>
                            <div
                                class=" gridText process-content-text <?php echo $contentClass . ' ' . $contentColor; ?>">
                                <?php echo get_sub_Field('content'); ?>
                            </div>
                            <?php }?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 process-title" data-aos="fade-up" style="padding:0;">
                            <?php if (get_sub_field("title")) {?>
                            <!-- <div class="flex number t1 mid-gold"><?php //echo '0' . $count; ?></div> -->
                            <div class="flex number-flex">
                                <?php echo '<img src="' . get_template_directory_uri() . '/images/' . $count . '.svg">'; ?>
                            </div>
                            <?php	echo get_template_part('template-parts/title/title', 'style'); ?>
                            <?php }?>
                        </div>

                    </section>
                    <?php $count++;endwhile;else:endif;?>
            </div>
        </div>
</section>
		<script>
jQuery(document).ready(function() {
    // Add smooth scrolling to all links
    jQuery("a").on('click', function(event) {
        console.log(event);
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            jQuery('html, body').animate({
                scrollTop: jQuery(hash).offset().top - 100
            }, 800, function() {

                // Add hash (#) to URL when done scrolling (default click behavior)
                //window.location.hash = hash;
            });
        } // End if
    });
});
</script>
