<?php
$page_title='Faculty Homepage ';
$last_login='';
$js_name='';
$css_name='../include/style.css';
require_once('../include/header.php');
require_once('start_session.php');
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
	//$stream_name=$_SESSION['a_stream_name'];
	//$page_title=$stream_name;
	//$last_login='Last Login Time: '.$_SESSION['a_login'];
	
	?>
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
		<h2>
        <br/><br/><br/><br/><br/>
       <li class="menubar"><a href="add_course.php" >&raquo;Add Course</a></li>
        <br/><br/>
        <li class="menubar"><a href="edit_course.php">&raquo;Edit Course</a></li>
        <br/><br/>
	   <li class="menubar"><a href="remove_course.php">&raquo;Remove Course</a></li>
		<!--<br/><br/>
        <li class="menubar"><a href="remove_student.php">&raquo;Remove a Student</a></li>
		<br/><br/>
        <li class="menubar"><a href="validate_cs_1.php">&raquo;Validate Credit Sheet(s)</a></li>-->
        </h2>
	 </ul>
	</div> 
<?php
}
require_once('../include/footer.php');
?>