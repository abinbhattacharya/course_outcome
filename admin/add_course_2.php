<?php
require_once('start_session.php');
require_once('../include/db_connect.php');
$page_title='Add Course';
	$last_login='';
	$js_name='';
	$css_name='../include/style.css';
if(!isset($_SESSION['admin_username']))
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
	
	require_once('../include/header.php');?>
	<div id="menubar1" class="txtl">
		<ul class="menubar"><li><h3>&nbsp;&nbsp;Welcome, <?php echo $_SESSION['admin_username']; ?>&nbsp;&nbsp;</h3></li></ul>
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

	
<?php
	if(!isset($_POST['valid']))
	{
		$home_url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/add_course.php';
        header('Location: '.$home_url);
		exit;
	}


	$course_name=$mysqli->real_escape_string(trim($_POST['course_name']));
	// $faculty_name=$mysqli->real_escape_string(trim($_POST['faculty_name']));
	$dept=$mysqli->real_escape_string(trim($_POST['dept']));

	// echo $faculty_name;

	
	$query_1="insert into course(course_name,dept) values('$course_name','$dept')";
	// echo $query_1;
	$mysqli->query($query_1);

	if($mysqli->affected_rows==1)
	{
		echo '<h1 class="txtc">Course entered succesfully.</h1>';
		// $query_2="select course_id from course where course_name='$course_name' order by course_id desc limit 1";
		// $result=$mysqli->query($query_2);


		// $row=$result->fetch_row();

		// // echo $row[0];
		// $course_id=$row[0];
		// // echo $course_id;

		// $query_3="insert into faculty_course values('$faculty_name','$course_id','$_SESSION[faculty_username]')";
		// // echo $query_3;

		// $mysqli->query($query_3);

		// if($mysqli->affected_rows==1)
		// {
		// 	echo '<h1 class="txtc">Course entered succesfully.</h1>';
		// }

		// else
		// {
		// 	echo '<h1 class="txtc">There was a problem. Try again later. Inside</h1>';
		// }
	}

else
	{
		echo '<h1 class="txtc">There was a problem. Try again later.</h1>';
	}
	echo '<h2 class="txtc"><a href="add_course.php">Click here</a> to add another course</h2>';


 require_once('../include/footer.php');?>