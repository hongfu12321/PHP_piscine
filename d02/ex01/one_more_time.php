#!/usr/bin/php
<?php

function ft_exit($str)
{
	echo "$str";
	exit();
}

function check_day_of_week($str)
{
	switch (strtolower($str))
	{
		case "lundi": return ("Mon");
		case "mardi": return ("Tue");
		case "mercredi": return ("Wed");
		case "jeudi": return ("Thur");
		case "vendredi": return ("Fri");
		case "samedi": return ("Sat");
		case "dimanche": return ("Sun");
	}
	ft_exit("Wrong Format");
}

function check_month($str)
{
	switch (strtolower($str))
	{
		case "janvier": return ("Jan");
		case "fevrier": return ("Feb");
		case "mars": return ("Mar");
		case "avril": return ("Apr");
		case "mai": return ("May");
		case "juin": return ("June");
		case "juillet": return ("July");
		case "aout": return ("Aug");
		case "septembre": return ("Sept");
		case "octobre": return ("Oct");
		case "novembre": return ("Nov");
		case "decembre": return ("Dec");
	}
	ft_exit("Wrong Format");
}

function wrong_format($str)
{
	$day_of_week = "[a-zA-Z]{1}[a-z]*";
	$date = "[0-9]{1,2}";
	$month = "[a-zA-Z]{1}[a-z]*";
	$year = "[0-9]{4}";
	$time = "[0-9]{2}:[0-9]{2}:[0-9]{2}";
	$regexp = "/^$day_of_week $date $month $year $time$/";
	if (!preg_match($regexp, $str))
		ft_exit("Wrong Format\n");
}
if ($argc == 2)
{
	wrong_format($argv[1]);
	$tab = preg_split('/\s+/', trim($argv[1]));
	$day_of_week = check_day_of_week($tab[0]);
	$date = $tab[1];
	$month = check_month($tab[2]);
	$year = $tab[3];
	$time = $tab[4];
	date_default_timezone_set("Europe/Paris");
	if (!($result = strtotime("$date $month $year $time")))
		ft_exit("Wrong Format\n");
	echo ($result . "\n");
}

?>
