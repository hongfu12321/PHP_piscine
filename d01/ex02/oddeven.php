#!/usr/bin/php
<?php
while (1)
{
	echo "Enter a number: ";
	$line = fgets(STDIN);
	$line = trim($line);
	if (feof(STDIN))
	{
		echo "^D";
		exit();
	}
	elseif(!is_numeric($line))
		echo "'$line' is not a number\n";
	elseif ($line % 2 == 1)
		echo"The number $line is odd\n";
	elseif ($line % 2 == 0 || ($line) == 0)
		echo"The number $line is even\n";
}
?>
