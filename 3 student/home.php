<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../CSS/Student_home.css">
	<link rel="stylesheet" type="text/css" href="../CSS/image2.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

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
<div class="sidebutton">
<form action="home.php" method="POST">
	<input type="submit" class="sideinput" id="notice" name="notice" value="Notice">
	<label for="notice" class="sidebtn0">Notice</label>

	<input type="submit" class="sideinput" id="events" name="events" value="events">
	<label for="events" class="sidebtn0">Events</label>

	<input type="submit" class="sideinput" id="class_time_table" name="class_time_table" value="class_time_table">
	<label for="class_time_table" class="sidebtn">Class Time Table</label>

	<input type="submit" class="sideinput" id="exam_routine" name="exam_routine" value="exam_routine">
	<label for="exam_routine" class="sidebtn">Exam Routine</label>

	<input type="submit" class="sideinput" id="study_material" name="study_material" value="study_material">
	<label for="study_material" class="sidebtn">Study Material</label>

	<input type="submit" class="sideinput" id="ask_questions" name="ask_questions" value="ask_questions">
	<label for="ask_questions" class="sidebtn">Ask Questions</label>
</form>
</div>

<?php if (isset($_POST['notice'])) { ?>
<div class="table_section">
<h1>NOTICE</h1>
<table class="table1">
	<thead>
		<tr>
			<td>SN</td>
			<td>Subject</td>
			<td>Detail</td>
			<td>Date</td>
			<td>Time</td>
		</tr>
	</thead>
</table>
</div>
<?php } ?>


<?php if (isset($_POST['events'])) { ?>
<div class="table_section">
<h1>Event</h1>
</div>
<?php } ?>


<?php if (isset($_POST['class_time_table'])) { ?>
<div class="table_section">
<h1>Class Time</h1>
</div>
<?php } ?>


<?php if (isset($_POST['exam_routine'])) { ?>
<div class="table_section">
<h1>Exam Routine</h1>
</div>
<?php } ?>


<?php if (isset($_POST['study_material'])) { ?>
<div class="table_section">
<h1>Study Material</h1>
</div>
<?php } ?>

<?php if (isset($_POST['ask_questions'])) { ?>
<div class="table_section">
<h1>Ask Questions</h1>
</div>
<?php } ?>





<script src="../Js/navbar.js"></script>
<div class="svg">
<?xml version="1.0" encoding="utf-8"?>
<!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<svg version="1.1" id="f9bc2a0f-651a-4336-bfd5-9ca8f57cbc4d"
	 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 567 666.5"
	 style="enable-background:new 0 0 567 666.5;" xml:space="preserve">

<title>Choose</title>
<polygon class="st0" points="528.8,115.5 474.5,99.1 471.2,173.3 528.3,190.5 "/>
<polygon class="st0" points="146.8,0 146.8,75.5 471.2,173.3 474.5,99.1 "/>
<polygon class="st1" points="528.8,115.5 474.5,99.1 471.2,173.3 528.3,190.5 "/>
<polygon class="st2" points="528.8,257.6 474.5,241.2 471.2,315.4 528.3,332.6 "/>
<polygon class="st2" points="146.8,142.1 146.8,217.6 471.2,315.4 474.5,241.2 "/>
<polygon class="st1" points="528.8,257.6 474.5,241.2 471.2,315.4 528.3,332.6 "/>
<polyline class="st3" points="488.3,283.7 497.2,297.1 514.9,274.9 "/>
<g class="st4">
	<line class="st3" x1="488.8" y1="128.3" x2="506.5" y2="159.4"/>
	<line class="st3" x1="511" y1="132.7" x2="488.8" y2="155"/>
</g>
<polygon class="st0" points="528.8,390.8 474.5,374.4 471.2,448.6 528.3,465.8 "/>
<polygon class="st0" points="146.8,275.4 146.8,350.9 471.2,448.6 474.5,374.4 "/>
<polygon class="st1" points="528.8,390.8 474.5,374.4 471.2,448.6 528.3,465.8 "/>
<g class="st4">
	<line class="st3" x1="488.8" y1="403.7" x2="506.5" y2="434.7"/>
	<line class="st3" x1="511" y1="408.1" x2="488.8" y2="430.3"/>
