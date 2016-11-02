<?php
$page_title='Add Student';
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

if(!isset($_POST['program_year']))
	{
		$home_url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/add_course.php';
        header('Location: '.$home_url);
		exit;
	}
?>
<?php

//print_r($_POST);
$name=$_POST['name'];
$roll=$_POST['roll'];
$list="insert into student(name,roll,program_year) values";

$success=0;
for($i=1;$i<=count($name);$i++)
{
   if(isset($name[$i]) && isset($roll[$i]) && $i!=count($name))
   {
   	$list.="('".$name[$i]."','".$roll[$i]."','".$_POST['program_year']."'),";
   	$success++;
   }
   else if(isset($name[$i]) && isset($roll[$i]) && $i==count($name))
   {
   	$list.="('".$name[$i]."','".$roll[$i]."','".$_POST['program_year']."')";
   	$success++;
   }
   else
   {
   	continue;
   }
}
$res=$mysqli->query($list);
echo "<br><br><br><br><br><br><br><br>";
// echo $list;
// echo $res;
echo "<h1 class='txtc'>".$success." student(s) were added successfully.</h1>";
echo '<h1 class="txtc"><a href="homepage.php">Click here</a> to go back to homepage.</h1>';

}
require_once('../include/footer.php');
?>