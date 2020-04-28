<?php 


include "sessions.php";
include "connection.php";

print_r($_POST);

if (!empty($_POST['Email'])) { 	
	
	$sql=$conn->prepare("SELECT ID,Email,Password FROM doctors WHERE Email=?");
	
	$sql->bind_param('s',$_POST['Email']);
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows >0){
		$row=$result->fetch_assoc();
		if(password_verify($_POST['Password'], $row['Password']))
		{
			$_SESSION["authenticated"] = true;
			$_SESSION["permission"] = "doctor";
			$_SESSION['id'] = $row['ID'];
			header("Location: ../doctor/doctorpanel.php");
		}		
		else {
		
		$_SESSION["authenticated"] = false;		
			echo '<p>Username or password is incorrect!!! Returning....</p>';
				
				
		}
		 header('Refresh: 2;URL=http://localhost/cc/doctor/doctorlogin.php');
		
	}
		
}		
