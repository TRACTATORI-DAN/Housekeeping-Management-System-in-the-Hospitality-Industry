<?php
if (!isset($_SESSION)) {
    include "./back_session.php";
}
?>


<div class="input_value_div" style="width: 40% !important ;">
    <form action="./customer_complaint.php" method="POST">
        <select name="room_id" class="form-select" aria-label="Default select example">
            <option selected>Select Room</option>
            <?php

            $query = "SELECT * FROM room";
            $result = mysqli_query($connect, $query);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['room_name']; ?></option>
            <?php } ?>
        </select>
        <div class="input-group mb-3" style="margin: 2rem 0px;">
            <input type="text" class="form-control" placeholder="Enter Customer Name" name="customer_name" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group">
            <span class="input-group-text">Complaint</span>
            <textarea class="form-control" name="complaint" aria-label="With textarea"></textarea>
        </div>

        <button style="margin-top: 2rem;" type="submit" class="btn btn-primary" name="submit_complaint">Submit</button>
    </form>
</div>