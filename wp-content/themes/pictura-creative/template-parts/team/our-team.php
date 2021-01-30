<?php $extraClass = get_sub_field("extra_class");

if (get_sub_field("title_class")) {$titleClass = get_sub_field("title_class");}
if (get_sub_field("title_primary_color")) {$titleColor = get_sub_field("title_primary_color");}
$array = [];
?>
<section class="container m-150 <?php echo $extraClass ?>" style="background-image:url(<?php echo get_sub_field('background_image'); ?>);background-color:<?php if (get_sub_field("background_color")) {echo get_sub_field("background_color");} else {echo '#fff';}
?>;">

    <div class="container" style="max-width:1220px;">
        <div class="row contain">
            <?php if (get_sub_field("title")) {?> <?php
if (get_sub_field("title")) {

    if (get_sub_field("title_style")) {
        $titleStyle = get_sub_field("title_style");
    } else {
        $titleStyle = 'bold';
    }

    if (get_sub_field("italic")) {
        $italic = "italic";
    } else {
        $italic = '';
    }

    if (get_sub_field("title_tag")) {
        $title_tag = get_sub_field("title_tag");
    } else {
        $title_tag = 'h4';
    }

    if (get_sub_field("title_align")) {
        $title_align = get_sub_field("title_align");
    } else {
        $title_align = 'left';
    }

    $color = get_sub_field("title_color");

    $title = get_sub_field("title");
    ?> <<?php echo $title_tag; ?> data-aos="fade-up"
                class="team-title  <?php echo $titleStyle . ' text-' . $title_align . ' ' . $titleClass . ' ' . $titleColor; ?>"
                style="color:<?php echo $color; ?>"> <?php echo $title; ?> </<?php echo $title_tag; ?>>
            <?php }?>
            <?php
}?>
            <div class="team-cont container <?php echo $contentColor . ' ' . $contentClass; ?> mb-70">
                <?php the_sub_field('contents');?>
            </div>

            <?php while (have_rows('team_members')): the_row();
    if (get_sub_field("department_tag")) {$deptag = get_sub_field("department_tag");}
    if (get_sub_field("department_title_class")) {$depclass = get_sub_field("department_title_class");}
    if (get_sub_field("department_title_color")) { $depcolor= get_sub_field("department_title_color");}
    if (get_sub_field("department_title")) {$deptitle = get_sub_field("department_title");}

    ?>
            <<?php echo $deptag; ?> class="designation container bold st2 <?php echo $depcolor ;?>">
                <?php echo $deptitle; ?>
            </<?php echo $deptag; ?>>
            <div class="team-container flex">
                <?php

    while (have_rows('team')): the_row();
        if (get_sub_field("name")) {$name = get_sub_field("name");}
        if (get_sub_field("position")) {$position = get_sub_field("position");}
        if (get_sub_field("image")) {$image = get_sub_field("image")['url'];}
        //print_r($image);
        ?>

                <div data-aos="fade-up" class="col-sm-6 col-xs-12 col-md-4 col-lg-4">
                    <div class="team-grid">
                        <?php

        if ($image && !(in_array($image, $array))): ?>
                        <img src="<?php echo $image; ?>" alt="<?php echo esc_attr($name); ?>" class="team-img" />
                        <?php
        array_push($array, $image);
    endif;?>
                        <div class="team-content">
                            <p class="p-md black bold m-0"><?php echo $name; ?></p>
                            <?php if (get_sub_field("position")) {
        echo "<p class='p-st black'>" . get_sub_field("position") . "</p>";
    }?>
                        </div>
                    </div>
                </div>
                <?php endwhile;?>
            </div>
            <?php endwhile;?>
        </div>
    </div>
</section>
