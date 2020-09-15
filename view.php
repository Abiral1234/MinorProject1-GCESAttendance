<?php
include_once 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Calender</title>
	<link rel="stylesheet" type="text/css" href="CSS/ViewCss.css">
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

		<div class="calendar">

			<div class="col leftCol">
				<div class="content">
					<h1 class="date">Friday<span>July 24th</span></h1>
				</div>
			</div>

			<div class="col rightCol">
				<div class="content">
					<h2 class="year">2020</h2>
					<ul class="months">
						<li><a href="#" title="Jan" data-value="1">Jan</a></li>
						<li><a href="#" title="Feb" data-value="2">Feb</a></li>
						<li><a href="#" title="Mar" data-value="3">Mar</a></li>
						<li><a href="#" title="Apr" data-value="4">Apr</a></li>               
						<li><a href="#" title="May" data-value="5">May</a></li>
						<li><a href="#" title="Jun" data-value="6">Jun</a></li>
						<li><a href="#" title="Jul" data-value="7" class="selected">Jul</a></li>  			 <!--CALENDER-->
						<li><a href="#" title="Aug" data-value="8">Aug</a></li>
						<li><a href="#" title="Sep" data-value="9" >Sep</a></li>
						<li><a href="#" title="Oct" data-value="10">Oct</a></li>
						<li><a href="#" title="Nov" data-value="11">Nov</a></li>
						<li><a href="#" title="Dec" data-value="12">Dec</a></li>
					</ul>
					<div class="clearfix"></div>
					<ul class="weekday">
						<li><a href="#" title="Mon" data-value="1">Mon</a></li>
						<li><a href="#" title="Tue" data-value="2">Tue</a></li>
						<li><a href="#" title="Wed" data-value="3">Wed</a></li>
						<li><a href="#" title="Thu" data-value="4">Thu</a></li>
						<li><a href="#" title="Fri" data-value="5">Fri</a></li>
						<li><a href="#" title="Say" data-value="6">Sat</a></li>
						<li><a href="#" title="Sun" data-value="7">Sun</a></li>
					</ul>
					<div class="clearfix"></div>
					<ul class="days">
						<script>
							for( var _i = 1; _i <= 31; _i += 1 ){
								var _addClass = '';
								if( _i === 24 ){ _addClass = ' class="selected"'; }
								
								switch( _i ){
									case 6:
									case 13:
									case 20:
									case 27:
										_addClass = ' class="event"';
									break;
								}

								document.write( '<li><a href="#" title="'+_i+'" data-value="'+_i+'"'+_addClass+'>'+_i+'</a></li>' );
							}
						</script>
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>

			<div class="clearfix"></div>

		</div>

		
		<table class="table1">	
			<thead>															<!--Attendance Record -->
				<tr>
					<th>Roll No</th>
					<th>Name</th>
					<th>Status</th>
				</tr>
			</thead>
		<?php 
			$sql="SELECT * FROM `attendance_records`;";
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


		</body>
</html>