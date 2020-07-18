<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="CSS/cssfile.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
    <img src="Images/bg.jpg" class="webpage">
    <div class="container">
        <div class="login">
            <form action="Home.php" method="POST">
                <img src="Images/uavatar.png" class="avatar">
                <h2 class="title">Login</h2>
                <div class="input username">
                    <div class="i"> 
           		    	<i class="fas fa-user"></i>
           		   </div>
                    <div class="in">
                        <h5>Username</h5>
                        <input type="text" class="u_input">
                    </div>
                </div>
                <div class="input password">
                    <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
                    <div class="in">
                        <h5>Password</h5>
                        <input type="password" class="u_input">
                    </div>
                </div>
                <input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="JS/jsfile.js"></script>
</body>
</html>