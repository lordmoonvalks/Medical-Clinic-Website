<html>

<style type="text/css">
	#ab1:hover{cursor:pointer;}

body {
	
	background-image:url("free_medical_background6.jpg");
	background-size: 1200px 1200px;
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
	
require "docsession.php";	
include "../connections/connection.php";

echo '<div class="center">';

if(isset($_POST['patientid']) && isset($_POST['firstname']) && isset($_POST['notes']) && isset($_POST['appdate']))
{
  $sql=$conn->prepare("INSERT INTO medicine_notes (patientid, firstname, notes, appdate) VALUES (?, ?, ?, ?)");
  $sql->bind_param("ssss", $_POST['patientid'], $_POST['firstname'], $_POST['notes'], $_POST['appdate']);
  $sql->execute();
  if($sql == true)
    echo '<p>Notes applied!!! Redirecting....</p>';
 header('Refresh: 2;URL=http://localhost/cc/doctor/medicine_notes.php');
	


  {
  }
}
else if(isset($_POST['patientid']))
{ 
  $sql=$conn->prepare("SELECT patientid, date FROM book_appointments WHERE patientid=?");
	$sql->bind_param('i',$_POST['patientid']);
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows >0){
    $book_appointments = $result->fetch_all();
  }
?>
<center>
<br>
  <h1 style="color:white"> Apply mediine notes </h1>
</br>
     <p style="color:white">Select appointment's date:</p>

     <form action="/cc/doctor/medicine_notes.php" method="POST">
        <input type="hidden" name="patientid" value="<?=$_POST['patientid']?>">
        <select name="appdate">
          <option>Select an option</option>
        <?php
        
          if($result->num_rows > 1)
          {
            foreach($book_appointments as $appointment)
            {
              echo '<option value='.$appointment[1].'>'.$appointment[1].'</option>';
            }
          }
          else
          {
            echo '<option value='.$appointments[0][1].'>'.$appointments[0][1].'</option>';
          }
          
        ?>
      </select>
      <br>
	
		<br>
		</br>
      <p style="color:white">Medicine description:</p>
  
      <textarea name="notes" rows="8" cols="50">Enter description here...</textarea>
    <br><br><br>
      <button type="submit" name="submit">Submit</button>
      </form>
<?php
}
else
{
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
  
  <center>
<br>
  <h1 style="color:white"> Apply medicine notes to your patients</h1>
 </br>
	
  <p style="color:white"><font size=5>Select patient:</font></p>

  <form action="/cc/doctor/medicine_notes.php" method="POST">

      <select name="patientid">
        <option>Select an option</option>
      <?php
        foreach($patients as $patient)
        {
          echo '<option value='.$patient['ID'].'>'.$patient['firstname'].' '.$patient['lastname'].'</option>';
        }
      ?>
    </select>
    <button type="submit" name="notes-apply">Submit</button>
    </form>
   <?php
}
?>
<br>
<img src="notes.jpg"  style="width:250px";>
<footer>
<center>
<br></br><br>

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


</div>
</center>
</body>
</html>