#Zen Custom Fields
Simple to implement and use custom fields in WordPress templates. The plugin converts regular html tables into arrays of
 values.

###Usage
1. Place the table with values you want to use on your page between [zen-fields] ... [/zen-fields] short-tags
2. In your template use zen_field() function to output values from above table

###Installation
1. Download `mazter.zip` from this page and unzip its content to the `/wp-content/plugins/` directory in your Wordpress 
installation
2. Activate the plugin through the 'Plugins' menu in WordPress

###Examples
1. Simple table with values only - not recommended (text view)
  <pre><code>Page content
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
  
  To get value from second row in your template you should use

  <code><?php echo zen_field(1) ?></code>
  
  or if you are using php version 5.4 and above 
  
  <code><?= zen_field(1) ?></code>

  where 1 is an index of array which holds values from the table. You can use 2 dimensional tables and extract its
  values using column index in second parameter of zen_field() function.

2. Better approach is to use name/value pairs. In this case you should use table header tags <code>&lt;th&gt;</code> for
 field names.
  <pre><code>[zen-fields]
    &lt;table&gt;
      &lt;tr&gt;&lt;th&gt;field name 1&lt;/th&gt;&lt;td&gt;Value 1&lt;/td&gt;&lt;/tr&gt;
      &lt;tr&gt;&lt;th&gt;field name 2&lt;/th&gt;&lt;td&gt;Value 2&lt;/td&gt;&lt;/tr&gt;
      &lt;tr&gt;&lt;th&gt;field name 3&lt;/th&gt;&lt;td&gt;Value 3&lt;/td&gt;&lt;/tr&gt;
    &lt;/table&gt;
  [/zen-fields]
  </code></pre>
    To get the value from second row in your template you would use

  <code><?php echo zen_field('field name 2') ?></code>

   You can use 2 dimensional tables. The first table row then would hold column names in &lt;th&gt; tags. To extract
    data from that table use second parameter in zen_field function as a column name.
    
  <pre><code>(HTML edit mode)
  ...content
  [zen-fields]
    &lt;table&gt;
      &lt;tr&gt;&lt;th&gt;&lt;/th&gt;&lt;th&gt;column name&lt;/th&gt;&lt;th&gt;another column&lt;/th&gt;&lt;/tr&gt;
      &lt;tr&gt;&lt;th&gt;field name&lt;/th&gt;&lt;td&gt;Value 1&lt;/td&gt;&lt;td&gt;Value 2&lt;/td&gt;&lt;/tr&gt;
      &lt;tr&gt;&lt;th&gt;field name 1&lt;/th&gt;&lt;td&gt;Value 3&lt;/td&gt;&lt;td&gt;Value 4&lt;/td&gt;&lt;/tr&gt;
      &lt;tr&gt;&lt;th&gt;field name 2&lt;/th&gt;&lt;td&gt;Value 5&lt;/td&gt;&lt;td&gt;Value 6&lt;/td&gt;&lt;/tr&gt;
    &lt;/table&gt;
  [/zen-fields]
  
  (Visual edit mode)
  ... content
  [zen-fields]
  <table>
    <tr><th></th><th>column name</th><th>another column</th></tr>
    <tr><th>field name</th><td>Value 1</td><td>Value 2</td></tr>
    <tr><th>field name 1</th><td>Value 3</td><td>Value 4</td></tr>
    <tr><th>field name 2</th><td>Value 5</td><td>Value 6</td></tr>
  </table>
  [/zen-fields]
  </code></pre>
  
  And in template:
  
 <code><?php echo zen_field('field name','column name') ?></code>

You can place many tables with different data between [zen-fields] short-tags. To target specific table in your template
use table name in the third parameter in zen_field function. You need to specify table name using data-name attribute.

e.g. <code>&lt;table data-name=&quot;table name&quot;&gt;...&lt;/table&gt;</code>

And in template:

<code><?php echo zen_field('field name','column name', 'table name') ?></code>

If you have only one column with values you can put table name in second parameter.

###Iteration over values in tables

It is possible to iterate over values from your table. <code>$zen_fields->tables</code> holds an array of values from
all tables on the page.