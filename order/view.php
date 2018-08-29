<?php
session_start();
/*$html = new htmlDefault();
include '../function/navbar.php';
$navbar = new navbar();*/
include '../function/conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
<div style="margin:auto;width:80%;">  
 <h3>View Page {<?=$_SESSION['ses_name_user']?>}</h3>
  <br>
  <a href="list.php">List</a> |  <a href="cart.php">Cart</a><br>
<?php  
// แสดงรายละเอียดสินค้านั้น    
$q="  
SELECT * FROM product WHERE id_product ='".$_GET['id_product']."'
";  
$result = $mysqli->query($q); // ทำการ query คำสั่ง sql   
$rs=$result->fetch_array();
?>
   <form id="myform" method="post" action="cart.php">  
<table class="table">
<tbody>
<tr>
    <th>ID</th>
    <td><?=$rs['id_product']?></td>
</tr>
<tr>
    <th>Name</th>
    <td><?=$rs['name_product']?></td>
</tr>
<tr>
    <th>Price</th>
    <td><?=$rs['pro_price']?></td>
</tr>
<tr>
    <th></th>
    <td>
<!--    ค่าที่ต้องการส่งไปหน้า ตะกร้าสินค้า-->
    <input type="hidden" name="h_pro_id" value="<?=$rs['id_product']?>">
    <input type="hidden" name="h_pro_price" value="<?=$rs['price_product']?>">
    <input type="hidden" name="h_pro_name" value="<?=$rs['name_product']?>">
     
    <input type="submit" name="add_to_cart" value="ใส่ตะกร้า">  
    </td>
</tr>
</tbody>
</table>
    </form>
 
</div>              
</body>
</html>