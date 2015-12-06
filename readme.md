#Zen Custom Fields
Easy to implement and use custom fields for WordPress templates. The plugin converts regular html tables into arrays of
 values.

###Usage
1. Place the table with values you want to use on your page between [zen-fields] ... [/zen-fields] short-tags
2. In your template use zen_field() function to output values from above table

###Installation
1. Download zipped plugin from this page and unzip its content to the `/wp-content/plugins/` directory in your Wordpress 
installation folder
2. Activate the plugin through the 'Plugins' menu in WordPress

###Examples
1. Basic usage - simple table with values only
  (HTML page edit mode)<pre><code>Page content
  ...
  [zen-fields]
    &lt;table&gt;
      &lt;tr&gt;&lt;td&gt;Value 1&lt;/td&gt;&lt;/tr&gt;
      &lt;tr&gt;&lt;td&gt;Value 2&lt;/td&gt;&lt;/tr&gt;
      &lt;tr&gt;&lt;td&gt;Value 3&lt;/td&gt;&lt;/tr&gt;
    &lt;/table&gt;
  [/zen-fields]
  ...
  </code></pre>
  
  To output the value from second row of the table you should use in your template:

  <code><?php echo zen_field(1) ?></code>
  
  or if you are using php version 5.4 and above 
  
  <code><?= zen_field(1) ?></code>

  Where 1 is an index of array which holds values from the table. You can use 2 dimensional tables and extract its
  values using column index in second parameter of zen_field() function.
  
  <code><?php echo zen_field(1, 2) ?></code>

2. A better approach is to use named key/value pairs. In this case you should use table header tags <code>&lt;th&gt;</code> for
 field names.
  <pre><code>[zen-fields]
    &lt;table&gt;
      &lt;tr&gt;&lt;th&gt;field name 1&lt;/th&gt;&lt;td&gt;Value 1&lt;/td&gt;&lt;/tr&gt;
      &lt;tr&gt;&lt;th&gt;field name 2&lt;/th&gt;&lt;td&gt;Value 2&lt;/td&gt;&lt;/tr&gt;
      &lt;tr&gt;&lt;th&gt;field name 3&lt;/th&gt;&lt;td&gt;Value 3&lt;/td&gt;&lt;/tr&gt;
    &lt;/table&gt;
  [/zen-fields]
  </code></pre>
    To output the value from second row in your template you would use

  <code><?php echo zen_field('field name 2') ?></code>

   You can use 2 dimensional tables. The first table row then would hold column names in <code>&lt;th&gt;</code> tags.
        
  (Visual edit mode)<pre><code>[zen-fields]<table>
    <tr><th></th><th>column 1</th><th>column 2</th></tr>
    <tr><th>field name 1</th><td>Value 1</td><td>Value 2</td></tr>
    <tr><th>field name 2</th><td>Value 3</td><td>Value 4</td></tr>
    <tr><th>field name 3</th><td>Value 5</td><td>Value 6</td></tr>
  </table>
  [/zen-fields]
  </code></pre>
  
  In your template use combination of row and column names to output your data:
  
 <code><?php echo zen_field('field name 2','column 1') ?></code> would output <code>Value 3</code> string

You can place many tables with different data between [zen-fields] short-tags. To target specific table in your template
use table name in the third parameter in zen_field function. You need to specify table name using data-name attribute.

e.g. <code>&lt;table data-name=&quot;table name&quot;&gt;...&lt;/table&gt;</code>

And in template:

<code><?php echo zen_field('field name','column name', 'table name') ?></code>

If you have only one column with values you can put table name in second parameter.

###Iteration over values in tables

It is possible to iterate over values from your tables. The variable <code>$zen_fields->tables</code> holds an array
 with values from all the tables on the page.

###Escaping output

By default output is not escaped which allows you to use links, images and another HTML content in your custom fields.
If you would like to escape the output use <code>zen_field_esc()</code> function instead of <code>zen_field()</code>

###Changelog

1.1
 - Fix bugs
 - Allow attributes in <th> element