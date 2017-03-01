<?php
        header('Access-Control-Allow-Origin: *');
        error_reporting(E_ALL & E_NOTICE);
        session_start();
        $connection = include_once("connection.php");

		//Get the JSONObject from android input
		$json = file_get_contents('php://input');
		$obj = json_decode($json);

		//store user id from JSONObject into local variable
		$user_id = $obj->{"user_id"};
		//echo "user id sent from android ".$user_id;	
		$query = "SELECT f.*, event_description FROM filtered_events as f, events as e  WHERE f.event_id=e.event_id AND user_id=$user_id ORDER BY event_location ASC";
		$array = array();
        	$result = mysqli_query($dbCon, $query);


        if (!$result){
                //echo "Failure to query";
	}
        else
        {
		//echo "Query execution success\n";
		while($row = mysqli_fetch_assoc($result))
                {
                       $array[]=$row;
                }
                echo json_encode($array);
	}
?>
