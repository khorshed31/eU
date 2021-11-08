<?php session_start();
include('../../connect.php');
if(!empty($_POST["cid"])) {
$cid= $_POST["cid"];
 $applicationID=$_SESSION['applicationID'];
		$result =mysqli_query($conn,"SELECT applicationID FROM 	courseenrolls WHERE course='$cid' and applicationID=' $applicationID'");
	$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> Already Applied for this course.</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} 
}
if(!empty($_POST["cid"])) {
	$cid= $_POST["cid"];
	
		$result =mysqli_query($conn,"SELECT * FROM courseenrolls WHERE course='$cid'");
		$count=mysqli_num_rows($result);
		$result1 =mysqli_query($conn,"SELECT noofSeats FROM course WHERE id='$cid'");
		$row=mysqli_fetch_array($result1);
		$noofseat=$row['noofSeats'];
if($count>=$noofseat)
{
echo "<span style='color:red'> Seat not available for this course. All Seats Are full</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} 
}

?>
