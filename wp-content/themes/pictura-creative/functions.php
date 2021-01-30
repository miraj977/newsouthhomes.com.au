<?php
/**
 * Pictura Creative functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Pictura_Creative
 */

if (!function_exists('pictura_creative_setup')):
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function pictura_creative_setup()
{
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Pictura Creative, use a find and replace
         * to change 'pictura-creative' to the name of your theme in all the template files.
         */
        load_theme_textdomain('pictura-creative', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'pictura-creative'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('pictura_creative_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));
    }
endif;
add_action('after_setup_theme', 'pictura_creative_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pictura_creative_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('pictura_creative_content_width', 640);
}
add_action('after_setup_theme', 'pictura_creative_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pictura_creative_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'pictura-creative'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'pictura-creative'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'pictura_creative_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function pictura_creative_scripts()
{

/** SKROLR **/
    //wp_enqueue_style( 'skrolr-css', get_template_directory_uri() . '/css/skrolr.css' );


    $url = $_SERVER["REQUEST_URI"];
    $complete = strpos($url, 'completed_projects');

    if (is_single() && $complete) {
        wp_enqueue_style('w3-css', 'https://www.w3schools.com/w3css/4/w3.css');
    }

    wp_enqueue_script('pictura-creative-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);
    wp_enqueue_script('lightbox-js', get_template_directory_uri() . '/js/lightbox.min.js', array(), '', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    wp_enqueue_style('pictura-common', get_template_directory_uri() . '/css/common.css');
    wp_enqueue_style('lightgallery-css', get_template_directory_uri() . '/css/lightgallery.min.css');

    wp_enqueue_style('flexslider-css', 'https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/flexslider.min.css');


    /** FLEXSLIDER */
    wp_enqueue_script('flexslider-js', 'https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider.min.js', array(), null, true);
	if(is_page(915)){
    wp_enqueue_script('ui-js', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', array(), null, true);
    wp_enqueue_script('ui-pinch-js', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js', array(), null, true);
	}

    /*** THEME JS ***/

    wp_enqueue_script('pictura-app', get_template_directory_uri() . '/js/app.js', array(), null, true);
	 wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom-changes.js?v=5', array(), null, true);

    wp_enqueue_style('pictura-creative-style', get_stylesheet_uri());
    wp_enqueue_style('newsouthhomes', get_template_directory_uri() . '/css/nsh.css');

    /****** RESPONSIVE CSS ***/
    wp_enqueue_style('pictura-responsive', get_template_directory_uri() . '/css/responsive.css');
    wp_enqueue_style('banner-control', get_template_directory_uri() . '/css/banner-control.css?v=8');
	
	if (get_queried_object_id() == 7 || is_page('sydney-metro')|| is_page('central-coast')|| is_page('illawarra')): 
 		wp_enqueue_style('home-fixes', get_template_directory_uri() . '/css/homepage-fixes.css?v=9');
	else: 
        wp_enqueue_style('homedesign-fixes', get_template_directory_uri() . '/css/home-designs-changes.css?v=9');
    endif;

}
add_action('wp_enqueue_scripts', 'pictura_creative_scripts');

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/*** LOAD SHORTCODE **/
require get_template_directory() . '/inc/shortcode.php';
/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**  THEME ACF SETTIGNS **/
require get_template_directory() . '/inc/acf-functions.php';

/**** HIDE ADMIN BAR **/
function hide_admin_bar_from_front_end()
{
    if (is_blog_admin()) {
        return true;
    }
    return false;
}
add_filter('show_admin_bar', 'hide_admin_bar_from_front_end');
/*** ASK FOR ACF PRO PLUGIN ON THEME ACTIVATION ***/

require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'pictura_creative_register_required_plugins');

function pictura_creative_register_required_plugins()
{

    $plugins = array(

        array(
            'name' => 'Advanced Custom Fields Pro',
            'slug' => 'advanced-custom-fields-pro',
            'source' => get_template_directory() . '/plugins/advanced-custom-fields-pro.zip',
            'required' => true,
            'version' => '',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => '',
            'is_callable' => '',
        ),

        array(
            'name' => 'Contact Form 7',
            'slug' => 'contact-form-7',
            'required' => true,
        ),

        array(
            'name' => 'WordPress SEO by Yoast',
            'slug' => 'wordpress-seo',
            'is_callable' => 'wpseo_init',
            'required' => true,
        ),

        array(
            'name' => 'Safe SVG',
            'slug' => 'safe-svg',
            'is_callable' => '',
            'required' => true,
        ),

        array(
            'name' => 'WP Fastest Cache',
            'slug' => 'fastet-cache',
            'is_callable' => '',
            'required' => true,
        ),

        array(
            'name' => 'Contact Form 7 Captcha',
            'slug' => 'cf7-captcha',
            'is_callable' => '',
            'required' => true,
        ),

    );

    $config = array(
        'id' => 'pictura-creative',
        'default_path' => '',
        'menu' => 'pictura-install-plugins',
        'has_notices' => true,
        'dismissable' => true,
        'dismiss_msg' => '',
        'is_automatic' => false,
        'message' => '',

    );

    tgmpa($plugins, $config);
}
/**
 *   Child page conditional
 *   @ Accept's page ID, page slug or page title as parameters
 */
function is_child($parent = '')
{
    global $post;

    $parent_obj = get_page($post->post_parent, ARRAY_A);
    $parent = (string) $parent;
    $parent_array = (array) $parent;

    if (in_array((string) $parent_obj['ID'], $parent_array)) {
        return true;
    } elseif (in_array((string) $parent_obj['post_title'], $parent_array)) {
        return true;
    } elseif (in_array((string) $parent_obj['post_name'], $parent_array)) {
        return true;
    } else {
        return false;
    }
}

function reg_tag()
{
    register_taxonomy_for_object_type('post_tag', 'event');
}
add_action('init', 'reg_tag');

add_filter("wpseo_breadcrumb_links", "wpse_100012_override_yoast_breadcrumb_trail");

function wpse_100012_override_yoast_breadcrumb_trail($links)
{
    $post_type = get_post_type();

    if ($post_type === 'completed_projects') {
        $breadcrumb[] = array(
            'url' => get_home_url() . '/completed-projects',
            'text' => 'Completed Projects',
        );
        array_splice($links, 1, -3, $breadcrumb);
    }

    if ($post_type === 'home_design') {
        $breadcrumb[] = array(
            'url' => get_home_url() . '/home-designs',
            'text' => 'Home Design',
        );
        array_splice($links, 1, -3, $breadcrumb);
    }
    return $links;
}
add_action('wp_head', 'myplugin_ajaxurl');

// function nelio_max_image_size( $file ) {

//   $size = $file['size'];
//   $size = $size / 1024;
//   $type = $file['type'];
//   $is_image = strpos( $type, 'image' ) !== false;
//   $limit = 5120;
//   $limit_output = '5MB';

//   if ( $is_image && $size > $limit ) {
//     $file['error'] = 'Image files must be smaller than ' . $limit_output;
//   }//end if

//   return $file;

// }//end nelio_max_image_size()
// add_filter( 'wp_handle_upload_prefilter', 'nelio_max_image_size' );

function add_calendar_feed()
{
    add_feed('calendar', 'export_ics');
    // Only uncomment these 2 lines the first time you load this script, to update WP rewrite rules, or in case you see a 404
    global $wp_rewrite;
    $wp_rewrite->flush_rules(false);
}
add_action('init', 'add_calendar_feed');

function export_ics()
{

    /*  For a better understanding of ics requirements and time formats
    please check https://gist.github.com/jakebellacera/635416   */

    // Query the event
    $the_event = new WP_Query(array(
        'p' => $_REQUEST['id'],
        'post_type' => 'any',
    ));

    if ($the_event->have_posts()):

        // Escapes a string of characters
        function escapeString($string)
    {
            return preg_replace('/([\,;])/', '\\\$1', $string);
        }
        // Cut it
        function shorter_version($string, $lenght)
    {
            if (strlen($string) >= $lenght) {
                return substr($string, 0, $lenght);
            } else {
                return $string;
            }
        }

        while ($the_event->have_posts()): $the_event->the_post();
            $start_date = get_field("date_time", false, false); // EDIT THIS WITH YOUR OWN VALUE
            $end_date = get_field("end_date", false, false); // EDIT THIS WITH YOUR OWN VALUE
            if ($start_date != '') {
                $start_date = strtotime($start_date);
                $start_date = wp_date("Ymd\THis", $start_date);
            }
            if ($end_date != '') {
                $end_date = strtotime($end_date);
                $end_date = wp_date('Ymd\THis', $end_date);
            } else {
                $end_date = wp_date("Ymd\THis", $start_date + (1 * 60 * 60)); // 1 hour after
            }
            $deadline = date_i18n("Ymd\THis\Z", get_post_meta(get_the_ID(), 'deadline_date', true)); // EDIT THIS WITH YOUR OWN VALUE

            // The rest is the same for any version
            $uid = get_the_ID();
            $created_date = get_post_time('Ymd\THis\Z', true, $uid);
            $organiser = 'New South Homes'; // EDIT THIS WITH YOUR OWN VALUE
            $address = get_field('address'); // EDIT THIS WITH YOUR OWN VALUE
            $url = get_the_permalink();
            $summary = get_the_excerpt();
            $content = get_field('content'); // removes newlines and double spaces
            $title = html_entity_decode(get_the_title());

            //Give the iCal export a filename
            $filename = urlencode($title . '-ical-' . date('Y-m-d') . '.ics');
            $eol = "\r\n";

            //Collect output
            ob_start();

            // Set the correct headers for this file
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=" . $filename);
            header('Content-type: text/calendar; charset=utf-8');
            header("Pragma: 0");
            header("Expires: 0");

// The below ics structure MUST NOT have spaces before each line
            // Credit for the .ics structure goes to https://gist.github.com/jakebellacera/635416
            ?>
BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//<?php echo 'NSH'; ?> //NONSGML Events //EN
CALSCALE:GREGORIAN
X-WR-CALNAME:<?php echo 'NSH' . $eol; ?>
BEGIN:VEVENT
CREATED:<?php echo $created_date . $eol; ?>
UID:<?php echo $uid . $eol; ?>
DTEND;VALUE=DATE:<?php echo $end_date . $eol; ?>
DTSTART;VALUE=DATE:<?php echo $start_date . $eol; ?>
DTSTAMP:<?php echo $timestamp . $eol; ?>
LOCATION:<?php echo escapeString($address) . $eol; ?>
DESCRIPTION:<?php echo $content . $eol; ?>
SUMMARY:<?php echo 'EVENT ' . $title . $eol; ?>
ORGANIZER:<?php echo escapeString($organiser) . $eol; ?>
URL;VALUE=URI:<?php echo escapeString($url) . $eol; ?>
TRANSP:OPAQUE
BEGIN:VALARM
ACTION:DISPLAY
TRIGGER;VALUE=DATE-TIME:<?php echo $deadline . $eol; ?>
DESCRIPTION:Reminder for <?php echo escapeString(get_the_title());
            echo $eol; ?>
END:VALARM
END:VEVENT
<?php
    endwhile;
        ?>
END:VCALENDAR
<?php
    //Collect output and echo
        $eventsical = ob_get_contents();
        ob_end_clean();
        echo $eventsical;
        exit();

    endif;

}

function tg_include_custom_post_types_in_search_results($query)
{
    if ($query->is_main_query() && $query->is_search() && !is_admin()) {
        $query->set('post_type', array('post', 'home_design', 'house-and-land', 'completed_projects'));
    }
}
add_action('pre_get_posts', 'tg_include_custom_post_types_in_search_results');

// function get_title_event( $id ) {
//     $event_name = get_the_title($id);;
//     return $event_name;
// }
// add_shortcode( 'event_name', 'get_title_event' );


add_filter('wpseo_title', 'custom_titles', 10, 1);
function custom_titles()
{
    global $wp;
    if (is_page_template('registration.php')) {

        return get_the_title($_GET['id']);
    }
}

?>
