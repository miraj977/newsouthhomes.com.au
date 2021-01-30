<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Pictura_Creative
 */

?>
<!doctype html>
<html <?php language_attributes();?>>

    <head>
        <meta charset="<?php bloginfo('charset');?>">
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="profile" href="https://gmpg.org/xfn/11">
		<?php if(is_page(915)){?>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<?php }?>
		<link rel="preload" href="<?php echo get_template_directory_uri()?>/font/Basis/BasisGrotesquePro-Regular.ttf" as="font" type="font/ttf" crossorigin>
        <link rel="preload" href="<?php echo get_template_directory_uri()?>/font/Basis/BasisGrotesquePro-Bold.ttf" as="font" type="font/ttf" crossorigin>
        <link rel="preload" href="<?php echo get_template_directory_uri()?>/font/Domaine/DomaineDisplayBold.woff" as="font" type="font/woff" crossorigin>
        <link rel="preload" href="<?php echo get_template_directory_uri()?>/font/Ringtown/TTF/Ringtown.ttf" as="font" type="font/ttf" crossorigin>
        <?php wp_head();?>
<!--         <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/custom-changes.js?v=5"></script> -->
		<style type="text/css">
			.hero-container {
				visibility:hidden;
			}
		</style>

        <?php
$cssURL = get_stylesheet_directory_uri();

// For Homepage only
if (get_queried_object_id() == 7 || is_page('sydney-metro')|| is_page('central-coast')|| is_page('illawarra')): ?>
<!--         <link href="<?php echo $cssURL . '/css/homepage-fixes.css?v=9'; ?>" rel="stylesheet" /> -->

        <script type="text/javascript">
        jQuery("input[type=\'email\']").attr("placeholder", "Enter your email address...");
        </script>
        <?php // All other homepages
else: ?>
<!--         <link href="<?php echo $cssURL . '/css/home-designs-changes.css?v=' . time(); ?>" rel="stylesheet" /> -->
        <script type="text/javascript">
        jQuery("input[type=\'email\']").attr("placeholder", "Enter your email address...");
        </script>
        <?php endif;?>

        <!-- Snippet # 1: Google Tag Manager Head -->
        <!-- Google Tag Manager -->
        <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5QFWHZ7');
        </script>
        <!-- End Google Tag Manager -->

    </head>

    <body <?php body_class();?>>
        <!-- Snippet # 2: Google Tag Manager - Body -->
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5QFWHZ7" height="0" width="0"
                style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->

        <?php if (is_page(array('sydney-metro', 'central-coast', 'illawarra'))): ?>
        <script>
        jQuery('body').addClass('home');
        </script>
        <?php endif;?>
        <div id="page" class="site">
            <a class="skip-link screen-reader-text" href="#content">
                <?php esc_html_e('Skip to content', 'pictura-creative');?>
            </a>
            <?php
global $pageId;

$pageId = get_the_ID();

echo get_template_part('template-parts/search/search', 'bar');

$burgerMenu = get_field("burger_menu_style", "option");

echo get_template_part('template-parts/modal/modal', 'menu-' . $burgerMenu);

$pre_header = get_field("pre_header", "option");
if ($pre_header == 1) {
    echo get_template_part('template-parts/header/pre-header', 'style1');
}
$header = get_field("header_style", "option");
echo get_template_part('template-parts/header/header', $header);

if (get_field("enquiry_popup", "option") == 1) {
    echo get_template_part('template-parts/modal/modal', 'enquiry');
}
?>
            <div id="content" class="site-content">
                <?php

if (is_page(array('home-designs', 'faqs', 'resources', 'promotions-offers'))) {$contain = "contain-container";}

if (is_page(array('home-designs'))
    || is_child('home-designs')
    || is_child('home_design')
    || (!get_field('banner') && (is_child('home-designs')))
    || is_page('our-process')) {$color = "#f8f8f8 !important";} else {
    $color = "#ffffff";
}
if (is_page(1779)) {
    $color = "#ffffff";
}

				
if (is_page(1801)) {
    $color = "#fafafa; padding-bottom: 20px !important; padding-top: 20px !important;";
}
				

$url = $_SERVER["REQUEST_URI"];
$homedesign = strpos($url, 'home_design');
$complete = strpos($url, 'completed_projects');
$events = strpos($url, 'event');

if ($homedesign) {
    $color = "#f8f8f8";
}
if ($complete) {
    $color = "#fff";
}

if (isset($_GET['i'])) {
    $color = "#f8f8f8";
}

if ((get_field("breadcrumb", $pageId) == 1) || is_single()) {
//     if ($events && is_page('events')):
    echo "<div class='breadcrumb container ' style='background-color:" . $color . "' ><div class='contain " . $contain . " mt-0'><div class='row contain'><div>";
    echo do_shortcode('[wpseo_breadcrumb]');
    echo "</div></div></div></div>";
//     endif;
}
?>
