<?php
include_once'../connection.php';
  $sql_create="CREATE TABLE IF NOT EXISTS `classroutine`(
    `id` int(11)  NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `imageurl` varchar(255) NOT NULL,
    `datetime` datetime NOT NULL  )";
  if($result=mysqli_query($conn,$sql_create)){}
    else{
      echo "error";
    }

  $sql_create="CREATE TABLE IF NOT EXISTS `examroutine`(
    `id` int(11)  NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `imageurl` varchar(255) NOT NULL,
    `datetime` datetime NOT NULL  )";
  if($result=mysqli_query($conn,$sql_create)){}
    else{
      echo "error";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="../CSS/AddTeacherCss.css">
    <link rel="stylesheet" type="text/css" href="../CSS/AddRoutine2.css">
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



<!-- UPLOAD CLASS ROUTINE -->



<h1>Upload Class Routine</h1>
       <form action="" method="POST" enctype="multipart/form-data">
          <div class="upfile"> 
                        <input type="file" id="actual-btn" name="uploadfile" hidden/>

                        <!--custom upload button -->
                        <label for="actual-btn">Choose File</label>

                        <!-- name of file chosen -->
                        <span id="file-chosen">No file chosen</span>
            </div>
            <div class="upimg">
                        <input type="submit" value="Upload Image" class="submitimg" name="submit1">
              </div>
          </form>

     
            
    <script>
       const actualBtn = document.getElementById('actual-btn');

        const fileChosen = document.getElementById('file-chosen');

        actualBtn.addEventListener('change', function(){
        fileChosen.textContent = this.files[0].name
        })
    </script>  
        <?php
        if (isset($_POST['submit1'])) {
        $filename=$_FILES["uploadfile"]["name"];
        $tempname=$_FILES["uploadfile"]["tmp_name"];
        $folder="../RoutineImage/".$filename;
        move_uploaded_file( $tempname ,$folder );
        $datetime=date("Y-m-d H:i:s");
        $sql_insert_image="INSERT INTO classroutine (imageurl,datetime) VAlUES('$folder','$datetime') ";  //to move image to our folder and pass our url to database 
        $result=mysqli_query($conn,$sql_insert_image);

        }
        ?>
        <?php
        $sql_select_image="SELECT * FROM `classroutine` ORDER BY datetime desc LIMIT 1  ;";
        $result2=mysqli_query($conn,$sql_select_image);
        while($row=mysqli_fetch_assoc($result2)){ 
          $imageurl = $row['imageurl'];
          $datetime0=$row['datetime'];

        echo "<a href='$imageurl'><img src='$imageurl' width='860px' height='600px'/><a>";

        } ?>




<!-- UPLOAD EXAM ROUTINE -->


<div class="exam_routine">
<h1 id="h1examroutine">Upload Exam Routine</h1>
       <form action="" method="POST" enctype="multipart/form-data">
          <div class="upfile"> 
                        <input type="file" id="actual-btn2" name="uploadfile" hidden/>

                        <!--custom upload button -->
                        <label for="actual-btn2">Choose File</label>

                        <!-- name of file chosen -->
                        <span id="file-chosen2">No file chosen</span>
            </div>
            <div class="upimg">
                        <input type="submit" value="Upload Image" class="submitimg" name="submit">
              </div>
        </form>

     
            
    <script>
       const actualBtn = document.getElementById('actual-btn2');

        const fileChosen = document.getElementById('file-chosen2');

        actualBtn.addEventListener('change', function(){
        fileChosen.textContent = this.files[0].name
        })
    </script>  
        <?php
        if (isset($_POST['submit'])) {
        $filename=$_FILES["uploadfile"]["name"];
        $tempname=$_FILES["uploadfile"]["tmp_name"];
        $folder="../RoutineImage/".$filename;
        move_uploaded_file( $tempname ,$folder );
        $datetime=date("Y-m-d H:i:s");
        $sql_insert_image="INSERT INTO examroutine (imageurl,datetime) VAlUES('$folder','$datetime') ";  //to move image to our folder and pass our url to database 
        $result=mysqli_query($conn,$sql_insert_image);

        }
        ?>
        <?php
        $sql_select_image="SELECT * FROM `examroutine` ORDER BY datetime desc LIMIT 1  ;";
        $result2=mysqli_query($conn,$sql_select_image);
        while($row=mysqli_fetch_assoc($result2)){ 
          $imageurl = $row['imageurl'];
          $datetime0=$row['datetime'];

        echo "<a href='$imageurl'><img src='$imageurl' width='860px' height='600px'/><a>";

        } ?>

</div>


<script src="../Js/navbar.js"></script>
        
    </body>
</html>