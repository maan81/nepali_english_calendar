<?php
	date_default_timezone_set('Asia/Kathmandu');

	include('nepali_calendar_class.php');
	$cal = new Nepali_Calendar();

	$dateDay = date('d');
	$dateMonth = date('m');
	$dateYear = date('Y');

	$date_np = $cal->eng_to_nep($dateYear,$dateMonth,$dateDay);

	//echo $date_np['year'].'/'.$date_np['month'].'/'.$date_np['date'];
	echo $date_np['date'].'/'.$date_np['month'].'/'.$date_np['year'];
