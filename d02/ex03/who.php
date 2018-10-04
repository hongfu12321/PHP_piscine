#!/usr/bin/env php
<?php
	$file = fopen("/var/run/utmpx", "rb");
	fseek($file, 1256);
//	date_default_timezone_set("USA/California");
	$arr = array();
	while (!feof($file))
	{
		$data = fread($file, 628);
		if (strlen($data) == 628)
		{
			$data = unpack("a256user/a4id/a32line/ipid/itype/itime", $data);
			if ($data['type'] == 7)
			{
				$tmp = array($data['user'], $data['line'], date("M d H:i", $data['time']));
				array_push($arr, $tmp);
			}
		}
	}
	sort($arr);
	foreach($arr as $value)
	{
		echo ($value[0] . "\t" . $value[1] . "\t" . $value[2] . "\n");
	}	
	fclose($file);
?>
