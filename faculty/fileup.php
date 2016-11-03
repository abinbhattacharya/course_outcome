<?php
require_once('../include/db_connect.php');
if (isset($_FILES['fname'])) {
    $errors    = array();
    $file_name = $_FILES['fname']['name'];
    $file_size = $_FILES['fname']['size'];
    $file_tmp  = $_FILES['fname']['tmp_name'];
    $file_type = $_FILES['fname']['type'];
    $file_ext  = strtolower(end(explode('.', $_FILES['fname']['name'])));
    
    $expensions = array(
        "csv",
        "CSV"
    );
    
    if (in_array($file_ext, $expensions) === false) {
        $errors[] = "extension not allowed, please choose a CSV file.";
    }
    
    if ($file_size > 2097152) {
        $errors[] = 'File size must be excately 2 MB';
    }
    
       if (empty($errors) == true) {
        move_uploaded_file($file_tmp, "../uploads/" . $file_name);
        echo "Success";
        
        $fi   = fopen("../uploads/" . $file_name, "r");
        $file = fread($fi, filesize("../uploads/" . $file_name));
        $arr  = explode("\n", $file);
        $yea=$_POST['program_year'];
        $yea="'".$yea."'";
        //echo $yea;
        $names="";
        for ($i = 0; $i < sizeof($arr)-1; $i++) 
        {
          $narr=explode(",",$arr[$i]);
          print_r ($narr);
          $narr[0]="'".$narr[0]."'";
          $narr[1]="'".$narr[1]."'";

          $que='insert into student values('.$narr[0].','.$narr[1].','.$yea.')';
          //echo $que;
          $res=$mysqli->query($que);
          if($res){
          $names=$names."\n".$narr[1];
          echo $narr[1]." has been added.\n";
            }
        }
        $yo="<script>alert(Click ok to continue. Names added are:".$names.")</script>";
        echo $yo;
        header("Refresh:10;URL=add_student.php");

    }
}
?>