</g>
<ellipse class="st5" cx="371.1" cy="243.8" rx="11.1" ry="22.2"/>
<ellipse class="st6" cx="371.1" cy="243.8" rx="93.3" ry="186.5"/>
<ellipse class="st7" cx="371.1" cy="243.8" rx="51.1" ry="102.1"/>
<g class="st8">
	<rect x="3.5" y="110.3" class="st9" width="1.5" height="8.4"/>
	<rect y="113.7" class="st9" width="8.4" height="1.5"/>
</g>
<g class="st8">
	<rect x="528.5" y="519.3" class="st9" width="1.5" height="8.4"/>
	<rect x="525" y="522.7" class="st9" width="8.4" height="1.5"/>
</g>
<g class="st8">
	<rect x="492" y="341.2" class="st9" width="1.5" height="8.4"/>
	<rect x="488.5" y="344.7" class="st9" width="8.4" height="1.5"/>
</g>
<g class="st8">
	<rect x="428.8" y="512" class="st9" width="1.5" height="8.4"/>
	<rect x="425.4" y="515.4" class="st9" width="8.4" height="1.5"/>
</g>
<g class="st8">
	<rect x="384.4" y="619.1" class="st9" width="1.5" height="8.4"/>
	<rect x="381" y="622.5" class="st9" width="8.4" height="1.5"/>
</g>
<g class="st8">
	<rect x="66.6" y="240.1" class="st9" width="1.5" height="8.4"/>
	<rect x="63.2" y="243.5" class="st9" width="8.4" height="1.5"/>
</g>
<path class="st10" d="M89.7,109.5c-0.8-0.4-1.3-1.3-1-2.2c0-0.1,0-0.1,0-0.2l0,0c0-0.5-0.4-0.9-0.9-1c-0.3,0-0.6,0.1-0.8,0.4l0,0
	c0,0.1-0.1,0.1-0.1,0.2c-0.4,0.8-1.3,1.3-2.2,1c-0.1,0-0.1,0-0.2,0l0,0c-0.5,0-0.9,0.4-1,0.9c0,0.3,0.1,0.6,0.4,0.8l0,0
	c0.1,0,0.1,0.1,0.2,0.1c0.8,0.4,1.3,1.3,1,2.2c0,0.1,0,0.1,0,0.2l0,0c0,0.5,0.4,0.9,0.9,1c0.3,0,0.6-0.1,0.8-0.4l0,0
	c0-0.1,0.1-0.1,0.1-0.2c0.4-0.8,1.3-1.3,2.2-1c0.1,0,0.1,0,0.2,0l0,0c0.5,0,0.9-0.4,1-0.9c0-0.3-0.1-0.6-0.4-0.8l0,0
	C89.8,109.5,89.7,109.5,89.7,109.5z"/>
<path class="st10" d="M422.9,35.3c-0.8-0.4-1.3-1.3-1-2.2c0-0.1,0-0.1,0-0.2l0,0c0-0.5-0.4-0.9-0.9-1c-0.3,0-0.6,0.1-0.8,0.4l0,0
	c0,0.1-0.1,0.1-0.1,0.2c-0.4,0.8-1.3,1.3-2.2,1c-0.1,0-0.1,0-0.2,0l0,0c-0.5,0-0.9,0.4-1,0.9c0,0.3,0.1,0.6,0.4,0.8l0,0
	c0.1,0,0.1,0.1,0.2,0.1c0.8,0.4,1.3,1.3,1,2.2c0,0.1,0,0.1,0,0.2l0,0c0,0.5,0.4,0.9,0.9,1c0.3,0,0.6-0.1,0.8-0.4l0,0
	c0-0.1,0.1-0.1,0.1-0.2c0.4-0.8,1.3-1.3,2.2-1c0.1,0,0.1,0,0.2,0l0,0c0.5,0,0.9-0.4,1-0.9c0-0.3-0.1-0.6-0.4-0.8l0,0
	C423,35.3,422.9,35.3,422.9,35.3z"/>
