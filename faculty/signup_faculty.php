<?php
	require_once('start_session.php');
	require_once('../include/db_connect.php');
	$page_title='Faculty Sign Up';
	$css_name='../include/style.css';
	require_once('../include/header.php');
	$error='';
	//$last_login='';
	//print_r($_POST);
	//$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Server Error. If problem persists, contact the administrator.');
	$username='';
	$name=$_POST["name"];
	$dept=$_POST["dept"];
	$fa=$_POST["fa"];

	// echo $name.$dept.$fa;
	$password_1=$mysqli->real_escape_string(trim($_POST['password_1']));
	$password_2=$mysqli->real_escape_string(trim($_POST['password_2']));
	$password_encrypted=sha1($password_1);
	//echo $password_1;
	//echo $password_encrypted;
	//echo $username;
	//echo $fa;

	//$js_name='../JavaScript/signup.js';
	//echo "Before admin id if";
	if(isset($_SESSION['faculty_username']))
	{	
		//echo "Inside admin id if";
		$home_url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/homepage.php';
        header('Location: '.$home_url);
		exit;
	}
	if(strlen($password_1)<8)
	{
		//echo "Inside password if";
		//echo $password_1;
		$error='<h1 class="error">Password is too short.<br/><br/>
			<a href="signup.php">Click here to register again.</a><br/></h1>';
	}
	else
	{
		//echo "Inside password else";
		if(isset($_POST['username']))
		{	
			//echo "Inside main if";
			
			$username=$mysqli->real_escape_string(trim($_POST['username']));
			$query_1="Select * from faculty where username='$username'";
			$sql_result_1=$mysqli->query($query_1);
			if($sql_result_1->num_rows==1)
			{
				$error='<h1 class="error"> This username is already registered. Please try a different username.<br/><br/>
				<a href="signup.php">Click here to register again.</a><br/></h1>';
				$sql_result_1->free();
				//echo "Inside if";

			
			}
		
			else
			{
				//echo "Inside else";				
				$query_2="insert into faculty values('$username','$dept','$password_encrypted','$name','$fa')";
				//echo $query_2;

				$mysqli->query($query_2);
				if($mysqli->affected_rows==1)
				{
					$_SESSION['faculty_username'] = $username;
					setcookie('faculty_username', $username, time() + (60*60*2));
					$home_url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/homepage.php';
					header('Location: '.$home_url);
					exit;
				}
				$mysqli->close();
			}
			;
		}
	}
	echo "$error";
	require_once('../include/footer.php'); 
?>