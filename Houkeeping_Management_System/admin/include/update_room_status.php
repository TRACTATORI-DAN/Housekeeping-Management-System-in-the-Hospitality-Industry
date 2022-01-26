<?php
 if(!isset($_SESSION))
    {
    include "./back_session.php";
        }
    $query = "SELECT * FROM room_status INNER JOIN room ON room_status.room_id = room.id INNER JOIN staff ON room_status.housekeeper_id = staff.staff_id WHERE room_status.room_status_id = '$room_status_id'";
    $result = mysqli_query($connect,$query);
    $row_count = mysqli_num_rows($result);
    if($row_count == '0')
    {
        $query = "SELECT * FROM room_status INNER JOIN room ON room_status.room_id = room.id  WHERE room_status.room_status_id = '$room_status_id'";
        $result = mysqli_query($connect,$query);
    }

    $row = mysqli_fetch_assoc($result);
?>
<div class="room_status_main">
    <form action="./room_status.php" method="POST">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Room Name : </label>
            <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php  echo $row['room_name'] ;?>" readonly>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Room Status : </label>
            <select id="exampleFormControlInput1" name="room_status" class="form-select" aria-label="Default select example">
                <option value="<?php echo $row['room_status']; ?>"><?php  echo $row['room_status']; ?></option>
                <option value="Active">Active</option>
                <option value="Out-Of-Service">Out-Of-Service</option>
                <option value="Out-Of-Order">Out-Of-Order</option>
                <option value="Out-Of-Inventory">Out-Of-Inventory</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Room Inspection Status : </label>
            <select id="exampleFormControlInput1" name="room_inspection" class="form-select" aria-label="Default select example">
                <option value="<?php echo $row['inspection_status']; ?>"><?php  echo $row['inspection_status']; ?></option>
                <option value="Clean">Clean</option>
                <option value="Dirty">Dirty</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Assign Housekeeper : </label>
            <select id="exampleFormControlInput1" name="staff_id" class="form-select" aria-label="Default select example">
                <?php if($row_count == '1'){ ?>
                <option value="<?php echo $row['staff_id']; ?>"><?php  echo $row['staff_name']; ?></option><?php } ?>
                <?php
                    echo "<option>Select Housekeeper </option>";
                    $staff_query = "SELECT * FROM staff INNER JOIN staff_type ON staff.staff_type = staff_type.staff_type_id INNER JOIN housekeeper_status ON staff.staff_id = housekeeper_status.housekeeper_id WHERE staff_type.staff_type ='Housekeeper' AND housekeeper_status.housekeeper_status = 'Available'";
                    $staff_result = mysqli_query($connect,$staff_query);
                    while($staff_rows = mysqli_fetch_assoc($staff_result) )
                    { ?>
                    <option value="<?php  echo $staff_rows['staff_id'] ;?>"><?php  echo $staff_rows['staff_name']; ?></option>
                    <?php } ?>
        
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Admin Notes : </label>
            <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php  echo $row['room_admin_note'] ;?>" name="admin_note">
        </div>
        <input type="hidden" name="room_status_id" value="<?php  echo $row['room_status_id'] ;?>">
        <div class="room_status_button">
            <button type="submit" class="btn btn-primary" name="room_status_update">Submit</button>
        </div>
    </form>
</div>