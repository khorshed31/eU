<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
    <body id="class_div">
    <?php include('navbar_student.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
            <?php include('pay_sidebar.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->	
					 
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="count_class" class="muted pull-right">

								</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span4">
										<form class="" id="add_payment" method="post" enctype="multipart/form-data" name="upload" >
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">Payment ScreenShot:</label>
                            <div class="controls">
				
									
								<input name="uploaded_file" id="fileInput" type="file" required>
                         
                                <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                                <input type="hidden" name="id" value="<?php echo $session_id ?>"/>
                            </div>
                        </div>
						<div class="control-group">
											<label>Payment Method :</label>
                                          <div class="controls">
                                            <select name="method" required>
                                             	<option> Select Payment Method</option>
											    <option value="Bkash">Bkash</option>
												<option value="Nagad">Nagad</option>
                                            </select>
                                          </div>
                                        </div>
						<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" id="focusedInput" name="trans" type="text" placeholder = "Transaction ID" required>
                                          </div>
                                        </div>
                        <div class="control-group">
											<label>Course :</label>
                                          <div class="controls">
                                            <select name="course" required>
                                             	<option> Select Course</option>
											<?php
											$query = mysqli_query($conn,"select * from teacher_class_student 
                                            LEFT JOIN subject ON subject.subject_id = teacher_class_student.subject_id
                                            where student_id = '$session_id'");
											while($row = mysqli_fetch_array($query)){
											$s_id = $_POST['course'];
											?>
											<option value="<?php echo $row['subject_id']; ?>"><?php echo $row['subject_title']; ?>(<?php echo $row['price'];?>)</option>
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>
										
					
											<script>
			jQuery(document).ready(function($){
				$("#add_payment").submit(function(e){
					$.jGrowl("Uploading File Please Wait......", { sticky: true });
					e.preventDefault();
					var _this = $(e.target);
					var formData = new FormData($(this)[0]);
					$.ajax({
						type: "POST",
						url: "add_payment_save.php",
						data: formData,
						success: function(html){
							// console.log(html)
							// return false
							$.jGrowl("Student Successfully  Pay", { header: 'Payment' });
							setTimeout(function(){
								window.location = 'add_payment.php';
							},2000)
						},
						cache: false,
						contentType: false,
						processData: false
					});
				});
			});
			</script>	
	
	
									</div>
									<div class="span8">
											
			<div class="alert alert-info">Make payment then upload screenshot.</div>
					
											<table cellpadding="0" cellspacing="0" border="0" class="table" id="">

                                            <thead>
										        <tr>
												<th>Date Upload</th>
												<th>Course</th>
												<th>Transaction ID </th>
												<th>Method </th>
												<th>Uploaded by</th>
												<th>Show</th>
												<!-- <th>Status</th> -->
												</tr>
												
										</thead>
										<tbody>
											
                                        <?php
										$query = mysqli_query($conn,"select * from payment
                                        LEFT JOIN subject ON subject.subject_id = payment.subject_id
                                        where student_id = '$session_id'");
										while($row = mysqli_fetch_array($query)){
										$id  = $row['payment_id'];
									?> 
									<?php if(($row['pay_status'])==((1))){?>                             
										<tr id="del<?php echo $id; ?>" style="background-color: #6dc959;">
									
										 <td><?php echo $row['date']; ?></td>
                                         <td><?php echo $row['subject_title']; ?></td>   
										 <td><?php echo $row['trans_id']; ?></td> 
										 <td><?php echo $row['method']; ?></td>                                   
                                         <td><?php echo $row['uploaded_by']; ?></td>                                      
                                         <td width="40">
										 <a  data-placement="bottom" title="Show Image" id="<?php echo $id; ?>download" href="<?php echo $row['pay_image']; ?>" target="_blank"><i class="icon-download icon-large"></i></a>
										 <?php include('delete_download_modal.php'); ?>
										 </td>                                      
                             
														<script type="text/javascript">
														$(document).ready(function(){
															$('#<?php echo $id; ?>download').tooltip('show');
															$('#<?php echo $id; ?>download').tooltip('hide');
														});
														</script>			
                               
                                
								<td><?php if(($row['pay_status'])==((1)))
                                                   { ?>
													<span class="badge badge-info">Payment Complete</span>
													<a href="pay_status.php<?php echo '?id='.$id; ?>" class="btn btn-info" target="_blank">Receipt</a>
													<?php } else {?>
														<span class="badge badge-info">Panding Payment</span>
													<?php } ?></td>
                         </tr>
						 
							
						   <?php }?>
						   <?php if(($row['pay_status'])==((0))){?>                             
										<tr id="del<?php echo $id; ?>" style="background-color: #f75e5e;">
									
										 <td><?php echo $row['date']; ?></td>
                                         <td><?php echo $row['subject_title']; ?></td>   
										 <td><?php echo $row['trans_id']; ?></td> 
										 <td><?php echo $row['method']; ?></td>                                   
                                         <td><?php echo $row['uploaded_by']; ?></td>                                      
                                         <td width="40">
										 <a  data-placement="bottom" title="Show Image" id="<?php echo $id; ?>download" href="<?php echo $row['pay_image']; ?>" target="_blank"><i class="icon-download icon-large"></i></a>
										 <?php include('delete_download_modal.php'); ?>
										 </td>                                      
                             
														<script type="text/javascript">
														$(document).ready(function(){
															$('#<?php echo $id; ?>download').tooltip('show');
															$('#<?php echo $id; ?>download').tooltip('hide');
														});
														</script>			
                               
                                
								<td><?php if(($row['pay_status'])==((1)))
                                                   { ?>
													<span class="badge badge-info">Payment Complete</span>
													<a href="pay_status.php<?php echo '?id='.$id; ?>" class="btn btn-info" target="_blank">Receipt</a>
													<?php } else {?>
														<span class="badge badge-info">Panding Payment</span>
													<?php } ?></td>
                         </tr>
						 
							
						   <?php } }?>
                              
										</tbody>
									</table>
						
									
                                </div>
								<div class="span10">
								<hr>
									<center>
									<div class="control-group">
												<div class="controls">
													<button name="Upload" type="submit" value="Upload" class="btn btn-success" /><i class="icon-upload-alt"></i>&nbsp;Upload</button>
                                                    <h4 class="alert alert-success"><strong>Bkash,Nagad: <span style="color:blue">+088 01303 713906</span></strong></h4>
												</div>
									</div>
									</center>
             
						       </form>		
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					<img src="admin/images/bkash.png" alt="" width="20%">

                </div>
				
	
            </div>
			
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>