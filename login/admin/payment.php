<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('payment_sidebar.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Payment File Uploaded List</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
						
										<thead>
										        <tr>

												<th>Course</th>
                                                <th>Price</th>
												<th>Date Upload</th>
												<th>Upload By</th>
                                                <th>Transaction ID</th>
                                                <th>Method</th>
												<th>Show Payment SS</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                   
												</tr>
												
										</thead>
										<tbody>
											
                              		<?php
										$query = mysqli_query($conn,"select * from payment
                                        LEFT JOIN subject ON subject.subject_id = payment.subject_id
                                        LEFT JOIN student ON student.student_id = payment.student_id order by payment_id desc");
										while($row = mysqli_fetch_array($query)){
                                         $pay = $row['pay_status'];
                                         
									?>
                                        <?php if(($row['pay_status'])==((1))){?>
                                            <tr style="background-color: #6dc959;">

                                         <td><?php  echo $row['subject_title']; ?></td>
                                         <td><?php echo $row['price']; ?></td>
                                         <td><?php echo $row['date']; ?></td>
                                         <td><?php echo $row['uploaded_by'];?></td>
                                         <td><?php echo $row['trans_id'];?></td>
                                         <td><?php echo $row['method'];?></td>
                                         <td>
										 <a  data-placement="bottom" title="Download" id="<?php echo $id; ?>download" href="../<?php echo $row['pay_image']; ?>" target="_blank"><i class="icon-download icon-large"></i></a>
										 <?php include('../delete_download_modal.php'); ?>
										 </td>                                      
                             
														<script type="text/javascript">
														$(document).ready(function(){
															$('#<?php echo $id; ?>download').tooltip('show');
															$('#<?php echo $id; ?>download').tooltip('hide');
														});
														</script>
                                          <td><?php if(($row['pay_status'])==((1)))
{ ?>
                          <span class="badge badge-info">Payment Complete</span>
                          <?php } else {?>
                          <span class="badge badge-secondry">Payment Not Ready</span>
                        <?php } ?></td>
                        <td><span class="style6">
                          <?php if(($row['pay_status'])==((1)))
{ ?>
<a href="admit_payment.php?id=<?php echo $row['payment_id'];?>" ><button class="btn btn-danger">Cancel</button> </a> 
                          <?php } else {?>
<a href="admit_payment.php?uid=<?php echo $row['payment_id'];?>" ><button class="btn btn-info">Admit</button> </a> 
                         <?php } ?>
					   <!-- <a href="delete-user.php?id=<?php //echo $row['id'];?>" onClick="return deldata('<?php //echo $row['name']; ?>');">Delete </a> -->

                     </span></td>              

                               
                                </tr>
                         
						 <?php } ?>

                         <?php if(($row['pay_status'])==((0))){?>
                                        <tr style="background-color: #f75e5e;">

                                         <td><?php  echo $row['subject_title']; ?></td>
                                         <td><?php echo $row['price']; ?></td>
                                         <td><?php echo $row['date']; ?></td>
                                         <td><?php echo $row['uploaded_by'];?></td>
                                         <td><?php echo $row['trans_id'];?></td>
                                         <td><?php echo $row['method'];?></td>
                                         <td>
										 <a  data-placement="bottom" title="Download" id="<?php echo $id; ?>download" href="../<?php echo $row['pay_image']; ?>" target="_blank"><i class="icon-download icon-large"></i></a>
										 <?php include('../delete_download_modal.php'); ?>
										 </td>                                      
                             
														<script type="text/javascript">
														$(document).ready(function(){
															$('#<?php echo $id; ?>download').tooltip('show');
															$('#<?php echo $id; ?>download').tooltip('hide');
														});
														</script>
                                          <td><?php if(($row['pay_status'])==((1)))
{ ?>
                          <span class="badge badge-info">Payment Complete</span>
                          <?php } else {?>
                          <span class="badge badge-secondry">Payment Not Ready</span>
                        <?php } ?></td>
                        <td><span class="style6">
                          <?php if(($row['pay_status'])==((1)))
{ ?>
<a href="admit_payment.php?id=<?php echo $row['payment_id'];?>" ><button class="btn btn-danger">Cancel</button> </a> 
                          <?php } else {?>
<a href="admit_payment.php?uid=<?php echo $row['payment_id'];?>" ><button class="btn btn-info">Admit</button> </a> 
                         <?php } ?>
					   <!-- <a href="delete-user.php?id=<?php //echo $row['id'];?>" onClick="return deldata('<?php //echo $row['name']; ?>');">Delete </a> -->

                     </span></td>              

                               
                                </tr>
                         
						 <?php } }?>
						   
                              
										</tbody>
									</table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->


                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Enroll Courses Uploaded List</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
						
										<thead>
										        <tr>

												<th>Course</th>
												<th>Student</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                   
												</tr>
												
										</thead>
										<tbody>
											
                              		<?php
										$query = mysqli_query($conn,"select * from teacher_class_student
                                        LEFT JOIN subject ON subject.subject_id = teacher_class_student.subject_id
                                        LEFT JOIN student ON student.student_id = teacher_class_student.student_id order by teacher_class_student_id desc");
										while($row = mysqli_fetch_array($query)){
									?>

                                            <?php if(($row['enroll_status'])==((1))){?>
                                            <tr style="background-color: #6dc959;">
                                        <?php if($pay == 1 || $pay == 0)
{ ?>
                                         <td><?php  echo $row['subject_title']; ?></td>
                                         <td><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></td>
                                         <td>
										<?php if(($row['enroll_status'])==((1)))
{ ?>
                          <span class="badge badge-info">Enroll Complete</span>
                          <?php } else {?>
                          <span class="badge badge-secondry">Panding</span>
                        <?php } ?></td>
                        <td><span class="style6">
                          <?php if(($row['enroll_status'])==((1)))
{ ?>
<a href="admit_enroll.php?id=<?php echo $row['teacher_class_student_id'];?>" ><button class="btn btn-danger">Cancel</button> </a> 
                          <?php } else {?>
<a href="admit_enroll.php?uid=<?php echo $row['teacher_class_student_id'];?>" ><button class="btn btn-info">Admit</button> </a> 
                         <?php } ?>
					   <!-- <a href="delete-user.php?id=<?php //echo $row['id'];?>" onClick="return deldata('<?php //echo $row['name']; ?>');">Delete </a> -->

                     </span></td>              
                     <?php } }?>
                                </tr>

                                <?php if(($row['enroll_status'])==((0))){?>
                                            <tr style="background-color: #f75e5e;">
                                            <?php if($pay == 1 || $pay == 0)
{ ?>
                                         <td><?php  echo $row['subject_title']; ?></td>
                                         <td><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></td>
                                         <td>
										<?php if(($row['enroll_status'])==((1)))
{ ?>
                          <span class="badge badge-info">Enroll Complete</span>
                          <?php } else {?>
                          <span class="badge badge-secondry">Panding</span>
                        <?php } ?></td>
                        <td><span class="style6">
                          <?php if(($row['enroll_status'])==((1)))
{ ?>
<a href="admit_enroll.php?id=<?php echo $row['teacher_class_student_id'];?>" ><button class="btn btn-danger">Cancel</button> </a> 
                          <?php } else {?>
<a href="admit_enroll.php?uid=<?php echo $row['teacher_class_student_id'];?>" ><button class="btn btn-info">Admit</button> </a> 
                         <?php } ?>
					   <!-- <a href="delete-user.php?id=<?php //echo $row['id'];?>" onClick="return deldata('<?php //echo $row['name']; ?>');">Delete </a> -->

                     </span></td>              
                     <?php } ?>
                                </tr>
                         
						 <?php } }?>
						   
                              
										</tbody>
									</table>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>

</html>