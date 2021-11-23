<?php
include('dbcon.php');

//check if email already exist
if(isset($_POST["save"])){

	$un = $_POST['un'];
	$fn = $_POST['fn'];
	$ln = $_POST['ln'];
	$em = $_POST['em'];
	$vr = $_POST['vr'];
	$password = $_POST['password'];
//check if email already exist
$sql_u = "SELECT * FROM student WHERE email='$em'";
$res_u = mysqli_query($conn, $sql_u);
if (mysqli_num_rows($res_u) > 0) {
$msg_error = "Email already exist";
}else{

               mysqli_query($conn,"insert into student (username,firstname,lastname,email,password,versity,location,status)
		values ('$un','$fn','$ln','$em','$password','$vr','uploads/NO-IMAGE-AVAILABLE.jpg','Unregistered')                                    
		") ?>
		
<?php $msg_succ = "Student Registstion Successfully";} 

}?> 