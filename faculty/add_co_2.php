<?php
$page_title='Add Course Objective';
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

if(!isset($_POST['valid_co']))
	{
		$home_url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/add_co.php';
        header('Location: '.$home_url);
		exit;
	}

	$course_name=$mysqli->real_escape_string(trim($_POST['course_name']));
	$co_details=$mysqli->real_escape_string(trim($_POST['co_details']));

	$query_1="insert into course_objective(co_detail) values('$co_details');";

	$mysqli->query($query_1);

	if($mysqli->affected_rows==1)
	{
		$query_2="select co_id from course_objective where co_detail='$co_details' order by co_id desc limit 1";

		$result=$mysqli->query($query_2);

		$row=$result->fetch_row();


		$co_id=$row[0];

		$query_3="insert into course_co(course_id,co_id) values('$course_name','$co_id')";

		$mysqli->query($query_3);

		if($mysqli->affected_rows==1)
		{
			echo '<h1 class="txtc">Course Objective entered succesfully.</h1>';
		}

		else
		{
			echo '<h1 class="txtc">There was a problem. Try again later.</h1>';
		}
	}

	
else
	{
		echo '<h1 class="txtc">There was a problem. Try again later.</h1>';
	}
	echo '<h2 class="txtc"><a href="add_co.php">Click here</a> to add another course objective</h2>';


 require_once('../include/footer.php');
 }
 ?>
