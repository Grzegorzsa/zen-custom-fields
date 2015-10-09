#Zen Custom Fields
Simple to implement and use custom fields in Wordpress templates. The plugin converts regular html tables into arrays of
 values.

###Usage
1. Place the table with values you want to use on your page between [zen-fields] ... [/zen-fields] short-tags on your
 page.
2. In your template use zen_field() function to output values from above table.

e.g.
1. Table with just values

<code>
[zen-fields]
  <table>
    <tr><td>Value 1</td></tr>
    <tr><td>Value 2</td></tr>
    <tr><td>Value 3</td></tr>
  </table>
[/zen-fields]
</code>

  To get value from second row in your template you should put

  <code><?php echo zen_field(1) ?></code>

  or if you are using php 5.4

  <code><?= zen_field(1) ?></code>

  where 1 is index of array which holds values from the table. You can use 2 dimensional tables and extract values for
  different columns using second parameter in zen_field function.

2. Better approach is to use name/value pairs. In this case you should use table header tags for field names.
<code>
  <table>
    <tr><th>field name 1</th><td>Value 1</td></tr>
    <tr><th>field name 2</th><td>Value 2</td></tr>
    <tr><th>field name 3</th><td>Value 3</td></tr>
  </table>
</code>
  In your template to get value from second row you would use

  <code><?php echo zen_field('field name 2') ?></code>

   You can use 2 dimensional tables. The first table row then would hold column names in <th> tags. To extract data from
   that table use second parameter in zen_field function as a column name.

 <code><?php echo zen_field('field name','column name') ?></code>

You can place many tables with different data between [zen-field] short-tag. To target specific table in your template
use table name in the third parameter in zen_field function. You need to specify table name using data-name attribute.

e.g. <code><table data-name="table name">...</table></code>

And in template:

<code><?php echo zen_field('field name','column name', 'table name') ?></code>

If you have only one row of values you can put table name in second parameter.

###Installation

1. Download `mazter.zip` from this page and unzip its content to the `/wp-content/plugins/` directory in your Wordpress 
installation
2. Activate the plugin through the 'Plugins' menu in WordPress
