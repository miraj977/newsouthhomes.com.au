<?php
$extraClass = get_sub_field("extra_class");?>
<section class="grid pt-0 container <?php echo $extraClass ?>"
    style="background-color: <?php if (get_sub_field('background_color')) {echo get_sub_field('background_color');} else {echo "#fff";}?>">
    <div class="container">
        <div class="row contain">
            <div class="col-sm-12" data-aos="fade-up">
                <div class="flex card-blocks">
                    <?php while (have_rows("cards")): the_row();
    $gallery = get_sub_field('gallery');
    $title = get_sub_field('gallery_title');

    ?>
                    <div class=" inspire-card">
                        <a href="<?php echo the_permalink() . '?i=' . $title; ?>">
                            <?php foreach ($gallery as $img) {?>
                            <img class="card-img" src="<?php echo $img['url'] ?>" alt="Card Image" style="width:100%">
                            <?php break;}?>
                            <div class="card-content-div inspire-card-content p-lg">
                                <span><?php echo $title; ?> </span><span>→</span>

                            </div>
                        </a>
                    </div>
                    <?php endwhile;?>

                </div>
            </div>
        </div>
    </div>
</section>
