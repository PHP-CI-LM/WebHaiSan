<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Thông tin tài khoản - Cảng hải sản tươi ngon</title>
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>static/image/LOGO.ico" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/stylesheet.css" data-minify="1" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/sheet.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/styleInfo.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script type="text/javascript" src="<?php echo base_url() ?>static/js/jquery-3.3.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
    <!-- Phần header cho trang Web -->
    <?php require_once("comp/Header.php") ?>

    <div class="container" id="content" style="padding-left: 5rem;">
        <div class="row">
            <div class="col-md-3">
                <div class="menu">
                    <h3>
                        <span>
                            Sản phẩm
                        </span>
                    </h3>
                    <ul class="level0">
                        <li class="active"><span><a href="<?php echo base_url() ?>"><i class="fa fa-user-circle-o" style="padding-right:15px;"></i> Thông tin tài khoản</a></span></li>
                        <li><span><a href="<?php echo base_url() ?>"><i class="fa fa-shopping-cart" style="padding-right:15px;"></i> Lịch sử mua hàng</a></span></li>
                        <li><span><a href="<?php echo base_url() ?>"><i class="fa fa-sign-out" style="padding-right:15px;"></i> Đăng xuất</a></span></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-sm-12" style="padding-left: 0;">
                        <ul class="breadcrumb" itemtype="http://schema.org/BreadcrumbList" style="margin-left: 5px;">
                            <li itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?php echo base_url() ?>"> <span itemprop="name"> <i class="fa fa-home"></i> Trang chủ
                                    </span>
                                </a> <span><i class="fa fa-angle-right"></i></span>
                                <meta itemprop="position" content="1">
                            </li>
                            <li itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a itemprop="item" href="javascript:void(0)"> <strong itemprop="name">Thông tin tài khoản</strong></a>
                                <meta itemprop="position" content="3">
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="board" style="margin-top: 12px; padding-top: 5px;">
                    <form action="#" method="POST">
                        <h2>Thông tin tài khoản</h2>
                        <div style="display:flex;">
                            <label for="NameSignUp" style="flex-basis: 20%; text-align: right;">Tên đăng nhập: </label>
                            <span style="flex-basis: 80%;">
                                <?php
                                if (isset($data) === true) {
                                    echo $data["UserName"];
                                }
                                ?>
                            </span>
                        </div>
                        <div style="display:flex">
                            <label for="Password" style="flex-basis: 20%; text-align: right;">Mật khẩu: </label>
                            <span style="flex-basis: 80%;">********************</span>
                        </div>
                        <h2>Thông tin cá nhân</h2>
                        <div style="display:flex;">
                            <label for="UserSignUp" style="flex-basis: 20%; text-align: right;">Tên người dùng: </label>
                            <span style="flex-basis: 80%;">
                                <?php
                                if (isset($data) === true) {
                                    echo $data["CustomerName"];
                                }
                                ?>
                            </span>
                        </div>
                        <div style="display:flex;">
                            <label for="Sex" style="flex-basis: 20%; text-align: right;">Giới tính: </label>
                            <span style="flex-basis: 80%;">
                                <?php
                                if (isset($data) === true) {
                                    if ($data["Sex"] == 0) echo "Nữ";
                                    else echo "Nam";
                                }
                                ?>
                            </span>
                        </div>
                        <div style="display:flex;">
                            <label for="Address" style="flex-basis: 20%; text-align: right;">Địa chỉ: </label>
                            <span style="flex-basis: 80%;">
                                <?php
                                if (isset($data) === true) {
                                    echo $data["Address"];
                                }
                                ?>
                            </span>
                        </div>
                        <div style="display:flex;">
                            <label for="PhoneNumber" style="flex-basis: 20%; text-align: right;">Số điện thoại: </label>
                            <span style="flex-basis: 80%;">
                                <?php
                                if (isset($data) === true) {
                                echo $data["Phone"];
                                }
                                ?>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php require_once("comp/Footer.php") ?>
</body>

</html>