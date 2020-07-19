<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title><?php echo app_title() ?> - Lịch sử mua hàng</title>
	<link rel="icon" type="image/png" href="<?php echo base_url() ?>static/image/LOGO.ico" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/stylesheet.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/style.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/styleInfo.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<script type="text/javascript" src="<?php echo base_url() ?>static/js/jquery-3.3.1.min.js"></script>
</head>

<body>
	<?php require_once("comp/Header.php") ?>

	<div class="container-fluid" id="content" style="margin-top: 165px !important;">
		<article>
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
							<ul class="breadcrumb" itemtype="http://schema.org/BreadcrumbList">
								<li itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?php echo base_url() ?>"> <span itemprop="name"> <i class="fa fa-home"></i> Trang chủ
										</span>
									</a> <span><i class="fa fa-angle-right"></i></span>
									<meta itemprop="position" content="1">
								</li>
								<li itemprop="itemListElement" itemtype="http://schema.org/ListItem"> <a itemprop="item" href="javascript:void(0)"> <strong itemprop="name">Lịch sử mua hàng</strong></a>
									<meta itemprop="position" content="3">
								</li>
							</ul>
						</div>

						<div class="cart-content ng-scope">
							<h1 style="font-size: 24px;"><span>Lịch sử mua hàng</span></h1>
							<div class="cart-block">
								<div class="cart-info table-responsive">
									<table class="table product-list">
										<thead>
											<tr>
												<th class="a-center">Mã</th>
												<th class="a-center">Ngày đặt</th>
												<th class="a-center">Địa chỉ</th>
												<th class="a-center">Thành tiền</th>
												<th class="a-center">Tình trạng</th>
												<th></th>
												<th></th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php
											if (true == isset($orders) && 0 < sizeof($orders)) {
												foreach ($orders as $order) {
													echo '<tr oid="' . str_replace("/", "", $order["OrderDate"]) . $order["OrderID"] . '">';
													echo '<td class="a-center">' . $order['OrderID'] . '</td>';
													echo '<td class="a-center">' . $order['OrderDate'] . '</td>';
													echo '<td>' . $order['Ward'] . ', ' . $order['District'] . ', ' . $order['Province'] . '</td>';
													echo '<td class="a-center">' . $order['Price'] . '</td>';
													echo '<td class="a-center">' . $order['Status'] . '</td>';
													echo '</td>';
													echo '<td class="a-center">';
													echo '<a href="' . base_url() . 'order/kiem-tra-don-hang.html?oid=' . str_replace("/", "", $order["OrderDate"]) . $order["OrderID"] . '" title="Thông tin chi tiết">';
													echo '<i class="fa fa-info"></i>';
													echo '</a></td>';
													echo '<td class="a-center">';
													if ($order["statusCode"] == 1) {
														echo '<a href="' . base_url() . 'order/chinh-sua-don-hang.html?oid=' . str_replace("/", "", $order["OrderDate"]) . $order["OrderID"] . '" title="Chỉnh sửa đơn hàng">';
														echo '<i class="fa fa-edit"></i>';
														echo '</a>';
													}
													echo '</td>';
													echo '<td class="a-center">';
													if ($order["statusCode"] == 1) {
														echo '<a id="cancelOrder" href="javascript:void(0)" onclick="cancelOrder(this)" title="Hủy đơn hàng">';
														echo '<i class="fa fa-trash"></i>';
														echo '</a>';
													}
													echo '</td></tr>';
												}
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
		</article>
	</div>

	<?php require_once("comp/Footer.php") ?>
	<script>
		function cancelOrder(cancelButton) {
			if (window.confirm('Bạn có chắc chắn muốn hủy đơn này?')) {
				let oid = $($(cancelButton).parents('tr')[0]).attr('oid');
				$.ajax({
					'url': '<?= base_url() ?>order/huy-don-hang.html?oid=' + oid,
					'method': 'get',
					'success': res => {
						let data = JSON.parse(JSON.stringify(res));
						if (typeof data == 'string' || data instanceof String) {
							data = JSON.parse(res);
						}
						if (true == data['status']) {
							alert('Đơn hàng của bạn đã được hủy');
							location.reload();
						} else {
							alert(data['message']);
						}
					},
					'error': (request, status, error) => {
						alert('Lỗi trong quá trình hủy đơn. Vui lòng thử lại')
					}
				});
			}
		}
	</script>
</body>

</html>