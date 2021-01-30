<?php
/**
 * Template Name: Contact
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pictura_Creative
 */

get_header();
while (have_posts()): the_post();
    if (get_field("enquiry_popup", "option") == 1) {
        echo get_template_part('template-parts/modal/modal', 'enquiry');
    }

    if (get_field("show_page_info") == 1) {
        echo get_template_part("template-parts/page", "heading");
    }
    echo get_template_part("template-parts/page", "fullWidth");
    ?>

<?php if (get_field('background_color')) {$color = get_field('background_color');}?>
<section class="form container " style="background-color:<?php echo $color; ?>">
    <div class="container contain-container text-left mt-0 ">
        	<div class="max-div">
		<h4 class="st2 mid-gold row contact-title" style="padding-left:20px">
            <?php echo get_field("contact_column_title"); ?></h4>
        <div class="row text-left">

            <div class="col-md-6 col-lg-5 col-sm-12 container pb-50 contact-div1" data-aos="fade-up">

                <table class="black contact-table">
                    <p class="st3 bold contact-sub">Contact Details</p>
                    <?php if (get_field("phone", "option")) {?>
                    <tr>
                        <td class="ctd">Phone</td>
                        <td class="bold"><a class="p-st"
                                href="tel:<?php echo get_field("phone", "option"); ?>"><?php echo get_field("phone", "option"); ?></a>
                        </td>
                    </tr>
                    <?php }?>
                    <?php if (get_field("fax", "option")) {?>
                    <tr>
                        <td class="ctd">Fax</td>
                        <td><a class="p-st"
                                href="tel:<?php echo get_field("fax", "option"); ?>"><?php echo get_field("fax", "option"); ?></a>
                        </td>
                    </tr>
                    <?php }?>
                    <?php if (get_field("email", "option")) {?>
                    <tr>
                        <td class="ctd">Email</td>
                        <td class="p-st"><a class="p-st"
                                href="tel:<?php echo get_field("email", "option"); ?>"><?php echo get_field("email", "option"); ?></a>
                        </td>
                    </tr>
                    <?php }?>
                    <?php if (get_field("address_2", "option")) {?>
                    <tr>
                        <td class="ctd">Address</td>
                        <td class="p-st"><?php echo get_field("address_2", "option"); ?>
                        </td>
                    </tr>
                    <?php }?>
                </table>
                <table class="black contact-table">
                    <tr>
                        <td class="st3 bold contact-sub" style="padding-top:50px;">Trading Hours</td>
                    </tr>
                    <?php while (have_rows('trading_hours', "options")): the_row();?>
                    <tr>
                        <td><?php echo get_sub_field('days', "options"); ?></td>
                        <td class="bold"><?php echo get_sub_field('time', "options"); ?></td>
                    </tr>
                    <?php endwhile;?>
                </table>

                <?php ?>
            </div>
            <div class="col-md-6 col-lg-7 col-sm-12 contact-map" data-aos="fade-up">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 m-auto text-center" data-aos="fade-up">
                            <?php echo get_field("google_map"); ?>
                        </div>
                    </div>
                </div>

            </div>

            <div class="flex build-flex">
                <p class="where-build st2 mid-gold container"><?php echo get_field("main_title"); ?></p>
                <?php while (have_rows('suburbs')): the_row();?>
                <div class="col-lg-4 col-md-4 col-sm-12 suburb-card">
                    <p class="st3 black"><?php echo get_sub_field('title'); ?></p>
                    <div class="p-st black"><?php echo wp_trim_words(get_sub_field('content'), 15, ' ...'); ?></div>
                    <a class="gold-link"
                        href="<?php echo get_sub_field('link')['url'] ?>"><?php echo get_sub_field('link')['title']; ?></a>
                </div>
                <?php endwhile;?>
            </div>
            <div class="flex pb-50 granny-flex">
                <p class="granny-flex-title st2 mid-gold container" style="padding-bottom:15px;">
                    <?php echo get_field("title_gfs"); ?></p>
                <div class="col-lg-12 col-md-12 col-sm-12 container">
                    <div class="gfs-content p-st black" style="padding-bottom:15px;">
                        <?php echo get_field('content_gfs'); ?></div>
                    <a class="gold-link"
                        href="<?php echo get_field('link_gfs')['url'] ?>"><?php echo get_field('link_gfs')['title']; ?></a>
                </div>
            </div>
        </div>
    </div>
		</div>
</section>

<?php
endwhile;
get_footer();
