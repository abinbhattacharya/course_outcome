<?php
require_once('start_session.php');
$page_title='Edit Course';
	$last_login='';
	$js_name='';
	$css_name='../include/style.css';
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
	
	require_once('../include/header.php');
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
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <fieldset style="width:60">
       	<legend>Edit Course</legend>
   		<div class="insideFS">
	<form action=".php" method="post">
	<table style="width=100%" align="center" cellpadding="10">
        <!--<tr>
			<td> Course_Id: </td>
			<td> <input type="text" name="course_id"  size="20" placeholder="Calicut" required><br> </td>
		</tr>-->
        <!--<tr>
			<td> Course Name</td> 
			<td> <input type="text" name="course_name"  size="37" placeholder="Data Structures" ><br> </td>
		</tr>
		<tr>
			<td> Faculty</td> 
			<td> <select name="faculty_name" required >
			    <option selected="selected" value="">Select one</option>
	        </td>
		</tr>-->
		<tr>	
			<td> Select Course </td>
			<td>
            <select name="dept" required>
            	<option selected="selected" value="">Select one</option>
            	

            </select>
            <input type="hidden" value="search" name="search"/>
            </td>
		</tr>

		<tr>	
			<td colspan="2"> <input type="submit" onclick="" value="Edit Course" class="button"> </td>
		</tr>

	</table>
</form>
</div>
</fieldset>

<?php require_once('../include/footer.php');?>