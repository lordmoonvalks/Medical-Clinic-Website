<?php
	
include "patientsession.php";
include "../connections/connection.php";

if(isset($_POST['date']) && isset($_POST['time']))
{
  echo '<div class="center">';
  $sql=$conn->prepare("SELECT date, time FROM book_appointments WHERE date = ? AND time = ?");
  $sql->bind_param("ss", $_POST['date'], $_POST['time']);
  $sql->execute();
  $result = $sql->get_result();
  if($result->num_rows > 0)
  {
    echo '<p> this date is not available.</p>';
	   header('Refresh: 2;URL=http://localhost/cc/patient/book_appointments.php	');
  }
  else
  {
    $sql=$conn->prepare("SELECT ID, doctor_id FROM patients WHERE ID=?");
    $sql->bind_param('i',$_SESSION['id']);
    $sql->execute();
    $result = $sql->get_result();
    if ($result->num_rows >0){
      $patient = $result->fetch_assoc();
    }

    $sql=$conn->prepare("INSERT INTO book_appointments (doctorid, patientid, `date`, `time`) VALUES (?, ?, ?, ?)");
    $sql->bind_param("iiss", $patient['doctor_id'], $_SESSION['id'], $_POST['date'], $_POST['time']);
    $sql->execute();
    if($sql == true)
    {
      echo '<p>Appointment booked!!! Redirecting...</p>';
	   header('Refresh: 2;URL=http://localhost/cc/patient/book_appointments.php	');
    }
  }
}
else
{
?>

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




<center>
<form action="/cc/patient/book_appointments.php" method="POST">
<h1 style="color:white">Book appontment with your doctor:<h1>
<br>

  <p style="color:white"><strong>Date:</p>
   <input style="margin:auto" type="date" name="date">

   <p style="color:white"><strong>Time:</p>

  <select name="time">
     <option value="Option">Select a timeslot</option>

     <option value="10:00">10:00</option>

     <option value="12:00">12:00</option>	 

     <option value="15:00">15:00</option>	

	<option value="15:00">17:30</option>	 
   </select>
   <br>
    <br><br>
 <button type="submit">Book Appointment</button>
 <br></br><br></br>
 
 <ul>
	<li>
		<a href="patientpanel.php">GO BACK   </a>&nbsp;
	
		&nbsp;<a href="../connections/logout.php">LOGOUT<a/>
	</li>
</ul>

 
 </center>
 <footer>
<center>
</br>

London Clinic 2019
<br><br>
</center>
</footer>
 
 
 </form>
</div>
<?php
}
?>
