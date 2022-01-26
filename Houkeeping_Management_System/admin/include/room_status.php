<?php
if (!isset($_SESSION)) {
    include "./back_session.php";
}
?>
<div class="room_main_div">
    <div class="table_heading">
        <h5>ROOM STATUS</h5>
    </div>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">Room</th>
                <th scope="col">Room Type</th>
                <th scope="col">Room Status</th>
                <th scope="col">Reservation Info</th>
                <th scope="col">Occupancy</th>
                <th scope="col">Inspection Status</th>
                <th scope="col">Housekeeper Note</th>
                <th scope="col">Update By</th>
                <th scope="col">Update Time</th>
                <th scope="col">Inspect</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM room_status INNER JOIN room ON room_status.room_id = room.id INNER JOIN room_type ON room_status.room_type_id = room_type.id";
            $result = mysqli_query($connect, $query);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <th scope="row"><?php echo $row['room_name']; ?></th>
                    <td><?php echo $row['room_type']; ?></td>
                    <td class="<?php echo $row['room_status']; ?>"><?php echo $row['room_status']; ?></td>
                    <td><?php echo $row['reservation_info']; ?></td>
                    <td>
                        <p class="<?php echo $row['occupancy']; ?>"><?php echo $row['occupancy']; ?></p>
                    </td>
                    <td>
                        <p class="<?php echo $row['inspection_status']; ?>"><?php echo $row['inspection_status']; ?></p>
                    </td>
                    <td><input value="<?php echo $row['room_housekeper_note']; ?>" class="form-control" type="text" name="" id="" readonly></td>
                    <td><?php echo $row['update_by']; ?></td>
                    <td><?php echo $row['update_date']; ?></td>
                    <td>
                        <form action="./room_status.php" method="POST">
                            <input type="hidden" name="action" value="view_room_status">
                            <input type="hidden" name="room_status_id" value="<?php echo $row['room_status_id']; ?>">
                            <button class="btn btn-primary" type="submit">&#x1F441;</button>
                        </form>
                    </td>
                </tr><?php } ?>
        </tbody>
    </table>

</div>