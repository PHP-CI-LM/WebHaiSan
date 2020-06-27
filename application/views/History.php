<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title><?php echo app_title() ?> - Lịch sử mua hàng</title>
	<link rel="icon" type="image/png" href="<?php echo base_url() ?>static/image/LOGO.ico" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/stylesheet.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/styleView.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/styleDialog.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/styleCart.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<script type="text/javascript" src="<?php echo base_url() ?>static/js/jquery-3.3.1.min.js"></script>
</head>

<body>
	<?php require_once("comp/Header.php") ?>

	<div class="container-fluid" id="content" style="margin-top: 165px !important;">
		<article>
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
									</tr>
								</thead>
								<tbody>
									<?php
										if (true == isset($orders) && 0 < sizeof($orders)) {
											foreach ($orders as $order) {
												echo '<tr>';
												echo '<td class="a-center">' . $order['OrderID'] . '</td>';
												echo '<td class="a-center">' . $order['OrderDate'] . '</td>';
												echo '<td>' . $order['Ward'] . ', ' . $order['District'] . ', ' . $order['Province'] . '</td>';
												echo '<td class="a-center">' . $order['Price'] . '</td>';
												if (0 == $order['Status']) {
													echo '<td class="a-center">Đang giao hàng</td>';
												} else if (1 == $order['Status']) {
													echo '<td class="a-center">Đã giao hàng</td>';
												}
												echo '<td class="a-center"><a href="'. base_url() .'kiem-tra-don-hang.html?oid=' . str_replace("/", "", $order["OrderDate"]).$order["OrderID"] . '">Chi tiết >></a></td>';
												echo '</tr>';
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
</body>

</html>