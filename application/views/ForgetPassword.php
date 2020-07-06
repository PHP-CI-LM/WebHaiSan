<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo app_title() ?> - Thông tin tài khoản</title>
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>static/image/LOGO.ico" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/stylesheet.css" data-minify="1" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script type="text/javascript" src="<?php echo base_url() ?>static/js/jquery-3.3.1.min.js"></script>

</head>

<body>
    <!-- Phần header cho trang Web -->
    <?php require_once("comp/Header.php") ?>

    <div class="container" id="content" style="padding-left: 5rem; padding-top: 20px;">
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
                    <h2 class="title">Khôi phục mật khẩu</h2>
                    <p>Vui lòng nhập địa chỉ email của tài khoản mà bạn muốn khôi phục. Chúng tôi sẽ gửi liên kết đến mail của bạn để tiến hành khôi phục lại mật khẩu. Liên kết có hiệu lực trong 12h.</p>
                    <form class="reset-password" action="" method="post">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="email" placeholder="Example: user@email.com" />
                        <input type="submit" />
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php require_once("comp/Footer.php") ?>

    <script type="text/javascript">
        $(document).ready(() => {
            $('.reset-password').submit(event => {
                event.preventDefault();

                let email = $('.email').val();
                let url = $(this).attr('action');
                $.ajax({
                    'url': url,
                    'method': 'post',
                    'data': {
                        'email': email
                    },
                    success: res => {
                        let data = JSON.parse(JSON.stringify(res));
                        if (typeof data == 'string' || data instanceof String) {
                            data = JSON.parse(res);
                        }
                        if (true == data['status']) {
                            alert('Mail khôi phục đã được gửi. Vui lòng kiểm tra hòm thư đến hoặc spam để tiến hành khôi phục mật khẩu');
                            location.replace('<?=base_url()?>');
                        } else {
                            alert(data['message']);
                            $('.email').val('');
                        }
                    },
                    'error': (request, status, error) => {
                        alert('Lỗi trong quá trình gửi mail. Vui lòng thử lại')
                    }
                });
            })
        })
    </script>
</body>

</html>