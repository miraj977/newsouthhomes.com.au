<?php $extraClass = get_sub_field("extra_class");?>
<section class="grid block-sec container <?php echo $extraClass ?>" style="background-color: #fff;>">
    <div class="container">
        <div class="row contain">
            <div class="col-sm-12" data-aos="fade-up">
                <div class="flex card-blocks">

                    <?php while (have_rows("cards")): the_row();
    $link = get_sub_field('page_link');
    $img = get_sub_field('image')['url'];
    if (is_page('get-inspired') || is_page('getting-started')) {
        $class = "card-margin";
    }
    if (is_page('inspiration-lookbook')) {
        //$imgclass = "min-height:376px";
        $subclass = "card-margin";
    }

    ?>
                    <div class="<?php echo $class . ' ' . $subclass; ?> inspire-card">
                        <a href="<?php echo $link; ?>">
                            <img class="card-img" src="<?php echo $img ?>" alt="Card Image"
                                style="width:100%;<?php echo $imgclass; ?>">
                            <div class="card-content-div inspire-card-content p-lg">
                                <span><?php echo get_sub_field('page_title'); ?> </span><span style="font-size: 30px;">⭢</span>

                            </div>
                        </a>
                    </div>
                    <?php endwhile;?>

                </div>
            </div>
        </div>
    </div>
</section>
