<?php
	session_start();
	 ob_start();
	  require '../includes/connection.php';
	 require '../includes/auth_check.php';
	global $connection;	
?>

<html>
	<head>
		<title>FINANCE</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/finance_after_login_style.css">
		<link rel="stylesheet" type="text/css" href="../css/index_style.css">
		<style>
		  
		  
		  
		</style>
	  <script>
		  window.onbeforeunload=function(){
			  window.scrollTo(0,500);
		  }
	  </script>
  </head>
<body>
	<div>
		<?php include_once("iti_header.html"); ?>
		<?php include_once("../includes/nav_without_select_department.php");?>;

		
		<div class="container-fluid">
		  <div class="row" style="height:30%;">
			
		<?php include_once("finance_sidebar_option.php"); ?>
			  <div class="col-sm-9 col-lg-10" id="back">
				  <img src="../images/8a.jpg" height="250%" width="100%"/>
				  <p style="position:absolute;top:10%;left:20%;color:black;font-size:40px;opacity:1.0;">
				  Welcome To Finance Department.<br/><br/></p>
				  <p style="position:absolute;top:30%;left:20%;margin-right:15%;color:black;font-size:25px;opacity:1.0;font-family:goudy old style">
				  This section is for the Head of the Department where they can view all the
				  important information related to the students and faculty members.The H.O.D. can register the newly admitted students
				  and also the newly recruited faculty members.The H.O.D. can also view the attendance of all the students in the department.
				  The H.O.D. can also view details of faculty memebers.</p>
			  </div>
		  </div>
		</div>
		  
			
	</div>
  </body>
</html>
