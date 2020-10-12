<?php
include_once 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Calender</title>
	
	<link rel="stylesheet" type="text/css" href="CSS/Viewcss.css">
	<link rel="stylesheet" type="text/css" href="CSS/calender1.css">
	
</head>
<body>
	<header>
		<div class="navigation">	
			<nav>
				<ul> 
				<li><a href="Home.php">Home</a> </li>
				<li><a href="view.php">View</a> </li>
				<li><a href="Statistics.php">Statistics</a> </li>     			   <!-- nav bar -->
				<li><a href="index.php">logout</a> </li>
				</ul>
			</nav>
		</div>
	</header>
	<div class="main">
	<div class="time">Date:<?php $today_date = date("Y-m-d"); echo $today_date	?></div>
	<p>
		Choose the date:
	</p>
	<div class="date-picker">
		<div class="selected-date"></div>

		<div class="dates">
			<div class="month">
				<div class="arrows prev-mth">&lt;</div>
				<div class="mth"></div>
				<div class="arrows next-mth">&gt;</div>
			</div>
			<div class="days"></div>
		</div>
	</div>
    <script type="text/javascript" src="JS/calender.js"></script>
	 <div class="contain">
			<h1 id="batch">View For Batch :</h1>
			<form class="newtype" action="view.php" method="POST">
            <select id="batch_select" class="batch" name="batch_name1" onchange="populate('batch_select','batch_name')">
                    <option disabled selected value="error">Choose Your Batch</option> 
                <?php 
                    $sql_select_batch="SELECT * FROM `batch_list`;";
                    $result_batch=mysqli_query($conn ,$sql_select_batch);
                    while($row= mysqli_fetch_assoc($result_batch)){         
                   ?>
                <option required value="<?php echo $row['batchname']?>" name="option_value" >       <!-- Batch Select Option Menu-->
                    <?php echo $row['batchname'] ;?>
                </option>
                <?php }?>
        </select>
        <input class="btn1" type="submit" name="batch_submit" value="Enter"  >
    </form>
	 </div>
		<div class="phpclass">	
		<?php 
			if (isset($_POST['batch_submit'])) {
				$batch_name1=$_POST['batch_name1'];
				$attendance_record_name=$batch_name1 ."_attendance_record";
				$sql_date="SELECT distinct date FROM $attendance_record_name ;";
				$result_date=mysqli_query($conn ,$sql_date);
				while($row_date= mysqli_fetch_assoc($result_date)){                 
		?>
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
			$batch_name1=$_POST['batch_name1'];
			$attendance_record_name=$batch_name1 ."_attendance_record";
			$date=$row_date['date'];
			$sql="SELECT * FROM $attendance_record_name Where date='$date'";
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
		<?php $counter++;
		}?>
		</table>
		<?php } } ?>
		</div>
</div>	
	</body>
</html>