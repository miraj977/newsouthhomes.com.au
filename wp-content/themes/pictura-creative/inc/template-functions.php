<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Pictura_Creative
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function pictura_creative_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'pictura_creative_pingback_header');

/** ADD PAGE ON THEME ACTIVATION */
add_action('after_setup_theme', 'add_common_page');
function add_common_page()
{
    $pages = array(
        array("page_name" => "Homepage", 'page_template' => 'page.php'),
        array("page_name" => "About us", 'page_template' => 'page.php'),
        array("page_name" => "Contact Us", 'page_template' => 'contact.php'),
        array("page_name" => "FAQ", 'page_template' => 'page.php'),
        array("page_name" => "Privacy Policy", 'page_template' => 'page.php'),
        array("page_name" => "Terms of use", 'page_template' => 'page.php'),
    );

    foreach ($pages as $page) {

        $page_check = get_page_by_title($page['page_name']);
        $new_page = array(
            'post_type' => 'page',
            'post_title' => $page['page_name'],
            'post_content' => '',
            'post_status' => 'publish',
            'post_author' => 1,
            // Assign page template
            'page_template' => $page['page_template'],
        );
        if (!isset($page_check->ID)) {
            $new_page_id = wp_insert_post($new_page);
        }
    }
}
/*** REGISTER POST TYPES **/

add_action('after_setup_theme', 'add_post_types');
{

    // Hero //
    add_action('init', 'wpdocs_codex_Hero_init');

    function wpdocs_codex_Hero_init()
    {
        $labels = array(
            'name' => _x('Hero', 'Post type general name', 'pictura-creative'),
            'singular_name' => _x('Hero', 'Post type singular name', 'pictura-creative'),
            'menu_name' => _x('Hero', 'Admin Menu text', 'pictura-creative'),
            'name_admin_bar' => _x('Hero', 'Add New on Toolbar', 'pictura-creative'),
            'add_new' => __('Add New', 'pictura-creative'),
            'add_new_item' => __('Add New Hero', 'pictura-creative'),
            'new_item' => __('New Hero', 'pictura-creative'),
            'edit_item' => __('Edit Hero', 'pictura-creative'),
            'view_item' => __('View Hero', 'pictura-creative'),
            'all_items' => __('All Hero', 'pictura-creative'),
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'hero'),
            'capability_type' => 'post',
            'has_archive' => false,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => array('title', 'editor', 'author', 'thumbnail'),
        );
        register_post_type('hero', $args);
    }
    unset($args);
    unset($labels);
}
/* Add Footer sidebar
 */
if (function_exists('register_sidebar')) {
    $sidebar2 = array(
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<p class="widgettitle">',
        'after_title' => '</p>',
        'name' => __('Footer Widget1', 'pictura-creative'),
        'id' => 'footer-1',
    );
    $sidebar3 = array(
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<p class="widgettitle">',
        'after_title' => '</p>',
        'name' => __('Footer Widget2', 'pictura-creative'),
        'id' => 'footer-2',
    );

    $sidebar4 = array(
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<p class="widgettitle">',
        'after_title' => '</p>',
        'name' => __('Footer Widget3', 'pictura-creative'),
        'id' => 'footer-3',
    );
    $sidebar5 = array(
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<p class="widgettitle">',
        'after_title' => '</p>',
        'name' => __('Footer Widget4', 'pictura-creative'),
        'id' => 'footer-4',
    );

    $sidebar6 = array(
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<p class="widgettitle">',
        'after_title' => '</p>',
        'name' => __('Left sidebar', 'pictura-creative'),
        'id' => 'left-sidebar',
    );

    $sidebar7 = array(
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<p class="widgettitle">',
        'after_title' => '</p>',
        'name' => __('Right sidebar', 'pictura-creative'),
        'id' => 'right-sidebar',
    );

    $sidebar8 = array(
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<p class="widgettitle">',
        'after_title' => '</p>',
        'name' => __('Blog sidebar', 'pictura-creative'),
        'id' => 'blog-sidebar',
    );

    register_sidebar($sidebar2);
    register_sidebar($sidebar3);
    register_sidebar($sidebar4);
    register_sidebar($sidebar5);
    register_sidebar($sidebar6);
    register_sidebar($sidebar7);
    register_sidebar($sidebar8);

}
// disable guternburg for posts
add_filter('use_block_editor_for_post', '__return_false', 10);

