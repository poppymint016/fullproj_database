<?php 
require('dbconnect.php');

$Trackingno = $_POST["Trackingno"]; // เลขแทรก

$sql = "SELECT * FROM trackno WHERE Trackingno LIKE '%$Trackingno%' ORDER BY Trackingno ASC";

$result=mysqli_query($connect,$sql);
$count=mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #000000;
  color: white;
}
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผลการค้นหาข้อมูล</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h1 class="text-center">ผลการค้นหาข้อมูล</h1>
    <hr>
    <?php if($count>0){?>
        <form action="searchata.php" class="form-group" method="POST">

    </form>
    <table class="table table-bordered" id="customers">
        <thead>
        <tr>
            <th>Tracking_number</th>
            <th>Sender name</th>
            <th>Date Send</th>
            <th>Recipient name</th>
            <th>recipient number</th>
            <th>Status</th>
    </tr>
        </thead>
        <tbody>
        <?php while($row=mysqli_fetch_assoc($result)){?>
            <tr>
                <td><?php echo $row["Trackingno"] ;?></td>
                <td><?php echo $row["Sname"] ;?></td>
                <td><?php echo $row["date"] ;?></td>
                <td><?php echo $row["Rname"] ;?></td>
                <td><?php echo $row["Rphoneno"] ;?></td>
                <td><?php echo $row["status"] ;?></td>            
            </tr>
        <?php } ?>
        </tbody>        
    </table>
    
    <?php } else {?>
    <div class="alert alert-danger">
        <b>ไม่พบข้อมูลที่ค้นหา !!!<b>
    </div>
    <?php } ?>
    <a href="index.php" class="btn btn-dark my-2">กลับหน้าแรก</a>
    </form>
    </div>
</body>
</html>