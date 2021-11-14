<?php
session_start();
include('../connect.php');
if(strlen($_SESSION['admin-username'])=="" || !isset($_SESSION['admin-username']))
    {   
header('location:login.php');
}
else{


if(isset($_POST['btnupload'])){
    $t_id=$_POST['t_id'];
$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
	$image_size= getimagesize($_FILES['image']['tmp_name']);
	move_uploaded_file($_FILES["image"]["tmp_name"],"teacher/" . $_FILES["image"]["name"]);			
			$location="teacher/" . $_FILES["image"]["name"];

 $sql = " update teacher set photo='$location' where t_id='$t_id'";
   $_SESSION['reg_success']=$location;
   if (mysqli_query($conn, $sql)) {

    ?>
									
<script>
alert('Photo has been Uploaded successfully ');
window.location = "upload.php";

</script>

	<?php	
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | easyUniversity</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
      <link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon" />

  <script type="text/javascript">
		function deldata(name){
if(confirm("ARE YOU SURE YOU WISH TO DELETE " + " " + name+ " " + " FROM THE LIST?"))
{
return  true;
}
else {return false;
}
	 
}

</script>

 
  <style type="text/css">
<!--
.style6 {font-size: 12px}
-->
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
 
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
   <a href="#" class="brand-link">
      <img src="../images/favicon.png" alt=" Logo" width="154" height="143" style="opacity: .8">
      <span class="brand-text font-weight-light">      &nbsp;&nbsp;&nbsp;&nbsp;   </span>    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../upload/no_image.jpg" alt="User Image" width="188" height="181" class="img-circle elevation-2">        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
		 <?php
			   include('sidebar.php');
			   
			   ?>
		 
		 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

	<div class="container" style="margin-right: 100px;">
  <div class="row">
    <div class="col-lg-6">
      <div class="well contact-form-container">
       	<form  class="wizard-big" method="post"  enctype="multipart/form-data">
          <fieldset>

          <div class="form-group">
    <label class="col-lg-6 control-label" for="t_id">Teacher  </label>
    <select class="form-control" name="t_id" required="required">
   <option value="">Select Teacher</option>   
   <?php 
        $sql=mysqli_query($conn,"select * from teacher");
        while($row=mysqli_fetch_array($sql))
        {
        ?>
        <option value="<?php echo $row['t_id'];?>"><?php echo ($row['t_name']);?></option>
        <?php } ?>

    </select> 
  </div> 

			 <div class="form-group">
              <label class="col-lg-12 control-label" for="pass1"><span class="controls"><br />
             
                <input type="file" class="form-control" name="image" required>
              </label>
            </div>
                <p>&nbsp;</p>
                <table width="233" border="0">
                  <tr>
                    <td width="81">&nbsp; 
					  <div class="form-group">
                        <div class="col-lg-10">
                          <div align="center">
                            <button class="btn btn-primary" type="submit" name="btnupload">Upload</button>
                          </div>
                        </div>
				      </div>
                  </tr>
          </table> 
             
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>

</div>
    </div>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
<?php } ?>