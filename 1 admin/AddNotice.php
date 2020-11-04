<?php include_once'../connection.php';?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="" method="POST" class="textform">
  <span>Subject</span><br>
  <input type="text" name="subject"><br>
  <span>Detail</span><br>
<textarea class="textarea" name="detail"></textarea><br>
<span>TO:</span>
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
<input  class="btn2" type="submit" name="text_submit" value="Enter">

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
<a href="notice.php"><button>BACK</button></a>
</body>
</html>