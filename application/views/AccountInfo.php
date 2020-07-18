<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo app_title()?> - Thông tin tài khoản</title>
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

    <div class="container" id="content" style="padding-left: 5rem; padding-top: 20px;">
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
                        <li><span><a href="<?php echo base_url() ?>order/lich-su-mua-hang.html"><i class="fa fa-shopping-cart" style="padding-right:15px;"></i> Lịch sử mua hàng</a></span></li>
                        <li><span><a href="<?php echo base_url() ?>user/doi-mat-khau.html"><i class="fa fa-key" style="padding-right:15px;"></i> Đổi mật khẩu</a></span></li>
                        <li><span><a href="<?php echo base_url() ?>dang-xuat.html"><i class="fa fa-sign-out" style="padding-right:15px;"></i> Đăng xuất</a></span></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-sm-12" style="padding-left: 0;">
                        <ul class="breadcrumb" itemtype="http://schema.org/BreadcrumbList" style="margin-left: 5px; margin-bottom: 5px;">
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
                    <?php if (isset($data)) { ?>
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="header">
                                <h2>Thông tin tài khoản</h2>
                                <span class="actions">
                                    <img class="edit" style="" src="<?php echo base_url() . 'static/image/icon/edit.png' ?>">
                                    <img class="save hidden" style="" src="<?php echo base_url() . 'static/image/icon/save.png' ?>">
                                    <img class="loading hidden" style="" src="<?php echo base_url() . 'static/image/gif/loading.gif' ?>">
                                    <img class="success hidden" style="" src="<?php echo base_url() . 'static/image/icon/success.png' ?>">
                                    <img class="error hidden" style="" src="<?php echo base_url() . 'static/image/icon/error.png' ?>">
                                    <img class="cancel hidden" style="" src="<?php echo base_url() . 'static/image/icon/close.png' ?>">
                                </span>
                            </div>
                            <div class="detail">
                                <div class="form-info username">
                                    <label for="NameSignUp">Tên đăng nhập: </label>
                                    <span class="info"><?php echo $data["UserName"]; ?></span>
                                </div>
                                <div class="form-info email">
                                    <label>Email: </label>
                                    <span class="info"><?php echo $data["Email"]; ?></span>
                                </div>
                                <div class="form-info password">
                                    <label for="Password">Mật khẩu: </label>
                                    <span class="info">********************</span>
                                </div>
                                <div class="form-info avatar" style="align-items: center;">
                                    <label for="Avatar">Ảnh đại diện: </label>
                                    <?php
                                        if (isset($data['Avatar'])) {
                                            echo '<span class="info"><img src="' . base_url() . 'static/image/avatar/'. $data['Avatar'] . '" style="max-width: 40px; border-radius: 50%"></span>';
                                            echo '<input type="file" class="info input hidden" name="avatar" accept="image/png, image/jpeg">';
                                        } else {
                                            echo '<input type="file" class="info input fixed" name="avatar" accept="image/png, image/jpeg">';
                                        }
                                        ?>
                                </div>
                            </div>

                            <div class="header">
                                <h2>Thông tin tài khoản</h2>
                                <span class="actions">
                                    <img class="edit" style="" src="<?php echo base_url() . 'static/image/icon/edit.png' ?>">
                                    <img class="save hidden" style="" src="<?php echo base_url() . 'static/image/icon/save.png' ?>">
                                    <img class="loading hidden" style="" src="<?php echo base_url() . 'static/image/gif/loading.gif' ?>">
                                    <img class="success hidden" style="" src="<?php echo base_url() . 'static/image/icon/success.png' ?>">
                                    <img class="error hidden" style="" src="<?php echo base_url() . 'static/image/icon/error.png' ?>">
                                    <img class="cancel hidden" style="" src="<?php echo base_url() . 'static/image/icon/close.png' ?>">
                                </span>
                            </div>
                            <div class="detail">
                                <div class="form-info">
                                    <label for="UserSignUp">Tên người dùng: </label>
                                    <span class="info"><?php echo $data["CustomerName"]; ?></span>
                                    <input class="info input hidden" type="text" name="customerName" value="<?php echo $data["CustomerName"]; ?>">
                                </div>
                                <div class="form-info sex">
                                    <label for="Sex">Giới tính: </label>
                                    <span class="info">
                                        <?php
                                            if ($data["Sex"] == 0) echo "Nam";
                                            else echo "Nữ";
                                            ?>
                                    </span>
                                    <select class="info input hidden" name="sex">
                                        <?php
                                            if ($data["Sex"] == 0) {
                                                echo '<option value="0" selected>Nam</option>';
                                                echo '<option value="1">Nữ</option>';
                                            } else {
                                                echo '<option value="0">Nam</option>';
                                                echo '<option value="1" selected>Nữ</option>';
                                            }
                                            ?>
                                    </select>
                                </div>
                                <div class="form-info">
                                    <label for="Address">Địa chỉ: </label>
                                    <span class="info"><?php echo $data["Address"]; ?></span>
                                    <input class="info input hidden" type="text" name="address" value="<?php echo $data["Address"]; ?>">
                                </div>
                                <div class="form-info">
                                    <label for="PhoneNumber">Số điện thoại: </label>
                                    <span class="info"><?php echo $data["Phone"]; ?></span>
                                    <input class="info input hidden" type="text" name="phone" value="<?php echo $data["Phone"]; ?>">
                                </div>
                            </div>
                        </form>
                        <input type="text" class="cid hidden" value="<?php echo $data["CustomerID"]; ?>">
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <input type="text" class="base_url hidden" value="<?php echo base_url(); ?>">

    <?php require_once("comp/Footer.php") ?>

    <script type="text/javascript" src="<?php echo base_url() ?>static/js/ActionInfo.js"></script>
</body>

</html>