<?php
include_once 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Page</title>
	
	<link rel="stylesheet" type="text/css" href="CSS/Viewcss2.css">
	<link rel="stylesheet" type="text/css" href="CSS/calender5.css">

	<script type="text/javascript">	
		var pair; 	
		function populate(s1,s2){   //funtion that run when different batch is selected to put differernt subject 
			var s1=document.getElementById(s1);
			var s2=document.getElementById(s2);
			
			var thisYear=<?php echo date("Y");?>;
			var batchName=s1.value;

			var pair=batchName.split("_");    //splitting the batch name to program and year using "_" as separator
			var batchProgram =pair[0];      
			var batchAdmitYear = pair[1];
			

			var batchCurrentYear= thisYear - batchAdmitYear;

			s2.innerHTML = " ";
			if(batchProgram == "BESE"){      //TO select subjects of BESE
				if(batchCurrentYear == 1){   //BESE 1st Years
					var optionArray=["Choose Your Subject|Not selected","Engineering Mathematics I|MTH 112","Physics|PHY 111","Communication Technique|ENG 111","Problem Solving Techniques|CMP 114","Fundamentals of IT|CMP 110","Programming in C|CMP 113","Engineering Mathematics II|MTH 114","Logic Circuits|ELX 212","MFCS|MTH 130","Engineering Drawing|MEC 120","Object Oriented Programming in C|CMP 115","Web Technology|CMP 213"];

				}

				else if(batchCurrentYear == 2){   //BESE 2nd Years
					var optionArray=["Choose Your Subject|Not selected","Engineering Mathematics III|","Software Engineering Fundamentals|","Microprocessor and Assembly Lang Pro|","Data Structure and Algorithms|","Probability and Queuing Theory|","Programming in Java |","Numerical Methods|","Computer Graphics|","Computer Organization and Architecture|","Database Management Systems|","UML|"];

				}
				else if(batchCurrentYear == 3){   //BESE 3rd Years
					var optionArray=["Choose Your Subject|Not selected","Applied Operating System|","Simulation and Modeling|","Artificial Intelligence and Neural Network|","System Programming|","Analysis and Design of Algorithm|","Organization and Management|","Multimedia Systems|","Computer Networks|","Principles of Programming Languages|","Engineering Economics|","Object Oriented Software Development|"];

				}
				else if(batchCurrentYear == 4){   //BESE 4th Years
					var optionArray=["Choose Your Subject|Not selected","Real Time Systems|","Distributed Systems|","Enterprise Application Development|","Image Processing and Pattern Recognition|","Software Testing Validation and Quality Assur|","Elective I|","Network Programming|","Software Project Management|","Elective II|"];

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
	<div class="background_image"></div>
	<div class="background_image2"></div>
	<div class="main">

	<header>
		<nav class="navbar">
        <div class="brand-title">Gces Attendence</div>
        <a href="#" class="toggle-button">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </a>
        <div class="navbar-links">
				<ul> 
				<li><a href="admin_home.php">Home</a> </li>
				<li><a href="admin_view.php">View</a> </li>
				<li><a href="admin_statistics.php">Statistics</a> </li>        
				<li><a href="index.php">logout</a> </li>
				</ul>
		</div>
	  </nav>
	</header>
<label class="labeldate"><?php if(isset($_POST['batch_submit'])){ echo "Selected Date:". $_POST['selected_date'];}?></label>

<!-- Date picker and batch/subject selector in a form -->

	<form action="View.php" method="POST">
		

    
	<span class="label1" value="hi">View Attendance For</span>
		
	 <div class="contain">
			
			<div class="batchselector">
			<!-- Select Menu for batch imported  from batch table database-->
				<select id="batch_select" class="batch_select" name="batch_name1" onchange="populate('batch_select','subject_select')">
					<option  selected value="No batch selected" >Choose Your Batch</option> 
					<?php 
						$sql_select_batch="SELECT * FROM `batch_list`;";
						$result_batch=mysqli_query($conn ,$sql_select_batch);
						while($row= mysqli_fetch_assoc($result_batch)){         
		   			?>
					<option required value="<?php echo $row['batchname']?>" name="option_value" >

						<?php echo $row['batchname'] ;?>
					</option>

					<?php }?>	
				</select>

			<!-- Select Menu for subject shown according to selected batch-->

				<select id="subject_select" class="subject_select" name="selected_subject_name">
					<option  selected value="Not selected">Choose Your Subject</option> 
					
				</select>

				<p>
				Choose the date:
				</p>
				<input type="date" class="date_class"  name="selected_date"required>
				<input  class="btn1" type="submit" name="batch_submit" value="Enter">
		</form>

		<div id="batch_name">
			
				<?php if (isset($_POST['batch_submit'])) { echo "Batch Name       :  ";  echo $_POST['batch_name1'];  } ?>
		</div>
		<div id="subject_name">
			
				<?php if (isset($_POST['batch_submit'])) { echo "Subject Name:";  echo $_POST['selected_subject_name'];  } ?>
		</div>


<!--Attendance record in a table --> 
	 </div>
		<div class="phpclass">	

		<?php 
			if (isset($_POST['batch_submit'])) {

				
				$subject_name =$_POST['selected_subject_name'];
				$subject_name_withoutspace= str_replace(" ", "_", $subject_name);
				$attendance_record_name=$subject_name_withoutspace ."_attendance_record";//attendance_record_table_name

				//Creates attendance record table with name of the subject if not exists
				$sql_create2= "CREATE TABLE IF NOT EXISTS $attendance_record_name (   
  				`id` int(11)  NOT NULL AUTO_INCREMENT PRIMARY KEY,
  				`student_name` varchar(255) NOT NULL,
  				`roll_number` varchar(255) NOT NULL,
  				`attendance_status` varchar(255) NOT NULL,
  				`date` date NOT NULL )";
  				$result2=mysqli_query($conn,$sql_create2);


				$table_name=$_POST['batch_name1'];
				$picked_date=$_POST['selected_date'];
				if($table_name !="No batch selected" && $subject_name!="Not selected"){
				$sql_date="SELECT distinct date FROM $attendance_record_name ;";
				$result_date=mysqli_query($conn ,$sql_date);
				while($row_date= mysqli_fetch_assoc($result_date)){ 
					$counter=0;
				$database_date=$row_date['date'];
				if($database_date == $picked_date){
				$counter++; ?>               
		
		<label class="labeldate"><?php echo $row_date['date']; ?></label>       <!--DATE-->
		<table class="table1">	
			<thead>															<!--Attendance Record -->
				<tr>
					<th>Roll No</th>
					<th>Name</th>
					<th>Status</th>
				</tr>
			</thead>
			<?php 
			

			$sql="SELECT * FROM $attendance_record_name Where date='$picked_date'";
			$result=mysqli_query($conn ,$sql);
			$serial_number=0;
			$counter=0;
			while($row= mysqli_fetch_assoc($result)){
				$serial_number++;
		?>
			<tr>
				<td><?php echo $row['roll_number']; ?></td>
				<td><?php echo $row['student_name']; ?></td>
				<td><?php echo $row['attendance_status']; ?></td>
			</tr>
		<?php 
		}?>
		</table>
		<?php }  } } } ?>
		</div>


<script src="Js/navbar.js"></script>
		</body>
</html>