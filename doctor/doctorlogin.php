

<!DOCTYPE html>
<html>
<head>
	
	<title> Doctor Page </title>
	
	
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
float: left
}

ul li:last-child {
float:right
}

li a {
color: white;
text-align: center;
padding: 5px 5px;

}

footer {
	
color: white;	
	
}

</style>

<body>

	
	<ul>
		<li><a href="../patient/patientlogin.php">PATIENTS</a></li>	
		<li><a href="doctorlogin.php">DOCTORS</a></li>	
		<li><a href="../admin/adminlogin.php">ADMIN</a></li>
		<li><a href="../homepage/index.php">HOME</a></li>
	</ul>

	<center>
		<div class="container" style="width:400px;"   >
		<div class="card">
		<div class="card-body">
	<br>
		<div class = "zoom1";>
			<img src="freedoctor.jpg"  style="width:350px";>
		</div>
	
	<br>
	
<div class="card-body">
	<form class="center" method="post" action="../connections/connectdoc.php" >
		<label>Email :</label><br>
			<input type="uname" name="Email" placeholder="enter email" style="width:150px;" required><br>
		<br>
		<label>Password :</label><br>
			<input type="password" name="Password" placeholder="enter password" style="width:150px;" required><br>
		<br>
		<button type="submit">Login</button>
	</form>
	
<center>
<br>
</div>
</div>
</div>
<br>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>

<footer>
<center>

<br></br>

London Clinic 2019

</center>
</footer>
</html>