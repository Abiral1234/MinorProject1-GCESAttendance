<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="CSS/Addbatchcss.css">
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
            <form action="add_batch_php.php" name="form1" method="POST">
			<div class="input program">
                    <span>Program:</span><br>
                    <select name="program" id="program" class="d_input">
                        <option value="BESE" name="program">Bachelor of Software Engineering</option>
                        <option value="BECE" name="program">Bachelor of Computer Engineering</option>
                    </select><br>
                </div>
                <div class="input year">
                    <span>Year:</span>
                    <input type="number" min="<?php echo date("Y")-4;?>" max="<?php echo date("Y")-1;?>" id="year" name="year" class="_dinput"><br>
                </div>
                <input type="submit" value="Enter the data" class="btn">
            </form>
		</div>
		<script src="JS/AddBatch.js" type="text/javascript"></script>
</body>
</html>