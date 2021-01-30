<?php $extraClass = get_sub_field("extra_class");
if (get_sub_field("background_color")) {
    $bgcolor = get_sub_field("background_color");
} else { $bgcolor = '#fff';}
?>
<section class="container grid-fixedGrid <?php echo $extraClass ?>" style="background-color: <?php echo $bgcolor; ?>">
    <div class="container p-0">
        <div class="row grid pt-0 contain" style="position:relative;">
            <div class="alter-div">
                <?php $i = 1;
while (have_rows('resources')): the_row();?>

                <section class="test">
                    <div class="container-test2">
                        <div class="left-div2">


                            <?php $image = get_sub_field('image');
    $url = $image['url'];
    $title = $image['title'];
    $alt = $image['alt'];
    ?>

                            <div class="stretched-img">
                                <img src="<?php echo $url; ?>" alt="<?php echo $alt ?>" />
                            </div>

                        </div>

                        <div class="right-div2" data-aos="fade-up">
                            <div class=" content-div2">
                                <p class="t2 mid-gold"><?php echo get_sub_field('title') ; ?></p>
                                <p class="p-md grey"><?php echo wp_trim_words(get_sub_field('content'), 50, ' ...') ?>
                                </p>
                                <?php
    $link = get_sub_field('file');
    if ($link) {$link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';?>
                                <div class="content-links "><a
                                        class="btn gold-link btn-<?php echo $grid_link_style . ' ' . $btnSize; ?>"
                                        href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>">
                                        Download →
                                    </a></div>
                                <?php }?>

                            </div>
                        </div>
                    </div>
                </section>


                <?php
    $i++;endwhile;?>
            </div>
        </div>
        <?php if (have_rows('more_offers')) {?>
        <div class="contain-container offer-div">
            <p class="t2 mid-gold offer-title">More Offers & Resources</p>
            <div class="flex">
                <?php $i = 1;
    while (have_rows('more_offers')): the_row();?>

                <div class="card card-offer">
                    <div class="card-content-div offer-content-div">
                        <p class="p-lg mid-gold bold">
                            <?php echo get_sub_field('title') . ' #' . $i; ?>
                        </p>
                        <div class=" card-content p-st black">
                            <?php echo wp_trim_words(get_sub_field('content'), 20, ' ...'); ?></div>
                        <?php
    $link = get_sub_field('file');
        if ($link) {$link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';?>
                        <div class=" content-links "><a class=" btn gold-link" href="<?php echo $link_url; ?>"
                                target="<?php echo $link_target; ?>">
                                DOWNLOAD →
                            </a>
                        </div>
                        <?php }?>
                    </div>
                    </a>
                </div>

                <?php
    $i++;endwhile;?>
            </div>
        </div>
        <?php }?>
    </div>
</section>
