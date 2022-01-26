<?php
include "./admin/include/db.php";
include "./admin/include/function.php";
session_start();
$message = "";
if (isset($_POST['login'])) {
    $username = strings($_POST['username']);
    $password = strings($_POST['password']);
    $user_type = strings($_POST['user_type']);

    if ($user_type == 'Admin') {
        $query = "SELECT * FROM admin WHERE admin_email = '$username'";
        $result = mysqli_query($connect, $query);
        $count = mysqli_num_rows($result);
        if ($count >= 1) {
            $row = mysqli_fetch_assoc($result);
            $admin_email = $row['admin_email'];
            $admin_password = $row['admin_password'];
            if ($admin_email === $username and $admin_password === $password) {
                $_SESSION['username'] = $row['admin_name'];
                $_SESSION['admin_login'] = "admin_login";
                $_SESSION['admin_user'] = 'admin_user';
                header("Location: ./index.php");
            } else {
                $message = "Invalid Credintial!";
            }
        } else {
            $message = " Invalid Credintial!";
        }
    } elseif ($user_type == 'Staff') {

        $query = "SELECT * FROM staff WHERE staff_email = '$username'";
        $result = mysqli_query($connect, $query);
        $count = mysqli_num_rows($result);
        if ($count >= 1) {
            $row = mysqli_fetch_assoc($result);
            $staff_email = $row['staff_email'];
            $staff_password = $row['staff_password'];
            if ($staff_email === $username and $staff_password === $password) {

                $_SESSION['username'] = $row['staff_name'];
                $_SESSION['admin_login'] = "admin_login";
                echo "<script> location.href = './index.php' ; </script>";
            } else {

                $message = "Invalid Credintial!";
            }
        } else {
            $message = " Invalid Credintial!";
        }
    } else {

        $message = "Invalid Credintial!";
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pearl Grand Housekeeping Management System</title>
    <link rel="stylesheet" href="./static/style.css">
    <link rel="shortcut icon" href="./admin/images/PAL grand.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>

    <div class="login_main">

        <div class="img_class">
            <img style="width: 60%;" src="./admin/images/PAL grand.png" alt="hotel icon">
        </div>
        <div class="input_class">
            <div style="text-align: start; margin: 1rem auto;">
                <p style="font-size: 20px;">Here You Can Login</p>
            </div>
            <form action="./login.php" method="POST">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="User email" aria-label="Username" aria-describedby="basic-addon1" name="username" required>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="User password" aria-label="Username" aria-describedby="basic-addon1" name="password" require>
                </div>
                <select class="form-select" aria-label="Default select example" required name="user_type">
                    <option selected>Select User Type</option>
                    <option value="Admin">Admin</option>
                    <option value="Staff">Staff</option>
                </select>
                <div>
                    <button type="submit" class="btn btn-success" name="login">Log In</button>
                </div>
                <div class="message">
                    <p style="font-size: 18px; color: red; text-align: center;"><?php echo $message;  ?></p>
                </div>
            </form>

        </div>
    </div>


</body>

</html>