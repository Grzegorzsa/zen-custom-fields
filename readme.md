#Zen Custom Fields
Simple to implement and use custom fields in Wordpress templates. The plugin converts regular html tables into arrays of
 values.

###Usage
1. Place the table with values you want to use on your page between [zen-fields] ... [/zen-fields] short-tags on your
 page.
2. In your template use zen_field() function to output values from above table.

e.g.
1. Table with just values

[zen-fields]
  <table>
    <tr><td>Value 1</td></tr>
    <tr><td>Value 2</td></tr>
    <tr><td>Value 3</td></tr>
  </table>
[/zen-fields]

  To get value from second row in your template you should put

  <?php echo zen_field(1) ?>

  or if you are using php 5.4

  <?= zen_field(1) ?>

  where 1 is index of array which holds values from the table. You can use 2 dimensional tables and extract values for
  different columns using second parameter in zen_field function.

2. Better approach is to use name/value pairs. In this case you should use table header tags for field names.

  <table>
    <tr><th>field name 1</th><td>Value 1</td></tr>
    <tr><th>field name 2</th><td>Value 2</td></tr>
    <tr><th>field name 3</th><td>Value 3</td></tr>
  </table>

  In your template to get value from second row you would use

  <?php echo zen_field('field name 2') ?>

   You can use 2 dimensional tables. The first table row then would hold column names in <th> tags. To extract data from
   that table use second parameter in zen_field function as a column name.

 <?php echo zen_field('field name','column name') ?>

You can place many tables with different data between [zen-field] short-tag. To target specific table in your template
use table name in the third parameter in zen_field function. You need to specify table name using data-name attribute.

e.g. <table data-name="table name">...</table>

And in template:

<?php echo zen_field('field name','column name', 'table name') ?>

If you have only one row of values you can put table name in second parameter.

###Installation

1. Upload `zen-custom-fields.zip` to the `/wp-content/plugins/` and unzip it
2. Activate the plugin through the 'Plugins' menu in WordPress
