<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Manage LivIT Events</title>
<link href="css/realStyle.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="container">
<header>
<a href="">
<h4 class="logo">LIV</h4>
</a>
<nav>
<ul>
  <li><a href="http://athena.ecs.csus.edu/~teamone/index.html">HOME</a></li>
  <li><a href="http://athena.ecs.csus.edu/~teamone/about.php">ABOUT</a></li>
  <li><a href"<MANAGE PAGE">MANAGE</a></li>
  <li><a href="http://athena.ecs.csus.edu/~teamone/login.php">LOG OUT</a></li>
  <li><a href="http://athena.ecs.csus.edu/~teamone/contact.php">CONTACT</a></li>
  </ul>
</nav>
  </header>
  	<div class="manageHero">
    <div class="listhead">    	
	<nav2 id="nav2">
    <ul>
       	<li><label style="width:auto;" name="userName" id="userName">Joey Lazoya</label></li>
        <form action="Headliner.php" id="eventHeaderForm" name="eventHeaderForm">
        <li><label style="width:auto;" name="eventName" id="eventName">Event Name:</label></li>
        <li><input style="width:auto;" name="searchEventName" id="searchEventName" type="text"></input></li>
        <li><label style="width:auto;" name="date" id="date">Date</label></li>
        <li><input style="width:auto;" name="dateSearch" id="dateSearch" type="text"></input></li>
    	<li><label style="width:auto;" name="sponsor" id="sponsor">Sponsor:</label></li>
        <li><input style="width:auto;" name="searchSponsor" id ="searchSponsor" type="text"></input></li>
        <li><button style="width:auto; padding-left:inherit; padding-right:inherit;height:90%;" id="search" name="search" type="Search" >Search</button></li>
        <li><button style="width:auto; padding-left:inherit; padding-right:inherit; height:90%;" id="removeSelected" type="button" name="removeSelected">Remove Selected</button></li>
        </form>
        </div><!-- end list head-->
 	</ul>
    </nav2>
 	
    <div name="listBody" id="listBody" class="listBody">
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
  		</div><!--element-->
  	</div><!-- end list body -->
  </div><!-- end hero-->
</div><!--end container--></label>
</body>
</html>