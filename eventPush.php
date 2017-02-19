<?php
	$eventName = strip_tags($_POST['eventname']);
	$eventSponsor = strip_tags($_POST['eventsponsor']);
	$eventdescription = strip_tags($_POST['eventdescription']);
	$datepicker = strip_tags($_POST['datepicker']);
	$starthour = strip_tags($_POST['starthour']);
	$startminute = strip_tags($_POST['startminute']);
	$startmeridiem = strip_tags($_POST['startmeridiem']);
	$endhour = strip_tags($_POST['endhour']);
	$endminute = strip_tags($_POST['endminute']);
	$endmeridiem = strip_tags($_POST['endmeridiem']);
	
	# Only accept one preference for now
 
	$sql = # create query that would add the event

	$query = mysqli_query($dbCon, $sql);

	if ($query) {
		# bring up event preview page
	} else {
		# Error posting event
	}
?>
