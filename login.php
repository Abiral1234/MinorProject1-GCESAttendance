<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="CSS/cssfile.css">
    <link rel="shortcut icon" href="">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
    <img src="Images/bg.jpg" class="webpage">
    <div class="container">
        <p id="invalid"></p>
        <div class="login">
            <form name="myform"  onsubmit="return validateform()" action="Home.php" method="POST">
                <img src="Images/uavatar.png" class="avatar">
                <h2 class="title">Login</h2>
                <div class="input username">
                    <div class="i"> 
           		    	<i class="fas fa-user"></i>
           		   </div>
                    <div class="in">
                        <h5>Username</h5>
                        <input type="text" name="name" class="u_input">
                    </div>
                </div>
                <div class="input password">
                    <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
                    <div class="in">
                        <h5>Password</h5>
                        <input type="password" name="password" id="pass" class="u_input">
                    </div>
                </div>
                <input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script src="JS/jsfile.js" type="text/javascript"></script>
</body>
</html>