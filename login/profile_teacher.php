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
								$teacher_query = mysqli_query($conn,"select * from teacher");
								$teacher_query_row = mysqli_fetch_array($teacher_query);
								?>
								<li><a href="#"><b>Profile</b></a><span class="divider">/</span></li>
								<li><a href="#">Teacher Name: <b><?php echo $teacher_query_row['firstname']; ?></b></a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
										<div class="alert alert-info"><i class="icon-info-sign"></i> About Me</div>
								<?php $query= mysqli_query($conn,"select * from teacher where teacher_id = '$session_id'");
								$row = mysqli_fetch_array($query);
						?>
  									<?php echo $row['about']; ?>
						
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