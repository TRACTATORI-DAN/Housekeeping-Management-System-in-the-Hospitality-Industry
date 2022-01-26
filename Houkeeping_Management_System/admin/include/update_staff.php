<?php
 if(!isset($_SESSION))
    {
    include "./back_session.php";
        }
    $query = "SELECT * FROM staff INNER JOIN staff_type ON staff.staff_type = staff_type.staff_type_id WHERE staff.staff_id = '$staff_id'";
    $result = mysqli_query($connect,$query);
    $staff = mysqli_fetch_assoc($result);

?>
<div class="staff_div">
    <form action="./staff.php" method="POST">
        <div class="input-group mb-3" style="margin: 2rem 0px;">
            <input type="text" value="<?php  echo $staff['staff_name']; ?>" class="form-control"  name="staff_name" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3" style="margin: 2rem 0px;">
            <input type="text" value="<?php  echo $staff['staff_email']; ?>" class="form-control"  name="staff_email" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3" style="margin: 2rem 0px;">
            <input type="text" value="<?php  echo $staff['staff_contact_no']; ?>" class="form-control"  name="staff_number" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <select  name="staff_type_id" class="form-select" aria-label="Default select example" style="margin-top: 2rem;">
            <option value="<?php  echo $staff['staff_type_id']; ?>"><?php  echo $staff['staff_type']; ?></option>
            <?php  
            
                $query = "SELECT * FROM staff_type";
                $result = mysqli_query($connect,$query);
                while($row = mysqli_fetch_assoc($result))
                {
            ?>
            <option value="<?php echo $row['staff_type_id']; ?>"><?php  echo $row['staff_type']; ?></option>
            <?php } ?>
        </select>
        <div class="input_button">
            <input type="hidden" name="staff_id" value="<?php  echo $staff['staff_id']; ?>">
            <button type="submit" class="btn btn-success" name="update_staff">Update</button>
        </div>
    </form>
</div>