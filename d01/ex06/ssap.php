#!/usr/bin/php
<?php

$arr = array();
for ($i = 1; $i < $argc; $i++)
{
	$tmp = preg_split('/\s+/', $argv[$i]);
	for ($j = 0; $j < count($tmp); $j++)
		array_push($arr, $tmp[$j]);
}
sort($arr);
for ($i = 0; $i < count($arr); $i++)
	echo ($arr[$i] . "\n");

?>
