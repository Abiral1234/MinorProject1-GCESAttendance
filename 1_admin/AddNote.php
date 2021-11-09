<?php 
include_once '../connection.php'; 
session_start();

 $sql_create="CREATE TABLE IF NOT EXISTS `Notes`(
    `id` int(11)  NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `batchname` varchar(255) NOT NULL,
    `subject` varchar(255) NOT NULL,
    `fileurl` varchar(255) NOT NULL,
    `datetime` datetime NOT NULL  )";
  if($result=mysqli_query($connect_to_extra_database ,$sql_create)){}
    else{
      echo "error";
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
   
    <link rel="stylesheet" type="text/css" href="../CSS/homecss.css">
    <link rel="stylesheet" type="text/css" href="../CSS/AddNote1.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="../CSS/nav.css">
    <style type="text/css">
      a{
        text-decoration: none;
        color: black;
      }
      .uploaded_files{
        text-align: center;
        background-color: #ebfaff;
        width: 70vw;
        align-items: center;
        height: 60px;
        padding-top: 10px;
         padding-bottom: 10px;
    
      }
      .uploaded_files:nth-of-type(odd) {
    background-color: #ffffff;}

      svg{
        position: absolute;
        width: 40%;
        margin-left: 30vw;
      }

     
    </style>

<script type="text/javascript"> 
    var pair;   
    function populate(s1,s2){   //funtion that run when different batch is selected to put differernt subject 
      var s1=document.getElementById(s1);
      var s2=document.getElementById(s2);
      
      var thisYear=<?php echo date("Y");?>;
      var batchName=s1.value;

      var pair=batchName.split("_");//splitting the batch name to program and year using "_" as separator foreg: BESE_2018 to BESE and 2018
      var batchProgram =pair[0];      
      var batchAdmitYear = pair[1];
      

      var batchCurrentYear= thisYear - batchAdmitYear;

      s2.innerHTML = " ";
      if(batchProgram == "BESE"){      //TO select subjects of BESE
        if(batchCurrentYear == 1){   //BESE 1st Years
          var optionArray=["Choose Your Subject|Not selected","Engineering MathematicsI|MTH 112","Physics|PHY 111","Communication Technique|ENG 111","Problem Solving Techniques|CMP 114","Fundamentals of IT|CMP 110","Programming in C|CMP 113","Engineering MathematicsII|MTH 114","Logic Circuits|ELX 212","Mathematical Foundation of Computer Science|MTH 130","Engineering Drawing|MEC 120","Object Oriented Programming in C++|CMP 115","Web Technology|CMP 213"];

        }

        else if(batchCurrentYear == 2){   //BESE 2nd Years
          var optionArray=["Choose Your Subject|Not selected","Engineering Mathematics III|","Software Engineering Fundamentals|","Microprocessor  Assembly Lang. Pro.|","Data Structure and Algorithms|","Probability  Queuing Theory|","Programming in Java |","Numerical Methods|","Computer Graphics|","Computer Organization  Architecture|","Database Management Systems|","Object Oriented Design  Modeling through UML|"];

        }
        else if(batchCurrentYear == 3){   //BESE 3rd Years
          var optionArray=["Choose Your Subject|Not selected","Applied Operating System|","Simulation  Modeling|","Artificial Intelligence  Neural Network|","System Programming|","Analysis  Design of Algorithm|","Organization and Management|","Multimedia Systems|","Computer Networks|","Principles of Programming Languages|","Engineering Economics|","Object Oriented Software Development|"];

        }
        else if(batchCurrentYear == 4){   //BESE 4th Years
          var optionArray=["Choose Your Subject|Not selected","Real Time Systems|","Distributed Systems|","Enterprise Application Development|","Image Processing and Pattern Recognition|","Software Testing,Verification,Validation and Quality Assurance|","Elective I|","Network Programming|","Software Project Management|","Elective II|"];

        }

      }
      if (batchProgram =="BECE") {
        if (batchCurrentYear == 1 ) {
          var optionArray=["Choose Your Subject|Not selected","Engineering Mathematics I|","Chemistry|","Communication Technique|","Programming in C|","Basic Electrical Engineering|","Mechanical Workshop|","Engineering Mathematics II|","Physics|","Engineering Drawing|","Object Oriented Programming in C++|","Thermal Science|","Applied Mechanics|"]
        }

        else if (batchCurrentYear == 2 ) {
          var optionArray=["Choose Your Subject|Not selected","Engineering Mathematics III|","Data Structure and Algorithm|","Electrical Engineering Materials|","Network Theory|","Electronic Devices|","Logic Circuits|","Engineering Mathematics IV|","Instrumentation|","Electronic Circuits|","Theory of Computation|","Microprocessors|"]
        }
        else if (batchCurrentYear == 3 ) {
          var optionArray=["Choose Your Subject|Not selected","Numerical Methods|","Microprocessor System and Interfacing|","Operating System|","Computer Graphics|","Integrated Digital Electronics|","Probability and Statistics|","Simulation and Modeling|","Data Communication|","Database Management System|","Object Oriented Software Engineering|"]
        }
        else if (batchCurrentYear == 4 ) {
          var optionArray=["Choose Your Subject|Not selected","Engineering Economics|","Computer Architecture|","Digital Signal Processing|","Computer Network|","Elective I|","Organization and Management|","Artificial Intelligence|","Image Processing  Pattern Recognition|","Elective II|"]
        }
      }

      for(var option in optionArray){

        pair= optionArray[option].split("|");
        var newOption=document.createElement("option");
        if(pair[0]=="Choose Your Subject"){
          newOption.value = pair[1];
        }
        else{
        newOption.value = pair[0];
        }
        newOption.name =pair[0];
        newOption.innerHTML = pair[0];
        s2.options.add(newOption);

        }
        }
</script> 

</head>

<body>

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
                <li><a href="Statistics.php">Statistics</a> </li><!-- nav bar -->
                <li><a href="notice.php">Notice</a></li>
                <li><a href="../index.php">logout</a> </li>

            </ul>
        </div>
      </nav>
</header>

<!--SELECT BATCH AND SUBJECT -->

<div class="select_button">
<form action="" method="POST">
      <!-- Select Menu for batch imported  from batch table database-->
      <span class="select_menu_span">Upload Notes For:</span>
        <select required id="batch_select" class="batch_select" name="batch_name1" onchange="populate('batch_select','subject_select')">
          <option  selected value="No batch selected" >Choose Your Batch</option> 
          <?php 
            $sql_select_batch="SELECT * FROM `batch_list`;";
            $result_batch=mysqli_query($connect_to_list_database,$sql_select_batch);
            while($row= mysqli_fetch_assoc($result_batch)){         
            ?>
          <option required value="<?php echo $row['batchname'] ;?>" name="option_value" >
            
            <?php echo $row['batchname'] ;?>
          </option>

          <?php }?> 
        </select>

      <!-- Select Menu for subject shown according to selected batch-->

        <select id="subject_select" class="subject_select" name="selected_subject_name">
          <option  selected value="No subject selected">Choose Your Subject</option> 
          
        </select>
        <input  class="enterbutton" type="submit" name="batch_submit" value="Enter" >
</form>

</div>


<?php if (isset($_POST['batch_submit']) || isset($_POST['submit1'] ) ) {
  if ($_POST['batch_name1']!="No batch selected" && $_POST['selected_subject_name']!="No subject selected" && $_POST['selected_subject_name']!="Not selected" ) {

  ?>

<!-- Shows the Selected batch name and subject name -->
<form action="" method="POST" enctype="multipart/form-data">
  <div class="uploadFileSection">
  <div class="batch_and_subject_name">
        <span id="batch_name1">
        <?php echo "Batch Name        :  ";  echo $_POST['batch_name1'] ; ?>


        <br></br>
      </span>
      <span id="subject_name1">
        <?php echo "Subject Name:";  echo $_POST['selected_subject_name'];   ?>
        
      </span>
  </div>

 <!--Upload button to add new file -->


  <div class="uploadSection">
      
          <div class="upfile"> 
                        <input type="file" id="actual-btn" name="uploadfile" hidden/>

                        <!--custom upload button -->
                        <label for="actual-btn">Choose File</label>

                        <!-- name of file chosen -->
                        <span id="file-chosen">No file chosen</span>


                      <!--TO SEND BATCH NAME AND SUBJECT NAME AGAIN IN THE FORM -->
                      <select style="display: none;" name="batch_name1"><option> <?php echo $_POST['batch_name1']; ?></option></select>

                       <select style="display: none;" name="selected_subject_name"><option> <?php echo $_POST['selected_subject_name']; ?></option></select>

                        <input type="submit" value="Upload File" class="submitfile" name="submit1">
              </div>
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
        if (isset($_POST['submit1'])) {
        $filename=$_FILES["uploadfile"]["name"];
        $tempname=$_FILES["uploadfile"]["tmp_name"];
        $folder="../Notes/".$filename;
        move_uploaded_file( $tempname ,$folder );
        $datetime=date("Y-m-d H:i:s");
        $batch = $_POST['batch_name1'];
        $subject = $_POST['selected_subject_name'];
        $sql_insert_image="INSERT INTO notes (batchname,subject,fileurl,datetime) VAlUES('$batch','$subject','$folder','$datetime') ";  //to move image to our folder and pass our url to database 
        $result=mysqli_query($connect_to_extra_database ,$sql_insert_image);

        }
        ?>
        <?php
        $batch = $_POST['batch_name1'];
        $subject = $_POST['selected_subject_name'];
        $sql_select_image="SELECT * FROM notes  WHERE batchname='$batch' && subject='$subject' ORDER BY datetime desc";
        $result2=mysqli_query($connect_to_extra_database ,$sql_select_image);
        echo "<h2>Files:</h2>";
        $count=1;
        while($row=mysqli_fetch_assoc($result2)){ 
          $fileurl = $row['fileurl'];
          $datetime0=$row['datetime'];
          $filename0=str_replace('../Notes/', '', $fileurl);
          

        echo "<div class='uploaded_files' ><a  href='$fileurl'><h2 class='filename'>$count, $filename0 </h2></div> ";
        $count++;
        
        } ?>

</div>
<?php } }?>


<script src="../Js/navbar.js"></script>
<svg id="f70d1d67-2307-47c9-95aa-2ba80c7f80c2" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="895.59736" height="639.82439" viewBox="0 0 895.59736 639.82439"><title>Working</title><rect x="250.162" y="150.83166" width="207.97236" height="302.01031" rx="13.4354" transform="translate(-210.09179 -44.46974) rotate(-12.75221)" fill="#3f3d56"/><circle cx="87.59736" cy="87" r="6" fill="#fff"/><circle cx="93.59736" cy="109" r="6" fill="#fff"/><circle cx="132.59736" cy="270" r="6" fill="#fff"/><circle cx="138.59736" cy="292" r="6" fill="#fff"/><rect x="287.34855" y="259.69755" width="124.87617" height="20.8127" transform="translate(-203.1948 -46.21522) rotate(-12.75221)" fill="#f5f5f5"/><rect x="397.94823" y="256.36244" width="207.97236" height="302.01031" transform="translate(-229.7408 -9.24511) rotate(-12.75221)" fill="#00beff"/><rect x="611.85483" y="207.95166" width="207.97236" height="302.01031" transform="translate(-213.77859 36.77746) rotate(-12.75221)" fill="#3f3d56"/><rect x="411.34855" y="292.69755" width="124.87617" height="20.8127" transform="translate(-207.42045 -18.03009) rotate(-12.75221)" fill="#f5f5f5"/><rect x="399.91546" y="341.94676" width="166.50156" height="5.20317" transform="translate(-216.33734 -14.93741) rotate(-12.75221)" fill="#f5f5f5"/><rect x="402.59534" y="353.78804" width="166.50156" height="5.20317" transform="translate(-218.88502 -14.05378) rotate(-12.75221)" fill="#f5f5f5"/><rect x="405.27523" y="365.62931" width="166.50156" height="5.20317" transform="translate(-221.4327 -13.17016) rotate(-12.75221)" fill="#f5f5f5"/><rect x="409.02463" y="387.04161" width="79.782" height="5.20317" transform="translate(-227.13618 -21.3854) rotate(-12.75221)" fill="#f5f5f5"/><rect x="411.55479" y="397.54294" width="91.92274" height="5.20317" transform="translate(-229.24205 -19.22793) rotate(-12.75221)" fill="#f5f5f5"/><rect x="413.31489" y="401.15313" width="166.50156" height="5.20317" transform="translate(-229.07574 -10.51929) rotate(-12.75221)" fill="#f5f5f5"/><rect x="415.99477" y="412.9944" width="166.50156" height="5.20317" transform="translate(-231.62342 -9.63567) rotate(-12.75221)" fill="#f5f5f5"/><rect x="418.82439" y="426.17562" width="154.36082" height="5.20317" transform="translate(-234.61292 -10.02588) rotate(-12.75221)" fill="#f5f5f5"/><rect x="421.35455" y="436.67695" width="166.50156" height="5.20317" transform="translate(-236.71878 -7.86842) rotate(-12.75221)" fill="#f5f5f5"/><rect x="425.01839" y="457.32356" width="86.71956" height="5.20317" transform="translate(-242.1698 -15.35575) rotate(-12.75221)" fill="#f5f5f5"/><rect x="647.92631" y="420.51287" width="91.92274" height="5.20317" transform="translate(-228.48193 33.51412) rotate(-12.75221)" fill="#00beff" opacity="0.3"/><rect x="649.68641" y="424.12307" width="166.50156" height="5.20317" transform="translate(-228.31563 42.22276) rotate(-12.75221)" fill="#00beff" opacity="0.3"/><rect x="652.36629" y="435.96434" width="166.50156" height="5.20317" transform="translate(-230.86331 43.10638) rotate(-12.75221)" fill="#00beff" opacity="0.3"/><rect x="655.19591" y="449.14556" width="154.36082" height="5.20317" transform="translate(-233.8528 42.71617) rotate(-12.75221)" fill="#00beff" opacity="0.3"/><rect x="657.72606" y="459.64689" width="166.50156" height="5.20317" transform="translate(-235.95867 44.87363) rotate(-12.75221)" fill="#00beff" opacity="0.3"/><rect x="497.42189" y="461.51781" width="100.59469" height="69.37565" transform="translate(-248.22113 3.0525) rotate(-12.75221)" fill="#f5f5f5"/><rect x="613.5551" y="236.07039" width="100.59469" height="69.37565" transform="translate(-195.59243 23.12624) rotate(-12.75221)" fill="#00beff" opacity="0.3"/><rect x="709.58529" y="306.8063" width="100.59469" height="69.37565" transform="translate(-208.83762 46.06825) rotate(-12.75221)" fill="#00beff" opacity="0.3"/><g opacity="0.5"><rect x="185.59736" y="510.28636" width="3" height="17" fill="#47e6b1"/><rect x="337.79868" y="640.37417" width="3" height="17" transform="translate(835.97153 179.48768) rotate(90)" fill="#47e6b1"/></g><g opacity="0.5"><rect x="512.59736" width="3" height="17" fill="#47e6b1"/><rect x="664.79868" y="130.08781" width="3" height="17" transform="translate(652.68517 -657.79868) rotate(90)" fill="#47e6b1"/></g><g opacity="0.5"><rect x="885.59736" y="125" width="3" height="17" fill="#47e6b1"/><rect x="1037.79868" y="255.08781" width="3" height="17" transform="translate(1150.68517 -905.79868) rotate(90)" fill="#47e6b1"/></g><path d="M512.491,638.67962a3.67461,3.67461,0,0,1-2.04749-4.441,1.766,1.766,0,0,0,.07991-.40754h0a1.84258,1.84258,0,0,0-3.31045-1.22119h0a1.76564,1.76564,0,0,0-.2039.3618,3.6746,3.6746,0,0,1-4.441,2.04748,1.76645,1.76645,0,0,0-.40754-.0799h0a1.84257,1.84257,0,0,0-1.22119,3.31045h0a1.76637,1.76637,0,0,0,.3618.2039,3.67459,3.67459,0,0,1,2.04749,4.441,1.766,1.766,0,0,0-.0799.40754h0a1.84257,1.84257,0,0,0,3.31044,1.22119h0a1.76584,1.76584,0,0,0,.2039-.3618,3.67459,3.67459,0,0,1,4.441-2.04748,1.766,1.766,0,0,0,.40754.0799h0a1.84257,1.84257,0,0,0,1.22119-3.31045h0A1.7661,1.7661,0,0,0,512.491,638.67962Z" transform="translate(-152.20132 -130.08781)" fill="#4d8af0" opacity="0.5"/><path d="M658.68918,763.33049a3.6746,3.6746,0,0,1-2.04749-4.441,1.76592,1.76592,0,0,0,.0799-.40754h0a1.84257,1.84257,0,0,0-3.31044-1.22119h0a1.76637,1.76637,0,0,0-.2039.3618,3.67459,3.67459,0,0,1-4.441,2.04749,1.766,1.766,0,0,0-.40754-.0799h0a1.84257,1.84257,0,0,0-1.22119,3.31044h0a1.7661,1.7661,0,0,0,.3618.2039,3.67461,3.67461,0,0,1,2.04749,4.441,1.766,1.766,0,0,0-.07991.40754h0a1.84258,1.84258,0,0,0,3.31045,1.22119h0a1.76564,1.76564,0,0,0,.2039-.3618,3.67462,3.67462,0,0,1,4.441-2.04749,1.76594,1.76594,0,0,0,.40754.07991h0a1.84257,1.84257,0,0,0,1.22119-3.31045h0A1.7659,1.7659,0,0,0,658.68918,763.33049Z" transform="translate(-152.20132 -130.08781)" fill="#4d8af0" opacity="0.5"/><path d="M164.491,341.39326a3.67462,3.67462,0,0,1-2.04749-4.441,1.76594,1.76594,0,0,0,.07991-.40754h0a1.84257,1.84257,0,0,0-3.31045-1.22119h0a1.7659,1.7659,0,0,0-.2039.3618,3.6746,3.6746,0,0,1-4.441,2.04749,1.76646,1.76646,0,0,0-.40754-.07991h0a1.84257,1.84257,0,0,0-1.22119,3.31045h0a1.76684,1.76684,0,0,0,.3618.2039,3.67458,3.67458,0,0,1,2.04749,4.441,1.76592,1.76592,0,0,0-.0799.40754h0a1.84257,1.84257,0,0,0,3.31044,1.22119h0a1.76637,1.76637,0,0,0,.2039-.3618,3.67459,3.67459,0,0,1,4.441-2.04749,1.766,1.766,0,0,0,.40754.07991h0a1.84258,1.84258,0,0,0,1.22119-3.31045h0A1.76606,1.76606,0,0,0,164.491,341.39326Z" transform="translate(-152.20132 -130.08781)" fill="#4d8af0" opacity="0.5"/><path d="M1029.68918,493.33049a3.6746,3.6746,0,0,1-2.04749-4.441,1.76592,1.76592,0,0,0,.0799-.40754h0a1.84257,1.84257,0,0,0-3.31044-1.22119h0a1.76637,1.76637,0,0,0-.2039.3618,3.67459,3.67459,0,0,1-4.441,2.04749,1.766,1.766,0,0,0-.40754-.0799h0a1.84257,1.84257,0,0,0-1.22119,3.31044h0a1.7661,1.7661,0,0,0,.3618.2039,3.67461,3.67461,0,0,1,2.04749,4.441,1.766,1.766,0,0,0-.07991.40754h0a1.84258,1.84258,0,0,0,3.31045,1.22119h0a1.76564,1.76564,0,0,0,.2039-.3618,3.67462,3.67462,0,0,1,4.441-2.04749,1.76594,1.76594,0,0,0,.40754.07991h0a1.84257,1.84257,0,0,0,1.22119-3.31045h0A1.7659,1.7659,0,0,0,1029.68918,493.33049Z" transform="translate(-152.20132 -130.08781)" fill="#4d8af0" opacity="0.5"/><circle cx="107.59736" cy="455.28636" r="6" fill="#f55f44" opacity="0.5"/><circle cx="321.59736" cy="6" r="6" fill="#4d8af0" opacity="0.5"/><circle cx="463.79555" cy="457.93723" r="6" fill="#47e6b1" opacity="0.5"/><circle cx="809.79555" cy="607.93723" r="6" fill="#f55f44" opacity="0.5"/><rect x="688.162" y="277.83166" width="207.97236" height="302.01031" rx="13.4354" transform="translate(-227.32135 55.3448) rotate(-12.75221)" fill="#00beff"/><circle cx="525.59736" cy="214" r="6" fill="#fff"/><circle cx="531.59736" cy="236" r="6" fill="#fff"/><circle cx="570.59736" cy="397" r="6" fill="#fff"/><circle cx="576.59736" cy="419" r="6" fill="#fff"/><rect x="725.34855" y="386.69755" width="124.87617" height="20.8127" transform="translate(-220.42436 53.59932) rotate(-12.75221)" fill="#f5f5f5"/></svg>
    </body>
</html>