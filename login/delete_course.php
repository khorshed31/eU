<?php
include('dbcon.php');
if (isset($_POST['delete_subject'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	mysqli_query($conn,"DELETE FROM teacher_class_student where teacher_class_student_id='$id[$i]'");
}
?><script>
	window.location = 'add_course.php';
</script>
<?php
}
?>