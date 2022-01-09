<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
    <body id="class_div">
		<?php include('navbar_teacher.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('teacher_sidebar.php'); ?>
                <div class="span6" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->	
					     <ul class="breadcrumb">
						 <ul class="breadcrumb">
								<?php
								$teacher_query = mysqli_query($conn,"select * from teacher where teacher_id='$session_id'");
								$teacher_query_row = mysqli_fetch_array($teacher_query);
								?>
								<li><a href="#"><b>My Course</b></a><span class="divider">/</span></li>
								<li><a href="#">Teacher Name: <b><?php echo $teacher_query_row['firstname']; ?></b></a></li>
						</ul>
							
						 <!-- end breadcrumb -->
                        <!-- block -->
                        <div class="block">
								<div class="navbar navbar-inner block-header">
									<div id="count_class" class="muted pull-right"></div>
								</div>
                            <div class="block-content collapse in">
                                <div class="span12">
										<?php include('teacher_class.php'); ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
									<script type="text/javascript">
									$(document).ready( function() {
										$('.remove').click( function() {
										var id = $(this).attr("id");
											$.ajax({
											type: "POST",
											url: "delete_class.php",
											data: ({id: id}),
											cache: false,
											success: function(html){
											$("#del"+id).fadeOut('slow', function(){ $(this).remove();}); 
											$('#'+id).modal('hide');
											$.jGrowl("Your Class is Successfully Deleted", { header: 'Class Delete' });
											}
											}); 	
											return false;
										});				
									});
									</script>
                </div>
				
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>