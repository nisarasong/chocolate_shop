<?php
session_start();
/*$html = new htmlDefault();
include '../function/navbar.php';
$navbar = new navbar();*/
include '../function/conn.php';
?>

<?php
// จำลองการตรวจสอบว่าเป็นสมาชิก ที่ล็อกอินแล้วหรือไม่
if(!isset($_SESSION['ses_cus_id']) || $_SESSION['ses_cus_id']==""){
    header("Location:login.php");  
    exit;      
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Order</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
<div style="margin:auto;width:80%;">  
 <h3>View Order Page {<?=$_SESSION['ses_name_user']?>}</h3>
  <br>
  <a href="list.php">List</a> |  <a href="member.php">Member</a> |  <a href="order.php">Order</a><br>
 
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total Price</th>
        </tr>
    </thead>
<tbody>
<?php  
// คิวรี่ข้อมูลตาราง tbl_order    
$q="  
SELECT * FROM order WHERE id_order='".$_GET['v_order_id']."'
";  
$result = $mysqli->query($q); // ทำการ query คำสั่ง sql   
$rs=$result->fetch_array();
?>
 
<?php  
// วนลูป คิวรี่ข้อมูลตาราง tbl_orderdetail    
$i=1;
$q2="  
SELECT * FROM orderdetail WHERE id_order='".$rs['id_order']."'
";  
$result2 = $mysqli->query($q2); // ทำการ query คำสั่ง sql   
$total=$result2->num_rows;  // นับจำนวนถวที่แสดง ทั้งหมด  
while($rs2=$result2->fetch_array()){ // วนลูปแสดงข้อมูล  
?>
 
<tr>
    <td><?=$i?></td>
    <td><?=$rs2['name_product']?></td>
    <td><?=$rs2['price_product']?></td>
    <td><?=$rs2['qty_product']?></td>
    <td><?=$rs2['total_price_product']?></td>
</tr>
 
<?php $i++; } ?>
 
<tr>
   <td colspan="3">
 
   </td>
   <td><?=$rs['qty_order']?></td>
   <td><?=$rs['price_order']?></td>
</tr>
<tr>
    <th>Name:</th>
    <td colspan="4">
<?=$rs['name']?>
    </td>
</tr>
<tr>
    <th>Address:</th>
    <td colspan="4">
<?=$rs['address']?>
    </td>
</tr>
<tr>
    <th></th>
    <td colspan="4">
       <input type="button" onclick="window.location='order.php'" value="Back">
    </td>
</tr>
 
</tbody>
</table>
 
</div>                   
</body>
</html>