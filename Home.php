<?php 
include_once 'connection.php'; 
$flag=0;
$score=0;
if (isset($_POST['submit'])) { //checks if submit button is clicked

	if($_POST['attendance_status']){ //checks if any radio buttons are checked

		foreach($_POST['attendance_status'] as $id=>$attendance_status){ //loops through checked radio buttons

			if($_POST['attendance_status'][$id]=="not_taken"){ //If anyone student attendance is not taken flag=-1 ie teacher is informed
					$flag=-1;
			}

			if($_POST['attendance_status'][$id]=="absent"){ //If anu student is absent it is recorded in the database
			$student_name=$_POST['student_name'][$id];
			$roll_no=$_POST['roll_no'][$id];
			$date=date("Y-m-d H:i:s");
			$sql="INSERT INTO `attendance_records`(id ,student_name ,roll_number ,attendance_status , date) VALUES('$id','$student_name','$roll_no','$attendance_status', '$date')";
			$result=mysqli_query($conn,$sql);
		
				if($result){
				$flag=1;
				}
				else{
					$flag=-1;
				}
			}

			if($_POST['attendance_status'][$id]=="present"){ //If student is present score is added by one
					$score++;
					$flag=1;
			}
		}

	}
	else{
		$flag=2;
	}
}	
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
				<li><a href="Statistics.php">Statistics</a> </li>        <!-- nav bar -->
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
				<option value="BECE2016" >BECE2016</option>             <!-- Batch Select Option Menu-->
				<option value="BECE2017" >BECE2017</option>
				<option value="BECE2018" >BECE2018</option>
				<option value="BECE2019" >BECE2019</option>
			</select>

		</div class="record_submit_message">

		</div>
		<div class="pannel">
			<button class="btn"><a href="view.php" id="viewbtn">View</a></button>
			<div class="time">Date:<?php echo date("Y-m-d"); ?></div>
			<button class="btn" id="addbtn0"><a href="AddBatch.php" id="add_txt">Add Batch</a></button>
			<button class="btn" id="addbtn1"><a href="AddTeacher.php" id="add_txt">Add Teacher</a></button>   <!--Add Buttons -->
			<button class="btn" id="addbtn2"><a href="AddStudent.php" id="add_txt">Add Student</a></button> 

			<?php if($flag==1){ ?>
			<div class="attendance_success" style="color: green">Attendance is taken succesfully</div>
			<?php } ?>
			<?php if($flag==-1){ ?>
			<div class="attendance_success" style="color: red">All Students attendance were not taken</div><!--shows succes or fail -->
			<?php } ?>

			<form method="POST" action="Home.php" value="attendance">
				<table class="table1">
					<thead>
						<tr>
							<th>Roll no</th>
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
						$serial_number=0;
						$counter=0;
						while($row= mysqli_fetch_assoc($result)){
							$serial_number++;
						?>
 																								<!--Attendance Sheet-->
						<tr>
							<td><?php echo $serial_number; ?></td>
							<input type="hidden" name="roll_no[]" value=<?php echo $serial_number; ?>>
							<td><?php echo $row['name'] ; ?></td>
							<input type="hidden" value="<?php echo $row['name'] ; ?>" name="student_name[]">
							<td ><?php echo $row['subject']; ?></td>
							<td ><?php echo $row['year']; ?></td>
							<td>
							<input  type="radio" name="attendance_status[<?php echo $counter;?>]" value="present" required >Present
							<input  type="radio" name="attendance_status[<?php echo $counter;?>]" value="absent"  >Absent 
							
							</td>
						</tr>
					<?php 
				$counter++;} ?>
					</tbody>
				</table>
				<input class="btn" type="submit" name="submit" value="SUBMIT">
			</form>
</div>
</header>
</body>
</html>