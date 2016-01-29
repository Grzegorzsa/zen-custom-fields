<?php
/*
	Plugin Name: Zen Custom Fields
	Plugin URI: https://github.com/Grzegorzsa/zen-custom-fields
	Description: Easy to implement and use custom fields for WordPress templates. The plugin converts regular html tables into arrays of values.
	Version: 1.13
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
  check_zen_fields_object();
	return $zen_fields->getField( $param1, $param2, $param3 );
}

function zen_field_esc( $param1 = false, $param2 = false, $param3 = false ) {
	global $zen_fields;
  check_zen_fields_object();
	return $zen_fields->getEscapedField( $param1, $param2, $param3 );
}

function zen_field_src ( $param1 = false, $param2 = false, $param3 = false ) {
	global $zen_fields;
  check_zen_fields_object();
	return $zen_fields->getAttr( 'src', $param1, $param2, $param3 );
}

function zen_fields_get( $name = false ) {
  global $zen_fields;
  check_zen_fields_object();
  if ( $name ) {
    return $zen_fields->getTable( $name );
  } else {
    return $zen_fields->tables;
  }
}

function zen_fields_count( $name ) {
  global $zen_fields;
  check_zen_fields_object();
  $arr = zen_fields_get( $name );
  if (is_array($arr)) {
    return count($arr);
  } else {
    return 0;
  }
}

function check_zen_fields_object() {
  global $zen_fields;
  if( ! is_object( '$zen_fields' ) ) {
    zen_fields_parse();
  }
  if( ! is_object( '$zen_fields' ) ) {
    zen_fields_init( '', '' );
  }
}

function zen_fields_parse() {
  apply_filters( 'the_content', get_the_content() );
}
