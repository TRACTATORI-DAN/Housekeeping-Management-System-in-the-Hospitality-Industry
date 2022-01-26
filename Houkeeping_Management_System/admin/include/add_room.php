<?php
if (!isset($_SESSION)) {
    include "./back_session.php";
}
?>
<div class="input_value_div" style="width: 40% !important ;">
    <form action="./manage_room.php" method="POST">
        <select name="floor_id" class="form-select" aria-label="Default select example">
            <option selected>Select Floor</option>
            <?php

            $query = "SELECT * FROM floor";
            $result = mysqli_query($connect, $query);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['floor_name']; ?></option>
            <?php } ?>
        </select>
        <select name="room_type_id" class="form-select" aria-label="Default select example" style="margin-top: 2rem;">
            <option selected>Select Room Type</option>
            <?php

            $query = "SELECT * FROM room_type";
            $result = mysqli_query($connect, $query);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['room_type']; ?></option>
            <?php } ?>
        </select>
        <div class="input-group mb-3" style="margin: 2rem 0px;">
            <input type="text" class="form-control" placeholder="Enter Room Name" name="room_name" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <button type="submit" class="btn btn-primary" name="submit_room">Submit</button>
    </form>
</div>