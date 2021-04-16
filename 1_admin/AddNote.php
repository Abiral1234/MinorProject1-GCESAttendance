<?php 
include_once '../connection.php'; 
session_start();

 $sql_create="CREATE TABLE IF NOT EXISTS `Notes`(
    `id` int(11)  NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `batchname` varchar(255) NOT NULL,
    `subject` varchar(255) NOT NULL,
    `fileurl` varchar(255) NOT NULL,
    `datetime` datetime NOT NULL  )";
  if($result=mysqli_query($conn,$sql_create)){}
    else{
      echo "error";
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
   
    <link rel="stylesheet" type="text/css" href="../CSS/homecss15.css">
    <link rel="stylesheet" type="text/css" href="../CSS/AddNote.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <style type="text/css">
      a{
        text-decoration: none;
        color: black;
      }
      .uploaded_files{
        text-align: center;
        background-color: lightblue;
        width: 70vw;
        align-items: center;
        height: 60px;
        padding-top: 10px;
         padding-bottom: 10px;
    
      }
      .uploaded_files:nth-of-type(odd) {
    background-color: #ffffff;}


     
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
                <li><a href="Statistics.php">Statistics</a> </li>                  <!-- nav bar -->
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
            $result_batch=mysqli_query($conn ,$sql_select_batch);
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
        $result=mysqli_query($conn,$sql_insert_image);

        }
        ?>
        <?php
        $batch = $_POST['batch_name1'];
        $subject = $_POST['selected_subject_name'];
        $sql_select_image="SELECT * FROM `notes`  WHERE batchname='$batch' && subject='$subject' ORDER BY datetime desc";
        $result2=mysqli_query($conn,$sql_select_image);
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
        
    </body>
</html>