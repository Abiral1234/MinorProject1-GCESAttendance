<?php 
include_once 'connection.php'; 
 ?>
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
				<li><a href="result.php">Result</a> </li>
				<li><a href="index.php">logout</a> </li>
				</ul>
			</nav>
		</div>
		<div class="container" >
			<h1>Attendance For<h1>
		</div>
		<div class="batchselector">
			<select id="batch" class="batch">
				<option disabled selected>Choose your batch</option>
				<option value="BESE2016" >BESE2016</option>
				<option value="BESE2017" >BESE2017</option>
				<option value="BESE2018" >BESE2018</option>
				<option value="BESE2019" >BESE2019</option>
				<option value="BECE2016" >BECE2016</option>
				<option value="BECE2017" >BECE2017</option>
				<option value="BECE2018" >BECE2018</option>
				<option value="BECE2019" >BECE2019</option>
			</select>
		</div>
<div class="pannel">
	<a href="#" id="viewbtn">View</a>
	<a href="AddStudent.php" id="addstud_btn">Add student</a><br><br><br>
	<table class="table1">
		<thead>
			<tr>
				<th>Name       </th>
				<th>Program       </th>
				<th>Year   </th>
				<th>Attendance </th>
			</tr>
		</thead>

		<tbody>
			<?php 
				$sql="SELECT * FROM `add student`;";
				$result=mysqli_query($conn ,$sql);
				while($row= mysqli_fetch_assoc($result)){
			?>
			<tr>
				<td><?php echo $row['name'] ; ?></td>
				<td><?php echo $row['subject']; ?></td>
				<td><?php echo $row['year']; ?></td>
				<td>
					<input type="radio" name="attendance[<?php echo $row['Roll no']; ?> ]" value="present">Present
					<input type="radio" name="attendance[<?php echo $row['Roll no']; ?>]" value="absent">Absent
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
<button class="btn"><a class="submit" href="Home.php">Submit</a></button>
	
</div>
</header>
</body>
</html>