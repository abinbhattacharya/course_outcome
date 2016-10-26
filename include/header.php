<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8" />
			<?php
			date_default_timezone_set("Asia/Kolkata");
			echo '<title>Course Outcome - ' .$page_title.'</title>';
			if(isset($js_name))
				echo '<script src="'.$js_name.'"></script>';
			echo '<link rel="stylesheet" href="'.$css_name.'" />';
			?>
	    </head>
	<body>
		<div id="wrapper">
        	<div id="header" align="center">
            	<h1 ><?php echo 'Course Outcome - '.$page_title;?></h1>
           	</div>
        <div id="content">