<!DOCTYPE html>
<?php
require "adminsession.php";
require "../connections/connection.php";
?>

<html>
<body>
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

<center>

	
<h1 style="color:white">Update Patient:</h1>

<?php
    if(isset($_POST['id']) && isset($_POST['firstname']) && isset($_POST['lastname'])&& isset($_POST['dob']) && isset($_POST['doctor_id']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['gender']))
    {
        $query = "UPDATE patients SET firstname=?,lastname=?,dob=?,doctor_id=?, email=? ,password=?, gender=? WHERE ID=?";
        $sql = $conn->prepare($query);
        $sql->bind_param('ssssssss', $_POST['firstname'], $_POST['lastname'], $_POST['dob'], $_POST['doctor_id'], $_POST['email'], $_POST['password'], $_POST['gender'], $_POST['id']);
        $sql->execute();

        if(isset($_POST['password']) && !empty($_POST['password']))
        {
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $query = "UPDATE patients SET password=? WHERE ID=?";
            $sql = $conn->prepare($query);
            $sql->bind_param('ss', $_POST['password'], $_POST['id']);
            $sql->execute();
        }
        echo '<p style="color:white">Patient updated successfully!!! Redirecting... </p>';
		 header('Refresh: 2;URL=http://localhost/cc/admin/managepatients.php');
    }
	
	
	 
    else
    {
        $sql=$conn->prepare("SELECT ID, firstname, lastname, dob, doctor_id, email, password, gender FROM patients WHERE ID = ?");
        $sql->bind_param('i',$_GET['id']);
        $sql->execute();
        $result = $sql->get_result();
        if ($result->num_rows >0){
            $patient = $result->fetch_assoc();
        }

        $sql=$conn->prepare("SELECT ID, firstname, lastname FROM doctors");
        $sql->execute();
        $result = $sql->get_result();
        if ($result->num_rows >0){
            $doctors = $result->fetch_all();
        }
?>

<form class="center" method="POST" action="patientupdate.php">

<input type="hidden" name="id" value="<?=$_GET['id']?>">

 <p style="color:white">Patient Firstame:</p>
<input type="text" name="firstname" placeholder="Patient Name" value="<?=$patient['firstname'] ?? ''?>">

<p style="color:white">Patient Lastname:</p>
<input type="text" name="lastname" placeholder="Patient Surname" value="<?=$patient['lastname'] ?? ''?>">

<p style="color:white">Patient Date of Birth:</p>
<input type="date" name="dob" placeholder="Patient dob" value="<?=$patient['dob'] ?? ''?>">



<p style="color:white">Gender:</p>

 	 <select name="gender">
    <?php
        if($patient['gender'] == 'Male') {
            echo '<option selected=selected value="Male">Male</option>';
        }
        else {
            echo '<option value="Male">Male</option>';
        }
        if($patient['gender'] == 'Female') {
            echo '<option selected=selected value="Female">Female</option>';
        }
        else {
            echo '<option value="Female">Female</option>';
        }
        if($patient['gender'] == 'Other') {
            echo '<option selected=selected value="Other">Other</option>';
        }
        else {
            echo '<option value="Other">Other</option>';
        }
        ?>
    </select>


<p style="color:white">Assign doctor to the patient:</p>
		
 <select name="doctor_id">
    <?php 
    foreach ($doctors as $doctor) {
        if ($patient['doctor_id'] == $doctor['ID']) { ?>
            <option selected="selected" value="<?=$doctor[0]?>"><?=$doctor[1].' '.$doctor[2]?>
        <?php } else { ?>
            <option value="<?=$doctor[0]?>"><?=$doctor[1].' '.$doctor[2]?></option>
        <?php }
    } ?>
	</select>



	<p style="color:white">Patient Email address:</p>
    <input type="text" name="email" placeholder="Email address" value="<?=$patient['email'] ?? ''?>">

	<p style="color:white">Patient Password:</p>
    <input type="text" name="password" placeholder="Enter password here ">
	<br><br><br>	
    <button type="submit">Update</button>
    </form>
</div>

<br>
<ul>
	<li>
		<a href="managepatients.php">GO BACK   </a>&nbsp;
	
		&nbsp;<a href="../connections/logout.php">LOGOUT<a/>
	</li>
</ul>
	</center>

</body>
</html>


<?php
}

	
?>