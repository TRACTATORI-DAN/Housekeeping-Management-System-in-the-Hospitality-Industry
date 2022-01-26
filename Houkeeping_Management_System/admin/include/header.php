<!DOCTYPE html>
<?php

include "./include/session.php";
if (!isset($_SESSION)) {
  include "./back_session.php";
}
include "./include/db.php";
include "./include/function.php";
date_default_timezone_set('Asia/Kolkata');
$date1 = date('ymd');
$date2 = date('d-m-y h:i:s');

?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pearl Grand Housekeeping Management System</title>
  <link rel="stylesheet" href="./static/style.css">
  <script src="./script/script.js"></script>
  <link rel="shortcut icon" href="./images/PAL grand.png" type="image/png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navs">
    <div class="container-fluid">
      <a id="nav_admin" class="navbar-brand"><img style="width: 50px;" src="./images/PAL grand.png" alt=""></a>
      <a class="navbar-brand" href="./index.php">Pearl Grand</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Housekeeping
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="./room_status.php">Room Status</a></li>
              <li><a class="dropdown-item" href="./housekeeper.php">Housekeeper</a></li>
              <li><a class="dropdown-item" href="./maintain_daily_activity.php">Daily Activity</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Room Service
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="./room_service.php">Order Room Service</a></li>
              <li><a class="dropdown-item" href="./view_ordered_food.php">View Room Service</a></li>
            </ul>
          </li>
          <?php if (isset($_SESSION['admin_user'])) {   ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Management
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="./manage_room.php">Room</a></li>
                <li><a class="dropdown-item" href="./staff.php">Staff</a></li>
                <li><a class="dropdown-item" href="./staff_type.php">Staff Types</a></li>
                <li><a class="dropdown-item" href="./daily_activity.php">Daily Activity</a></li>
                <li><a class="dropdown-item" href="./food.php">Foods</a></li>
                <li><a class="dropdown-item" href="./monthly_roster.php">Monthly Roster</a></li>
              </ul>
            </li><?php } ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Other Service
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="./customer_complaint.php">Customer Complaint</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./include/logout.php">Log Out</a>
          </li>
        </ul>

      </div>
      <a id="nav_admin" class="navbar-brand"><img src="./images/admin.png" alt=""></a>
      <a id="nav_admin" class="navbar-brand"><?php echo $_SESSION['username']; ?></a>
      <a id="nav_admin" class="navbar-brand">
        <script>
          time();
        </script>
      </a>
    </div>
  </nav>