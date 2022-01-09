<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar_student.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('student_sidebar.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->
				
									
					     <ul class="breadcrumb">
						<?php
						$student_query = mysqli_query($conn,"select * from student where student_id = '$session_id'");
						$student_query_row = mysqli_fetch_array($student_query);
						$student = $student_query_row['firstname'];
						?>
							<li><a href="#"><b>My Courses</b></a><span class="divider">/</span></li>
							<li><a href="#">Name: <?php echo $student_query_row['firstname']; ?></a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
				
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-right">
									<?php $query = mysqli_query($conn,"select * from teacher_class_student
														LEFT JOIN student ON student.student_id = teacher_class_student.student_id
														LEFT JOIN subject ON subject.subject_id = teacher_class_student.subject_id
														LEFT JOIN teacher_class ON teacher_class.teacher_class_id = teacher_class_student.teacher_class_id
														LEFT JOIN teacher ON teacher.teacher_id = teacher_class.teacher_id
														LEFT JOIN payment ON payment.subject_id = subject.subject_id
														where payment.student_id = '$session_id' and student.student_id = '$session_id' and pay_status = '1' and enroll_status = '1'");
														$count = mysqli_num_rows($query);
									?>
												Number of Courses: <span class="badge badge-info"><?php echo $count; ?></span>
								</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								
  										<ul	 id="da-thumbs" class="da-thumbs">
													<?php
														if ($count != '0'){
														while($row = mysqli_fetch_array($query)){
														$id = $row['teacher_class_id'];	
													?>
											<li>
												<a href="my_classmates.php<?php echo '?id='.$id; ?>">
														<img src ="<?php echo $row['thumbnails'] ?>" width="124" height="140" class="img-polaroid">
													<div>
													<span>
													<p><?php echo $row['subject_title']; ?></p>
													
													</span>
													</div>
												</a>
												<p class="class"><?php echo $row['subject_title']; ?></p>
												<p class="subject"><?php echo $row['subject_code']; ?></p>
												<p class="subject"><?php echo $row['firstname']." ".$row['lastname']?></p>
													
											
											</li>
								
			
									<?php }}else{ ?>
									<div class="alert alert-info"><i class="icon-info-sign"></i> You are currently not enroll to your course</div>
									<?php } ?>	
									</ul>
						
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