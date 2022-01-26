<?php
if (!isset($_SESSION)) {
    include "./back_session.php";
}
?>
<div class="room_view_main_div">

    <div class="main_add_div">
        <div class="sub_add_div">
            <form action="./manage_room.php" method="POST">
                <input type="hidden" name="action" value="add_floor">
                <button class="btn btn-primary" type="submit">Add Floor</button>
            </form>
        </div>
        <div class="sub_add_div">
            <form action="./manage_room.php" method="POST">
                <input type="hidden" name="action" value="add_room_type">
                <button class="btn btn-primary" type="submit">Add Room Type</button>
            </form>
        </div>
        <div class="sub_add_div">
            <form action="./manage_room.php" method="POST">
                <input type="hidden" name="action" value="add_room">
                <button class="btn btn-primary" type="submit">Add Room</button>
            </form>
        </div>
    </div>


    <div class="manage_room_main">
        <div style="margin-right: 3rem; ">
            <div class="table_heading">
                Floor
            </div>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">Floor Id</th>
                        <th scope="col">Floor Name</th>
                        <th scope="col">Inspect</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $query = "SELECT * FROM floor";
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $row['id']; ?></th>
                            <th><?php echo $row['floor_name']; ?></th>
                            <td>
                                <form action="./manage_room.php" method="POST">
                                    <input type="hidden" name="floor_id" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="action" value="update_floor">
                                    <button class="btn btn-success" type="submit">&#x1F441;</button>
                                </form>
                            </td>
                            <td>
                                <form action="./manage_room.php" method="POST">
                                    <input type="hidden" name="floor_id" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="action" value="delete_floor">
                                    <button class="btn btn-danger" type="submit">&Cross;</button>
                                </form>
                            </td>
                        </tr><?php }  ?>
                </tbody>
            </table>
        </div>

        <div style="margin-right: 3rem; ">
            <div class="table_heading">
                Room Type
            </div>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Room Type</th>
                        <th scope="col">Inspect</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $query = "SELECT * FROM room_type";
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $row['id']; ?></th>
                            <th><?php echo $row['room_type']; ?></th>
                            <td>
                                <form action="./manage_room.php" method="POST">
                                    <input type="hidden" name="room_type_id" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="action" value="update_room_type">
                                    <button class="btn btn-success" type="submit">&#x1F441;</button>
                                </form>
                            </td>
                            <td>
                                <form action="./manage_room.php" method="POST">
                                    <input type="hidden" name="room_type_id" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="action" value="delete_room_type">
                                    <button class="btn btn-danger" type="submit">&Cross;</button>
                                </form>
                            </td>
                        </tr><?php }  ?>
                </tbody>
            </table>
        </div>

        <div >
            <div class="table_heading">
                Room
            </div>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">Floor Name</th>
                        <th scope="col">Room Name</th>
                        <th scope="col">Room Type</th>
                        <th scope="col">Inspect</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $query = "SELECT floor.floor_name, room.id , room.room_name , room_type.room_type FROM room INNER JOIN floor ON room.floor_id = floor.id INNER JOIN room_type ON room.room_type_id = room_type.id";
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $row['floor_name']; ?></th>
                            <th><?php echo $row['room_name']; ?></th>
                            <td><?php echo $row['room_type']; ?></td>
                            <td>
                                <form action="./manage_room.php" method="POST">
                                    <input type="hidden" name="room_id" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="action" value="room_update">
                                    <button class="btn btn-success" type="submit">&#x1F441;</button>
                                </form>
                            </td>
                            <td>
                                <form action="./manage_room.php" method="POST">
                                    <input type="hidden" name="room_id" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="action" value="room_delete">
                                    <button class="btn btn-danger" type="submit">&Cross;</button>
                                </form>
                            </td>
                        </tr> <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>