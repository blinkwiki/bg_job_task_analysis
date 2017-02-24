# bg_job_task_analysis
A complete CRUD form for BAGASOO JTA records.

HOW TO SETUP

1. Clean up the HTML as indicated in the red text on the form here.

2. Create a new database named bagasoo_simca_itraqs.

3. Open, review and edit jta.sql. There might be some errors in the database SQL supplied, try to correct them.

4. Upload the SQL script to your MySQL server via phpMyAdmin.

5. Rename each element in the form to match the corresponding fields names as found in the tables. Example <input name="jta_title" id="jta_title" value="" />

6. Edit the file includes/conn.php to match your database connectons

7. Populate and view JTAs in a tabular format as indicated here

8. Use the function displayPicker_v2 to populate the select boxes from the database tables. How to use the function: 

<?php displayPicker_v2($sql_query, $record_id_to_select, $text_field_array, $value_field, $initial_title, true, $voidconn, $title_field_array); ?> 

where 

sql_query: is the SQL query to load values from the database. Example "SELECT `table_name`.`field0`, `table_name`.`field1`, `table_name`.`field2`, `table_name`.`field3` FROM `table_name` WHERE 1 AND [more conditions]",
$record_id: The record ID marking the selected option in the select box,
$text_field_array: an array of numbers indicating the field numbers to use when displaying the title of the options,
$value_field: ,
$initial_title: The title of the first option in the select box showing the instructions. Example --select specialty--,
$bool_show_init_title: To show or hide the initial select box option showing the instructions true or false,
$voidconn: MySQL database connection resource,
$title_field_array: This is the field number to use when entering the title property of the select box options.

9. Submit the SECTION I of the JTA Form

10. Batch processing: Sort out the adding of new HTML using Javascript.

11. Batch processing: Submiting batch forms.


References:

MySQL table Display: http://blinkwiki.com/?paged=5

CRUDing with PHP MySQL Part 1 Part 2

Populating a selectbox with PHP/MySQL http://blinkwiki.com/?p=677

Deleting records harmlessly: http://blinkwiki.com/?paged=6

Pagination: http://blinkwiki.com/?p=909

Show Hide Elements with Javascript : http://blinkwiki.com/?p=737


Copyright 2017 ASYST Technology Solutions. All rights reserved.
