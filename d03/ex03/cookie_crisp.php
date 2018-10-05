<?php

if (array_key_exists('action', $_GET) && array_key_exists('name', $_GET))
{
	switch ($_GET['action'])
	{
		case 'set': 
			if (array_key_exists($_GET['value'], $_GET))
				setcookie($_GET['name'], $_GET['value'], time() + 3600);
			break;
		case 'get':
			if ($_COOKIE[$_GET['name']] != NULL)
				echo ($_COOKIE[$_GET['name']]. "\n");
			break;
		case 'del':
			setcookie($_GET['name'], "", time() - 3600);
			break;
		case 'all': print_r($_COOKIE); break;
	}
}
?>
