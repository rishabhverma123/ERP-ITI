<?php
	session_start();
	  ob_start();
       require '../includes/connection.php';
	  require '../includes/auth_check.php';
    global $connection;
?>

<html>
	<head>
		<title>Last Payment</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/pay_salary_style.css">
		
	    <script>
			 $('#SELECT').submit(function() { // catch the form's submit event
				$.ajax({ // create an AJAX call...
					data: $(this).serialize(), // get the form data
					type: $(this).attr('method'), // GET or POST
					url: $(this).attr('action'), // the file to call
					success: function(response) { // on success..
					$('#result').html(response); // update the DIV
					}
				});
				return false; // cancel original event to prevent form submitting
			});
			  
	    </script>
    </head>
	<body>
		<div>

			<?php include("iti_header.html");?>
			<?php include("../includes/nav_select_department.php");?>
			
			<div class="container-fluid">
			  <div class="row" style="height:30%;">
			  
				<?php include("finance_sidebar_option.php");?>
				
				<div class="col-sm-9 col-lg-10" style="height:230%;overflow:auto;" id="result">
					<h2 align="center">PAYMENT</h2>
					
					
					<?php
						require_once "../includes/connection.php";
						
						
							/*------------------------------------
							*SELECT ENTIRE DATA OF LAST PAYMENT
							*------------------------------------
							*/
							echo "
							 <table  border:collapse class='table table-hover' id='table'>
							 <tr>
							 <th>EMP ID</th>
							 <th>SALARY</th>
							 <th>DATE.</th>
							";
							
							if(isset($_POST['submit']) && isset($_POST['department']))
							{	
								$department=$_POST['department'];
								$query="SELECT * FROM `last_payment` WHERE `dept_name`='".$department."' ORDER BY `date` DESC, `empid` ASC";
								
							}else
							{
								
								$query="SELECT * FROM `last_payment` ORDER BY `date` DESC, `empid` ASC";
								
							}
							$query_run=mysqli_query($connection,$query);
							while($assoc=mysqli_fetch_assoc($query_run))
							{
								echo"<tr>";
										echo "<td>".$assoc['empid']."</td> ";
										echo "<td>".$assoc['payment']."</td>";
										echo "<td>".$assoc['date']."</td>";
										
								echo "</tr>";
								
								$assoc++;
							}
								
							echo "</table>";
						
					?>	
				</div>
			  </div>
			</div>
		</div>
    </body>
</html>

















