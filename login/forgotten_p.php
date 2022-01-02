<?php include('header.php'); ?>

<?php 

include('admin/dbcon.php');
if(isset($_POST["login"])){
$email = $_POST['em'];
$hints = $_POST['hints'];
/* student */
    $query = "SELECT * FROM student WHERE email='$email' AND hints='$hints'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    $num_row = mysqli_num_rows($result);

    if( $num_row < 0 ) { 
		echo '<span style="color:red">'.'Incorrect Information'.'</span>';	
		}

}
        
?>




?>
<style>
	body#login::before {
    content: "";
    background: #00000036;
    position: absolute;
    top: 0;
    /* z-index: 1; */
    left: 0;
    width: 100%;
    height: 100%;
}
	
</style>
<body id="login">
    <div class="container" style="position: relative">
		<div class="row-fluid">
			
			<form id="login_form1" class="form-signin" method="post">
						<h3 class="form-signin-heading"><i class="icon-lock"></i> Forgotten Password</h3>
						<input type="text" class="input-block-level" name="em" placeholder="Email" required>
						<input type="text" class="input-block-level" name="hints" placeholder="Password Hints" required>
						
						<button data-placement="right" title="Click Here to Sign In" id="signin" name="login" class="btn btn-info" type="submit"><i class="icon-signin icon-large"></i> Submit</button>	
                        <a href="index.php" class="btn btn-success">Login</a><br><br>
                        Your Password:
                        <?php if(isset($_POST["login"]) && $num_row > 0){ ?>
                        <strong style="color:green"><?php echo $row['password']?></strong>
                        <?php } else { 
		echo '<span style="color:red">'.'Incorrect Information'.'</span>';;	
		}?>
			</form>
            
		</div>
		
			
		
			<?php include('footer.php'); ?>
    </div>
<?php include('script.php'); ?>
</body>
</html>