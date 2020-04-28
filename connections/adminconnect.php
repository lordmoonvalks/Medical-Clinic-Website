<?php 


include "sessions.php";
include "connection.php";

if (!empty($_POST['Email'])) { 	
	
	$sql=$conn->prepare("SELECT Email,Password FROM admin WHERE Password=? AND Email=?");

	$sql->bind_param('ss',$_POST['Password'],$_POST['Email']);
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows >0){
		$_SESSION["authenticated"] = true;
		$_SESSION["permission"] = "admin";
		
		$row=$result->fetch_assoc();
		header("Location: ../admin/adminpanel.php");
	} else {
		
		$_SESSION["authenticated"] = false;
		print 'Username or password is incorrect!!! Redirecting....';
		header('Refresh: 2;URL=http://localhost/clinic/admin/adminlogin.php');
	

			}	
			
}

	

	
	
	
	