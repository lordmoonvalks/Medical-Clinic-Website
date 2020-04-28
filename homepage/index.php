<!DOCTYPE html>
<html>
<head>
	
	<title> Home Page </title>
	
	
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
		<li><a href="../doctor/doctorlogin.php">DOCTORS</a></li>	
		<li><a href="../admin/adminlogin.php">ADMIN</a></li>
		<li><a href="index.php">HOME</a></li>
	</ul>


<br><br>

<center>
<img src="freeclinic.jpg"  style="width:350px";>

<br><br>

<h1 style="color:white"><font size=4>London Clinic is a conveniently located practice offering a wide range of medical treatments. 
<br>
Here, at London Clinic we take a great pride not only in the quality of our services
<br>
Come and see us - We are accepting new patients!


</font></h1>
</center>

<br></br><br></br></br>
</div>
</div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>

<footer>
<center>


<p id="date"></p>

<script>
var d = new Date();
document.getElementById("date").innerHTML = d;
</script>


London Clinic 2019

</center>
</footer>
</html>