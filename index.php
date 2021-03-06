<?php
	session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="databseconnect">
		<?php
			include_once'connection.php';
			$error=null;
			$match=1;
			if(isset($_POST['FormSubmit'])) {
				$username=$_POST['username'];							
				$password=$_POST['password'];
			  	$_SESSION['username']=$username;
			  	$_SESSION['password']=$password;

			  	//IF ADMIN
					if($sql_select="SELECT * FROM adminlist"){
						$result_admin=mysqli_query($conn,$sql_select);
						if($result_admin){ //Checks if adminlist table is present
						while($row=mysqli_fetch_assoc($result_admin)){
						$dbusername=$row['Username'];
						$dbpassword=$row['Password'];				//Check if the user is Admin
						
							if($username == $dbusername && $password == $dbpassword) {
							header("Location: 1_admin/Home.php"); }
					}
				}

				}

				//IF TEACHER

				if($sql_select="SELECT * FROM teacherlist"){
					$result_teacher=mysqli_query($conn,$sql_select);
					if($result_teacher){
					while($row=mysqli_fetch_assoc($result_teacher)){
						$dbusername=$row['Username'];
						$dbpassword=$row['Password'];			//Check if the user is Teacher	
					if($username == $dbusername && $password == $dbpassword) {
						header("Location: 2_teacher/Home.php"); 
					}}
				}}

				//IF STUDENT
					$current_year=date("Y");
					$fourth_year=$current_year-4;
					$third_year=$current_year-3;
					$second_year=$current_year-2;
					$first_year=$current_year-1;
					$batchname= array("bese_".$fourth_year,"bese_".$third_year,"bese_".$second_year,"bese_".$first_year,
						"bece_".$fourth_year,"bece_".$third_year,"bece_".$second_year,"bece_".$first_year);

				for ($i=0; $i < 8 ; $i++) { 
					
				if($sql_select="SELECT * FROM $batchname[$i]"){ //$batchname[i] will represent all batch names
					$result_student=mysqli_query($conn,$sql_select);
					if($result_student){
					while($row=mysqli_fetch_assoc($result_student)){
						$dbusername=$row['student_name'];
						$dbpassword=$row['reg_number'];						//Check if the user is Student
					if($username == $dbusername && $password == $dbpassword) {
						$_SESSION['student_batch_name'] =$batchname[$i];
						header("Location: 3_student/Home.php"); 
					}}}}
				//If the user is not admin,teacher or student then invalid user
				
				}
				$match=0;
			}
		?>
	</div>
	<div class="container">
		<div id="gridrow">
			<div class="img">
				<img id="background" src="Images/login.svg">
			</div>
			<p id="description">Gandaki College of Engineering and Science (GCES) is located in Pokhara. 
			Founded in 1998 and offically inaguratd i 1999 this college has always been driven
			by mission of becoming an international centre of acdemic excellence with it's motto
			"Knowledge, Character, and Service".
			</p>
		</div>
		<div class="login-content">
			<form action="" name="loginform" method="POST">
				<img src="Images/avatar1.svg" id="avatar">
				<h2 class="title">Welcome</h2>
				<div class="error">
					<?php echo $error; ?>
				</div>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" name="username">
           		   </div>
					
           		</div>
				   <div class="invalid">
						<p id="invalid1"></p>
					</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" id="pass" name="password" class="input">
						<i  class = "fas fa-eye fa-0.7x" id="show" onclick = "setToggle()"></i>
						<i class = "fas fa-eye-slash fa-0.7x" id="hide" onclick = 'setToggle()'></i>
            	   </div>
            	</div>
				<div class="invalid">
					<p id="invalid2" style="color: red;">
						<?php
						if ($match==0) {
						 	echo "Incorrect Username and Password";
						 } 
						?>
					</p>
				</div>
            	<input type="submit" class="btn" value="Login" name="FormSubmit">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/login.js"></script>
</body>
</html>
