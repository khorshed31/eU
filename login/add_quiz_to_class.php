<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<body>
		<?php include('navbar_teacher.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('quiz_sidebar_teacher.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->	
						<ul class="breadcrumb">
									<?php
										$teacher_query = mysqli_query($conn,"select * from teacher");
										$teacher_query_row = mysqli_fetch_array($teacher_query);
								    ?>
										<li><a href="#"><b>My Course</b></a><span class="divider">/</span></li>
										<li><a href="#">Teacher: <?php echo $teacher_query_row['firstname']; ?></a><span class="divider">/</span></li>
										<li><a href="#"><b>Quiz</b></a></li>
						</ul>
						 <!-- end breadcrumb -->
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-right"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<div class="pull-right">
									<a href="teacher_quiz.php" class="btn btn-info"><i class="icon-arrow-left"></i> Back</a>
									</div>
								
									    <form class="form-horizontal" method="post">
										<div class="control-group">
											<label class="control-label" for="inputEmail">Quiz</label>
											<div class="controls">
											<select name="quiz_id">
											<option></option>
												<?php  $query = mysqli_query($conn,"select * from quiz where teacher_id = '$session_id'");
												while ($row = mysqli_fetch_array($query)){ $id = $row['quiz_id']; ?>
												<option value="<?php echo $id; ?>"><?php echo $row['quiz_title']; ?></option>
												<?php } ?>
											</select>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Test Time (in minutes)</label>
											<div class="controls">
											<input type="text" class="span3" name="time" id="inputPassword" placeholder="Test Time" required>
											</div>
										</div>
		
												<table class="table" id="question">
                <th></th>
                <th>Class</th>
                <th>Subject</th>
                <th></th>
				
				<tbody>
					<?php $query = mysqli_query($conn,"select * from teacher_class
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										where teacher_id = '$session_id' ");
										$count = mysqli_num_rows($query);
										

										while($row = mysqli_fetch_array($query)){
										$id = $row['teacher_class_id'];
				
										?>
					<tr>
					<td width="30">
						<input id="optionsCheckbox" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
					</td>
					<td><?php echo $row['subject_title']; ?></td>
					<td><?php echo $row['subject_code']; ?></td>
					</tr>
					<?php } ?>
				</tbody>
				</table>
		
											
										<div class="control-group">
										<div class="controls">
										
										<button name="save" type="submit" class="btn btn-info"><i class="icon-save"></i> Save</button>
										</div>
										</div>
										</form>
										
									
										
										<?php
										if (isset($_POST['save'])){
											$quiz_id = $_POST['quiz_id'];
											$time = $_POST['time'] * 60;
											$id=$_POST['selector'];
											
													$name_notification  = 'Add Practice Quiz file';
													
											$N = count($id);
											for($i=0; $i < $N; $i++)
											{
												mysqli_query($conn,"insert into class_quiz (teacher_class_id,quiz_time,quiz_id) values('$id[$i]','$time','$quiz_id')");
												mysqli_query($conn,"insert into notification (teacher_class_id,notification,date_of_notification,link) value('$id[$i]','$name_notification',NOW(),'student_quiz_list.php')");
											} ?>
											<script>
												window.location = 'teacher_quiz.php';
											</script>
											<?php
										}
										?>
								
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