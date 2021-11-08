<?php
session_start();
error_reporting(0);
include 'header.php';
include('../connect.php');

if(strlen($_SESSION['uemail'])=="")
    {   
    header("Location: login.php"); 
    }
    else{
	
      $email = $_SESSION["uemail"];
      $sql = "select * from admission where email='$email'"; 
      $result = $conn->query($sql);
      $rowaccess = mysqli_fetch_array($result);
if(isset($_POST['submit']))
{

$applicationID=$_POST['applicationID'];
$session=$_POST['session'];
$semester=$_POST['semester'];
$dept_id=$_POST['dept_id'];
$course=$_POST['course'];
$ret=mysqli_query($conn,"insert into c_enroll(applicationID,session,semester,dept_id,course) values('$applicationID','$session','$semester','$dept_id','$course')");
if($ret)
{
$_SESSION['msg']="Student Registered Successfully !!";
}
else
{
  $_SESSION['msg']="Error : Student  not Register";
}
}
?>


<?php if(($rowaccess['status'])==(1))
{ ?>
 
			  				 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Course Enroll | easyUniversity</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon" />


<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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
                    <span class="m-r-sm text-muted welcome-message">Welcome to DASHBOARD</span>
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
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Student Registration  </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                          Student Registration
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>



                        <div class="panel-body">
                       <form name="dept" method="post">
                       <div class="form-group">
                       
    <label class="col-lg-12 control-label" for="studentname">Student Name  </label>
    <input type="text" readonly class="form-control" id="studentname" name="studentname" value="<?php echo $rowaccess['name'];  ?>"  />
  </div>
  <div class="form-group">
  <label class="col-lg-12 control-label" for="studentname">Student Email  </label>
    <input type="text" readonly class="form-control" id="email" name="email" value="<?php echo $rowaccess['email'];  ?>"  />
  </div>

 <div class="form-group">
    <label class="col-lg-12 control-label" for="applicationID">Student Application ID</label>
    <input type="text" readonly class="form-control" id="applicationID" name="applicationID" value="<?php echo $rowaccess['applicationID'];  ?>" required />
  </div>


  <div class="form-group">
    <label class="col-lg-12 control-label" for="Session">Session  </label>
    <select class="form-control" name="session" required="required">
   <option value="">Select Session</option>   
   <?php 
        $sql=mysqli_query($conn,"select * from session");
        while($row=mysqli_fetch_array($sql))
        {
        ?>
        <option value="<?php echo $row['s_id'];?>"><?php echo ($row['session']);?></option>
        <?php } ?>

    </select> 
  </div> 

  <div class="form-group">
    <label class="col-lg-12 control-label" for="Semester">Session  </label>
    <select class="form-control" name="semester" required="required">
   <option value="">Select Session</option>   
   <?php 
        $sql=mysqli_query($conn,"select * from semester");
        while($row=mysqli_fetch_array($sql))
        {
        ?>
        <option value="<?php echo $row['sem_id'];?>"><?php echo ($row['semester']);?></option>
        <?php } ?>

    </select> 
  </div> 

  <div class="form-group">
              <label class="col-lg-12 control-label" for="dept">Department:
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
  
<br><br>
 <button type="submit" name="submit" id="submit" class="btn btn-success">Submit</button>
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
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
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
<?php } 
}?>
