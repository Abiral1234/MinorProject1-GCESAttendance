<?php 
include_once 'connection.php';
	$batch_program =$_POST['program'];
	$batch_year =$_POST['year'];
	$name =$batch_program ."_". $batch_year;

	$sql_create1 = "CREATE TABLE IF NOT EXISTS $name (
  		`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		`student_name` varchar(255) NOT NULL,
  		/* `roll_number` varchar(255) NOT NULL,*/
 		`batch` varchar(255) NOT NULL
		) ";
	if($result1=mysqli_query($conn,$sql_create1)){}
	else{
		echo "Error1";
	}

	$attendance_sheet= $name . "_attendance_record";
	$sql_create2= "CREATE TABLE IF NOT EXISTS $attendance_sheet (
  	`id` int(11)  NOT NULL AUTO_INCREMENT PRIMARY KEY,
  	`student_name` varchar(255) NOT NULL,
  	`roll_number` varchar(255) NOT NULL,
  	`attendance_status` varchar(255) NOT NULL,
  	`date` date NOT NULL )"; 

  	if($result2=mysqli_query($conn,$sql_create2)){ }
	else{
		echo "Error2";
	} 

	$sql_create3= "CREATE TABLE IF NOT EXISTS `Batch_List` (
  	`id` int(11)  NOT NULL AUTO_INCREMENT PRIMARY KEY,
  	`batchname` varchar(255) NOT NULL UNIQUE
  	 )"; 

  	if($result3=mysqli_query($conn,$sql_create3)){ }
	else{
		echo "Error2";
	} 


	$dup=mysqli_query($conn,"select * from `Batch_list` WHERE batchname='$name'");
	if(mysqli_num_rows($dup)>0){
		header("Location: Home.php");
	}

	else{
	$sql_add_batch="INSERT  INTO `batch_list`(batchname)
    VALUES('$name') ";

    if($result= mysqli_query($conn ,$sql_add_batch)){
    	 header("Location: Home.php");
    }
	}

   
?>