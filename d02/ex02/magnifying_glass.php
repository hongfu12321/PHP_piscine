#!/usr/bin/php
<?php

function upper($match)
{
	return str_replace($match[1], strtoupper($match[1]), $match[0]);
}


if ($argc == 2)
{
	$text = file_get_contents($argv[1]);
	$text = preg_replace_callback('/<a[^>]+>(.*)</U', "upper", $text);
	$text = preg_replace_callback('/title="(.*)</U', "upper", $text);
	echo "$text";
}

?>
