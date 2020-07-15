<?php 
include_once 'connection.php';  ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="CSS/Homestyle.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
</head>
<body>
	<header>
<div class="navigation">	
	<nav>
		<ul>
			<li><a href="Home.php">Home</a> </li>
			<li><a href="view.php">View</a> </li>
			<li><a href="#">Result</a> </li>
			<li><a href="logout.php">logout</a> </li>
		</ul>
	</nav>
</div>
<div class="container" >
	<h1>Attendance<h1>
</div>
<div class="pannel">
	<a href="#" id="viewbtn">View</a>
	<a href="#" id="addstud_btn">Add student</a><br><br><br>
	<table class="table1">
		<thead>
			<tr>
				<th>Roll no    </th>
				<th>Name       </th>
				<th>Year       </th>
				<th>Subject    </th>
				<th>Attendance</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$sql = " SELECT * FROM `add student` " ;
				$result = mysqli_query($conn ,$sql);
				$row = mysqli_fetch_assoc($result)
						
			?>
			<tr>
				<td><?php echo $row['Roll no']; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['year']; ?></td>
				<td><?php echo $row['subject']; ?></td>
				<td>
					<input type="radio" name="attendance" value="present">Present
					<input type="radio" name="attendance" value="absent">Absent
				</td>
			</tr>
		</tbody>
	</table>
</div>
</header>
</body>
</html>