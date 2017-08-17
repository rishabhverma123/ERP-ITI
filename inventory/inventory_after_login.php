<?php
	session_start();
	 ob_start();
	  require '../includes/connection.php';
	 require '../includes/auth_check.php';
	global $connection;	
?>

<html>
	<head>
		<title>INVENTORY</title>
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
		<?php include("iti_header.html");?>
	
		<?php include_once("../includes/nav_without_select_department.php");?>;

		
		<div class="container-fluid">
		  <div class="row" style="height:30%;">
			
		<?php include_once("inventory_sidebar_option.php"); ?>
			  <div class="col-sm-9 col-lg-10" id="back">
				  <img src="../images/8a.jpg" height="250%" width="100%"/>
				  <p style="position:absolute;top:10%;left:20%;color:black;font-size:40px;opacity:1.0;">
				  Welcome To Inventory Department.<br/><br/></p>
				  <p style="position:absolute;top:30%;left:20%;margin-right:15%;color:black;font-size:25px;opacity:1.0;font-family:goudy old style">
				  This section mainly is used in order to keep track of the inventory of organisation.
				  Consumption, imports etc are mananged in this department.</p>
			  </div>
		  </div>
		</div>
		  
			<?php include("import_form.php");?>
			<?php include("consumption_form.php");?>
			<?php include("new_goods_entry_form.php");?>
	</div>
  </body>
</html>
<?php include("server_code_of_import_goods_consumption_form.php");