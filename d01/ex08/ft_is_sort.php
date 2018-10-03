#!/usr/bin/php
<?php

function ft_is_sort($tab){
	$origin = $tab;
	sort($tab);
	for ($i = 0; $i < count($tab); $i++)
		if ($tab[$i] != $origin[$i])
			return (0);
	return (1);
}

?>
