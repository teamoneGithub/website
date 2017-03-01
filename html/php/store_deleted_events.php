<?php
  $json = file_get_contents('php://input');
  $obj = json_decode($json);
  $user_id = $obj->{'user_id'};
  $event_id = $obj->{'event_id'};

  $connection = include_once("connection.php");
  if(mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_errno();
  }
  $sql="INSERT INTO deleted_events( user_id, deleted_event_id)
  VALUES ($user_id, $event_id)";

   if (mysqli_query($dbCon,$sql)) {
      echo "Values have been inserted successfully";
   }else
	echo "Error in sql syntax";
?>