<path class="st10" d="M13.3,299.3c-0.8-0.4-1.3-1.3-1-2.2c0-0.1,0-0.1,0-0.2l0,0c0-0.5-0.4-0.9-0.9-1c-0.3,0-0.6,0.1-0.8,0.4l0,0
	c0,0.1-0.1,0.1-0.1,0.2c-0.4,0.8-1.3,1.3-2.2,1c-0.1,0-0.1,0-0.2,0l0,0c-0.5,0-0.9,0.4-1,0.9c0,0.3,0.1,0.6,0.4,0.8l0,0
	c0.1,0,0.1,0.1,0.2,0.1c0.8,0.4,1.3,1.3,1,2.2c0,0.1,0,0.1,0,0.2l0,0c0,0.5,0.4,0.9,0.9,1c0.3,0,0.6-0.1,0.8-0.4l0,0
	c0-0.1,0.1-0.1,0.1-0.2c0.4-0.8,1.3-1.3,2.2-1c0.1,0,0.1,0,0.2,0l0,0c0.5,0,0.9-0.4,1-0.9c0-0.3-0.1-0.6-0.4-0.8l0,0
	C13.4,299.3,13.3,299.3,13.3,299.3z"/>
<path class="st10" d="M26.6,485.8c-0.8-0.4-1.3-1.3-1-2.2c0-0.1,0-0.1,0-0.2l0,0c0-0.5-0.4-0.9-0.9-1c-0.3,0-0.6,0.1-0.8,0.4l0,0
	c0,0.1-0.1,0.1-0.1,0.2c-0.4,0.8-1.3,1.3-2.2,1c-0.1,0-0.1,0-0.2,0l0,0c-0.5,0-0.9,0.4-1,0.9c0,0.3,0.1,0.6,0.4,0.8l0,0
	c0.1,0,0.1,0.1,0.2,0.1c0.8,0.4,1.3,1.3,1,2.2c0,0.1,0,0.1,0,0.2l0,0c0,0.5,0.4,0.9,0.9,1c0.3,0,0.6-0.1,0.8-0.4l0,0
	c0-0.1,0.1-0.1,0.1-0.2c0.4-0.8,1.3-1.3,2.2-1c0.1,0,0.1,0,0.2,0l0,0c0.5,0,0.9-0.4,1-0.9c0-0.3-0.1-0.6-0.4-0.8l0,0
	C26.7,485.9,26.7,485.8,26.6,485.8z"/>
<circle class="st11" cx="248.7" cy="134.5" r="3"/>
<circle class="st10" cx="328.7" cy="520.9" r="3"/>
<ellipse class="st10" cx="510.7" cy="214.5" rx="3" ry="3"/>
<circle class="st12" cx="564" cy="347.7" r="3"/>
<circle class="st11" cx="365.7" cy="11.6" r="3"/>
<rect x="212.2" y="141.7" transform="matrix(3.875078e-02 -0.9992 0.9992 3.875078e-02 65.1156 373.1907)" class="st13" width="28.6" height="22.2"/>
<path class="st014" d="M316.3,238.1c0,0,30.8-14.7,30.3-2s-31,21.1-31,21.1L316.3,238.1z"/>
<path class="st15" d="M299.4,345.6c0,0,14.5,35.5,19.9,61.2c5.4,25.6,13.5,60.9,3,86c-10.5,25-40.4,98.6-40.7,106.5
	c-0.3,7.9,2.6,16-3.8,15.8s-40.9-11.1-42.3-16s11.8-17,11.8-17L279.9,480l-34-66.5l-24.5,99.2l-4.8,123.8c0,0-23.6-7.3-27-1
	c0,0-10.6-14.7-11.9-21.1s5-128.6,5-128.6s-21.6-139.2-4.2-138.5S264.4,306.1,299.4,345.6z"/>
<path class="st16" d="M278.1,608.7c0,0,16.1,35.6,17.6,37.3c1.5,1.6,12,18,4.1,17.6s-26.7-9-40.5-22.2c-13.8-13.3-32-36.2-30.3-37.7
	s12.9-5.9,12.9-5.9L278.1,608.7z"/>
<path class="st16" d="M213.7,628.4c0,0,1,15.9,3.9,22.4s2.6,16-5.4,15.7c-7.9-0.3-28.5-4.3-28.5-4.3s-1.2-9.6,0.4-11.1
	s8.7-18.7,5.7-23.6S213.7,628.4,213.7,628.4z"/>
