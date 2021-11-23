			
						<?php include('../header_dashboard.php'); ?>
						<ol	 id="da-thumbs" class="da-thumbs">
										<?php $query = mysqli_query($conn,"select * from teacher_class
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										LEFT JOIN teacher ON teacher.teacher_id = teacher_class.teacher_id");
										$count = mysqli_num_rows($query);
										
										if ($count > 0){
										while($row = mysqli_fetch_array($query)){
										$id = $row['teacher_class_id'];
										$sub_id = $row['subject_id'];
				
										?>
											<li id="del<?php echo $id; ?>">
												
													<div>
													<span>Teacher: <strong><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></strong></span><br>
													
												Course Name: <strong class="class"><?php echo $row['subject_title']; ?></strong><br>
												Course Code:<strong class="subject"><?php echo $row['subject_code']; ?></strong><br>
												<a href="#<?php echo $id; ?>" data-toggle="modal"><i class="icon-trash"></i> Remove</a>	<br>
											</div>
											</li>
										<?php include("../delete_class_modal.php"); ?>
									<?php } }else{ ?>
									<div class="alert alert-info"><i class="icon-info-sign"></i> No Class Currently Added</div>
									<?php  } ?>
									</ol>