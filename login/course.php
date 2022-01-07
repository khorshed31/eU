<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Enroll Course</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
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
												<button name="save" class="btn btn-info"><i class="icon-plus-sign icon-large"></i></button>

                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                    <img src="admin/images/bkash.png" alt="" width="50%">

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

					
					<?php 
                    if (isset($_POST['save'])){  
                    $s_id = $_POST['subject_id'];   
                    $user_query = mysqli_query($conn,"SELECT * FROM `teacher_class` 
                    INNER JOIN `subject` ON `subject`.`subject_id` = `teacher_class`.`subject_id` WHERE `subject`.`subject_id`= '$s_id'");
                    while($row = mysqli_fetch_array($user_query)){
                    $id = $row['teacher_class_id'];
                    $t_id = $row['teacher_id'];
                             
                    $sql_u = "SELECT * FROM teacher_class_student WHERE subject_id='$s_id' AND student_id='$session_id'";
                    $res_u = mysqli_query($conn, $sql_u);
                    if (mysqli_num_rows($res_u) > 0) {
                      ?>
                      <script>
                        alert('Alraedy Enroll This Course');
                        window.location = "add_course.php";

                        </script>
                        <?php
                    }else{
  mysqli_query($conn,"insert into teacher_class_student (student_id,teacher_class_id,teacher_id,subject_id) values('$session_id','$id','$t_id','$s_id')");
 }


?>
<script>
window.location = "add_course.php";
</script>
<?php
}
}
                    
?>