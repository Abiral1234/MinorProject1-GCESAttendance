<?php 
include_once 'connection.php'; 
	
	$name =$_POST['name'];
	$subject =$_POST['program'];
	$year =$_POST['year'];
	$sql="INSERT INTO `add student`(name ,year ,subject)
    VALUES('$name' ,'$year', '$subject' ) ";
    $result= mysqli_query($conn ,$sql);

    header("Location: Home.php");

?>
