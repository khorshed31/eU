<?php
session_start();
include('../connect.php');
if(strlen($_SESSION['admin-username'])=="" || !isset($_SESSION['admin-username']))
    {   
header('location:login.php');
}
else{
    if(isset($_POST['submit']))
    {
      $t_id=$_POST['t_id'];
    $course=$_POST['course'];
    $dept_id=$_POST['dept_id'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    $ret=mysqli_query($conn,"insert into post(course,dept_id,title,description,t_id) values('$course','$dept_id','$title','$description','$t_id')");
    if($ret)
    {
    $_SESSION['msg']="Post Created Successfully !!";
    }
    else
    {
      $_SESSION['msg']="Error : Post not created";
    }
    }
  
    $username = $_SESSION["admin-username"];
    if(isset($_GET['del']))
          {
                  mysqli_query($conn,"delete from post where id = '".$_GET['id']."'");
                      $_SESSION['delmsg']="Post deleted !!";
          }
date_default_timezone_set('Asia/Dhaka');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
$username = $_SESSION["admin-username"];
$sql = "select * from teacher where t_id ='$username'"; 
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Teacher | easyUniversity</title>
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
      <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
      <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
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
          <img src="../<?php echo $row['photo'];?>" alt="User Image" width="188" height="181" class="img-circle elevation-2">        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $row['t_name'];?></a>
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


  <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                          Post
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>


                        <div class="panel-body">
                       <form name="dept" method="post">
                      <?php
                       $sql = "select * from teacher where t_id ='$username'"; 
$result = $conn->query($sql);
$row1 = mysqli_fetch_array($result);
      ?>
                       <div class="form-group">
    <label for="t_id">Teacher ID  </label>
    <input type="text" readonly class="form-control" id="t_id" name="t_id"value="<?php echo $row1['t_id'];?>" required />
  </div> 
                       <div class="form-group">
              <label class="col-lg-12 control-label" for="dept_id">Department:
               <select name="dept_id" id="dept_id" class="dept form-control" required="">
                                                    <option value=" ">Select Department</option>
                                                     <?php
                                                     $sql = mysqli_query($conn,"SELECT * FROM department");
                                                     while ($row = mysqli_fetch_assoc($sql)) {
                                                       ?>
                                                       <option value="<?php echo $row['dept_id'];?>"><?php echo ($row['department']);?></option>
                                                       <?php
                                                     }
                                                     ?>
                                              </select>
              </label>
            </div>

            <div class="form-group">
              <label class="col-lg-12 control-label" for="course">Course:
               <select name="course" id="course" class="course form-control" required="">
                                                    <option value=" ">Select Course</option>
                                                       
                                                       <option value=""></option>
                                              </select>
              </label>
            </div>  

<div class="form-group">
    <label for="title">Post Title  </label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Title Here" required />
  </div> 

  <div class="form-group">
				<label for="description" class="control-label">Description</label>
                <textarea name="description" id="description" cols="30" rows="2" class="form-control form no-resize"></textarea>
			</div>   
  
 <button type="submit" name="submit" class="btn btn-info">Submit</button>
</form>
<br><br>



                            </div>
                            </div>
                    </div>
                 
                </div>

                <font color="red" align="center"><?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?></font>
                <div class="col-md-12">
                    <!--    Bordered Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Post
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="20%">#</th>
                                            <th width="20%">Course Name </th>
                                            <th width="3%">Department ID</th>
                                            <th width="10%">Title</th>
                                            <th width="25%">Description</th>
                                            <th width="10%">Teacher Name</th>
                                             <th width="10%">Creation Date</th>
                                             <th width="11%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
$sql=mysqli_query($conn,"SELECT * FROM `post`,`teacher` WHERE `post`.`t_id` = `teacher`.`t_id` AND `teacher`.`t_id` ='$username'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
    ?>
                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo htmlentities($row['course']);?></td>
                                            <td><?php echo htmlentities($row['dept_id']);?></td>
                                             <td><?php echo htmlentities($row['title']);?></td>
                                             <td><?php echo ($row['description']);?></td>
                                             <td><?php echo ($row['t_name']);?></td>
                                            <td><?php echo htmlentities($row['post_date']);?></td>
                                            <td>
                                            <a href="#?id=<?php echo $row['id']?>">
<button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> </a>                                        
  <a href="post.php?id=<?php echo $row['id']?>&del=delete"" onClick="return confirm('Are you sure you want to delete?')">
                                            <button class="btn btn-danger">Delete</button>
</a>
                                            </td>
                                        </tr>
<?php 
$cnt++;
} ?>

                                        
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                     <!--  End  Bordered Table  -->
            
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
                        CKEDITOR.replace( 'description' );
                </script>
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
<script src="ckeditor/ckeditor.js">
    CKEDITOR.replace('description');
</script>
<script>
   $('.dept').on('change', function() {
        var dept_id = this.value;
        $.ajax({
          url: 'course_sql.php',
          type: "POST",
          data: {
            dep_id : dept_id
          },
          success: function(result){
            $('#course').html(result);
          }
        });
   });
</script>
</body>
</html>
<?php } ?>