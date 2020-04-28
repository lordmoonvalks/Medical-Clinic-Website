<html>
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
<?php
	
include "patientsession.php";
include "../connections/connection.php";

if(isset($_POST['date']))
{
  $sql=$conn->prepare("SELECT patientid, firstname, notes, appdate FROM medicine_notes WHERE patientid=? AND appdate=?");
  $sql->bind_param('is',$_SESSION['id'], $_POST['date']);
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows >0){
    $medicine_notes = $result->fetch_assoc();
  }
?>
<center>
<form class="center" action="patientsession.php" method="post"> 
<br><br><br>
	<center><input name="disabled" value="<?=$medicine_notes['firstname']?>" disabled></center>
  <p style="color:white"><font size=5>Medicine Description:</font></p>
</br>   
   <textarea rows="8" cols="50">
<?=$medicine_notes['notes']?></textarea>
</form>

<ul>
	<li>
		<a href="patientpanel.php">GO BACK   </a>&nbsp;
	
		&nbsp;<a href="../connections/logout.php">LOGOUT<a/>
	</li>
</ul>




<?php
}
else
{
  $sql=$conn->prepare("SELECT patientid, appdate FROM medicine_notes WHERE patientid=?");
  $sql->bind_param('i',$_SESSION['id']);
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows >0){
    $dates = $result->fetch_all();
  }
?>




<center>

	<form class="center" action="/cc/patient/medicine_notes.php" method="post"> 
	<br>
<h1 style="color:white">Select your appointment date to view medicine notes:</h1>
<br></br><br>
<select name="date">

<br><br>

<?php
    foreach($dates as $date)
    {
      echo '<option value="'.$date[1].'">'.$date[1].'</option>';
    }
?>
</select>
<br></br>
<br></br>
<button type="submit" name="notes-apply">View notes</button>


</body>
<br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br>
<footer>

<ul>
	<li>
		<a href="patientpanel.php">GO BACK   </a>&nbsp;
	
		&nbsp;<a href="../connections/logout.php">LOGOUT<a/>
	</li>
</ul>


</center>


</html>

<?php
}

?>
