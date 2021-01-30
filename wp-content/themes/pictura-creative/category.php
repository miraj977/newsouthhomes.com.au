<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pictura_Creative
 */

get_header();
echo "<div class='breadcrumb container '  style='padding-bottom:90px;background-color:#ffffff;'>
    <div class='p-lr-20'>
        <div class='row contain'>
            <div class='col-sm-12'>";
echo do_shortcode('[wpseo_breadcrumb]');
echo "</div>
        </div>
    </div>
</div>";?>


<section class="page-heading pb-0 white-bg container">
    <div class="container">
        <div class="row contain">
            <div class="col-sm-12 ">
                <div class="text-left">
                    <h1 class="t2 mid-gold"><?php the_archive_title();?></h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-list container">
    <div class="container">
        <div class="row contain">
            <div class="col-md-8 col-lg-9 col-sm-12">
                <?php
if (have_posts()):
    while (have_posts()):
        the_post();

        get_template_part('template-parts/blog/blog', 'listpage');

    endwhile;
endif;
?>


            </div>
            <div class="col-md-4 col-lg-3 col-sm-12">
                <div class="sidebar blogSidebar">
                    <?php dynamic_sidebar("blog-sidebar");?>
                </div>
            </div>
            <div class="col-sm-12">
                <nav class="pagination">
                    <?php pagination_bar();?>
                </nav>
            </div>

        </div>
    </div>
</section>
<?php
get_footer();
