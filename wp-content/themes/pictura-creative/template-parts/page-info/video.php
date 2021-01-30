<?php $extraClass = get_sub_field("extra_class");?>
<section class="video grid container pt-0 <?php echo $extraClass ?>"
    style="background-color: <?php if (get_sub_field('background_color')) {echo get_sub_field('background_color');} else {echo "#fff;";}?>">
    <div class="container">
        <div class="row contain">
            <div class="col-sm-12" data-aos="fade-up">
                <div class="flex card-blocks">

                    <?php while (have_rows("cards")): the_row();
    $video = get_sub_field('video_link');

    ?>
                    <div class=" inspire-card embedc">
                        <?php $video = str_replace("watch?v=", "embed/", $video);?>
                        <iframe width="100%" height="340px" src="<?php echo $video; ?>" allow="encrypted-media"
                            allowfullscreen></iframe>
                        <div class="card-content-div p-md bold" style="padding:15px 0px">
                            <span><?php echo get_sub_field('video_title'); ?> </span>
                        </div>
                    </div>
                    <?php

endwhile;?>

                </div>
            </div>
        </div>
    </div>
</section>
