<?php include('header.php'); ?>
<?php include('session.php'); ?>

<?php
date_default_timezone_set('Asia/Dhaka');
$current_date = date('Y-m-d H:i:s');

	 // for Cancel admission    	
if(isset($_GET['id']))
{
$id=intval($_GET['id']);

mysqli_query($conn,"update payment set pay_status='0' where payment_id='$id'");
header("location: payment.php");
}

// for admit user
if(isset($_GET['uid']))
{
$uid=intval($_GET['uid']);

mysqli_query($conn,"update payment set pay_status='1' where payment_id='$uid'");
header("location: payment.php");

}
?>