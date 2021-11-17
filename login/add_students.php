   <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div style=" color:black;" class="muted pull-left"><h3><strong>Registation As Student</strong></h3></div><hr>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form id="add_student" method="post">
								
								        <div class="control-group">
                                   
                                          <div class="controls">
                                            <select  name="class_id" class="" required>
                                             	<option></option>
											<?php
											$cys_query = mysqli_query($conn,"select * from class order by class_name");
											while($cys_row = mysqli_fetch_array($cys_query)){
											
											?>
											<option value="<?php echo $cys_row['class_id']; ?>"><?php echo $cys_row['class_name']; ?></option>
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>
								        <?php 
										function applicationID(){
											$string = (uniqid(rand(), true));
											return substr($string, 0,5);
											}
												
											$applicationID = applicationID();	
										
										
										?>
										<div class="control-group">
                                          <div class="controls">
                                            <input name="un" readonly class="input focused" id="focusedInput" type="text" placeholder = "ID Number" value="<?php echo "$applicationID"?>"required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input name="fn" class="input focused" id="focusedInput" type="text" placeholder = "Firstname" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input  name="ln" class="input focused" id="focusedInput" type="text" placeholder = "Lastname" required>
                                          </div>
                                        </div>
								        <div class="control-group">
                                          <div class="controls">
                                            <input  name="em" class="input focused" id="focusedInput" type="email" placeholder = "Valid Email ID" required>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input  name="vr" class="input focused" id="focusedInput" type="text" placeholder = "University">
                                          </div>
                                        </div>
										<input type="password" class="input-block-level" id="password" name="password" placeholder="Password" required>
										<input type="password" class="input-block-level" id="cpassword" name="cpassword" placeholder="Re-type Password" required>
											<div class="control-group">
                                          <div class="controls">
												<!-- <button name="save" class="btn btn-info"><i class="icon-plus-sign icon-large"></i></button> -->
                                                <button id="signin" name="save" class="btn btn-info" type="submit"><i class="icon-check icon-large"></i> Sign in</button>
                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>	
			<script>
			jQuery(document).ready(function($){
				$("#add_student").submit(function(e){
					e.preventDefault();
					var password = jQuery('#password').val();
						var cpassword = jQuery('#cpassword').val();
					
					
					if (password == cpassword){
					var _this = $(e.target);
					var formData = $(this).serialize();
					$.ajax({
						type: "POST",
						url: "save_student.php",
						data: formData,
						success: function(html){
							$.jGrowl("Student Successfully  Added", { header: 'Student Added' });
							$('#studentTableDiv').load('student_table.php', function(response){
								$("#studentTableDiv").html(response);
								$('#example').dataTable( {
									"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
									"sPaginationType": "bootstrap",
									"oLanguage": {
										"sLengthMenu": "_MENU_ records per page"
									}
								} );
								$(_this).find(":input").val('');
								$(_this).find('select option').attr('selected',false);
								$(_this).find('select option:first').attr('selected',true);
							});
						}
					});
				}
				});
			});
			</script>		
<a onclick="window.location='index.php'" id="btn_login" name="login" class="btn" type="submit"><i class="icon-signin icon-large"></i> Click here to Login</a>