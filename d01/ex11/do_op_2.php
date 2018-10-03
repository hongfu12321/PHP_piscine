#!/usr/bin/php
<?php

function ft_exit($str)
{
	echo "$str";
	exit();
}

if ($argc == 2)
{
	$argv[1] = preg_replace('/\s+/', '', $argv[1]);
	$order="+-*/%";
	for ($i = 0; $i < strlen($order); $i++)
		if (($j = strpos($argv[1], $order[$i]))) break ;
	if ($i == 5) ft_exit("Syntax Error\n");
	$arr = explode($argv[1][$j], $argv[1]);
	if (count($arr) != 2) ft_exit("Syntax Error\n");
	if (!is_numeric($arr[0])) ft_exit("Syntax Error\n");
	if (!is_numeric($arr[1])) ft_exit("Syntax Error\n");
	switch ($argv[1][$j])
	{
		case '+':
			echo ($arr[0] + $arr[1] . "\n"); break;
		case '-':
			echo ($arr[0] - $arr[1] . "\n"); break;
		case '*':
			echo ($arr[0] * $arr[1] . "\n"); break;
		case '/':
			echo ($arr[0] / $arr[1] . "\n"); break;
		case '%':
			echo ($arr[0] % $arr[1] . "\n"); break;
	}
}
else
	echo "Incorrect Parameters\n";

?>
