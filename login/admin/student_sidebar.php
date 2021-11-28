     <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li> <a href="dashboard.php"><i class="icon-chevron-right"></i><i class="icon-home"></i>&nbsp;Dashboard</a> </li>
						<li>
                            <a href="subjects.php"><i class="icon-chevron-right"></i><i class="icon-list-alt"></i> Courses</a>
                        </li>
						<?php
                            $pay = mysqli_query($conn,"select * from payment where pay_status = '0'");
                            $count_pay = mysqli_num_rows($pay);
                            ?>
						<li class="">
                            <a href="payment.php"><i class="icon-chevron-right"></i><i class="icon-money"></i > Payment <sup class="badge badge-important"><?php echo $count_pay;?></sup></a>
                        </li>
                        <li>
                            <a href="ass_teacher.php"><i class="icon-chevron-right"></i><i class="icon-group"></i>Assign Teacher</a>
                        </li>
						<li>
                            <a href="admin_user.php"><i class="icon-chevron-right"></i><i class="icon-user"></i> Admin Users</a>
                        </li>
						<li>
                            <a href="department.php"><i class="icon-chevron-right"></i><i class="icon-building"></i> Department</a>
                        </li>
						<li  class="active">
                            <a href="students.php"><i class="icon-chevron-right"></i><i class="icon-group"></i> Students</a>
                        </li>
						<li>
                            <a href="teachers.php"><i class="icon-chevron-right"></i><i class="icon-group"></i> Teachers</a>
                        </li>
						<li>
                            <a href="downloadable.php"><i class="icon-chevron-right"></i><i class="icon-download"></i> Downloadable Materials</a>
                        </li>
						<li>
                            <a href="assignment.php"><i class="icon-chevron-right"></i><i class="icon-upload"></i> Uploaded Assignments</a>
                        </li>
						<li>
                            <a href="content.php"><i class="icon-chevron-right"></i><i class="icon-file"></i> Content</a>
                        </li>
						<li>
                            <a href="user_log.php"><i class="icon-chevron-right"></i><i class="icon-file"></i> User Log</a>
                        </li>
						<li>
                            <a href="activity_log.php"><i class="icon-chevron-right"></i><i class="icon-file"></i> Activity Log</a>
                        </li>
						
						<li class="">
                            <a href="calendar_of_events.php"><i class="icon-chevron-right"></i><i class="icon-calendar"></i>Calendar of Events</a>
                        </li>
                    </ul>
					
					
				
                </div>