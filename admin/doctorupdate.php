
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
	
	
	
<h1 style="color:white">Update Doctor:</h1>
<br>	
<?php
    if(isset($_POST['id']) && isset($_POST['firstname']) && isset($_POST['lastname'])&& isset($_POST['dob']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['gender']))
    {
        $query = "UPDATE doctors SET firstname=?,lastname=?,dob=?,email=? ,password=?, gender=? WHERE ID=?";
        $sql = $conn->prepare($query);
        $sql->bind_param('sssssss', $_POST['firstname'], $_POST['lastname'], $_POST['dob'], $_POST['email'], $_POST['password'], $_POST['gender'], $_POST['id']);
        $sql->execute();

        if(isset($_POST['password']) && !empty($_POST['password']))
        {
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $query = "UPDATE doctors SET password=? WHERE ID=?";
            $sql = $conn->prepare($query);
            $sql->bind_param('ss', $_POST['password'], $_POST['id']);
            $sql->execute();
        }
        echo '<p style="color:white">Doctor updated successfully.</p>';
		 header('Refresh: 2;URL=http://localhost/cc/admin/managedoctors.php');
    }
    else
    {
        $sql=$conn->prepare("SELECT ID, firstname, lastname, dob, email, password, gender FROM doctors WHERE ID = ?");
        $sql->bind_param('i',$_GET['id']);
        $sql->execute();
        $result = $sql->get_result();
        if ($result->num_rows >0){
            $doctor = $result->fetch_assoc();
        }
?>

<form class="center" method="POST" action="doctorupdate.php">

<input type="hidden" name="id" value="<?=$_GET['id']?>">

 <p style="color:white">Doctor Firstname:</p>
<input type="text" name="firstname" placeholder="Doctor Name" value="<?=$doctor['firstname'] ?? ''?>">

<p style="color:white">Doctor Lastname:</p>
<input type="text" name="lastname" placeholder="Doctor Surname" value="<?=$doctor['lastname'] ?? ''?>">

<p style="color:white">Doctor's Date of Birth:</p>
<input type="date" name="dob" placeholder="Doctor Surname" value="<?=$doctor['dob'] ?? ''?>">

<p style="color:white">Gender</p>

 	 <select name="gender">
    <?php         
        if($doctor['gender'] == 'Male') {
            echo '<option selected=selected value="Male">Male</option>';
        }
        else {
            echo '<option value="Male">Male</option>';
        }
        if($doctor['gender'] == 'Female') {
            echo '<option selected=selected value="Female">Female</option>';
        }
        else {
            echo '<option value="Female">Female</option>';
        }
        if($doctor['gender'] == 'Other') {
            echo '<option selected=selected value="Other">Other</option>';
        }
        else {
            echo '<option value="Other">Other</option>';
        }
        ?>
    </select>


	<p style="color:white">Email address:</p>
    <input type="text" name="email" placeholder="Email address" value="<?=$doctor['email'] ?? ''?>">

	<p style="color:white">Password:</p>
    <input type="text" name="password" placeholder="Enter password here ">
	<br></br>
    <button type="submit">Update</button>
    </form>
	
	<br></br><br></br>
	<ul>
	<li>
		<a href="managedoctors.php">GO BACK   </a>&nbsp;
	
		&nbsp;<a href="../connections/logout.php">LOGOUT<a/>
	</li>
</ul>
	</center>
	</center>
	
</div>	
<?php
}

	
?>