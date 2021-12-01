

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>


<?php $query = mysqli_query($conn,"select * from payment 
left join subject on subject.subject_id = payment.subject_id
                                                    where payment_id = '$get_id'");
					$row = mysqli_fetch_array($query);
					?>
                    <?php 
                    if(($row['pay_status'])==((1))){                
                    ?>
<div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3" style="background-color:white">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong>easyUniversity</strong>
                        <br>
                       Dhaka
                        <br>
                       Bangladesh
                        <br>
                        <abbr title="Phone">Phn:</abbr> 123456789
                    </address>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em><strong>Date: </strong><?php echo $row['date'];?></em>
                    </p>
                    <p>
                  <em><strong>Transaction ID: </strong><?php echo $row['trans_id'];?></em><br><br>
                    <em><strong>Payment By:</strong> <?php echo $row['uploaded_by'];?></em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>Receipt</h1>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Course</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-9"><em><?php echo $row['subject_title'];?></em></h4></td>
                            <td class="col-md-1 text-center"><?php echo $row['price'];?>tk</td>
                            <td class="col-md-1 text-center"><?php echo $row['price'];?>tk</td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right">
                            <p>
                                <strong>Subtotal: </strong>
                            </p>
                            <p>
                                <strong>Tax: </strong>
                            </p></td>
                            <td class="text-center">
                            <p>
                                <strong><?php echo $row['price'];?>tk</strong>
                            </p>
                            <p>
                                <strong>0.00tk</strong>
                            </p></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right"><h4><strong>Total: </strong></h4></td>
                            <td class="text-center text-danger"><h4><strong><?php echo $row['price'];?>tk</strong></h4></td>
                        </tr>
                        
                    </tbody>
                </table>
             <img src="admin/images/Logo.png" alt="" width="30%">
             <div class="text-right">
             <img src="admin/images/signeture.png" alt="" width="30%">
             </div>
            </div>
        </div>
    </div>
    <?php } else{
        echo "<h3>"."Pay First"."</h3>"."<a href='add_course.php'>"."Payment"."</a>";
    }?>