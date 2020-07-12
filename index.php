<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
<style type="text/css">

	h1{
	font-family: 'Poppins', sans-serif;
	position:absolute; 
	top: 10px;
	left:655px;
	}
	a{
	text-decoration: none;
	color: #fff;
	font-family: 'Poppins', sans-serif;
	}
	.btn{
		background: linear-gradient(-90deg,#00beff,#00beff);
		border: none;
		border-radius: 25px;
		cursor: pointer;
		color: #fff;
		font-size: 16px;
	}
	#btn1{
		position: absolute;
		top: 100px;
		left:680px;
		padding: 10px 45px; 
	}
	#btn2{
		position: absolute;
		top: 200px;
		left:680px;
		padding: 10px 45px; 
	}
	#btn3{
		position: absolute;
		top: 300px;
		left:680px;
		padding: 10px 50px; 
	}

</style>
</head>
<body>
<div class="container">
	<h1>Who are you?</h1>
	<button class="btn" id="btn1" ><a href="Home.php">Student</a></button>
	<button class="btn" id="btn2"><a href="login.php">Teacher</a></button>
	<button class="btn" id="btn3"><a href="login.php">  Admin  </a></button>
</div>

</body>
</html>