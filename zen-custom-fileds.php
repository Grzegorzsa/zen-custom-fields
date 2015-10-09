<?php
/*
  Plugin Name: Zen Custom Fields
  Plugin URI: zen-custom-fields.zen-dev.pl
  Description: Simple, fast and beautiful. Use this plugin to implement comprehensive custom fields in your template in just 5 minutes. The plugin converts regular html tables into arrays of values. Depending on table structure arrays can be simple index based or more complex associative ones.
  Version: 1.0
  Author: Grzegorz Sarzyński
  Author URI: zen-dev.pl
  License: GPL2
  License URI: https://www.gnu.org/licenses/gpl-2.0.html

*/

require_once('includes/zen_custom_fields_class.php');

function zen_fields_init($atts, $content = '')
{
  global $zen_fields;
  $zen_fields = new ZenCustomFields($atts, $content);
}
add_shortcode('zen-fields', 'zen_fields_init');

function zen_field($param1 = false, $param2 = false, $param3 = false)
{
  global $zen_fields;
  return $zen_fields->getField($param1, $param2, $param3);
}

function zen_field_esc($param1 = false, $param2 = false, $param3 = false)
{
  global $zen_fields;
  return $zen_fields->getEscapedField($param1, $param2, $param3);
}

