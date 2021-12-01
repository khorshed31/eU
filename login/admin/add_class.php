						<!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <!-- <div id="" class="muted pull-left"><h4><i class="icon-plus-sign"></i> Add Course</h4></div> -->
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post" id="add_class">
								<div class="control-group">
											<label>Teacher :</label>
                                          <div class="controls">
                                            <select name="teacher_id" required>
                                             	<option> Select Teacher</option>
											<?php
											$query = mysqli_query($conn,"select * from teacher");
											while($row = mysqli_fetch_array($query)){
											
											?>
											<option value="<?php echo $row['teacher_id']; ?>"><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></option>
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>

										<div class="control-group">
											<label>Department :</label>
                                          <div class="controls">
                                            <select name="dept_id"  class="dept" required>
                                             	<option> Select Department</option>
											<?php
											$query = mysqli_query($conn,"select * from department");
											while($row = mysqli_fetch_array($query)){
											
											?>
											<option value="<?php echo $row['dept_id']; ?>"><?php echo $row['department_name']; ?></option>
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>
										
										<div class="control-group">
											<label>Course:</label>
                                          <div class="controls">
                                            <select name="subject_id" id="course" class="course" required>
                                             	<option> Select Course</option>
											    <option value=""></option>
                                            </select>
                                          </div>
                                        </div>
										
											<div class="control-group">
                                          <div class="controls">
												<button name="save" class="btn btn-success"><i class="icon-save"></i> Save</button>
                                          </div>
                                        </div>
                                </form>
								
            <script>
			jQuery(document).ready(function($){
				$("#add_class").submit(function(e){
					e.preventDefault();
					var _this = $(e.target);
					var formData = $(this).serialize();
					$.ajax({
						type: "POST",
						url: "add_class_action.php",
						data: formData,
						success: function(html){
						if(html=="true")
						{
						$.jGrowl("Course Already Assign", { header: 'Assign Course Failed' });
						}else{
							$.jGrowl("Assign Successfully  Added", { header: 'Course Added' });
							var delay = 500;
							setTimeout(function(){ window.location = 'ass_teacher.php'  }, delay);  
						}
						}
					});
				});
			});
			</script>
			<script>
				$('.dept').on('change', function() {
        var dept_id = this.value;
        $.ajax({
          url: 'course_sql.php',
          type: "POST",
          data: {
            dep_id : dept_id
          },
          success: function(result){
            $('#course').html(result);
          }
        });
   });
			</script>		

								</div>
                            </div>
                        </div>
                        <!-- /block -->
						
