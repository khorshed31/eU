<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
    <body>
    <?php include('navbar_student.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
            <?php include('student_sidebar.php'); ?>
				<div class="span3" id="adduser">
				<?php include('course.php'); ?>		   			
				</div>
                <div class="span6" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Enroll Courses List</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<a data-toggle="modal" href="#subject_delete" id="delete"  class="btn btn-danger" name="delete_user"><i class="icon-trash icon-large"></i></a>
									<?php include('modal_delete.php'); ?>
										<thead>
										  <tr>
												<th></th>
												<th>Courses</th>
                                                <th>Teacher</th>
											
												<th></th>
										   </tr>
										</thead>
										<tbody>
													<?php
													$user_query = mysqli_query($conn,"select * from teacher_class_student
                                                    LEFT JOIN teacher_class ON teacher_class.teacher_class_id = teacher_class_student.teacher_class_id 
                                                    LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
                                                    LEFT JOIN teacher ON teacher.teacher_id = teacher_class.teacher_id
                                                    where student_id = '$session_id'");
													while($row = mysqli_fetch_array($user_query)){
													$id = $row['teacher_class_student_id'];
													?>
									
												<tr>
												<td width="30">
												<input id="optionsCheckbox" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
												</td>
												<td><?php echo $row['subject_title']; ?></td>
											<td><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></td>
		
									
												</tr>
                                                <?php

if (isset($_POST['delete_user'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	mysqli_query($conn,"DELETE FROM teacher_class_student where teacher_class_student_id='$id[$i]'");
}
header("location: add_course.php");
}
?>
												<?php } ?>
										</tbody>
									</table>
									</form>
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