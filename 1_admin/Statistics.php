<?php include_once '../connection.php';
  $flag=0; ?>
<!DOCTYPE html>
<html>
<head>

	<title></title>
	<link rel="stylesheet" type="text/css" href="../CSS/StatisticsCss4.css">
  <link rel="stylesheet" type="text/css" href="../CSS/chart1.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../CSS/nav.css">
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
          var optionArray=["Choose Your Subject|Not selected","Engineering Mathematics- III|","Software Engineering Fundamentals|","Microprocessor  Assembly Lang. Pro.|","Data Structure and Algorithms|","Probability  Queuing Theory|","Programming in Java |","Numerical Methods|","Computer Graphics|","Computer Organization  Architecture|","Database Management Systems|","Object Oriented Design  Modeling through UML|"];

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
            <li><a href="Statistics.php">Statistics</a> </li>              <!-- nav bar -->
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
                      $result_batch=mysqli_query($connect_to_list_database ,$sql_select_batch);
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
      $batchname= $_POST['batch_name1'];
      $subject_name =$_POST['selected_subject_name'];
      $subject_name_withoutspace= str_replace(" ", "_", $subject_name);
      $sql_connect=" SELECT * FROM  $subject_name_withoutspace ";
      $result=mysqli_query($connection[$batchname],$sql_connect);
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
          <th>Attendance Score</th>
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
          <?php if($percentage >= 80){?>
            <td><progress class="eligible" value="<?php echo $present?>" max="<?php echo $total ?>"><?php echo $percentage ?> </td>
            <?php } ?>
            <?php if($percentage < 80){?>
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
<div class="statistics_image" >
  <svg id="ed352ff4-7a14-4498-84af-0dc7b5b1bcd0" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 772.90945 531.44094">


  <!--Right Most purple bar -->

  <path class="purplebar" d="M682.32283,487.27953h-17a4.50508,4.50508,0,0,1-4.5-4.5v-92a4.50508,4.50508,0,0,1,4.5-4.5h17a4.50507,4.50507,0,0,1,4.5,4.5v92A4.50508,4.50508,0,0,1,682.32283,487.27953Z" transform="translate(-213.54528 -184.27953)" fill="#6c63ff"/>

  <!--Second Red bar -->

  <path class="redbar" d="M632.32283,487.27953h-17a4.50508,4.50508,0,0,1-4.5-4.5v-72a4.50508,4.50508,0,0,1,4.5-4.5h17a4.50507,4.50507,0,0,1,4.5,4.5v72A4.50508,4.50508,0,0,1,632.32283,487.27953Z" transform="translate(-213.54528 -184.27953)" fill="#ff6584"/>
  <!-- First Grey Bar -->

  <path class="purplebar" d="M582.32283,487.27953h-17a4.50508,4.50508,0,0,1-4.5-4.5v-49a4.50508,4.50508,0,0,1,4.5-4.5h17a4.50507,4.50507,0,0,1,4.5,4.5v49A4.50508,4.50508,0,0,1,582.32283,487.27953Z" transform="translate(-213.54528 -184.27953)" fill="#ccc"/>

  <!-- grey horizontal bars -->

  <path class="hbar" d="M608.32283,258.77953h-84a7,7,0,1,1,0-14h84a7,7,0,0,1,0,14Z" transform="translate(-213.54528 -184.27953)" fill="#ccc"/>
  <path class="hbar" d="M723.32283,292.77953h-199a7,7,0,0,1,0-14h199a7,7,0,0,1,0,14Z" transform="translate(-213.54528 -184.27953)" fill="#ccc"/>

  <path  d="M319.61433,712.67961A141.78089,141.78089,0,0,1,213.56155,573.28569c.1219-7.912.95378-15.99006,4.27976-23.1701s9.50394-13.39013,17.23186-15.09142c8.43389-1.8567,17.33349,1.93874,23.61873,7.861s10.40636,13.736,14.198,21.495c22.83782,46.734,40.18948,96.87978,46.6859,148.48823Z" transform="translate(-213.54528 -184.27953)" fill="#f2f2f2"/>
  <path d="M231.247,536.58343,247.253,572.95049l16.006,36.36706c5.06915,11.51754,10.12863,23.04012,15.36814,34.48152,5.1935,11.34091,10.56495,22.6034,16.29525,33.684,5.72218,11.06486,11.80377,21.94912,18.40506,32.51522q1.23309,1.9737,2.49042,3.93206c.58008.90425,2.03014.06547,1.44595-.84519-6.72793-10.48763-12.92723-21.30541-18.74161-32.32388-5.82064-11.03036-11.2609-22.25747-16.50019-33.57425-5.26729-11.37725-10.332-22.84667-15.38326-34.321q-7.97541-18.11688-15.948-36.235l-16.00605-36.36706-1.99187-4.52568c-.43316-.98418-1.87645-.133-1.44595.84519Z" transform="translate(-213.54528 -184.27953)" fill="#fff"/>
  <path d="M312.93738,712.93239a82.96676,82.96676,0,0,1-92.692-43.74066c-2.07267-4.14071-3.82153-8.55926-4.03308-13.1849s1.31945-9.51764,4.87237-12.48717c3.87749-3.2408,9.52264-3.67283,14.38463-2.29486s9.111,4.32217,13.17418,7.32689c24.47345,18.09816,47.01962,39.44868,64.3248,64.48912Z" transform="translate(-213.54528 -184.27953)" fill="#f2f2f2"/>
  <path d="M219.51916,645.36213,237.647,659.92225l18.12782,14.56013c5.74112,4.61123,11.47858,9.22769,17.2876,13.75339,5.758,4.486,11.58722,8.88316,17.55363,13.089,5.958,4.19991,12.05376,8.209,18.33349,11.91267q1.173.69183,2.35449,1.36914c.54528.31287,1.07169-.51407.52254-.82916-6.32429-3.62871-12.46326-7.57153-18.45656-11.72247-5.99977-4.15542-11.85515-8.51568-17.63042-12.97675-5.80611-4.4849-11.53195-9.07235-17.25211-13.666q-9.03158-7.25292-18.062-14.50724L222.29761,646.3449,220.0417,644.533c-.49058-.394-1.0101.43755-.52254.82916Z" transform="translate(-213.54528 -184.27953)" fill="#fff"/>
  <path d="M979.45472,184.27953h-487a7.00778,7.00778,0,0,0-7,7v330a7.00779,7.00779,0,0,0,7,7h487a7.00778,7.00778,0,0,0,7-7v-330A7.00778,7.00778,0,0,0,979.45472,184.27953Zm5,337a5.002,5.002,0,0,1-5,5h-487a5.002,5.002,0,0,1-5-5v-330a5.002,5.002,0,0,1,5-5h487a5.002,5.002,0,0,1,5,5Z" transform="translate(-213.54528 -184.27953)" fill="#3f3d56"/>
  <rect x="272.90945" y="28.03998" width="499" height="2" fill="#3f3d56"/>
  <circle cx="289.90945" cy="15" r="6" fill="#3f3d56"/>
  <circle cx="307.15945" cy="15" r="6" fill="#3f3d56"/>
  <circle cx="324.40945" cy="15" r="6" fill="#3f3d56"/>
  
  <path d="M787.54267,306.30254a91.00351,91.00351,0,0,0,75.04394,142.477v-79.44Z" transform="translate(-213.54528 -184.27953)" fill="#6c63ff"/>
  <path d="M862.58661,266.77953a90.896,90.896,0,0,0-75.04394,39.523l75.04394,63.037Z" transform="translate(-213.54528 -184.27953)" fill="#ccc"/>
  <path d="M862.58661,449.77953h-1v-184h1a92,92,0,1,1,0,184Zm1-181.99463V447.77416a90.00019,90.00019,0,0,0,0-179.98926Z" transform="translate(-213.54528 -184.27953)" fill="#3f3d56"/>
  

  


  <path d="M582.32283,487.77953h-17a5.00573,5.00573,0,0,1-5-5v-110a5.00573,5.00573,0,0,1,5-5h17a5.00573,5.00573,0,0,1,5,5v110A5.00573,5.00573,0,0,1,582.32283,487.77953Zm-17-118a3.00328,3.00328,0,0,0-3,3v110a3.00329,3.00329,0,0,0,3,3h17a3.00328,3.00328,0,0,0,3-3v-110a3.00328,3.00328,0,0,0-3-3Z" transform="translate(-213.54528 -184.27953)" fill="#3f3d56"/><path d="M632.32283,487.77953h-17a5.00573,5.00573,0,0,1-5-5v-110a5.00573,5.00573,0,0,1,5-5h17a5.00573,5.00573,0,0,1,5,5v110A5.00573,5.00573,0,0,1,632.32283,487.77953Zm-17-118a3.00328,3.00328,0,0,0-3,3v110a3.00329,3.00329,0,0,0,3,3h17a3.00328,3.00328,0,0,0,3-3v-110a3.00328,3.00328,0,0,0-3-3Z" transform="translate(-213.54528 -184.27953)" fill="#3f3d56"/>
  <path d="M682.32283,487.77953h-17a5.00573,5.00573,0,0,1-5-5v-110a5.00573,5.00573,0,0,1,5-5h17a5.00573,5.00573,0,0,1,5,5v110A5.00573,5.00573,0,0,1,682.32283,487.77953Zm-17-118a3.00328,3.00328,0,0,0-3,3v110a3.00329,3.00329,0,0,0,3,3h17a3.00328,3.00328,0,0,0,3-3v-110a3.00328,3.00328,0,0,0-3-3Z" transform="translate(-213.54528 -184.27953)" fill="#3f3d56"/>


  <!-- Left hand -->
  <path class="hand" d="M325.97669,543.28208A10.05577,10.05577,0,0,0,317.19187,530.61L308.592,495.92535l-12.58652,13.65332,10.09618,30.84389a10.11028,10.11028,0,0,0,19.875,2.85952Z" transform="translate(-213.54528 -184.27953)" fill="#ffb8b8"/>

  <path class="hand" d="M302.92,532.61453a4.50494,4.50494,0,0,1-2.5174-2.66936L286.04644,485.767a46.37348,46.37348,0,0,1,.76364-32.63527l13.83846-34.35489a14.49652,14.49652,0,1,1,28.5985,4.76667l-19.09249,55.55769,6.683,45.23868a4.51467,4.51467,0,0,1-2.5399,4.50394l-7.70875,3.67825a4.50568,4.50568,0,0,1-2.65851.38041A4.45465,4.45465,0,0,1,302.92,532.61453Z" transform="translate(-213.54528 -184.27953)" fill="#2f2e41"/>

  <polygon points="160.343 518.443 172.603 518.442 178.435 471.154 160.341 471.155 160.343 518.443" fill="#ffb8b8"/>
  <path d="M371.26153,699.21893h38.53073a0,0,0,0,1,0,0V714.1058a0,0,0,0,1,0,0H386.14839a14.88686,14.88686,0,0,1-14.88686-14.88686v0A0,0,0,0,1,371.26153,699.21893Z" transform="translate(567.54077 1229.02737) rotate(179.99738)" fill="#2f2e41"/>
  <polygon points="99.343 518.443 111.603 518.442 117.435 471.154 99.341 471.155 99.343 518.443" fill="#ffb8b8"/>
  <path d="M310.26153,699.21893h38.53073a0,0,0,0,1,0,0V714.1058a0,0,0,0,1,0,0H325.14839a14.88686,14.88686,0,0,1-14.88686-14.88686v0A0,0,0,0,1,310.26153,699.21893Z" transform="translate(445.54077 1229.03015) rotate(179.99738)" fill="#2f2e41"/>
  <path d="M377.23949,509.99078l10.77686,85.38587q2.22236,17.60784,3.10973,35.34585l2.90343,58.06853a4,4,0,0,1-3.995,4.19975H373.67817a4,4,0,0,1-3.95471-3.39973l-14.71008-96.91351a2,2,0,0,0-3.94338-.06694l-17.72158,94.91672a4,4,0,0,1-3.62623,3.18424l-15.05405.95518a4,4,0,0,1-4.28995-4.11428l4.8613-155.56168Z" transform="translate(-213.54528 -184.27953)" fill="#2f2e41"/>

  <!-- head-->
  <circle  cx="115.94619" cy="179.53015" r="24.56103" fill="#ffb8b8"/>

  <path d="M310.23949,533.99078c6,14,32,24,38,4,4.64014-15.46,23.02-21.96,31.12989-24.11a4.01608,4.01608,0,0,0,2.86035-4.86005l-22.67041-89.05a31.272,31.272,0,0,0-21.06006-22.16c-18.01953-5.58-37.01953,5.91-40.06983,24.52a137.15658,137.15658,0,0,0-1.58984,15.76C294.95922,477.3808,306.2893,524.77075,310.23949,533.99078Z" transform="translate(-213.54528 -184.27953)" fill="#6c63ff"/>
  <!-- Right hand -->
  <path class="hand" d="M391.62938,533.96509a10.05577,10.05577,0,0,0-12.75277-8.66732l-20.49275-29.275-6.83741,17.2651L372.055,538.441a10.11027,10.11027,0,0,0,19.57442-4.47588Z" transform="translate(-213.54528 -184.27953)" fill="#ffb8b8"/>

  
  <path  class="hand"d="M366.27921,532.29853a4.505,4.505,0,0,1-3.30867-1.586l-29.27686-36.06483a46.37356,46.37356,0,0,1-11.01848-30.72844l.56429-37.033a14.49652,14.49652,0,1,1,28.40042-5.832l2.15442,58.70723,22.49784,39.81265a4.51467,4.51467,0,0,1-.75115,5.1159l-5.87132,6.20338a4.50564,4.50564,0,0,1-2.34406,1.31062A4.4548,4.4548,0,0,1,366.27921,532.29853Z" transform="translate(-213.54528 -184.27953)" fill="#2f2e41"/>

  <!--hair -->
  <path class="head" d="M310.849,383.89889a4.00709,4.00709,0,0,0,5.90278-2.36826l.01371-.0559c.44576-1.86412.0756-3.81068-.05232-5.72308s.05925-4.01327,1.36174-5.41937c2.428-2.62114,6.74756-1.23165,10.25844-1.8944a8.66429,8.66429,0,0,0,6.74007-9.25291c-.05-.3975-.12841-.79545-.21633-1.19315a6.67288,6.67288,0,0,1,6.92675-8.0813c3.5481.20288,7.378,1.2779,10.31357-1.35011a7.60777,7.60777,0,0,0,1.82654-8.20134c-1.67623-4.8383-6.4137-7.37124-11.10186-8.76367a40.62025,40.62025,0,0,0-34.43036,5.64955c-2.96118,2.08724-5.72662,4.70983-6.98873,8.10575s-.65322,7.6803,2.19278,9.92206a18.332,18.332,0,0,0-4.24619,17.80643C300.7553,377.60865,307.46406,381.95122,310.849,383.89889Z" transform="translate(-213.54528 -184.27953)" fill="#2f2e41"/>

  <!-- Down Path -->
  <path class="path" d="M489.65157,715.72047h-265a1,1,0,0,1,0-2h265a1,1,0,0,1,0,2Z" transform="translate(-213.54528 -184.27953)" fill="#3f3d56"/>
  </svg>
<script src="../Js/navbar.js"></script>
<script src="../JS/Statistics.js"></script>
</body>
</html>