<style>
	table{width: 100%;}
</style>
<table>
	<tr>
		<th>ID</th>
		<th>PIN NO</th>
		<th>SERIAL NO</th>
		<th>STATUS</th>
	</tr>
	<?php
	include("connect.php");
	$sql = "SELECT * FROM scratchcard ";
	$result = $conn->query($sql);

	if($result->num_rows>0){
		while($row = $result->fetch_assoc()) {
			echo "<tr><td>". $row["id"] ."</td><td>" . $row["pin"] ."</td><td>" . $row["serial"] ."</td><td>" . $row["status"] ."</td></tr>" ;
		}
	}
	else{
        echo "No Data Here" ;
	}
	
	?>
</table>						
						
						
						<form role="form" class="form-horizontal" method= "POST" action="">
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="email1" placeholder="PIN number" type="text" name="txtpin" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="exampleInputPassword1" placeholder="Serial Number" type="text" name="txtserial" required>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-10">
									<button type="submit" name="btnsubmit" class="btn btn-light btn-radius btn-brd grd1">Continue >></button>
								</div>
							</div>
						</form>