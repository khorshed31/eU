<?php
include('../connect.php');

$dept_id = $_POST['dep_id'];


    $sql = mysqli_query($conn,"SELECT * FROM course WHERE dept_id='$dept_id' ORDER BY courseName");
    ?>
    <select name="course" id="course" class="course form-control" required>
        <option value="">Select Course</option>
    
    <?php
     while ($row = mysqli_fetch_assoc($sql)) {
         ?>
         <option value="<?php echo $row['courseCode'];?>"><?php echo $row['courseName'];?></option>
         <?php
     }
    ?>
    </select>
    <?php

?>