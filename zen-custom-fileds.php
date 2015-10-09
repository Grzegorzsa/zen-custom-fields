<?php
/*
	Plugin Name: Zen Custom Fields
	Plugin URI: https://github.com/Grzegorzsa/zen-custom-fields
	Description: Easy to implement and use custom fields in WordPress templates. The plugin converts regular html tables into arrays of values.
	Version: 1.0
	Author: Grzegorz Sarzyński
	Author URI: https://github.com/Grzegorzsa
	License: GPL2
	License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

require_once( 'includes/zen_custom_fields_class.php' );

function zen_fields_init( $atts, $content = '' ) {
	global $zen_fields;
	$zen_fields = new ZenCustomFields( $atts, $content );
}
add_shortcode( 'zen-fields', 'zen_fields_init' );

function zen_field( $param1 = false, $param2 = false, $param3 = false ) {
	global $zen_fields;
	return $zen_fields->getField( $param1, $param2, $param3 );
}

function zen_field_esc( $param1 = false, $param2 = false, $param3 = false ) {
	global $zen_fields;
	return $zen_fields->getEscapedField( $param1, $param2, $param3 );
}

