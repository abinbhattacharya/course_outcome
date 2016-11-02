<?php
$page_title='Admin Sign Up';
$css_name='../include/style.css';
$js_name='signup.js';
require_once('../include/header.php');
?>
<form method="post" action="signup_admin.php" id="signup_form">
	<h3 class="txtc">
    	<a href="index.php"><em>Already Registered? Click Here to Login.</em></a>
    </h3>
    <h2 class="txtc">Please enter all the fields carefully</h2>
    <fieldset>
		<legend>Sign Up</legend>
        <div class="insideFS">
           	<p class="error"></p>
      
      
      <label for="username">User Name:</label>
      <input type="text" name="username" id="username" value="" required/>
            <p id="error_username" class="error"></p>

			<label for="password_1">Password:</label>
			<input type="password" name="password_1" id="password_1" minlength="8" required/>
            <p id="error_password_1" class="error"></p>

			<label for="password_2">Retype Password:</label>
			<input type="password" name="password_2" id="password_2" minlength="8" required/>
            <p id="error_password_2" class="error"></p>
      <br/>
      <br/>
      <br/>
			<input type="button" class="button" name="sign_up" id="sign_up" value="SIGN UP" />
       </div>
     </fieldset>
</form>
<?php require_once('../include/footer.php'); ?>