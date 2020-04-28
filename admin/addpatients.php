<!DOCTYPE html>
<?php

require "adminsession.php";
require "../connections/connection.php";
	
?>

 <div class="center">
	
<?php

if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['dob']) && isset($_POST['doctor_id']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['gender']))
{
  $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $sql=$conn->prepare("INSERT INTO patients (firstname, lastname, dob, doctor_id, email, Password, gender) VALUES (?, ?, ?, ?, ?, ?, ?)");
  $sql->bind_param("sssssss", $_POST['firstname'], $_POST['lastname'], $_POST['dob'], $_POST['doctor_id'], $_POST['email'], $_POST['password'], $_POST['password']);
  $sql->execute();
  if($sql == true)
  {
     echo '<p>Patient account created successfully!!!
	Returning...
	.</p>';
  }
  
  header('Refresh: 2;URL=http://localhost/cc/admin/addpatients.php');
  
}
else
{
    $sql=$conn->prepare("SELECT Id, firstname, lastname FROM doctors");
	$sql->execute();
    $result = $sql->get_result();
    if ($result->num_rows >0){
        $doctors = $result->fetch_all();
    }
?>


<html>
<head>
<br>
	<center><h1 style="color:white">REGISTER NEW PATIENT</h1></center>
	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	
</head>
<style type="text/css">
	#ab1:hover{cursor:pointer;}

body {
	
	background-image:url("free_medical_background6.jpg");
	background-size: 1200px 1000px;

}
	
.zoom1{
	zoom:40%
	

	
}
.card {
      background:rgba(255,255,255,0.5);


}

ul {
list-style-type: none;
padding: 1px;
overflow: hidden;
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
.mytext{
	width: 20px;
	height: 20px;
	font-size: 20px;
}

</style>
<body>

<center>
<div class="card-body" >
	<form class="form-group" action="addpatients.php" method = "post">
		<label style="color:white">FIRST NAME:</label>	
		<input type = "text" name ="firstname" class="form-control" style="width:350px;" align="right"<br>
		<br>
		<label style="color:white">LAST NAME:</label>
		<input type = "text" name ="lastname" class="form-control" style="width:350px;"<br>
		<br>
		<label style="color:white">Date of Birth:</label>
		<input type = "date" name ="dob" class="form-control" style="width:350px;"<br>
		<br>
		</br>
		
		
		
		<label style="color:white">Assigned Doctor:</label>
		<select name="doctor_id">
		<?php
		foreach($doctors as $doctor)
		{
        echo '<option value="'.$doctor[0].'">'.$doctor[1].' '.$doctor[2].'</option>';
		}
		?>	 
		</select>
		<br>
		<br>
		
		
		
		<label style="color:white">EMAIL:</label>	
		<input type = "text" name ="email" class="form-control" style="width:350px;"<br>
		<br>
		
		<label style="color:white">PASSWORD:</label>
		<input type = "password" name ="password" value="<?php echo $password;?>" 
		class="form-control" style="width:350px;"<br>
		<br>
			<br>
		<p style="color:white"	>Gender</p>

 	 <select name="gender">

      <option value="Male">Male</option>
      <option value="Female">Female</option>
      <option value="Other">Other</option>
    </select>
 
	
	</div>


		<input type="submit" name="submit_patient" value="Register Patient">
		
	</form>

	<br><br><br>
<ul>
	<li>
		<a href="managepatients.php">GO BACK   </a>&nbsp;
	
		&nbsp;<a href="../connections/logout.php">LOGOUT<a/>
	</li>
</ul>


</center>	
</body>

<?php
}

?>

</html>