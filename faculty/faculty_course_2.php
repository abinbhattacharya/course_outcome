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

	
<?php

if(!isset($_POST['valid']))
	{
		$home_url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/faculty_course.php';
        header('Location: '.$home_url);
		exit;
	}
?>
<?php

//print_r($_POST);
$faculty=$_POST['faculty'];
$course=$_POST['course'];
$fa=$_SESSION['faculty_username'];
$query_1="insert into faculty_course values('$faculty', '$course', '$fa')";
//echo $query_1;
$result=$mysqli->query($query_1);
//echo "<br><br><br><br><br><br><br><br>";
 //echo $result;
echo "<br/><br/><br/><br/><br/><br/>";
 if($mysqli->affected_rows==1)
		{
			echo '<h1 class="txtc">Faculty assigned succesfully.</h1>';
		}

		else
		{
			echo '<h1 class="txtc">There was a problem. Try again later.</h1>';
		}
	}
// echo $res;
//echo "<h1 class='txtc'>".$success." student(s) were added successfully.</h1>";
//echo '<h1 class="txtc"><a href="homepage.php">Click here</a> to go back to homepage.</h1>';
	echo '<h2 class="txtc"><a href="faculty_course.php">Click here</a> to assign another faculty to a course.</h2>';

require_once('../include/footer.php');
?>