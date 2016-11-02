<?php
session_start();
 	if(!isset($_SESSION['admin_username']))
 	 { 
    	if (isset($_COOKIE['admin_username']))
		{
			$_SESSION['admin_username'] = $_COOKIE['admin_username'];
		}
	}
?>