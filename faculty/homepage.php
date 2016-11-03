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
        <br/><br/><br/><br/><br/>
        <h3>
        <?php
        if($_SESSION['fa']==1)
        {
        	?>
        <fieldset>
		<legend>Faculty Advisor</legend>
        <div class="insideFS">
        <br/>
       <li class="menubar"><a href="add_student.php" >&raquo;Add Student</a></li>
        <br/><br/>
        <li class="menubar"><a href="faculty_course.php">&raquo;Assign Faculty to Course</a></li>
        <br/><br/>
	   <li class="menubar"><a href=".php">&raquo;View Batch Course Objective Attainment</a></li>
	   </div>
     </fieldset>
	   <?php
		}
		?>
		<br/><br/><br/><br/>
		<fieldset>
		<legend>Faculty</legend>
        <div class="insideFS">
        <br/>
        <li class="menubar"><a href="add_co.php">&raquo;Add Course Objective</a></li>
		<br/><br/>
        <li class="menubar"><a href="add_test.php">&raquo;Add Question Paper Details</a></li>
        <br/><br/>
        <li class="menubar"><a href="enter_marks.php">&raquo;Enter Marks</a></li>
        <br/><br/>
        <li class="menubar"><a href=".php">&raquo;View Course Objective Attainment</a></li>
        </h3>
     	</div>
     	</fieldset>
	 </ul>
	</div> 
<?php
}
require_once('../include/footer.php');
?>