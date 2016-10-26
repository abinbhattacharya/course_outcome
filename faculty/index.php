<?php 
	require_once('start_session.php');
	$error='';
	if(!isset($_SESSION['faculty_username']))
 	{
		if(isset($_POST['username']))
		{
			require_once('../include/db_connect.php');
			//$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Server Error. If problem persists, contact the administrator.');
		$username=$mysqli->real_escape_string(trim($_POST['username']));
		$password_1=$mysqli->real_escape_string(trim($_POST['password_1']));
		if(strlen($password_1)<8)
		{
			$error='Password is too short.';
		}
		else
		{
		//$password_2=$mysqli->real_escape_string(trim($_POST['password_2']));
			//echo "Here";
			//echo $password_1;
			$password_encrypt=sha1($password_1);
			// $query="insert into faculty values('$username','Comp','$password_encrypt','Abin')";
			// echo $query;
			// $result=$mysqli->query($query);
			// echo $result;
			//echo "Here2";
		$query_1="Select * from faculty where username='$username' and password='$password_encrypt'";
		echo $query_1;
		$sql_result_1=$mysqli->query($query_1);
		echo $sql_result_1->num_rows;
			if($sql_result_1->num_rows==1)
			{
				echo "Success";
				//Set the session vars(and cookies),and redirect to the home page
				$row=$sql_result_1->fetch_row();
       			$_SESSION['faculty_username'] = $row[0];
          		//$_SESSION['a_username'] = $row[1];
				//$_SESSION['a_stream']=$row[2];
				//$_SESSION['a_login']=$row[3];
				setcookie('faculty_username', $row[0], time() + (60*60*2));
				//setcookie('a_username', $row[1], time() + (60 * 60 * 2));
				//setcookie('a_stream', $row[2], time() + (60 * 60 * 2 ));
				//setcookie('a_login',$row[3],time()+(60*60*2));
				$sql_result_1->free();
				$mysqli->close();
				$error="There was an error while logging in. Please try again.";
			}
			else
			{
				$error="Invalid username and password. Please try again.";
			}
		}
		}
	}
		$page_title='Faculty Log In';
		//$js_name='../JavaScript/login.js';
		$last_login='';
		$css_name='../include/style.css';		
		if(!isset($_SESSION['faculty_username']))
		{ 
			require_once('../include/header.php');
 			require_once('../include/login_form.php');
			echo'<br/>';
			//echo'<h3 class="txtc"><a href="../index.html">&raquo; Click here to go back to the homepage</a><h3><br/>';
			//echo'<h3 class="txtc"><a href="../Student/index.php">Student(s): Click Here.</a></h3>';
 			require_once('../include/footer.php');
		}
		else
		{
			$home_url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/homepage.php';
        	header('Location: '.$home_url);
			exit;
		}
?>