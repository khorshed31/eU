			
						
						<ul	 id="da-thumbs" class="da-thumbs">
										<?php $query = mysqli_query($conn,"select * from teacher_class
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										where teacher_id = '$session_id'");
										$count = mysqli_num_rows($query);
										
										if ($count > 0){
										while($row = mysqli_fetch_array($query)){
										$id = $row['teacher_class_id'];
										$sub_id = $row['subject_id'];
				
										?>
											<li id="del<?php echo $id; ?>">
												<a href="my_students.php<?php echo '?id='.$id; ?> <?php echo '?subject_id='.$sub_id; ?>">
														<img src ="<?php echo $row['thumbnails'] ?>" width="124" height="140" class="img-polaroid" alt="">
													<div>
													<span><p><?php echo $row['subject_title']; ?></p></span>
													</div>
												</a>
												<p class="class"><?php echo $row['subject_title']; ?></p>
												<p class="subject"><?php echo $row['subject_code']; ?></p>
												<a href="#<?php echo $id; ?>" data-toggle="modal"><i class="icon-trash"></i> Remove</a>	
											
											</li>
										<?php include("delete_class_modal.php"); ?>
									<?php } }else{ ?>
									<div class="alert alert-info"><i class="icon-info-sign"></i> No Class Currently Added</div>
									<?php  } ?>
									</ul>