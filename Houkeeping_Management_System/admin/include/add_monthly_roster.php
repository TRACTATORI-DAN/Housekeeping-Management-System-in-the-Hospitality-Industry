<?php
if (!isset($_SESSION)) {
    include "./back_session.php";
}
?>

<div class="staff_div">
    <form action="./monthly_roster.php" method="POST">
        <select name="staff_type_id" class="form-select" aria-label="Default select example" style="margin-top: 2rem;">
            <option selected>Select Staff Position</option>
            <?php

            $query = "SELECT * FROM staff_type";
            $result = mysqli_query($connect, $query);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <option value="<?php echo $row['staff_type_id']; ?>"><?php echo $row['staff_type']; ?></option>
            <?php } ?>
        </select>
        <select name="staff_id" class="form-select" aria-label="Default select example" style="margin-top: 2rem;">
            <option selected>Select Staff </option>
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
            <input type="date" class="form-control" name="date_from" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3" style="margin: 2rem 0px;">
            <span class="input-group-text" id="basic-addon1">Duty Date To:</span>
            <input type="date" class="form-control" name="date_to" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3" style="margin: 2rem 0px;">
            <span class="input-group-text" id="basic-addon1">Duty Time From:</span>
            <input type="time" class="form-control" name="time_from" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3" style="margin: 2rem 0px;">
            <span class="input-group-text" id="basic-addon1">Duty Time To:</span>
            <input type="time" class="form-control" name="time_to" aria-label="Username" aria-describedby="basic-addon1">
        </div>


        <div class="input_button">
            <button type="submit" class="btn btn-primary" name="add_monthly_roster">Submit</button>
        </div>
    </form>
</div>