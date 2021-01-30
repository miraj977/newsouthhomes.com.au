	<!--- MODAL --->
	<div class="enquiry-modal">
	    <div class="enquiry-modal__inner" id="enq-modal">
        <div class="enquiry-modal__content">
            <span class="modal-close"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/close-black.svg"
                    ?></span>
            <div class="col-lg-12 col-md-12 col-sm-12 flex">
                <div class="col-md-4 col-sm-12 modal-left">
                    <p class="st3 black request-title">Request a callback</p>
                    <p class="p-st black">Thank you for your interest. Please complete your details and our team will be in contact with you as soon as possible to discuss your enquiry.</p>
                </div>
                <div class="form-wrap col-sm-12 col-md-8">
                    <?php $e_formId = get_field("enquiry_form", "option");?>
                   <?php //echo do_shortcode('[contact-form-7 id="' . $e_formId . '" ]'); ?>
                   <?php echo do_shortcode('[contact-form-7 id="880" title="Enquiry Form"]'); ?>
                </div>
            </div>
        </div>
	    </div>
	</div>
	<!-- END MODAL -->


