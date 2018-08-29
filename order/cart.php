<?php
session_start();
/*$html = new htmlDefault();
include '../function/navbar.php';
$navbar = new navbar();*/
include '../function/conn.php';
?>

<?php
// สวนของการเพิ่มรายการในตะกร้าสินค้า
if(isset($_POST['add_to_cart'])){
    $keyProID=$_POST['h_pro_id'];
    if($_POST['h_pro_id']!="" && $_POST['h_pro_name']!="" && $_POST['h_pro_price']!=""){
        $_SESSION['ses_cart_id_product'][$keyProID]=$_POST['h_pro_id'];
        $_SESSION['ses_cart_pro_name'][$keyProID]=$_POST['h_pro_name'];
        $_SESSION['ses_cart_pro_qty'][$keyProID][]=1;
        $_SESSION['ses_cart_pro_price'][$keyProID]=$_POST['h_pro_price'];
        $_SESSION['ses_cart_pro_total_price'][$keyProID]=
            array_sum($_SESSION['ses_cart_pro_qty'][$keyProID])*$_SESSION['ses_cart_pro_price'][$keyProID];
    }
}
// ยกเลิก และลบรายการในตัวแปร session
if(isset($_GET['remove']) && $_GET['d_pro_id']!=""){
    $keyProID=$_GET['d_pro_id'];
    unset($_SESSION['ses_cart_id_product'][$keyProID]);
    unset($_SESSION['ses_cart_pro_name'][$keyProID]);
    unset($_SESSION['ses_cart_pro_qty'][$keyProID]);
    unset($_SESSION['ses_cart_pro_price'][$keyProID]);
    unset($_SESSION['ses_cart_pro_total_price'][$keyProID]);
    header("Location:cart.php");
    exit;
}
// ส่วนของการอัพเดทจำนวนและราคาของแต่ละรายการ เมื่อเปลี่ยนแปลงจำนวน
if(isset($_GET['update']) && $_GET['u_pro_id']!="" && $_GET['new_qty']!="" ){
    $keyProID=$_GET['u_pro_id'];
    unset($_SESSION['ses_cart_pro_qty'][$keyProID]);
    for($i=0;$i<$_GET['new_qty'];$i++){
        $_SESSION['ses_cart_pro_qty'][$keyProID][]=1;
    }
    $_SESSION['ses_cart_pro_total_price'][$keyProID]=
        array_sum($_SESSION['ses_cart_pro_qty'][$keyProID])*$_SESSION['ses_cart_pro_price'][$keyProID];
    header("Location:cart.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
<div style="margin:auto;width:80%;">  
 <h3>Cart Page {<?=$_SESSION['ses_name_user']?>}</h3>
  <br>
  <a href="list.php">List</a> |  <a href="member.php">Member</a><br>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total Price</th>
            <th>Remove</th>
        </tr>
    </thead>
<tbody>
 
<?php
if(count($_SESSION['ses_cart_id_product'])>0){
    $i=1;
    foreach($_SESSION['ses_cart_id_product'] as $k_pro_id=>$v_pro_id){
        $qty_data=array_sum($_SESSION['ses_cart_pro_qty'][$k_pro_id]);
?>
<tr>
    <td><?=$i?></td>
    <td><?=$_SESSION['ses_cart_pro_name'][$k_pro_id]?></td>
    <td><?=$_SESSION['ses_cart_pro_price'][$k_pro_id]?></td>
    <td>
    <select name="qty[]" onchange="window.location='?u_pro_id=<?=$k_pro_id?>&new_qty='+this.value+'&update'">
       <?php for($v=1;$v<=10;$v++){?>
        <option value="<?=$v?>" <?=($qty_data==$v)?"selected":""?> ><?=$v?></option>
        <?php } ?>
    </select>
      </td>
    <td><?=$_SESSION['ses_cart_pro_total_price'][$k_pro_id]?></td>
    <td><a href="?d_pro_id=<?=$k_pro_id?>&remove">Remove</a></td>
</tr>
<?php $i++; } } ?>
<?php
if(count($_SESSION['ses_cart_pro_total_price'])>0){
?>
<tr>
   <td colspan="3"></td>
   <td><?=count($_SESSION['ses_cart_pro_qty'],1)-count($_SESSION['ses_cart_pro_qty'])?></td>
   <td><?=array_sum($_SESSION['ses_cart_pro_total_price'])?></td>
    <td>
    <input type="button" onclick="window.location='checkout.php'" value="Checkout">
    </td>
</tr>
<?php } ?>
</tbody>
</table>
 
</div>          
</body>
</html>