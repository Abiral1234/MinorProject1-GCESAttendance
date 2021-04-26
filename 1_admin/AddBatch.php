<?php 
include_once '../connection.php';
if(isset($_POST['batch_submit2'])){
	$batch_program =$_POST['program'];
	$batch_year =$_POST['year'];
	$name =$batch_program ."_". $batch_year;

	//creating student list foreg:bese_2018

	$sql_create1 = "CREATE TABLE IF NOT EXISTS $name (     
  		`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		`student_name` varchar(255) NOT NULL,
  		 `roll_number` int(11) NOT NULL,
 		 `reg_number` int(15) NOT NULL UNIQUE,
 		 `gender` varchar(255) NOT NULL
		) ";
	if($result1=mysqli_query($conn,$sql_create1)){}
	else{
		echo "Error1";
	}
	//creating subject table for respective batch
	$sql_create2 = "CREATE TABLE IF NOT EXISTS subject (     
  		`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		`batchname` varchar(255) NOT NULL,
		`subject1` varchar(255) NOT NULL,
  		`subject2` varchar(255) NOT NULL,
  		`subject3` varchar(255) NOT NULL,
  		`subject4` varchar(255) NOT NULL,
  		`subject5` varchar(255) NOT NULL,
  		`subject6` varchar(255) NOT NULL,
  		`subject7` varchar(255) NOT NULL,
 		`subject8` varchar(255),
 		`subject9` varchar(255) ,
 		`subject10` varchar(255),
 		`subject11` varchar(255) ,
 		`subject12` varchar(255) ,
 		`subject13` varchar(255) 
		) ";
	if($result2=mysqli_query($conn,$sql_create2)){}
	else{
		echo  $name .'subjects';
	}


	//checking duplicate & creating batch list
	$dup=mysqli_query($conn,"select * from `Batch_list` WHERE batchname='$name'");
	if(mysqli_num_rows($dup)>0){
		//echo "Already Created";
	}

	else{
	$sql_add_batch="INSERT  INTO `batch_list`(batchname)
    VALUES('$name') ";

    if($result= mysqli_query($conn ,$sql_add_batch)){
    	
    }

   }
	
	//Creating at a table that contain all the subjects of the corresponding batch
	$current_year=date("Y");
	$fourth_year=$current_year-4;
	$third_year=$current_year-3;
	$second_year=$current_year-2;
	$first_year=$current_year-1;
	$batchname= array("BESE_".$fourth_year,"BESE_".$third_year,"BESE_".$second_year,"BESE_".$first_year,
				"BECE_".$fourth_year,"BECE_".$third_year,"BECE_".$second_year,"BECE_".$first_year);

	if ($name == $batchname[3]) { //BESE 1st year
		$sql_add_subject="INSERT INTO `subject` VALUES(1,'$name' ,'Engineering MathematicsI'
		,'Physics','Communication Technique','Problem Solving Techniques','Fundamentals of IT','Programming in C','Engineering MathematicsII','Logic Circuits','Mathematical Foundation of Computer Science','Engineering Drawing','Object Oriented Programming in C++','Web Technology',null)";
		if($result_subject=mysqli_query($conn,$sql_add_subject)){}
		else{
		echo  'error while inserting subject';
		}
	}

	if ($name == $batchname[2]) { //BESE 2nd year
		$sql_add_subject="INSERT INTO `subject` VALUES(2,'$name' ,'Engineering Mathematics III'
		,'Software Engineering Fundamentals','Microprocessor  Assembly Lang. Pro.','Data Structure and Algorithms','Probability  Queuing Theory','Programming in Java','Numerical Methods','Computer Graphics','Computer Organization  Architecture','Database Management Systems','Object Oriented Design  Modeling through UML',null,null)";
		if($result_subject=mysqli_query($conn,$sql_add_subject)){}
		else{
		echo  'error while inserting subject';
		}
	}
	if ($name == $batchname[1]) { //BESE 3rd year
		$sql_add_subject="INSERT INTO `subject` VALUES(3,'$name' ,'Applied Operating System'
		,'Simulation  Modeling','Artificial Intelligence  Neural Network','System Programming','Analysis  Design of Algorithm','Elective I','Organization and Management','Multimedia Systems','Computer Networks','Principles of Programming Languages','Engineering Economics','Object Oriented Software Development',null)";
		if($result_subject=mysqli_query($conn,$sql_add_subject)){}
		else{
		echo  'error while inserting subject';
		}
	}
	if ($name == $batchname[0]) { //BESE 4th year
		$sql_add_subject="INSERT INTO `subject` VALUES(4,'$name' ,'Real Time Systems'
		,'Distributed Systems','Enterprise Application Development','Image Processing and Pattern Recognition','Software Testing,Verification,Validation and Quality Assurance','Elective I','Network Programming','Software Project Management','Elective II',null,null,null,null)";
		if($result_subject=mysqli_query($conn,$sql_add_subject)){}
		else{
		echo  'error while inserting subject';
		}
	}
	if ($name == $batchname[7]) { //BECE 1st year
		$sql_add_subject="INSERT INTO `subject` VALUES(5,'$name' ,'Engineering MathematicsI'
		,'Chemistry','Communication Technique','Programming in C','Basic Electrical Engineering','Mechanical Workshop','Engineering Mathematics II','Physics','Engineering Drawing','Engineering Drawing','Object Oriented Programming in C++','Thermal Science','Applied Mechanics')";
		if($result_subject=mysqli_query($conn,$sql_add_subject)){}
		else{
		echo  'error while inserting subject'. $name;
		}
	}
	
	if ($name == $batchname[6]) { //BECE 2nd year
		$sql_add_subject="INSERT INTO `subject` VALUES(6,'$name' ,'Engineering Mathematics III'
		,'Data Structure and Algorithm','Electrical Engineering Materials','Network Theory','Electronic Devices','Logic Circuits','Engineering Mathematics IV','Instrumentation','Electronic Circuits','Theory of Computation','Microprocessors',null,null)";
		if($result_subject=mysqli_query($conn,$sql_add_subject)){}
		else{
		echo  'error while inserting subject'. $name;
		}
	}

	if ($name == $batchname[5]) { //BECE 3rd year
		$sql_add_subject="INSERT INTO `subject` VALUES(7,'$name' ,'Numerical Methods'
		,'Microprocessor System and Interfacing','Operating System','Computer Graphics','Integrated Digital Electronics',
		'Probability_and_Statistics','Simulation_and_Modeling','Data Communication','Database Management System','Object Oriented Software Engineering',null,null,null)";
		if($result_subject=mysqli_query($conn,$sql_add_subject)){}
		else{
		echo  'error while inserting subject'. $name;
		}
	}

	if ($name == $batchname[4]) { //BECE 4th year
		$sql_add_subject="INSERT INTO `subject` VALUES(8,'$name' ,'Engineering Economics'
		,'Computer Architecture','Digital Signal Processing','Computer Network','Elective I','Organization and Management','Artificial Intelligence','Image Processing  Pattern Recognition','Elective II',null,null,null,null)";
		if($result_subject=mysqli_query($conn,$sql_add_subject)){}
		else{
		echo  'error while inserting subject' . $name;
		}
	}


}
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		
		<link rel="stylesheet" type="text/css" href="../CSS/AddBatchCss5.css">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" type="text/css" href="../CSS/nav.css">
	</head>

	<body>
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
						<li><a href="Home.php">Home</a> </li>
						<li><a href="view.php">View</a> </li>
						<li><a href="Statistics.php">Statistics</a> </li> 
						<li><a href="notice.php">Notice</a></li>    			   <!-- nav bar -->
						<li><a href="../index.php">logout</a> </li>

					</ul>
				</div>
			</nav>
		</header>
		

		<div class="container">
			<div class="form-container">
				<form action="AddBatch.php" name="form1" method="POST">
				<div class="input program">
						<span>Program:</span><br>
						<select name="program" id="program" class="d_input">
							<option value="BESE" name="program">Bachelor of Software Engineering</option>
							<option value="BECE" name="program">Bachelor of Computer Engineering</option>
						</select><br>
					</div>
					<div class="input year">
						<span>Year:</span>
						<input type="number" min="<?php echo date("Y")-4;?>" max="<?php echo date("Y")-1;?>" id="year" name="year" class="_dinput"><br>
					</div>
					<input type="submit" value="Enter the data" class="btn" name="batch_submit2">
				</form>
			
				<script src="../JS/AddBatch.js" type="text/javascript"></script>
			</div>


			<div class = "batch_table">
				
				<div>

					<table class="batch_table_software">
						<thead>
							<tr >	
								<td >Software</td>
							</tr>
						</thead>
						<tbody>
						<?php $sql_create3= "CREATE TABLE IF NOT EXISTS `Batch_List` (
							`id` int(11)  NOT NULL AUTO_INCREMENT PRIMARY KEY,
							`batchname` varchar(255) NOT NULL UNIQUE
							)"; 

							if($result3=mysqli_query($conn,$sql_create3)){ }
							else{
						echo "Error2";
							} 
							?>
							<tr >
							<?php 
						$sql_select_batch="SELECT * FROM `batch_list`;";
						$result_batch=mysqli_query($conn ,$sql_select_batch);
						while($row= mysqli_fetch_assoc($result_batch)){
							$batch_name=explode("_",$row['batchname']);
							$program=$batch_name[0];
							if($program =="BESE"){
						?>			
								<td id="software_data" ><?php echo $row['batchname'] ;?></td>
							<?php } ?>
							</tr>
							<?php  }?>
						</tbody>
					</table>
				</div>

				<div>
					<table class="batch_table_computer">
						<thead>
							<tr >	
								<td >Computer</td>
							</tr>
						</thead>
						<tbody>
							<tr >
							<?php 
						$sql_select_batch="SELECT * FROM `batch_list`;";
						$result_batch=mysqli_query($conn ,$sql_select_batch);
						while($row= mysqli_fetch_assoc($result_batch)){
							$batch_name=explode("_",$row['batchname']);
							$program=$batch_name[0];
							if($program =="BECE"){
						?>			
								<td id="computer_data" ><?php echo $row['batchname'] ;?></td>
							<?php } ?>
							</tr>
							<?php  }?>
						</tbody>
					</table>

				</div>

			</div>

		</div>

		<div>
			<img class="background" src="../Images/addbatch.jpg" >
		</div>

<script src="../Js/navbar.js"></script>
	</body>
</html>