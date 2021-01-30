<?php
/**
 * Template Name:House And Land
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pictura_Creative
 */

get_header();
while (have_posts()): the_post();

    echo get_template_part('template-parts/page', 'fullWidth');
endwhile;
?>

<section class="project-list container grid pt-0 mt-0">
    <div class="container p-0">
        <div class="row contain" style="max-width: 1280px;">
            <!--------------------product loop ----------->
            <div style="
    position: relative;
    width: 100%;
">
                <div class="flex hnl-showhide">
                    <button class="hidefilter" id="hidefilter6"> SHOW FILTERS</button>
                </div>
            </div>
            <div id="hnl-desktop" class="desktop col-12" style=" justify-content:space-between; ">

                <form action="<?php echo site_url() . '/house-and-land?i'; ?>" method="POST" class="hlform"
                    id="hnlform">
                    <div class=" hlfilterflex flex">

                        <div class="col-md-6 col-sm-12 flex p-0 hl-row-1-div">


                            <div class="regions hlselect selectFilter hl-row-1">
                                <p class="filter-p">Region</p>
                                <?php
$regions = get_terms(array(
    'taxonomy' => 'region',
    'hide_empty' => false,
));
?>
                                <select name="region" class="d-sel2">
                                    <option value="">Any</option>
                                    <?php foreach ($regions as $region) {?>
                                    <option <?php if ($region->slug == $_POST['region']) {echo "selected";}?>
                                        value="<?php echo $region->slug; ?>"><?php echo $region->name; ?>
                                    </option>
                                    <?php }?>

                                </select>
                            </div>

                            <div class="sorting hlselect  selectFilter hl-row-1">
                                <p class="filter-p">Sort</p>

                                <select name="sorting" class="d-sel3">
                                    <option value="">Any</option>
                                    <option <?php if ($_POST['sorting'] == 'ASC') {echo "selected";}?> value="title">ASC
                                    </option>
                                    <option <?php if ($_POST['sorting'] == 'date-asc') {echo "selected";}?>
                                        value="date-asc">Date (Newest - Oldest)</option>
                                    <option <?php if ($_POST['sorting'] == 'date-desc') {echo "selected";}?>
                                        value="date-desc">
                                        Date (Oldest - Newest)</option>
                                    <option <?php if ($_POST['sorting'] == 'price-asc') {echo "selected";}?>
                                        value="price-asc">
                                        Price (Lowest - Highest)</option>
                                    <option <?php if ($_POST['sorting'] == 'price-desc') {echo "selected";}?>
                                        value="price-desc">
                                        Price (Highest - Lowest)</option>
                                </select>
                            </div>


                        </div>

                        <div class="col-md-6 col-sm-12 flex p-0 hl-row-2-div">

                            <div class="storeys hlselect selectFilter hl-row-2">
                                <p class="filter-p">Storeys</p>
                                <?php
$storeys = get_terms(array(
    'taxonomy' => 'house_and_land_storeys',
    'hide_empty' => false,
));
?>
                                <select name="storey" class="d-sel3">
                                    <option value="">Any</option>
                                    <?php foreach ($storeys as $storey) {?>
                                    <option <?php if ($storey->slug == $_POST['storey']) {echo "selected";}?>
                                        value="<?php echo $storey->slug; ?>"><?php echo $storey->name; ?>
                                    </option>
                                    <?php }?>
                                </select>
                            </div>

                            <div class="bedrooms hlselect selectFilter hl-row-2">
                                <p class="filter-p">Bedrooms</p>
                                <?php
$bedrooms = get_terms(array(
    'taxonomy' => 'bedrooms',
    'hide_empty' => false,
));
?>
                                <select name="bedroom" class="d-sel3">
                                    <option value="">Any</option>
                                    <?php foreach ($bedrooms as $bedroom) {?>
                                    <option <?php if ($bedroom->slug == $_POST['bedroom']) {echo "selected";}?>
                                        value="<?php echo $bedroom->slug; ?>">
                                        <?php echo str_replace("s", '', str_replace("Bedroom", "", $bedroom->name)) ?>
                                    </option>
                                    <?php }?>

                                </select>
                            </div>

                            <div class="bathrooms hlselect selectFilter hl-row-2">
                                <p class="filter-p">Bathrooms</p>
                                <?php
