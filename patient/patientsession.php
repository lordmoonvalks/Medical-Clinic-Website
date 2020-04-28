<?php


require '../connections/sessions.php'; 
		
if (empty($_SESSION['permission']) || $_SESSION['permission'] !== 'patient') {
		
header('Location: ../patient/patientlogin.php');
}	
		
?> 