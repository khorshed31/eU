<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar_teacher.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('teacher_sidebar.php'); ?>
                <div class="span6" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->
						
									
					     <ul class="breadcrumb">
						<?php
						$st = $_POST['title'];
						
						$teacher_query = mysqli_query($conn,"select * from subject where  subject_title = '$st'");
						$teacher_query_row = mysqli_fetch_array($teacher_query);
						$teacher = $teacher_query_row['subject_title'];
						?>
							<li><a href="#"><b>My Course</b></a><span class="divider">/</span></li>
							<li><a href="#"><?php echo $teacher_query_row['subject_title']; ?></a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								
  										<ul	 id="da-thumbs" class="da-thumbs">
										<?php $query = mysqli_query($conn,"select * from teacher_class
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										where teacher_id = '$session_id' ");
										while($row = mysqli_fetch_array($query)){
										$id = $row['teacher_class_id'];
				
										?>
											<li>
												<a href="my_students.php<?php echo '?id='.$id; ?>">
														<img src ="<?php echo $row['thumbnails'] ?>" width="124" height="140" class="img-polaroid">
													<div>
													<span>
													<p><?php echo $row['subject_title']; ?></p>
													
													</span>
													</div>
												</a>
												<p class="class"><?php echo $row['subject_title']; ?></p>
												<p class="subject"><?php echo $row['subject_code']; ?></p>
												<a  href="#<?php echo $id; ?>" data-toggle="modal"><i class="icon-trash"></i> Remove</a>	
											
											</li>
										<?php include("delete_class_modal.php"); ?>

			
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