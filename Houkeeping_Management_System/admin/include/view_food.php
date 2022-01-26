<?php
if (!isset($_SESSION)) {
    include "./back_session.php";
}
?>
<div class="room_view_main_div">

    <div class="main_add_div">
        <div class="sub_add_div">
            <form action="./food.php" method="POST">
                <input type="hidden" name="action" value="add_food_type">
                <button class="btn btn-primary" type="submit">Add Food Type</button>
            </form>
        </div>
        <div class="sub_add_div">
            <form action="./food.php" method="POST">
                <input type="hidden" name="action" value="add_food_quantity">
                <button class="btn btn-primary" type="submit">Add Food Quantity</button>
            </form>
        </div>
        <div class="sub_add_div">
            <form action="./food.php" method="POST">
                <input type="hidden" name="action" value="add_food">
                <button class="btn btn-primary" type="submit">Add Food</button>
            </form>
        </div>
    </div>


    <div class="manage_room_main">
        <div style="margin-right: 3rem; ">
            <div class="table_heading">
                Food Type
            </div>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Food Type</th>
                        <th scope="col">Inspect</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $query = "SELECT * FROM food_type";
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $row['food_type_id']; ?></th>
                            <th><?php echo $row['food_type']; ?></th>
                            <td>
                                <form action="./food.php" method="POST">
                                    <input type="hidden" name="food_type_id" value="<?php echo $row['food_type_id']; ?>">
                                    <input type="hidden" name="action" value="update_food_type">
                                    <button class="btn btn-success" type="submit">&#x1F441;</button>
                                </form>
                            </td>
                            <td>
                                <form action="./food.php" method="POST">
                                    <input type="hidden" name="food_type_id" value="<?php echo $row['food_type_id']; ?>">
                                    <input type="hidden" name="action" value="delete_food_type">
                                    <button class="btn btn-danger" type="submit">&Cross;</button>
                                </form>
                            </td>
                        </tr><?php }  ?>
                </tbody>
            </table>
        </div>

        <div style="margin-right: 3rem; ">
            <div class="table_heading">
                Food Quantity
            </div>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Food Quantity</th>
                        <th scope="col">Inspect</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $query = "SELECT * FROM food_quentity";
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $row['food_quentity_id']; ?></th>
                            <th><?php echo $row['food_quentity']; ?></th>
                            <td>
                                <form action="./food.php" method="POST">
                                    <input type="hidden" name="food_quantity_id" value="<?php echo $row['food_quentity_id']; ?>">
                                    <input type="hidden" name="action" value="update_food_quentity">
                                    <button class="btn btn-success" type="submit">&#x1F441;</button>
                                </form>
                            </td>
                            <td>
                                <form action="./food.php" method="POST">
                                    <input type="hidden" name="food_quantity_id" value="<?php echo $row['food_quentity_id']; ?>">
                                    <input type="hidden" name="action" value="delete_food_quantity">
                                    <button class="btn btn-danger" type="submit">&Cross;</button>
                                </form>
                            </td>
                        </tr><?php }  ?>
                </tbody>
            </table>
        </div>

        <div>
            <div class="table_heading">
                Food
            </div>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Food</th>
                        <th scope="col">Food Type</th>
                        <th scope="col">Inspect</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $query = "SELECT * FROM food INNER JOIN food_type ON food.food_type_id = food_type.food_type_id ";
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $row['food_id']; ?></th>
                            <th><?php echo $row['food']; ?></th>
                            <td><?php echo $row['food_type']; ?></td>
                            <td>
                                <form action="./food.php" method="POST">
                                    <input type="hidden" name="food_id" value="<?php echo $row['food_id']; ?>">
                                    <input type="hidden" name="action" value="update_food">
                                    <button class="btn btn-success" type="submit">&#x1F441;</button>
                                </form>
                            </td>
                            <td>
                                <form action="./food.php" method="POST">
                                    <input type="hidden" name="food_id" value="<?php echo $row['food_id']; ?>">
                                    <input type="hidden" name="action" value="delete_food">
                                    <button class="btn btn-danger" type="submit">&Cross;</button>
                                </form>
                            </td>
                        </tr> <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>