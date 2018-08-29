<?php
session_start();
include '../function/conn.php';
?>

<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Chocolate Shop</title>

        <!-- Bootstrap core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../css/heroic-features.css" rel="stylesheet">

    </head>

    <body>

        <!-- Nav -->
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

        <!-- Page Content -->
        <div class="container">

            <!-- Jumbotron Header -->
            <header class="jumbotron my-4">
                <img src="../img/1.gif"width="1000" height="200">
            </header>

            <!-- Page Features -->


            <br>
            <h2>สินค้าทั้งหมด</h2>
            <br>


            <div class="row text-center">
                <?php
                $sql = "SELECT * FROM product";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card">
                                <img class="card-img-top" src="<?php echo "../img/" . $row["img_product"]; ?>" alt="Card image"> <div class="card-body">
                                    <h4 class="card-title"><?php echo $row["name_product"]; ?></h4>

                                    <p class="card-text"><h5>รายละเอียด:</h5><?php echo $row["descript_product"]; ?></p>
                                    <p class="card-text">ราคา <?php echo $row["price_product"]; ?></p>
                                </div>
                                <div class="card-footer">
                                    <a href="#" class="btn btn-primary">เพิ่มไปยังรถเข็น</a>
                                </div>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
        </div>
        <!-- /.row -->
        <!-- /.container -->

        <!-- Section: contact -->
        <section id="contact" class="home-section text-center">
            <div class="heading-contact">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="wow bounceInDown" data-wow-delay="0.4s">
                                <div class="section-heading">
                                    <h2>Store address</h2>
                                    <i class="fa fa-2x fa-angle-down"></i>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">

                <div class="row">
                    <div class="col-lg-2 col-lg-offset-5">
                        <hr class="marginbot-50">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7">

                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15087.203405538294!2d99.8963421!3d19.0284952!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x48422f267bc2c6ec!2z4Lih4Lir4Liy4Lin4Li04LiX4Lii4Liy4Lil4Lix4Lii4Lie4Liw4LmA4Lii4Liy!5e0!3m2!1sth!2sth!4v1532951256466" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>  </div>

                    <div class="col-lg-5">
                        <div class="widget-contact">
                            <h5>social networks</h5>

                            <address>	
                                <ul class="company-social">
                                    <li class="social-facebook"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li class="social-twitter"><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li class="social-dribble"><a href="#" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                                    <li class="social-google"><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </address>

                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- /Section: contact -->

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="wow shake" data-wow-delay="0.4s">
                            <div class="page-scroll marginbot-30">
                                <a href="#intro" id="totop" class="btn btn-circle">
                                    <i class="fa fa-angle-double-up animated"></i>
                                </a>
                            </div>
                        </div>
                        <p>&copy;NISARA SONGKAMCHUM.</p>
                        <div class="credits">
                            <!--
                              All the links in the footer should remain intact. 
                              You can delete the links only if you purchased the pro version.
                              Licensing information: https://bootstrapmade.com/license/
                              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Squadfree
                            -->
                            SOFTWARE ENGINEERING
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Bootstrap core JavaScript -->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>

</html>
