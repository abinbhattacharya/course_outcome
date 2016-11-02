<?php
require_once('start_session.php');
require_once('../include/db_connect.php');
$page_title='Assign FA to Batch';
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
	
	require_once('../include/header.php');
	?>
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


	$fa_name=$mysqli->real_escape_string(trim($_POST['fa_name']));
	// $faculty_name=$mysqli->real_escape_string(trim($_POST['faculty_name']));
	$prog=$mysqli->real_escape_string(trim($_POST['prog']));
	$year=$mysqli->real_escape_string(trim($_POST['year']));

	$prog_year=$prog." ".$year;
	$query_1="insert into fa_batch values('$fa_name','$prog_year');";

	$mysqli->query($query_1);

	if($mysqli->affected_rows==1)
	{
		echo '<h1 class="txtc">FA assigned succesfully.</h1>';
	}

	else
	{
		echo '<h1 class="txtc">There was a problem. Try again later.</h1>';
	}
	echo '<h2 class="txtc"><a href="fa_to_batch.php">Click here</a> to assign another FA</h2>';


 require_once('../include/footer.php');?>