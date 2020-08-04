<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title><?php echo app_title()?> - Đăng ký thành viên</title>
	<link rel="icon" type="image/png" href="<?php echo base_url() ?>static/image/LOGO.ico" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/stylesheet.min.css" data-minify="1" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/style.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/sheet.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/styleDialog.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<script type="text/javascript" src="<?php echo base_url() ?>static/js/jquery-3.3.1.min.js"></script>
	<script>
		$(document).ready(function() {
			$("#btn-search").click(function() {
				var id = $("#nameLogin").val().length;
				var pass = $("#passLogin").val().length;
				if (id == 0 || pass == 0) alert("Tên đăng nhập hoặc mật khẩu không được để trống");
			});
		});
	</script>
</head>

<body>

	<?php require_once('comp/Header.php') ?>
	<div class="container" id="content">
		<section>
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<ul class="breadcrumb" itemtype="http://schema.org/BreadcrumbList" style="margin-top: 30px; margin-bottom: 5px;">
							<li itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?php echo base_url()?>"> <span itemprop="name"> <i class="fa fa-home"></i> Trang chủ
									</span>
								</a> <span><i class="fa fa-angle-right"></i></span>
								<meta itemprop="position" content="1">
							</li>
							<li itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a itemprop="item" href="javascript:void(0)"> <strong itemprop="name">Đăng ký</strong>
								</a>
								<meta itemprop="position" content="3">
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>

		<article style="padding-left: 50px; padding-right: 50px;">
			<div class="container">
				<div class="row">
					<div class="clearfix"></div>
					<div class="col-sm-12 col-xs-12 col-md-12">
						<div class="row">
							<div class="col-sm-12">
								<div class="board">
									<?php echo form_open('dang-ky-thanh-vien.html'); ?>
									<?php echo validation_errors(); ?>
									<form action="#" method="POST">
										<h2>Thông tin tài khoản</h2>
										<div class="form-group" style="display:flex;">
											<label class="control-label" for="NameSignUp" style="flex-basis: 15%; text-align: right;">Tên đăng nhập (*)</label>
											<input type="text" class="form-control" name="username" value="" placeholder="User name" maxlength="30" autocomplete="on" id="NameSignUp" required style="flex-basis: 85%; max-width: 60%; margin-left: 3rem;">
										</div>
										<div class="form-group" style="display:flex;">
											<label class="control-label" for="Email" style="flex-basis: 15%; text-align: right;">Email (*)</label>
											<input type="text" class="form-control" name="email" value="" placeholder="Example: user@email.com" maxlength="50" autocomplete="on" id="Email" required style="flex-basis: 85%; max-width: 60%; margin-left: 3rem;">
										</div>
										<div class="form-group" style="display:flex">
											<label class="control-label" for="Password" style="flex-basis: 15%; text-align: right;">Mật khẩu (*)</label> 
											<input type="password" class="form-control" name="password" value="" placeholder=" Your password" id="password" maxlength="50" onchange='check_pass();' style="min-width: 250px; max-width: 300px; margin-left: 3rem; flex-basis: 85%;"> 
										</div>
										<div class="form-group" style="display:flex;">
											<label class="control-label" for="Confirmpassword" style="flex-basis: 15%; text-align: right;">Xác nhận (*)</label> 
											<input type="password" class="form-control" name="confirm" value="" placeholder=" Confirm your password" id="confirm_password" maxlength="50"  onchange='check_pass();' style="min-width: 250px; max-width: 300px; margin-left: 3rem; flex-basis: 85%;">
										</div>
										<h2>Thông tin cá nhân</h2>
										<div class="form-group" style="display:flex;">
											<label class="control-label" for="UserSignUp" style="flex-basis: 15%; text-align: right;">Tên người dùng (*)</label>
											<input type="text" class="form-control" name="customername" value="" placeholder="Your name" maxlength="50" autocomplete="off" id="UserSignUp" required style="max-width: 60%; margin-left: 3rem; flex-basis: 85%;">
										</div>
										<div class="form-group" style="display:flex;">
											<label class="control-label" for="Sex" style="flex-basis: 15%; text-align: right;">Giới tính (*)</label> 
											<select class="form-control" name="sex" id="Sex" style="max-width: 60%; flex-basis: 85%; margin-left: 3rem;">
												<option>Nam</option>
												<option>Nữ</option>
											</select>
										</div>
										<div class="form-group" style="display:flex;">
											<label class="control-label" for="Address" style="flex-basis: 15%; text-align: right;">Địa chỉ (*)</label> 
											<input type="text" class="form-control" name="address" value="" placeholder="Address" maxlength="255" id="Address" required style="max-width: 60%; flex-basis: 85%; margin-left: 3rem;">
										</div>
										<div class="form-group" style="display:flex;">
											<label class="control-label" for="PhoneNumber" style="flex-basis: 15%; text-align: right;">Số điện thoại (*)</label> 
											<input type="text" class="form-control" name="phone" value="" placeholder=" Your phone number" maxlength="10" id="PhoneNumber" required style="max-width: 60%; flex-basis: 85%; margin-left: 3rem;">
										</div>
										<div style="display: block; text-align: center;">
											<input type="submit" id="submit" value="Đăng ký" class="btn btn-primary" id="btn-search" style="width: max-content !important; margin-right: 10%;" disabled>
										</div>
									</form>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div>

	<?php require_once("comp/Footer.php") ?>
	
	<script type="text/javascript">
		$(document).ready(function() {
		});

		function check_pass() {
			if (document.getElementById('password').value ==
				document.getElementById('confirm_password').value) {
				document.getElementById('submit').disabled = false;
			} else {
				document.getElementById('submit').disabled = true;
			}
		}
	</script>
</body>

</html>