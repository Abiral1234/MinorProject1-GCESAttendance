<?php
include_once'../connection.php';

if(isset($_POST['admin_submit'])){
    $username=$_POST['username'];
    $password=$_POST['pword'];
    $sql_insert="INSERT INTO adminlist(Username ,Password ) VALUES('$username','$password')";
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
    <link rel="stylesheet" type="text/css" href="../CSS/AddTeachercss.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
</head>

<body>

    <header>
      <nav class="navbar">
        <div class="brand-title">Gces Attendance</div>
        <a href="#" class="toggle-button">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </a>
        <div class="navbar-links">
            <ul> 
                <li><a href="Home.php">Home</a> </li>
                <li><a href="view.php">View</a> </li>
                <li><a href="Statistics.php">Statistics</a> </li>                  <!-- nav bar -->
                <li><a href="notice.php">Notice</a></li>
                <li><a href="../index.php">logout</a> </li>

            </ul>
        </div>
      </nav>
</header>
    
<script src="../Js/navbar.js"></script>
        <div class="container">
            <p id="invalid"></p>
            <form action="AddAdmin.php" name="form1" method="POST">
                
                <div class="input username">
                    <span>Username</span>
                    <input type="text" id="username" name="username" class="_dinput"><br>
                </div>
                <div class="input password">
                    <span>Password</span>
                    <input type="password" id="pword" name="pword" class="_dinput" placeholder="Must be longer than 6"><br>
                </div>
              
                <input type="submit" value="Enter the data" name="admin_submit"class="btn">
            </form>
        </div>
        <script src="../JS/addteachervalidate.js" type="text/javascript"></script>
    <div class="teachertable">
        <table class="teacher_table">
            <thead>
                <tr >   
                    <td>No.</td>
                    <td>Admin Name List</td>
                </tr>
            </thead>
            <tbody>
                <?php 
               $sql_create = "CREATE TABLE IF NOT EXISTS AdminList (
            `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `Username` varchar(255) NOT NULL,
            `Password` varchar(255) NOT NULL
            ) ";
            if($result1=mysqli_query($conn,$sql_create)){ }
            else{
             echo "Error";
            }
  
                $sql_select="SELECT * FROM Adminlist";
                $result3=mysqli_query($conn,$sql_select);
                $serial_number=0;
                while ($row=mysqli_fetch_assoc($result3)) {
                     $serial_number++;
                 ?>
                <tr>
                    <td><?php echo $serial_number; ?></td>
                    <td><?php 
                    echo $row['Username']; ?></td>
                </tr>
            <?php }?>
            </tbody>
        </table>
     </div>

    </body>
</html>