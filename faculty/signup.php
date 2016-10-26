<?php
$page_title='Faculty Sign Up';
$css_name='../include/style.css';
$js_name='signup.js';
require_once('../include/header.php');
?>
<form method="post" action="signup_faculty.php" id="signup_form">
	<h3 class="txtc">
    	<a href="index.php"><em>Already Registered? Click Here to Login.</em></a>
    </h3>
    <h2 class="txtc">Please enter all the fields carefully</h2>
    <fieldset>
		<legend>Sign Up</legend>
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
			<input type="button" class="button" name="sign_up" id="sign_up" value="SIGN UP" />
       </div>
     </fieldset>
</form>
<?php require_once('../include/footer.php'); ?>