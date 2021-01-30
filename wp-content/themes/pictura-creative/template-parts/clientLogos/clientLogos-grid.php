<section class="container clientLogos clientLogos_grid alignCenter"
    style="background-color:<?php echo get_field("client_logos_background_color", "option") ?> ">
    <div class="container p-0" style="max-width:1220px">
        <div class="row contain">
            <?php if (get_field("title", "option")) {?>
            <?php
if (get_field("title_class", "option")) {
    $titleClass = get_field("title_class", "option");
}

    if (get_field("client_logos_title_style", "option")) {
        $titleStyle = get_field("client_logos_title_style", "option");
    } else {
        $titleStyle = 'bold';
    }

    if (get_field("italic", "option")) {
        $italic = "italic";
    } else {
        $italic = '';
    }

    if (get_field("title_tag", "option")) {
        $title_tag = get_field("title_tag", "option");
    } else {
        $title_tag = 'p';
    }

    if (get_field("client_logos_title_align", "option")) {
        $title_align = get_field("client_logos_title_align", "option");
    } else {
        $title_align = 'left';
    }

    $color = get_field("client_title_color", "option");

    $title = get_field("title", "option");
    ?>
            <<?php echo $title_tag; ?>
                class="sectionTitle title-underline container <?php echo $italic . ' ' . $titleClass . ' ' . $titleStyle . ' text-' . $title_align ?>"
                style="color:<?php echo $color; ?>"> <?php echo $title; ?> </<?php echo $title_tag; ?>>

            <?php }?>
            <div class="col-sm-12 text-left black <?php echo get_sub_field('content_class'); ?>">
                <?php	echo get_field('client_logo_text', 'option'); ?>
            </div>
            <?php
$images = get_field('client_logos', "option");
if ($images): ?>
            <?php foreach ($images as $image): ?>
            <div data-aos="fade-up" class="col-sm-4 col-xs-6 col-md-5th col-lg-5th">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            </div>
            <?php endforeach;endif;?>
        </div>
    </div>
</section>
