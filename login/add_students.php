<?php
include('dbcon.php');

if(isset($_POST["save"])){

	$un = $_POST['un'];
	$fn = $_POST['fn'];
	$ln = $_POST['ln'];
	$em = $_POST['em'];
	$vr = $_POST['vr'];
	$password = $_POST['password'];
//check if email already exist
$sql_u = "SELECT * FROM student WHERE email='$em'";
$res_u = mysqli_query($conn, $sql_u);
if (mysqli_num_rows($res_u) > 0) {
  ?>
<p><h4><?php echo "<p> <font color=red font face='arial' size='3pt'>'Email already exist'</font> </p>"; ?></h4>  </p> 
<?php
}else{

               mysqli_query($conn,"insert into student (username,firstname,lastname,email,password,versity,location,status)
		values ('$un','$fn','$ln','$em','$password','$vr','uploads/NO-IMAGE-AVAILABLE.jpg','Unregistered')                                    
		") ?>
	<h4><?php echo "<p> <font color=green font face='arial' size='3pt'>'Student Registstion Successfully'</font> </p>"; ?></h4>  </p>	
<?php } 

}?> 

  
 
 
 <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                            
                                <div style=" color:black;" class="muted pull-left"><h3><strong>Registation As Student</strong></h3></div><hr>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form id="add_student" method="post">
									 
								        <?php 
										function applicationID(){
											$string = (uniqid(rand(), true));
											return substr($string, 0,3);
											}
												
											$applicationID = 'eu-'.applicationID();	
										
										
										?>
										<div class="control-group">
                                          <div class="controls">
											  <label> <small>Please Remember Your ID</small></label>
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
										<div class="control-group">
                                          <div class="controls">
										                        <input type="password" class="input focused" id="password" name="password" placeholder="Password" required>
                                          </div>
                                        </div>
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
			jQuery(document).ready(function(){
			jQuery("#signin_teacher").submit(function(e){
					e.preventDefault();
						var password = jQuery('#password').val();
						var cpassword = jQuery('#cpassword').val();
					if (password == cpassword){
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "add_students.php",
						data: formData,
						success: function(html){
						if(html=='true')
						{
						$.jGrowl("Welcome to easyUniversity", { header: 'Sign up Success' });
						var delay = 1000;
							setTimeout(function(){ window.location = 'dasboard_teacher.php'  }, delay);  
						}else{
							$.jGrowl("Your data is not found in the database", { header: 'Sign Up Failed' });
						}
						}
					});
			
					}else
						{
						$.jGrowl("Your data is not found in the database", { header: 'Sign Up Failed' });
						}
				});
			});
			</script>
<a onclick="window.location='index.php'" id="btn_login" name="login" class="btn" type="submit"><i class="icon-signin icon-large"></i> Click here to Login</a>