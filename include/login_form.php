<form method="post" action="index.php" id="login_form">
	<h3 class="txtc">
    	<a href="signup.php"><em>New Users: Click Here to Register.</em></a>
    </h3>
    <fieldset>
       	<legend>Log In</legend>
   		<div class="insideFS">
           	<p class="error"><?php echo $error; ?></p>
           	<label for="username">Username:</label>
   			<input type="text" name="username" id="username" minlength="5" required/><br />
           	<p class="error" id="error_username"></p>
			<label for="password_1">Password:</label>
			<input type="password" name="password_1" id="password_1" minlength="8" required />
			<p class="error" id="error_password"></p>
           	<input type="submit" onclick="" value="Log In" class="button">
    	</div>
	</fieldset>
</form>