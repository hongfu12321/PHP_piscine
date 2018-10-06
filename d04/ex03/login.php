<?php

session_start();
include 'auth.php';
//print_r($_GET);

if ($_GET['login'] && $_GET['passwd'] && auth($_GET['login'], $_GET['passwd']))
{
	$_SESSION['loggued_on_user'] = $_GET['login'];
	echo "OK\n";
}
else
{
	$_SESSION['loggued_on_user'] = NULL;
	echo "ERROR\n";
}
//echo $_SESSION['loggued_on_user'];
?>
