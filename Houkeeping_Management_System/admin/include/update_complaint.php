<?php
if (!isset($_SESSION)) {
    include "./back_session.php";
}


$query = "SELECT * FROM customer_complaint INNER JOIN room ON customer_complaint.room_no = room.id WHERE cumtomer_complaint_id = '$complaint_id'";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);

?>




<div class="input_value_div" style="width: 40% !important ;">
    <form action="./customer_complaint.php" method="POST">

        <div class="input-group">
            <span class="input-group-text">Room Name</span>
            <input type="text" aria-label="First name" class="form-control" value="<?php echo $row['room_name']; ?>" readonly>
        </div>
        <div class="input-group" style="margin: 2rem auto;">
            <span class="input-group-text">Customer Name</span>
            <input type="text" aria-label="First name" class="form-control" value="<?php echo $row['complaint_by']; ?>" readonly>
        </div>
        <div class="input-group">
            <span class="input-group-text">Complaint</span>
            <textarea class="form-control" name="complaint" aria-label="With textarea"><?php echo $row['complaint']; ?></textarea>
        </div>
        <div class="input-group" style="margin-top: 2rem;">
            <span class="input-group-text">Complaint Status</span>
            <select class="form-select" aria-label="Default select example" name="complaint_status" require>
                <option value="In_Process">In Process</option>
                <option value="Solved">Solved</option>
            </select>
        </div>
        <input type="hidden" name="complaint_id" value="<?php echo $row['cumtomer_complaint_id']; ?>">
        <button style="margin-top: 2rem;" type="submit" class="btn btn-success" name="complaint_update">Update</button>
    </form>
</div>