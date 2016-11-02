<?php
$page_title='Faculty Sign Up';
$css_name='../include/style.css';
$js_name='add_faculty.js';
require_once('../include/header.php');
require_once('start_session.php');

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
else
{
  //$stream_name=$_SESSION['a_stream_name'];
  //$page_title=$stream_name;
  //$last_login='Last Login Time: '.$_SESSION['a_login'];
  
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
<form method="post" action="add_faculty_2.php" id="add_faculty">
<!-- 	<h3 class="txtc">
    	<a href="index.php"><em>Already Registered? Click Here to Login.</em></a>
    </h3> -->
    <h2 class="txtc">Please enter all the fields carefully</h2>
    <fieldset>
		<legend>Add Faculty</legend>
        <div class="insideFS">
           	<p class="error"></p>
      
      <label for="name">Name:</label>
			     <input type="text" name="name" id="name" value="" required/>

			     <br/>

      <label for="dept">Department:</label>
            <select name="dept" required>
                
                <option selected="selected" value="">Select one</option>
                <option value="Architecture">Architecture</option>
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
                <option value="Physical Education">Physical Education</option>

            </select>

      <label for="username">User Name:</label>
      <input type="text" name="username" id="username" value="" required/>
            <p id="error_username" class="error"></p>

			<label for="password_1">Password:</label>
			<input type="password" name="password_1" id="password_1" minlength="8" required/>
            <p id="error_password_1" class="error"></p>

			<label for="password_2">Retype Password:</label>
			<input type="password" name="password_2" id="password_2" minlength="8" required/>
            <p id="error_password_2" class="error"></p>
            
      <label for="fa">Faculty Advisor?</label>
      <input type="radio" name="fa" value="1" required/>Yes
      <input type="radio" name="fa" value="0" required checked/>No
      <br/>
      <br/>
      <br/>
			<input type="button" class="button" name="sign_up" id="sign_up" value="ADD FACULTY" />
      <input type="hidden" value="valid" name="valid"/>
       </div>
     </fieldset>
</form>
<?php require_once('../include/footer.php');
} ?>