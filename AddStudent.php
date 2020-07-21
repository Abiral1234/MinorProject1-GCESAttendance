<?php include_once 'connection.php';
 ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add Student</title>
        <link rel="stylesheet" type="text/css" href="CSS/AddStudentcss.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <p id="invalid"></p>
            <form action="add.php" name="form1" method="POST">
                <div class="input name">
                    <span>Name of Student:</span><br>
                    <input type="text" id="name" name="name" class="_dinput"><br>
                </div>
                <div class="input program">
                    <span>Program:</span><br>
                    <select name="program" id="program" class="d_input">
                        <option value="BESE" name="program">Bachelor of Software Engineering</option>
                        <option value="BECE" name="program">Bachelor of Computer Engineering</option>
                    </select><br>
                </div>
                <div class="input year">
                    <span>Year:</span><br>
                    <input type="text" id="year" name="year" placeholder="eg:-2018"><br>
                </div>
                <input type="submit" value="Enter the data" class="btn">
            </form>
        </div>
        <script src="JS/addvalidate.js" type="text/javascript"></script>
    </body>
</html>