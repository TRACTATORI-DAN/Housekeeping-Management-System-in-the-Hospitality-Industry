<?php
if (!isset($_SESSION)) {
    include "./back_session.php";
}
?>
<div class="staff_div">
    <form action="./staff.php" method="POST">
        <div class="input-group mb-3" style="margin: 2rem 0px;">
            <input type="text" class="form-control" placeholder="Enter Staff Name" name="staff_name" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3" style="margin: 2rem 0px;">
            <input type="text" class="form-control" placeholder="Enter Staff Email" name="staff_email" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3" style="margin: 2rem 0px;">
            <input type="text" class="form-control" placeholder="Enter Staff Contact Number" name="staff_number" aria-label="Username" aria-describedby="basic-addon1">
        </div>
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
        <div class="input_button">
            <button type="submit" class="btn btn-primary" name="add_staff">Submit</button>
        </div>
    </form>
</div>