<?php
 if(!isset($_SESSION))
    {
    include "./back_session.php";
        }
    $room_id = $_POST['room_id'];
    $query = "SELECT floor.floor_name, room.id , room.room_name , room_type.room_type FROM room INNER JOIN floor ON room.floor_id = floor.id INNER JOIN room_type ON room.room_type_id = room_type.id WHERE room.id='$room_id'";
    $result = mysqli_query($connect,$query);
    $results = mysqli_fetch_assoc($result);
    $floor_name = $results['floor_name'];
    $room_type = $results['room_type'];

    $query = "SELECT * FROM floor WHERE floor_name= '$floor_name'";
  
    $result = mysqli_query($connect,$query);
    $floor  = mysqli_fetch_assoc($result);
    $floor_id = $floor['id'];

    $query = "SELECT * FROM room_type WHERE room_type = '$room_type'";
    $result = mysqli_query($connect,$query);
    $room_type = mysqli_fetch_assoc($result);
    $room_type_id = $room_type['id'];

?>
<div class="input_value_div" style="width: 40% !important ;" >
    <form action="./manage_room.php" method="POST">
        <select name="floor_id" class="form-select" aria-label="Default select example">
            <option value="<?php  echo $floor_id ; ?>"><?php echo $results['floor_name'];  ?></option>
            <?php  
            
                $query = "SELECT * FROM floor";
                $result = mysqli_query($connect,$query);
                while($row = mysqli_fetch_assoc($result))
                {
            ?>
            <option value="<?php echo $floor_id; ?>"><?php  echo $row['floor_name']; ?></option>
            <?php } ?>
        </select>
        <select  name="room_type_id" class="form-select" aria-label="Default select example" style="margin-top: 2rem;">
            <option value="<?php  echo $room_type_id ; ?>"><?php  echo $results['room_type']; ?></option>
            <?php  
            
                $query = "SELECT * FROM room_type";
                $result = mysqli_query($connect,$query);
                while($row = mysqli_fetch_assoc($result))
                {
            ?>
            <option value="<?php echo $row['id']; ?>"><?php  echo $row['room_type']; ?></option>
            <?php } ?>
        </select>
        <div class="input-group mb-3" style="margin: 2rem 0px;">
            <input type="text" value="<?php  echo $results['room_name']; ?>" class="form-control" placeholder="Enter Room Name" name="room_name" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <input type="hidden" name="room_id" value="<?php  echo $results['id']; ?>">
        <button type="submit" class="btn btn-success" name="update_room">Update</button>
    </form>
</div>