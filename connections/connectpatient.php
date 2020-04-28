<?php 

include "connection.php";
include "sessions.php";

print_r($_POST);

if (!empty($_POST['Email'])) { 	
	
	$sql=$conn->prepare("SELECT ID,Email,Password FROM patients WHERE Email=?");
	$sql->bind_param('s',$_POST['Email']);
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows >0){
		$row=$result->fetch_assoc();
		if(password_verify($_POST['Password'], $row['Password']))
		{
			$_SESSION["authenticated"] = true;
			$_SESSION["permission"] = "patient";
			$_SESSION['id'] = $row['ID'];
			header("Location: ../patient/patientpanel.php");
		}		
		else {
			
			$_SESSION["authenticated"] = false;	
			echo '<p>Username or password is incorrect</p>';
		}
		
			 header('Refresh: 2;URL=http://localhost/cc/patient/patientlogin.php');
		
	}
		
}		

	

	
	
	
	