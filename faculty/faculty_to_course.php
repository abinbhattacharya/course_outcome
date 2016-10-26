<?php
require_once('start_session.php');
$page_title='Blood Donor Validation';
	$last_login='';
	$js_name='';
	$css_name='../CommonFiles/style.css';
if(!isset($_SESSION['admin_id']))
{
	require_once('../CommonFiles/header.php');
	?>
    <div id="msg_container">
    	<div id="msg_box">
			<p>Please <a href="index.php">LOG IN</a> to access this page.</p>
        </div>
    </div>
	<?php require_once('../CommonFiles/footer.php');
	exit;
}
	
	require_once('../CommonFiles/header.php');
	?>
    <div id="menubar1" class="txtl">
		<ul class="menubar"><li><h3>&nbsp;&nbsp;Welcome, <?php echo $_SESSION['admin_id']; ?>&nbsp;&nbsp;</h3></li></ul>
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
       	<legend>Search for Donors to Validate</legend>
   		<div class="insideFS">
	<form action="validate_donor_2.php" method="post">
	<table style="width=100%" align="center" cellpadding="10">
        <!--<tr>
			<td> City: </td>
			<td> <input type="text" name="city"  size="20" placeholder="Calicut" required><br> </td>
		</tr>
        <tr>
			<td> Pincode:<br/>(optional) </td> 
			<td> <input type="text" name="pincode"  size="20" placeholder="673601" pattern="[0-9]{6}"><br> </td>
		</tr>-->
		<tr>	
			<td>Blood Group:</td>
			<td>
            <select name="bg" required>
            	<option selected="selected" value="">Select one</option>
            	<option value="a_negative">A-</option>
                <option value="a_positive">A+</option>
                <option value="b_negative">B-</option>
                <option value="b_positive">B+</option>
                <option value="o_negative">O-</option>
                <option value="o_positive">O+</option>
                <option value="ab_negative">AB-</option>
                <option value="ab_positive">AB+</option>
            </select>
            <input type="hidden" value="valid" name="valid"/>
            </td>
		</tr>
		<tr>	
			<td colspan="2"> <input type="submit" onclick="" value="Search" class="button"> </td>
		</tr>
	</table>
</form>
</div>
</fieldset>
<?php require_once('../CommonFiles/footer.php');?>