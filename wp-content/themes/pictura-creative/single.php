<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Pictura_Creative
 */

get_header();
?>
<section class="blog-list container pt-100">
    <div class="container">
        <div class="row contain">
            <div class="col-lg-9 col-md-9 col-sm-12">
                <?php
if (have_posts()):
    while (have_posts()):
        the_post();
        ?>
                <div class="blogDEtail-img" data-aos="fade-up" style="border-top: 1px solid #9b8f63
																																    ;">
                    <div style="padding-top:50px">
                        <?php the_post_thumbnail();?></div>
                </div>
                <div class="blog-header">
                    <h1 class="t2 black" data-aos="fade-up">
                        <?php the_title();?>
                    </h1>
                    <div class="blogDetail-date" data-aos="fade-up">
                        <span class="black bold p-st"><?php echo get_the_date(); ?></span>&nbsp;&nbsp;
                    </div>
                </div>

                <div class="blogDetail-content" data-aos="fade-up">
                    <?php the_content();?>
                </div>
                <?php
    endwhile;
endif;
?>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-12">
                <div class="sidebar blogSidebar">
                    <?php dynamic_sidebar("blog-sidebar");?>
                </div>
            </div>

        </div>
    </div>
</section>
<?php
get_template_part("template-parts/blog/blog", "grid");
wp_reset_postdata();
wp_reset_query();

get_footer();
