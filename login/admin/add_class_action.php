<?php
include('dbcon.php');
$teacher_id = $_POST['teacher_id'];
$subject_id = $_POST['subject_id'];
$dept_id = $_POST['dept_id'];
$sql_u = "SELECT * FROM teacher_class WHERE subject_id='$subject_id'";
                    $res_u = mysqli_query($conn, $sql_u);
                    if (mysqli_num_rows($res_u) > 0) {
                      echo "true";
                    }
else {

mysqli_query($conn,"insert into teacher_class (teacher_id,subject_id,dept_id,thumbnails) values('$teacher_id','$subject_id','$dept_id','admin/uploads/thumbnails.jpg')");

}
?>