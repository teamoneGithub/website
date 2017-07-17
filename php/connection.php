<?php
	header('Access-Control-Allow-Origin: *');
	$dbCon = mysqli_connect(/* Removed for public repository */);
	if(mysqli_connect_errno()){
		echo "Failed to connect: ".mysqli_connect_error();
	}
?>
