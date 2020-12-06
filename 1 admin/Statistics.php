<?php include_once '../connection.php';
  $flag=0; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../CSS/StatisticsCss3.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
          var optionArray=["Choose Your Subject|Not selected","Engineering Mathematics-I|MTH 112","Physics|PHY 111","Communication Technique|ENG 111","Problem Solving Techniques|CMP 114","Fundamentals of IT|CMP 110","Programming in C|CMP 113","Engineering Mathematics-II|MTH 114","Logic Circuits|ELX 212","Mathematical Foundation of Computer Science|MTH 130","Engineering Drawing|MEC 120","Object Oriented Programming in C++|CMP 115","Web Technology|CMP 213"];

        }

        else if(batchCurrentYear == 2){   //BESE 2nd Years
          var optionArray=["Choose Your Subject|Not selected","Engineering Mathematics- III|","Software Engineering Fundamentals|","Microprocessor & Assembly Lang. Pro.|","Data Structure and Algorithms|","Probability & Queuing Theory|","Programming in Java |","Numerical Methods|","Computer Graphics|","Computer Organization & Architecture|","Database Management Systems|","Object Oriented Design & Modeling through UML|"];

        }
        else if(batchCurrentYear == 3){   //BESE 3rd Years
          var optionArray=["Choose Your Subject|Not selected","Applied Operating System|","Simulation & Modeling|","Artificial Intelligence & Neural Network|","System Programming|","Analysis & Design of Algorithm|","Organization and Management|","Multimedia Systems|","Computer Networks|","Principles of Programming Languages|","Engineering Economics|","Object Oriented Software Development|"];

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
          var optionArray=["Choose Your Subject|Not selected","Engineering Economics|","Computer Architecture|","Digital Signal Processing|","Computer Network|","Elective I|","Organization and Management|","Artificial Intelligence|","Image Processing & Pattern Recognition|","Elective II|"]
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
<div class="background_image"></div>
<div class="background_image2"></div>

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

<main>
        <section>

          <div class="container">
            <div>
              <h1>View Statistics for</h1>
            </div>

            <div class="form">
            <!-- dynamic select menu to select batch and subject-->

              <form action="Statistics.php" method="POST">
                <!-- Select Menu for batch imported  from batch table database-->
                <div class="formcontent">
                  <select required id="batch_select" class="batch_select" name="batch_name1" onchange="populate('batch_select','subject_select')">
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

                  </select>

                  <!-- Select Menu for subject shown according to selected batch-->

                  <select id="subject_select" class="subject_select" name="selected_subject_name">
                    <option  selected value="No subject selected">Choose Your Subject</option> 
                      
                  </select>
                  <input  class="btn1" type="submit" name="batch_submit" value="Enter"  >
                </div>
                
              </form>
            </div>
          </div>

        </section>

        <div class="batchinfo">
          <div id="batch_name">
            <?php if (isset($_POST['batch_submit'])) { echo "Batch Name       :  ";  echo $_POST['batch_name1'];  } ?>
          </div>
          <div id="subject_name">
            <?php if (isset($_POST['batch_submit'])) { echo "Subject Name:";  echo $_POST['selected_subject_name'];  } ?>
          </div>
        </div>
        

    <?php if (isset($_POST['batch_submit'])) { 
      $subject_name =$_POST['selected_subject_name'];
      $subject_name_withoutspace= str_replace(" ", "_", $subject_name);
      $sql_connect=" SELECT * FROM  $subject_name_withoutspace ";
      $result=mysqli_query($conn,$sql_connect);
      if ($result != NULL) {
    ?>
    
    <div class="searchbox">
      <div class="search">
        <input type="text" 
        id="userInput" 
        onkeyup="searchFunction()" 
        placeholder="Search for names.."
        title="Type in a name to Search">
      </div>
    </div>
      
    <div class="progresstable">
      <table class="table1" id="table1">
        <thead>
          <tr>
          <th onclick="sortTable(0)">Roll No.<i class="fa fa-sort" style="font-size:24px"></i></th>
          <th onclick="sortTable(1)">Student Name<i class="fa fa-sort" style="font-size:24px"></i></th>
          <th>Progress Bar</th>
          <th onclick="sortTable(3)">Percentage<i class="fa fa-sort" style="font-size:24px"></i></th>
          <th onclick="sortTable(3)">Attendance Score<i class="fa fa-sort" style="font-size:24px"></i></th>
        </tr>
        </thead>
        <?php 
          while ($row=mysqli_fetch_assoc($result)) {
            $present = $row['present_counter'] ;
            $total=$row['total_attendance'];
            $percentage=$present/$total*100;
        ?>
        <tr>
          <td><?php echo $row['id']?></td>
          <td><?php echo $row['student_name']?></td>
          <?php if($percentage >= 70){?>
            <td><progress class="eligible" value="<?php echo $present?>" max="<?php echo $total ?>"><?php echo $percentage ?> </td>
            <?php } ?>
            <?php if($percentage < 70){?>
            <td><progress class="ineligible" value="<?php echo $present?>" max="<?php echo $total ?>" > </td>
            <?php } ?>

            <td><?php echo (int)$percentage."%";?> </td>
            <td><?php echo $present ?>/<?php echo $total ?></td>
        </tr>
        <?php    } ?>
    
      </table>
    </div>
    
      <div class="error">
      <?php } 
        else{ $flag=4; }  }?>
      <?php if($flag==4){ ?>
            <div class="attendance_fail" style="font-size: 30px;  color: red">No Attendance has been taken to show statistics</div>
      <?php } ?>
    </div>
    
    
  </div>
</main>
<script src="Js/navbar.js"></script>
<script src="../JS/Statistics.js"></script>
</body>
</html>