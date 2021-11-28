<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
    <body>
    <?php include('navbar_student.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
            <?php include('enroll_sidebar.php'); ?>
				<div class="span3" id="adduser">
				<?php include('course.php'); ?>		   			
				</div>
                <div class="span6" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Enroll Courses List</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<a data-toggle="modal" href="#subject_delete" id="delete"  class="btn btn-danger" name="delete_user"><i class="icon-trash icon-large"></i></a>
									<?php include('modal_delete.php'); ?>
										<thead>
										  <tr>
												<th></th>
												<th>Courses</th>
                                                <th>Teacher</th>
												<th>Price</th>
												<th>Payment</th>
										   </tr>
										</thead>
										<tbody>
													<?php
													$user_query = mysqli_query($conn,"select * from teacher_class_student
                                                    LEFT JOIN teacher_class ON teacher_class.teacher_class_id = teacher_class_student.teacher_class_id 
                                                    LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
                                                    LEFT JOIN teacher ON teacher.teacher_id = teacher_class.teacher_id
													LEFT JOIN payment ON payment.subject_id = teacher_class_student.subject_id
                                                    where teacher_class_student.student_id = '$session_id'");
													while($row = mysqli_fetch_array($user_query)){
													?>
									
												<tr>
												<td width="30">
												<input id="optionsCheckbox" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
												</td>
												<td><?php echo $row['subject_title']; ?></td>
											    <td><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></td>
												<td><?php echo $row['price']; ?></td>
													
													 <td><?php if(($row['pay_status'])==((1)))
                                                   { ?>
													<span class="badge badge-info">Payment Complete</span>
													<?php } else {?>
														<a href="add_payment.php" class="btn btn-success"><i class="icon-money"></i> </a>
													<?php } ?></td>
												<!-- <td width="30"><a href="add_payment.php" class="btn btn-success"><i class="icon-money"></i> </a></td> -->
												</tr>
                                                
												<?php include("delete_course.php");} ?>
										</tbody>
									</table>
									<h4 class="alert alert-success"><strong>Bkash,Nagad: <span style="color:blue">+088 01303 713906</span></strong></h4>
									</form>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>

</html>