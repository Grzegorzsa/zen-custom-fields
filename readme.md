#Zen Custom Fields
Simple to implement and use custom fields in Wordpress templates. The plugin converts regular html tables into arrays of
 values.

###Usage
1. Place the table with values you want to use on your page between [zen-fields] ... [/zen-fields] short-tags on your
 page.
2. In your template use zen_field() function to output values from above table.

###Installation
1. Download `mazter.zip` from this page and unzip its content to the `/wp-content/plugins/` directory in your Wordpress 
installation
2. Activate the plugin through the 'Plugins' menu in WordPress


###Examples
1. Table with just values (text view)

  <pre><code>
  [zen-fields]
    &lt;table&gt;
      &lt;tr&gt;&lt;td&gt;Value 1&lt;/td&gt;&lt;/tr&gt;
      &lt;tr&gt;&lt;td&gt;Value 2&lt;/td&gt;&lt;/tr&gt;
      &lt;tr&gt;&lt;td&gt;Value 3&lt;/td&gt;&lt;/tr&gt;
    &lt;/table&gt;
  [/zen-fields]
  </code></pre>
  
  To get value from second row in your template you should put

  <code><?php echo zen_field(1) ?></code> or if you are using php 5.4  <code><?= zen_field(1) ?></code>

  where 1 an is index of array which holds values from the table. You can use 2 dimensional tables and extract values for
  different columns using second parameter in zen_field function.

2. Better approach is to use name/value pairs. In this case you should use table header tags for field names.

  <pre><code>
    &lt;table&gt;
      &lt;tr&gt;&lt;th&gt;field name 1&lt;/th&gt;&lt;td&gt;Value 1&lt;/td&gt;&lt;/tr&gt;
      &lt;tr&gt;&lt;th&gt;field name 2&lt;/th&gt;&lt;td&gt;Value 2&lt;/td&gt;&lt;/tr&gt;
      &lt;tr&gt;&lt;th&gt;field name 3&lt;/th&gt;&lt;td&gt;Value 3&lt;/td&gt;&lt;/tr&gt;
    &lt;/table&gt;
  </code></pre>
  
  In your template to get value from second row you would use

  <code><?php echo zen_field('field name 2') ?></code>

   You can use 2 dimensional tables. The first table row then would hold column names in <th> tags. To extract data from
   that table use second parameter in zen_field function as a column name.

 <code><?php echo zen_field('field name','column name') ?></code>

You can place many tables with different data between [zen-fields] short-tags. To target specific table in your template
use table name in the third parameter in zen_field function. You need to specify table name using data-name attribute.

e.g. <code>&lt;table data-name=&quot;table name&quot;&gt;...&lt;/table&gt;</code>

And in template:

<code><?php echo zen_field('field name','column name', 'table name') ?></code>

If you have only one row of values you can put table name in second parameter.

