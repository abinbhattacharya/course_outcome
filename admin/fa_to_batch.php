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
<fieldset style="width:60">
       	<legend>FA to Batch</legend>
   		<div class="insideFS">
	<form action="fa_to_batch_2.php" method="post">
	<table style="width=100%" align="center" cellpadding="10">
        <!--<tr>
			<td> Course_Id: </td>
			<td> <input type="text" name="course_id"  size="20" placeholder="Calicut" required><br> </td>
		</tr>-->
        <!-- <tr>
			<td> </td> 
			<td> <input type="text" name="course_name"  size="37" placeholder="Data Structures" required="required" ><br> </td>
		</tr> -->
		<tr>
			<td> Faculty Advisor</td> 
			<td> <select name="fa_name" required >
			                <option selected="selected" value="">Select one</option>
			<?php 
			$queryfac= 'select * from faculty where fa="1"';
			$res=$mysqli->query($queryfac);
			//echo $queryfac;
			for($i=0;$i<$res->num_rows;$i++)
			{
				$row=$res->fetch_row();
				//echo $row[0];
			 echo  "<option value='$row[0]'>".$row[3]."</option>";
			}
			?></select>
	        </td>
		</tr>
		<tr>	
			<td>Programs</td>
			<td>
            <select name="prog" required>
            	<option selected="selected" value="">Select one</option>
            	<option value="B. Tech(CSE)">B. Tech(CSE)</option>
            	<option value="M. Tech(CSE)">M. Tech(CSE)</option>
            	<option value="M. Tech(IS)(CSE)">M. Tech(IS)(CSE)</option>
            	<option value="MCA">MCA</option>
            	<!-- <option value="Architecture">Architecture</option>
                <option value="Chemical Engineering">Chemical Engineering</option>
                <option value="Chemistry">Chemistry</option>
                <option value="Civil Engineering">Civil Engineering</option>
                <option value="Computer Science & Engineering">Computer Science & Engineering</option>
                <option value="Electrical Engineering">Electrical Engineering</option>
                <option value="Electronics & Communication Engineering">Electronics & Communication Engineering</option>
                <option value="Mathematics">Mathematics</option>
                <option value="Mechanical Engineering">Mechanical Engineering</option>
                <option value="Physics">Physics</option>
                <option value="Training Placement">Training Placement</option>
                <option value="Physical Education">Physical Education</option> -->

            </select>
            <input type="hidden" value="valid" name="valid"/>
            </td>
		</tr>
		<tr>
		<td> Year</td>
		<td>
		<select name="year" required>0
			<option value="<?php $date=getdate();echo $date["year"]?>"><?php $date=getdate();echo $date["year"]?></option>

			<option value="<?php $date=getdate();echo $date["year"]+1?>"><?php $date=getdate();echo $date["year"]+1?></option>
			
			<option value="<?php $date=getdate();echo $date["year"]+2?>"><?php $date=getdate();echo $date["year"]+2?></option>
			
			<option value="<?php $date=getdate();echo $date["year"]+3?>"><?php $date=getdate();echo $date["year"]+3?></option>
			
			<option value="<?php $date=getdate();echo $date["year"]+4?>"><?php $date=getdate();echo $date["year"]+4?></option>
		
		</select></td>
		<td></td>
		</tr>
		<tr>	
			<td colspan="2"> <input type="submit" onclick="" value="Assign FA" class="button"> </td>
		</tr>

	</table>
</form>
</div>
</fieldset>
<?php require_once('../include/footer.php');?>