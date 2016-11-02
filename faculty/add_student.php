<?php
$page_title='Add Students';
$last_login='';
$js_name='';
$css_name='../include/style.css';
require_once('../include/header.php');
require_once('start_session.php');
require_once('../include/db_connect.php');
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
else
{
	if($_SESSION['fa']==0)
	{
		require_once('../include/header.php');
	?>
    <div id="msg_container">
    	<div id="msg_box">
			<p>You are not authorized to access this page. Please <a href="index.php">click here</a> to go to your homepage. </p>
        </div>
    </div>
	<?php require_once('../include/footer.php');
	exit;
	}?>

	<div id="menubar1" class="txtl">
		<ul class="menubar"><li><h3>&nbsp;&nbsp;Welcome, <?php echo $_SESSION['faculty_username']; ?>&nbsp;&nbsp;</h3></li></ul>
	</div>
	<div id="menubar2" class="txtr">
		<ul class="menubar">
			<li><h3 style="display:inline;"><a href="homepage.php">Home</a></h3></li>
			<li><h3 style="display:inline;"><a href="logout.php">&nbsp;Log Out</a></li></h3>

		</ul>
	</div>

	<div class="txtc">
    <ul class="menubar">
    <br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
    <fieldset style="width:60">
       	<legend>Add Student</legend>
   		<div class="insideFS">
	<form action="add_student_2.php" method="post">
	<table style="width=100%" align="center" cellpadding="10">
        <!--<tr>
			<td> Course_Id: </td>
			<td> <input type="text" name="course_id"  size="20" placeholder="Calicut" required><br> </td>
		</tr>-->
       
		<!-- <tr>
			<td> Faculty</td> 
			<td> <select name="faculty_name" required >
			                <option selected="selected" value="">Select one</option>
			<?php 
			//$queryfac= 'select * from faculty';
			////$res=$mysqli->query($queryfac);
			//echo $queryfac;
			//for($i=0;$i<$res->num_rows;$i++)
			{
				//$row=$res->fetch_row();
				//echo $row[0];
			// echo  "<option value='$row[0]'>".$row[3]."</option>";
			}
			?></select>
	        </td>
		</tr>
		<tr> -->
		<tr>	
			<td>Select Batch</td>
			<td>
            <select name="program_year" required>
            	<option selected="selected" value="">Select one</option>
            	<?php 
			$queryfac= "Select program_year from fa_batch where fa_id='".$_SESSION['faculty_username']."'";
			$res=$mysqli->query($queryfac);
			echo $queryfac;
			for($i=0;$i<$res->num_rows;$i++)
			{
				$row=$res->fetch_row();
				//echo $row[0];
			 echo  "<option value='$row[0]'>".$row[0]."</option>";
			}
			?>

            </select>
            <input type="hidden" value="valid" name="valid"/>
            </td>
		
		 <tr>
			<td> Number of Students</td> 
			<td> <input type="number" name="number"  size="20" placeholder="00" required="required" ><br> </td>
		</tr>

		<tr>	
			<td colspan="2"> <input type="submit" onclick="" value="Add Students" class="button"> </td>
		</tr>
        

	</table>

</form>
</div>
</fieldset>
<?php
}
require_once('../include/footer.php');
?>