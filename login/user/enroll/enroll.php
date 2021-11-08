<?php
session_start();
include('../../connect.php');
error_reporting(0);
if(strlen($_SESSION['uemail'])==0 or strlen($_SESSION['pcode'])==0)
    {   
header('location:../index.php');
}
else{

if(isset($_POST['submit']))
{
$applicationID=$_POST['applicationID'];
$pincode=$_POST['Pincode'];
$session=$_POST['session'];
$dept=$_POST['dept'];
$level=$_POST['level'];
$course=$_POST['course'];
$sem=$_POST['sem'];
$ret=mysqli_query($conn,"insert into courseenrolls(applicationID,pincode,session,dept,course,semester) values('$applicationID','$pincode','$session','$dept','$course','$sem')");
if($ret)
{
$_SESSION['msg']="Enroll Successfully !!";
}
else
{
  $_SESSION['msg']="Error : Not Enroll";
}
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Course Enroll</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    
</head>

<body>
<?php include('includes/header.php');?>
    <!-- LOGO HEADER END-->
<?php if($_SESSION['login']!="")
{
 include('includes/menubar.php');
}
 ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Course Enroll </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                          Course Enroll
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>
<?php $sql=mysqli_query($conn,"select * from students where email='".$_SESSION['uemail']."'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{ ?>

                        <div class="panel-body">
                       <form name="dept" method="post" enctype="multipart/form-data">
   <div class="form-group">
    <label for="studentname">Student Name  </label>
    <input type="text" class="form-control" id="studentname" name="studentname" value="<?php echo htmlentities($row['studentName']);?>"  />
  </div>

 <div class="form-group">
    <label for="studentregno">Student Reg No   </label>
    <input type="text" class="form-control" id="applicationID" name="applicationID" value="<?php echo htmlentities($row['applicationID']);?>"  placeholder="Student Reg no" readonly />
    
  </div>



<div class="form-group">
    <label for="Pincode">Pincode  </label>
    <input type="text" class="form-control" id="Pincode" name="Pincode" readonly value="<?php echo htmlentities($row['pincode']);?>" required />
  </div>   

<div class="form-group">
    <label for="Pincode">Student Photo  </label>
   <?php if($row['studentPhoto']==""){ ?>
   <img src="studentphoto/noimage.png" width="200" height="200"><?php } else {?>
   <img src="studentphoto/<?php echo htmlentities($row['studentPhoto']);?>" width="200" height="200">
   <?php } ?>
  </div>
 <?php } ?>

<div class="form-group">
    <label for="Session">Session  </label>
    <select class="form-control" name="session" required="required">
   <option value="">Select Session</option>   
   <?php 
$sql=mysqli_query($conn,"select * from session");
while($row=mysqli_fetch_array($sql))
{
?>
<option value="<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['session']);?></option>
<?php } ?>

    </select> 
  </div> 



  <div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">Department:
               <select name="dept" id="dept" class="dept form-control" required="">
                                                    <option value=" ">--Select Department--</option>
                                                     <?php
                                                     $sql = mysqli_query($conn,"SELECT * FROM department ORDER BY dept_id");
                                                     while ($row = mysqli_fetch_assoc($sql)) {
                                                       ?>
                                                       <option value="<?php echo htmlentities($row['dept_id']);?>"><?php echo htmlentities($row['department']);?></option>
                                                       <?php
                                                     }
                                                     ?>
                                              </select>
              </label>
            </div>

<div class="form-group">
    <label for="Semester">Semester  </label>
    <select class="form-control" name="sem" required="required">
   <option value="">Select Semester</option>   
   <?php 
$sql=mysqli_query($conn,"select * from semester");
while($row=mysqli_fetch_array($sql))
{
?>
<option value="<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['semester']);?></option>
<?php } ?>

    </select> 
  </div>


  <div class="form-group">
    <label for="Course">Course  </label>
    <select class="form-control" name="course" id="course" onBlur="courseAvailability()" required="required">
   <option value="">Select Course</option>   
     <option value=""></option>
    </select> 
    <span id="course-availability-status1" style="font-size:12px;">
  </div>



 <button type="submit" name="submit" id="submit" class="btn btn-default">Enroll</button>
</form>
                            </div>
                            </div>
                    </div>
                  
                </div>

            </div>





        </div>
    </div>
  <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
function courseAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'cid='+$("#course").val(),
type: "POST",
success:function(data){
$("#course-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

<script>
   $('#dept').on('change', function() {
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
