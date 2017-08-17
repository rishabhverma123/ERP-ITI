<?php
	//session_start();
	 ob_start();
	  require '../includes/connection.php';
	 require '../includes/auth_check.php';
	global $connection;	


		/*-----------------------------------------------
		*FOR IMPORT DETAIL
		*-----------------------------------------------
		*/
	if(isset($_POST['submit_import_detail']))
	{
		global $connection;
		$q="SELECT * FROM `goods` WHERE `goods_id`='".$_POST['id']."'";
		$run=mysqli_query($connection, $q);
		$row=mysqli_num_rows($run);
		if(!$row)
		{
			 echo "<script type='text/javascript'>
					alert('Invalid Goods ID!!')
					</script>";
		}
		else
		{
			$_POST['id']=test_input($_POST['id']);
			$_POST['quantity']=test_input($_POST['quantity']);
			$_POST['date']=test_input($_POST['date']);
			
			$query="INSERT INTO `import_detail` (`goods_id`,`quantity`, `date`) VALUES ('".$_POST['id']."','".$_POST['quantity']."','".$_POST['date']."')";
			$r=mysqli_query($connection,$query);
			if($r)
			{
				 echo "<script type='text/javascript'>
						alert('Entry Successfull!!')
						</script>"; 
			}else
			{
				 echo "<script type='text/javascript'>
						alert('Something Went Wrong Try Again')
						</script>"; 
		}
		}
		
	}
	

		/*-----------------------------------------------
		*FOR CONSUMPTION DETAIL
		*-----------------------------------------------
		*/

	if(isset($_POST['submit_consumption_detail']))
	{

		$_POST['id']=test_input($_POST['id']);
		$_POST['quantity']=test_input($_POST['quantity']);
		$_POST['date']=test_input($_POST['date']);
		
		
		$q="SELECT * FROM `goods` WHERE `goods_id`='".$_POST['id']."'";
		$run=mysqli_query($connection, $q);
		$row=mysqli_num_rows($run);
		if(!$row)
		{
			 echo "<script type='text/javascript'>
					alert('Invalid Goods ID!!')
					</script>";
		}
		else
		{
			$query="INSERT INTO `consumption` (`goods_id`,`quantity`, `date`) VALUES ('".$_POST['id']."','".$_POST['quantity']."','".$_POST['date']."')";
			$r=mysqli_query($connection,$query);
			if($r)
			{
				 echo "<script type='text/javascript'>
						alert('Entry Successfull!!')
						</script>"; 
			}else
			{
				 echo "<script type='text/javascript'>
						alert('Something Went Wrong Try Again')
						</script>"; 
			}
		}
		
	}

		/*-----------------------------------------------
		*FOR NEW GOODS DETAIL
		*-----------------------------------------------
		*/
	if(isset($_POST['new_goods_detail']))
	{
		
		
		$department=test_input($_POST['dept']);
		$_POST['name']=test_input($_POST['name']);
		$_POST['post']=test_input($_POST['post']);
		$_POST['dept']=test_input($_POST['dept']);
		$_POST['firm']=test_input($_POST['firm']);
		
		/*-----------------------------------------------
		*FORMING ID FOR THE GOODS USING DEPARTMENT NAME
		*-----------------------------------------------
		*/
		
		$q="SELECT * FROM `goods` WHERE `dept_name`='".$department."'";
		$run=mysqli_query($connection,$q);
		$rows=mysqli_num_rows($run);
		$id="".$department."-".$rows."";
		
		/*-----------------------------------------------
		*INSERTING INTO TABLE
		*-----------------------------------------------
		*/
		
		
		$query="INSERT INTO `goods` (`goods_id`,`goods_name`, `dept_name`,`firm`) VALUES ('".$id."','".$_POST['name']."','".$_POST['dept']."','".$_POST['firm']."')";
		$r=mysqli_query($connection,$query);
		if($r)
		{
			 echo "<script type='text/javascript'>
					alert('Entry Successfull!!')
					</script>"; 
		}else
		{
			 echo "<script type='text/javascript'>
					alert('Something Went Wrong Try Again')
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