<?php include_once'../connection.php';?>
<!DOCTYPE html>
<html>
<head>
  <title>Notices</title>
  <link rel="stylesheet" type="text/css" href="../CSS/AddNotice.css">
  
</head>
<body>
<nav class="navbar">
        <div class="brand-title">Gces Attendance</div>
        <a href="#" class="toggle-button">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </a>
        <div class="navbar-links">
            <ul> 
				<li><a href="Home.php">Home</a> </li>
				<li><a href="view.php">View</a> </li>
				<li><a href="Statistics.php">Statistics</a> </li>     			   <!-- nav bar -->
				<li><a href="notice.php">Notice</a></li>
				<li><a href="../index.php">logout</a> </li>

			</ul>
        </div>
	  </nav>
</header>
	
<script src="../JS/navbar.js"></script>
<div class="container">
<form action="" method="POST" class="textform">
<span class="hello">ADD NOTICE</span><br></br>
<div class="addsub">
  <span>SUBJECT</span><br>
  <input type="text" name="subject"><br>
</div>
  <div class="addsub">
  <span>DETAIL</span><br>
<textarea class="textarea" name="detail"></textarea><br>
</div>
<div class="addbatch">
<span>TO:</span></br>
 <!-- Select Menu for batch imported  from batch table database-->
<select id="batch_select2" class="batch_select2" name="selected_batch" >
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
</div>
<div class="enter">
<input  class="btn1" type="submit" name="text_submit" value="Enter">
</div>
</form>
<?php
if (isset($_POST['text_submit'])) {
  $subject=$_POST['subject'];
  $detail=$_POST['detail'];
  $datetime1=date("Y-m-d H:i:s");
  $date=date("Y-m-d");
  $sql_insert_textnotice="INSERT INTO `text_notice`(subject,detail,datetime,date) VALUES('$subject','$detail','$datetime1','$date')";
  if($result=mysqli_query($conn , $sql_insert_textnotice)){}
    else{echo "cannot import";}
}
?>
<a href="notice.php"><button class="btn1">BACK</button></a>
</div>
</body>
</html>