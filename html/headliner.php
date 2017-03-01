<?php
	error_reporting(E_ALL & E_NOTICE);
	ini_set('display_errors', 1);
	include_once ('php/init_facebook_php_sdk.php');
	include_once ('php/connection.php');
	session_start();

	// Janky way of checking if the user is logged in
	//   Could fix this with database integration (save
	//   sessions via user email or something) 
	if (isset($_SESSION['facebook_access_token'])) {
		try {
		  $accessToken = $_SESSION['facebook_access_token'];
		  
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}
			
		//isset()
		$nameSet = isset($_POST['searchEventName']) ? $_POST['searchEventName'] : '';
		$dateSet = isset($_POST['searchEventDate']) ? $_POST['searchEventDate'] : '';
		$sponSet = isset($_POST['searchEventSponsor']) ? $_POST['searchEventSponsor'] : '';
		
		if ($nameSet || $dateSet || $sponSet) {
			$query = "SELECT event_name, event_sponsor, event_location, preference_id
				      FROM events WHERE ";

			if ($nameSet) {
				$query .= "event_name LIKE \"$nameSet%\"";
				if ($dateSet || $sponSet)
					$query .= " or ";
			}
			
			if ($dateSet) {
				$query .= "start_date=\"$dateSet\"";
				if ($sponSet)
					$query .= " or ";
			}
			
			if ($sponSet) {
				$query .= "event_sponsor LIKE \"$sponSet\"";
			}
			
			$array = array();
			$result = mysqli_query($dbCon, $query);

			if (!$result){             
			  echo "Failure to query";
			} else {
			  //echo "Query execution success\n";
			  while($row = mysqli_fetch_assoc($result)) {
				$array[]=$row;
			  }
			}
		} else {
			$query = "SELECT event_name, event_sponsor, event_location, preference_id
				      FROM events"; 
			$array = array();
			$result = mysqli_query($dbCon, $query);

			if (!$result){             
			  echo "Failure to query";
			} else {
			  //echo "Query execution success\n";
			  while($row = mysqli_fetch_assoc($result)) {
				$array[]=$row;
			  }
			}
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Manage LivIT Events</title>
<link href="css/realStyle.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/listStyle.css">

</head>

<body>
<div class="container">
<header>
<a href="">
<h4 class="logo">LIV</h4>
</a>
<nav>
	<ul>
        <li><a href="index.php">HOME</a></li>
        <li> <a href="about.php">ABOUT</a></li>
        <li> <a href="contact.php">CONTACT</a></li>
		<li> <a href="manage.php">MANAGE</a></li>
        <?php
          if (isset($_SESSION['facebook_access_token'])) {
             echo '<li> <a href="profile.php">PROFILE</a></li>';
             echo '<li><a href="php/logout.php">LOGOUT</a></li>';
          } else {
             echo '<li><a href="php/login.php">LOG IN</a></li>';
          }
        ?>
	</ul>
</nav>
  </header>
  	<div class="manageHero">
    <div class="listhead">    	
	<nav2 id="nav2">
    <ul>
       	<li><label style="width:auto;" name="userName" id="userName">Joey Lazoya</label></li>
        <form action="<?php $_PHP_SELF ?>" id="eventHeaderForm" name="eventHeaderForm" method="POST">
			<li><label style="width:auto;" name="eventName" id="eventName">Event Name:</label></li>
			<li><input style="width:auto;" name="searchEventName" id="searchEventName" type="text"></input></li>
			<li><label style="width:auto;" name="date" id="date">Date:</label></li>
			<li><input style="width:auto;" name="searchEventDate" id="searchEventDate" type="text"></input></li>
			<li><label style="width:auto;" name="sponsor" id="sponsor">Sponsor:</label></li>
			<li><input style="width:auto;" name="searchEventSponsor" id ="searchEventSponsor" type="text"></input></li>
			<li><button style="width:auto; padding-left:inherit; padding-right:inherit;height:90%;" id="search" name="search" type="Search" >Search</button></li>
			<li><button style="width:auto; padding-left:inherit; padding-right:inherit; height:90%;" id="removeSelected" type="button" name="removeSelected">Remove Selected</button></li>
        </form>
        </div><!-- end list head-->
 	</ul>
    </nav2>
	<!-- Previous List Code -->
	<!--<div name="listBody" id="listBody" class="listBody">
    	<div class="listElement" style="width:100%; height:120px; background-color:rgba(68,237,77,1.00)">
        <nav3>
        	<ul>
            <li><img src="img/lukebryanplaya.JPG" name="eventPic" id="eventPic" style="width:100px; height:100px; position:relative; top:0; bottom:0; margin:auto;" ></img></li>
			<li><label id="eventNameElement" name="eventNameElement">Event Name</label></li>
	        <li><label id="eventDateElement" name="eventDateElement">Event Date</label></li>
	        <li><label id="eventTimeElement" name="eventTimeElemnt"<Event Time</label></li>
   		    <li><label id="eventLocationElement" name="eventLocationElement">Event Location</label></li>
			<li><input type="checkbox" name ="removeSelect" id="removeSelect" style="width:20px; height:20px; background-color:rgba(68,237,77,1.00); border-color:rgba(255,255,255,1.00)" ></input></li>
            <ul>
        </nav3>    
  		</div>
	<!--element-->
		
  	</div><!-- end list body -->
		<div name=\"listBody\" id=\"listBody\" class=\"listBody\">
		<?php
			if (isset($array)) { 
				$output = "<table id =\"t01\" align=\"center\">\n";

				$output .= "<tr>\n";
				$output .= "<th>" . "Image" . "</th>\n";
				$output .= "<th>" . "Event Name" ."</th>\n";
				$output .= "<th>" . "Location" . "</th>\n";
				$output .= "<th>" . "Date" . "</th>\n";
				$output .= "<th>" . "Sponsor" . "</th>\n";
				$output .= "<th>" . "Select" . "</th>\n";

				for ($i = 0; $i < count($array); $i++) {
					$output .= "<tr>\n";
					$output .= "<td><img src=\"images/logo.jpg\" width='100' height='100' align='middle'/></td>\n";
					$output .= "<td>" . $array[$i]['event_name'] . "</td>\n";
					$output .= "<td>" . $array[$i]['event_location'] . "</td>\n";
					$output .= "<td>4/20/17 looooool</td>\n";
					$output .= "<td>" . $array[$i]['event_sponsor'] . "</td>\n";
					$output .= "<td><input type=\"checkbox\" name =\"removeSelect\" id=\"removeSelect\"/></td>\n";
				}
				$output .= "</tablet01>\n";

				echo $output;
				
			}
		?>
		</div><!-- end list body -->
	</div><!-- end hero-->
</div><!--end container--></label>
</body>
</html>