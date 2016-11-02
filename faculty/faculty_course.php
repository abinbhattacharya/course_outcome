<?php
$page_title='Assign Faculty to Course';
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
       	<legend>Assign Faculty To Course</legend>
   		<div class="insideFS">
	<form action="faculty_course_2.php" method="post">
	<table style="width=100%" align="center" cellpadding="10">
	<tr>	
			<td>Select Faculty</td>
			<td>
            <select name="faculty" required>
            	<option selected="selected" value="">Select one</option>
            	<?php 
			$queryfac= "Select * from faculty ";
			$res=$mysqli->query($queryfac);
			echo $queryfac;
			for($i=0;$i<$res->num_rows;$i++)
			{
				$row=$res->fetch_row();
				//echo $row[0];
			 echo  "<option value='$row[0]'>".$row[3]."</option>";
			}
			?>

            </select>
            
            </td>
		<tr>
            <td>Select Course</td>
			<td>
            <select name="course" required>
            	<option selected="selected" value="">Select one</option>
            	<?php 
			$queryfac= "Select * from course";
			$res=$mysqli->query($queryfac);
			echo $queryfac;
			for($i=0;$i<$res->num_rows;$i++)
			{
				$row=$res->fetch_row();
				//echo $row[0];
			 echo  "<option value='$row[0]'>".$row[1]."</option>";
			}
			?>

            </select>
            <input type="hidden" value="valid" name="valid"/>
            </td>

       <tr>	
			<td colspan="2"> <input type="submit" onclick="" value="Assign Faculty" class="button"> </td>
		</tr>
        

	</table>

</form>
</div>
</fieldset>
   

<?php
}
require_once('../include/footer.php');
?>