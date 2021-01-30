<div id="hnl-tab" class="desktop col-12" style="margin-right:0px; justify-content:space-between;">

    <form action="<?php echo site_url() . '/house-and-land'; ?>" method="POST" class="hlform">

        <div class="col-md-12 col-sm-12 flex p-0 row-1-div">


            <div class="regions hlselect selectFilter row-1">
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

            <div class="sorting hlselect selectFilter row-1">
                <p class="filter-p">Sort</p>

                <select name="sorting" class="d-sel3">
                    <option value="">Any</option>
                    <option <?php if ($_POST['sorting'] == 'ASC') {echo "selected";}?> value="title">ASC
                    </option>
                    <option <?php if ($_POST['sorting'] == 'date-asc') {echo "selected";}?> value="date-asc">Date
                        (Newest - Oldest)</option>
                    <option <?php if ($_POST['sorting'] == 'date-desc') {echo "selected";}?> value="date-desc">
                        Date (Oldest - Newest)</option>
                    <option <?php if ($_POST['sorting'] == 'price-asc') {echo "selected";}?> value="price-asc">
                        Price (Lowest - Highest)</option>
                    <option <?php if ($_POST['sorting'] == 'price-desc') {echo "selected";}?> value="price-desc">
                        Price (Highest - Lowest)</option>
                </select>
            </div>


        </div>

        <div class="col-md-12 col-sm-12 flex p-0 row-2-div">

            <div class="storeys hlselect selectFilter row-2">
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



            <div class="bedrooms hlselect selectFilter row-2">
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

            <div class="bathrooms hlselect selectFilter row-2">
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

            <div class="cars hlselect  selectFilter row-2">
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
        <!-- ROW 1 ENDS HERE -->

        <div class="col-md-12 col-sm-12 flex p-0 row-3-div">
            <div class="designer-range hlselect selectFilter row-3">
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

            <div class="price-range  checkboxFilter row-3">
                <p class="filter-p">Price Range</p>


                <div id="slider-range2"></div>
                <input type="text" id="amount" readonly>
                <div class="amount flex">
                    <input type="text" name="price-min" readonly id="left-price2" style="width:50%;" placeholder="$0">
                    <input type="text" name="price-max" readonly id="right-price2" placeholder="$2,000,000">
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 flex p-0 row-4-div">
            <div class="homesizes selectFilter hlselect row-4">
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
            <div class="homewidth selectFilter hlselect row-4">
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

            <div class="homelength selectFilter hlselect row-4">
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
        <div class=" hlfilterflex flex col-12 feature-div p-0 row-5-div">

            <div>
                <p class="bold feat-p" style="display:block;width:100%;margin:20px 0 10px; font-size:14px">
                    Additional
                    Features</p>
                <label class="feat"><input type="checkbox" <?php if ($_POST['theatre'] == "theatre") {echo "checked";}?>
                        name="theatre" value="theatre">Home
                    Theatre</label>
                <label class="feat"><input type="checkbox" name="study"
                        <?php if ($_POST['study'] == "study") {echo "checked";}?> value="study">Study</label>
                <label class="feat"><input type="checkbox" name="studynook"
                        <?php if ($_POST['studynook'] == "studynook") {echo "checked";}?> value="studynook">Study
                    Nook</label>
                <label class="feat"><input type="checkbox" name="outdoor"
                        <?php if ($_POST['outdoor'] == "outdoor") {echo "checked";}?> value="outdoor">Outdoor
                    Living</label>
                <label class="feat"><input type="checkbox" name="children"
                        <?php if ($_POST['children'] == "granny") {echo "checked";}?> value="granny">Granny
                    Flat</label>
            </div>
            <div>
                <input type="submit" value="Apply" class="apply">
            </div>

        </div>
        <button type="button" id="btnclear" onclick="btnreset()">Reset</button>
    </form>
</div>
