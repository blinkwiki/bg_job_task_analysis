<?php
require('includes/conn.php');
require('includes/functions.php');

// get the record id parameter
$rid = mysql_real_escape_string($_GET['rid']);
$rid_pair = ($rid > 0) ? '&rid='.$rid : '';

?>
<!DOCTYPE html>
<html>
    <head>
        <script src="includes/functions.js"></script>
        <style>
.dpadded{ float: left; overflow:hidden; width:auto; padding:10px; }
.dauto{ float: left; overflow:hidden; width:auto;}
.d100{ float: left; overflow:hidden; width:100%;}
.d99{ float: left; overflow:hidden; width:99%;}
.d98{ float: left; overflow:hidden; width:98%;}
.d95{ float: left; overflow:hidden; width:95%;}
.d90{ float: left; overflow:hidden; width:90%;}
.d85{ float: left; overflow:hidden; width:85%;}
.d80{ float: left; overflow:hidden; width:80%;}
.d75{ float: left; overflow:hidden; width:75%;}
.d70{ float: left; overflow:hidden; width:70%;}
.d65{ float: left; overflow:hidden; width:65%;}
.d60{ float: left; overflow:hidden; width:60%;}
.d55{ float: left; overflow:hidden; width:55%;}
.d50{ float: left; overflow:hidden; width:50%;}
.d45{ float: left; overflow:hidden; width:45%;}
.d40{ float: left; overflow:hidden; width:40%;}
.d35{ float: left; overflow:hidden; width:35%;}
.d34{ float: left; overflow:hidden; width:34%;}
.d33{ float: left; overflow:hidden; width:33%;}
.d30{ float: left; overflow:hidden; width:30%;}
.d25{ float: left; overflow:hidden; width:25%;}
.d20{ float: left; overflow:hidden; width:20%;}
.d15{ float: left; overflow:hidden; width:15%;}
.d14{ float: left; overflow:hidden; width:15%;}
.d12{ float: left; overflow:hidden; width:15%;}
.d10{ float: left; overflow:hidden; width:10%;}
.d5{ float: left; overflow:hidden; width:5%;}
.dclear{ clear:both; }

.c_w5 {width:5px;}
.c_w10 {width:10px;}
.c_w15 {width:15px;}
.c_w20 {width:20px;}
.c_w25 {width:25px;}
.c_w30 {width:30px;}
.c_w40 {width:40px;}
.c_w50 {width:50px;}
.c_w60 {width:60px;}
.c_w70 {width:70px;}
.c_w75 {width:75px;}
.c_w80 {width:80px;}
.c_w85 {width:85px;}
.c_w90 {width:90px;}
.c_w100 {width:100px;}
.c_w115 {width:115px;}
.c_w120 {width:120px;}
.c_w130 {width:130px;}
.c_w140 {width:140px;}
.c_w150 {width:150px;}
.c_w160 {width:160px;}
.c_w170 {width:170px;}
.c_w180 {width:180px;}
.c_w190 {width:190px;}
.c_w200 {width:200px;}
.c_w220 {width:220px;}
.c_w250 {width:250px;}
.c_w255 {width:255px;}
.c_w350 {width:350px;}
.c_w355 {width:355px;}
.c_w400 {width:400px;}
.c_w450 {width:450px;}
.c_w455 {width:455px;}


.ff_times {font-family:'Times New Roman', Times, serif;}
.f8 {font-size:8px; font-weight:normal;}
.f9 {font-size:9px; font-weight:normal;}
.f10 {font-size:10px; font-weight:normal;}
.f11 {font-size:11px; font-weight:normal;}
.f12 {font-size:12px; font-weight:normal;}
.f15 {font-size:15px; font-weight:normal;}
.f16 {font-size:16px; font-weight:normal;}
.f17 {font-size:17px; font-weight:normal;}
.f18 {font-size:18px; font-weight:normal;}
.f19 {font-size:19px; font-weight:normal;}
.f20 {font-size:20px; font-weight:normal;}
.f25 {font-size:25px; font-weight:normal;}
.f30 {font-size:30px; font-weight:normal;}
.f35 {font-size:35px; font-weight:normal;}
.f40 {font-size:40px; font-weight:normal;}
.f45 {font-size:40px; font-weight:normal;}
.f50 {font-size:100px;}
.f100 {font-size:100px;}

