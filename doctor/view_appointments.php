<?php
	
require "docsession.php";	
include "../connections/connection.php";

$sql=$conn->prepare("SELECT DISTINCT patientid FROM book_appointments WHERE doctorid=?");
	$sql->bind_param('i',$_SESSION['id']);
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows >0){
    $rows = $result->fetch_all();
    $i=0;
    foreach($rows as $row)
    {
      $sql=$conn->prepare("SELECT ID, firstname, lastname FROM patients WHERE ID=?");
	    $sql->bind_param('i',$row[0]);
	    $sql->execute();
      $result = $sql->get_result();
      if ($result->num_rows >0){
        $patients[$i++] = $result->fetch_assoc();
      }
    }
  }
?>

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







<br></br>

<center>
	   <p style="color:white"><font size=6> APPOINTMENTS HISTORY:</font></p>
	   
	   <br></br>
	   
     <form action="/cc/doctor/list_of_appointments.php" method="POST">
      <select name="patientid">
        <option>View booked patients</option>
      <?php
        foreach($patients as $patient)
        {
          echo '<option value='.$patient['ID'].'>'.$patient['firstname'].' '.$patient['lastname'].'</option>';
        }
  
      ?>
    </select>
	
	
    <input type="submit" value="check details" name="submit" style="margin:auto;margin-top:10px"/>
    </form>
	<br></br><br></br>
	<img src="appointments.jpg"  style="width:350px";>

</div>

</body>
<footer>
<center>
<br></br><br></br><br></br>

<ul>
	<li>
		<a href="doctorpanel.php">GO BACK   </a>&nbsp;
	
		&nbsp;<a href="../connections/logout.php">LOGOUT<a/>
	</li>
</ul>
<br>

London Clinic 2019

</center>
</footer>
</html>