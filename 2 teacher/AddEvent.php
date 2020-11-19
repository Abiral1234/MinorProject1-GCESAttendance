<?php include_once '../connection.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form class="Event" action="" method="POST">
<span>ADD EVENT</span><br>
<span>Title</span><br>
<input type="text" name="title"><br>
<span>DATE:</span><br>
<input type="date" name="date"><br> 
<input type="time" name="time">
<input type="submit" name="event_submit">
</form>
<?php
	if (isset($_POST['event_submit'])) {
	$title=$_POST['title'];
	$date=$_POST['date'];
	$time= $_POST['time'];
	echo $time;
	$sql_insert_event="INSERT INTO `upcoming_event`(title,date) VALUES('$title','$date')";
	$result=mysqli_query($conn,$sql_insert_event);

	}
?>
<a href="notice.php"><button>BACK</button></a>
</body>
</html>