<?php
$page_title='Add Test Paper';
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

if(!isset($_POST['valid_test']))
	{
		$home_url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/add_test.php';
        header('Location: '.$home_url);
		exit;
	}
   	
   	$course_name=$mysqli->real_escape_string(trim($_POST['course_name']));
	$test_name=$mysqli->real_escape_string(trim($_POST['test_name']));

	$marks=$mysqli->real_escape_string(trim($_POST['marks']));
	
	$number_ques=$mysqli->real_escape_string(trim($_POST['number_ques']));

	$query_1="insert into test(marks,course_id,name) values('$marks','$course_name','$test_name')";

	$mysqli->query($query_1);

	if($mysqli->affected_rows==1)
	{
			$query_2=" select course_obejective.co_id,co_detail from course_objective,course_co where course_objective.co_id = course_co.co_id and course_co.course_id = '$course_name'";

			$result=$mysqli->query($query_2);

			$number_co=$result->num_rows;
?>
			<form name="add_test_2" action="add_test_3.php" method="post">
        <input type="hidden" name="course_name" value='<?php echo $course_name?>'>
		<table width="50%" border="1" align="center" cellspacing="0" cellpadding="10">
				<tr><!--Header Row-->
                	<th scope="col">Question No.</th>
    				<th scope="col">Course Objective</th>
    				<th scope="col">Marks</th>
				</tr>
<?php

for($i=1; $i<=$number; $i++)
	{
		echo '<tr><td><input type="text" q_no="q_no['.$i.']"></td>
		<td><input type="real" name="marks['.$i.']"></td></tr>';

		//For CO dropdown
		echo '<td><select name=co['.$i.']>';

		for($j=1;$j<=$number_co;$j++)
		{
			$row=$result->fetch_row();

			echo "<option value='$row[0]'>".$row[1]."</option>";
		}

	}

?>
<tr><td colspan="2"><input type="submit" name="Add Students" class="button"></td></tr>
<?php
require_once('../include/footer.php');
?>


	}




 require_once('../include/footer.php');
 }
 ?>
