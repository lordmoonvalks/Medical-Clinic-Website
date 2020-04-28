<?php


require '../connections/sessions.php'; 
		
if (empty($_SESSION['permission']) || $_SESSION['permission'] !== 'admin') {
		
header('Location: ../admin/adminlogin.php');
}	




		
?> 