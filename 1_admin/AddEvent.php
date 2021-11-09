<?php include_once '../connection.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Events</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="../CSS/AddEvent.css">
	<link rel="stylesheet" type="text/css" href="../CSS/nav.css">
</head>
<body>
<nav class="navbar">
        <div class="brand-title">Gces Attendance</div>
        <a href="#" class="toggle-button">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </a>
        <div class="navbar-links">
            <ul> 
				<li><a href="Home.php">Home</a> </li>
				<li><a href="view.php">View</a> </li>
				<li><a href="Statistics.php">Statistics</a> </li>     			   <!-- nav bar -->
				<li><a href="notice.php">Notice</a></li>
				<li><a href="../index.php">logout</a> </li>

			</ul>
        </div>
	  </nav>
</header>
	
<script src="../JS/navbar.js"></script>
<div class="container">
<form class="Event" action="" method="POST">
	<div class="addevent"> 
<span class="hello">ADD EVENT</span><br></br>
	</div>
	<div class="entertitle">
<span>TITLE</span><br>
	
<input type="text" name="title"><br>
	</div>
	<div class="enterdate">
<span>DATE:</span><br>
<input type="date" class="dateclass" name="date"><br> 
	</div>
	<div class="entertime">
	<span>Time:</span><br>
<input type="time" name="time">
	</div>
	<div class="submitbut">
<input type="submit" class="btn1" name="event_submit">
	</div>
</form>
<?php
	if (isset($_POST['event_submit'])) {
	$title=$_POST['title'];
	$date=$_POST['date'];
	$time= $_POST['time'];
	echo $time;
	$sql_insert_event="INSERT INTO `upcoming_event`(title,date) VALUES('$title','$date')";
	$result=mysqli_query($connect_to_extra_database,$sql_insert_event);

	}
?>
<div class="backbut">
<a href="notice.php"><button class="btn1">BACK</button></a>
</div>
</div>
</body>
</html>