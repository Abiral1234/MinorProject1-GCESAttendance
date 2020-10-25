<?php include_once 'connection.php';

    if (isset($_POST['student_submit'])) {
    $student_name =$_POST['name'];
    $roll_number =$_POST['roll'];
    $reg_number =$_POST['reg'];
    $gender =$_POST['Gender'];
    $batch =$_POST['selected_batch'];
    
    $sql="INSERT INTO $batch (student_name ,roll_number,reg_number,gender)
    VALUES('$student_name' , '$roll_number','$reg_number','$gender') ";
    $result= mysqli_query($conn ,$sql);

}
 ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add Student</title>
      
        <link rel="stylesheet" href="CSS/AddStudentCss6.css" >
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
            <form action="AddStudent.php" name="form1" method="POST">
                <div class="input name">
                    <span>Student Full Name:</span><br>
                    <input type="text" id="name" name="name" class="_dinput"><br>
                </div>

                <div class="input program">
                    <span>Batch:</span><br>
                    <select  id="program" class="d_input" name="selected_batch">
                        <option  selected value="No batch selected" >Choose a batch</option>
                        <?php 
                            $sql_select_batch="SELECT * FROM `batch_list`;";
                            $result_batch=mysqli_query($conn ,$sql_select_batch);
                            while($row= mysqli_fetch_assoc($result_batch)){ 
                            $batch_no=0;         
                        ?>
                        <option required value="<?php echo $row['batchname']?>" ><?php echo $row['batchname']?></option>
                    <?php }?>
                    </select><br>
                </div>
                <div class="input roll">
                    <span>Roll No</span>
                    <input type="number" id="roll" name="roll"><br>
                </div>
                <div class="input regno">
                    <span>Registration No</span>
                    <input  type="number" id="reg" name="reg"><br>
                </div>
                <div class="input gender">    
                    <span class="radio-inline">
                        <input checked type="radio" name="Gender" value="male">Male
                    </span>
                    <span class="radio-inline">
                        <input type="radio" name="Gender" value="female">Female
                    </span>
                </div>
                <input type="submit" value="Enter the data" class="btn" name="student_submit">
            </form>
        </div>
        <script src="JS/addvalidate.js" type="text/javascript"></script> 



        <div class="label1" >
            <h2>View Student List of:<h2>
        </div>


        <form action="AddStudent.php" method="POST">
            <div class="batchselector">
            <!-- Select Menu for batch imported  from batch table database-->
                <select id="batch_select" class="batch_select" name="selected_batch" >
                    <option  selected value="No batch selected" >Choose Your Batch</option> 
                    <?php 
                        $sql_select_batch="SELECT * FROM `batch_list`;";
                        $result_batch=mysqli_query($conn ,$sql_select_batch);
                        while($row= mysqli_fetch_assoc($result_batch)){         
                    ?>
                    <option required value="<?php echo $row['batchname']?>" name="option_value" >

                        <?php echo $row['batchname'] ;?>
                    </option>

                    <?php }?>   
                </select>
                <input  class="btn1" type="submit" name="batch_submit" value="Enter"  >
        </form>

<?php if (isset($_POST['batch_submit']) || isset($_POST['student_submit']) ){
    $table_name = $_POST['selected_batch'];
    if($table_name !="No batch selected"){ ?>

 <table class="student_table">
            <thead>
                <tr >
                    <td>No</td>   
                    <td>Student Name </td>
                    <td>Roll no</td>
                    <td>Reg. no</td>

                </tr>
            </thead>
            <tbody>
            <?php         
                $sql="SELECT * FROM $table_name";
                $result=mysqli_query($conn ,$sql);
                $serial_number=0;
                $counter=0;
                while($row= mysqli_fetch_assoc($result)){
                            $serial_number++;
                        ?>
                <tr>
                    <td><?php echo $serial_number; ?></td>
                    <td><?php echo $row['student_name'] ; ?></td>
                    <td><?php echo $row['roll_number'] ; ?></td>
                    <td><?php echo $row['reg_number'] ; ?></td>
                </tr>
          <?php }?>
            </tbody>
</table>





<?php } }?>

       
   
<script src="Js/navbar.js"></script>
    </body>
</html>