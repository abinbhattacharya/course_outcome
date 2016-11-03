<?php
require_once('start_session.php');
require_once('../include/db_connect.php');
$page_title='Add Test Paper';
	$last_login='';
	$js_name='';
	$css_name='../include/style.css';
if(!isset($_SESSION['faculty_username']))
{
	require_once('../include/header.php');
	?>
    <div id="msg_container">
    	<div id="msg_box">
			<p>Please <a href="index.php">LOG IN</a> to access this page.</p>
        </div>
    </div>
	<?php require_once('../include/footer.php');
	exit;
}
	
	require_once('../include/header.php');
	?>
    <div id="menubar1" class="txtl">
		<ul class="menubar"><li><h3>&nbsp;&nbsp;Welcome, <?php echo $_SESSION['faculty_username']; ?>&nbsp;&nbsp;</h3></li></ul>
	</div>
	<div id="menubar2" class="txtr">
		<ul class="menubar">
			<li><h3 style="display:inline;"><a href="homepage.php">Home</a></h3></li>
			<li><h3 style="display:inline;"><a href="logout.php">&nbsp;Log Out</a></li></h3>
		</ul>
	</div>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <fieldset style="width:60">
       	<legend>Add Course Objective</legend>
   		<div class="insideFS">
	<form action="add_test_2.php" method="post">
	<table style="width=100%" align="center" cellpadding="10">
        <!--<tr>
			<td> Course_Id: </td>
			<td> <input type="text" name="course_id"  size="20" placeholder="Calicut" required><br> </td>
		</tr>-->
        
		<tr>
			<td>Course</td> 
			<td> <select name="course_name" required >
			                <option selected="selected" value="">Select one</option>
			<?php 
			$queryfac= 'select course_id,course_name,f_id from course,faculty_course where course_id=c_id and f_id="'.$_SESSION['faculty_username'].'"';
			//echo $queryfac;
			$res=$mysqli->query($queryfac);
			//echo $queryfac;
			for($i=0;$i<$res->num_rows;$i++)
			{
				$row=$res->fetch_row();
				//echo $row[0];
			 echo  '<option value="'.$row[0].'">'.$row[1].'</option>';
			// echo $row;
			}
			?></select>
	        </td>
		</tr>
		<tr>
		   <td>Test Name</td>
		   <td><input type="text" name="test_name"  size="37" placeholder="Test 1" required="required" ><br> </td>
		</tr>
		
		<tr>
		   <td>Marks</td>
		   <td><input type="number" name="marks"  size="37" placeholder="00" required="required" ><br> </td>
		</tr>

		<tr>
		   <td>No Of Questions</td>
		   <td><input type="number" name="number_ques"  size="37" placeholder="00" required="required" ><br> </td>
		</tr>
		

            
            <input type="hidden" value="valid" name="valid_test"/>
            </td>
		</tr>

		<tr>	
			<td colspan="2"> <input type="submit" onclick="" value="Proceed" class="button"> </td>
		</tr>

	</table>
</form>
</div>
</fieldset>
<?php require_once('../include/footer.php');?>