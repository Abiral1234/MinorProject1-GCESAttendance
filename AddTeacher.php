<?php
include_once'connection.php';

if(isset($_POST['teacher_submit'])){
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $username=$_POST['username'];
    $password=$_POST['pword'];
    $sql_insert="INSERT INTO teacherlist (first_name ,last_name ,Username ,Password ) VALUES('$first_name','$last_name','$username','$password')";
    if($result2=mysqli_query($conn,$sql_insert)){ }
    else{
        echo "Error";
    }

}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="CSS/AddTeacherCss1.css">
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
            <p id="invalid"></p>
            <form action="AddTeacher.php" name="form1" method="POST">
                <div class="input name">
                    <span>First Name :</span><br>
                    <input type="text" id="name" name="first_name" class="_dinput"><br>
                    <span>Last Name:</span><br>
                    <input type="text" id="name" name="last_name" class="_dinput"><br>
                </div>
                <div class="input username">
                    <span>Username</span>
                    <input type="text" id="username" name="username" class="_dinput"><br>
                </div>
                <div class="input password">
                    <span>Password</span>
                    <input type="password" id="pword" name="pword" class="_dinput" placeholder="Must be longer than 6"><br>
                </div>
                <div class="classes">
                    <div class="column">
                        <input type="checkbox" id="1stsem" name="1stsem" value="first">
                        <label for="1stsem">1st Semester</label><br>
                        <input type="checkbox" id="3rdsem" name="3rdsem" value="third">
                        <label for="1stsem">3rd Semester</label><br>
                        <input type="checkbox" id="5thsem" name="5thsem" value="fifth">
                        <label for="1stsem">5th Semester</label><br>
                        <input type="checkbox" id="7thsem" name="7thsem" value="seventh">
                        <label for="1stsem">7th Semester</label><br>
                        </div>
                    <div class="column">
                        <input type="checkbox" id="2ndsem" name="2ndsem" value="second">
                        <label for="1stsem">2nd Semester</label><br>
                        <input type="checkbox" id="4thsem" name="4thsem" value="fourth">
                        <label for="1stsem">4th Semester</label><br>
                        <input type="checkbox" id="6thsem" name="6thsem" value="sixth">
                        <label for="1stsem">6th Semester</label><br>
                        <input type="checkbox" id="8thsem" name="8thsem" value="eighth">
                        <label for="1stsem">8th Semester</label><br>
                    </div>
                </div>
                <input type="submit" value="Enter the data" name="teacher_submit"class="btn">
            </form>
        </div>
        <script src="JS/addteachervalidate.js" type="text/javascript"></script>

        <table class="teacher_table">
            <thead>
                <tr >   
                    <td>No.</td>
                    <td>Teacher Name List</td>
                </tr>
            </thead>
            <tbody>
                <?php 
               $sql_create = "CREATE TABLE IF NOT EXISTS teacherlist (
            `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `first_name` varchar(255) NOT NULL,
            `last_name` varchar(255) NOT NULL,
            `Username` varchar(255) NOT NULL,
            `Password` varchar(255) NOT NULL
            ) ";
            if($result1=mysqli_query($conn,$sql_create)){ }
            else{
             echo "Error";
            }
  
                $sql_select="SELECT * FROM teacherlist";
                $result3=mysqli_query($conn,$sql_select);
                $serial_number=0;
                while ($row=mysqli_fetch_assoc($result3)) {
                     $serial_number++;
                 ?>
                <tr>
                    <td><?php echo $serial_number; ?></td>
                    <td><?php 
                    echo $row['first_name']." ".$row['last_name'] ?></td>
                </tr>
            <?php }?>
            </tbody>
        </table>

<script src="Js/navbar.js"></script>
    </body>
</html>