<?php
 if(!isset($_SESSION))
    {
    include "./back_session.php";
        }
    $query = "SELECT * FROM staff_type WHERE staff_type_id = '$staff_type_id'";
    $result = mysqli_query($connect,$query);
    $row = mysqli_fetch_assoc($result);

?>



<div class="input_value_div" >
    <form action="./staff_type.php" method="POST">
        <div class="input-group mb-3">
            <input type="hidden" name="staff_type_id" value="<?php  echo $row['staff_type_id']; ?>">
            <input type="text" value="<?php  echo $row['staff_type']; ?>" name="staff_type" class="form-control" placeholder="Add Staff Type" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="update_staff_type">Update</button>
        </div>
    </form> 
</div>