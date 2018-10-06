<?php

session_start();
function	get_data()
{
	if (isset($_POST['login'], $_POST['passwd'], $_POST['submit']) &&
		$_POST['submit'] === "OK")
	{
		$tab['login'] = $_POST['login'];
		$tab['passwd'] = hash(sha512, $_POST['passwd']);
	}
	else
	{
		echo "ERROR\n";
		exit();
	}
	return ($tab);
}

$dir_path = "../htdocs/private";
$file = $dir_path."/passwd";
$tab = get_data();
if (!file_exists($dir_path))
{
	mkdir ("../htdocs/");
	mkdir ($dir_path);
}
if (!file_exists($file))
{
	$tmp_member[] = $tab;
	$new_member[] = serialize($tmp_member);
	file_put_contents($file, $new_member);
}
else
{
	$member_tab = unserialize(file_get_contents($file));
	foreach ($unserialized as $set)
		foreach ($set as $login=>$value)
			if ($value == $tab['login'])
			{
				echo "ERROR\n";
				exit();
			}
	$member_tab[] = $tab;
	$new_tab = serialize($member_tab);
	file_put_contents($file, $new_tab);
}
echo "OK\n";
?>
