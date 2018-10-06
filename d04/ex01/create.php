<?php

session_start();
function	get_data()
{
	if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] &&
		$_POST['submit'] === "OK")
		{
			$tab['login'] = $_POST['login'];
			$tab['passwd'] = hash(sha512, $_POST['passwd']);
		}
	else
	{
		echo "ERROR\n";
		return (NULL);
	}
	return ($tab);
}

$dir_path = "../htdocs/private";
$file = $dir_path."/passwd";
//$tab = get_data();
//if ($tab != NULL)
if (($tab = get_data()) != NUll)
{
	$check = 1;
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
		echo "OK\n";
	}
	else
	{
		$member_tab = unserialize(file_get_contents($file));
		foreach ($member_tab as $set)
			foreach ($set as $login=>$value)
			{
				if ($value == $tab['login'])
					$check = 0;
			}
		if ($check == 1)
		{
			$member_tab[] = $tab;
			$new_tab = serialize($member_tab);
			file_put_contents($file, $new_tab);
			echo "OK\n";
		}
		else
			echo "ERROR\n";
	}
}
else
	echo "hhhhh\n";
?>
