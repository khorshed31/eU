<?php
include('dbcon.php');
if (isset($_POST['delete_user'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	mysqli_query($conn,"DELETE FROM teacher_class_student where teacher_class_student_id='$id[$i]'");
}
header("location: add_course.php");
}
?>