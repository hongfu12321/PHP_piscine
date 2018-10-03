#!/usr/bin/php
<?php


function init_member($tmp)
{
	$g_i = ($tmp[1] != NULL) ? 1 : 0;
	$grade = ($tmp[1] != NUll) ? $tmp[1] : 0;
	if (strcmp("moulinette", $tmp[2]) == 0)
	{
		$p_i =  0;
		$peer = 0;
		$mouli = $tmp[3];
	}
	else
	{
		$p_i = ($tmp[3] != NULL) ? 1 : 0;
		$peer = ($tmp[3] != NULL) ? $tmp[3] : 0;
		$mouli = 0;
	}
	$arr = array($tmp[0], $g_i, $grade, $p_i, $peer, $mouli);
	return ($arr);
}

$arr = array();
fgets(STDIN);
while (($line = trim(fgets(STDIN))))
{
	$tmp = explode(";", $line);
	for ($i = 0; $i < count($arr); $i++)
		if ($arr[$i][0] == $tmp[0])
		{
			if ($tmp[1] != NULL)
			{
				$arr[$i][2] = ($arr[$i][2] * $arr[$i][1] + $tmp[1]) / ($arr[$i][1] + 1);
				$arr[$i][1] += 1;
			}
			if (strcmp("moulinette", $tmp[2]) == 0)
				$arr[$i][5] = $tmp[3];
			else
			{
				if ($tmp[3] != NUll)
				{
					$arr[$i][4] = ($arr[$i][4] * $arr[$i][3] + $tmp[3]) / ($arr[$i][3] + 1);
					$arr[$i][3] += 1;
				}
			}
			break;
		}
	if ($i == count($arr))
		array_push($arr, init_member($tmp));
}
sort($arr);
print_r($arr);

?>
