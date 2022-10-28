<?php
//เชื่อมต่อฐานข้อมูล
require('dbconnect.php');

$date = $_POST["date"]; // เลขแทรก

$sql1 = "SELECT * FROM trackno WHERE date LIKE '%$date%' ORDER BY date ASC";

$result1=mysqli_query($connect,$sql1);
$count=mysqli_num_rows($result1);

//รับค่าตัวแปรที่ส่งมาจากฟอร์ม
$Trackingno = $_POST['Trackingno'];
$Sname = $_POST['Sname'];
$cid = $_POST['cid'];
$Saddress = $_POST['Saddress'];
$Sphoneno = $_POST['Sphoneno'];
$date = $_POST['date'];
$Rname = $_POST['Rname'];
$Raddress = $_POST['Raddress'];
$Rphoneno = $_POST['Rphoneno'];
$status = $_POST['status'];

//บันทึกข้อมูล
$sql = "INSERT INTO trackno(Trackingno,Sname,cid,Saddress,Sphoneno,date,Rname,Raddress,Rphoneno,status) VALUES('$Trackingno','$Sname','$cid','$Saddress','$Sphoneno','$date','$Rname','$Raddress','$Rphoneno','$status')";

$result = mysqli_query($connect,$sql); //รันคำสั่ง sql

if($result){
    echo "บันทึกข้อมูลเรียบร้อย";
}else{
    echo mysqli_error($connect);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="print.php" class="btn btn-dark my-2">หากต้องการprintคลิกที่นี่</a>
    <a href="index.php" class="btn btn-dark my-2">กลับหน้าแรก</a>
</body>
</html>