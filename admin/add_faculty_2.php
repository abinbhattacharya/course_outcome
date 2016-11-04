<?php
	require_once('start_session.php');
	require_once('../include/db_connect.php');
	$page_title='Faculty Sign Up';
	$css_name='../include/style.css';
	require_once('start_session.php');
	require_once "PHPMailer/PHPMailerAutoload.php";
	
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

	//$stream_name=$_SESSION['a_stream_name'];
	//$page_title=$stream_name;
	//$last_login='Last Login Time: '.$_SESSION['a_login'];
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
		<?php

	if(!isset($_POST['valid']))
	{
		$home_url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/add_course.php';
        header('Location: '.$home_url);
		exit;
	}
	$error='';
	//$last_login='';
	//print_r($_POST);
	//$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Server Error. If problem persists, contact the administrator.');

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
	// if(isset($_SESSION['faculty_username']))
	// {	
	// 	//echo "Inside admin id if";
	// 	$home_url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/homepage.php';
 //        header('Location: '.$home_url);
	// 	exit;
	// }
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
			$username='';
			$name=$_POST["name"];
			$dept=$_POST["dept"];
			$fa=$_POST["fa"];
			$username=$mysqli->real_escape_string(trim($_POST['username']));
			$query_1="Select * from faculty where username='$username'";
			$sql_result_1=$mysqli->query($query_1);
			if($sql_result_1->num_rows==1)
			{
				$error='<br/><br/><br/><br/><h1 class="error"> This username is already registered. Please try a different username.<br/><br/>
				<a href="add_faculty.php">Click here to register faculty again.</a><br/></h1>';
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
					echo '<br/><br/><br/><br/><h1 class="txtc">Course entered succesfully.</h1>';
					$mail = new PHPMailer;

					//Enable SMTP debugging.
					$mail->SMTPDebug = -3;
					//Set PHPMailer to use SMTP.
					$mail->isSMTP();
					//Set SMTP host name
					$mail->Host = "smtp.gmail.com";
					//Set this to true if SMTP host requires authentication to send email
					$mail->SMTPAuth = true;
					//Provide username and password
					$mail->Username = "bloodbank247365@gmail.com";
					$mail->Password = "bloodbank123";
					//If SMTP requires TLS encryption then set it
					$mail->SMTPSecure = "tls";
					//Set TCP port to connect to
					$mail->Port = 587;

					$mail->From = "bloodbank@gmail.com";
					$mail->FromName = "bloodbank";
					$em=$_POST["email"];
					
					
					$name=$_POST["username"];
					
					$mail->addAddress("$em","$name");

					$mail->isHTML(true);

					$mail->Subject = "Signed Up";
					$mail->Body = "<i>Your Username is $username and password is $password_1</i>";
					$mail->AltBody = "This is the plain text version of the email conten";

					if(!$mail->send())
					{
					    echo "Mailer Error: " . $mail->ErrorInfo;
					}
					else
					{
					    echo "Message has been sent successfully";
					}

				}
				$mysqli->close();
			}
			;
		}
	}
	echo "$error";
	require_once('../include/footer.php'); 
?>