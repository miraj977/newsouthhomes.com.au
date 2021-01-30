<?php $extraClass = get_sub_field("extra_class");?>
<section class="faq faq1 container pt-0 <?php echo $extraClass ?>" style="background-color:#ffffff;">
    <div class="container contain contain-container">
        <div class="row contain<?php if (is_page('inclusions')) {echo 'max-content text-left';}?>" style="max-width: 980px;
margin-left: 0;">
            <?php if (is_page('inclusions')) {$class = "inclusion";
    $style = "max-width:980px;padding-left:0px;";}?>
            <div class="col-sm-12 " style="<?php echo $style; ?>">
                <ul class="accordion <?php echo $class; ?>" data-aos="fade-up">
                    <?php if (have_rows('faqs')):
    while (have_rows('faqs')): the_row();?>
                    <li>
                        <a class="toggle p-lg" href="javascript:void(0);"><?php echo get_sub_field("title"); ?></a>
                        <ul class="inner col-sm-12 col-lg-12 col-md-12"><?php echo get_sub_field("content"); ?>

                            <?php
        if (have_rows('inclusion')): ?>
                            <!-- <p class="ce-title"><span>Classic</span><span>Elite</span></p> -->
                            <table class="inclusion-table">
                                <tr class="text-left" style="background-color:#F2F2F2
																																																				;height:48px;">
                                    <th></th>
                                    <th style="text-align:center;">Classic</th>
                                    <th style="padding-left:24px">Elite</th>
                                </tr>
                                <?php
        while (have_rows("inclusion")): the_row();?>

                                <tr>
                                    <td style="width:90%">
                                        <p class="p-st grey" style="margin-bottom:0px;">
                                            <?php echo get_sub_field('title'); ?></p>
                                    </td>
                                    <td style="padding: 10px;text-align:center;">
                                        <?php if (get_sub_field('classic') == 1) {?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/tick.svg">
                                        <?php }?>
                                        <?php if (get_sub_field('classic_text')) {
                echo get_sub_field('classic_text');
            }?>
                                    </td>
                                    <td style="padding: 10px;text-align:center;">
                                        <?php if (get_sub_field('elite') == 1) {?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/tick.svg"
                                            class="second-tick"> <?php }?>
                                        <?php if (get_sub_field('elite_text')) {
                echo get_sub_field('elite_text');
            }?>
                                    </td>

                                </tr>
                                <?php endwhile;endif?>
                            </table>
                        </ul>
                    </li>
                    <?php endwhile;else:endif;?>
                </ul>
            </div>
        </div>
    </div>
</section>
