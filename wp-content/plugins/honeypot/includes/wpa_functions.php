<?php
function wpa_load_scripts(){

	if (current_user_can('activate_plugins')){
    	$wpa_add_test = 'yes';
	} else {
		$wpa_add_test = 'no';
	}

	echo '<script>var wpa_hidden_field = "'.$GLOBALS['wpa_hidden_field'].'"; var wpa_add_test = "'.$wpa_add_test.'";</script>';
	wp_enqueue_script( 'wpascript',  plugins_url( '/js/wpa.js', __FILE__ ), array ( 'jquery' ), 1.1, true);
	wp_enqueue_style( 'wpa-css', plugins_url( '/css/wpa.css', __FILE__ ), array(), '1.1');
}

function wpa_plugin_menu(){
    add_menu_page( 'WP Armour', 'WP Armour', 'manage_options', 'wp-armour', 'wpa_options','dashicons-shield');
}

function wpa_options(){
	$wpa_tabs = array(
				'settings' => array('name'=>'Settings','path'=>'wpa_settings.php'),
				'stats' => array('name'=>'Statistics','path'=>'wpa_stats.php'),
				'extended_version' => array('name'=>"What's in WP Armour Extended ?",'path'=>'wpa_extended_version.php')

	);

	$wpa_tabs = apply_filters( 'wpa_tabs_filter', $wpa_tabs);

	include 'views/wpa_main.php';
}

function wpa_save_settings(){
	$all_fields = $_POST;
	unset($all_fields['submit-wpa-general-settings']); // REMOVE submit field

	foreach ($all_fields as $fieldname => $fieldvalue) {
		update_option($fieldname,$fieldvalue);
	}

	$GLOBALS['wpa_field_name'] 			= get_option('wpa_field_name');
	$GLOBALS['wpa_error_message'] 			= get_option('wpa_error_message');

	$return['status']   = 'ok';
	$return['body'] 	= 'Settings Saved';
	return $return;
}

function wpa_save_stats($wp_system){
	$currentStats = json_decode(get_option('wpa_stats'), true);
	if (wpa_check_date($currentStats['total']['today']['date'],'today')){
		$currentStats['total']['today']['count']  			+= 1;
		@$currentStats[$wp_system]['today']['count']  		+= 1;
	} else {
		$currentStats['total']['today']['date'] 			= date('Ymd');
		$currentStats['total']['today']['count'] 			= 1;
		@$currentStats[$wp_system]['today']['count'] 		= 1;
	}

	if (wpa_check_date($currentStats['total']['week']['date'],'week')){
		$currentStats['total']['week']['count']  += 1;
		@$currentStats[$wp_system]['week']['count']  += 1;
	} else {
		$currentStats['total']['week']['date'] 			= date('Ymd');
		$currentStats['total']['week']['count']  		= 1;
		@$currentStats[$wp_system]['week']['count']  	= 1;
	}

	if (wpa_check_date($currentStats['total']['month']['date'],'month')){
		$currentStats['total']['month']['count']  += 1;
		@$currentStats[$wp_system]['month']['count']  += 1;
	} else {
		$currentStats['total']['month']['date'] 			= date('Ymd');
		$currentStats['total']['month']['count']  			= 1;
		@$currentStats[$wp_system]['month']['count']  		= 1;
	}

	$currentStats['total']['all_time'] += 1;
	@$currentStats[$wp_system]['all_time'] += 1;

	update_option('wpa_stats', json_encode($currentStats));
}

function wpa_check_date($timestamp, $comparision){
	switch ($comparision) {
		case 'today':
			if (date('Ymd') == $timestamp){
				return true;
			} else {
				return false;
			}
		break;

		case 'week':
			$firstWeekDay 		= date("Ymd", strtotime('monday this week'));  
			$lastWeekDay 		= date("Ymd", strtotime('sunday this week'));  

			if($timestamp >= $firstWeekDay && $timestamp <= $lastWeekDay) {
				return true;
			} else {
				return false;
			}
		break;

		case 'month':
			if(date('Ym',strtotime($timestamp)) == date('Ym')) {
				return true;
			} else {
				return false;
			}
		break;
	}
}