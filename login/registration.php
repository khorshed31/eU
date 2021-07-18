<?php
session_start();
if(isset($_POST['submit']))
{
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $msge = "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
		if (file_exists($target_file)) {
			$msge = "Sorry, file already exists.";
			$uploadOk = 0;
		} 
		// elseif($imageFileType != ".jpg" || $imageFileType != ".png" || $imageFileType != ".jpeg"
		// || $imageFileType != ".gif" ) {
		// 	$msge = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		// 	$uploadOk = 0;
		// }
	} 
	else {
        $msge = "File is not an image.";
        $uploadOk = 0;
	}
if ($uploadOk == 0)
{
		echo $msge;
		echo"<script>alert('Sorry, your file was not uploaded.');</script>";
	// if everything is ok, try to upload file
} 
else {
	$conn = new mysqli('localhost', 'root', '', 'eu_reg');
		if(!$conn){
			echo"<script>alert('Sorry, Server Not Found.');</script>";
		}
		
			
		            $regno = $_POST['regno'];
					$fname=$_POST['fname'];
					$lname=$_POST['lname'];
					$gender=$_POST['gender'];
					$contactno=$_POST['contact'];
					$emailid=$_POST['email'];
					$password=$_POST['password'];
					$query="insert into  userRegistration(`regno`,`firstName`,`lastName`,`gender`,`contactNo`,`email`,`password`,`imageName`,`imagePath`)
							values('$regno','$fname','$lname','$gender','$contactno','$emailid','$password','".basename( $_FILES["fileToUpload"]["name"])."','uploads/".basename( $_FILES["fileToUpload"]["name"])."')";
					mysqli_query($conn,$query);
					mysqli_query($conn,"UPDATE id_regno SET auto_end = auto_end+1 where description='STD'") or die(mysqli_error($conn));
						if(mysqli_affected_rows($conn)){
							if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
								echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
							} 
							else 
							{
								echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
							}
							echo"<script>alert('Student Succssfully register');</script>";
						}
						else{
							echo"<script>alert('Student register Unsuccssfully');</script>";
						}
			

	}
}
?>

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>User Registration</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
function valid()
{
if(document.registration.password.value!= document.registration.cpassword.value)
{
alert("Password and Re-Type Password Field do not match  !!");
document.registration.cpassword.focus();
return false;
}
return true;
}
</script>
</head>
<body style=" background-image: url('img/eu_Wallpaper.png');">	
	<div class="ts-main-content">
				<?php include('includes/sidebar.php');?>

		<div class="content-wrapper">
			<div class="container-fluid">
<br><br>
				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">easyUniversity | User Registration </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Fill all Info</div>
									<div class="panel-body">
			<form method="post" action="" name="registration" class="form-horizontal" enctype="multipart/form-data" onSubmit="return valid();">
											
										

<div class="form-group">
<?php include('includes/dbcon.php');?>
<?php
$query4=mysqli_query($con,"select * from id_regno where description = 'STD'")or die(mysqli_error($con));
                $row4=mysqli_fetch_array($query4);
                ?>
                            <div class="form-group">
							<label class="col-sm-2 control-label">Reg No Number: </label>
							<div class="col-sm-8">
                            <input type="text" readonly="" value="<?php echo $row4['description'].'-'.($row4['auto_start']+$row4['auto_end']); ?>"class="form-control" placeholder="Reg No Number" name="regno" required>
							</div>
                            </div>
                          
</div>


<div class="form-group">
<label class="col-sm-2 control-label">First Name : </label>
<div class="col-sm-8">
<input type="text" name="fname" id="fname"  class="form-control" required="required" >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Last Name : </label>
<div class="col-sm-8">
<input type="text" name="lname" id="lname"  class="form-control" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Gender : </label>
<div class="col-sm-8">
<select name="gender" class="form-control" required="required">
<option value="">Select Gender</option>
<option value="male">Male</option>
<option value="female">Female</option>
<option value="others">Others</option>
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Contact No : </label>
<div class="col-sm-8">
<input type="text" name="contact" id="contact"  class="form-control" required="required">
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Email id: </label>
<div class="col-sm-8">
<input type="email" name="email" id="email"  class="form-control" onBlur="checkAvailability()" required="required">
<span id="user-availability-status" style="font-size:12px;"></span>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Password: </label>
<div class="col-sm-8">
<input type="password" name="password" id="password"  class="form-control" required="required">
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Confirm Password : </label>
<div class="col-sm-8">
<input type="password" name="cpassword" id="cpassword"  class="form-control" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Upload Iamge : </label>
<div class="col-sm-8">
<input type="file" name="fileToUpload" id="fileToUpload" class="form-control" required="required">
</div>
</div>
						



<div class="col-sm-6 col-sm-offset-4">
<button class="btn btn-default" type="submit">Cancel</button>
<input type="submit" name="submit" Value="Register" class="btn btn-primary">
</div>
</form>

									</div>
									</div>
								</div>
							</div>
						</div>
							</div>
						</div>
					</div>
				</div> 	
			</div>
		</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
	<script>
function checkAvailability() {

$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function ()
{
event.preventDefault();
alert('error');
}
});
}
</script>

</html>