<?php
if (!isset($_SESSION)) {
    include "./back_session.php";
}
?>
<div class="room_service">
    <div class="input_room_service">
        <form action="./room_service.php" method="POST">
            <div class="input-group mb-3">
                <select class="form-select" aria-label="Default select example" name="room_id">

                    <?php
                    if (isset($_SESSION['room_id'])) {
                        $room_id = $_SESSION['room_id'];
                        $query = "SELECT * FROM room WHERE id = '$room_id'";
                        $result = mysqli_query($connect, $query);
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <option value="<?php echo $row['id'];  ?>"><?php echo $row['room_name'];  ?></option> <?php }
                                                                                                            } else { ?>
                        <option selected>Select Room</option>
                        <?php
                                                                                                                $query = 'SELECT * FROM room';
                                                                                                                $result = mysqli_query($connect, $query);
                                                                                                                while ($row = mysqli_fetch_assoc($result)) { ?>
                            <option value="<?php echo $row['id'];  ?>"><?php echo $row['room_name'];  ?></option> <?php }
                                                                                                            } ?>
                </select>
            </div>

            <div class="input-group mb-3">
                <select class="form-select" aria-label="Default select example" aria-describedby="button-addon2" name="food_type_id">
                    <?php
                    if (isset($_SESSION['food_type_id'])) {
                        $food_type_id = $_SESSION['food_type_id'];
                        $query = "SELECT * FROM food_type WHERE food_type_id ='$food_type_id'";
                        $result = mysqli_query($connect, $query);
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <option value="<?php echo $row['food_type_id'];  ?>"><?php echo $row['food_type'];  ?></option> <?php }
                                                                                                                    } else { ?>
                        <option selected>Select Food Type</option>
                        <?php
                                                                                                                        $query = 'SELECT * FROM food_type';
                                                                                                                        $result = mysqli_query($connect, $query);
                                                                                                                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <option value="<?php echo $row['food_type_id'];  ?>"><?php echo $row['food_type'];  ?></option> <?php }
                                                                                                                    } ?>
                </select>
                <button class="btn btn-primary" type="submit" id="button-addon2" name="search_food">Search</button>
            </div>
        </form>
        <form action="./room_service.php" method="POST">
            <div class="input-group mb-3">
                <select class="form-select" aria-label="Default select example" name="food_id">
                    <option selected>Select Food</option>
                    <?php
                    if (isset($_SESSION['food_type_id'])) {
                        $food_type_id = $_SESSION['food_type_id'];
                        $query = "SELECT * FROM food INNER JOIN food_type ON food.food_type_id = food_type.food_type_id WHERE food_type.food_type_id = '$food_type_id'";
                        $result = mysqli_query($connect, $query);
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <option value="<?php echo $row['food_id'];  ?>"><?php echo $row['food'];  ?></option> <?php }
                                                                                                            } ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <select class="form-select" aria-label="Default select example" aria-describedby="button-addon2" name="food_quantity_id">
                    <option selected>Select Food Quantity</option>
                    <?php
                    if (isset($_SESSION['food_type_id'])) {
                        $query = "SELECT * FROM food_quentity";
                        $result = mysqli_query($connect, $query);
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <option value="<?php echo $row['food_quentity_id'];  ?>"><?php echo $row['food_quentity'];  ?></option> <?php }
                                                                                                                            } ?>
                </select>
                <button class="btn btn-success" type="submit" id="button-addon2" name="add_to_list">Add To List</button>
            </div>
            <div style="margin-top: 2rem; text-align:center;">
                <form action="./room_service.php" method="POST">
                    <button type="submit" class="btn btn-info" name="place_order"> Place Order</button>
                </form>
            </div>
        </form>




    </div>
    <div class="order_list">
        <div class="table_heading">
            Order List
        </div>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Food Type</th>
                    <th scope="col">Food Quentity</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM order_list  INNER JOIN food_quentity ON order_list.food_quentity_id = food_quentity.food_quentity_id INNER JOIN food ON order_list.food_id = food.food_id ";
                $result = mysqli_query($connect, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $row['order_list_id']; ?></th>
                        <td><?php echo $row['food']; ?></td>
                        <td><?php echo $row['food_quentity']; ?></td>
                        <td>
                            <form action="./room_service.php" method="POST">
                                <input type="hidden" name="order_list_id" value="<?php echo $row['order_list_id']; ?>">
                                <input type="hidden" name="action" value="delete_order_list">
                                <button class="btn btn-danger">&cross;</button>

                            </form>
                        </td>
                    </tr><?php } ?>
            </tbody>
        </table>
    </div>





</div>