<!DOCTYPE html>
<html>
    <head>
        <title>Add Student</title>
        <link rel="stylesheet" type="text/css" href="CSS/AddStudentcss.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <form action="AddStudent.php" method="POST">
                <div class="input name">
                    <span>Name of Student:</span><br>
                    <input type="text" id="name" name="name" class="_dinput" required><br>
                </div>
                <div class="input program">
                    <span>Program:</span><br>
                    <select name="program" id="program" class="d_input">
                        <option value="BESE" name="program">Bachelor of Software Engineering</option>
                        <option value="BECE" name="program">Bachelor of Computer Engineering</option>
                    </select><br>
                </div>
                <div class="input roll">
                    <span>Roll No:</span><br>
                    <input type="text" id="roll" name="roll" placeholder="eg:-BESE01" class="d_input" required><br>
                </div>
                <input type="submit" value="Enter the data" class="btn">
            </form>
        </div>
    </body>
</html>