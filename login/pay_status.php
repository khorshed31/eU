<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php 

// Set the new timezone
date_default_timezone_set('Asia/Dhaka');
$date = date('d-m-y h:i:s');

$get_id = $_GET['id'];
 $query = mysqli_query($conn,"select * from payment 
left join subject on subject.subject_id = payment.subject_id
left join student on student.student_id = payment.student_id
                                                    where payment_id = '$get_id'");
                               $row = mysqli_fetch_array($query);
					?>
                    

<!------ Include the above in your HEAD tag ---------->
<html>
    <head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="admin/assets/pay.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>  
    </head>
    <body>
    <div class="container">
	<div class="row">
		
        <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
    			<div class="receipt-header">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="receipt-left">
							<img class="img-responsive" alt="image" src="admin/<?php echo $row['location']; ?>" style="width: 71px; border-radius: 43px;">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 text-right">
						<div class="receipt-right">
							<h5>easyUniversity</h5>
							<p>0123456789 <i class="fa fa-phone"></i></p>
							<p>admin@gmail.com <i class="fa fa-envelope-o"></i></p>
							<p>Bangladesh<i class="fa fa-location-arrow"></i></p>
						</div>
					</div>
				</div>
            </div>
			
			<div class="row">
				<div class="receipt-header receipt-header-mid">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							<h5><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?><small>  |   ID Number : <?php echo $row['username']; ?></small></h5>
							<p><b>Email :</b> <?php echo $row['email']; ?></p>
							<p><b>University :</b> <?php echo $row['versity']; ?></p>
                            <p><b>Transaction ID :</b> <?php echo $row['trans_id']; ?></p>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4">
						<div class="receipt-left">
							<h1>Receipt</h1>
						</div>
					</div>
				</div>
            </div>
			
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Course  <i><span style="color: yellow;"><?php echo $row['subject_title']; ?></span></i></th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-9">Payment for <?php echo $row['date']; ?></td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> <?php echo $row['price']; ?> tk</td>
                        </tr>
                        <tr>
                            <td class="text-right">
                            <p>
                                <strong>Total Amount: </strong>
                            </p>
                            <p>
                                <strong>Tax: </strong>
                            </p>
							<p>
                                <strong>Payable Amount: </strong>
                            </p>
							<p>
                                <strong>Balance Due: </strong>
                            </p>
							</td>
                            <td>
                            <p>
                                <strong><i class="fa fa-inr"></i> <?php echo $row['price']; ?> tk</strong>
                            </p>
                            <p>
                                <strong><i class="fa fa-inr"></i> 00 tk</strong>
                            </p>
							<p>
                                <strong><i class="fa fa-inr"></i> 00 tk</strong>
                            </p>
							<p>
                                <strong><i class="fa fa-inr"></i> 00 tk</strong>
                            </p>
							</td>
                        </tr>
                        <tr>
                           
                            <td class="text-right"><h2><strong>Total: </strong></h2></td>
                            <td class="text-left text-danger"><h2><strong><i class="fa fa-inr"></i> <?php echo $row['price']; ?> tk</strong></h2></td>
                        </tr>
                    </tbody>
                </table>
            </div>
			
			<div class="row">
				<div class="receipt-header receipt-header-mid receipt-footer">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							<p><b>Date :</b> <?php echo $date;?></p>
							<h5 style="color: rgb(140, 140, 140);">Thank you for your Payment!</h5>
                            <img src="admin/images/Logo.png" alt=""width="50%">
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4">
						<div class="receipt-left">
							<h1>Signature</h1>
                            <img src="admin/images/signeture.png" alt="">
						</div>
					</div>
				</div>
            </div>
			
        </div>    
	</div>
</div>
   
    </body>
</html>

