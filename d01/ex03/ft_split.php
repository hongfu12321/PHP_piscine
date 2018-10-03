#!/usr/bin/php

<?php

function ft_split($str){
	$str = trim(preg_replace('/\s+/', ' ', $str));
	$arr = explode(" ", $str);
	sort($arr);
	return ($arr);
}

?>
