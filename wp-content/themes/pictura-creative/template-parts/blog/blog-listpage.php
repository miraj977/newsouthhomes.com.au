<div class="blog-row">
    <div class="col-sm-12 col-md-6 align-self-center">
        <div class="blog-list-img">
            <?php the_post_thumbnail();?>
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="blog-list-content">
            <h4 class="p-lg mt-0"><a class="mid-gold" href="<?php echo get_permalink(); ?>"><?php the_title();?></a>
            </h4>
            <div class="blog-date">
                <?php echo '<b class="black p-st bold">' . get_the_date() . '</b> '; ?>
            </div>
            <?php
$content = get_the_content();
$content = strip_tags($content);
echo substr($content, 0, 120);
?>
        </div>


        <div class="content-links"><a class="btn-style1 p-st black bold" href="<?php echo get_permalink(); ?>">Read More
                →</a>
        </div>
    </div>
</div>
