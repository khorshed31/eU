<?php
include('dbcon.php');
$teacher_id = $_POST['teacher_id'];
$subject_id = $_POST['subject_id'];
$dept_id = $_POST['dept_id'];
$query = mysqli_query($conn,"select * from teacher_class where subject_id = '$subject_id' and dept_id = '$dept_id' and teacher_id = '$teacher_id'");
$count = mysqli_num_rows($query);
if ($count > 0){ 
echo "true";
}else{

mysqli_query($conn,"insert into teacher_class (teacher_id,subject_id,dept_id,thumbnails) values('$teacher_id','$subject_id','$dept_id','admin/uploads/thumbnails.jpg')");

}
?>