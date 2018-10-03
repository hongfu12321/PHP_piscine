#!/usr/bin/php
<?php

if ($argc == 2)
{
	$str = preg_replace('/\s+/', ' ', $argv[1]);
	echo "$str\n";
}

?>
