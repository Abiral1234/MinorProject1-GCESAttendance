<?php 
include_once 'connection.php'; 
	
	$student_name =$_POST['name'];
	$batch = $_POST['program'];

	$sql="INSERT INTO $batch (student_name ,batch)
    VALUES('$student_name' , '$batch' ) ";
    $result= mysqli_query($conn ,$sql);

   header("Location: Home.php"); 

?>
