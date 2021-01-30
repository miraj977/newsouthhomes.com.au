<?php
if (have_rows('flexible_rows')):
    while (have_rows('flexible_rows')): the_row();

        if (get_row_layout() == 'faq') {
            $faq_layout = get_sub_field('choose_faq_style');
            echo get_template_part('template-parts/faq/layout', $faq_layout);
        } else if (get_row_layout() == 'content') {

        echo get_template_part('template-parts/content/content', 'layout');
    } else if (get_row_layout() == 'shortcode') {

    echo get_template_part('template-parts/shortcode/shortcode', 'layout');
} else if (get_row_layout() == 'content_home') {

    echo get_template_part('template-parts/content/content-home');
} else if (get_row_layout() == 'grid_layout') {
    $equal = get_sub_field('equal_columns');
    if ($equal == 1) {
        echo get_template_part('template-parts/grid/grid', 'equal');
    } else {
        echo get_template_part('template-parts/grid/grid', 'normal');
    }
} else if (get_row_layout() == 'right_left_column') {
    $rightLeft = get_sub_field('choose_style');
    echo get_template_part('template-parts/rightLeft-columns/grid-fixedGrid');
} else if (get_row_layout() == 'home_right_left_column') {
    $rightLeft = get_sub_field('home_choose_style');
    echo get_template_part('template-parts/home-rightLeft-columns/homegrid-fixedGrid');
} else if (get_row_layout() == 'call_to_action') {
    $cta_layout = get_sub_field('choose_style');
    echo get_template_part('template-parts/call-to-action/cta', $cta_layout);
} else if (get_row_layout() == 'testimonial') {
    $tesimonial = get_sub_field('choose_style');
    echo get_template_part('template-parts/testimonial/testimonial', $tesimonial);
} else if (get_row_layout() == 'client_logos') {
    $clientLogos = get_sub_field('choose_style');
    echo get_template_part('template-parts/clientLogos/clientLogos', $clientLogos);
} else if (get_row_layout() == 'title') {
    $title = get_sub_field('choose_style');
    echo '<' . $title . '>' . get_sub_field('title') . '</' . $title . '>';
} else if (get_row_layout() == 'blog_section') {
    $blogs = get_sub_field('blog_style');
    echo get_template_part('template-parts/blog/blog', $blogs);
} else if (get_row_layout() == 'project_section') {
    $project = get_sub_field('project_style');
    echo get_template_part('template-parts/project/project', $project);
} else if (get_row_layout() == 'background_image_with_text') {
    echo get_template_part('template-parts/background-image-with-text/bgimage', 'text');
} else if (get_row_layout() == 'text_grid_layout') {
    echo get_template_part('template-parts/grid-text/grid', 'text');
} else if (get_row_layout() == 'quote_section') {
    echo get_template_part('template-parts/quote/section', 'quote');
} else if (get_row_layout() == 'our_team') {
    echo get_template_part('template-parts/team/our-team');
} else if (get_row_layout() == 'box_with_icon') {
    echo get_template_part('template-parts/box/box', 'grid');
} else if (get_row_layout() == 'on_display') {
    echo get_template_part('template-parts/display/ondisplay');
} else if (get_row_layout() == 'page_block') {
    echo get_template_part('template-parts/page-info/block');
} else if (get_row_layout() == 'video_block') {
    echo get_template_part('template-parts/page-info/video');
} else if (get_row_layout() == 'our_process') {
    echo get_template_part('template-parts/process/block');
} else if (get_row_layout() == 'style_studio') {
    echo get_template_part('template-parts/studio/studio');
} else if (get_row_layout() == 'page_info') {
    echo get_template_part('template-parts/page-info/section', 'pageInfo');
} else if (get_row_layout() == 'why_choose_us') {
    echo get_template_part('template-parts/page-info/why-choose-us');
} else if (get_row_layout() == 'about_us') {
    echo get_template_part('template-parts/page-info/about-us');
} else if (get_row_layout() == 'customer_experience') {
    echo get_template_part('template-parts/page-info/customer-experiences');
} else if (get_row_layout() == 'resources') {
    echo get_template_part('template-parts/resources/resources');
} else {

}
endwhile;
else:

endif;
if (have_rows('image_gallery')) {
    echo get_template_part('template-parts/inspiration/gallery');

}
