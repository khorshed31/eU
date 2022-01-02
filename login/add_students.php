<style>
	#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 12px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
</style>



<?php
include('dbcon.php');

if(isset($_POST["save"])){

	$un = $_POST['un'];
	$fn = $_POST['fn'];
	$ln = $_POST['ln'];
	$em = $_POST['em'];
	$vr = $_POST['vr'];
	$password = $_POST['password'];
	$hints = $_POST['passhints'];
//check if email already exist
$sql_u = "SELECT * FROM student WHERE email='$em'";
$res_u = mysqli_query($conn, $sql_u);
if (mysqli_num_rows($res_u) > 0) {
  ?>
<p><h4><?php echo "<p> <font color=red font face='arial' size='3pt'>Email already exist</font> </p>"; ?></h4>  </p> 
<?php
}else{

               mysqli_query($conn,"insert into student (username,firstname,lastname,email,password,hints,versity,location,status)
		values ('$un','$fn','$ln','$em','$password','$hints','$vr','uploads/NO-IMAGE-AVAILABLE.jpg','Unregistered')                                    
		") ?>
	<h4><?php echo "<p> <font color=white font face='arial' size='3pt'>Student Registstion Successfully</font> </p>"; ?></h4>  </p>	
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
										                        <input type="password" class="input focused" id="password" name="password" placeholder="Password" 
																pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"required><br>
																<input type="checkbox" onclick="myFunction()">Show Password
                                          </div>
										  <div id="message">
											<h6>Password must contain the following:</h6>
											<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
											<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
											<p id="number" class="invalid">A <b>number</b></p>
											<p id="length" class="invalid">Minimum <b>8 characters</b></p>
											</div>
                                        </div>
										<div class="controls">
										                        <input type="text" class="input focused" id="passhints" name="passhints" placeholder="Password Hints" required><br>
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
						function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
					</script>
					<script>
						function myFunction1() {
  var x = document.getElementById("cpassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
					</script>
					<script>
var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>

                    
<a onclick="window.location='index.php'" id="btn_login" name="login" class="btn" type="submit"><i class="icon-signin icon-large"></i> Click here to Login</a>