$bathrooms = get_terms(array(
    'taxonomy' => 'bathrooms',
    'hide_empty' => false,
));
?>
                                <select name="bathroom" class="d-sel3">
                                    <option value="">Any</option>
                                    <?php foreach ($bathrooms as $bathroom) {?>
                                    <option <?php if ($bathroom->slug == $_POST['bathroom']) {echo "selected";}?>
                                        value="<?php echo $bathroom->slug; ?>">
                                        <?php echo str_replace("s", '', str_replace("Bathroom", "", $bathroom->name)) ?>
                                    </option>
                                    <?php }?>

                                </select>
                            </div>

                            <div class="cars hlselect selectFilter hl-row-2">
                                <p class="filter-p">Car Spaces</p>
                                <?php
$cars = get_terms(array(
    'taxonomy' => 'garage',
    'hide_empty' => false,
));
?>
                                <select name="car" class="d-sel3">
                                    <option value="">Any</option>
                                    <?php foreach ($cars as $car) {?>
                                    <option <?php if ($car->slug == $_POST['car']) {echo "selected";}?>
                                        value="<?php echo $car->slug; ?>"><?php echo $car->name; ?>
                                    </option>
                                    <?php }?>

                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- ROW 1 ENDS HERE -->

                    <div class=" hlfilterflex flex">
                        <div class="col-md-6 col-sm-12 flex p-0 hl-row-3-div">
                            <div class="designer-range hlselect selectFilter hl-row-3">
                                <p class="filter-p">Home Types</p>
                                <?php
