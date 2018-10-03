#!/usr/bin/php
<?php


function init_member($tmp)
{
	$g_i = ($tmp[1] != NULL) ? 1 : 0;
	$grade = ($tmp[1] != NUll) ? $tmp[1] : 0;
	$mouli = ($tmp[1] != NULL && strcmp("moulinette", $tmp[2]) == 0) ? $tmp[1] : 0;
	$arr = array($tmp[0], $g_i, $grade, $mouli);
	return ($arr);
}

function calculate(){
	$arr = array();
	fgets(STDIN);
	while (($line = trim(fgets(STDIN))))
	{
		$tmp = explode(";", $line);
		for ($i = 0; $i < count($arr); $i++)
			if ($arr[$i][0] == $tmp[0])
			{
				if ($tmp[1] != NULL && (strcmp("moulinette", $tmp[2]) != 0))
				{
					$arr[$i][2] = ($arr[$i][2] * $arr[$i][1] + $tmp[1]) / ($arr[$i][1] + 1);
					$arr[$i][1] += 1;
				}
				if ($tmp[1] != NULL && strcmp("moulinette", $tmp[2]) == 0)
					$arr[$i][3] = $tmp[1];
				break;
			}
		if ($i == count($arr))
			array_push($arr, init_member($tmp));
	}
	sort($arr);
//	print_r($arr);
	return ($arr);
}

if ($argc == 2)
{
	$arr = calculate();
	if (strcmp($argv[1], "average") == 0)
	{
		for ($i = 0; $i < count($arr); $i++)
		{
			$result += ($arr[$i][2] * $arr[$i][1]);
			$total += ($arr[$i][1]);
		}
		$result /= $total;
		echo "$result\n";
	}
	elseif (strcmp($argv[1], "average_user") == 0)
	{
		for ($i = 0; $i < count($arr); $i++)
			echo ($arr[$i][0] . ":" . $arr[$i][2] . "\n");
	}
	elseif (strcmp($argv[1], "moulinette_variance") == 0)
	{
		for ($i = 0; $i < count($arr); $i++)
		{
			$moulinette = $arr[$i][2] - $arr[$i][3];
			echo ($arr[$i][0] . ":" . $moulinette . "\n");
		}
	}
}
?>
