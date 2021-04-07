<?php
include_once '../connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../CSS/Viewcss2.css">
	<link rel="stylesheet" type="text/css" href="../CSS/Student_home1.css">
	<link rel="stylesheet" type="text/css" href="../CSS/image2.css">
  <link rel="stylesheet" type="text/css" href="../CSS/StatisticsCss3.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
</head>
<body>
<div>
<header>
      <nav class="navbar">
        <div class="brand-title">Gces Attendance</div>
        <a href="#" class="toggle-button">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </a>
        <div class="navbar-links">
            <ul> 
				<li><a href="Home.php">Attendance</a> </li>
				<li><a href="routine.php">Routine</a> </li>
				<li><a href="notes.php">Notes</a> </li>     			   <!-- nav bar -->
				<li><a href="notice.php">Notice</a></li>
				<li><a href="../index.php">logout</a> </li>
			</ul>
        </div>
	  </nav>
</header>
</div>
<div class="sidebutton">
	<form action="routine.php" method="POST">
	<input type="submit" class="sideinput" id="class_time_table" name="class_time_table" value="class_time_table">
	<label for="class_time_table" class="sidebtn">Class Time Table</label>

	<input type="submit" class="sideinput" id="exam_routine" name="exam_routine" value="exam_routine">
	<label for="exam_routine" class="sidebtn">Exam Routine</label>
	</form>
</div>

<?php if (isset($_POST['class_time_table'])) { ?>
<div class="table_section">
<h1>Class Time</h1>

</div>
<?php } ?>


<?php if (isset($_POST['exam_routine'])) { ?>
<div class="table_section">
<h1>Exam Routine</h1>
</div>
<?php } ?>

<script src="../Js/navbar.js"></script>
		</body>
</html>