$designers = get_terms(array(
    'taxonomy' => 'home_types',
    'hide_empty' => false,
));
?>
                                <select name="designer" class="d-sel2">
                                    <option value="">Any</option>
                                    <?php foreach ($designers as $designer) {?>
                                    <option <?php if ($designer->slug == $_POST['designer']) {echo "selected";}?>
                                        value="<?php echo $designer->slug; ?>"><?php echo $designer->name; ?>
                                    </option>
                                    <?php }?>

                                </select>
                            </div>

                            <div class="price-range price-range-desktop checkboxFilter hl-row-3">
                                <p class="filter-p">Price Range</p>


                                <div id="slider-range"></div>
                                <input type="text" id="amount" readonly>
                                <div class="amount flex">
                                    <input type="text" name="price-min" readonly id="left-price" style="width:50%;"
                                        placeholder="$0">
                                    <input type="text" name="price-max" readonly id="right-price"
                                        placeholder="$2,000,000">
                                </div>
                            </div>


                        </div>
                        <div class="col-md-6 col-sm-12 flex p-0 hl-row-4-div">
                            <div class="homesizes selectFilter hlselect hl-row-4">
                                <p class="filter-p">Lot Size (m&#178;)</p>
                                <select name="homesize" class="d-sel3">
                                    <option value="">Any</option>
                                    <option <?php if ($_POST['homesize'] == "199") {echo "selected";}?> value="199">0 -
                                        200</option>
                                    <option <?php if ($_POST['homesize'] == "299") {echo "selected";}?> value="299">200
                                        -
                                        300</option>
                                    <option <?php if ($_POST['homesize'] == "450") {echo "selected";}?> value="450">300
                                        -
                                        450</option>
                                    <option <?php if ($_POST['homesize'] == "550") {echo "selected";}?> value="550">450
                                        -
                                        550</option>
                                    <option <?php if ($_POST['homesize'] == "1000") {echo "selected";}?> value="1000">
                                        550 -
                                        1000</option>
                                    <option <?php if ($_POST['homesize'] == "5000") {echo "selected";}?> value="5000">
                                        1000+
                                    </option>
                                </select>

                            </div>
                            <div class="homewidth selectFilter hlselect hl-row-4">
                                <p class="filter-p">Lot Width (m)</p>
                                <select name="homewidth" class="d-sel3">
                                    <option value="">Any</option>
                                    <option <?php if ($_POST['homewidth'] == "6") {echo "selected";}?> value="6">0 - 6
                                    </option>
                                    <option <?php if ($_POST['homewidth'] == "10") {echo "selected";}?>value="10">6 - 10
                                    </option>
                                    <option <?php if ($_POST['homewidth'] == "15") {echo "selected";}?> value="15">10 -
                                        15</option>
                                    <option <?php if ($_POST['homewidth'] == "100") {echo "selected";}?> value="100">15+
                                    </option>
                                </select>
                            </div>

                            <div class="homelength selectFilter hlselect hl-row-4">
                                <p class="filter-p">House Size (sq)</p>
                                <select name="homelength" class="d-sel3">
                                    <option value="">Any</option>
                                    <option <?php if ($_POST['homelength'] == "10") {echo "selected";}?> value="10">0-10
                                    </option>
                                    <option <?php if ($_POST['homelength'] == "20") {echo "selected";}?> value="20">
                                        10-20</option>
                                    <option <?php if ($_POST['homelength'] == "25") {echo "selected";}?> value="25">
                                        20-25</option>
                                    <option <?php if ($_POST['homelength'] == "30") {echo "selected";}?> value="30">
                                        25-30</option>
                                    <option <?php if ($_POST['homelength'] == "35") {echo "selected";}?> value="35">
                                        30-35</option>
                                    <option <?php if ($_POST['homelength'] == "40") {echo "selected";}?> value="40">
                                        35-40</option>
                                    <option <?php if ($_POST['homelength'] == "100") {echo "selected";}?> value="100">
                                        40+</option>
                                </select>
                            </div>
                        </div>
                        <!-- ROW 2 ENDS HERE -->
                        <div class=" hlfilterflex flex col-12 feature-div p-0">

                            <div>
                                <p class="bold feat-p"
                                    style="display:block;width:100%;margin:20px 0 10px; font-size:14px">
                                    Additional
                                    Features</p>
                                <label class="feat"><input type="checkbox"
                                        <?php if ($_POST['theatre'] == "theatre") {echo "checked";}?> name="theatre"
                                        value="theatre">Home
                                    Theatre</label>
                                <label class="feat"><input type="checkbox" name="study"
                                        <?php if ($_POST['study'] == "study") {echo "checked";}?>
                                        value="study">Study</label>
                                <label class="feat"><input type="checkbox" name="studynook"
                                        <?php if ($_POST['studynook'] == "studynook") {echo "checked";}?>
                                        value="studynook">Study
                                    Nook</label>
                                <label class="feat"><input type="checkbox" name="outdoor"
                                        <?php if ($_POST['outdoor'] == "outdoor") {echo "checked";}?>
                                        value="outdoor">Outdoor
                                    Living</label>
                                <label class="feat"><input type="checkbox" name="children"
                                        <?php if ($_POST['children'] == "granny") {echo "checked";}?>
                                        value="granny">Granny
                                    Flat</label>
                            </div>
                            <div>
                                <input type="submit" value="Apply" class="apply">
                            </div>
                        </div>
                    </div>
                    <button type="button" id="btnclear" onclick="btnreset()">Reset</button>
                </form>
            </div>


            <?php echo get_template_part('template-parts/home-design/housenland-tab'); ?>

            <div class=" col-md-12 col-lg-12 col-sm-12">
                <div class="row">
                    <div class="projectWrap contain-container">
                        <?php

if (isset($_POST) && (!empty($_POST))) {
    $selected = 'selected';
    $postregion = $_POST['region'];
    $postlocation = $_POST['location'];
    $postestate = $_POST['estate'];
    $poststorey = $_POST['storey'];
    $sorting = $_POST['sorting'];
    $min = str_replace(',', '', (str_replace('$', '', $_POST['price-min'])));
    $max = str_replace(',', '', (str_replace('$', '', $_POST['price-max'])));
    $size = $_POST['homesize'];
    $length = $_POST['homelength'];
    $width = $_POST['homewidth'];
    $designer = $_POST['designer'];
    $postbed = $_POST['bedroom'];
    $postbath = $_POST['bathroom'];
    $postcar = $_POST['car'];
    $theatre = $_POST['theatre'];
    $children = $_POST['granny'];
    $study = $_POST['study'];
    $studynook = $_POST['studynook'];
    $outdoor = $_POST['outdoor'];

    $tax_query = array('relation' => 'AND');
    if (isset($postlocation) && !empty($postlocation)) {
        $tax_query[] = array(
            'taxonomy' => 'location',
            'field' => 'slug',
            'terms' => $postlocation,
        );
    }
    if (isset($postbed) && !empty($postbed)) {
        $tax_query[] = array(
            'taxonomy' => 'bedrooms',
            'field' => 'slug',
            'terms' => $postbed,
        );
    }
    if (isset($designer) && !empty($designer)) {
        $tax_query[] = array(
            'taxonomy' => 'home_types',
            'field' => 'slug',
            'terms' => $designer,
        );
    }
    if (isset($postbath) && !empty($postbath)) {
        $tax_query[] = array(
            'taxonomy' => 'bathrooms',
            'field' => 'slug',
            'terms' => $postbath,
        );
    }
    if (isset($poststorey) && !empty($poststorey)) {
        $tax_query[] = array(
            'taxonomy' => 'house_and_land_storeys',
            'field' => 'slug',
            'terms' => $poststorey,
        );
    }
    if (isset($postcar) && !empty($postcar)) {
        $tax_query[] = array(
            'taxonomy' => 'garage',
            'field' => 'slug',
            'terms' => $postcar,
        );
    }
    if (isset($postlocation) && !empty($postlocation)) {
        $tax_query[] = array(
            'taxonomy' => 'location',
            'field' => 'slug',
            'terms' => $postlocation,
        );
    }
    if (isset($postregion) && !empty($postregion)) {
        $tax_query[] = array(
            'taxonomy' => 'region',
            'field' => 'slug',
            'terms' => $postregion,
        );
    }
    if (isset($postestate) && !empty($postestate)) {
        $tax_query[] = array(
            'taxonomy' => 'estate',
            'field' => 'slug',
            'terms' => $postestate,
        );
    }
    if (isset($sorting) && !empty($sorting)) {
        if ($sorting == 'title') {
            $sort = "ASC";
            $order = "title";
        }
        if ($sorting == 'price-desc') {
            $sort = "DESC";
            $order = "meta_value";
            $keyz = "full_width_content_0_price";

        }
        if ($sorting == 'price-asc') {
            $sort = "ASC";
            $order = "meta_value";
            $keyz = "full_width_content_0_price";

        }
        if ($sorting == 'date-desc') {
            $sort = "DESC";
            $order = "date";

        }
        if ($sorting == 'date-asc') {
            $sort = "ASC";
            $order = "date";
        }

    } elseif (!isset($sorting)) {
        $sort = 'ASC';
        $order = "date";
    }

    if (isset($theatre) && !empty($theatre)) {
        $tax_query[] = array(
            'taxonomy' => 'features',
            'field' => 'slug',
            'terms' => $theatre,
        );
    }

    if (isset($children) && !empty($children)) {
        $tax_query[] = array(
            'taxonomy' => 'features',
            'field' => 'slug',
            'terms' => $children,
        );
    }

    if (isset($outdoor) && !empty($outdoor)) {
        $tax_query[] = array(
            'taxonomy' => 'features',
            'field' => 'slug',
            'terms' => $outdoor,
        );
    }

    if (isset($study) && !empty($study)) {
        $tax_query[] = array(
            'taxonomy' => 'features',
            'field' => 'slug',
            'terms' => $study,
        );
    }

    if (isset($studynook) && !empty($studynook)) {
        $tax_query[] = array(
            'taxonomy' => 'features',
            'field' => 'slug',
            'terms' => $studynook,
        );
    }
    if ($min != "" & $max != "") {
        $metaz = array(
            'relation' => 'AND',
            array(
                'key' => 'full_width_content_0_price',
                'value' => array($min, $max),
                'type' => 'numeric',
                'compare' => 'BETWEEN',
            ));
    } else {
        $metaz = array(
            'relation' => 'AND',
            array(
                'key' => 'full_width_content_0_price',
                'value' => array(0, 2000000),
                'type' => 'numeric',
                'compare' => 'BETWEEN',
            ));
    }
    if (isset($size) && !empty($size)) {
        if ($size == '199') {
            $minl = 0;
            $maxl = 199;
        }
        if ($size == '299') {
            $minl = 200;
            $maxl = 300;

        }
        if ($size == '450') {
            $minl = 300;
            $maxl = 450;
        }
        if ($size == '550') {
            $minl = 450;
            $maxl = 550;
        }

        if ($size == '1000') {
            $minl = 550;
            $maxl = 1000;
        }

        if ($size == '5000') {
            $minl = 1000;
            $maxl = 10000;
        }

        $metaz = array(
            'relation' => 'AND',
            array(
                'key' => 'full_width_content_0_home_size',
                'value' => array($minl, $maxl),
                'type' => 'numeric',
                'compare' => 'BETWEEN',
            ));
    }
    if (isset($length) && !empty($length)) {
        if ($length == '10') {
            $minl = 0;
            $maxl = 10;

        }
        if ($length == '20') {
            $minl = 10;
            $maxl = 20;

        }
        if ($length == '25') {
            $minl = 20;
            $maxl = 25;
        }
        if ($length == '30') {
            $minl = 25;
            $maxl = 30;
        }

        if ($length == '35') {
            $minl = 30;
            $maxl = 35;
        }

        if ($length == '40') {
            $minl = 35;
            $maxl = 40;
        }
        if ($length == '100') {
            $minl = 40;
            $maxl = 500;
        }

        $metaz = array(
            'relation' => 'AND',
            array(
                'key' => 'full_width_content_0_home_length',
                'value' => array($minl, $maxl),
                'type' => 'numeric',
                'compare' => 'BETWEEN',
            ));
    }
    if (isset($width) && !empty($width)) {
        if ($size == '6') {
            $minl = 0;
            $maxl = 6;

        }
        if ($width == '10') {
            $minl = 6;
            $maxl = 10;

        }
        if ($width == '15') {
            $minl = 10;
            $maxl = 15;
        }

        if ($width == '100') {
            $minl = 15;
            $maxl = 500;
        }

        $metaz = array(
            'relation' => 'AND',
            array(
                'key' => 'full_width_content_0_home_width',
                'value' => array($minl, $maxl),
                'type' => 'numeric',
                'compare' => 'BETWEEN',
            ));
    }

    $query = new WP_Query(
        array(
            'post_type' => 'house-and-land',
            'posts_per_page' => '-1',
            'tax_query' => $tax_query,
            'meta_query' => $metaz,
            'meta_key' => $keyz,
            'order' => $sort,
            'orderby' => $order,
            'post_status' => 'publish',
        )
    );

    if (!$query) {echo "<p class='no-result'>Sorry!! No results found for your query.</p>";
    }

} else {

    $query = new WP_Query(array(
        'post_type' => 'house-and-land',
        'posts_per_page' => -1,
        'paged' => 1,
        'order' => 'DESC',
        'orderby' => 'date',
        'post_status' => 'publish',

    ));
}

$count = $query->found_posts;
$posts_per_page = 16;
$page_number_max = ceil($count / $posts_per_page);
if ($query->have_posts()) {
    while ($query->have_posts()): $query->the_post();
        // echo '<pre>';
        //print_r(get_post_custom(get_the_ID()));
        // echo '</pre>';

        $termsBath = get_the_terms($post->ID, 'bathrooms');
        $termsBath = array_shift($termsBath);
        $storey = get_the_terms($post->ID, 'house_and_land_storeys');
        $storey = array_shift($storey);
        $bedroom = get_the_terms($post->ID, 'bedrooms');
        $bedroom = array_shift($bedroom);
        $type = get_the_terms($post->ID, 'home_types');
        $type = array_shift($type);
        $car = get_the_terms($post->ID, 'garage');
        $car = array_shift($car);
        $size = get_the_term_list(get_the_ID(), 'home_size', '', ',');
        preg_match('~>\K[^<>]*(?=<)~', $size, $match);
        $size = $match[0];
        $lot = get_the_term_list(get_the_ID(), 'lot_size', '', ',');
        preg_match('~>\K[^<>]*(?=<)~', $lot, $match2);
        $lot = $match2[0];

        //print_r(get_the_terms($post->ID, 'garage'));

        ?>
                        <div class="col-sm-12 col-md-12 col-lg-12 p-0  workItem show-workItem  <?php echo " " . $bedroom->slug . " " . $storey->slug . " " . $termsBath->slug . " " . $type->slug; ?>"
                            data-aos="fade-up">
                            <div class="project-list-div flex desktop-hnl-section">

                                <?php
    while (have_rows('full_width_content')): the_row();
            $imgs = get_sub_field('thumbnail_image')['url'];
            $lots = get_sub_field('home_size');
            $area = get_sub_field('home_area');

            ?>

                                <div class=" hnlImg col-lg-4 col-md-6 col-sm-12">
                                    <img src="<?php echo $imgs ?>" alt="<?php echo get_the_title(); ?>" />
                                </div>
                                <div class="hnl-flex-wrap col-lg-8 col-md-6 col-sm-12">
                                    <div class="projectMeta hnlDesc projectDesc  col-lg-8 col-md-12 col-sm-12">
                                        <h5 class="st2 gold-9b"><?php echo get_the_title(); ?></h5>
                                        <div class="projectIcons-2">


                                            <?php
        $bedroom = $bedroom->name;
            if (!empty($lots)) {
                echo '<span class="icon-number-2 p-md" ><img class="bedIcon2 lot-icon" src="' . get_template_directory_uri() . '/images/lot.svg" style="margin-left:0px"/><span>' . $lots . 'm' . '<sup>2</sup></span></span>';

            }
            if (!empty($area)) {
                echo '<span class="icon-number-2 p-md"><img class="bedIcon2 home-icon" src="' . get_template_directory_uri() . '/images/area.svg"/><span>' . $area . 'm' . '<sup>2</sup></span></span>';
            }
            if (!empty($bedroom)) {
                echo '<span class="icon-number-2 p-md"><img class="bedIcon2" src="' . get_template_directory_uri() . '/images/Bed@2x.svg" /><span>';
                echo str_replace("Bedroom", "", str_replace("Bedrooms", "", $bedroom)) . '</span></span>';
            }

            if (!empty($termsBath)) {?><span class=" icon-number-2 p-md"><?php
        echo '<img class="bathIcon2" src="' . get_template_directory_uri() . '/images/Bathtub@2x.svg" /><span>';

                $bathroom = $termsBath->name;
                echo str_replace("Bathroom", "", str_replace("Bathrooms", "", $bathroom));
                echo "</span></span>";
            }

            if (!empty($car)) { ?><span class="icon-number-2 p-md"><?php
        echo '<img class="bathIcon2 car-icon" src="' . get_template_directory_uri() . '/images/car.svg" /><span>';

                $car = $car->name;
                echo $car;
                echo "</span></span>";
            }
            echo "</div><div class='p-st lot-description'>" . get_sub_field('description') . "</div>"
            ?>

                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                            <p class="st2 black lot-price"><?php echo
            '$' . number_format(get_sub_field('price')); ?></p>
                                            <div class="house-and-land-btn"><a href="#popup"
                                                    onclick="addURL('<?php echo get_the_title() ?>')"
                                                    class="btn enquire-btn enquire_modal_btn">ENQUIRE</a>
                                                <?php if (get_sub_field('brochure')) {$brochure = get_sub_field('brochure');}?>
                                                <a href="<?php echo $brochure['url']; ?>" style="display:block;"><button
                                                        class="btn brochure-btn">SEE MORE</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- TAB LAYOUT STARTS HERE -->
                                <div class="project-list-div flex tab-hnl-section">
                                    <div class="col-12"
                                        style="display:flex;justify-content:space-between;align-items:center;">
                                        <div class=" hnlImg col-6">
                                            <img src="<?php echo $imgs ?>" alt="<?php echo get_the_title(); ?>" />
                                        </div>
                                        <div class="col-5 price-btn-flex">
                                            <p class="st2 black lot-price"><?php echo
            '$' . number_format(get_sub_field('price')); ?></p>
                                            <div class="house-and-land-btn"><a href="#popup"
                                                    onclick="addURL('<?php echo get_the_title() ?>')"
                                                    class="btn enquire-btn enquire_modal_btn">ENQUIRE</a>
                                                <?php if (get_sub_field('brochure')) {$brochure = get_sub_field('brochure');}?>
                                                <a href="<?php echo $brochure['url']; ?>" style="display:block;"><button
                                                        class="btn brochure-btn">SEE MORE</button></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hnl-flex-wrap col-12">
                                        <div class="projectMeta hnlDesc projectDesc  col-lg-8 col-md-12 col-sm-12">
                                            <h5 class="st2 gold-9b"><?php echo get_the_title(); ?></h5>
                                            <div class="projectIcons-2">


                                                <?php
        $bedroom = $bedroom->name;
            if (!empty($lots)) {
                echo '<span class="icon-number-2 p-md" ><img class="bedIcon2 lot-icon" src="' . get_template_directory_uri() . '/images/lot.svg" style="margin-left:0px"/><span>' . $lots . 'm' . '<sup>2</sup></span></span>';

            }
            if (!empty($area)) {
                echo '<span class="icon-number-2 p-md"><img class="bedIcon2 home-icon" src="' . get_template_directory_uri() . '/images/area.svg"/><span>' . $area . 'm' . '<sup>2</sup></span></span>';
            }
            if (!empty($bedroom)) {
                echo '<span class="icon-number-2 p-md"><img class="bedIcon2" src="' . get_template_directory_uri() . '/images/Bed@2x.svg" /><span>';
                echo str_replace("Bedroom", "", str_replace("Bedrooms", "", $bedroom)) . '</span></span>';
            }

            if (!empty($termsBath)) {?><span class=" icon-number-2 p-md"><?php
        echo '<img class="bathIcon2" src="' . get_template_directory_uri() . '/images/Bathtub@2x.svg" /><span>';

                $bathroom = $termsBath->name;
                echo str_replace("Bathroom", "", str_replace("Bathrooms", "", $bathroom));
                echo "</span></span>";
            }

            if (!empty($car)) { ?><span class="icon-number-2 p-md"><?php
        echo '<img class="bathIcon2 car-icon" src="' . get_template_directory_uri() . '/images/car.svg" /><span>';
                $car = get_the_terms($post->ID, 'garage');
                $car = array_shift($car);
                $car = $car->name;
                echo $car;
                echo "</span></span>";
            }
            echo "</div><div class='p-st lot-description'>" . get_sub_field('description') . "</div>"
            ?>

                                            </div>

                                        </div>
                                    </div>
                                    <!-- TAB LAYOUT ENDS HERE -->

                                </div>
                                <?php
        break;
        endwhile;
    endwhile;
} else {
    echo "<div class='text-center p-lg no-result'>Sorry. No Results found.</div>";
}

?>
                            </div>

                            <?php if ($page_number_max > 1) {?>
                            <nav class="loadMore text-center"> <a href="#" class="loadmoreProjects btn-green btn">Load
                                    More
                                    ↓</a> </nav>

                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
</section>
<!--- MODAL --->
<div class="hnlenquiry">
    <div class="enquiry-modal__inner">

        <div class="enquiry-modal__content">
            <span class="modal-close"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/close-black.svg"
                    ?></span>
            <div class="col-lg-12 col-md-12 col-sm-12 flex">
                <div class="col-md-4 col-sm-12 modal-left">
                    <p class="st3 black request-title">Request a callback</p>
                    <p class="p-st black">Thanks for your interest in the lot. Please fill out your details and our team
                        will
                        be in touch shortly.</p>
                </div>
                <div class="form-wrap col-sm-12 col-md-8">
                    <?php $e_formId = get_field("enquiry_form", "option");?>
                    <?php echo do_shortcode('[contact-form-7 id="2194" title="House and Land Enquiry"]'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL -->

<?php
wp_reset_postdata();
wp_reset_query();

get_footer();?>

<!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->

<script>
jQuery(function() {
    jQuery("#slider-range").slider({
        range: true,
        min: 0,
        max: 2000000,
        values: [0, 2000000],
        slide: function(event, ui) {
            jQuery("#left-price").val("$" + ui.values[0].toLocaleString());
            jQuery("#right-price").val("$" + ui.values[1].toLocaleString());
        }
    });
});
jQuery(function() {
    jQuery("#slider-range2").slider({
        range: true,
        min: 0,
        max: 2000000,
        values: [0, 2000000],
        slide: function(event, ui) {
            jQuery("#left-price2").val("$" + ui.values[0].toLocaleString());
            jQuery("#right-price2").val("$" + ui.values[1].toLocaleString());
        }
    });
});

function btnreset() {
    jQuery('#hnlform').trigger('reset');
    jQuery(':checkbox:checked').prop('checked', false);
    jQuery('option:selected').removeAttr('selected');
}

function addURL(title) {
    jQuery(".dynamic_title").val(title);
    console.log(jQuery("#dynamic_title").val(title));
}
</script>
