<?php 
include_once '../connection.php'; 
$flag=0;
$flag1=0;
$score=0;


if (isset($_POST['submit'])) { //checks if submit button is clicked
	$subject=$_POST['subject_name'];
	$batchname2=$_POST['table_name'];
	$attendance_sheet= $subject . "_attendance_record";//Creates attendance record table with name of the subject+attedance_reocord if not exists
	$sql_create2= "CREATE TABLE IF NOT EXISTS $attendance_sheet (   
  	`id` int(11)  NOT NULL AUTO_INCREMENT PRIMARY KEY,
  	`student_name` varchar(255) NOT NULL,
  	`roll_number` varchar(255) NOT NULL,
  	`attendance_status` varchar(255) NOT NULL,
  	`date` date NOT NULL )"; 
  	$result2=mysqli_query($conn,$sql_create2);

  	//create table with subject name only to add all student in it and update their score
  	$sql_create1 = "CREATE TABLE IF NOT EXISTS $subject (     
  		`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		`student_name` varchar(255) NOT NULL,
  		 `roll_number` int(11) NOT NULL,
 		 `reg_number` int(15) NOT NULL UNIQUE,
 		 `gender` varchar(255) NOT NULL,
 		 `present_counter` int(12),
         `total_attendance` int(12) 
		) ";
	if($result1=mysqli_query($conn,$sql_create1)){}
	else{
		echo "Error1";
	}

	//Transfering Student name from their batch table to subject table 
	$sql_transfer="INSERT INTO $subject(student_name,roll_number,reg_number,gender,present_counter,total_attendance)
	SELECT student_name,roll_number,reg_number,gender,0,0
	FROM $batchname2 " ;
	if($result_transfer=mysqli_query($conn,$sql_transfer)){}
	else{
		//If there is already data in the subject table name the data wont be transferred again
	}


  	/* $sql_date_duplicate="SELECT DISTINCT date FROM $attendance_sheet";//check if the attendance is takentoday
  	$result_date=mysqli_query($conn ,$sql_date_duplicate);
	if(isset($result_date)){
	while($row_date= mysqli_fetch_assoc($result_date)){
		if($row_date['date'] == date("Y-m-d")){
			$flag1=3;
			goto NoAttendance;
		}
	}} */
	
	

	if(isset($_POST['attendance_status'])){ //checks if any radio buttons are checked

		foreach($_POST['attendance_status'] as $id=>$attendance_status){ //loops through checked radio buttons


			if($_POST['attendance_status'][$id]=="absent"){ //If any student is absent it is recorded in the database
				$student_name=$_POST['student_name'][$id];
				$roll_no=$_POST['roll_no'][$id];
				$date=date("Y-m-d");
				$attendance_table= strtolower ($attendance_sheet);
				$sql="INSERT INTO $attendance_table (id ,student_name ,roll_number ,attendance_status , date) VALUES(0,'$student_name','$roll_no','$attendance_status', '$date')";
				$result=mysqli_query($conn,$sql);
		
				if($result){
				$flag=1;
				}
				else{
					$flag=-1;
					
				}
				}
			//If student is present counter in subject table of respective student is added by one to their previous value
			if($_POST['attendance_status'][$id]=="present" ){ 
				$score++;
				$flag=1;

				$student_name=$_POST['student_name'][$id];
				$sql_plus="SELECT * FROM $subject WHERE student_name = '$student_name'";
				$result_counter=mysqli_query($conn,$sql_plus);
				$row_counter= mysqli_fetch_assoc($result_counter);
				$prev_counter=$row_counter['present_counter'];
				$update_counter=$prev_counter+1;
				$sql_update="UPDATE $subject
				SET present_counter=$update_counter
				WHERE student_name = '$student_name'";
				$update_result=mysqli_query($conn,$sql_update);
				}

			//add total attendance taken
			if($_POST['attendance_status'][$id]=="present" || $_POST['attendance_status'][$id]=="absent" ){ 
				$score++;
				$flag=1;

				$student_name=$_POST['student_name'][$id];
				$sql_plus="SELECT * FROM $subject WHERE student_name = '$student_name'";
				$result_counter=mysqli_query($conn,$sql_plus);

				$row_counter= mysqli_fetch_assoc($result_counter);
				$prev_counter=$row_counter['total_attendance'];
				$update_counter=$prev_counter+1;
				$sql_update="UPDATE $subject
				SET total_attendance=$update_counter
				WHERE student_name = '$student_name'";
				$update_result=mysqli_query($conn,$sql_update);
				}
		}
		}
	else{
		$flag=2;
	}
}
NoAttendance:	
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../CSS/homecss15.css">
	<link rel="stylesheet" type="text/css" href="../CSS/image2.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600display=swap" rel="stylesheet">

<script type="text/javascript">	
		var pair; 	
		function populate(s1,s2){   //funtion that run when different batch is selected to put differernt subject 
			var s1=document.getElementById(s1);
			var s2=document.getElementById(s2);
			
			var thisYear=<?php echo date("Y");?>;
			var batchName=s1.value;

			var pair=batchName.split("_");//splitting the batch name to program and year using "_" as separator foreg: BESE_2018 to BESE and 2018
			var batchProgram =pair[0];      
			var batchAdmitYear = pair[1];
			

			var batchCurrentYear= thisYear - batchAdmitYear;

			s2.innerHTML = " ";
			if(batchProgram == "BESE"){      //TO select subjects of BESE
				if(batchCurrentYear == 1){   //BESE 1st Years
					var optionArray=["Choose Your Subject|Not selected","Engineering MathematicsI|MTH 112","Physics|PHY 111","Communication Technique|ENG 111","Problem Solving Techniques|CMP 114","Fundamentals of IT|CMP 110","Programming in C|CMP 113","Engineering MathematicsII|MTH 114","Logic Circuits|ELX 212","Mathematical Foundation of Computer Science|MTH 130","Engineering Drawing|MEC 120","Object Oriented Programming in C++|CMP 115","Web Technology|CMP 213"];

				}

				else if(batchCurrentYear == 2){   //BESE 2nd Years
					var optionArray=["Choose Your Subject|Not selected","Engineering Mathematics III|","Software Engineering Fundamentals|","Microprocessor  Assembly Lang. Pro.|","Data Structure and Algorithms|","Probability  Queuing Theory|","Programming in Java |","Numerical Methods|","Computer Graphics|","Computer Organization  Architecture|","Database Management Systems|","Object Oriented Design  Modeling through UML|"];

				}
				else if(batchCurrentYear == 3){   //BESE 3rd Years
					var optionArray=["Choose Your Subject|Not selected","Applied Operating System|","Simulation  Modeling|","Artificial Intelligence  Neural Network|","System Programming|","Analysis  Design of Algorithm|","Organization and Management|","Multimedia Systems|","Computer Networks|","Principles of Programming Languages|","Engineering Economics|","Object Oriented Software Development|"];

				}
				else if(batchCurrentYear == 4){   //BESE 4th Years
					var optionArray=["Choose Your Subject|Not selected","Real Time Systems|","Distributed Systems|","Enterprise Application Development|","Image Processing and Pattern Recognition|","Software Testing,Verification,Validation and Quality Assurance|","Elective I|","Network Programming|","Software Project Management|","Elective II|"];

				}

			}
			if (batchProgram =="BECE") {
				if (batchCurrentYear == 1 ) {
					var optionArray=["Choose Your Subject|Not selected","Engineering Mathematics I|","Chemistry|","Communication Technique|","Programming in C|","Basic Electrical Engineering|","Mechanical Workshop|","Engineering Mathematics II|","Physics|","Engineering Drawing|","Object Oriented Programming in C++|","Thermal Science|","Applied Mechanics|"]
				}

				else if (batchCurrentYear == 2 ) {
					var optionArray=["Choose Your Subject|Not selected","Engineering Mathematics III|","Data Structure and Algorithm|","Electrical Engineering Materials|","Network Theory|","Electronic Devices|","Logic Circuits|","Engineering Mathematics IV|","Instrumentation|","Electronic Circuits|","Theory of Computation|","Microprocessors|"]
				}
				else if (batchCurrentYear == 3 ) {
					var optionArray=["Choose Your Subject|Not selected","Numerical Methods|","Microprocessor System and Interfacing|","Operating System|","Computer Graphics|","Integrated Digital Electronics|","Probability and Statistics|","Simulation and Modeling|","Data Communication|","Database Management System|","Object Oriented Software Engineering|"]
				}
				else if (batchCurrentYear == 4 ) {
					var optionArray=["Choose Your Subject|Not selected","Engineering Economics|","Computer Architecture|","Digital Signal Processing|","Computer Network|","Elective I|","Organization and Management|","Artificial Intelligence|","Image Processing  Pattern Recognition|","Elective II|"]
				}
			}

			for(var option in optionArray){

				pair= optionArray[option].split("|");
				var newOption=document.createElement("option");
				if(pair[0]=="Choose Your Subject"){
					newOption.value = pair[1];
				}
				else{
				newOption.value = pair[0];
				}
				newOption.name =pair[0];
				newOption.innerHTML = pair[0];
				s2.options.add(newOption);

				}
				}
</script> 

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
				<li><a href="home.php">Home</a> </li>
				<li><a href="view.php">View</a> </li>
				<li><a href="Statistics.php">Statistics</a> </li>     			   <!-- nav bar -->
				<li><a href="notice.php">Notice</a></li>
				<li><a href="../index.php">logout</a> </li>
			</ul>
        </div>
</nav>

<div class="select_button">
<form action="home.php" method="POST">
			<!-- Select Menu for batch imported  from batch table database-->
			<span class="select_menu_span">Attendance For:</span>
				<select required id="batch_select" class="batch_select" name="batch_name1" onchange="populate('batch_select','subject_select')">
					<option  selected value="No batch selected" >Choose Your Batch</option> 
					<?php 
						$sql_select_batch="SELECT * FROM `batch_list`;";
						$result_batch=mysqli_query($conn ,$sql_select_batch);
						while($row= mysqli_fetch_assoc($result_batch)){         
		   			?>
					<option required value="<?php echo $row['batchname'] ;?>" name="option_value" >
						
						<?php echo $row['batchname'] ;?>
					</option>

					<?php }?>	
				</select>

			<!-- Select Menu for subject shown according to selected batch-->

				<select id="subject_select" class="subject_select" name="selected_subject_name">
					<option  selected value="No subject selected">Choose Your Subject</option> 
					
				</select>
				<input  class="enterbutton" type="submit" name="batch_submit" value="Enter" >
</form>
</div>

<div class="date">
	<span class="day">Day:<?php $dayofweek =date("l"); echo $dayofweek ?></span><br>
	<span class="date1"><?php $today_date =date(" F jS , Y "); echo $today_date	?></span>
</div>

<div class="select_name">
			<span id="batch_name">
				<?php if (isset($_POST['batch_submit'])) { echo "Batch Name       :  ";  echo $_POST['batch_name1'];  } ?>
			</span>
			<span id="subject_name">
				<?php if (isset($_POST['batch_submit'])) { echo "Subject Name:";  echo $_POST['selected_subject_name'];  } ?>
			</span>
</div>

<div class="attendance_status">
	<?php if($flag==1){ ?>
		<div class="attendance_success" >Attendance is taken succesfully!!!</div>
	<?php } ?>	
	<?php if($flag==2){ ?>
		<div class="attendance_fail" >No Student to take Attendance</div>
	<?php } ?>
	<?php if($flag1==3){ ?>
		<div class="attendance_fail" >Todays Attendance Has Been Taken Already </div>
	<?php } ?>
	<?php if($flag==-1){ ?>
		<div class="attendance_crash">Error</div>
	<?php } ?> 
	
</div>



<div class="attendance_sheet">
			<?php if (isset($_POST['batch_submit']) ){
			$subject_name =$_POST['selected_subject_name'];
			$subject_name_withoutspace= str_replace(" ", "_", $subject_name);
			$table_name = $_POST['batch_name1'];
			if($table_name !="No batch selected" && $subject_name!="Not selected"){ ?>
			<form method="POST" action="Home.php" value="attendance">

				<table class="table1">
					<thead>
						<tr>
							<th>Roll no</th>
							<th>Name       </th>
							<th>Attendance </th>
						</tr>
					</thead>
					<tbody>
						<input type="hidden" name="table_name" value=<?php echo $table_name; ?>>
						<input type="hidden" name="subject_name" value=<?php echo $subject_name_withoutspace; ?> >
					<?php 
						
						$sql="SELECT * FROM $table_name order by student_name asc";
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
							
							<td style="max-width: 20vw; word-wrap: break-word;"><?php echo $row['student_name'] ; ?></td>
							<input type="hidden" value="<?php echo $row['student_name'] ; ?>" name="student_name[]">
							
							<td>
							<div class="status">
							<input type="radio"  id="present+<?php echo $counter;?>" name="attendance_status[<?php echo $counter;?>]" value="present" >
							<label  for="present+<?php echo $counter;?>" class="present_class" >Present</label>

							<input  type="radio" id="absent+<?php echo $counter;?>" name="attendance_status[<?php echo $counter;?>]" value="absent" required >
							<label for="absent+<?php echo $counter;?>" class="absent_class" >Absent</label> 
							</div>

							</td>
						</tr>
					<?php 
				$counter++;} ?>
					</tbody>
				</table>
				<input class="btn" type="submit" name="submit" value="SUBMIT">
			</form>
<?php }} ?>


</div>

<div class="svg">
<?xml version="1.0" encoding="utf-8"?>
<!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<svg version="1.1" id="f9bc2a0f-651a-4336-bfd5-9ca8f57cbc4d"
	 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 567 666.5"
	 style="enable-background:new 0 0 567 666.5;" xml:space="preserve">

<title>Choose</title>
<polygon class="st0" points="528.8,115.5 474.5,99.1 471.2,173.3 528.3,190.5 "/>
<polygon class="st0" points="146.8,0 146.8,75.5 471.2,173.3 474.5,99.1 "/>
<polygon class="st1" points="528.8,115.5 474.5,99.1 471.2,173.3 528.3,190.5 "/>
<polygon class="st2" points="528.8,257.6 474.5,241.2 471.2,315.4 528.3,332.6 "/>
<polygon class="st2" points="146.8,142.1 146.8,217.6 471.2,315.4 474.5,241.2 "/>
<polygon class="st1" points="528.8,257.6 474.5,241.2 471.2,315.4 528.3,332.6 "/>
<polyline class="st3" points="488.3,283.7 497.2,297.1 514.9,274.9 "/>
<g class="st4">
	<line class="st3" x1="488.8" y1="128.3" x2="506.5" y2="159.4"/>
	<line class="st3" x1="511" y1="132.7" x2="488.8" y2="155"/>
</g>
<polygon class="st0" points="528.8,390.8 474.5,374.4 471.2,448.6 528.3,465.8 "/>
<polygon class="st0" points="146.8,275.4 146.8,350.9 471.2,448.6 474.5,374.4 "/>
<polygon class="st1" points="528.8,390.8 474.5,374.4 471.2,448.6 528.3,465.8 "/>
<g class="st4">
	<line class="st3" x1="488.8" y1="403.7" x2="506.5" y2="434.7"/>
	<line class="st3" x1="511" y1="408.1" x2="488.8" y2="430.3"/>
</g>
<ellipse class="st5" cx="371.1" cy="243.8" rx="11.1" ry="22.2"/>
<ellipse class="st6" cx="371.1" cy="243.8" rx="93.3" ry="186.5"/>
<ellipse class="st7" cx="371.1" cy="243.8" rx="51.1" ry="102.1"/>
<g class="st8">
	<rect x="3.5" y="110.3" class="st9" width="1.5" height="8.4"/>
	<rect y="113.7" class="st9" width="8.4" height="1.5"/>
</g>
<g class="st8">
	<rect x="528.5" y="519.3" class="st9" width="1.5" height="8.4"/>
	<rect x="525" y="522.7" class="st9" width="8.4" height="1.5"/>
</g>
<g class="st8">
	<rect x="492" y="341.2" class="st9" width="1.5" height="8.4"/>
	<rect x="488.5" y="344.7" class="st9" width="8.4" height="1.5"/>
</g>
<g class="st8">
	<rect x="428.8" y="512" class="st9" width="1.5" height="8.4"/>
	<rect x="425.4" y="515.4" class="st9" width="8.4" height="1.5"/>
</g>
<g class="st8">
	<rect x="384.4" y="619.1" class="st9" width="1.5" height="8.4"/>
	<rect x="381" y="622.5" class="st9" width="8.4" height="1.5"/>
</g>
<g class="st8">
	<rect x="66.6" y="240.1" class="st9" width="1.5" height="8.4"/>
	<rect x="63.2" y="243.5" class="st9" width="8.4" height="1.5"/>
</g>
<path class="st10" d="M89.7,109.5c-0.8-0.4-1.3-1.3-1-2.2c0-0.1,0-0.1,0-0.2l0,0c0-0.5-0.4-0.9-0.9-1c-0.3,0-0.6,0.1-0.8,0.4l0,0
	c0,0.1-0.1,0.1-0.1,0.2c-0.4,0.8-1.3,1.3-2.2,1c-0.1,0-0.1,0-0.2,0l0,0c-0.5,0-0.9,0.4-1,0.9c0,0.3,0.1,0.6,0.4,0.8l0,0
	c0.1,0,0.1,0.1,0.2,0.1c0.8,0.4,1.3,1.3,1,2.2c0,0.1,0,0.1,0,0.2l0,0c0,0.5,0.4,0.9,0.9,1c0.3,0,0.6-0.1,0.8-0.4l0,0
	c0-0.1,0.1-0.1,0.1-0.2c0.4-0.8,1.3-1.3,2.2-1c0.1,0,0.1,0,0.2,0l0,0c0.5,0,0.9-0.4,1-0.9c0-0.3-0.1-0.6-0.4-0.8l0,0
	C89.8,109.5,89.7,109.5,89.7,109.5z"/>
<path class="st10" d="M422.9,35.3c-0.8-0.4-1.3-1.3-1-2.2c0-0.1,0-0.1,0-0.2l0,0c0-0.5-0.4-0.9-0.9-1c-0.3,0-0.6,0.1-0.8,0.4l0,0
	c0,0.1-0.1,0.1-0.1,0.2c-0.4,0.8-1.3,1.3-2.2,1c-0.1,0-0.1,0-0.2,0l0,0c-0.5,0-0.9,0.4-1,0.9c0,0.3,0.1,0.6,0.4,0.8l0,0
	c0.1,0,0.1,0.1,0.2,0.1c0.8,0.4,1.3,1.3,1,2.2c0,0.1,0,0.1,0,0.2l0,0c0,0.5,0.4,0.9,0.9,1c0.3,0,0.6-0.1,0.8-0.4l0,0
	c0-0.1,0.1-0.1,0.1-0.2c0.4-0.8,1.3-1.3,2.2-1c0.1,0,0.1,0,0.2,0l0,0c0.5,0,0.9-0.4,1-0.9c0-0.3-0.1-0.6-0.4-0.8l0,0
	C423,35.3,422.9,35.3,422.9,35.3z"/>
<path class="st10" d="M13.3,299.3c-0.8-0.4-1.3-1.3-1-2.2c0-0.1,0-0.1,0-0.2l0,0c0-0.5-0.4-0.9-0.9-1c-0.3,0-0.6,0.1-0.8,0.4l0,0
	c0,0.1-0.1,0.1-0.1,0.2c-0.4,0.8-1.3,1.3-2.2,1c-0.1,0-0.1,0-0.2,0l0,0c-0.5,0-0.9,0.4-1,0.9c0,0.3,0.1,0.6,0.4,0.8l0,0
	c0.1,0,0.1,0.1,0.2,0.1c0.8,0.4,1.3,1.3,1,2.2c0,0.1,0,0.1,0,0.2l0,0c0,0.5,0.4,0.9,0.9,1c0.3,0,0.6-0.1,0.8-0.4l0,0
	c0-0.1,0.1-0.1,0.1-0.2c0.4-0.8,1.3-1.3,2.2-1c0.1,0,0.1,0,0.2,0l0,0c0.5,0,0.9-0.4,1-0.9c0-0.3-0.1-0.6-0.4-0.8l0,0
	C13.4,299.3,13.3,299.3,13.3,299.3z"/>
<path class="st10" d="M26.6,485.8c-0.8-0.4-1.3-1.3-1-2.2c0-0.1,0-0.1,0-0.2l0,0c0-0.5-0.4-0.9-0.9-1c-0.3,0-0.6,0.1-0.8,0.4l0,0
	c0,0.1-0.1,0.1-0.1,0.2c-0.4,0.8-1.3,1.3-2.2,1c-0.1,0-0.1,0-0.2,0l0,0c-0.5,0-0.9,0.4-1,0.9c0,0.3,0.1,0.6,0.4,0.8l0,0
	c0.1,0,0.1,0.1,0.2,0.1c0.8,0.4,1.3,1.3,1,2.2c0,0.1,0,0.1,0,0.2l0,0c0,0.5,0.4,0.9,0.9,1c0.3,0,0.6-0.1,0.8-0.4l0,0
	c0-0.1,0.1-0.1,0.1-0.2c0.4-0.8,1.3-1.3,2.2-1c0.1,0,0.1,0,0.2,0l0,0c0.5,0,0.9-0.4,1-0.9c0-0.3-0.1-0.6-0.4-0.8l0,0
	C26.7,485.9,26.7,485.8,26.6,485.8z"/>
<circle class="st11" cx="248.7" cy="134.5" r="3"/>
<circle class="st10" cx="328.7" cy="520.9" r="3"/>
<ellipse class="st10" cx="510.7" cy="214.5" rx="3" ry="3"/>
<circle class="st12" cx="564" cy="347.7" r="3"/>
<circle class="st11" cx="365.7" cy="11.6" r="3"/>
<rect x="212.2" y="141.7" transform="matrix(3.875078e-02 -0.9992 0.9992 3.875078e-02 65.1156 373.1907)" class="st13" width="28.6" height="22.2"/>
<path class="st014" d="M316.3,238.1c0,0,30.8-14.7,30.3-2s-31,21.1-31,21.1L316.3,238.1z"/>
<path class="st15" d="M299.4,345.6c0,0,14.5,35.5,19.9,61.2c5.4,25.6,13.5,60.9,3,86c-10.5,25-40.4,98.6-40.7,106.5
	c-0.3,7.9,2.6,16-3.8,15.8s-40.9-11.1-42.3-16s11.8-17,11.8-17L279.9,480l-34-66.5l-24.5,99.2l-4.8,123.8c0,0-23.6-7.3-27-1
	c0,0-10.6-14.7-11.9-21.1s5-128.6,5-128.6s-21.6-139.2-4.2-138.5S264.4,306.1,299.4,345.6z"/>
<path class="st16" d="M278.1,608.7c0,0,16.1,35.6,17.6,37.3c1.5,1.6,12,18,4.1,17.6s-26.7-9-40.5-22.2c-13.8-13.3-32-36.2-30.3-37.7
	s12.9-5.9,12.9-5.9L278.1,608.7z"/>
<path class="st16" d="M213.7,628.4c0,0,1,15.9,3.9,22.4s2.6,16-5.4,15.7c-7.9-0.3-28.5-4.3-28.5-4.3s-1.2-9.6,0.4-11.1
	s8.7-18.7,5.7-23.6S213.7,628.4,213.7,628.4z"/>
<path class="st14" d="M202,111.3c0,0-16.9,26.4-23.5,32.5s12,19.5,12,19.5l33.2,4.5c0,0-0.4-30.2,1.3-33.3S202,111.3,202,111.3z"/>
<path class="st17" d="M230.8,145.8c0,0-6.8,12.5-13.2,12.2s-39.2-14.2-40.6-19.1s-10.9,34.6-10.9,34.6l80.4,141.4l19.6-13.5l-9.5-83
	l-7.8-44.8L230.8,145.8z"/>
<path class="st18" d="M174.1,272.3c3.2,6.7,5.2,13.7,4.9,20.9c0,0.3,0,0.6-0.1,1c-0.8,14.7-6.2,31.7-8.1,44
	c-1.4,8.9-1,15.3,4.2,16.9c12.6,3.7-1.8,6.3,46.8,22.5s57.2,2.2,57.3-1s-6.9-27.3-5.2-28.8s23.1,20,29.5,17s0.7-19.1,0.7-19.1
	s-14.6-34-14.3-41.9s-22.1-45.4-22.1-45.4l-15.2-99.2c0,0-5.9-12.9-13.7-14.8s-14.4,2.6-14.4,2.6l13.2,29.1l13.9,51.4l-2.3,19
	c0,0-16.2-34-26.8-47.1s-33.3-44.2-33.3-44.2s-5.3-17.8-1.3-23.2c4-5.3-16.6-6.1-25.4,15.8c-4.7,11.6-12.2,28.9-17,45.1
	c-4.2,14.3-6.2,27.6-2,35.3C149.8,239.9,165.9,255.2,174.1,272.3z"/>
<path class="st1" d="M143.4,228.2c6.4,11.7,22.5,27,30.7,44.1c2.1-7.7,4.8-15.7,4.8-15.7s10-53.7-19.6-67.5
	c-4.9-0.5-9.8,0.9-13.8,3.9C141.2,207.2,139.2,220.6,143.4,228.2z"/>
<path class="st18" d="M261.2,224.8l25.2,7.3l34.9,1.4l3.6,30.3l-57.4,4.1C267.4,268,253.1,227.7,261.2,224.8z"/>
<path class="st14" d="M220.1,326.9c0,0,33.7,5.6,26,15.7s-37.5-0.5-37.5-0.5L220.1,326.9z"/>
<path class="st1" d="M179,294.2c-0.8,14.7-6.2,31.7-8.1,44c10.7,10.1,20.9,19.1,24.8,19.2c7.9,0.3,20.7-0.8,25.4,1
	s7.5-28.3,7.5-28.3s-2.8-9.6-15.3-14.9C204.7,311.6,188.5,302,179,294.2z"/>
<path class="st18" d="M159.6,179.6c0,0-26.9-4.2-25.4,40.4s-2.8,73,8,81.4s45.9,46.3,53.8,46.6s20.7-0.8,25.4,1s7.5-28.3,7.5-28.3
	s-2.8-9.6-15.3-14.9s-42-23.9-41.8-30.2s7.5-28.3,7.5-28.3S189.2,193.4,159.6,179.6z"/>
<ellipse transform="matrix(0.2669 -0.9637 0.9637 0.2669 54.33 302.0543)" class="st14" cx="225.7" cy="115.3" rx="35" ry="35"/>
<path class="st19" d="M249.2,65.3c0.8,0.7,1.9,1.2,2.9,1.5c1.1,0.2,2.2-0.5,2.4-1.7c0.8,1.7,1.7,3.4,3.3,4.3s4.2,0.1,4.4-1.7
	c0.2,1.4,0.9,2.7,1.8,3.7c1,1,2.8,1.2,3.7,0.1c-0.7,3.9-0.3,7.9-0.5,11.9s-1.3,8.2-4.3,10.8c-4.4,3.8-10.9,2.9-16.7,2.1
	c-0.9-0.2-1.8-0.1-2.6,0.1c-2.2,0.9-2.1,3.9-2.1,6.3c-0.4,8.5-6.8,15.5-15.2,16.5c-2.3,0.4-4.6-0.2-6.5-1.6
	c-1.6-1.4-2.5-3.6-4.3-4.7c-3-1.7-6.7,0.8-9,3.5s-4.4,6-7.9,6.5c-4.6,0.6-8-4-9.7-8.3c-4.7-12.1-4.4-25.6,1-37.5
	C199.5,56.4,232,53.1,249.2,65.3z"/>
</svg>

</div>
<script type="text/javascript">
const toggleButton = document.getElementsByClassName('toggle-button')[0]
const navbarLinks = document.getElementsByClassName('navbar-links')[0]

toggleButton.addEventListener('click', () => {
  navbarLinks.classList.toggle('active')
})
</script>
</body>
</html>