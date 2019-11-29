<!DOCTYPE html>
<>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Xem giỏ hàng</title>
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

		<div class="container-fluid" id="content">
			<article>
				<div class="row">
					<div class="col-sm-12">
						<ul class="breadcrumb" itemtype="http://schema.org/BreadcrumbList">
							<li itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?php echo base_url() ?>"> <span itemprop="name"> <i class="fa fa-home"></i> Trang chủ
									</span>
								</a> <span><i class="fa fa-angle-right"></i></span>
								<meta itemprop="position" content="1">
							</li>
							<li itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a itemprop="item" href="Login"> <strong itemprop="name">Giỏ hàng</strong></a>
								<meta itemprop="position" content="3">
							</li>
						</ul>
					</div>

					<div class="cart-content ng-scope">
						<h1 style="font-size: 24px;"><span>Giỏ hàng của tôi</span></h1>
						<div class="steps clearfix">
							<ul class="clearfix">
								<li class="cart active col-md-2 col-xs-12 col-sm-4 col-md-offset-3 col-sm-offset-0 col-xs-offset-0"><span><i class="glyphicon glyphicon-shopping-cart"></i></span><span>Giỏ hàng của tôi</span><span class="step-number"><a>1</a></span></li>
								<li class="payment col-md-2 col-xs-12 col-sm-4"><span><i class="glyphicon glyphicon-usd"></i></span><span>Thanh toán</span><span class="step-number"><a>2</a></span></li>
								<li class="finish col-md-2 col-xs-12 col-sm-4"><span><i class="glyphicon glyphicon-ok"></i></span><span>Hoàn tất</span><span class="step-number"><a>3</a></span></li>
							</ul>
						</div>
						<div class="cart-block">
							<div class="cart-info table-responsive">
								<table class="table product-list">
									<thead>
										<tr>
											<th></th>
											<th>Tên sản phẩm</th>
											<th>Giá</th>
											<th>Khối lượng</th>
											<th>Thành tiền</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php
										if (!(isset($carts) == false || sizeof($carts) == 0)) {
											for ($i = 0; $i < sizeof($carts); $i++) {
												$product = (array) $carts[$i];
												echo "<tr id=\"" . $product["id_product"] . "\" c-name=\"" . $product["cookie_name"] . "\">";
												echo "<td class=\"image\">";
												echo "<a href=\"/san-pham/so-diep.html\"> <img class=\"img-responsive\" src=\"" . $product["DuongDan"] . "\"></a>";
												echo "</td>";
												echo "<td class=\"des\">";
												echo "<a href=\"/san-pham/so-diep.html\">" . $product["name_product"] . "</a>";
												echo "<span></span>";
												echo "</td>";
												echo "<td class=\"price\">" . number_format($product["price"]) . "đ/kg</td>";
												echo "<td class=\"quantity\">";
												echo "<input type=\"number\" value=\"" . $product["count"] . "\" step=\"0.1\" min=\"0.5\" max=\"100\" class=\"text\" oninput=\"changeQuantity(this)\">";
												echo "</td>";
												echo "<td class=\"amount\">";
												echo number_format($product["price"] * $product["count"]) . "đ";
												echo "</td>";
												echo "<td class=\"text-center\">";
												echo "<a onclick=\"removeProductFromCart(this)\" href=\"javascript:void(0)\">";
												echo "<i class=\"fa fa-trash\"></i>";
												echo "</a></td></tr>";
											}
										}
										?>
									</tbody>
								</table>
							</div>
							<div class="clearfix text-right" id="bill">
								<span id="label"><b>Tổng thanh toán:</b></span>
								<span class="pay-price" id="totalPrice">
									<?php
									$sum = 0;
									if (isset($carts) == true && sizeof($carts) > 0) {
										for ($i = 0; $i < sizeof($carts); $i++) {
											$product = $carts[$i];
											$sum = $sum + ($product["price"] * $product["count"]);
										}
									}
									echo number_format($sum) . "đ";
									?>
								</span>
							</div>
							<div class="button-modify" style="text-align: right;">
								<div class="button-rect forest" id="button-confirm">
									<?php
									$sum = 0;
									if ($sum == 0)
										echo "<a><i class=\"fa fa-money\"></i> <span class=\"content-inner\">Thanh toán</span></a>";
									else
										echo "<a class=\"login-window\" href=\"#confirm-form\"><i class=\"fa fa-money\"></i> <span class=\"content-inner\">Thanh toán</span></a>";
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</article>
		</div>

		<?php require_once("comp/Footer.php") ?>
		<script type="text/javascript" src="<?php echo base_url() ?>static/js/Cookies.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>static/js/Action.js"></script>

	</body>

	</html>