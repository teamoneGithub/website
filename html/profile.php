<?php
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
      // Returns a `Facebook\FacebookResponse` object
      $response = $fb->get('/me?fields=id,name,email', $accessToken);
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
      echo 'Graph returned an error: ' . $e->getMessage();
      exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
    }
    
    $user = $response->getGraphUser();
    $user_email = $user['email'];
    /*$query = "SELECT s.event_name, s.event_location, s.preference_name 
              FROM users as u, get_all_saved_event_info as s 
              WHERE u.user_id=s.user_id and u.user_email='$user_email'";*/
    $query = "SELECT * 
	      FROM get_saved_events_by_email
	      WHERE user_email='$user_email'";
		  
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
?>

<!doctype html>
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>LIV IT Profile</title>
<link href="css/singlePageTemplate.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/listStyle.css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Main Container -->
<div class="container"> 
  <!-- Navigation -->
  <header> <a href="">
    <h4 class="logo">LIV</h4>
  </a>
    <nav>
      <ul>
        <li><a href="index.php">HOME</a></li>
        <li> <a href="about.php">ABOUT</a></li>
        <li> <a href="contact.php">CONTACT</a></li>
		<li> <a href="manage.php">MANAGE</a></li>
		<li> <a href="profile.php">PROFILE</a></li>
        <?php
          if (isset($accessToken)) {
            echo '<li><a href="php/logout.php">LOGOUT</a></li>';
          } else {
            echo '<li><a href="php/login.php">LOG IN</a></li>';
          }
        ?>
      </ul>
    </nav>
  </header>
  <!-- About Section -->
    <h2>YOUR PROFILE</h2>
    <?php
      if (isset($accessToken)) {
        echo '<h1 style="text-align:center;">' . $user['name'] . '</h1>';
        echo '<p style="text-align:center;">';
        echo '<img src="//graph.facebook.com/' . $user['id'] .'/picture?type=large">';
        echo '</p>';
        echo '<br></br>';
      }
       
      if (isset($array)) {
        $output = "<table id =\"t01\" align=\"center\">";

        $output .= "<tr>";
        $output .= "<th>" . "Event Name" ."</th>\n";
        $output .= "<th>" . "Location" . "</th>\n";
        $output .= "<th>" . "Preference" . "</th>\n";
        $output .= "<th>" . "Date" . "</th>\n";

        for ($i = 0; $i < count($array); $i++) {
              $output .= "<tr>";
              $output .= "<td>" . $array[$i]['event_name'] . "</td>\n";
              $output .= "<td>" . $array[$i]['event_location'] . "</td>\n";
              $output .= "<td>" . $array[$i]['preference_name'] . "</td>\n";
              $output .= "<td>" . $array[$i]['start_date'] . "</td>\n";
        }
        $output .= "</tablet01>";

        echo $output;
      }
    ?>
  <!-- More Info Section -->
  <footer>
  
  </footer>
<!-- Main Container Ends -->
</body>
</html>
