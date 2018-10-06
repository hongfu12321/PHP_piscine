<?php

function get_data()
{
	if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] &&
		$_POST['submit'] && $_POST['submit'] === "OK")
	{
		$tab['login'] = $_POST['login'];
		$tab['oldpw'] = hash('sha512', $_POST['oldpw']);
		$tab['newpw'] = hash('sha512', $_POST['newpw']);
	}
	else
	{
		echo "ERROR here\n";
		return (NULL);
	}
	return ($tab);
}

$dir_path = "../htdocs/private";
$file = ($dir_path. "/passwd");

if (file_exists($file))
{
	$modified = 0;
	$post_tab = get_data();
	$member_tab = unserialize(file_get_contents($file));
//	print_r($member_tab);
	foreach ($member_tab as $key=>$set)
	{
		if ($set['login'] == $post_tab['login'])
		{
			if ($set['passwd'] == $post_tab['oldpw'])
			{
				$member_tab["$key"]['passwd'] = $post_tab['newpw'];
				$modified = 1;
			}
			else
			{
				echo "ERROR\n";
				exit();
			}
		}
	}
}
//print_r($member_tab);
if ($modified == 1)
{
	file_put_contents($file, serialize($member_tab));
	echo "OK\n";
}
else
	echo "ERROR there\n";

?>
