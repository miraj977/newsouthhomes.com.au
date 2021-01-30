<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Pictura_Creative
 */

get_header();

?>
<div class='breadcrumb container ' style='background-color:#fff !important;margin-top: 70px;'>
    <div class='contain " . $contain . " mt-0'>
        <div class='row'>
            <div class="col-sm-12"><span><span><a href="<?php echo site_url(); ?>">Home</a>
                        <span class="breadcrumb_last" aria-current="page">You searched for
                            '<?php echo $_GET['s'] ?>'</span></span></span></span></div>
        </div>
    </div>
</div>
<section class="blog-list search-page container white-bg">
    <div class="container">
        <div class=" contain">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <?php
if (have_posts()):
    echo '<h3 class="results">Showing results for: ' . $_GET["s"] . '</h3>';
    while (have_posts()):
        the_post();
        ?>
                <div class="blog-row">
                    <div class="blog-list-content">
                        <h3 class="st2 mid-gold search-row-title"><?php the_title();?></h3>

                        <?php
        $content = get_the_content();
        $content = strip_tags($content);
        if ($content != '') {
            echo substr($content, 0, 120);
        } else {
            echo substr(get_post_custom(get_the_ID())['home_details_0_description'][0], 0, 320);
        }

        $read_link_style = get_sub_field("read_more_style");?>

                        <div class="content-link"><a class="gold-link" href="<?php echo get_permalink(); ?>">Read more
                                →</a></div>
                    </div>
                </div>

                <?php endwhile;?>
                <div class="col-sm-12">
                    <nav class="pagination">
                        <?php pagination_bar();?>
                    </nav>
                    <!-- .pagination -->
                </div>
                <?php
else: ?><div style="min-height:500px;">
                    <h3 class="results">No results found for <?php echo $_GET["s"]; ?></h3>
                    <a href="<?php echo site_url(); ?>" class="back bold p-st black "><span class="arrow">→</span>Back
                        To
                        Home</a>
                </div>
                <?php endif;
?>

                <!-- .navigation -->

            </div>
        </div>
    </div>
</section>

<?php

if (have_rows('footer_section_2', "option")):

    while (have_rows('footer_section_2', "option")): the_row();

        if (get_row_layout() == 'box2') {
            echo get_template_part('template-parts/box/box', 'grid');
        }

    endwhile;
endif;

if (have_rows('footer_section_3', "option")):

    while (have_rows('footer_section_3', "option")): the_row();

        if (get_row_layout() == 'picture_text_block') {
            echo get_template_part('template-parts/image-text-block/image-text-block');

        }

    endwhile;
endif;

echo get_template_part('template-parts/testimonial/testimonial', 'slider');

if (have_rows('footer_section_4', "option")):

    while (have_rows('footer_section_4', "option")): the_row();

        if (get_row_layout() == 'cta') {
            echo get_template_part('template-parts/call-to-action/cta');
        }

    endwhile;
endif;

echo get_template_part('template-parts/subscription/form');

get_footer();
