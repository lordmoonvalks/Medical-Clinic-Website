<?php

require "adminsession.php";
include "../connections/connection.php";

if(isset($_POST['update']) && isset($_POST['patientid']))
{
    header('location: patientupdate.php?id='.$_POST['patientid']);

    echo '<div class="center">';

}
else if(isset($_POST['delete']) && isset($_POST['patientid']))
{
    echo '<div class="center">';
    $query = "DELETE FROM patients WHERE Id=?";
    $sql = $conn->prepare($query);
    $sql->bind_param('s', $_POST['patientid']);
    $sql->execute();
    echo "Patient deleted successfully";
	 header('Refresh: 2;URL=http://localhost/cc/admin/managepatients.php');
}
else
{
	
?>
<center>
<br><br>
<h1 style="color:white">Registered Patients</h1>
<br><br>
    <form class="center" method="POST" action="addpatients.php">
    <button type="submit" name="notes-apply">Create New Patient Account</button>
    </form>
	<div class="center">
    <form class="center" method="POST" action="">

<br><br>

<?php

    $sql=$conn->prepare("SELECT Id, firstname, lastname FROM patients");
    $sql->execute();
    $result = $sql->get_result();
    if ($result->num_rows >0){
        $doctors = $result->fetch_all();
    }
?>

<select name="patientid">
<option>SELECT PATIENT</option>
<?php foreach($doctors as $doctor)
{
    echo '<option value="'.$doctor[0].'">'.$doctor['1'].' '.$doctor['2'].'</option>';
}
?>
</select>
<button type="submit" name="update">Update account</button>
<button type="submit" name="delete">Delete account</button>
</form>
</div>
<?php
}
	
?>
</center>


<html>
<head>
	
	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	
</head>
<style type="text/css">
	#ab1:hover{cursor:pointer;}

body {
	
	background-image:url("free_medical_background6.jpg");

}
	
.zoom1{
	zoom:40%
	

	
}
.card {
      background:rgba(255,255,255,0.5);


}

ul {
list-style-type: none;
margin: 5px;
padding: 10px;
overflow: hidden;
}

li {
float: 
}

ul li:last-child {
float:
}

li a {
color: white;
font-size: 20px;
text-align: center;
padding: 5px 5px;

}

footer {
	
color: white;	
	
}


</style>
<body>

<<footer>
<center>

<br></br><br></br><br></br><br></br><br></br>

<ul>
	<li>
		<a href="adminpanel.php">GO BACK   </a>&nbsp;
	
		&nbsp;<a href="../connections/logout.php">LOGOUT<a/>
	</li>
</ul>

<br></br>

London Clinic 2019

</center>
</footer>
</body>
</html>

















