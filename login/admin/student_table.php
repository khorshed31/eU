	<?php include('dbcon.php'); ?>
	<form action="delete_student.php" method="post">
	<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
	<a data-toggle="modal" href="#student_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
	<div class="pull-right">
			    <!-- <ul class="nav nav-pills">
				<li class="active">
					<a href="students.php">All</a>
				</li>
				<li class="">
					<a href="unreg_students.php">Unregistered</a>
				</li>
				<li class="">
				<a href="reg_students.php">Registered</a>
				</li>
				</ul> -->
	</div>
	<?php include('modal_delete.php'); ?>
		<thead>
		<tr>
					<th></th>
				
					<th>Name</th>
					<th>ID Number</th>
					<th>University</th>
					<th>Email</th>
					
		</tr>
		</thead>
		<tbody>
			
		<?php
	$query = mysqli_query($conn,"select * from student");
	while ($row = mysqli_fetch_array($query)) {
		$id = $row['student_id'];
		?>
	
		<tr>
		<td width="30">
		<input id="optionsCheckbox" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
		</td>
	
		<td width="45%"><img src="<?php echo $row['location'];?>" width="7%" alt="" class="img-circle"> <?php echo $row['firstname'] . " " . $row['lastname']; ?></td> 
		<td><?php echo $row['username']; ?></td> 
		<td><?php echo $row['versity']; ?></td> 
		<td><?php echo $row['email']; ?></td> 
	
		<!-- <td width="30"><a href="edit_student.php<?php //echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil"></i> </a></td> -->
	
		</tr>
	<?php } ?>    
	
		</tbody>
	</table>
	</form>