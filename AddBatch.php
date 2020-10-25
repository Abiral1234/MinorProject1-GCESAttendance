<?php 
include_once 'connection.php';
  	if(isset($_POST['batch_submit2'])){
	$batch_program =$_POST['program'];
	$batch_year =$_POST['year'];
	$name =$batch_program ."_". $batch_year;

//creating student list

	$sql_create1 = "CREATE TABLE IF NOT EXISTS $name (     
  		`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		`student_name` varchar(255) NOT NULL,
  		 `roll_number` int(11) NOT NULL,
 		 `reg_number` int(15) NOT NULL,
 		 `gender` varchar(255) NOT NULL
		) ";
	if($result1=mysqli_query($conn,$sql_create1)){}
	else{
		echo "Error1";
	}

//creating batch list
	

//checking duplicate
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

   }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="CSS/AddBatchCss1.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
</head>

<body>

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
	<div class="container">
            
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
		
		<script src="JS/AddBatch.js" type="text/javascript"></script>
		</div>

	
			
		
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
	
<script src="Js/navbar.js"></script>
	
</body>
</html>