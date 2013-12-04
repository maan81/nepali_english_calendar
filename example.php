<?php
	include('nepali_calendar.php');
	$cal = new Nepali_Calendar();
	
	var_dump ($cal->eng_to_nep(2008,11,23));
	/*
		array(6) {
			["year"]  => int(2065)
			["month"] => int(8)
			["date"]  => int(8)
			["day"]	  => string(6) "Sunday"
			["nmonth"]=> string(8) "Mangshir"
			["num_day"]=>int(1)
		}
	*/
	
	print_r($cal->nep_to_eng(2065,8,8));
	/*
		Array
		(
		    [year]  => 2008
		    [month] => 11
		    [date]  => 23
		    [day]   => Sunday
		    [emonth]=> November
		    [num_day]=>1
		)
	*/

?>