// disable guternburg for post types
add_filter('use_block_editor_for_post_type', '__return_false', 10);

function remove_query_strings()
{
    if (!is_admin()) {
        add_filter('script_loader_src', 'remove_query_strings_split', 15);
        add_filter('style_loader_src', 'remove_query_strings_split', 15);
    }
}

// REMOVE QUERY STRING FROM STATIC RESOURCES
function remove_query_strings_split($src)
{
    $output = preg_split("/(&ver|\?ver)/", $src);
    return $output[0];
}
add_action('init', 'remove_query_strings');

/*** SET THUMBNAIL PLACEHOLDER **/
add_action( 'after_theme_setup', 'set_global_variable' );
function set_global_variable()
{
    global $placeholder_thumb;
    $placeholder_thumb = get_template_directory_uri() . '/images/placeholder.png';
}

/*ADD CLASS TO BODY IF PREHEADER ENABLED **/
function my_plugin_body_class($classes)
{
    global $post;
    if (get_field("pre_header", "options") == 1) {
        $classes[] = 'preHeaderTrue';
    }
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    if ((!is_front_page() && !is_page(array('sydney-metro', 'central-coast', 'illawarra')))) {
        if (!is_home()) {
            if (is_search() || (is_single() && "service" != get_post_type()) || (!get_field('banner'))) {
                $classes[] = 'noBanner heading-bg';
            }
        }
    }

    if ("page" == get_post_type()) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }

    return $classes;
}
add_filter('body_class', 'my_plugin_body_class');

/*** EMAIL obfuscate **/
function obfuscate_email($email)
{
    $emailNew = 'mailto:' . $email;
    $output = "";

    for ($i = 0; $i < (strlen($emailNew)); $i++) {
        $output .= '&#' . ord($emailNew[$i]) . ';';
    }
    return $output;
}

/**** CUSTOM IMAGE THUMB */

add_image_size('project-thumb', 740, 420, array('center', 'center'));
add_image_size('project-slider', 2280, 1520, array('center', 'center'));

/** PAGINATION **/
function pagination_bar()
{
    global $wp_query;

    $total_pages = $wp_query->max_num_pages;
    $prev_arrow = '←';
    $next_arrow = '→';
    if ($total_pages > 1) {
        $current_page = max(1, get_query_var('paged'));

        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
            'prev_text' => $prev_arrow,
            'next_text' => $next_arrow,
        ));
    }
}
/******* ADD PARENT PAGE IN single SERVICE BREADCRUMB ***/
add_filter('wpseo_breadcrumb_links', 'unbox_yoast_seo_breadcrumb_append_link');
function unbox_yoast_seo_breadcrumb_append_link($links)
{
    global $post;
    if (is_singular('service')) {
        $breadcrumb = array(array(
            'url' => site_url('/services/'),
            'text' => 'Services',
        ));
        array_splice($links, 1, 0, $breadcrumb);
    }
    return $links;
}

add_filter('wpseo_breadcrumb_links', 'unbox_yoast_seo_breadcrumb_append_link2');
function unbox_yoast_seo_breadcrumb_append_link2($links)
{
    global $post;
    if (isset($_GET['t'])) {
        $breadcrumb = array(array(
            'url' => site_url('/services/'),
            'text' => $_GET['t'],
        ));
        array_splice($links, 3, 0, $breadcrumb);
    }
    return $links;
}

/******* REMOVE CATEGORY LABEL FROM CATEGORY TITLE ON CATEGORY PAGE*****/
function prefix_category_title($title)
{
    if (is_category()) {
        $title = single_cat_title('', false);
    }
    return $title;
}
add_filter('get_the_archive_title', 'prefix_category_title');
add_filter('pre_get_posts', 'custom_post_type_search');
function custom_post_type_search($query)
{
    if ($query->is_search) {
        $query->set('post_type', array('post', 'service', 'portfolio'));
    }
    return $query;
}
