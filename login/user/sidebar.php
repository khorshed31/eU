<?php
session_start();
error_reporting(0);
include 'header.php';
include('../connect.php');

$email = $_SESSION["uemail"];
      $sql = "select * from admission where email='$email'"; 
      $result = $conn->query($sql);
      $rowaccess = mysqli_fetch_array($result);
?>

<li class="nav-header">
                    
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li class="active">
                <a href="index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a></li>
				<li>
                    <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Profile</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="profile.php">View Profile</a></li>
					  <li><a href="edit-profile.php">Edit Profile</a></li>
  					
                    </ul>
                </li>
                <li>
                <?php if(($rowaccess['status'])==(0))
{ ?>
 <h4 style="color:red">Panding Registation...</h4>
			   <?php } else {?>
	 
				
                    <a href="student.php"><i class="fa fa-file"></i> <span class="nav-label">Apply Courses</span></a>
                </li>
			<?php } ?>
            <li><a href="enroll-history.php"><i class="fa fa-history"></i> <span class="nav-label">Course History</span></a></li>