<?php
  ini_set('display_errors', 1);
  include_once ('php/check_login.php');
  include_once ('php/init_facebook_php_sdk.php');
/*
	header('Access-Control-Allow_Origin: *');
	error_reporting(E_ALL & E_NOTICE);
	session_start();
	$connection = include_once("connection.php");
	
	$eventName = isset($_POST['eventname']) ? $_POST['eventname'] : '';
	$eventSponsor = isset($_POST['eventsponsor']) ? $_POST['eventsponsor'] : '';
	$eventDescription = isset($_POST['eventdescription']) ? $_POST['eventdescription'] : '';
	$datePicker = isset($_POST['datepicker']) ? $_POST['datepicker'] : '';
	$startHour = isset($_POST['starthour']) ? $_POST['starthour'] : '';
	$startMinute = isset($_POST['startminute']) ? $_POST['startminute'] : '';
	$startMeridiem = isset($_POST['startmeridiem']) ? $_POST['startmeridiem'] : '';
	$endHour = isset($_POST['endhour']) ? $_POST['endhour'] : '';
	$endMinute = isset($_POST['endminute']) ? $_POST['endminute'] : '';
	$endMeridiem = isset($_POST['endmeridiem']) ? $_POST['endmeridiem'] : '';
	$eventLocation = isset($_POST['eventlocation']) ? $_POST['eventlocation'] : '';
	
	$startTime = $startHour . ":" . $startMinute . " " . $startMeridiem;
	$endTime = $endHour . ":" . $endMinute. " " . $endMeridiem;
	
	$eventCost = 3.00;
	$eventAge = 21;
	
	//$eventPreferences=isset($_POST['eventpreferences']) ? $_POST['eventpreferences'] : '';
	
	echo $eventName . "\n" . $eventSponsor . "\n" . $eventDescription . "\n" . $datePicker . "\n" .
	 $startHour . "\n" . $startMinute . "\n". $startMeridiem . "\n" . $endHour . "\n" .
	 $endMinute . "\n" . $endMeridiem . "\n" . $eventLocation . "\n" . $eventPreferences . "\n";
	
	if ($eventName && $eventSponsor && $eventDescription && $datePicker && 
		$startTime && $endTime && $eventLocation) {
		echo 'yah';
		$sql = "INSERT IGNORE INTO events(event_id, event_name, event_location, preference_id, img_path, event_sponsor, start_date, end_date, start_time, end_time, event_description, event_cost, event_age)
				VALUES(578, $eventName, $eventLocation, 0, music4.jpg, $eventSponsor, $datePicker, NULL, $startTime, $endTime, $eventDescription, 10.20, 21)";
		echo $sql;

		$query = mysqli_query($dbCon, $sql);
		
		if ($query) {
			echo "passed";
		} else {
			echo $query;
		}
	}
*/
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="css/realStyle.css" rel="stylesheet" type="text/css">
 
 <link href="C:\Users\Gilly\Documents\jquery-ui-1.11.4.custom-1\jquery-ui-1.11.4.custom\jquery-ui.css" rel="stylesheet" type="text/css">
 
 <!--calendar brett-->
 <link href="css/coolStyle.css" rel="stylesheet" type="text/css">
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">


<title>Event Creation</title>
<style>
 #map {
        height: 100%;
		width: 100%;
      }
</style>
<script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script src="js/script.js"></script>
  <script>
$(document).ready(function() {
// Datepicker Popups calender to Choose date.
$(function() {
$("#datepicker").datepicker();
// Pass the user selected date format.
$("#format").change(function() {
$("#datepicker").datepicker("option", "dateFormat", $(this).val());
});
});
});
</script>
 
</head>

