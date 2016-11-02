<?php
$page_title='Add Students ';
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
<?php

if(!isset($_POST['valid']))
	{
		$home_url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/add_course.php';
        header('Location: '.$home_url);
		exit;
	}

	$program_year=$_POST['program_year'];
	$number=$_POST['number'];

	echo '<br/><br/><h1 class="txtc">'.$program_year.'</h1>';
?>

<form name="add_students_2" action="add_students_3.php" method="post">
        <input type="hidden" name="program_year" value='<?php echo $program_year?>'>
		<table width="50%" border="1" align="center" cellspacing="0" cellpadding="10">
				<tr><!--Header Row-->
                	<th scope="col">Name</th>
    				<th scope="col">Roll No.</th>
				</tr>
<?php

for($i=1; $i<=$number; $i++)
	{
		echo '<tr><td><input type="text" name="name['.$i.']"></td>
		<td><input type="text" name="roll['.$i.']"></td></tr>';
	}
}
?>
<tr><td colspan="2"><input type="submit" name="Add Students" class="button"></td></tr>
<?php
require_once('../include/footer.php');
?>