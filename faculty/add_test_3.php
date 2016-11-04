<?php
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
$page_title='Add Test Paper';
$last_login='';
$js_name='';
$css_name='../include/style.css';
require_once('../include/header.php');
require_once('start_session.php');
require_once('../include/db_connect.php');
//echo "Here1";
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
 else
 {?>
 	<div id="menubar1" class="txtl">
 		<ul class="menubar"><li><h3>&nbsp;&nbsp;Welcome, <?php echo $_SESSION['faculty_username']; ?>&nbsp;&nbsp;</h3></li></ul>
 	</div>
 	<div id="menubar2" class="txtr">
 		<ul class="menubar">
 			<li><h3 style="display:inline;"><a href="homepage.php">Home</a></h3></li>
 			<li><h3 style="display:inline;"><a href="logout.php">&nbsp;Log Out</a></li></h3>

 		</ul>
 	</div>

 	<div class="txtc">
     <ul class="menubar">
     <br/>
 	<br/>
 	<br/>
 	<br/>
 	<br/>
 	<br/>
<?php

//echo "here2";


if(!isset($_POST['valid_test_2']))
	{
 		$home_url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/add_test.php';
         header('Location: '.$home_url);
 		exit;
	}
//echo "here3";
//print_r($_POST);
 $quesno=$_POST['q_no'];
 $marks=$_POST['marks'];
 $co=$_POST['co'];
 $couname=$_POST["course_name"];
 $tid=$_POST["test_id"];
 $coid=$_POST["number_co"];

//echo "here4";

$uniqco=array_unique($co);

//echo "here5";

$uniqosum=array();

//echo "here6";
 //print_r($uniqco);
 $sumtot=array_sum($marks);

//echo "here7";
 //echo $uniqco[1];
 // print_r($quesno);
 // print_r($marks);
  //print_r($co);

 for($i=1;$i<=sizeof($marks);$i++)
 {   
 	$sql='insert into test_ques_co values(';
 	$ques=$i;
 	$ques="'".$ques."'";
 	if(isset($co[$i]) && isset($marks[$i]))
 	{
 		$sql=$sql.$tid.",".$co[$i].",".$ques.",".$marks[$i].")";
 		//echo "\n";
 		// echo $sql."\n";
 		$res=$mysqli->query($sql);
 		if($mysqli->affected_rows!=1)
 			{
 				echo '<h1 class="txtc">There was a problem. Try again later.</h1>';
 				exit;
 			}
 	// echo $res;
 	}
 }
//echo "here8";
 for($q=1;$q<=sizeof($uniqco);$q++)
 {
 	$sql1='insert into test_course_co values(';
	
 	//echo $sql1."<br>";
 	$uniqcosum=0;
 	for($f=1;$f<=sizeof($marks);$f++)
 	{
 		if($uniqco[$q]==$co[$f])
 		{
 			$uniqcosum+=$marks[$f];
 		}
 	}
 	$weight=$uniqcosum/$sumtot;
 	// echo $weight;
 	$sql1=$sql1.$tid.",".$coid.",".$uniqco[$q].",".$weight.",".$uniqcosum.")";
 	// echo $sql1."<br>";
 	$res1=$mysqli->query($sql1);
 	if($mysqli->affected_rows!=1)
 		{
 			echo '<h1 class="txtc">There was a problem. Try again later.</h1>';
 			exit;
 		}
 	// echo $res1;
 	//echo $res1;
 }

 $query="update table test set marks='$sumtot' where test_id='$tid'";

 $mysqli->query($query);

 if($mysqli->affected_rows!=1)
 	{
 		echo '<h1 class="txtc">Test Details entered succesfully.</h1>';
 	}

 else
 {
 		echo '<h1 class="txtc">There was a problem. Try again later.</h1>';
 }
 echo '<h2 class="txtc"><a href="add_test.php">Click here</a> to add another test.</h2>';
 }
require_once('../include/footer.php');
?>
