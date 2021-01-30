<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pictura_Creative
 */

get_header();

$blogPageId = get_option('page_for_posts');

echo "<div class='breadcrumb container ' style='background-color:#ffffff;'><div class='contain mt-0'><div>";
echo do_shortcode('[wpseo_breadcrumb]');
echo "</div></div></div>";

//if (get_field("show_page_info", $blogPageId) == 1) {

?>
<!-- <section class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-<?php //echo get_field("alignment", $blogPageId) ?>">
                    <?php //if (get_field("subtitle", $blogPageId)) {?>
                    <h4><?php //echo get_field("subtitle", $blogPageId); ?></h4>
                    <?php //}?>
                    <h1 class="heading"><?php //echo get_the_title($blogPageId); ?></h1>
                </div>
            </div>
        </div>
    </div>
</section> -->
<?php
//}
?>
<section class="blog-list container">
    <div class="container white-bg">
        <div class="row contain">
            <div class="col-md-9 col-lg-9 col-sm-12">
                <?php
if (have_posts()):
    while (have_posts()):
        the_post();

        get_template_part('template-parts/blog/blog', 'listpage');

    endwhile;
endif;
?>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-12">
                <div class="sidebar blogSidebar">
                    <?php dynamic_sidebar("blog-sidebar");?>
                </div>
            </div>
            <div class="col-sm-12">
                <nav class="pagination">
                    <?php pagination_bar();?>
                </nav>
                <!-- .pagination -->
            </div>
        </div>
    </div>
</section>
<?php
wp_reset_postdata();
wp_reset_query();

if (have_rows('footer_section_3', "option")):

    while (have_rows('footer_section_3', "option")): the_row();

        if (get_row_layout() == 'picture_text_block') {
            echo get_template_part('template-parts/image-text-block/image-text-block');

        }

    endwhile;
endif;

echo get_template_part('template-parts/subscription/form');

if (have_rows('footer_section_4', "option")):

    while (have_rows('footer_section_4', "option")): the_row();

        if (get_row_layout() == 'cta') {
            echo get_template_part('template-parts/call-to-action/cta');
        }

    endwhile;
endif;

get_footer();
