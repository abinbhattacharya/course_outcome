<?php
session_start();
 	if(!isset($_SESSION['faculty_username']))
 	 { 
    	if (isset($_COOKIE['faculty_username']))
		{
			$_SESSION['faculty_username'] = $_COOKIE['faculty_username'];
		}
	}
?>