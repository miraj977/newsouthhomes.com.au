<?php
/**
 * Template Name: Event Register
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

<section class="project-list container grid">
    <div class="container">
        <?php $id = $_GET['id'];?>

        <div class="row contain" style="max-width:980px;">
            <a onClick="javascript:history.go(-1)" class="back bold p-st black p-lr-20"><span class="arrow">→</span>Back
                To Event</a>
            <div class="single-event-title" style="width:100%;">
                <p style="width:100%;" class="bold"><?php echo get_field('date_time', $id); ?></p>
                <p class="st1 mid-gold  contain" style="width:100%;font-size:40px;line-height:48px;margin-bottom:50px">
                    <?php echo get_the_title($id); ?>
                </p>
            </div>

            <p class="p-st black col-12" style="margin-bottom:20px;">Please provide us with details for your
                registration.</p>


            <?php echo do_shortcode('[contact-form-7 id="2112" title="Registration"]'); ?>
        </div>
	</div>
</section>
<script>document.title = "<?php echo get_the_title($id); ?>";</script>
<?php

get_footer();?>
