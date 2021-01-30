<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Pictura_Creative
 */

if (get_field('cards') == 1) {
    if (have_rows('cards', "option")):
        while (have_rows('cards', "option")): the_row();
            if (get_row_layout() == 'cards') {
                echo get_template_part('template-parts/cards/cards');
            }
        endwhile;
    endif;
}

if (have_rows('flexible_rows')):
    while (have_rows('flexible_rows')): the_row();
        if (get_row_layout() == 'full_box_with_icon') {
            echo get_template_part('template-parts/box/box', 'design');
        }
    endwhile;
endif;

if (get_field('show_footer_1') == 1) {

    if (have_rows('footer_section_1', "option")):

        while (have_rows('footer_section_1', "option")): the_row();

            if (get_row_layout() == 'box1') {
                echo get_template_part('template-parts/box/box', 'grid');
            }

        endwhile;
    endif;

}

if (get_field('show_footer_2') == 1) {

    if (have_rows('footer_section_2', "option")):

        while (have_rows('footer_section_2', "option")): the_row();

            if (get_row_layout() == 'box2') {
                echo get_template_part('template-parts/box/box', 'grid');
            }

        endwhile;
    endif;

}

if (get_field('guarentee') == 1 || is_single()) {

    if (have_rows('footer_section_3', "option")):

        while (have_rows('footer_section_3', "option")): the_row();

            if (get_row_layout() == 'picture_text_block') {
                echo get_template_part('template-parts/image-text-block/image-text-block');

            }

        endwhile;
    endif;

}

if (get_field('show_testimonials') == 1) {
    echo get_template_part('template-parts/testimonial/testimonial', 'slider');
}

if (get_field('cta') == 1 || is_single()) {

    if (have_rows('footer_section_4', "option")):

        while (have_rows('footer_section_4', "option")): the_row();

            if (get_row_layout() == 'cta') {
                echo get_template_part('template-parts/call-to-action/cta');
            }

        endwhile;
    endif;
}

if (get_field('subscription_form') == 1 || is_single()) {
    echo get_template_part('template-parts/subscription/form');
}

?>

<!-- </div> -->
<!-- #content -->

<?php $footer = get_field("footer_style", "option");?>
<?php echo get_template_part('template-parts/footer/footer', $footer); ?>
</div><!-- #page -->
<div class="goTop" id="goTop"></div>
</div><!-- #page -->
<script>
mybutton = document.getElementById("goTop");

var themeUrl = '<?php echo get_template_directory_uri() ?>';

jQuery('#filters-tablet').addClass('hide');
jQuery('#hnl-tab').addClass('hide');

jQuery(document).on('click', '#hidefilter', function() {

    jQuery('.desktop').toggleClass('hide');

    jQuery(this).text(function(i, text) {
        return text === "HIDE FILTERS" ? "SHOW FILTERS" : "HIDE FILTERS";
    });
});

jQuery(document).on('click', '#hidefilter3', function() {
    jQuery('.desktop').toggleClass('hide');

    jQuery(this).text(function(i, text) {
        return text === "HIDE FILTERS" ? "SHOW FILTERS" : "HIDE FILTERS";
    });
});
jQuery(document).on('click', '#hidefilter6', function() {

    jQuery('#hnl-tab').toggleClass('hide');
    jQuery(this).text(function(i, text) {
        return text === "HIDE FILTERS" ? "SHOW FILTERS" : "HIDE FILTERS";
    });
});

jQuery(document).on('click', '#hidefilter5', function() {
    jQuery('.desktop').toggleClass('hide');
    jQuery(this).text(function(i, text) {
        return text === "HIDE FILTERS" ? "SHOW FILTERS" : "HIDE FILTERS";
    });
});

jQuery(document).on('click', '#hidefilter2', function() {
    jQuery('.desktop').toggleClass('hide');
    jQuery(this).text(function(i, text) {

        return text === "SHOW FILTERS" ? "HIDE FILTERS" : "SHOW FILTERS";
    });
});

jQuery(function() {
    var lastScrollTop = 0,
        delta = 5;
    jQuery(window).scroll(function() {
        var nowScrollTop = jQuery(this).scrollTop();
        if (Math.abs(lastScrollTop - nowScrollTop) >= delta) {
            if (nowScrollTop > lastScrollTop) {
                // ACTION ON
                // SCROLLING DOWN
                jQuery('.goTop').css('display', 'none');

            } else {
                // ACTION ON
                // SCROLLING UP
                if (window.pageYOffset > 1220 && window.pageYOffset < (jQuery(document).height() -
                        100)) {
                    jQuery('.goTop').css('display', 'block');
                } else {
                    jQuery('.goTop').css('display', 'none');
                }

            }
            lastScrollTop = nowScrollTop;
        }
    });
});

jQuery('p:empty').remove();
jQuery('p').each(function() {
    if (jQuery(this).html() == '&nbsp;' || jQuery(this).html() == '')
        jQuery(this).remove();
})

jQuery(document).ready(function() {
    jQuery("body").children().each(function() {
        jQuery(this).html(jQuery(this).html().replace(/&#8232;/g, " "));
    });
    jQuery("body").children().each(function() {
        document.body.innerHTML = document.body.innerHTML.replace(/\u2028/g, ' ');
    });
});
	
jQuery(document).ready(function() {
    jQuery(".tribe-events-back a").attr('href', '<?php echo site_url() . "/events"; ?>');
    jQuery(".tribe-events-gcal").text('GOOGLE CALENDAR');
    jQuery(".tribe-events-ical").text('ICAL EXPORT');
	jQuery('.tribe-events-button').attr('target','_blank');

});

</script>
<?php wp_footer();?>

</body>

</html>
