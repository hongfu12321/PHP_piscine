#!/usr/bin/php
<?php

if ($argc == 4)
{
	$argv[1] = preg_replace('/\s+/', '', $argv[1]);
	$argv[2] = preg_replace('/\s+/', '', $argv[2]);
	$argv[3] = preg_replace('/\s+/', '', $argv[3]);
	switch ($argv[2])
	{
		case '+':
			echo ($argv[1] + $argv[3] . "\n");
			break;
		case '-':
			echo ($argv[1] - $argv[3] . "\n");
			break;
		case '*':
			echo ($argv[1] * $argv[3] . "\n");
			break;
		case '/':
			echo ($argv[1] / $argv[3] . "\n");
			break;
		case '%':
			echo ($argv[1] % $argv[3] . "\n");
			break;
	}
}
else
	echo "Incorrect Parameters\n";
?>
