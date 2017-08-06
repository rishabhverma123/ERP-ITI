<?php
	session_start();
	  ob_start();
       require '../includes/connection.php';
	  require '../includes/auth_check.php';
    global $connection;
?>

<html>
	<head>
		<title>Pay Salary</title>
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
			  }
	    </script>
    </head>
	<body>
		<div>

			<?php include("../includes/iti_header.html");?>
			<?php include("../includes/nav_select_department.php");?>
			
			<div class="container-fluid">
			  <div class="row" style="height:30%;">
			  
				<?php include("finance_sidebar_option.php");?>
				
				<div class="col-sm-9 col-lg-10" style="height:230%;overflow:auto;" id="result">
					<h2 align="center">SALARY</h2>
					
					
					<?php
						require_once "../includes/connection.php";
						
						if(isset($_POST['submit']) && isset($_POST['department']))
						{	
							
							echo "<form id='form' action='pay_salary.php' method='POST' class='form-horizontal ac-custom ac-checkbox ac-cross'>";

							echo "
							 <table  border:collapse class='table table-hover' id='table'>
							 <tr>
							 <th> EMP ID</th>
							 <th>EMP NAME</th>
							 <th>SALARY No.</th>
							 <th>PAY/NOT PAY</th>";
							
							/*------------------------------------
							*CALCULATING SALARY FOR EACH EMPLOYEE
							*------------------------------------
							*/
							 
							$department=$_POST['department'];
							$_SESSION['dept']=$department;
							$query="SELECT * FROM `employee_detail` WHERE `dept_name`='".$department."'";
							$query_run=mysqli_query($connection,$query);
							while($assoc=mysqli_fetch_assoc($query_run))
							{
								$post=$assoc['post'];
								
								/*---------------------------
								*FIND BASIC
								*---------------------------
								*/
								
								$q="SELECT `basic` FROM `post_basic_salary` WHERE `dept_name`='".$assoc['dept_name']."' AND `post`='".$post."'";
								$run=mysqli_query($connection,$q);
								$f=mysqli_fetch_assoc($run);
								$basic=$f['basic'];
								
								
								$salary=$basic;
								
								/*---------------------------
								*CALCULATING ALLOWANCES
								*---------------------------
								*/
								
								$query_salary="SELECT * FROM `allowances` WHERE `post`='".$post."'";
								$query_run_salary=mysqli_query($connection,$query_salary);
								while($fetch=mysqli_fetch_assoc($query_run_salary))
								{
									$salary=$salary+(($fetch['percent']/100)*$basic);
									$fetch++;
								}
								
								echo"<tr>";
										echo "<td>".$assoc['empid']."</td> ";
										echo "<td>".$assoc['name']."</td>";
										echo "<td>".$salary."</td>";
										echo "<td>"."<input type='checkbox' name='".$assoc['empid']."'>"."<label for='cb1'>"."PAY"."</label>"."</td>";
								echo "</tr>";
								
								$assoc++;
							}
								
							echo "</table>";
							echo "<button class='btn btn-default' id='button' type='submit' name='submit_payment' value='submit_payment'>Submit</button>
								  </form>";
						}
					?>	
				</div>
			  </div>
			</div>
		</div>
    </body>
</html>


<?php
	if(isset($_POST['submit_payment']))
	{
		$flag=2;
		global $connection;
		$date=date("y/m/d");
		$query="SELECT * FROM `employee_detail` WHERE `dept_name`='".$_SESSION['dept']."'";
		$r=mysqli_query($connection,$query);
		while($row=mysqli_fetch_assoc($r))
		{
			if(isset($_POST[''.$row['empid']]))
			{	
				$q="SELECT `basic` FROM `post_basic_salary` WHERE `dept_name`='".$row['dept_name']."' AND `post`='".$row['post']."'";
				$run=mysqli_query($connection,$q);
				$f=mysqli_fetch_assoc($run);
				$basic=$f['basic'];
							
				$salary=$basic;			
				
				$query_salary="SELECT * FROM `allowances` WHERE `post`='".$row['post']."'";
				$query_run_salary=mysqli_query($connection,$query_salary);
				while($fetch=mysqli_fetch_assoc($query_run_salary))
				{
					$salary=$salary+(($fetch['percent']/100)*$basic);
					$fetch++;
				}
								
				$queryInsert="INSERT INTO `last_payment`(`empid`, `payment`, `date`,`dept_name`) VALUES('".$row['empid']."','".$salary."','".$date."','".$_SESSION['dept']."' )";
				$qr=mysqli_query($connection,$queryInsert);
				if($qr)
				{
					$flag=1;
				}
			}
			$row++;
		}
		if($flag==1)
		{
			 echo "<script type='text/javascript'>
					alert('Payment Entry Successfull ')
					</script>"; 
		}
	}
?>
















