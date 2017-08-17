<?php
	session_start();
	  ob_start();
       require '../includes/connection.php';
	  require '../includes/auth_check.php';
    global $connection;
?>

<html>
	<head>
		<title>Goods Detail</title>
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
			  
				<?php include("inventory_sidebar_option.php");?>
				
				<div class="col-sm-9 col-lg-10" style="height:230%;overflow:auto;" id="result">
					<h2 align="center">Goods Detail</h2>
					
					
					<?php
						require_once "../includes/connection.php";
						
						
							/*------------------------------------
							*SELECT ENTIRE DATA OF RELATED
							*------------------------------------
							*/
							echo "
							 <table  border:collapse class='table table-hover' id='table'>
							 <tr>
							 <th>Goods ID</th>
							 <th>Good Name</th>
							 <th>Related Department</th>
							 <th>Supplier</th>
							";
							
							if(isset($_POST['submit']) && isset($_POST['department']))
							{	
								$department=$_POST['department'];
								$query="SELECT * FROM `goods` WHERE `dept_name`='".$department."' ORDER BY `goods_id` ASC";
							}else
							{
								$query="SELECT * FROM `goods` ORDER BY `dept_name` ASC";	
							}
						
							$query_run=mysqli_query($connection,$query);
							while($assoc=mysqli_fetch_assoc($query_run))
							{
								echo"<tr>";
									echo "<td>".$assoc['goods_id']."</td> ";
									echo "<td>".$assoc['goods_name']."</td>";
									echo "<td>".$assoc['dept_name']."</td>";
									echo "<td>".$assoc['firm']."</td>";
										
								echo "</tr>";
								
								$assoc++;
							}
								
							echo "</table>";
					?>	
				</div>
			  </div>
			</div>
		</div>
		
			<?php include("import_form.php");?>
			<?php include("consumption_form.php");?>
			<?php include("new_goods_entry_form.php");?>
		
    </body>
</html>

<?php include("server_code_of_import_goods_consumption_form.php");


?>