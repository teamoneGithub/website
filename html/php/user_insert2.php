<?php

        header('Access-Control-Allow-Origin: *');
        error_reporting(E_ALL & E_NOTICE);
        session_start();
        $connection = include_once("connection.php");

	if (mysqli_connect_errno())
        {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
	
	// G
	$json = file_get_contents('php://input');
        $obj = json_decode($json);
        
	$user_id     = $obj->{'user_id'};
	$first_name  = $obj->{'first_name'};
	$last_name   = $obj->{'last_name'};
        $user_email = $obj->{'user_email'};
        $gender     = $obj->{'gender'};       
	//$birthday   = $obj->{'birthday'};
	//$location   = $obj->{'location'}; 
	echo "user id from android json ".$user_id."\n";
	echo $user_id;
	// Find user in the database
        $query = "select user_id from users where user_id=$user_id";
	$result = mysqli_query($dbCon, $query);
        
	// Check if the user exists. If not, create a query to add user 
	if(mysqli_num_rows($result)){
	  echo "User already exists\n";
	}else{
	  $sql="INSERT INTO users(user_id, first_name, last_name, user_email,gender) 
		VALUES ('$user_id', '$first_name', '$last_name', '$user_email', '$gender')";
	}
        
	// Try inserting the user into users table.
	if (mysqli_query($dbCon,$sql)) {
      	  echo "Values have been inserted successfully.\n";
	  echo $user_id;
  	}else{
       	  echo "Insertion Failed\n";
       	}

?>
