 <div class="flex showhide-div">
     <button class="hidefilter" id="hidefilter3"> SHOW FILTERS</button>
 </div>
 <div id="filters-tablet" class="desktop hd-filter">


     <div class="col-md-12 col-sm-12 storey-flex tab-filter">

         <div class="storey checkboxFilter">
             <p class="filter-p">Storeys</p>
             <div class="flex filter-icon">
                 <?php
$storeys = get_terms(array(
    'taxonomy' => 'storeys',
    'hide_empty' => false,
));
foreach ($storeys as $storey) {
    if ($storey->name == "Single") {$img = "/images/storey-a.svg";}
    if ($storey->name == "Double") {$img = "/images/storey-2.svg";}
    ?>
                 <div class="filter-button">
                     <label class="checkWrap">
                         <input type="checkbox" data-filter="<?php echo $storey->slug ?>" class=" works-filter
                                    storeyCheck control" name="storeys" value="<?php echo $storey->slug ?>">
                         <span class="check-span checkmark"> <img
                                 src="<?php echo get_template_directory_uri() . $img; ?>" class="p-5"
                                 style="max-width:42px;"><?php echo $storey->name; ?>
                         </span>
                     </label>
                 </div>

                 <?php }?>
             </div>

         </div>
         <div class="homesize selectFilter">
             <p class="filter-p">Home Size</p>
             <div class="flex filter-icon  hd-size-1-div">
                 <div class="cust hd-size-1">
                     <select name="home-size-min" class="d-sel">
                         <option value="0" selected>0m&#178;</option>
                         <option value="100">100m&#178;</option>
                         <option value="200">200m&#178;</option>
                         <option value="250">250m&#178;</option>
                         <option value="300">300&#178;</option>
                         <option value="350">350&#178;</option>
                         <option value="400">400&#178;</option>
                         <option value="450">450&#178;</option>
                         <option value="500">500&#178;</option>
                     </select>
                 </div>
                 <span class="to">to</span>
                 <div class="cust hd-size-2">

                     <select name="home-size-max" class="d-sel">
                         <option value="100" selected>100m&#178;</option>
                         <option value="200">200m&#178;</option>
                         <option value="250">250m&#178;</option>
                         <option value="300">549m&#178;</option>
                         <option value="350">549m&#178;</option>
                         <option value="400">549m&#178;</option>
                         <option value="450">549m&#178;</option>
                         <option value="450">450&#178;</option>
                         <option value="1000">500m&#178;+</option>
                     </select>
                 </div>
             </div>
         </div>
     </div>

     <div class="col-md-12 col-sm-12  tab-filter">

         <div class="bedroom checkboxFilter">
             <p class="filter-p">Bedrooms</p>
             <div class="flex filter-icon">

                 <?php
$bedrooms = get_terms(array(
    'taxonomy' => 'bedrooms',
    'hide_empty' => false,
));
foreach ($bedrooms as $bedroom) {
    ?>
                 <div class="filter-check">
                     <label class="checkWrap">
                         <input type="checkbox" data-filter="<?php echo $bedroom->slug . 'bed'; ?>"
                             class="works-filter bedroomsCheck control" name="bedrooms"
                             value="<?php echo $bedroom->slug ?>">
                         <span
                             class="check-span checkmark"><?php echo str_replace("s", '', str_replace("Bedroom", "", $bedroom->name)) ?></span>
                     </label>
                 </div>
                 <?php }?>
             </div>
         </div>

         <div class="bathroom checkboxFilter">
             <p class="filter-p">Bathrooms</p>
             <div class="flex filter-icon">

                 <?php
$allBathroom = get_terms(array(
    'taxonomy' => 'bathrooms',
    'hide_empty' => false,
));
foreach ($allBathroom as $bath) {
    ?>
                 <div class="filter-check">
                     <label class="checkWrap">
                         <input type="checkbox" data-filter="<?php echo $bath->slug . 'bath'; ?>"
                             class="works-filter control bathroomsCheck" name="bathrooms"
                             value="<?php echo $bath->slug ?>">
                         <span class="check-span checkmark"><?php echo str_replace("s", '', str_replace("Bathroom", "", $bath->name)) ?></span>
                     </label>
                 </div>


                 <?php }?>
             </div>

         </div>



         <div class="lotsize selectFilter">
             <p class="filter-p">Lot Size</p>
             <div class="flex filter-icon hd-size-2-div">
                 <div class="cust hd-size-2">
                     <select name="lot-size-min" class="d-sel">
                         <option value="0" selected>0m&#178;</option>
                         <option value="200">200m&#178;</option>
                         <option value="300">300m&#178;</option>
                         <option value="450">450m&#178;</option>
                         <option value="550">550m&#178;</option>
                     </select>
                 </div>
                 <span class="to">to</span>
                 <div class="cust hd-size-2">

                     <select name="lot-size-max" class="d-sel">
                         <option value="199" selected>199m&#178;</option>
                         <option value="299">299m&#178;</option>
                         <option value="449">449m&#178;</option>
                         <option value="549">549m&#178;</option>
                         <option value="1000">1000m&#178;</option>
                     </select>
                 </div>
             </div>
         </div>
     </div>
     <div class="col-md-12 col-sm-12  tab-filter">

         <div class="hometypes checkboxFilter">
             <p class="filter-p">Home Types</p>
             <div class="flex filter-icon">

                 <?php
$home_types = get_terms(array(
    'taxonomy' => 'home_types',
    'hide_empty' => false,
));
foreach ($home_types as $home_type) {
    if ($home_type->name == "Narrow") {$img = "/images/narrow.svg";}
    if ($home_type->name == "Homestead") {$img = "/images/homestead.svg";}
    if ($home_type->name == "Duplex") {$img = "/images/duplex.svg";}
    if ($home_type->name == "Split Level") {$img = "/images/splitlevel.svg";}
    if ($home_type->name == "Dual Occupancy") {$img = "/images/dual.svg";}
    if ($home_type->name == "Granny Flats") {$img = "/images/granny.svg";}

    ?>
                 <div class="filter-button">
                     <label class="checkWrap">
                         <input type="checkbox" data-filter="<?php echo $home_type->slug ?>"
                             class="works-filter control hometypeCheck" name="hometypes"
                             value="<?php echo $home_type->slug ?>">
                         <span class="check-span checkmark"> <img
                                 src="<?php echo get_template_directory_uri() . $img; ?>" class="p-5 hometype-img"
                                 style="max-width:80px;"><?php echo $home_type->name; ?>
                         </span>

                     </label>
                 </div>

                 <?php }?>
             </div>
         </div>
     </div>
     <div style="width:100%; padding-left: 10px;">
         <button class="clear-btn" id="button">Clear Filters</button>
     </div>
 </div>
