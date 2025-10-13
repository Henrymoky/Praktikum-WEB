<?php
// logout.php
session_start();
// Hapus session
$_SESSION = array();
session_unset();
session_destroy();

// Redirect ke login
header('Location: login.php');
exit();
?>
