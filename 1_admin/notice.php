<?php include_once'../connection.php';
error_reporting(0);
  $sql_create="CREATE TABLE IF NOT EXISTS `notice`(
    `id` int(11)  NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `imageurl` varchar(255) NOT NULL,
    `datetime` datetime NOT NULL  )";
  if($result=mysqli_query($conn,$sql_create)){}
    else{
      echo "error";
    }
  $sql_create_textnotice="CREATE TABLE IF NOT EXISTS `text_notice`(
    `id` int(11)  NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `subject` varchar(100) ,
    `detail` varchar(1000) ,
    `datetime` datetime NOT NULL,
    `date` date NOT NULL  )";
  if($result2=mysqli_query($conn,$sql_create_textnotice)){}
    else{
      echo "error";
    }
  $sql_create_upcoming_event="CREATE TABLE IF NOT EXISTS `upcoming_event`(
    `id` int(11)  NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `Title` varchar(400) ,
    `date` date NOT NULL  )";
  if($result2=mysqli_query($conn,$sql_create_upcoming_event)){}
    else{
      echo "error";
    }
  //IF Clear IMAGE IS ENTERED
  if (isset($_POST['clear_image'])) {
    $sql_delete_image="DELETE FROM `notice` WHERE 1";
    if($result=mysqli_query($conn,$sql_delete_image)){}
      else{echo "image delete error";}}
  //IF CLear Notice IS ENTERED
  if (isset($_POST['clear_notice'])) {
    $sql_delete_notice="DELETE FROM `text_notice` WHERE 1";
    if($result=mysqli_query($conn,$sql_delete_notice)){}
      else{echo "notice delete error";}}
 //IF CLear Notice IS ENTERED
  if (isset($_POST['clear_event'])) {
    $sql_delete_event="DELETE FROM `upcoming_event` WHERE 1";
    if($result=mysqli_query($conn,$sql_delete_event)){}
      else{echo "event delete error";}}
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="stylesheet" type="text/css" href="../Css/NoticeStyle6.css">
</head>
<body>
<header><!-- NAvigation BAR -->
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
 <div class="pannel">
      <div class="noticebtn">
        <button class="btn" id="addbtn0"><a href="AddNotice.php" id="add_txt">Add Notice</a></button>
      </div>
      <div class="eventbtn">
        <button class="btn" id="addbtn1"><a href="AddEvent.php" id="add_txt">Add Event</a></button>   <!--Add Buttons -->
      </div>
      <div class="clrimagebtn">
        <form action="notice.php" method="POST">
        <input class="btn_red" id="addbtn2" type="submit" name="clear_image" value="Clear Image"> <!--Image delte button-->
        </form>
      </div>
      <div class="clrnoticebtn">
        <form action="notice.php" method="POST">
        <input class="btn_red" id="addbtn3" type="submit" name="clear_notice" value="Clear Notice">
        </form>
      </div>
      <div class="clreventbtn">
        <form action="notice.php" method="POST">
        <input class="btn_red" id="addbtn4" type="submit" name="clear_event" value="Clear Event">
        </form>
      </div>
</div>
      <!--  <div class="label1" >
            <h2>View Notice of:<h2>
        </div> -->

<!-- Select Menu for batch imported  from batch table database-->
      <!--  <form action="notice.php" method="POST">
            <div class="batchselector">
            
                <select id="batch_select" class="batch_select" name="selected_batch" >
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
                <input  class="btn1" type="submit" name="batch_submit" value="Enter"  >
        </form> -->
