<?php
	
	
require "docsession.php";	
require "../connections/connection.php";

$sql=$conn->prepare("SELECT doctorid, patientid, date, time FROM book_appointments WHERE doctorid=? AND patientid=?");
	    $sql->bind_param('ii',$_SESSION['id'],$_POST['patientid']);
	    $sql->execute();
      $result = $sql->get_result();
      if ($result->num_rows >0){
        $book_appointments = $result->fetch_all();
        $nextDate = $book_appointments[0][2];
       $time = $book_appointments[0][3];
        foreach($book_appointments as $appointment)
        {
            if($appointment[2] < $nextDate)
            {
             $nextDate = $appointment[2];
               $time = $appointment[3];
            }
        }
        $sql=$conn->prepare("SELECT ID, firstname, lastname FROM patients WHERE ID=?");
	    $sql->bind_param('i',$book_appointments[0][1]);
	    $sql->execute();
        $result = $sql->get_result();
        if ($result->num_rows >0){
            $patient = $result->fetch_assoc();
        }
      }
?>
<div class="center">

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


<h1 style="color:white">Appointment's details</h1>
<br></br>

    <?php
        echo '<p style="color:white"><font size=5>Patient: '.$patient['firstname'].' '.$patient['lastname'].'</font></p>';
    ?>
	<br>
   <p style="color:white"><font size=5>Date:</font></p>
	  
      <input type="date" name="appointment" value="<?=$nextDate?>">
<br></br><br>
      <p style="color:white"><font size=5>Time: <br><?=$time?></font></p>
	  
<br>
<img src="appointments.jpg"  style="width:350px";>

</center>
</div>
</body>
<footer>
<center>
<br>

<ul>
	<li>
		<a href="view_appointments.php">GO BACK   </a>&nbsp;
	
		&nbsp;<a href="../connections/logout.php">LOGOUT<a/>
	</li>
</ul>



London Clinic 2019


</center>
</footer>
</html>
