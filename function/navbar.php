<?php
include '../function/conn.php'; 

class navbar {

    function navbarOpen($status) {
        if ($status == '1') {
            ?>
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span> 
                        </button>
                        <a class="navbar-brand"><?php echo $_SESSION["Restname"]; ?></a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li><a href="../menu/menu.php">เมนูอาหาร</a></li>
                            <li><a href="../order/order.php">สั่งอาหาร</a></li>
                            <li><a href="../stock/stock.php?page=1">วัตถุดิบ</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">รายงานการขาย
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="../stock/in.php">รายรับ</a></li>
                                    <li><a href="../stock/pay.php">รายจ่าย</a></li>
                                    <li><a href="../stock/graph.php">กราฟเปรียบเทียบ</a></li>
                                </ul>
                            </li>
<!--                            <li><a href="../stock/expstock.php">วัตถุดิบใกล้หมด</a></li>-->
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION["Name"] ?>
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="../login/portf.php">ข้อมูลผู้ใช้</a></li>
                                    <li><a class="page-scroll" data-toggle="modal" href="#out">ออกจากระบบ</a></li>
                                </ul>
                            </li>
                        </ul>


                    </div></div>
            </nav> 
           
 
            
           
            
            
            <!--      out -->
            <div class="modal fade" id="out" tabindex="-1" role="dialog" aria-labelledby="model" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            คุณต้องการออกจากระบบหรือไม่?
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ไม่</button>
                            <a class="btn btn-primary" href="../login/logout.php">ใช่</a>
                        </div>

                    </div>
                </div>
            </div>
            
            
            <?php
        } elseif ($status == '2') {
            ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">Chocolate Shop</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">สินค้า</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">การซื้อของฉัน
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="fas fa-shopping-cart"></i>ตะกร้าสินค้า</a></li>
                                <li><a href="#"><span class="mdi-tag"></span>ที่ต้องชำระ</a></li>
                                <li><a href="#"><span class="mdi-package-variant"></span>ที่ต้องได้รับ</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">บัญชีของฉัน<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a data-toggle="modal" href="#"><span class="mdi-account-circle"></span>ข้อมูลของฉัน</a></li>
                                <li><a data-toggle="modal" href="#">ออกจากระบบ</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
            
      
            <!--      out -->
            <div class="modal fade" id="out" tabindex="-1" role="dialog" aria-labelledby="model" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            คุณต้องการออกจากระบบหรือไม่?
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ไม่</button>
                            <a class="btn btn-primary" href="../login/logout.php">ใช่</a>
                        </div>

                    </div>
                </div>
            </div>
            <?php
        }
    }

}
?>
    