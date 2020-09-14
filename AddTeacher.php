<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="CSS/AddTeachercss.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
</head>

<body>

	<header>
		
		<div class="navigation">	
			<nav>
				<ul> 
				<li><a href="Home.php">Home</a> </li>
				<li><a href="view.php">View</a> </li>
				<li><a href="result.php">Statistics</a> </li>        <!-- nav bar -->
				<li><a href="index.php">logout</a> </li>
				</ul>
			</nav>
		</div>

	</header>
        <div class="container">
            <p id="invalid"></p>
            <form action="addteacher.php" name="form1" method="POST">
                <div class="input name">
                    <span>Name of Teacher:</span><br>
                    <input type="text" id="name" name="name" class="_dinput"><br>
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
                <input type="submit" value="Enter the data" class="btn">
            </form>
        </div>
        <script src="JS/addteachervalidate.js" type="text/javascript"></script>
    </body>
</html>