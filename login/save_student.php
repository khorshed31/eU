<?php
include('dbcon.php');
        
               $un = $_POST['un'];
               $fn = $_POST['fn'];
               $ln = $_POST['ln'];
               $em = $_POST['em'];
               $vr = $_POST['vr'];
               $password = $_POST['password'];
               $class_id = $_POST['class_id'];

               mysqli_query($conn,"insert into student (username,firstname,lastname,password,email,versity,location,class_id,status)
		values ('$un','$fn','$ln','$password','$em','$vr','uploads/NO-IMAGE-AVAILABLE.jpg','$class_id','Unregistered')                                    
		") ?>
<?php    ?>