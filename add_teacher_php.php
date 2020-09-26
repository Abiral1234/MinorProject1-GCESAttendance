<?php 
include_once 'connection.php';
	$sql_create = "CREATE TABLE IF NOT EXISTS TeacherList (
  		`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		`teacher_name` varchar(255) NOT NULL,
  		`Username` varchar(255) NOT NULL,
  		`Password` varchar(255) NOT NULL,
 		`Subjects` varchar(255) NOT NULL,
 		`Years` int(11) NOT NULL
		) ";
	if($result=mysqli_query($conn,$sql_create)){
	header("Location: Home.php");}

	else{
		echo "Error";
	}


?>