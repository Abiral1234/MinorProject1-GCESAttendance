<?php include_once 'connection.php';
 ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add Student</title>
        
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="CSS/AddStudentCss.css" >
    </head>
    <body>
        <header>
            <div class="navigation">    
            <nav>
                <ul> 
                <li><a href="Home.php">Home</a> </li>
                <li><a href="view.php">View</a> </li>
                <li><a href="Statistics.php">Statistics</a> </li>        <!-- nav bar -->
                <li><a href="index.php">logout</a> </li>
                </ul>
            </nav>
        </div>
       </header>



        <div class="container">
            <p id="invalid"></p>
            <form action="add_student_php.php" name="form1" method="POST">
                <div class="input name">
                    <span>Name of Student:</span><br>
                    <input type="text" id="name" name="name" class="_dinput"><br>
                </div>

                <div class="input program">
                    <span>Batch:</span><br>
                    <select name="program" id="program" class="d_input">
                        <option disabled selected value="1">Choose a batch</option>
                        <?php 
                            $sql_select_batch="SELECT * FROM `batch_list`;";
                            $result_batch=mysqli_query($conn ,$sql_select_batch);
                            while($row= mysqli_fetch_assoc($result_batch)){ 
                            $batch_no=0;         
                        ?>
                        <option value="<?php echo $row['batchname']?>" name="batch"><?php echo $row['batchname']?></option>
                    <?php }?>
                    </select><br>
                </div>
                <div class="input roll">
                    <span>Roll No:</span>
                    <input type="text" id="roll">
                </div>
                <input type="submit" value="Enter the data" class="btn">
            </form>
        </div>
        <script src="JS/addvalidate.js"type="text/javascript"></script> 
       
   
    </body>
</html>