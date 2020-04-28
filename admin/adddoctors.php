<!DOCTYPE html>
<?php

require "adminsession.php";
require "../connections/connection.php";
	
?>

 <div class="center">
	
<?php

if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['dob']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['gender']))
{
  $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $sql=$conn->prepare("INSERT INTO doctors (firstname, lastname, dob,  email, Password, gender) VALUES (?, ?, ?, ?,  ?, ?)");
  $sql->bind_param("ssssss", $_POST['firstname'], $_POST['lastname'], $_POST['dob'], $_POST['email'], $_POST['password'], $_POST['password']);
  $sql->execute();
  if($sql == true)
  {
    echo '<p>Doctor account created successfully!!!
	Returning...
	.</p>';

  }
  
  header('Refresh: 2;URL=http://localhost/cc/admin/adddoctors.php');
  
}
else
{
?>


<html>
<head>
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
	<form class="form-group" action="adddoctors.php" method = "post">
		<label style="color:white">FIRST NAME:</label>	
		<input type = "text" name ="firstname" class="form-control" style="width:350px;" align="right"<br>
		<br>
		<label style="color:white">LAST NAME:</label>
		<input type = "text" name ="lastname" class="form-control" style="width:350px;"<br>
		<br>
		<label style="color:white">Date of Birth:</label>
		<input type = "date" name ="dob" class="form-control" style="width:350px;"<br>
		<br>
	
		<label style="color:white">EMAIL:</label>	
		<input type = "text" name ="email" class="form-control" style="width:350px;"<br>
		<br>
		
		<label style="color:white">PASSWORD:</label>
		<input type = "password" name ="password" value="<?php echo $password;?>" 
		class="form-control" style="width:350px;"<br>
		<br>
		<label style="color:white">GENDER:</label>
		<br>	
		
 	 <select name="gender">
           <option value="Male">Male</option>
      <option value="Female">Female</option>
      <option value="Other">Other</option>
    </select>
 
	   	</div>

		<br>
		<input type="submit" name="submit_doctor" value="Register Doctor">
		
	</form>
</br>
	<br>
<ul>
	<li>
		<a href="managedoctors.php">GO BACK   </a>&nbsp;
	
		&nbsp;<a href="../connections/logout.php">LOGOUT<a/>
	</li>
</ul>
</center>	
</body>

<?php
}

?>

</html>