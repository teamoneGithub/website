<?php
	$eventName = strip_tags($_POST['eventname']);
	$eventSponsor = strip_tags($_POST['eventsponsor']);
	$eventDescription = strip_tags($_POST['eventdescription']);
	$datePicker = strip_tags($_POST['datepicker']);
	$startHour = strip_tags($_POST['starthour']);
	$startMinute = strip_tags($_POST['startminute']);
	$startMeridiem = strip_tags($_POST['startmeridiem']);
	$endHour = strip_tags($_POST['endhour']);
	$endMinute = strip_tags($_POST['endminute']);
	$endMeridiem = strip_tags($_POST['endmeridiem']);
	$eventLocation = strip_tags($_POST['eventlocation']);
	$startTime = strtotime("" . $datePicker . " " . $startHour . ":" . $startMinute . " " . $startMeridiem);
	$endTime = strtotime("" . $datePicker . " " . $endHour . ":" . $endMinute. " " . $endMeridiem);
	$eventCost = 3.00;
	$eventAge = 21;
	$eventPreferences=($_POST['eventPreferences']);
	
	# Only accept one preference for now
	$dbCon = mysqli_connect("athena.ecs.csus.edu","teamone_user","teamone_db","teamone");
	$sql = "INSERT INTO events(event_id,event_name,event_location,preference_id)Values(	200, " . $eventName . ", " . $eventLocation . ", " . $eventPreferences[0] . ");"/* . $eventSponsor . ", " . $datePicker . ", " . $datePicker . ", " . $startTime . ", " . $endTime . ", " . $eventDescription  . ", " . $eventCost . ", " . $eventAge . ")"*/; 
	$sql = "insert into events(event_id, event_name, event_location, preference_id, img_path, event_sponsor, start_date, start_time, event_description, event_cost, event_age)values(578, '" . $eventName . "', '" . $eventLocation . "', " . $eventPreferences[0] . " , 'music4.jpg', '" . $eventSponsor . "', '" . $datePicker . "', '" . $startHour . ":" . $startMinute . "00" . "', '" . $eventDescription . "', 10.20, 21);";
	echo "<!doctype html><html>";
//	echo ($_POST['eventname']);
//	echo ($_POST['eventsponsor']);
//	echo ($_POST['eventdescription']);
//	echo ($_POST['datepicker']);
//	echo ($_POST['starthour']);
//	echo ($_POST['startminute']);
//	echo ($_POST['startmeridiem']);
//	echo ($_POST['endhour']);
//	echo ($_POST['endminute']);
//	echo ($_POST['endmeridiem']);
//	echo ($_POST['eventlocation']);
//	echo $sql = "INSERT INTO events(12254863, "+($_POST['eventname'])+", "+($_POST['eventlocation'])+", "+ /*$preferenceId+", "+*/($_POST['eventsponsor'])+", "+($_POST['datepicker'])+", "+($_POST['datepicker'])+", "+$startTime+", "+$endTime+", "+($_POST['eventdescription']) /*+", "+$eventCost+", "+$eventAge*/+")"; 
	echo $sql;
//	echo count($eventPreferences);
//	echo $eventPreferences[0];
	$query = mysqli_query($dbCon, $sql);
	
	if ($query) {
		echo "passed";
	} else {
		echo "failed";
	}
?>
