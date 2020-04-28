<?php


require '../connections/sessions.php'; 
		
if (empty($_SESSION['permission']) || $_SESSION['permission'] !== 'doctor') {
		
header('Location: ../doctor/doctorlogin.php');
}	
?> 