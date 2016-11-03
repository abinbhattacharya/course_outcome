<?php
$page_title='Enter Test Marks';
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
{?>
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
<?php

if(!isset($_POST['valid_marks']))
	{
		$home_url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/add_test.php';
        header('Location: '.$home_url);
		exit;
	}


	//POST Vars

	$course_name=$mysqli->real_escape_string(trim($_POST['course_name']));
	?>
	<fieldset style="width:60">
       	<legend>Enter Test Marks</legend>
   		<div class="insideFS">
	<form action="enter_marks_2.php" method="post">
	<table style="width=100%" align="center" cellpadding="10">
        <!--<tr>
			<td> Course_Id: </td>
			<td> <input type="text" name="course_id"  size="20" placeholder="Calicut" required><br> </td>
		</tr>-->
        
		<tr>
			<td>Test</td> 
			<td> <select name="test_name" required >
			                <option selected="selected" value="">Select one</option>
			<?php 
			$query_test="select test.name, test.test_id, test.course_id, course.course_id, course.course_name, faculty_course.f_id, faculty_course.c_id from test, course, faculty_course where course.course_id=test.course_id and test.course_id=faculty_course.c_id and course.course_id='$course_name' and faculty_course.f_id='".$_SESSION['faculty_username']."'" ;
			echo $query_test;
			$res=$mysqli->query($query_test);
			//echo $queryfac;
			for($i=0;$i<$res->num_rows;$i++)
			{
				$row=$res->fetch_row();
				//echo $row[0];
			 echo  '<option value="'.$row[1].'">'.$row[0].'</option>';
			// echo $row;
			}
			?></select>
	        </td>
		</tr>            
            <input type="hidden" value="valid" name="valid_marks_2"/>
            </td>
		</tr>

		<tr>	
			<td colspan="2"> <input type="submit" onclick="" value="Proceed" class="button"> </td>
		</tr>

	</table>
</form>
</div>
</fieldset>

<?php
}
 require_once('../include/footer.php');?>