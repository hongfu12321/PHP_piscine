#!/usr/bin/php
<?php

if ($argc > 2)
{
	$arr = preg_split('/\s+/', $argv[1]);	
	for ($i = 1; $i < count($arr); $i++)
		echo ($arr[$i] . ' ');
	echo ($arr[0] . "\n");
}
?>
