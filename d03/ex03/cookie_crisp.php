<?php

if ($_GET['action'] && $_GET['name']))
{
	switch ($_GET['action'])
	{
		case 'set': 
			if ($_GET['value']) setcookie($_GET['name'], $_GET['value'], time() + 3600); break;
		case 'get': 
			if ($_COOKIE[$_GET['name']] != NULL) echo ($_COOKIE[$_GET['name']]. "\n"); break;
		case 'del':
			if ($_GET['value']) setcookie($_GET['name'], "", time() - 3600); break;
		case 'all': print_r($_COOKIE); break;
	}
}
?>
