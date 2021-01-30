<?php $extraClass = get_sub_field("extra_class");
if (!isset($_GET['i'])):
?>
<section class="grid container pt-0 <?php echo $extraClass ?>" style="background-color: #fff;>">
    <div class="container">
        <div class="row contain">
            <div class="col-sm-12" data-aos="fade-up">
                <div class="flex card-blocks">
                    <div id="lightgallery">
                        <?php
$images = get_field('image_gallery');
foreach ($images as $img) {?>
                        <a href="<?php echo $img['url'] ?>" class="inspire-card" data-aos="fade-up">
                            <img src="<?php echo $img['url'] ?>" />
                        </a>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif;?>
<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery("#lightgallery").lightGallery({
        mode: 'lg-zoom-in-big',
        cssEasing: 'cubic-bezier(0.25, 0, 0.25, 1)'
    });
});
jQuery('#lightgallery').lazyload();
</script>
