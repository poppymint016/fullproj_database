<?php
    require('dbconnect.php');
    $query = "select * from trackno order by Trackingno desc";
    $result = mysqli_query($connect,$query);
    $row = mysqli_fetch_array($result);
    $lastTrackingno = $row['Trackingno'];
    if(empty($lastTrackingno))
    {
        $Trackno = "E-0000001";
    }
    else
    {
        $idd = str_replace("E-", "", $lastTrackingno);
        $id = str_pad($idd + 1, 7, 0, STR_PAD_LEFT);
        $Trackno = "E-" . $id;
    }
?> 
<?php
    if($_SERVER["REQUEST_METHOD"]== "POST")
    {
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

        if(!$connect)
        {
            die("connection failed" . mysqli_connect_error());
        }
        else
        {
            $sql = "insert into trackno(Trackingno,Sname,cid,Saddress,Sphoneno,date,Rname,Raddress,Rphoneno,status)VALUES('$Trackingno','$Sname','$cid','$Saddress','$Sphoneno','$date','$Rname','$Raddress','$Rphoneno','$status')";
            if(mysqli_query($connect,$sql))
            {
                echo "Record ADD";
            }
            else
            {
                echo "Record Failed";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="shipping.css">
    <link rel = "icon" href ="Box Delivery Services.png" type="image/x-icon">
    <title>Shipping | จัดส่งพัสดุ</title>
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
    
    <div class="page" style="margin-top:8%;line-height: 50px;">
    <form action="shipping.php" method="post" class="form-floating1">
<div class="container1" >    
<h4><p>ข้อมูลผู้จัดส่ง</p></h4>
</div>
    <input type="text" class="form-control" name="Trackingno" id="Trackingno" placeholder="Tracking number"  value="<?php echo $Trackno; ?>" readonly style="font-size: 1.3rem; width:35%;height:40px;color: green;">
    <p></p>
    <input type="text" class="form-control" name="Sname" id="" placeholder="Name" style="font-size: 1.1rem; width:35%;height:40px">
    <p></p>
    <input type="text" class="form-control" name="cid" id="" placeholder="ID card number" style="font-size: 1.1rem;width:35%;height:40px">
    <p></p>
    <input type="text" class="form-control" name="Saddress" id="" placeholder="Address" style="font-size: 1.1rem;width:35%;height:40px">
    <p></p>
    <input type="text" class="form-control" name="Sphoneno" id="" placeholder="Phone number" style="font-size: 1.1rem;width:35%;height:40px">
    <p></p>
    <input type="hidden" class="form-control" name="status" value="พัสดุถูกนำเข้าสู่ระบบ" style="font-size: 22px;width:150%;height:40px">
    <p></p>
    <input type="date" name ="date" id="date" value="0000-00-00" style="font-size: 1.2rem; cursor: pointer;">
    <p></p>
<div class="container2" >
    <h4><p>ข้อมูลผู้รับ</p></h4>     
</div>
<input type="text" class="form-control" name="Rname" id="" placeholder="Name" style="font-size: 1.1rem;width:35%;height:40px">
<p></p>
<input type="text" class="form-control" name="Raddress" id="" placeholder="Address" style="font-size: 1.1rem;width:35%;height:40px">
<p></p>
<input type="text" class="form-control" name="Rphoneno" id=""placeholder="Phone number" style="font-size: 1.1rem;width:35%;height:40px">
<p></p>
<input type="submit" value="SAVE" class="btn btn-success" style="font-size:1.2rem;width:15%;background-color:#333; color:white; border:none; border-radius: 4px; border-width: 1px;cursor: pointer;">
</form>
</div>

<div class="image1">
    <img src="/phpmysqli/Box Delivery Services.png" style=" width: 90%;height: 90%;margin-top: -50%;margin-left: 15%;display:flex;">
</div>

</script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<?php

?>

</body>
</html>