<body><!-- main container-->
<div class = "container"> 
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
<form action="<?php $_PHP_SELF ?>" method="POST">
<div class= "herro" id="herro" style="width: 100%; height: 100%; position: absolute;";>
	
    
    <!--BRETTT-->
    
    
    
	
		<div style ="font-size: 12px; position: absolute; height:80%;  border: 1px solid trasparent; color:rgba(255,255,255,1.00); top: 10px; right: 10px; bottom: 30px; width: auto; z-index: 1; padding: 7px; border-radius: 2px; background: rgba(255,153,255,1.00 );">
		<div>
		</div>
		
		<div><input name="eventlocation"; class="searchbox"; id="pac-input"; type="text" placeholder="Surch" style="margin-top: 10px; border: 1px solid trasparent; height:30px; box-shadow: rgba(0,0,0,.289039) 0px 2px 6px; padding:0px 11px 0px 13px; width:313px; font-size:13px; font-weight: 300; z-index:1; position:absolute; left:121px; top:0px;"></input></div>
		
		<div style="margin-bottom: 7px; font-size: 10px;"><input type ="text" placeholder="Event Name" name="eventname" style="padding:7px; height:23px; width:92%";></input>
		</div>
		<div style="margin-bottom:7px; font-size: 12px;"><input type = "text" placeholder = "Event Type" style = "padding:7px; height:23px; width: 92%"></input>
		</div>
		<div style="margin-bottom:7px; font-size: 10px; "><input type = "text" placeholder = "Event Sponsor" name="eventsponsor" style = "padding:7px; height:23px;  width: 92%;"></input>
		</div>
  <!-- OLD DATE <div style="margin-bottom:7px; font-size: 10px;"><input type = "text" placeholder = "Date" style = "padding:7px;  width: 92%;"></input></div> -->
		<div style="margin-botton:7px; font-size:10px;"><input type="text" id="datepicker" placeholder="Date" name="datepicker" style="padding: 7px; height:23px; width:92%;"></input></div>
		<br>
		<div><button type="Set prefrences"; style= "margin-top: 3px; paddig-botton:1px; width:100%; border:hidden; color: rgba(255,255, 255,1.00 ); background: rgba(255,153,255,1.00 );"> &#8656    Set Prefrences</button>
		</div>   
  
		<div style=" width: 92%; text-align:center; margin-botton:7px; padding:7px;"> Start Time  <select name="starthour">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
		</select>

		<select name="startminute">
			<option value="00">00</option>
			<option value="15">15</option>
			<option value="30">30</option>
			<option value="45">45</option>
		</select>

		<select name="startmeridiem">
			<option value="am">am</option>
			<option value="pm">pm</option>
		</select></div>


		<div style="margin-botton:7px;  text-align:center; width: 92%; padding: 7px; ">End Time  
		<select name="endhour">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
		</select>
  
		<select name="endminute">
			<option value="00">00</option>
			<option value="15">15</option>
			<option value="30">30</option>
			<option value="45">45</option>
		</select>  
  
		<select name="endmeridiem">
			<option value="am">am</option>
			<option value="pm">pm</option>
		</select>  
		</div>

		<div style="margin-bottom:7px; font-size: 10px; color: rgba(243,144,146,1.00)"><textarea placeholder = "Event Description" name="eventdescription" style = "padding:7px; width: 92%; resize:none; rows:7;"></textarea></div>

		<div style="margin-bottom:7px; font-size: 10px;  color: rgba(255,255,255,1.00);"><input type = "text" placeholder = "Upload " style = "padding:7px;  width: 46%;"></input>
		<input name ="21+" type="checkbox">21+</input>
		<input name ="18+" type="checkbox">18+</input>
		<div style="margin-bottom:7px; font-size: 10px;  color: rgba(255,255,255,1.00);">
		<input type="checkbox" value="1" name="eventPreferences[]"> Music
		</input></br>
		<input type="checkbox" value="2" name="eventPreferences[]"> Food & Drinks
        </input></br>
		<input type="checkbox" value="3" name="eventPreferences[]"> Sporting Events
        </input></br>
		<input type="checkbox" value="4" name="eventPreferences[]"> Outdoor
        </input></br>
		<input type="checkbox" value="5" name="eventPreferences[]"> Health & Fitness
        </input></br>
		<input type="checkbox" value="6" name="eventPreferences[]"> Family Friendly
        </input></br>
		<input type="checkbox" value="7" name="eventPreferences[]"> Retail
        </input></br>
		<input type="checkbox" value="8" name="eventPreferences[]"> Performing Arts
        </input></br>
		<input type="checkbox" value="9" name="eventPreferences[]"> Entertainment
        </input></br>
		</div>
		<div><input type="text" name="long" value="long">
		</div>
		<div><input type="text" name="lat" value="lat">
		</div>
		<button type="button"; style="padding-top: 1px; paddig-botton:1px; width:42%; border:hiddene; border-width:1px; color: rgba(255,255, 255,1.00 ); background: rgba(255,153,255,1.00 ); ">Browse..</button>
		</div>
		<div style="text-align:center;"><form action=""><input type="checkbox">I agree to the Terms & Conditions
		</input>
		</form></div>
		<br><br>
		<div><button type="submit"; style= "padding-top: 1px; paddig-botton:1px; width:100%; color: rgba(255,255, 255,1.00 ); background: rgba(255,153,255,1.00 );">Create Event</button>   
		</div>    
		<!--END BRETT-->
		</div>
		<div></div>
	
  	<div id="map"></div>
    <script>
      // This example adds a search box to a map, using the Google Place Autocomplete
      // feature. People can enter geographical searches. The search box will return a
      // pick list containing a mix of places and predicted search terms.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 38.5816, lng: -121.4944},
          zoom: 13,
          mapTypeId: 'roadmap'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }

    </script>	
	 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkAik0mFJzy4vTrOP4IyfIGcO6vdX1odY&libraries=places&callback=initAutocomplete"async defer></script>
</div>
</form>
</div>
</body>
</html>
