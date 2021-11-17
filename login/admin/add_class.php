   <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Add Course</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
										<div class="control-group">
                                          <div class="controls">
                                            <input name="class_name" class="input focused" id="focusedInput" type="text" placeholder = "Course Name" required>
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
                                            <input name="price" class="input focused" id="focusedInput" type="text" placeholder = "Price" required>
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
                    </div><?php
if (isset($_POST['save'])){
$class_name = $_POST['class_name'];
$dept_id = $_POST['dept_id'];
$price = $_POST['price'];


$query = mysqli_query($conn,"select * from class where class_name  =  '$class_name' ");
$count = mysqli_num_rows($query);

if ($count > 0){ ?>
<script>
alert('Date Already Exist');
</script>
<?php
}else{
mysqli_query($conn,"insert into class (class_name,dept_id,price) values('$class_name','$dept_id','$price')");
?>
<script>
window.location = "class.php";
</script>
<?php
}
}
?>