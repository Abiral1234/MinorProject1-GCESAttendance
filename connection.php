<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'Gces@54321');


//to make connection with localhost mysql

$connect_to_mysql = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);



//to create and make connection with gces_extra database


if($sql_create_extra_database="CREATE database gces_extra"){
	$result=mysqli_query($connect_to_mysql,$sql_create_extra_database);

}
$connect_to_extra_database = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD,'gces_extra');

//Check the connection
if($connect_to_extra_database == false){
    dir('Error: Cannot connect');
}


//to create and make connection with gces_lists database


if($sql_create_lists_database="CREATE database gces_lists"){
	$result=mysqli_query($connect_to_mysql,$sql_create_lists_database);

}
$connect_to_list_database = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD,'gces_lists');

//Check the connection
if($connect_to_list_database == false){
    dir('Error: Cannot connect');
}


//to create and make connection with gces_subjects database


if($sql_create_subjects_database="CREATE database gces_subjects"){
	$result=mysqli_query($connect_to_mysql,$sql_create_subjects_database);

}
$connect_to_subjects_database = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD,'gces_subjects');


//to create and make connection with every batch databases

 $year = date("Y")+1;
 $batch = array("BESE","BECE");
$k=0;
for ($j=0; $j <=1 ; $j++) { 
 for($i=4;$i>=1;$i--){
 	
	$batch_name = $batch[$j]."_".($year-$i);
	$database_name[$batch_name] = "gces_batch_".$batch_name;
	$k++;
}
}
 for ($j=0; $j <=1 ; $j++) { 
 for($i=4;$i>=1;$i--){
 $batch_name = $batch[$j]."_".($year-$i);
 $database_name[$batch_name] = "gces_batch_".$batch_name;

if($sql_create_batch_database="CREATE database $database_name[$batch_name]"){
	$result=mysqli_query($connect_to_mysql,$sql_create_batch_database);

}
$connection[$batch_name] = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD
	,$database_name[$batch_name]);
	}
}	



?>