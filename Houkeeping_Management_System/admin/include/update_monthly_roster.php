<?php
 if(!isset($_SESSION))
    {
    include "./back_session.php";
    }
$query = "SELECT * FROM monthly_roster INNER JOIN staff_type ON monthly_roster.staff_type_id = staff_type.staff_type_id INNER JOIN staff ON monthly_roster.staff_id = staff.staff_id WHERE monthly_roster_id = '$monthly_roster_id'";
$result = mysqli_query($connect, $query);
$rows = mysqli_fetch_assoc($result);


?>
<div class="staff_div">
    <form action="./monthly_roster.php" method="POST">
        <select name="staff_type_id" class="form-select" aria-label="Default select example" style="margin-top: 2rem;">
            <option value="<?php echo $rows['staff_type_id']; ?>"><?php echo $rows['staff_type']; ?></option>
            <?php

            $query = "SELECT * FROM staff_type";
            $result = mysqli_query($connect, $query);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <option value="<?php echo $row['staff_type_id']; ?>"><?php echo $row['staff_type']; ?></option>
            <?php } ?>
        </select>
        <select name="staff_id" class="form-select" aria-label="Default select example" style="margin-top: 2rem;">
            <option value="<?php echo $rows['staff_id']; ?>"><?php echo $rows['staff_name']; ?></option>
            <?php

            $query = "SELECT * FROM staff";
            $result = mysqli_query($connect, $query);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <option value="<?php echo $row['staff_id']; ?>"><?php echo $row['staff_name']; ?></option>
            <?php } ?>
        </select>
        <div class="input-group mb-3" style="margin: 2rem 0px;">
            <span class="input-group-text" id="basic-addon1">Duty Date From:</span>
            <input type="date" class="form-control" name="date_from" aria-label="Username" value="<?php echo $rows['date_from']; ?>" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3" style="margin: 2rem 0px;">
            <span class="input-group-text" id="basic-addon1">Duty Date To:</span>
            <input type="date" class="form-control" name="date_to" aria-label="Username" value="<?php echo $rows['date_to']; ?>" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3" style="margin: 2rem 0px;">
            <span class="input-group-text" id="basic-addon1">Duty Time From:</span>
            <input type="time" class="form-control" name="time_from" aria-label="Username" value="<?php echo $rows['time_from']; ?>" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3" style="margin: 2rem 0px;">
            <span class="input-group-text" id="basic-addon1">Duty Time To:</span>
            <input type="time" class="form-control" name="time_to" aria-label="Username" value="<?php echo $rows['time_to']; ?>" aria-describedby="basic-addon1">
        </div>
        <input type="hidden" name="monthly_roster_id" value="<?php echo $rows['monthly_roster_id']; ?>">

        <div class="input_button">
            <button type="submit" class="btn btn-success" name="update_monthly_roster">Update</button>
        </div>
    </form>
</div>