<?php  include('header.php'); ?>
<?php  include('session.php'); ?>
    <body>
		<?php include('navbar.php') ?>
        <div class="container-fluid">
            <div class="row-fluid">
					<?php include('sidebar_dashboard.php'); ?>
                <!--/span-->
                <div class="span9" id="content">
						<div class="row-fluid"></div>
						
                    <div class="row-fluid">
            
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Data Numbers</div>
                            </div>
                            <div class="block-content collapse in" style="background-color:cadetblue;">
							        <div class="span12">
						
									<?php 
								$pay = mysqli_query($conn,"select * from payment where pay_status = '0' ");
								$count_pay = mysqli_num_rows($pay);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_pay; ?>"><?php echo $count_pay; ?></div>
                                    <div class="chart-bottom-heading"><strong>Payment Panding</strong>

                                    </div>
                                </div>
								
								<?php 
								$pay = mysqli_query($conn,"select * from payment where pay_status = '1' ");
								$count_pay = mysqli_num_rows($pay);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_pay; ?>"><?php echo $count_pay; ?></div>
                                    <div class="chart-bottom-heading"><strong>Complete Payment</strong>

                                    </div>
                                </div>
								
										<?php 
								$query_student = mysqli_query($conn,"select * from student");
								$count_student = mysqli_num_rows($query_student);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_student ?>"><?php echo $count_student ?></div>
                                    <div class="chart-bottom-heading"><strong>Students</strong>

                                    </div>
                                </div>

                                <?php 
								$query_teacher = mysqli_query($conn,"select * from teacher");
								$count_teacher = mysqli_num_rows($query_teacher);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_teacher ?>"><?php echo $count_teacher ?></div>
                                    <div class="chart-bottom-heading"><strong>Teachers</strong>

                                    </div>
                                </div>
						
								
								
										<?php 
								$query_file = mysqli_query($conn,"select * from files");
								$count_file = mysqli_num_rows($query_file);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_file; ?>"><?php echo $count_file; ?></div>
                                    <div class="chart-bottom-heading"><strong>Downloadable File</strong>

                                    </div>
                                </div>
								
								
										<?php 
								$query_subject = mysqli_query($conn,"select * from subject");
								$count_subject = mysqli_num_rows($query_subject);
								?>

                                
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_subject; ?>"><?php echo $count_subject; ?></div>
                                    <div class="chart-bottom-heading"><strong>Courses</strong>

                                    </div>
                                </div>
						<?php 
								$query_t_c = mysqli_query($conn,"select * from teacher_class_student");
								$count_t_c = mysqli_num_rows($query_t_c);
								?>
                                <?php 
								$query_quiz = mysqli_query($conn,"select * from student_class_quiz");
								$count_quiz = mysqli_num_rows($query_quiz);
								?>
                                <?php 
								$query_log = mysqli_query($conn,"select * from user_log");
								$count_log = mysqli_num_rows($query_log);
								?>
                                <?php 
								$query_alog = mysqli_query($conn,"select * from activity_log");
								$count_alog = mysqli_num_rows($query_alog);
								?>
						
                            </div>
                            
                        </div>
                        <!-- /block -->
						




                    </div>
                    </div>
                
                
                 
                 
                </div>
            </div>
    
         <?php include('footer.php'); ?>
        </div>
	<?php include('script.php'); ?>
    </body>

</html>