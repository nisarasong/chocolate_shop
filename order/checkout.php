<?php
session_start();
/*$html = new htmlDefault();
include '../function/navbar.php';
$navbar = new navbar();*/
include '../function/conn.php';
?>
<?php
// บันทึกข้อมูลลงตาราง tbl_order
if(isset($_POST['save_order']) && $_POST['name']!=""){
    $total_qty=count($_SESSION['ses_cart_pro_qty'],1)-count($_SESSION['ses_cart_pro_qty']);
    $total_price=array_sum($_SESSION['ses_cart_pro_total_price']);
    $q="
        INSERT INTO tbl_order (  
           id_oder,  
           id_user,  
           qty_order,  
           price_order,  
           name,  
           address  
        ) VALUES (  
            NULL,
           '".$_SESSION['ses_cus_id']."',  
           '".$total_qty."',  
           '".$total_price."',  
           '".trim(addslashes($_POST['name']))."',  
           '".trim(addslashes($_POST['addresss']))."' 
        )  
    ";
    $mysqli->query($q);
    $order_id=$mysqli->insert_id;
 
    // วนลูปบันทึกแต่ละรายการลง tbl_orderdetail แล้วลบ session
    if(count($_SESSION['ses_cart_pro_id'])>0){
        foreach($_SESSION['ses_cart_pro_id'] as $k_pro_id=>$v_pro_id){
            $qty_data=array_sum($_SESSION['ses_cart_pro_qty'][$k_pro_id]);
            $q="
                INSERT INTO tbl_orderdetail (  
                    id_orderdetail,
                    id_order,  
                    id_product,  
                    name_product,  
                    price_product,  
                    qty_product,  
                    total_price_product
                ) VALUES (  
                    NULL,
                    '".$order_id."',  
                   '".$k_pro_id."',  
                   '".trim(addslashes($_SESSION['ses_cart_pro_name'][$k_pro_id]))."',  
                   '".$_SESSION['ses_cart_pro_price'][$k_pro_id]."',  
                   '".$qty_data."',  
                   '".$_SESSION['ses_cart_pro_total_price'][$k_pro_id]."' 
                )  
            ";
            $mysqli->query($q);
             
             
            $keyProID=$k_pro_id;
            unset($_SESSION['ses_cart_pro_id'][$keyProID]);
            unset($_SESSION['ses_cart_pro_name'][$keyProID]);
            unset($_SESSION['ses_cart_pro_qty'][$keyProID]);
            unset($_SESSION['ses_cart_pro_price'][$keyProID]);
            unset($_SESSION['ses_cart_pro_total_price'][$keyProID]);            
     } 
    }        
    header("Location:order.php");  
    exit;  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
<div style="margin:auto;width:80%;">  
 <h3>Checkout Page {<?=$_SESSION['ses_name_user']?>}</h3>
  <br>
  <a href="list.php">List</a> |  <a href="member.php">Member</a><br>
<form id="myform" method="post" action="">    
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
if(count($_SESSION['ses_cart_pro_id'])>0){
    $i=1;
    foreach($_SESSION['ses_cart_pro_id'] as $k_pro_id=>$v_pro_id){
        $qty_data=array_sum($_SESSION['ses_cart_pro_qty'][$k_pro_id]);
?>
<tr>
    <td><?=$i?></td>
    <td><?=$_SESSION['ses_cart_pro_name'][$k_pro_id]?></td>
    <td><?=$_SESSION['ses_cart_pro_price'][$k_pro_id]?></td>
    <td><?=$qty_data?></td>
    <td><?=$_SESSION['ses_cart_pro_total_price'][$k_pro_id]?></td>
</tr>
<?php $i++; } } ?>
<?php
if(count($_SESSION['ses_cart_pro_total_price'])>0){
?>
<tr>
   <td colspan="3">
       <input type="button" onclick="window.location='cart.php'" value="Edit">
   </td>
   <td><?=count($_SESSION['ses_cart_pro_qty'],1)-count($_SESSION['ses_cart_pro_qty'])?></td>
   <td><?=array_sum($_SESSION['ses_cart_pro_total_price'])?></td>
</tr>
<tr>
    <th>Name:</th>
    <td colspan="4">
    <input type="text" name="name" id="name" size="50">    
    </td>
</tr>
<tr>
    <th>Address:</th>
    <td colspan="4">
    <textarea name="addresss" id="addresss" cols="50" rows="5"></textarea>    
    </td>
</tr>
<tr>
    <th></th>
    <td colspan="4">
      <input type="submit" name="save_order"  value="บันทึกการสั่งซื้อ">  
    </td>
</tr>
<?php } ?>
</tbody>
</table>
    </form>
 
</div>              
</body>
</html>