<?php
include_once '../connection.php'
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
   
    <link rel="stylesheet" type="text/css" href="../CSS/AddRoutine3.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="../CSS/nav.css">

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
                <li><a href="Home.php">Attendance</a> </li>
                <li><a href="routine.php">Routine</a> </li>
                <li><a href="notes.php">Notes</a> </li>        <!-- nav bar -->
                <li><a href="notice.php">Notice</a></li>
                <li><a href="../index.php">logout</a> </li>

            </ul>
        </div>
      </nav>
</header>



<!-- UPLOAD CLASS ROUTINE -->
<div class="mainsec">
<div class="routine">
 <h1>Class Routine</h1>            
  
        <?php
        $sql_select_image="SELECT * FROM `classroutine` ORDER BY datetime desc LIMIT 1  ;";
        $result2=mysqli_query($connect_to_extra_database,$sql_select_image);
        while($row=mysqli_fetch_assoc($result2)){ 
          $imageurl = $row['imageurl'];
          $datetime0=$row['datetime'];

        echo "<a href='$imageurl'><img src='$imageurl' width='100%' height='100%'/><a>";

        } ?>
</div>

<!-- UPLOAD EXAM ROUTINE -->


<div class="exam_routine">
  <h1 id="h1examroutine" style="color: black;">Exam Routine</h1>
       
        <?php
        if (isset($_POST['submit'])) {
        $filename=$_FILES["uploadfile"]["name"];
        $tempname=$_FILES["uploadfile"]["tmp_name"];
        $folder="../RoutineImage/".$filename;
        move_uploaded_file( $tempname ,$folder );
        $datetime=date("Y-m-d H:i:s");
        $sql_insert_image="INSERT INTO examroutine (imageurl,datetime) VAlUES('$folder','$datetime') ";  //to move image to our folder and pass our url to database 
        $result=mysqli_query($connect_to_extra_database,$sql_insert_image);

        }
        ?>
        <?php
        $sql_select_image="SELECT * FROM `examroutine` ORDER BY datetime desc LIMIT 1  ;";
        $result2=mysqli_query($connect_to_extra_database,$sql_select_image);
        while($row=mysqli_fetch_assoc($result2)){ 
          $imageurl = $row['imageurl'];
          $datetime0=$row['datetime'];

        echo "<a href='$imageurl'><img src='$imageurl' width='100%' height=auto/><a>";

        } ?>

</div>

</div>


<script src="../JS/navbar.js"></script>
        
    </body>
</html>