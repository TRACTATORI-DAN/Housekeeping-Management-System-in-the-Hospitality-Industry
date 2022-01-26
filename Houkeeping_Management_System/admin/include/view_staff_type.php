<?php
if (!isset($_SESSION)) {
    include "./back_session.php";
}
?>
<div class="staff_type_main_div">
    <div class="main_add_div">
        <div class="sub_staff_type_div">
            <form action="./staff_type.php" method="POST">
                <input type="hidden" name="action" value="add_staff_type">
                <button class="btn btn-primary" type="submit">Add Staff Type</button>
            </form>
        </div>
    </div>
    <div>
        <div class="table_heading">
            <h5>STAFF POSITION SECTION</h5>
        </div>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Staff Position</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM staff_type";
                $result = mysqli_query($connect, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $row['staff_type_id']; ?></th>
                        <td><?php echo $row['staff_type']; ?></td>
                        <td>
                            <form action="./staff_type.php" method="POST">
                                <input type="hidden" name="staff_type_id" value="<?php echo $row['staff_type_id']; ?>">
                                <input type="hidden" name="action" value="update_staff_type">
                                <button class=" btn btn-primary ">&#x1F441;</button>
                            </form>
                        </td>
                        <td>
                            <form action="./staff_type.php" method="POST">
                                <input type="hidden" name="staff_type_id" value="<?php echo $row['staff_type_id']; ?>">
                                <input type="hidden" name="action" value="delete_staff_type">
                                <button class="btn btn-danger">&cross;</button>

                            </form>

                        </td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>
</div>