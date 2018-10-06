<?php

function auth($login, $passwd)
{
	$file = "../htdocs/private/passwd";
	if (file_exists($file))
	{
		$passwd = hash('sha512', $passwd);
		$member_tab = unserialize(file_get_contents($file));
		foreach ($member_tab as $key=>$set)
			if ($set['login'] == $login && $set['passwd'] == $passwd)
				return TRUE;
	}
	return FALSE;
}

?>
