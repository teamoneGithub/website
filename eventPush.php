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
	$eventLocation strip_tags($_POST['eventlocation'])
	
	# Only accept one preference for now
	$dbCon = mysqli_connect("athena.ecs.csus.edu","teamone_user","teamone_db","teamone");
	$sql = INSERT INTO events(event_id, $eventName, $eventlocation, $preferenceId, $eventSponsor, $datePicker, $datePicker, $startTime, $endTime, $eventDescription, $eventCost, $eventAge) 

	$query = mysqli_query($dbCon, $sql);

	if ($query) {
		# bring up event preview page
	} else {
		# Error posting event
	}
?>
