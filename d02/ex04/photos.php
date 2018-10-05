#!/usr/bin/php
<?php

if ($argc != 2)
	exit();

$input = $argv[1];
$url = ("http://" . $input);

$text = file_get_contents($url); 
preg_match_all('/img src="(.*)"/U', $text, $match);
print_r($match);




$dir_path = (getcwd() . '/' . $input);
if (!file_exists($dir_path)) mkdir($dir_path, 0755);
chdir($dir_path);

foreach ($match[1] as $img)
{
	if (!strpos($img, "http://")) $img = $url . $img;
	$curl = curl_init($img);
	$file_name = basename($img);
	$file = fopen($file_name, 'wb');
	curl_setopt($curl, CURLOPT_FILE, $file);
	curl_setopt($curl, CURLOPT_HEADER, 0);
	curl_exec($curl);
	curl_close($curl);
	fclose($file);
}
//chdir($dir_path);

//$ch = crul_init();
//curl_setopt($ch);
 

?>
