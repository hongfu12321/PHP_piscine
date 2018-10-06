<?php

function get_data()
{
	if (isset($_POST['login'], $_POST['passwd'], $_POST['submit']) &&
		$_POST['submit'] === "OK")
	{
		$tab['login'] = $_POST['login'];
		$tab['passwd'] = hash('sha512', $_POST['login']);
	}
	else
	{
		echo "ERROR\n";
		exit();
	}
	return ($tab);
}


$dir_path = "../htdocs/private";
$passwd_path = ($dir_path. "/passwd");
if (!file_exists($dir_path))
{
	echo "make dir\n";
	mkdir("../htdocs/");
	mkdir($dir_path, 0755);
}
if (!file_exists($passwd_path))
{
	echo "make file\n";
	file_put_contents($passwd_path, serialize(get_data()). "\n");
}
else
{
	$post_tab = get_data();
	$passwd_string = file_get_contents($passwd_path);
	$passwd_tab = preg_split('/\s+/', $passwd_string);
	foreach ($passwd_tab as $set)
	{
		$set = unserialize($set);
		if  ($set['login'] == $post_tab['login'])
		{
			echo "ERROR\n";
			exit();
		}
	}
	file_put_contents($passwd_path, serialize($post_tab). "\n", FILE_APPEND);
}
echo "OK\n";

?>
