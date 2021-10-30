<?php
include_once'../connection.php';

if(isset($_POST['teacher_submit'])){
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $username=$_POST['username'];
    $password=$_POST['pword'];
    $sql_insert="INSERT INTO teacherlist (first_name ,last_name ,Username ,Password ) VALUES('$first_name','$last_name','$username','$password')";
    if($result2=mysqli_query($connect_to_list_database,$sql_insert)){ }
    else{
        echo "Error";
    }

}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../CSS/AddTeachercss1.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../CSS/nav.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>

<div>
    <header>
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
</div>
    
<script src="../Js/navbar.js"></script>

        <div class="container">
            <p id="invalid"></p>
            
            <form action="AddTeacher.php" name="form1" method="POST" >
                <div class="input name">
                    <span>First Name :</span><br>
                    <input type="text" id="name" name="first_name" class="_dinput"><br>
                    <span>Last Name:</span><br>
                    <input type="text" id="name" name="last_name" class="_dinput"><br>
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
               
                <input type="submit" value="Enter the data" name="teacher_submit"class="btn">
            </form>
        </div>
        <script src="../JS/addteachervalidate.js" type="text/javascript"></script>
        <div class="teachertable">
        <table class="teacher_table">
            <thead>
                <tr >   
                    <td>No.</td>
                    <td>Teacher Name List</td>
                </tr>
            </thead>
            <tbody>
                <?php 
               $sql_create = "CREATE TABLE IF NOT EXISTS teacherlist (
            `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `first_name` varchar(255) NOT NULL,
            `last_name` varchar(255) NOT NULL,
            `Username` varchar(255) NOT NULL,
            `Password` varchar(255) NOT NULL
            ) ";
            if($result1=mysqli_query($connect_to_list_database,$sql_create)){ }
            else{
             echo "Error";
            }
  
                $sql_select="SELECT * FROM teacherlist";
                $result3=mysqli_query($connect_to_list_database,$sql_select);
                $serial_number=0;
                while ($row=mysqli_fetch_assoc($result3)) {
                     $serial_number++;
                 ?>
                <tr>
                    <td><?php echo $serial_number; ?></td>
                    <td><?php 
                    echo $row['first_name']." ".$row['last_name'] ?></td>
                </tr>
            <?php }?>
            </tbody>
        </table>
        </div>



        <!-- ILLUSRATION SVG-->
<div class="teachersvg">
<svg id="teachersvg" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="948.37" height="758" viewBox="0 0 948.37 758"><title>teaching</title><rect x="193.87" y="130" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="283.87" y="156" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="373.87" y="182" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="193.87" y="91" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="283.87" y="117" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="373.87" y="143" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="473.87" y="130" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="563.87" y="156" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="653.87" y="182" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="473.87" y="91" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="563.87" y="117" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="653.87" y="143" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="193.87" y="39" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="283.87" y="65" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="373.87" y="91" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="193.87" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="283.87" y="26" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="373.87" y="52" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="473.87" y="39" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="563.87" y="65" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="653.87" y="91" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="473.87" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="563.87" y="26" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="653.87" y="52" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="193.87" y="593" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="283.87" y="619" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="373.87" y="645" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="193.87" y="554" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="283.87" y="580" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="373.87" y="606" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="473.87" y="593" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="563.87" y="619" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="653.87" y="645" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="473.87" y="554" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="563.87" y="580" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="653.87" y="606" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="193.87" y="502" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="283.87" y="528" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="373.87" y="554" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="193.87" y="463" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="283.87" y="489" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="373.87" y="515" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="473.87" y="502" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="563.87" y="528" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="653.87" y="554" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="473.87" y="463" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="563.87" y="489" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><rect x="653.87" y="515" width="86" height="26" rx="7.43" fill="#00beff" opacity="0.1"/><ellipse cx="482.37" cy="722" rx="438.5" ry="36" fill="#00beff" opacity="0.1"/><path d="M210.47,257.8c41.35,17.92,65.11,55,65.11,55s-43.29,8-84.65-9.91-65.11-55-65.11-55S169.11,239.88,210.47,257.8Z" transform="translate(-125.82 -71)" fill="#00beff"/><path d="M337.37,189C350.16,168,371.94,158,371.94,158s1,23.94-11.75,44.88-34.58,30.93-34.58,30.93S324.57,209.88,337.37,189Z" transform="translate(-125.82 -71)" fill="#00beff"/><path d="M243.35,211.47c9.15,32.66,34.37,54.16,34.37,54.16s10.39-31.47,1.24-64.14-34.38-54.16-34.38-54.16S234.19,178.8,243.35,211.47Z" transform="translate(-125.82 -71)" fill="#46455b"/><rect x="118.87" y="139" width="729" height="365" rx="7.21" fill="#3f3d56"/><path d="M118.87,482h729a0,0,0,0,1,0,0v14.79a7.21,7.21,0,0,1-7.21,7.21H126.08a7.21,7.21,0,0,1-7.21-7.21V482a0,0,0,0,1,0,0Z" opacity="0.1"/><rect x="189.87" y="455" width="54" height="27" rx="2.5" fill="#00beff"/><rect x="258.87" y="478" width="37" height="4" rx="2" fill="#00beff"/><path d="M351.84,281.38c26.39,4.87,53.31,0,79.59-3.3l79.87-10c3.23-.41,7.93-2.34,9.83,1.61,1.07,2.21.35,7,.43,9.54.21,7,.19,14,0,21-.36,13.38-1.34,26.73-2.59,40.05-2.43,26.07-5.87,52-7.59,78.17-.88,13.32-1.32,26.68-.93,40,.09,3.18.22,6.36.41,9.53.21,3.55,1.8,8.82-2.07,11.19-2.21,1.36-6.56,1.29-9.09,1.69-4,.63-8,1.13-12.08,1.54-26.89,2.69-54.13,1.57-81.12,1.41L325,483.39l-19.88-.11c-1.8,0-8.29,1.08-9.4-1.06-.47-.91.78-5.17,1-6.31q.46-2.82,1-5.63c2.32-13.15,5.06-26.22,7.82-39.28,5.93-28,12-56.14,14.44-84.74,1.21-14.35.41-28.83,1.89-43.15.69-6.65,1.51-21.49,10.36-22.08,7.5-.5,15.22,0,22.74,0a1.5,1.5,0,0,0,0-3c-7.1,0-14.21-.19-21.31-.05-4.72.09-8,1.21-10.25,5.55-5.75,11.14-5.16,26-5.34,38.16-.43,29.11-4.9,57.6-10.72,86.07-2.93,14.33-6.09,28.61-9,42.95-1.37,6.85-2.68,13.72-3.88,20.61-.56,3.28-3.39,10.51-.9,13.52s10.15,1.39,13.58,1.41l23.86.14,45.72.26c29.54.17,59.18,1,88.71.13,14.1-.42,29-1,42.73-4.37,4.09-1,6.06-2.88,6.22-7.24.24-6.76-.86-13.73-1-20.52-1-58.1,12.65-115.39,11.25-173.51-.09-3.95,1.4-13.91-2.92-16.3-1.94-1.08-4.46-.49-6.5-.25-3.9.45-7.79,1-11.69,1.46l-50.65,6.32c-16.19,2-32.37,4.16-48.59,6-17.17,2-34.51,3.19-51.62,0-1.89-.35-2.7,2.54-.8,2.89Z" transform="translate(-125.82 -71)" fill="#00beff"/><path d="M320,316.73l199.82-9.8c1.93-.1,1.94-3.1,0-3L320,313.73c-1.92.09-1.93,3.09,0,3Z" transform="translate(-125.82 -71)" fill="#00beff"/><path d="M381.56,292a5,5,0,0,0,1.77,8.07c2.69,1.23,5.85.2,8.52-.47,4-1,8-1.89,12.11-2.62a165.15,165.15,0,0,1,27.09-2.52c4.14-.05,8.25.14,12.39.32,3,.12,6.23.36,8.77-1.5,2.9-2.12,3.84-6.26,1-8.84-4-3.65-12.62-1.53-17.24-1.15a386.62,386.62,0,0,0-49.86,7.44c-1.88.4-1.09,3.3.8,2.89q16.27-3.51,32.79-5.64,8.12-1,16.27-1.69c2.56-.21,5.12-.4,7.68-.55,1-.06,2.06-.17,3.08-.14,3.17.07,3.54-.5,1.64,3.33-1.69,3.39-1.15,3-4.08,2.89-1.24,0-2.48-.14-3.72-.2q-3.81-.16-7.62-.17-8.11,0-16.18.78c-4.56.44-9.11,1.06-13.62,1.86-2.82.5-5.62,1.08-8.41,1.72-1.23.29-2.47.59-3.7.9-.59.16-1.19.3-1.78.45q-3.28,1.14-5.59-3c1.34-1.39-.77-3.52-2.12-2.12Z" transform="translate(-125.82 -71)" fill="#00beff"/><path d="M417.78,334.68c-14.47-.56-30.1,3.35-39.63,15-7.46,9.11-11.71,24.74-3.81,35,8.49,11,27.11,9.06,38.34,4.37,11.88-5,24.88-15.31,28.45-28.21,4.45-16.11-10-28.29-25.05-28.47-1.93,0-1.93,3,0,3,8.58.1,17,3.78,21,11.77,4.19,8.42.58,17.26-5,24-8.94,10.73-22.92,18.82-37.16,18.59-8.55-.13-18-3.06-20.65-12.08-2.18-7.31-.52-15.3,3.28-21.78,8.22-14,24.95-18.74,40.29-18.14,1.93.07,1.93-2.93,0-3Z" transform="translate(-125.82 -71)" fill="#00beff"/><path d="M403.41,356.9a3.9,3.9,0,0,0-5.24,4c.3,3.9,4.6,5,7.83,4.77,2.79-.24,6.05-1.27,5.07-4.76a4.48,4.48,0,0,0-2.44-2.82,5.65,5.65,0,0,0-2.82-.35c-.37,0-3.76,1.24-2.32-.25l-2.36-.31a2.46,2.46,0,0,1,.72,2,1.51,1.51,0,0,0,2.25,1.29,2,2,0,0,1,2.71,2.34,1.51,1.51,0,0,0,2.74,1.16c1-1.8,2.21-5.38.71-7.26-1-1.27-2.93-.89-4.13-.15a14.47,14.47,0,0,0-2.06,1.77c-1.21,1.07-2,1.57-1.55-.48.75-3.73,4.31-6.7,7.56-8.19l-2.2-1.69a31.62,31.62,0,0,1-6.05,11.85l2.56,1.06a6.68,6.68,0,0,1,4.08-6.51H407l.78,1.28c-.29,1.89,2.6,2.7,2.89.79.38-2.47-1.18-5.68-4.07-4.47-3.45,1.44-5.24,5.39-5.17,8.91,0,1.2,1.7,2.13,2.57,1.07a35.26,35.26,0,0,0,6.81-13.19,1.52,1.52,0,0,0-2.21-1.69,16.77,16.77,0,0,0-7.28,6.34c-1.22,2-2.75,5.12-1.51,7.42a3.18,3.18,0,0,0,4.35,1.23,11.7,11.7,0,0,0,2.51-2c.37-.33.78-.9,1.27-1,.44-.3.42-.13-.07.53a5.45,5.45,0,0,1-.87,2.92l2.74,1.15a5,5,0,0,0-7.11-5.73l2.26,1.3a5.45,5.45,0,0,0-1.13-3.53,1.52,1.52,0,0,0-2.35-.31c-1.52,1.59-1.81,4.34.1,5.81,1.43,1.09,2.13,0,3.7-.25,5.33-.69,2.22,1.71.34,1.79a7.09,7.09,0,0,1-2.51-.18q-3.13-1.06-.39-2.73c1.79.73,2.56-2.17.8-2.89Z" transform="translate(-125.82 -71)" fill="#00beff"/><path d="M401,362.38c1.23,4-3.85,5.32-6.26,6.7a13.94,13.94,0,0,0-4.33,3.79c-2.52,3.38-3.46,7.68-4.29,11.73-.38,1.89,2.51,2.69,2.9.8a34,34,0,0,1,2.53-8.63c1.8-3.58,4.38-4.78,7.74-6.62s5.79-4.69,4.6-8.57c-.56-1.84-3.46-1.05-2.89.8Z" transform="translate(-125.82 -71)" fill="#00beff"/><path d="M406,360.37a2.9,2.9,0,0,0-2.5,3c0,1.19.79,1.95,1.33,2.9a22.9,22.9,0,0,1,2.9,6.31c.48,2.15.95,6-.17,8-2.07,3.71-5.81,3-9,3-3,0-5.32,1-5.22-3.18.06-2.35,1.7-4.73,3-6.58l-2.74-.36a52.27,52.27,0,0,1,.91,9.26c0,1.39,2.13,2.16,2.79.75a57.93,57.93,0,0,0,3.81-10.54l-2.95-.4.52,7.6a1.51,1.51,0,0,0,2.79.76,3.4,3.4,0,0,0,.75-1.35c.1-.47-.82-3.64-1.19-2.51l2.94.4.21-7.22-3,.4a14.94,14.94,0,0,1,.56,6.3c-.19,1.67,2.62,2.05,3,.4l1.88-9.7-2.74.35a6.63,6.63,0,0,1,.51,4.32c-.22,1.92,2.78,1.9,3,0a10.54,10.54,0,0,0-.92-5.83,1.51,1.51,0,0,0-2.74.36l-1.89,9.7,2.95.4a16.36,16.36,0,0,0-.67-7.09,1.5,1.5,0,0,0-2.94.39l-.21,7.22c0,1.75,2.43,2,2.95.4l.16-.49a1.52,1.52,0,0,0-.38-1.46c-3.11-3.38-3.74,2-4.82,3.49l2.8.76-.52-7.6c-.11-1.62-2.51-2.12-2.95-.4a53.76,53.76,0,0,1-3.5,9.83l2.8.76a56.54,56.54,0,0,0-1-10.06c-.26-1.38-2.07-1.32-2.74-.36-2,2.88-5.46,9.17-2.79,12.62,2.33,3,9.66,1.84,12.79,1.65,4.94-.28,6.73-3.41,7.27-8.07a19.76,19.76,0,0,0-.37-6.68c-.27-1.18-3-8.66-3.82-8.51,1.9-.35,1.09-3.25-.8-2.9Z" transform="translate(-125.82 -71)" fill="#00beff"/><path d="M400.19,367.11,392,377.92l2.59,1.51,6-8.68-2.74-1.16L394.86,381a1.51,1.51,0,0,0,2.74,1.16,52.71,52.71,0,0,1,4.57-6.43l-2.5-1.46a16.33,16.33,0,0,1-3.77,6.93l2.51,1.46a13.4,13.4,0,0,1,1.09-4c.77-1.73-1.67-3.26-2.59-1.52a35.21,35.21,0,0,1-2.89,4.54l2.74.36.61-2.85-2.74-.36.44,2.5a1.51,1.51,0,0,0,2.51.66,29.86,29.86,0,0,0,6-9.05H401a13.47,13.47,0,0,1,1.41,4c.36,1.8,2.75,1.13,2.94-.4a81.31,81.31,0,0,0,.66-10.1h-3l0,6.29c0,1.63,2.67,2.11,2.95.4a11.46,11.46,0,0,1,1.47-4.3H404.8a6.67,6.67,0,0,1,1,3.4,1.5,1.5,0,0,0,3,0l.38-2h-2.89c.29,1.77,1.39,11.74-2.52,10.57-.66-.16-.85-.12-.57.11l.89-1.9,2.09-4.43-2.8-.76c.18,2.06.37,5-.87,6.76-1,1.43-4.08,2-5.65,1.16a10,10,0,0,1-2.61-2.74l-2.05,2c1.66,1.21,4.35,4.18,6.49,4.35,1.63.13,3-1.22,4.07-2.3a17.43,17.43,0,0,0,4.89-12.83,1.5,1.5,0,0,0-3,0l0,3.42a1.5,1.5,0,0,0,3,0v-8.39a1.5,1.5,0,0,0-3,0,36,36,0,0,1-.52,6l2.95.4a69.07,69.07,0,0,1-.33-7.19,1.5,1.5,0,0,0-2.94-.4c-.45,1.91-1,3.79-1.53,5.66l2.74-.36-.21-.8c-.14-1.91-3.14-1.92-3,0a5.49,5.49,0,0,0,.62,2.32c.58,1.22,2.39.79,2.74-.36.57-1.88,1.08-3.76,1.53-5.66l-2.95-.4a69.07,69.07,0,0,0,.33,7.19c.15,1.54,2.63,2.2,2.94.4a41.33,41.33,0,0,0,.63-6.84h-3v8.39h3l0-3.42h-3A14.42,14.42,0,0,1,401,380.46a12.29,12.29,0,0,1-1.26,1.24c-.71.68-1.36.58-1.93-.31-1.42-.59-2.89-2.11-4.13-3s-2.94.87-2.06,2.05c2.3,3.06,5.73,6.47,10,5,4.49-1.59,5.1-7.67,4.76-11.67-.11-1.33-2.1-2.23-2.79-.75-1,2.11-2,4.21-3,6.33-.35.74-1,1.76-.9,2.64.33,2.25,3.06,1.88,4.74,1.75,6.51-.49,5.48-9.72,4.73-14.36-.25-1.54-2.49-1.3-2.89,0a8.83,8.83,0,0,0-.49,2.84h3a11.89,11.89,0,0,0-1.41-4.91,1.51,1.51,0,0,0-2.59,0,14.58,14.58,0,0,0-1.78,5l3,.4,0-6.29a1.5,1.5,0,0,0-3,0,81.31,81.31,0,0,1-.66,10.1l2.95-.4a17.17,17.17,0,0,0-1.71-4.68,1.51,1.51,0,0,0-2.59,0,27.36,27.36,0,0,1-5.53,8.44l2.51.66-.44-2.5c-.23-1.33-2.11-1.37-2.74-.36a6.58,6.58,0,0,0-.91,5.16c.25,1.42,2.05,1.27,2.74.36a35.1,35.1,0,0,0,2.89-4.53l-2.59-1.52a17.06,17.06,0,0,0-1.4,4.71c-.18,1.32,1.39,2.7,2.51,1.46a20,20,0,0,0,4.54-8.26c.37-1.36-1.51-2.65-2.51-1.46a57.29,57.29,0,0,0-5,7l2.74,1.16,3.05-11.37a1.51,1.51,0,0,0-2.74-1.16l-6,8.69c-1.12,1.61,1.45,3,2.59,1.51l8.16-10.8c1.16-1.54-1.44-3-2.59-1.52Z" transform="translate(-125.82 -71)" fill="#00beff"/><path d="M527.77,403.2c12-7.34,21.54-18.29,32.14-27.45,11.5-9.93,23.57-19.18,36-27.94,24.14-17,49.49-32.21,74.82-47.38a1.5,1.5,0,0,0-1.51-2.59c-25.33,15.17-50.69,30.35-74.83,47.38-11.39,8-22.51,16.48-33.17,25.48-11.6,9.8-21.93,22-35,29.91-1.65,1-.14,3.6,1.51,2.59Z" transform="translate(-125.82 -71)" fill="#00beff"/><path d="M709.46,253.85c-13,1.32-27,4.63-35,16-6.91,9.78-6.76,26.84-.27,36.88,7.37,11.41,22.43,11.82,34.13,8.13s23.81-10.16,23.7-24.14c-.06-7.5-2.77-15.31-5.76-22.11-2.58-5.87-7.15-11-14.07-10.35-1.91.18-1.93,3.18,0,3,9.27-.86,12.25,10.15,14.45,17.1,2,6.49,3.85,14.17.71,20.62s-10.71,9.74-17.18,12.1c-7,2.54-14.69,4.09-22,2-14.48-4.05-18.48-22.4-14.31-35.42,4.8-15,21.8-19.41,35.65-20.81,1.9-.19,1.92-3.19,0-3Z" transform="translate(-125.82 -71)" fill="#00beff"/><path d="M729.46,369.85c-13,1.32-27,4.63-35,16-6.91,9.78-6.76,26.84-.27,36.88,7.37,11.41,22.43,11.82,34.13,8.13s23.81-10.16,23.7-24.14c-.06-7.5-2.77-15.31-5.76-22.11-2.58-5.87-7.15-11-14.07-10.35-1.91.18-1.93,3.18,0,3,9.27-.86,12.25,10.15,14.45,17.1,2,6.49,3.85,14.17.71,20.62s-10.71,9.74-17.18,12.1c-7,2.54-14.69,4.09-22,2-14.48-4.05-18.48-22.4-14.31-35.42,4.8-15,21.8-19.41,35.65-20.81,1.9-.19,1.92-3.19,0-3Z" transform="translate(-125.82 -71)" fill="#00beff"/><path d="M689.85,283.06l9.47,10.8a1.51,1.51,0,0,0,2.5-.67c2-5.26,1.62-10.71,2.09-16.24a53.47,53.47,0,0,1,4.25-16.57,55.93,55.93,0,0,1,22.38-25.65c1.65-1,.14-3.6-1.51-2.59A58.72,58.72,0,0,0,706.4,257a57.47,57.47,0,0,0-5,15.87c-1,6.49-.09,13.29-2.49,19.52l2.51-.67L692,280.94c-1.28-1.45-3.39.68-2.12,2.12Z" transform="translate(-125.82 -71)" fill="#00beff"/><path d="M532.6,414.89q77.37-2.36,154.78-1c1.93,0,1.93-3,0-3q-77.39-1.38-154.78,1c-1.93.06-1.94,3.06,0,3Z" transform="translate(-125.82 -71)" fill="#00beff"/><path d="M698.16,385.31a309.92,309.92,0,0,1,50.67,25.46c1.64,1,3.15-1.57,1.51-2.59A313.23,313.23,0,0,0,699,382.42c-1.79-.71-2.57,2.19-.79,2.89Z" transform="translate(-125.82 -71)" fill="#00beff"/><path d="M730.18,371.72a122.5,122.5,0,0,0-29.41,74.53c-.08,1.93,2.92,1.93,3,0a119.14,119.14,0,0,1,28.53-72.41c1.25-1.46-.86-3.59-2.12-2.12Z" transform="translate(-125.82 -71)" fill="#00beff"/><path d="M330.23,404,442,402.54l12.85-.17c2.31,0,4.62-.08,6.93-.09,3.25,0,5.44,2.7,5.38,6-.15,7-4.55,6.75-10.31,7l-13.89.63L386.4,418.4c-10.13.45-20.27,1-30.4,1.35-9.14.28-26.52-2.7-22.46-16,.56-1.85-2.33-2.64-2.9-.8-2,6.54,1.54,13.18,7.24,16.61,8.09,4.86,18.75,3.21,27.68,2.81L435,419.22l16.86-.75c4.32-.2,10.33.68,14.3-1.33,4.66-2.35,5.48-11.68,2.54-15.61-1.51-2-3.63-2.18-6-2.27-6.22-.24-12.55.17-18.78.25l-34.62.46-79.11,1c-1.93,0-1.93,3,0,3Z" transform="translate(-125.82 -71)" fill="#00beff"/><g id="b30eccf6-7cfe-48df-9caa-415a128bd568" data-name="Michel"><path d="M781.81,771.5c-2.52,1.58-5.4,2.47-8,3.86s-5.13,3.48-5.87,6.36a4,4,0,0,0,.13,2.72,5.28,5.28,0,0,0,2.8,2.22,42.49,42.49,0,0,0,33.61.38,44.27,44.27,0,0,1,5.8-2.3,37.69,37.69,0,0,1,7.43-.76,57.11,57.11,0,0,0,7.81-1,6.87,6.87,0,0,0,3.54-1.47,6.57,6.57,0,0,0,1.59-3.82,31.45,31.45,0,0,0-5-22.28,7.53,7.53,0,0,0-2.18-2.31,8.41,8.41,0,0,0-3.47-.93c-5-.61-10.24-1.73-15.29-1.85-3.62-.08-5.44,1.64-8,4.13C791.42,759.74,788.33,767.43,781.81,771.5Z" transform="translate(-125.82 -71)" fill="#323444"/><path d="M855.5,770.76c0,4.9.59,10.09,3.56,14a18.49,18.49,0,0,0,4.86,4.25c6.28,4,14.6,5.47,21.22,2.08a6.3,6.3,0,0,0,2.64-2.22c1-1.74.47-3.91-.09-5.83l-9.58-33.2c-6.19.95-15.29,1.62-20.79,4.76C853.33,756.87,855.5,766.38,855.5,770.76Z" transform="translate(-125.82 -71)" fill="#323444"/><path d="M776.19,566.33c-.58,1.83-2.68,2.68-3.83,4.22-1.35,1.81-1.21,4.32-.72,6.52a17.24,17.24,0,0,0,4.39,8.65,10.37,10.37,0,0,0,9,3.06c3.22-.61,6-3.46,6.11-6.73a12.74,12.74,0,0,0-.94-4.33L783.38,558a1,1,0,0,0-.48-.67,1,1,0,0,0-.75.13c-1.61.76-4.84,1.56-5.78,3.23S776.87,564.52,776.19,566.33Z" transform="translate(-125.82 -71)" fill="#fbb3b2"/><path d="M773,565.34c2.49-.39,4.67-1.85,7-2.81s5.25-1.33,7.21.27c.56.46,1.1,1.09,1.83,1.08a71.59,71.59,0,0,0-4.48-14.24,1.11,1.11,0,0,0-.39-.55,1.13,1.13,0,0,0-.85,0l-6.73,1.76c-2.49.65-2.78.45-2.59,2.9C774.05,554.84,774.61,565.34,773,565.34Z" transform="translate(-125.82 -71)" fill="#323444"/><path d="M772.26,422.94c-1,1.54-1,3.46-1,5.27,0,8.85.09,17.75,1.4,26.51.31,2.1.7,4.2.9,6.32a72.91,72.91,0,0,1,.14,8.87l-1,38.5c-.12,4.71-.36,9.77-3.27,13.47a6.44,6.44,0,0,0-1.17,4.27c.76,9.66,2.36,19.24,3.95,28.79a17.79,17.79,0,0,1,16.14.77,177.66,177.66,0,0,0,8.29-49c.23-8.19-.12-16.43,1.14-24.52,2.11-13.62,1.25-27.59-.3-41.29-.49-4.34-1.53-8.81-4.31-12.17a18.45,18.45,0,0,0-10-5.76C779.47,422,776.16,423,772.26,422.94Z" transform="translate(-125.82 -71)" fill="#5b5583"/><path d="M772.26,422.94c-1,1.54-1,3.46-1,5.27,0,8.85.09,17.75,1.4,26.51.31,2.1.7,4.2.9,6.32a72.91,72.91,0,0,1,.14,8.87l-1,38.5c-.12,4.71-.36,9.77-3.27,13.47a6.44,6.44,0,0,0-1.17,4.27c.76,9.66,2.36,19.24,3.95,28.79a17.79,17.79,0,0,1,16.14.77,177.66,177.66,0,0,0,8.29-49c.23-8.19-.12-16.43,1.14-24.52,2.11-13.62,1.25-27.59-.3-41.29-.49-4.34-1.53-8.81-4.31-12.17a18.45,18.45,0,0,0-10-5.76C779.47,422,776.16,423,772.26,422.94Z" transform="translate(-125.82 -71)" opacity="0.1"/><path d="M784.48,534.59A176.61,176.61,0,0,0,795,636.83a27.73,27.73,0,0,1,2.44,7.56c.55,4.9-1.71,9.61-3,14.35-3,10.78-1.27,22.26.65,33.29q1.2,6.9,2.47,13.79c.83,4.48,1.63,9.35-.45,13.41,1.79,7.46,2.85,14.85,4.64,22.31a4.24,4.24,0,0,1,.17,1.83,5.39,5.39,0,0,1-1.83,2.45,10.94,10.94,0,0,0-2.79,10.47c4.57-3.28,10.94-2.13,16.16,0s10.36,5,16,5c-.82-6.62-1.61-13.57.83-19.78,1.42-3.6,3.92-7,3.85-10.85-.07-3.45-2.18-6.53-2.69-9.94a25.16,25.16,0,0,1,.24-6.36c1.34-12.24-.18-24.6-1.7-36.82a22,22,0,0,0-1.68-7c-.71-1.44-1.77-2.82-1.75-4.43,0-1.87,1.51-3.39,2.07-5.17,1-3.28-.84-7.74,1.93-9.77,7.3-5.36,4.5-18.16,4.34-27.21q-.19-11.71-1-23.4a99.67,99.67,0,0,1,5.52,40.34c-.32,4.48-.91,9.19.84,13.33,1.34,3.18,4,5.8,4.72,9.17.45,2.08.13,4.23.23,6.35s.82,4.43,2.65,5.5c.14,9.64,1,19.95,1.15,29.59a73,73,0,0,0,1.2,14.7,18.73,18.73,0,0,1,.74,4.74,19.81,19.81,0,0,1-1.58,5.83,33.43,33.43,0,0,0,5,30.85c2.36-4.19,7.28-6.41,12.08-6.76s9.54.86,14.19,2.08a27.79,27.79,0,0,1,3.32-16.9,13.83,13.83,0,0,0,1.75-3.76c.54-2.54-.72-5.07-1.4-7.58-1.11-4-.72-8.31-.46-12.49A197.64,197.64,0,0,0,882,673.63a35.51,35.51,0,0,0-1.91-8c-.36-.92-.8-1.8-1.1-2.73a21.52,21.52,0,0,1-.8-5.12l-1.15-16c-.81-11.21,2.87-22.28,5.44-33.22,1.15-4.9,2.4-9.79,3.17-14.77,1.05-6.78,1.22-13.71,2.76-20.4,1.38-6,3.87-11.85,4.39-18,.8-9.53-3.16-18.74-7-27.48-1.6-3.6-7.65-3.24-11.54-3.88-27.59-4.53-56.65-4.56-82.67,5.65A20.57,20.57,0,0,0,784.48,534.59Z" transform="translate(-125.82 -71)" fill="#3c354c"/><path d="M804.37,357.1,807.43,369a31.8,31.8,0,0,1,1.37,8.41,6.21,6.21,0,0,1-.67,3,7.15,7.15,0,0,1-1.9,1.94c-2.09,1.59-3.54,5.3-5.93,6.4,1.23,2.14,2.93.75,5.15,1.82,3.91,1.9,7.49,4.63,11.73,5.57,4,.88,8.2.05,12.17-1,5.63-1.53,11.23-3.64,15.76-7.33s7.11-6.95,7.09-12.78c-5,.59-9.45-4.46-11.66-9a24.45,24.45,0,0,1-1.68-5.39l-2.68-11.79c-2.92.64-5.3,2.73-8.09,3.82S822,353.86,818.9,354a99,99,0,0,0-16.36,2.12c-.74.15-1.67.62-1.49,1.34" transform="translate(-125.82 -71)" fill="#fbb3b2"/><path d="M804.37,357.1,807.43,369a31.8,31.8,0,0,1,1.37,8.41,6.21,6.21,0,0,1-.67,3,7.15,7.15,0,0,1-1.9,1.94c-2.09,1.59-3.54,5.3-5.93,6.4,1.23,2.14,2.93.75,5.15,1.82,3.91,1.9,7.49,4.63,11.73,5.57,4,.88,8.2.05,12.17-1,5.63-1.53,11.23-3.64,15.76-7.33s7.11-6.95,7.09-12.78c-5,.59-9.45-4.46-11.66-9a24.45,24.45,0,0,1-1.68-5.39l-2.68-11.79c-2.92.64-5.3,2.73-8.09,3.82S822,353.86,818.9,354a99,99,0,0,0-16.36,2.12c-.74.15-1.67.62-1.49,1.34" transform="translate(-125.82 -71)" opacity="0.1"/><circle cx="691.69" cy="266.18" r="26.48" fill="#fbb3b2"/><path d="M824.8,380.83a24,24,0,0,1,6-8c3.73-3.27,8.83-5.92,9.71-10.8l8.08,9.41a4.35,4.35,0,0,1,1,1.54,3.88,3.88,0,0,1-.76,3.11c-2,3.19-5.15,5.47-8.13,7.78a246.91,246.91,0,0,0-19.59,17.28,2,2,0,0,1-1.05.64,1.89,1.89,0,0,1-1.09-.31A45.49,45.49,0,0,1,805,390.12c-.29-.35-.65-.75-1.12-.72a1.44,1.44,0,0,0-.75.39c-2.69,2.2-5.63,4.83-9.08,4.49,4.47-3.21,7-8.57,7.94-14a26.46,26.46,0,0,1,1.14-5.47,5.71,5.71,0,0,1,3.9-3.7c-2.18,3.33-.69,8.05,2.24,10.74a22.08,22.08,0,0,0,9.92,4.81C822.59,387.3,823.59,383.45,824.8,380.83Z" transform="translate(-125.82 -71)" fill="#323444"/><path d="M790.35,537.31c3.77.93,7.34,2.51,11,3.68A52.57,52.57,0,0,0,822,543.16a11.15,11.15,0,0,0,6-1.91c.47-.38.9-.83,1.4-1.18a9.79,9.79,0,0,1,2.69-1.11c9.17-2.87,16.85-9.06,24.3-15.12.24-.2.51-.45.49-.77a1,1,0,0,0-.3-.57l-3.92-4.5c-10.28,1.75-20.81,1.09-31.24.83A45.36,45.36,0,0,0,815,519c-2.06.24-4.09.76-6.12,1.2-7.71,1.68-15.59,2.32-23.4,3.42a3.61,3.61,0,0,0-1.55.48,3.49,3.49,0,0,0-.83.92l-2.74,3.85a12.11,12.11,0,0,0-2.3,4.41c-.64,3,.7,4,3.25,3.61A23.74,23.74,0,0,1,790.35,537.31Z" transform="translate(-125.82 -71)" fill="#323444"/><path d="M821,396.57a48.71,48.71,0,0,0-10.31-8.05,14.61,14.61,0,0,0-5-2,6.24,6.24,0,0,0-5.12,1.26c-.89.79-1.45,1.89-2.31,2.72a11.49,11.49,0,0,1-3.66,2.07,64.92,64.92,0,0,0-12.86,7.33,29.5,29.5,0,0,0-5.83,5.38c-4.53,5.8-5.21,13.69-5.09,21.05.09,5.12,5,8.92,8.38,12.75a93.94,93.94,0,0,1,8.58,12c1.82,2.88,3.72,6,3.49,9.43-.19,2.81-1.83,5.45-1.57,8.25.09,1,.41,1.92.5,2.89.18,2-.61,4-.81,6-.27,2.83.65,5.64.7,8.49a27,27,0,0,1-.74,5.79c-1.92,9.14-4.33,18.33-3.84,27.66l-5.54,1a4.68,4.68,0,0,1-1.07,7.47c8.65,2.89,18,1.43,27.17,1.42,7.59,0,15.15,1,22.73.86s15.4-1.51,21.65-5.8c1.7-1.16,3.26-2.52,5.05-3.53a24.91,24.91,0,0,1,7.65-2.5,75.91,75.91,0,0,1,15-1.34c2.46,0,5.14.1,7.1-1.38,2.16-1.64,2.71-4.61,3-7.3.29-2.84.47-5.69.52-8.54a36.82,36.82,0,0,0-.35-6.64,43.48,43.48,0,0,0-1.17-4.76l-3.77-13.28c-1.56-5.48.61-11.49,1.07-17.17.11-1.34.13-2.9-.9-3.76-.37-.31-.88-.52-1-1a1.71,1.71,0,0,1,.24-1.34c2-4,5-7.53,7.74-11.14a227.64,227.64,0,0,0,12.8-19.67,63.29,63.29,0,0,0-16.94-37.88c-2-2.17-4.29-4.25-7.09-5.23a21,21,0,0,0-5.64-.91c-7.84-.53-16-1-22.83-4.94a4.34,4.34,0,0,0-1.63-.69c-1.51-.17-2.61,1.32-3.59,2.5-2.52,3-6.23,4.72-9.49,6.93C830.14,385.1,825.39,390.78,821,396.57Z" transform="translate(-125.82 -71)" fill="#5b5583"/><path d="M904.11,425.28c1.56,4.94,1.41,10.22,1.92,15.37a59.8,59.8,0,0,0,1.63,9.21,14.7,14.7,0,0,0,1.9,4.69c.9,1.32,2.19,2.39,2.76,3.88a9.37,9.37,0,0,1,.41,3.12l.12,6.9a24.81,24.81,0,0,1-1.63,10.74l-4.31,13.11c-2.33,7.1-4.72,14.31-8.92,20.49a5.91,5.91,0,0,1-2.57,2.41,12.48,12.48,0,0,1-2.59.4,6.66,6.66,0,0,0-5.49,6.47,15.19,15.19,0,0,0-3.69-3.77l-8.77-7c-3-2.44-6.13-4.92-9.77-6.33a26.49,26.49,0,0,0,18.42-22.26,10,10,0,0,1,1-4.38c.73-1.18,2.08-2.08,2.18-3.47.12-1.75-1.86-3.07-1.86-4.82,0-1.16.86-2.12,1.24-3.21a8.06,8.06,0,0,0,0-4.11L884.88,456a5.13,5.13,0,0,0-.6-1.92,12.42,12.42,0,0,0-1.5-1.58c-2.08-2.33-1.16-6,0-8.87A84.78,84.78,0,0,1,893,425.7a61.31,61.31,0,0,0,4.07-5.82c1.06-1.84,1.3-4.39,2.42-6C900.93,417.66,902.88,421.39,904.11,425.28Z" transform="translate(-125.82 -71)" fill="#5b5583"/><path d="M864.8,505.38a4.82,4.82,0,0,0-1.14,1.2,10.11,10.11,0,0,1-4.53,3.23c1,.72,1.91,1.43,2.85,2.16a124.88,124.88,0,0,1,19,18.17c.63-2.25,4.4-2.09,5.32-4.24a4.15,4.15,0,0,0,.2-1.92,58.57,58.57,0,0,0-1.44-10,11.32,11.32,0,0,0-2-4.68c-1.4-1.69-3.58-2.5-5.66-3.2C874.25,505,868,503.45,864.8,505.38Z" transform="translate(-125.82 -71)" fill="#323444"/><path d="M852.3,513.24c-3,2.22-5.63,5-9,6.52-2.38,1.08-5.09,1.55-7.17,3.16,1.13,2.49,4.07,3.78,6.8,3.68a16.16,16.16,0,0,0,7.61-2.79c1.79-1.1,3.89-2.38,5.84-1.61.3,1.52-1,2.95-1,4.49s1.28,2.66,2.54,3.47c6,3.87,13.72,3.55,20.87,3.1a1.88,1.88,0,0,0,1.15-.34,1.81,1.81,0,0,0,.43-1.32c.09-1.58.13-3.15.14-4.73a6.78,6.78,0,0,0-2.9-6.68,81.61,81.61,0,0,0-12.5-8.85C860.71,508.79,856.25,510.3,852.3,513.24Z" transform="translate(-125.82 -71)" fill="#fbb3b2"/><path d="M826.81,326.11c-4.44.53-7.67,4-7.22,7.77s4.41,6.37,8.85,5.83,7.67-4,7.22-7.76S831.25,325.58,826.81,326.11Zm1.51,12.56c-3.76.45-7.11-1.76-7.5-4.94s2.36-6.12,6.11-6.57,7.11,1.76,7.5,4.94S832.07,338.22,828.32,338.67Z" transform="translate(-125.82 -71)" fill="#3c354c"/><path d="M805.17,328.71c-4.44.53-7.67,4-7.22,7.76s4.41,6.37,8.85,5.84,7.67-4,7.22-7.77S809.61,328.18,805.17,328.71Zm1.51,12.55c-3.76.45-7.11-1.76-7.49-4.93s2.35-6.12,6.11-6.58,7.11,1.76,7.49,4.94S810.43,340.81,806.68,341.26Z" transform="translate(-125.82 -71)" fill="#3c354c"/><polygon points="663.28 259.64 672.93 261.7 671.98 264.24 662.88 261.57 663.28 259.64" fill="#3c354c"/><polygon points="717.07 253.18 708.17 257.47 709.7 259.71 717.91 254.96 717.07 253.18" fill="#3c354c"/><polygon points="687.31 261.06 694.08 260.25 693.73 261.93 687.92 262.32 687.31 261.06" fill="#3c354c"/><path d="M800,329.79a10.74,10.74,0,0,0,1-4.37,9.34,9.34,0,0,1,.46-2.66,7.44,7.44,0,0,1,2.18-2.79c3.12-2.64,7.59-4,12-4.19a27.74,27.74,0,0,1,13.88,3,10.8,10.8,0,0,1,3.45,2.56c1.4,1.71,1.7,3.92,3.11,5.61a8.17,8.17,0,0,0,7.66,2.4c.49-1.74-.15-3.58.1-5.36a25.93,25.93,0,0,1,1.59-4.44c1.55-4.57-.71-9.87-5.37-12.6-1.63-1-3.56-1.65-4.78-3s-1.51-2.75-2.35-4.1c-2.23-3.57-8-5.24-12.39-3.59-1.38.52-2.6,1.31-4,1.87-2.6,1.07-5.56,1.26-8.42,1.62a25.79,25.79,0,0,0-8.16,2.14c-2.47,1.22-4.54,3.18-5.11,5.52-.27,1.08-.21,2.2-.48,3.27-1.38,5.43-10.29,8.07-10.79,13.61-.18,2,.91,3.92,2.27,5.55.94,1.11,3.19,4.08,4.78,4.51s2.8-1.08,4.32-1.6C797.35,332,798.8,331.84,800,329.79Z" transform="translate(-125.82 -71)" fill="#cbceda"/></g><path d="M912.81,682c0,50.24,31.52,90.9,70.47,90.9" transform="translate(-125.82 -71)" fill="#46455b"/><path d="M983.28,772.91c0-50.81,35.18-91.92,78.65-91.92" transform="translate(-125.82 -71)" fill="#00beff"/><path d="M938.35,686.56c0,47.73,20.1,86.35,44.93,86.35" transform="translate(-125.82 -71)" fill="#00beff"/><path d="M983.28,772.91c0-64.92,40.66-117.46,90.9-117.46" transform="translate(-125.82 -71)" fill="#46455b"/><ellipse cx="854.41" cy="716.31" rx="17.52" ry="2.96" fill="#00beff" opacity="0.1"/><path d="M968.46,773.55s10-.31,13-2.45,15.37-4.71,16.12-1.27,15,17.11,3.73,17.2-26.22-1.76-29.22-3.59S968.46,773.55,968.46,773.55Z" transform="translate(-125.82 -71)" fill="#a8a8a8"/><path d="M1001.52,785.83c-11.28.09-26.21-1.76-29.22-3.59-2.29-1.39-3.2-6.4-3.51-8.7h-.33s.63,8.06,3.64,9.89,17.94,3.68,29.22,3.59c3.26,0,4.38-1.19,4.32-2.9C1005.19,785.16,1004,785.81,1001.52,785.83Z" transform="translate(-125.82 -71)" opacity="0.2"/><path d="M148.31,711.36c0,40,25.07,72.32,56.06,72.32" transform="translate(-125.82 -71)" fill="#46455b"/><path d="M204.37,783.68c0-40.42,28-73.13,62.57-73.13" transform="translate(-125.82 -71)" fill="#00beff"/><path d="M168.62,715c0,38,16,68.7,35.75,68.7" transform="translate(-125.82 -71)" fill="#00beff"/><path d="M204.37,783.68c0-51.65,32.35-93.45,72.32-93.45" transform="translate(-125.82 -71)" fill="#46455b"/><ellipse cx="76.12" cy="724.14" rx="13.94" ry="2.36" fill="#00beff" opacity="0.1"/><path d="M192.58,784.19s7.95-.25,10.34-2,12.24-3.75,12.83-1,11.95,13.61,3,13.68-20.86-1.4-23.25-2.85S192.58,784.19,192.58,784.19Z" transform="translate(-125.82 -71)" fill="#a8a8a8"/><path d="M218.88,794c-9,.07-20.86-1.4-23.25-2.86-1.82-1.1-2.54-5.09-2.79-6.92h-.26s.5,6.41,2.89,7.87,14.28,2.92,23.25,2.85c2.59,0,3.49-.94,3.44-2.31C221.8,793.43,220.81,793.94,218.88,794Z" transform="translate(-125.82 -71)" opacity="0.2"/></svg>
</div>
    </body>
</html>