.fs_i, fs_i:hover {font-style:italic;}
.fw_n, .fw_n:hover {font-weight:normal;}
.fw_b, fw_b:hover {font-weight:bold;}
            .red{color:red;}
            .green{color:limegreen;}
        </style>
    </head>
    <body>
            <span class="fw_b f18">JOB TASK ANALYSIS WORKSHEET</span>
        
        <br>
        <br>
        <a href="?action=notes" class="red">[!] Click here to refer to help notes</a>
        
        <br>
            <br>
        
       <?php $action = mysql_real_escape_string($_GET['action']); ?> 
<?php if ($action == 'notes') { ?>
        
    <br><span class="red">Notes and References:</span><br><br>
        
        
        <span class="fw_b">HOW TO SETUP</span>
        <br>
        
        <ol>
            <li>
                Clean up the HTML as indicated in the <span class="red">red text</span> on the <a href="?action=view">form here.</a><br><br>
            </li>
            <li>
                Create a new database named <span class="fw_b">bagasoo_simca_itraqs</span>.<br><br>
            </li>
            <li>
                Open, review and edit <a href="jta.sql" class="fw_b">jta.sql</a>. There might be some errors in the database SQL supplied, try to correct them.<br><br>
            </li>
            <li>
                Upload the SQL script to your MySQL server via phpMyAdmin.<br><br>
            </li>
            <li>
                Rename each element in the form to match the corresponding fields names as found in the tables. Example <span class="fw_b">&lt;input name="jta_title" id="jta_title" value="" /&gt;</span><br><br>
            </li>
            <li>
                Edit the file <span class="fw_b">includes/conn.php</span> to match your database connectons<br>
            </li>
            <li>
                Populate and view JTAs in a tabular format as indicated <a href="index.php" class="fw_b">here</a><br>
            </li>
            <li>
                Use the function <span class="fw_b">displayPicker_v2</span> to populate the select boxes from the database tables. How to use the function:
                <br><br>
                &lt;?php 
                    displayPicker_v2($sql_query, $record_id_to_select, $text_field_array, $value_field, $initial_title, true, $voidconn, $title_field_array);
                ?&gt;
                <br><br>
                where
                <br><br>
                <span class="fw_b">sql_query:</span> is the SQL query to load values from the database. Example <span class="green">"SELECT `table_name`.`field0`,  `table_name`.`field1`, `table_name`.`field2`, `table_name`.`field3` FROM `table_name` WHERE 1 AND [more conditions]"</span>,<br>
                <span class="fw_b">$record_id:</span> The record ID marking the selected option in the select box,<br>
                <span class="fw_b">$text_field_array:</span> an array of numbers indicating the field numbers to use when displaying the title of the options,<br>
                <span class="fw_b">$value_field:</span> ,<br>
                <span class="fw_b">$initial_title: </span>The title of the first option in the select box showing the instructions. Example <span class="green">--select specialty--</span>,<br>
                <span class="fw_b">$bool_show_init_title: </span>To show or hide the initial select box option showing the instructions <span class="green">true</span> or <span class="green">false</span>,<br> <span class="fw_b">$voidconn: </span>MySQL database connection resource,<br>
                <span class="fw_b">$title_field_array: </span>This is the field number to use when entering the title property of the select box options.<br><br>
            </li>
            <li>
                Submit the SECTION I of the JTA Form<br><br>
            </li>
            <li>
                Batch processing: Sort out the adding of new HTML using Javascript.<br><br>
            </li>
            <li>
                Batch processing: Submiting batch forms.<br><br>
            </li>
        </ol>
        
        
        <br>
        
        <span class="fw_b">References</span>
        <ul>
            <li>MySQL table Display: <a href="http://blinkwiki.com/?paged=5">http://blinkwiki.com/?paged=5</a></li>
            <li>CRUDing with PHP MySQL <a href="http://blinkwiki.com/?paged=507">Part 1</a> <a href="http://blinkwiki.com/?paged=602">Part 2</a></li>
            <li>Populating a selectbox with PHP/MySQL <a href="http://blinkwiki.com/?p=677">http://blinkwiki.com/?p=677</a></li>
            <li>Deleting records harmlessly: <a href="http://blinkwiki.com/?paged=6">http://blinkwiki.com/?paged=6</a></li>
            <li>Pagination: <a href="http://blinkwiki.com/?p=909">http://blinkwiki.com/?p=909</a></li>
            <li>Show Hide Elements with Javascript : <a href="http://blinkwiki.com/?p=737">http://blinkwiki.com/?p=737</a></li>
        </ul>
        
        
<hr>
        
<?php } else if ($action == 'post') { ?>
        
    <br><span class="red">form processing should be done here...</span><br><br>
        
<?php
if (
    isset($_POST['hd_submit'])
    && $_POST['hd_submit'] == 'frm_submit'
)
{
    // processing form

    // check if the record exists in the table
    // ...
    
    if ($record_exists)
    {
        // update record
        // ...
    }
    else
    {
        // insert new record
        // ...
    }

    // run the sql
    // ...

    // batch process sub tasks
    // ...

    // perform redirection
    // ...

}
?>
        
        
<hr>
        
<?php } else if ($action == 'view') { ?>
        <div style="margin:0 20%;">
            
        <div class="d60">
        <a href="#" name="jta_sectionsx" id="jta_section_2_title" class="fw_b"
           onclick="
                    MultiShowHide('jta_sections', 'hide');
                    ShowHide('jta_section_1', 'show');
        " style="display:;">Section I</a>
        &nbsp;|&nbsp;
        <a href="#" name="jta_sectionsx" id="jta_section_1_title" class="fw_b" 
           onclick="
                    MultiShowHide('jta_sections', 'hide');
                    ShowHide('jta_section_2', 'show');
        ">Section II</a>
        &nbsp;|&nbsp;
        <a href="#" name="jta_sectionsx" id="jta_section_1_title" class="fw_b" 
           onclick="
                    MultiShowHide('jta_sections', 'hide');
                    ShowHide('jta_section_3', 'show');
        ">Section III</a>
        &nbsp;|&nbsp;
        <a href="#" name="jta_sectionsx" id="jta_section_1_title" class="fw_b" 
           onclick="
                    MultiShowHide('jta_sections', 'hide');
                    ShowHide('jta_section_4', 'show');
        ">Section IV</a>
        </div>
        <div class="d40" align="right">
            <input type="submit" class="btn1" value="Save Job Task Analysis" />
            <a href="#" class="btn1">Cancel</a>
        </div>
        <br>
        <hr class="d100 hr_flat">
        
    
    <form name="frm_submit" id="frm_submit" enctype="multipart/form-data" method="post" action="?action=post<?php echo $rid_pair; ?>">
        
        <input type="hidden" name="hd_submit" id="hd_submit" value="frm_submit" />
        <input type="hidden" name="jta_id" id="jta_id" value="<?php echo $rid; ?>" />
        
        <table name="jta_sections" id="jta_section_1"  style="width:100%;">
                <tr>
                    <td width="25%"></td>
                    <td width="25%"></td>
                    <td width="25%"></td>
                    <td width="25%"></td>
                </tr>
            <tr>
            <th colspan="1" align="left">Section I</th>
            <th colspan="3" align="left">Descriptive Information
                        <span name="dev_notes" style="color:red;"><br>[!] extend only the textboxes to full length using the d100 class</span>
                </th>
            </tr>
                <tr>
                    <td>1. Job Task Title<span>*</span></td>
                    <td colspan="3"><input type="text"></td>
                </tr>
                <tr>
                    <td>2. Job Task Number<span>*</span></td>
                    <td colspan="3"><input type="text"><br><br></td>
                </tr>
                <tr>
                    <td>3. Validation Date<span>*</span></td>
                    <td colspan="3"><input type="date"><br><br></td>
                </tr>
                <tr>
                     <td>4. Approval Date<span>*</span></td>
                     <td colspan="3"><input type="date"><br><br></td>
                </tr>
                <tr>
                    <td>5. Comments</td>
                    <td colspan="3"><textarea class="d100" rows="4"></textarea><br></td>
                </tr>
                <tr>
                    <td>6. Job Task Sponsor<span>*</span></td>
                    <td colspan="3"><input type="text"><br></td>
                </tr>
                <tr>
                    <td>7. Job Series and specialty<span>*</span></td>
                    <td>A. Job series: </td>
                    <td colspan="2" align="left"><input type="text"></td>
                    </tr>
                <tr>
                    <td></td>
                    <td>B. Specialty:</td>
                    <td>
            <select>
                <option>Flight Operations </option>
                <option>Airworthiness</option>
                <option>Personnel Licencing</option>
                <option>Aerodromes</option>
                <option>Air Traffic Services </option>
                <option>Aeronautical Telecommunications </option>
                <option>Aeronautical Information Services </option>
                <option>Aeronautical Meteorology</option>
            </select>
                    </td>
                </tr>
                <tr>
                    <td>8. Job Function<span>*</span></td>
                    <td colspan="3">
            <select>
                <option>Cat 1. General and Technical Administrative</option>
                <option>Cat 2A. Air Operations Certification and Authorization(FS)</option>
                <option>Cat 2B. Service Provider Certification and Authorization (Aero & ANS)</option>
                <option>Cat 3A. Airworthiness Certification and Approvals (FS)</option>
                <option>Cat 3B. Special Certification and Approvals (Aero & ANS)</option>
                <option>Cat 4. Personnel Licencing/Competence Assessment Including ATO</option>
                <option>Cat 5. Emerging Technologies Approval </option>
                <option>Cat 6. Specialized Job Tasks </option>
                <option>cat 7. Surveillance</option>
                <option>Cat 8. Resolution of Safety Issues</option>
            </select>
                        </td>
                </tr>
                <tr><td colspan="4"><hr class="hr_flat" /></td></tr>
                <tr>
                    <td>9. Job Task Rating and Ranking<span>*</span></td>
                    <td>A. Difficulty </td>
                    <td colspan="2">
                        <select>
                            <option>Low</option>
                            <option>Moderate</option>
                            <option>High</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
            <td>B. Importance<br>
                <span name="dev_notes" style="color:red;">[!] combine all the fields in this section a selectbox, same as I did with the Difficulty section</span>
                    </td>
            <td>a. Non-Critical:<input type="radio" name="importance" value="Non_critical"></td>
                </tr>
                    <tr>
                        <td></td>
                        <td></td>
            <td>b. Semi-Critical:<input type="radio" name="importance" value="Semi_critical"><br></td>
                        </tr>
                <tr>
                    <td></td>
                    <td></td>
            <td>c. Critical:<input type="radio" name="importance" value="Critical"><br></td>
                </tr>
                <tr valign="top">
                    <td rowspan="2"></td>
                    <td rowspan="2">C. Time to Accomplish<br>
                        <span name="dev_notes" style="color:red;">[!] make all the fields in this section accept only numbers with javascript</span>
                    </td>
                    <td>a. Minutes:<input type="number"></td>
                    <td>c. Days:<input type="number"></td>
                </tr>
                <tr valign="top">
                    <td><label>b. Hours:</label><br><input type="number"></td>
                    <td><label>d. Variable:</label><br><input type="number"></td>
                </tr>
                <tr valign="top">
                    <td></td>
                    <td rowspan="4"><label>D. Frequency of Task</label>
                        <span name="dev_notes" style="color:red;">[!] combine all the fields in this section a selectbox, same as I did with the Difficulty section</span>
                    </td>
            <td>a. Daily:<input type="radio" name="task" value="Daily"></td>
            <td>e. Annually:<input type="radio" name="task" value="Annually"></td>
                    </tr>
                <tr>
                    <td></td>
                    <td>b. weekly:<input type="radio" name="task" value="weekly"></td>
            <td>f. On demand:<input type="radio" name="task" value="On_demand"></td>
                    </tr>
                <tr>
                    <td></td>
                    <td>
            c. Quarterly:<input type="radio" name="task" value="Quarterly"></td>
            <td>g. N/A:<input type="radio" name="task" value="N/A"></td></tr>
                <tr>
                    <td></td>
            <td>d. Semi-annually:<input type="radio" name="task" value="Semi_Annually"></td>
        </tr>

            <tr><td colspan="4"><hr class="hr_flat" />12. Regulatory Requirements</td></tr>
            <tr><td colspan="4"><input class="d100" type="text"></td></tr>
            <tr><td colspan="4">13. Forms</td></tr>
            <tr><td colspan="4"><input class="d100" type="text"></td></tr>
            <tr><td colspan="4">14. Other Guidance</td></tr>
            <tr><td colspan="4"><input class="d100" type="text"></td></tr>
                
            <tr><td colspan="4"><hr></td></tr>
                
        </table>
        
        <table name="jta_sections" id="jta_section_2" style="width:100%; display:none;"> 
            <tr>
            <td colspan="4">  
                <hr class="hr_flat">
        10. Training Courses that provides instruction on this task. May be more than one provider if CAA does not conduct its own training.
                
<span name="dev_notes" style="color:red;"><br>Apply the d100 class to all the textboxes in this section to extend the length as shown in the first row</span>
            </td>
        </tr>
            <tr>
                <th align="left">a. Course Number</th>
                <th align="left">b. Training Provider</th>
                <th colspan="2" align="left">c. Training Location </th>
            </tr>
            <tr>
                <td><input type="text" class="d100"></td>
                <td><input type="text" class="d100"></td>
                <td colspan="2"><input type="text" class="d100"></td>
            </tr>
            <tr>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
            </tr>
        </table>
        
        
        <table name="jta_sections" id="jta_section_3" style="width:100%; display:none;"> 
            <tr>
                <td colspan="4">
                    <hr class="hr_flat">
                    11. ISATS Activity Codes
<span name="dev_notes" style="color:red;"><br>Apply the d100 class to all the textboxes in this section to extend the length as shown in the first row</span>
                </td>
            </tr>
            <tr>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
            </tr>
        </table>

        
        <table name="jta_sections" id="jta_section_4" style="width:100%; display:none;">
            <tr>
                <td width="20%"></td>
                <td width="20%"></td>
                <td width="30%"></td>
                <td width="30%"></td>
            </tr>
            <tr>
                <th colspan="1" align="left">Section II</th>
                <th colspan="3" align="left">
                    Job Task Description and Subtasks
<span name="dev_notes" style="color:red;"><br>Apply the d100 class to all the textboxes in this section to extend the length</span>
                </th>
            </tr>
            <tr>
                <td colspan="1">Job Task Title</td>
                <td colspan="3"><textarea class="d100"></textarea></td>
            </tr>
            
            <tr valign="top" align="left">
                <th>SUBTASK 1</th>
                <td colspan="3"><textarea class="d100"></textarea></td>
            </tr>
            <tr valign="top">
                <td rowspan="3">Objectives/Skills</td>
                <td>Performance:</td>
                <td colspan="2"><textarea class="d100"></textarea></td>
            </tr>
            <tr valign="top">
                <td>Conditions:</td>
                <td colspan="2"><textarea class="d100"></textarea></td>
            </tr>
            <tr valign="top">
                <td>Standards:</td>
                <td colspan="2"><textarea class="d100"></textarea></td>
            </tr>
            <tr valign="top">
                <td>Knowledge:</td>
                <td colspan="3">
                <textarea class="d100"></textarea>
                </td>
            </tr>
            <tr><td colspan="4" align="right">
                <hr>
                <a href="#" class="btn1">Add New Sub Task</a>
                <br><span class="red">[!] This link will be used to add new subtask rows to the already exisiting rows</span>
                </td>
            </tr>
        </table>
        
    </form>
        
        <div>
        
        
        <br><br>
<hr>
        
<?php } else { ?>
        
<span class="red">The table of JTAs should be displayed here</span>
<div>
        <hr>
    
    <table class="adminlist"><thead></thead>
        <tbody>
        <tr class="row1">
            <td>
                <span class="bigform fw_b">Job Task Analysis</span>
                <br>manage office specific Job Task information
            </td>
        </tr>
    </tbody>
    </table>

    <table class="adminlist">
        <thead>
            <tr>
                <th width="5%"><a href="index.php"><span name="t1">home</span></a></th>
                <th align="center" width="80%">*</th>
                <th align="right" width="15%">*</th>
            </tr>
        </thead>
        <tbody>
           <tr></tr>
        </tbody>
    </table>
    
    <table class="adminlist">
    <thead></thead>
        <tbody><tr></tr></tbody>
        <thead>
            <tr class="fw_b">
            	<td width="5%">SN</td>
                <td width="15%"><span class="fw_b">Office</span></td>
                <td width="15%"><span class="fw_b">Job Task Code</span></td>
                <td width="15%"><span class="fw_b">Job Task Title</span></td>
                <td width="30%">Job Task Details</td>
                <td width="5%">Related sub-tasks</td>
                <td width="10%">Action</td>
            </tr>
        </thead>
        <tbody>
            <tr class="row0">
            	<td>1</td>
            	<td>Secretariat, Abuja</td>
                <td>AIR 7.003</td>
                <td> Safety Management System (SMS) Job task No 023</td>
                <td>ITS Job Task #: AIR 1.001 Title:  Employee benefit...</td>
                <td>4</td>
                <td>
                    <a href="?action=view&rid=1">edit</a> &nbsp;
                    <a href="#" class="red">delete</a>
                </td>
            </tr>
            <tr class="row1">
            	<td>2</td>
            	<td>Secretariat, Abuja</td>
                <td>AIR 1.001</td>
                <td>Orientation: Version II</td>
                <td>JTA information details . . .                    </td>
                <td>7</td>
                <td>
                    <a href="?action=view&rid=2">edit</a> &nbsp;
                    <a href="#" class="red">delete</a>
                </td>
            </tr>
        </tbody>
        <tfoot>
    	<tr>
        <td colspan="4">
   				<span class="noprint"><span name="t1"><span class="null_bs">«</span><i title="go to first page" class="fa fa-arrow-circle-left"></i></span> &nbsp;&nbsp;|&nbsp;&nbsp; <span name="t1"><span class="null_bs">&lt;</span><i title="previous page" class="i i-arrow-left2"></i></span> &nbsp;&nbsp;|&nbsp;&nbsp; <span class=""><a href="/simca/itraqs/index.php?option=com_user&amp;view=its_jtas&amp;layout=admin&amp;pageNum_rsQst=0&amp;totalRows_rsQst=2" class="green">0</a>&nbsp;</span>&nbsp;&nbsp;|&nbsp;&nbsp; <span name="t1"><span class="null_bs">&gt;</span><i title="next page" class="i i-arrow-right2"></i></span> &nbsp;&nbsp;|&nbsp;&nbsp; <span name="t1"><span class="null_bs">»</span><i title="go to last page" class="fa fa-arrow-circle-right"></i></span> &nbsp;&nbsp;|&nbsp;&nbsp; 1 <span name="t1">page(s)</span>&nbsp;&nbsp;|&nbsp;&nbsp; 2 <span name="t1">row(s)</span>&nbsp;<select name="totalRows_rsQst" id="totalRows_rsQst" onchange="var pageval = this.options[this.selectedIndex].value;location.href='/simca/itraqs/index.php?pageNum_rsQst=&amp;totalRows_rsQst='+pageval+'&amp;option=com_user&amp;view=its_jtas&amp;layout=admin';"><option value="5">5</option><option value="10">10</option><option value="20">20</option><option value="25">25</option><option value="30">30</option><option value="50">50</option><option value="100">100</option><option value="200">200</option><option value="500">500</option><option value="1000">1000</option></select></span>        </td>
        <td colspan="1">
        <a href="/simca/itraqs/?option=com_user&amp;view=its_jtas&amp;layout=admin&amp;action=createjta">
        	[+] add new office specific JTA
        </a>
        </td></tr>
    </tfoot>
    </table>
    
	<hr>	
	
	<br><br>

	
</div>  
        
        
<?php } ?>
        
        <a href="index.php" class="red">[!] return to home page</a>
        
        <br><br>
Copyright 2017 ASYST Technology Solutions. All rights reserved.
    </body>
</html>