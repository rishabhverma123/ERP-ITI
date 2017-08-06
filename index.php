
<?php
	require_once "/includes/connection.php";
	session_start();
	$_SESSION['is_loggedin']=false;
	if( isset($_POST['username']) && isset($_POST['password']) && isset($_POST['department']))
	{
		$login_username=test_input($_POST['username']);
		$login_password=test_input($_POST['password']);
		$login_department=test_input($_POST['department']);
		
		/*----------------------------------------------
		*	TO CHECK ALL THE ENTRIES ARE FILLED OR NOT
		*----------------------------------------------
		*/
		if(!empty($login_username) && !empty($login_password) && !empty($login_department))
		{
			if($login_department=="1")
			{
				$query="SELECT `username` FROM `auth` WHERE `username`='".$login_username. "'" ."AND"."`password`='".$login_password."'". "AND `department_number`='".$login_department."'";
				$query_result=mysqli_query($connection,$query);
				$row_count=mysqli_num_rows($query_result);
			
				if($row_count>=1)			//FINANCE DEPARTMENT SELECTED
				{
					$_SESSION['username']=$login_username;
					$_SESSION['department']=$login_department;
					$_SESSION['is_loggedin']=true;
					$_SESSION['auth_number']=1;
					header('Location:finance/finance_after_login.php');
				}
				else
				{
					echo "<script type='text/javascript'>
					alert('either username or password is incorrect')
					</script>";
				}
			}
			
			
			else if($login_department=="2")
			{
					$query="SELECT `username` FROM `auth` WHERE `username`='".$login_username. "'" ."AND"."`password`='".$login_password."'". " AND `department_number`='".$login_department."'";
					$query_result=mysqli_query($connection,$query);
					$row_count=mysqli_num_rows($query_result);
			
				if($row_count>=1)
				{
					$_SESSION['username']=$login_username;
					$_SESSION['department']=$login_department;
					$_SESSION['auth_number']=2;
					$_SESSION['is_loggedin']=true;
					header('Location:inventory/inventory_after_login.php');
				}
				else
				{
					echo "<script type='text/javascript'>
					alert('either username or password is incorrect')
					</script>";
				}
			}
		}else
		{
				echo "<script type='text/javascript'>
					alert('Fill All The Entries')
					</script>";
		}
			
	}
	function test_input($data)
	{
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
    }
	
?>



<html>
    <head>
		<title>ITI Limited</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/index_style.css">
		<style>
		
			
		</style>
    </head>
	<body>
	
	<?php include_once("includes/iti_header.html"); ?>
	<?php include_once("includes/index_nav.html"); ?>

	<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000" data-pause="false">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
		<li data-target="#myCarousel" data-slide-to="3"></li>
		<li data-target="#myCarousel" data-slide-to="4"></li>
		<li data-target="#myCarousel" data-slide-to="5"></li>
		<li data-target="#myCarousel" data-slide-to="6"></li>

	  </ol>

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner" role="listbox">
		<div class="item active">
		  <img src="images/12a.jpg" alt="Chania">
		  <div class="carousel-caption" id="caption">
			 <p>Information Technology Department</p>
		  </div>
		</div>
		<div class="item">
		  <img src="images/cs.jpg" alt="Chania">
		  <div class="carousel-caption" id="caption">
			 <p>Computer Science and  Engineering Department</p>
		  </div>
		</div>
		<div class="item">
		  <img src="images/ec.jpg" alt="Chania">
		  <div class="carousel-caption" id="caption">
			 <p>Electronics Engineering Department</p>
		  </div>
			  </div>
		<div class="item">
		  <img src="images/11a.jpg" alt="Chania">
		  <div class="carousel-caption" id="caption">
			 <p>Mechanical Engineering Department</p>
		  </div>
		</div>


		<div class="item">
		  <img src="images/2a.jpg" alt="Chania">
		  <div class="carousel-caption" id="caption">
			 <p>Civil Engineering Department</p>
		  </div>
		</div>

		<div class="item">
		  <img src="images/ec (2).jpg" alt="Flower">
		  <div class="carousel-caption" id="caption">
			 <p>Electrical Engineering Department</p>
		  </div>
		</div>

		<div class="item">
		  <img src="images/7.jpg" alt="Flower">
		  <div class="carousel-caption" id="caption">
			 <p>Chemical Engineering Department</p>
		  </div>
		</div>
	  </div>

	  <!-- Left and right controls -->
	  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	  </a>
	</div>
	<!-- Modal -->
	  <div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
		  <!-- Modal content-->
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h3 class="modal-title" align="center">LogIn</h3>
			</div>
			<div class="modal-body" id="form">
			    <form class="form-horizontal" method="POST" action="index.php">
					
					<div class="form-group"><label>Enter Username<span id="remark">&nbsp;*</span></label>&nbsp;&nbsp;&nbsp;
						<input type="text" placeholder="enter username" name="username" class="form-control" required />
					</div><br/><br/>
					 
					<div class="form-group"><label>Enter Password<span id="remark">&nbsp;*</span></label>&nbsp;
						<input type="password" placeholder="enter your password" name="password" class="form-control" required />
					</div>  <br/><br/>
					
					<div class="form-group">
						<label>Select Department<span id="remark">&nbsp;*</span></label>&nbsp;&nbsp;
						<select name="department" class="form-control" required>
							<option value="1"> 	FINANCE		</option>
							<option value="2"> INVENTORY </option>
						</select>
					</div><br/><br/>
					
					<button type="submit" name ="submit_button" value ="submit" id="button" class="btn btn-default">Submit</button>
					
			    </form>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		  </div> 
		</div>
	  </div>
	</body>
</html>

