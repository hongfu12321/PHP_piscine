#!/usr/bin/php
<?php

function check_alpha($a){
	if (($a >= 'A' && $a <='Z') ||
		($a >= 'a' && $a <= 'z'))
		return (1);
	return (0);
}

function ft_sort($a, $b){
	$i = 0;

	if (!$a) return (1);
	if (!$b) return (-1);
	while ($a[$i] && $b[$i] && $a[$i] == $b[$i])
	{
		$i++;
		if ($i == strlen($a)) return (-1);
		if ($i == strlen($b)) return (1);
	}
	if (check_alpha($a[$i]) && !check_alpha($b[$i])) return (-1);
	elseif (check_alpha($b[$i]) && !check_alpha($a[$i])) return (1);
	elseif (is_numeric($a[$i]) && !is_numeric($b[$i])) return (-1);
	elseif (is_numeric($b[$i]) && !is_numeric($a[$i])) return (1);
	if (check_alpha($a[$i]) && check_alpha($b[$i]))
	{
		$tmp_a = strtolower($a[$i]);
		$tmp_b = strtolower($b[$i]);
		return (($tmp_a > $tmp_b) ? 1 : -1);
	}
	return (($a[$i] > $b[$i]) ? 1 : -1);
}

$arr = array();
for ($i = 1; $i < $argc; $i++)
{
	$tmp = preg_split('/\s+/', $argv[$i]);
	for ($j = 0; $j < count($tmp); $j++)
		array_push($arr, $tmp[$j]);
}
usort($arr, 'ft_sort');
for ($i = 0; $i < count($arr); $i++)
	echo ($arr[$i] . "\n");
?>
