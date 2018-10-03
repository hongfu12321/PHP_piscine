#!/usr/bin/php
<?php

if ($argc > 2)
{
	for ($i = 2; $i < 10; $i++)
	{
		$len = strlen($argv[1]);
		if (strncmp($argv[1], $argv[$i], $len) == 0 && $argv[$i][$len ] == ':')
		{
			$arr = explode(":", $argv[$i]);
			$result = $arr[1];
		}
	}
	if ($result) echo ($result . "\n");
}

?>
