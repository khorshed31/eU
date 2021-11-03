<?php
session_start();
error_reporting(0);
include('../connect.php');

if(strlen($_SESSION['uemail'])=="")
    {   
    header("Location: login.php"); 
    }
    else{
	}
      
$email = $_SESSION["uemail"];


date_default_timezone_set('Asia/Dhaka');
$current_date = date('Y-m-d ');

				
$sql = "select * from admission where email='$email'"; 
$result = $conn->query($sql);
$rowaccess = mysqli_fetch_array($result);

if(isset($_POST["btnedit"]))
{

    $name = mysqli_real_escape_string($conn,$_POST['txtname']);
    $email = mysqli_real_escape_string($conn,$_POST['txtemail']);
    $phone = mysqli_real_escape_string($conn,$_POST['txtphone']);
    $gender = mysqli_real_escape_string($conn,$_POST['cmdgender']);
    $versity = mysqli_real_escape_string($conn,$_POST['txtversity']);
    $dept = mysqli_real_escape_string($conn,$_POST['txtdept']);
    $syear = mysqli_real_escape_string($conn,$_POST['txtsyear']);


$image= addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
$image_name= addslashes($_FILES['userImage']['name']);
$image_size= getimagesize($_FILES['userImage']['tmp_name']);
move_uploaded_file($_FILES["userImage"]["tmp_name"],"../upload/" . $_FILES["userImage"]["name"]);			
$location="upload/" . $_FILES["userImage"]["name"];

			
$sql1 = " update admission set name='$name',gender='$gender',photo='$location',dept='$dept',ssce_details='$exam' where email='$email'";
   
   if (mysqli_query($conn, $sql1)) {

header("Location: profile.php");
}else{
$_SESSION['error']='Editing Was Not Successful';


}
}
?> 
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Profile|easyUniversity</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Morris -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />

</head>

<body>
   <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img src="../<?php echo $rowaccess['photo'];  ?>" alt="image" width="142" height="153" class="img-circle" />
                             </span>
  
   
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"><span class="text-muted text-xs block"><?php echo $rowaccess['email'];  ?> <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
  </div>	
			   <?php
			   include('sidebar.php');
			   
			   ?>
			   
	       </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>

				<span class="m-r-sm text-muted welcome-message">Welcome to DASHBOARD.</span>

                </li>
                <li class="dropdown">
                   
                    


                <li>
                    <a href="logout.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
               
            </ul>

        </nav>


        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                       
                        <li class="active">
                            <strong>Edit Applicants</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
            <div class="col-lg-7">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
					
					
					<?php
	$sql = "select * from admission where email='$email'"; 
$result = $conn->query($sql);
$row= mysqli_fetch_array($result);
					
					?>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-6 b-r"><h3 class="m-t-none m-b">Edit Applicant Profile</h3>
             <form  action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group"><strong>
                                    <label>Fullname</label></strong>
                                    <input type="text" size="77" name="txtname"  value="<?php echo $row['name'];   ?>" class="form-control" required="">
                                    </div>
                                    <div class="form-group"><label>Department</label>
					  <input type="tel" size="77" name="txtdept" value="<?php echo $row['dept'];   ?>" class="form-control" >
					  </div>
									
				     <div class="form-group"><label>Gender</label>
					  <input type="tel" size="77" name="cmdgender" value="<?php echo $row['gender'];   ?>" class="form-control" >
					  </div>
					   
					   <div class="form-group"><label>Phone</label>
					  <input type="tel" size="77" name="txtphone" value="<?php echo $row['phone'];   ?>" class="form-control" >
					  </div>
					   <div class="form-group"><label>Univarsity</label>
					  <input type="tel" size="77" name="txtversity" value="<?php echo $row['versity'];   ?>" class="form-control" >
					  </div>
					   <div class="form-group"><label>SSCE Detail</label>
					  <input type="tel" size="77" name="txtexam" value="<?php echo $row['ssce_details'];   ?>" class="form-control" >
					  </div>	
					   </div>	                   
						  
									 <div class="col-sm-6">
                                
                                <p class="text-center">
                                    <img src="../<?php echo $row['photo'];   ?>" alt="ritman" width="166" height="147">                                </p>
                                <p class="text-center">
                                  <input name="userImage" type="file" class="inputFile" />
                                </p>
									 </div>
                                    <div>
                                        <p>&nbsp;</p>
                                        <p>&nbsp;</p>
                                        <p>&nbsp;</p>
                                        <p>&nbsp;</p>
                                        <p>&nbsp;</p>
                                        <p>&nbsp;</p>
                                        <p>&nbsp;</p>
                                        <p>&nbsp;</p>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" name="btnedit">
                                        <div align="centre"><strong><i class="fa fa-paste"></i>  Edit Profile</strong></div>
                                        </button>
                                  </div>
                                </form>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
              <div class="col-lg-5"></div>
            </div>
            <div class="row"></div>
        </div>
        <div class="footer">
            <div class="pull-right"></div>
            <div><?php  include('footer.php'); ?></div>
        </div>

        </div>
        </div>


    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>
		<link rel="stylesheet" href="popup_style.css">
<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      <strong>Success</strong> 
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["success"]);  
} ?>
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      <strong>Error</strong> 
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["error"]);  } ?>
    <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>
</body>

</html>
