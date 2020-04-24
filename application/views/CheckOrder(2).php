<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>WebHaiSan</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/styles.css">
</head>

<body>
    <header class="header">
        <div class="container-fluid d-flex flex-row justify-content-around topbar" style="background-color: #eaeaea;"><span class="text-left flex-grow-0" id="phone"><i class="fa fa-phone" style="width: 22px;"></i>Liên hệ: 01234-567-890</span><span class="text-right" id="tracking"><a href="#"><i class="fa fa-bullseye" style="margin-right: 4px;"></i>Định vị đơn hàng</a></span></div>
        <div class="container d-flex flex-row midbar" style="padding-top: 20px;">
            <div class="form-group d-none d-sm-block flex-grow-1 search" style="position: relative;"><input type="text" placeholder="Nhập thứ muốn tìm..."><i class="material-icons">search</i></div>
            <div class="text-right d-flex flex-row flex-grow-1 justify-content-around align-items-center justify-content-sm-end justify-content-lg-end info">
                <div class="dropdown account"><a class="btn dropdown-toggle d-inline-flex align-items-center" data-toggle="dropdown" aria-expanded="false" role="button"><i class="fa fa-user"></i><span class="text-left d-inline-flex flex-column"><span style="font-weight: 600;font-size: 15px;">Đăng nhập</span><span style="font-size: 12px;">Tài khoản</span></span></a>
                    <div class="dropdown-menu" role="menu" style="background-color: #fcfcfc;"><a class="dropdown-item" role="presentation" href="#">Đăng nhập</a><a class="dropdown-item" role="presentation" href="#">Đăng ký tài khoản</a></div>
                </div><span class="text-right cart"><i class="fa fa-shopping-cart" style="text-align: center;"></i><span style="font-weight: 600;font-size: 15px;">Giỏ hàng</span><span class="count">1</span></span>
            </div>
        </div>
        <nav class="navbar navbar-light navbar-expand-md">
            <div class="container"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav">
                        <li class="nav-item" role="presentation"><a class="nav-link active text-uppercase" href="#">Trang Chủ</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link text-uppercase" href="#">Chính sách</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <article style="background-color: #fefff4;">
        <div class="container">
            <ol class="breadcrumb" style="background-color: transparent;">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" style="font-size: 20px;width: 20px;color: #333333;"></i><span>Trang chủ</span></a></li>
                <li class="breadcrumb-item">
                    <?php
                    if ($stage === 'CheckOrder') {
                        echo '<a href="#"><span style="color: #80bb35;">Kiểm tra đơn hàng</span></a>';
                    } else {
                        echo '<a href="#"><span style="color: #80bb35;">Kết quả đặt hàng</span></a>';
                    }
                    ?>
                </li>
            </ol>
            <form>
                <h6 style="padding-bottom: 10px;">
                    <strong>
                        <?php
                        if ($stage === 'CheckOrder') {
                            echo 'Kiểm tra đơn hàng';
                        } else {
                            echo 'Kết quả đặt hàng';
                        }
                        ?>
                    </strong>
                </h6>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Mã đơn</span>
                    </div>
                    <?php 
                        if ($status === true) {
                            echo '<input class="form-control" type="text" value="' . $oid . '" disable>';
                            echo '<div class="input-group-append"><button class="btn btn-primary" type="button" disable>Check</button></div>';
                        } else {
                            echo '<input class="form-control" type="text">';
                            echo '<div class="input-group-append"><button class="btn btn-primary" type="button">Check</button></div>';
                        }
                    ?>
                </div>
            </form>
            <div style="padding-top: 30px;">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>TÊN SẢN PHẨM</th>
                                <th>GIÁ</th>
                                <th>KHỐI LƯỢNG</th>
                                <th>THÀNH TIỀN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Cell 1</td>
                                <td>Cell 2</td>
                                <td>Cell 3</td>
                                <td>Cell 4</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </article>
    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/vue.js"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/app.js"></script>
</body>

</html>