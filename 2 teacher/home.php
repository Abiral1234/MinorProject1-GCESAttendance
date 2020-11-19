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
	<link rel="stylesheet" type="text/css" href="../CSS/homecss5.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

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
					var optionArray=["Choose Your Subject|Not selected","Engineering Mathematics-I|MTH 112","Physics|PHY 111","Communication Technique|ENG 111","Problem Solving Techniques|CMP 114","Fundamentals of IT|CMP 110","Programming in C|CMP 113","Engineering Mathematics-II|MTH 114","Logic Circuits|ELX 212","Mathematical Foundation of Computer Science|MTH 130","Engineering Drawing|MEC 120","Object Oriented Programming in C++|CMP 115","Web Technology|CMP 213"];

				}

				else if(batchCurrentYear == 2){   //BESE 2nd Years
					var optionArray=["Choose Your Subject|Not selected","Engineering Mathematics- III|","Software Engineering Fundamentals|","Microprocessor & Assembly Lang. Pro.|","Data Structure and Algorithms|","Probability & Queuing Theory|","Programming in Java |","Numerical Methods|","Computer Graphics|","Computer Organization & Architecture|","Database Management Systems|","Object Oriented Design & Modeling through UML|"];

				}
				else if(batchCurrentYear == 3){   //BESE 3rd Years
					var optionArray=["Choose Your Subject|Not selected","Applied Operating System|","Simulation & Modeling|","Artificial Intelligence & Neural Network|","System Programming|","Analysis & Design of Algorithm|","Organization and Management|","Multimedia Systems|","Computer Networks|","Principles of Programming Languages|","Engineering Economics|","Object Oriented Software Development|"];

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
					var optionArray=["Choose Your Subject|Not selected","Engineering Economics|","Computer Architecture|","Digital Signal Processing|","Computer Network|","Elective I|","Organization and Management|","Artificial Intelligence|","Image Processing & Pattern Recognition|","Elective II|"]
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
							<td><?php echo $row['student_name'] ; ?></td>
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


<script type="text/javascript">
const toggleButton = document.getElementsByClassName('toggle-button')[0]
const navbarLinks = document.getElementsByClassName('navbar-links')[0]

toggleButton.addEventListener('click', () => {
  navbarLinks.classList.toggle('active')
})
</script>
</body>
</html>