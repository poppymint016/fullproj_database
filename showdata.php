<?php 
require('dbconnect.php');

$cid = $_POST["cid"]; // เลขcid

$sql = "SELECT * FROM trackno WHERE cid LIKE '%$cid%' ORDER BY cid ASC";

$result=mysqli_query($connect,$sql);
$count=mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="print.css" media="print">
<style>
#showdata {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#showdata td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#showdata tr:nth-child(even){background-color: #f2f2f2;}

#showdata tr:hover {background-color: #ddd;}

#showdata th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #000000;
  color: white;
}
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track & Trace | กรอกเลขพัสดุ เช็คสถานะพัสดุ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h1 class="text-center">ผลการค้นหาข้อมูล</h1>
    <hr>
    <?php if($count>0){?>
        <form action="showdata.php" class="form-group" method="POST">

    </form>
    <table class="table table-bordered1" id="showdata">
        <thead>
        <tr>
            <th>ID card</th>
            <th>Tracking_number</th>
            <th>Sender name</th>
            <th>Sender address</th>
            <th>Sender phone number</th>
            <th>Date Send</th>
            <th>Recipient name</th>
            <th>Recipient address</th>
            <th>recipient phone number</th>
            <th>Status</th>
    </tr>
        </thead>
        <tbody>
        <?php while($row=mysqli_fetch_assoc($result)){?>
            <tr>
                <td><?php echo $row["cid"] ;?></td>
                <td><?php echo $row["Trackingno"] ;?></td>
                <td><?php echo $row["Sname"] ;?></td>
                <td><?php echo $row["Saddress"] ;?></td>
                <td><?php echo $row["Sphoneno"] ;?></td>
                <td><?php echo $row["date"] ;?></td>       
                <td><?php echo $row["Rname"] ;?></td>
                <td><?php echo $row["Raddress"] ;?></td>
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
    <a href="track&trace.php" class="btn btn-dark my-2" id="back">Back</a>
    <a href="index.php" class="btn btn-dark my-2" id="firstpage">กลับหน้าแรก</a>
    <button class="btn btn-dark my-2" type="button" name="button" id="print" onclick= "window.print();">PRINT</button>
    </form>
    </div>
</body>
</html>