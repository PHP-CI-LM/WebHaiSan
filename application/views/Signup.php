<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Đăng ký thành viên</title>
	<link rel="icon" type="image/png" href="<?php echo base_url() ?>static/image/LOGO.ico" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/stylesheet.css" data-minify="1" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/sheet.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/styleDialog.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
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
						<ul class="breadcrumb" itemtype="http://schema.org/BreadcrumbList">
							<li itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a itemprop="item" href="http://localhost:8080/Web_Ban_Sach/"> <span itemprop="name"> <i class="fa fa-home"></i> Trang chủ
									</span>
								</a> <span><i class="fa fa-angle-right"></i></span>
								<meta itemprop="position" content="1">
							</li>
							<li itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a itemprop="item" href="Login"> <strong itemprop="name">Đăng ký</strong>
								</a>
								<meta itemprop="position" content="3">
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>

		<section>
			<div class="container">
				<div class="row">
					<div class="clearfix"></div>
					<div class="col-sm-12 col-xs-12 col-md-12">
						<div class="row">
							<div class="col-sm-12">
								<div class="board">
									<?php echo form_open('sign-up.html'); ?>
									<?php echo validation_errors(); ?>
									<form action="#" method="POST">
										<div class="form-group">
											<label class="control-label" for="NameSignUp">Tên đăng nhập</label>
											<input type="text" class="form-control" name="username" value="" placeholder="User name" maxlength="20" autocomplete="off" id="NameSignUp" required>
										</div>
										<div class="form-group">
											<label class="control-label" for="Password">Mật khẩu</label> 
											<input type="password" class="form-control" name="password" value="" placeholder=" Your password" id="password" maxlength="50" onchange='check_pass();'> 
										</div>
										<div class="form-group">
											<label class="control-label" for="Confirmpassword">Xác nhận mật khẩu</label> 
											<input type="password" class="form-control" name="confirm" value="" placeholder=" Confirm your password" id="confirm_password" maxlength="50"  onchange='check_pass();'>
										</div>
										<div class="form-group">
											<label class="control-label" for="UserSignUp">Tên người dùng</label>
											<input type="text" class="form-control" name="customername" value="" placeholder="Your name" maxlength="50" autocomplete="off" id="UserSignUp" required>
										</div>
										<div class="form-group">
											<label class="control-label" for="Sex">Giới tính</label> 
											<select class="form-control" name="sex" id="Sex">
												<option>Nam</option>
												<option>Nữ</option>
											</select>
										</div>
										<div class="form-group">
											<label class="control-label" for="Address">Địa chỉ</label> 
											<input type="text" class="form-control" name="address" value="" placeholder="Address" maxlength="255" id="Address" required>
										</div>
										<div class="form-group">
											<label class="control-label" for="PhoneNumber">Số điện thoại</label> 
											<input type="number" class="form-control" name="phone" value="" placeholder=" Your phone number" maxlength="10" id="PhoneNumber" required>
										</div>
										<input type="submit" id="submit" value="Đăng ký" class="btn btn-primary" id="btn-search" style="width: max-content !important" disabled>
										<a class="forget-password" href="#form"><i class="fa fa-question-circle" id="QuenMK"></i></a>
									</form>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<?php require_once('comp/Footer.php') ?>

	<script type="text/javascript">
		$(document).ready(function() {
			$('a.forget-password').click(function() {
				//lấy giá trị thuộc tính href - chính là phần tử "#login-box"
				var loginBox = $(this).attr('href');

				//cho hiện hộp đăng nhập trong 300ms
				$(loginBox).fadeIn(300);

				// thêm phần tử id="over" vào sau body
				$('body').append('<div id="over">');
				$('#over').fadeIn(300);

				return false;
			});

			// khi click đóng hộp thoại
			$(document).on('click', "a.close, #over, button.submit-button", function() {
				$('#over, .dialog').fadeOut(300, function() {
					$('#over').remove();
				});
				return false;
			});
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