<?php
add_filter( 'woocommerce_registration_errors', 'wpa_woocommerce_extra_validation', 10, 3 );
  
function wpa_woocommerce_extra_validation( $errors, $username, $email ) {
    if (!isset($_POST[ $GLOBALS['wpa_field_name']] )){
        $errors->add( 'reg_email', $GLOBALS['wpa_error_message']);
    }    
    return $errors;
}