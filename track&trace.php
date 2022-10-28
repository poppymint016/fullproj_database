<?php 
require('dbconnect.php');

$cid = $_POST["cid"]; 

$sql = "SELECT * FROM trackno WHERE Trackingno LIKE '%$cid%' ORDER BY Trackingno ASC";

$result=mysqli_query($connect,$sql);
$count=mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="track&trace.css">
    <link rel = "icon" href ="Box Delivery Services.png" type="image/x-icon">
    <title>Track & Trace | กรอกเลขพัสดุ เช็คสถานะพัสดุ</title>
</head>
<body>
    <header>
        <a href="index.php" class="logo">KPT Express</a>
        <div class="group">
            <ul class="navigation">
                <li><a href="index.php">Home</a></li>
                <li><a href="track&trace.php">Track & Trace</a></li>
                <li><a href="shipping.php">Shipping</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>
    </header>
    <div class="container">
        <form action="showdata.php" method="POST">
            <ion-icon name="search-outline" class="search-icon"></ion-icon>
            <input type="text" placeholder="กรุณากรอกเลขบัตรประชาชน13หลัก" name="cid">
            <button type="submit">ค้นหาประวัติการจัดส่ง</button>
        </form>
    </div>
    <div class="image2">
        <img src="/phpmysqli/logo.png">
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>