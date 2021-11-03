<?php
session_start();
error_reporting(1);
include 'header.php';
include('../connect.php');



 date_default_timezone_set('Asia/Dhaka');
 $current_date = date('Y-m-d');

if(isset($_POST["btnsubmit"]))
{

//Get application ID
function applicationID(){
$string = (uniqid(rand(), true));
return substr($string, 0,5);
}
	
$applicationID = "ADM/".date("Y")."/".applicationID();		


$name = mysqli_real_escape_string($conn,$_POST['txtname']);
$email = mysqli_real_escape_string($conn,$_POST['txtemail']);
$phone = mysqli_real_escape_string($conn,$_POST['txtphone']);
$gender = mysqli_real_escape_string($conn,$_POST['cmdgender']);
$versity = mysqli_real_escape_string($conn,$_POST['txtversity']);
$dept = mysqli_real_escape_string($conn,$_POST['txtdept']);
$syear = mysqli_real_escape_string($conn,$_POST['txtsyear']);

$photo='upload/default.jpg';
$credential='upload/Result-Report-card-software.png';

$status='0';


//check if email already exist
$sql_u = "SELECT * FROM admission WHERE email='$email'";
$res_u = mysqli_query($conn, $sql_u);
if (mysqli_num_rows($res_u) > 0) {
$msg_error = "Email already exist";

}else {	
//check if  Phone already exist
$sql_u = "SELECT * FROM admission WHERE phone='$phone'";
$res_u = mysqli_query($conn, $sql_u);
if (mysqli_num_rows($res_u) > 0) {
$msg_error = "Phone already exist";

}else {
$sql = "INSERT INTO admission (name,email,phone,gender,versity,dept,syear,status,photo,date_admission,applicationID)VALUES( '$name','$email','$phone','$gender','$versity','$dept','$syear','$status','$photo','$current_date','$applicationID')";
 
 if ($conn->query($sql) === TRUE) {
 
$_SESSION['email']=$email;
$_SESSION['name']=$name;
$_SESSION['ApplicationID']=$applicationID;

header("Location: upload.php"); 
    }else { 
?>
<script>
alert('Problem Occured , Try Again');

</script>
<?php
}
}
}
}
?>


<title>Registation Form| Student Registation </title>
<?php if ($msg <> "") { ?>
  <style type="text/css">
<!--
.style1 {
	font-size: 12px;
	color: #07294D;
}
-->
  </style>
  <div class="alert alert-dismissable alert-<?php echo $msgType; ?>">
    <button data-dismiss="alert" class="close" type="button">x</button>
    <p><?php echo $msg; ?></p>
  </div>
<?php } ?>
<p><h4><?php echo "<p> <font color=red font face='arial' size='3pt'>$msg_error</font> </p>"; ?></h4>  </p>
  <h4><?php echo "<p> <font color=green font face='arial' size='3pt'>$msg_success</font> </p>"; ?></h4>  </p>
<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <div class="well contact-form-container">
        <form class="form-horizontal contactform" action="" method="post" name="f" >
          <fieldset>
	
                         <div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">Fullname:
                <input type="text"  id="pass1" class="form-control" name="txtname" value="<?php if (isset($_POST['txtname']))?><?php echo $_POST['txtname']; ?>" required="">
              </label>
            </div>
			<div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">Gender:
               <select name="cmdgender" id="gender" class="form-control" required="">
                                                    <option value=" ">--Select Gender--</option>
                                                     <option value="Male">Male</option>
                                                      <option value="Female">Female</option>
                                              </select>
              </label>
            </div>
			  <div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">phone:
                <input type="text"  id="pass1" class="form-control" name="txtphone" value="<?php if (isset($_POST['txtphone']))?><?php echo $_POST['txtphone']; ?>" required="">
              </label>
            </div>
				  <div class="form-group">
              <label class="col-lg-12 control-label" for="uemail">Email:
             <input type="email" name="txtemail" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  value="<?php if (isset($_POST['txtemail']))?><?php echo $_POST['txtemail']; ?>" required>
              </label>
            </div>
			 <div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">Univarsity:
                <input type="text"  id="pass1" class="form-control" name="txtversity" value="<?php if (isset($_POST['txtversity']))?><?php echo $_POST['txtversity']; ?> " required="">
              </label>
            </div>
				<div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">Department:
                <input type="text"  id="pass1" class="form-control" name="txtdept" value="<?php if (isset($_POST['txtdept']))?><?php echo $_POST['txtdept']; ?>" required="">
              </label>
            </div>
			
		<div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">Year:
                <input type="text"  id="pass1" class="form-control" name="txtsyear"  value="<?php if (isset($_POST['txtsyear']))?><?php echo $_POST['txtyear']; ?>" required="">
              </label>
            </div>
		 

            <div style="height: 10px;clear: both"></div>

            <div class="form-group">
			
			
              <div class="col-lg-10">
                <button class="btn btn-primary" type="submit" name="btnsubmit">Submit</button> 
                <a href="../user/login.php">Already register then LogIn</a>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>

<p>
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p data-v-6f398a90="">&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
