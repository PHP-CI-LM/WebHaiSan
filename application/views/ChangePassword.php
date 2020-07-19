<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo app_title() ?> - Thông tin tài khoản</title>
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>static/image/LOGO.ico" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/stylesheet.min.css" data-minify="1" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/styleInfo.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script type="text/javascript" src="<?php echo base_url() ?>static/js/jquery-3.3.1.min.js"></script>

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
                            Thông tin
                        </span>
                    </h3>
                    <ul class="level0">
                        <li><span><a href="<?php echo base_url() ?>user/thong-tin-tai-khoan.html"><i class="fa fa-user-circle-o" style="padding-right:15px;"></i> Thông tin tài khoản</a></span></li>
                        <li class="active"><span><a href="<?php echo base_url() ?>order/lich-su-mua-hang.html"><i class="fa fa-shopping-cart" style="padding-right:15px;"></i> Lịch sử mua hàng</a></span></li>
                        <li><span><a href="<?php echo base_url() ?>user/doi-mat-khau.html"><i class="fa fa-key" style="padding-right:15px;"></i> Đổi mật khẩu</a></span></li>
                        <li><span><a href="<?php echo base_url() ?>dang-xuat.html"><i class="fa fa-sign-out" style="padding-right:15px;"></i> Đăng xuất</a></span></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb" itemtype="http://schema.org/BreadcrumbList" style="margin-bottom: 5px;">
                            <li itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?php echo base_url() ?>"> <span itemprop="name"> <i class="fa fa-home"></i> Trang chủ
                                    </span>
                                </a> <span><i class="fa fa-angle-right"></i></span>
                                <meta itemprop="position" content="1">
                            </li>
                            <li itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a itemprop="item" href="javascript:void(0)"> <strong itemprop="name">Quên mật khẩu</strong>
                                </a>
                                <meta itemprop="position" content="3">
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-12">
                        <div class="board">
                            <h2 class="title">Đổi mật khẩu</h2>
                            <p style="text-align: center;">Vui lòng nhập đầy đủ thông tin dưới đây để quá trình đổi mật khẩu thành công.</p>
                            <form class="change-password" action="" method="post">
                                <div class="form-group">
                                    <label for="currentPass">Mật khẩu hiện tại:</label>
                                    <input type="password" name="currentPass" id="currentPass" class="currentPass" placeholder="" />
                                </div>
                                <div class="form-group">
                                    <label for="newPass">Mật khẩu mới:</label>
                                    <input type="password" name="newPass" id="newPass" class="newPass" placeholder="" />
                                </div>
                                <div class="form-group">
                                    <label for="confirmNewPass">Nhập lại:</label>
                                    <input type="password" name="confirmNewPass" id="confirmNewPass" class="confirmNewPass" placeholder="" />
                                </div>
                                <div style="max-width: 525px;"><input type="submit" /></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once("comp/Footer.php") ?>

    <script type="text/javascript">
        $(document).ready(() => {
            $('.change-password').submit(event => {
                event.preventDefault();

                let url = $(this).attr('action');
                let currentPass = $('.currentPass').val();
                let newPass = $('.newPass').val();
                let confirmNewPass = $('.confirmNewPass').val();
                $.ajax({
                    'url': url,
                    'method': 'post',
                    'data': {
                        'currentPass': currentPass,
                        'newPass': newPass,
                        'confirmNewPass': confirmNewPass
                    },
                    success: res => {
                        let data = JSON.parse(JSON.stringify(res));
                        if (typeof data == 'string' || data instanceof String) {
                            data = JSON.parse(res);
                        }
                        if (true == data['status']) {
                            alert('Đổi mật khẩu thành công, vui lòng đăng nhập lại');
                            window.location.href = '<?= base_url() . '/dang-xuat.html?back_url=' . urlencode(base_url() . '/dang-nhap.html') ?>';
                        } else {
                            alert(data['message']);
                            $('.currentPass').val('');
                            $('.newPass').val('');
                            $('.confirmNewPass').val('');
                        }
                    },
                    'error': (request, status, error) => {
                        alert('Lỗi trong quá trình đổi mật khẩu. Vui lòng thử lại')
                    }
                });
            })
        })
    </script>
</body>

</html>