<path class="st14" d="M202,111.3c0,0-16.9,26.4-23.5,32.5s12,19.5,12,19.5l33.2,4.5c0,0-0.4-30.2,1.3-33.3S202,111.3,202,111.3z"/>
<path class="st17" d="M230.8,145.8c0,0-6.8,12.5-13.2,12.2s-39.2-14.2-40.6-19.1s-10.9,34.6-10.9,34.6l80.4,141.4l19.6-13.5l-9.5-83
	l-7.8-44.8L230.8,145.8z"/>
<path class="st18" d="M174.1,272.3c3.2,6.7,5.2,13.7,4.9,20.9c0,0.3,0,0.6-0.1,1c-0.8,14.7-6.2,31.7-8.1,44
	c-1.4,8.9-1,15.3,4.2,16.9c12.6,3.7-1.8,6.3,46.8,22.5s57.2,2.2,57.3-1s-6.9-27.3-5.2-28.8s23.1,20,29.5,17s0.7-19.1,0.7-19.1
	s-14.6-34-14.3-41.9s-22.1-45.4-22.1-45.4l-15.2-99.2c0,0-5.9-12.9-13.7-14.8s-14.4,2.6-14.4,2.6l13.2,29.1l13.9,51.4l-2.3,19
	c0,0-16.2-34-26.8-47.1s-33.3-44.2-33.3-44.2s-5.3-17.8-1.3-23.2c4-5.3-16.6-6.1-25.4,15.8c-4.7,11.6-12.2,28.9-17,45.1
	c-4.2,14.3-6.2,27.6-2,35.3C149.8,239.9,165.9,255.2,174.1,272.3z"/>
<path class="st1" d="M143.4,228.2c6.4,11.7,22.5,27,30.7,44.1c2.1-7.7,4.8-15.7,4.8-15.7s10-53.7-19.6-67.5
	c-4.9-0.5-9.8,0.9-13.8,3.9C141.2,207.2,139.2,220.6,143.4,228.2z"/>
<path class="st18" d="M261.2,224.8l25.2,7.3l34.9,1.4l3.6,30.3l-57.4,4.1C267.4,268,253.1,227.7,261.2,224.8z"/>
<path class="st14" d="M220.1,326.9c0,0,33.7,5.6,26,15.7s-37.5-0.5-37.5-0.5L220.1,326.9z"/>
<path class="st1" d="M179,294.2c-0.8,14.7-6.2,31.7-8.1,44c10.7,10.1,20.9,19.1,24.8,19.2c7.9,0.3,20.7-0.8,25.4,1
	s7.5-28.3,7.5-28.3s-2.8-9.6-15.3-14.9C204.7,311.6,188.5,302,179,294.2z"/>
<path class="st18" d="M159.6,179.6c0,0-26.9-4.2-25.4,40.4s-2.8,73,8,81.4s45.9,46.3,53.8,46.6s20.7-0.8,25.4,1s7.5-28.3,7.5-28.3
	s-2.8-9.6-15.3-14.9s-42-23.9-41.8-30.2s7.5-28.3,7.5-28.3S189.2,193.4,159.6,179.6z"/>
<ellipse transform="matrix(0.2669 -0.9637 0.9637 0.2669 54.33 302.0543)" class="st14" cx="225.7" cy="115.3" rx="35" ry="35"/>
<path class="st19" d="M249.2,65.3c0.8,0.7,1.9,1.2,2.9,1.5c1.1,0.2,2.2-0.5,2.4-1.7c0.8,1.7,1.7,3.4,3.3,4.3s4.2,0.1,4.4-1.7
	c0.2,1.4,0.9,2.7,1.8,3.7c1,1,2.8,1.2,3.7,0.1c-0.7,3.9-0.3,7.9-0.5,11.9s-1.3,8.2-4.3,10.8c-4.4,3.8-10.9,2.9-16.7,2.1
	c-0.9-0.2-1.8-0.1-2.6,0.1c-2.2,0.9-2.1,3.9-2.1,6.3c-0.4,8.5-6.8,15.5-15.2,16.5c-2.3,0.4-4.6-0.2-6.5-1.6
	c-1.6-1.4-2.5-3.6-4.3-4.7c-3-1.7-6.7,0.8-9,3.5s-4.4,6-7.9,6.5c-4.6,0.6-8-4-9.7-8.3c-4.7-12.1-4.4-25.6,1-37.5
	C199.5,56.4,232,53.1,249.2,65.3z"/>
</svg>

</div>

<script src="Js/navbar.js"></script>
</body>
</html>