<div class="mainsec">                 
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="upfile"> 
                        <input type="file" id="actual-btn" name="uploadfile" hidden/>

                        <!--custom upload button -->
                        <label for="actual-btn">Choose File</label>

                        <!-- name of file chosen -->
                        <span id="file-chosen">No file chosen</span>
            </div>
            <div class="upimg">
                        <input type="submit" value="Upload Image" class="submitimg" name="submit">
              </div>
          </form>
     
            
    <script>
       const actualBtn = document.getElementById('actual-btn');

        const fileChosen = document.getElementById('file-chosen');

        actualBtn.addEventListener('change', function(){
        fileChosen.textContent = this.files[0].name
        })
        </script>  
        <?php
        if (isset($_POST['submit'])) {
        $filename=$_FILES["uploadfile"]["name"];
        $tempname=$_FILES["uploadfile"]["tmp_name"];
        $folder="../UploadedImage/".$filename;
        move_uploaded_file( $tempname ,$folder );
        $datetime=date("Y-m-d H:i:s");
        $sql_insert_image="INSERT INTO notice (imageurl,datetime) VAlUES('$folder','$datetime') ";  //to move image to our folder and pass our url to database 
        $result=mysqli_query($conn,$sql_insert_image);

        }
        ?>
        <?php
        $sql_select_image="SELECT * FROM `notice` ORDER BY datetime desc  ;";
        $result2=mysqli_query($conn,$sql_select_image);
        while($row=mysqli_fetch_assoc($result2)){ 
          $imageurl = $row['imageurl'];
          $datetime0=$row['datetime'];

        echo "<a href='$imageurl'><img src='$imageurl' width='100%' height='100%'/><a>";

        } ?>



          <!-- Notice Table -->
          <h4 class="notice_text">NOTICE BOARD:</h4>
          <div>
          <table class="table1">
            <thead>
              <tr>
              <th>SN</th>
              <th>Subject</th>
              <th>Detail</th>
              <th>Date</th>
              <th>Time</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $counter=0;
              $sql_select_text="SELECT * from `text_notice` ORDER BY datetime desc ";
              $result_text=mysqli_query($conn,$sql_select_text);
              while($text_row=mysqli_fetch_assoc($result_text)) { 
                $counter++;
                $todaydate=date("Y-m-d H:i:s");
                $todaydate_in_second=strtotime($todaydate);
                $datepublished=$text_row['datetime'];
                $datepublished_in_second=strtotime($datepublished);
                $diff=$todaydate_in_second-$datepublished_in_second;//as going time always greater than past time
                $difference_in_year=floor($diff/(60*60*24*365));
                $difference_in_days=floor($diff/(60*60*24));
                $difference_in_hour=floor($diff/(60*60));
                $difference_in_minute=floor($diff/(60));
                $difference_in_second=floor($diff);

              ?>
            <tr>
              <td><?php echo $counter;?></td>
              <td><?php echo $text_row['subject']; ?></td>
              <td><?php echo $text_row['detail']; ?></td>
              <td><?php echo $text_row['date']; ?></td> 
              <td><?php 
              if ($difference_in_second<60) {
              echo $difference_in_second.' seconds ago';
              }
              elseif ($difference_in_minute<60) {
              echo $difference_in_minute.' minutes ago';
              }
              elseif ($difference_in_hour< 24) {
              echo $difference_in_hour.' hour ago';
              }
              elseif ($difference_in_days < 365) {
              echo $difference_in_days.' days ago';
              }
              else{
                echo $difference_in_year.' years ago';

              }
              ?></td>  
            </tr>
          <?php } ?>
          </tbody>
          </table>
          </div>
          <!--upcoming event -->
          <h4 class="upcoming_event">UPCOMING EVENT:</h4>
          <div>
          <table class="table2" >
            <thead  >
              <tr>
              <th>SN</th>
              <th>Title</th>
              <th>Date Published</th>
              <th>Time</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $counter=0;
              $sql_select_text="SELECT * from `upcoming_event` ORDER BY date desc ";
              $result_text=mysqli_query($conn,$sql_select_text);
              while($event=mysqli_fetch_assoc($result_text)) { 
              $counter++;
              $todaydate=date("Y-m-d");
              $todaydate_in_second=strtotime($todaydate);
              $datepublished=$event['date'];
              $datepublished_in_second=strtotime($datepublished);
              $diff=$datepublished_in_second-$todaydate_in_second;
              $difference_in_days=floor($diff/(60*60*24));
              if($difference_in_days == 0){ //ie today
              ?>
            <tr>
              <td  ><?php echo $counter;?></td>
              <td><?php echo $event['Title']; ?></td>
              <td><?php echo $event['date']; ?></td>
              <!-- DAYS TO GO / DAYS AFTER -->
              <td><?php
              $difference_in_second=floor($diff);
              $difference_in_minute=floor($diff/(60));
              $difference_in_hour=floor($diff/(60*60));

              if ($difference_in_days == 0) {
                echo 'Today';
              }
              ?></td>  
            </tr><?php } else{ ?>
              <tr>
              <td ><?php echo $counter;?></td>
              <td><?php echo $event['Title']; ?></td>
              <td><?php echo $event['date']; ?></td>
              <!-- DAYS TO GO / DAYS AFTER -->
              <td><?php 
              
              if($difference_in_days>0){  //ie published date >today date (so using later)   
                echo $difference_in_days.' days later';
              }
              if ($difference_in_days<0) { //ie published date < today date (so using ago)  
                echo -$difference_in_days.' days ago';
              }
              if ($difference_in_days == 0) {
                echo 'Today';
              }
              ?></td>  
            </tr>

          <?php }} ?>
          </tbody>
          </table>
          </div>
</div>

<script src="../Js/navbar.js"></script>

</body>
</html>