<?php 
include_once'connection.php';


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../CSS/Student_home.css">
	<link rel="stylesheet" type="text/css" href="../CSS/image2.css">
  <link rel="stylesheet" type="text/css" href="../CSS/StatisticsCss3.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

</head>
<body>
	<table>
		<br>
		<br><br>

		<thead>
		<tr>
			<td>Subject Name</td>

			<td>Present Count</td>

			<td>Total Count</td>

			<td>Percentage</td>
		</tr>
		</thead>
		<tbody>
			<?php
				$batchname="BESE_2017";
				$sql_select_subject="SELECT * from subject where batchname='$batchname'"; 
				$result=mysqli_query($conn,$sql_select_subject);
					while ($row=mysqli_fetch_assoc($result)) { //Select row from the subject table
					$subject="subject";
					$count=1;
						while($row[$subject.$count] !== null){ //Select the subjects batchname
							
							?>
			<tr>
			
			<td><?php echo $row[$subject.$count] ; ?> </td>

			<td><?php $subject_name=str_replace(" ", "_", strtolower($row[$subject.$count]) );//eg:real_time_system
			$student_name="Abi";
				$sql_select_student="SELECT * FROM $subject_name WHERE student_name='$student_name'";
				$result_student_data=mysqli_query($conn,$sql_select_student);
				if ($result_student_data) { //subject table exist
			
				
				while ($row_student_data=mysqli_fetch_assoc($result_student_data)) {
				$present=$row_student_data['present_counter'];
				echo $present;
			 ?></td>

			<td> <?php $total=$row_student_data['total_attendance'];
			echo $total; ?></td>

			<td><?php $percentage=$present/$total*100;
				echo (int)$percentage."%"; 

			?></td>
			<?php 
					}}
					$count++;
				}
					}
			?>
			</tr>
		</tbody>
	</table>

</body>
</html>