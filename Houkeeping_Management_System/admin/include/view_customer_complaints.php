<?php
if (!isset($_SESSION)) {
    include "./back_session.php";
}
?>
<div class="staff_main_div">
    <div class="main_add_div">
        <div class="sub_staff_div">
            <form action="./customer_complaint.php" method="POST">
                <input type="hidden" name="action" value="add_complaint">
                <button class="btn btn-primary" type="submit">Add Complaint </button>
            </form>
        </div>
    </div>

    <div>
        <div class="table_heading">
            <h5>CUSTOMER COMPLAINT SECTION</h5>
        </div>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Room Name</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Complaint</th>
                    <th scope="col">Status</th>
                    <th scope="col">Taken By</th>
                    <th scope="col">Time</th>
                    <th scope="col">Inspect</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM customer_complaint INNER JOIN room ON customer_complaint.room_no = room.id ";
                $result = mysqli_query($connect, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $row['cumtomer_complaint_id']; ?></th>
                        <td><?php echo $row['room_name']; ?></td>
                        <td><?php echo $row['complaint_by']; ?></td>
                        <td><input value="<?php echo $row['complaint']; ?>" class="form-control" type="text" name="" id="" readonly></td>
                        <td>
                            <p class="<?php echo $row['cumtomer_complaint_status']; ?>"><?php echo $row['cumtomer_complaint_status']; ?></p>
                        </td>
                        <td><?php echo $row['taken_by']; ?></td>
                        <td><?php echo $row['time']; ?></td>
                        <td>
                            <form action="./customer_complaint.php" method="POST">
                                <input type="hidden" name="complaint_id" value="<?php echo $row['cumtomer_complaint_id']; ?>">
                                <input type="hidden" name="action" value="update_complaint">
                                <button class=" btn btn-primary ">&#x1F441;</button>
                            </form>
                        </td>
                    </tr><?php } ?>
            </tbody>
        </table>
    </div>
</div>