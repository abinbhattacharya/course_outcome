<?php
  session_start();
if (isset($_SESSION['admin_username']))
{
	// Delete the session vars by clearing the $_SESSION array
    		$_SESSION = array();
    // Delete the session cookie by setting its expiration to an hour ago (3600)
    if (isset($_COOKIE[session_name()]))
	{
		setcookie(session_name(), '', time() - 3600);
    }
    // Destroy the session
    session_destroy();
}
// Delete the user ID and username cookies by setting their expirations to an hour ago (3600)
	setcookie('admin_username','', time() - 3600);
// Redirect to the home page
  $login_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
  header('Location: ' . $login_url);
?>