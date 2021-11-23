<?php
include('dbcon.php');

$dept_id = $_POST['dep_id'];


    $sql = mysqli_query($conn,"SELECT * FROM subject WHERE dept_id='$dept_id'");
    ?>
    <select name="subject_id" id="course" class="course form-control" required>
        <option value="">Select Course</option>
    
    <?php
     while ($row = mysqli_fetch_assoc($sql)) {
         ?>
         <option value="<?php echo $row['subject_id'];?>"><?php echo $row['subject_title'];?></option>
         <?php
     }
    ?>
    </select>
    <?php

?>