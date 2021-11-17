   <div class="row-fluid">
       <a href="class.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add Courses</a>
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Edit Course</div>
                            </div>
							<?php
							$query = mysqli_query($conn,"select * from class where class_id = '$get_id'");
							$row = mysqli_fetch_array($query);
							?>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
										<div class="control-group">
                                          <div class="controls">
                                            <input name="class_name" value="<?php echo $row['class_name']; ?>" class="input focused" id="focusedInput" type="text" placeholder = "Course Name" required>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                   
                                          <div class="controls">
                                            <select  name="dept_id" class="" required>
                                             	<option value="">Select Department ID </option>
											<?php
											$cys_query = mysqli_query($conn,"select * from department order by department_name");
											while($cys_row = mysqli_fetch_array($cys_query)){
											
											?>
											<option value="<?php echo $cys_row['dept_id']; ?>"><?php echo $cys_row['dept_id']; ?></option>
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <div class="controls">
                                            <input name="price" value="<?php echo $row['price']; ?>" class="input focused" id="focusedInput" type="text" placeholder = "Price" required>
                                          </div>
                                        </div>

										
									
											<div class="control-group">
                                          <div class="controls">
												<button name="update" class="btn btn-success"><i class="icon-save icon-large"></i></button>

                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div><?php
if (isset($_POST['update'])){
$class_name = $_POST['class_name'];
$dept_id = $_POST['dept_id'];
$price = $_POST['price'];
mysqli_query($conn,"update class set class_name = '$class_name', dept_id = '$dept_id', price = '$price' where class_id = '$get_id' ");
?>

<script>
window.location = "class.php";
</script>
<?php

}
?>