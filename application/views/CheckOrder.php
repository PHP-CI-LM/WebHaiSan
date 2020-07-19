<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title><?php echo app_title()?> - Xem thông tin đơn hàng</title>
		<link rel="icon" type="image/png" href="<?php echo base_url() ?>static/image/LOGO.ico" />

		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/stylesheet.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/styleView.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/styleDialog.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/style.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/styleCart.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
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
							<?php
							if (isset($stage) && $stage === 'CheckOrder') {
								echo "<li itemprop=\"itemListElement\" itemtype=\"http://schema.org/ListItem\"><a itemprop=\"item\" href=\"javascript:void(0)\"> <strong itemprop=\"name\">Kiểm tra đơn hàng</strong></a><meta itemprop=\"position\" content=\"3\"></li>";
							} else {
								echo "<li itemprop=\"itemListElement\" itemtype=\"http://schema.org/ListItem\"><a itemprop=\"item\" href=\"javascript:void(0)\"> <strong itemprop=\"name\">Kết quả đặt hàng</strong></a><meta itemprop=\"position\" content=\"3\"></li>";
							}
							?>
						</ul>
					</div>

					<div class="cart-content ng-scope">
						<?php
						if (isset($stage) && $stage === 'CheckOrder') {
							echo "<h1 style=\"font-size: 24px;\"><span>Kiểm tra đơn hàng</span></h1>";
							echo "<div class=\"order-tracking-block\">";
							if ($status === false) {
								if ($oid !== null) {
									echo "<div class=\"alert alert-danger\">";
									echo "Không tìm thấy đơn hàng trong hệ thống. Vui lòng kiểm tra lại mã đơn hàng của bạn.";
									echo "</div>";
								}
							}
							echo "<form class=\"form-inline order-input\">";
							echo "<div class=\"form-group\">";
							echo "<label>Nhập mã đơn hàng</label>";
							if ($status === true) {
								echo "<input type=\"text\" class=\"form-control\" placeholder=\"Mã số đơn hàng (VD:123456789)\" value=\"" . $oid . "\" name=\"oid\" required>";
							} else {
								echo "<input type=\"text\" class=\"form-control\" placeholder=\"Mã số đơn hàng (VD:123456789)\" name=\"oid\" required>";
							}
							echo "<button class=\"btn btn-primary\">Xem ngay</button></div></form></div>";
						} else {
							echo "<h1 style=\"font-size: 24px;\"><span>Kết quả đặt hàng</span></h1>";
							echo "<div class=\"order-tracking-block\">";
							if ($status === true) {
								echo "<p>Đơn hàng của quý khách đã đặt thành công</p>";
								if ($oid !== null) {
									echo "<p>Mã đơn hàng của quý khách là: <strong style=\"font-size: large; color: red;\">". $oid . "</strong></p>";
									echo "<p>Quý khách vui lòng lưu giữ lại mã đơn hàng nếu như muốn theo dõi tình hình đơn hàng của mình. </p>";
								}
							} else {
								echo "<p>Đơn hàng của quý khách đã đặt không thành công</p>";
								echo "<p>Quý khách vui lòng thử lại</p>";
							}
							echo "</div>";
						}
						?>
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
										</tr>
									</thead>
									<tbody>
										<?php
										if (!(isset($products) == false || sizeof($products) == 0) && $status === true) {
											for ($i = 0; $i < sizeof($products); $i++) {
												$product = (array) $products[$i];
												echo "<tr id=\"" . $product["id_product"] . "\">";
												echo "<td class=\"image\">";
												echo "<a href=\"" . base_url() . "product/" . vn_to_str($product["name_product"] . "-" . substr("00000" . $product["id_product"], strlen("00000" . $product["id_product"]) - 5, 5)) . ".html\"> <img class=\"img-responsive\" src=\"" . base_url() . "images/" . $product["DuongDan"] . "\" data-src=\"" . base_url() . "images/" . $product["DuongDan"] . "\"></a>";
												echo "</td>";
												echo "<td class=\"des\">";
												echo "<a href=\"" . base_url() . "product/" . vn_to_str($product["name_product"] . "-" . substr("00000" . $product["id_product"], strlen("00000" . $product["id_product"]) - 5, 5)) . ".html\">" . $product["name_product"] . "</a>";
												echo "<span></span>";
												echo "</td>";
												echo "<td class=\"price\">" . number_format((int) ($product["price"] * (100 - $product["discount"]) / 100)) . "đ/kg</td>";
												echo "<td class=\"quantity\">";
												echo "<input type=\"number\" value=\"" . $product["count"] . "\" step=\"0.1\" min=\"0.5\" max=\"100\" class=\"text\" oninput=\"changeQuantity(this)\" readonly=\"readonly\">";
												echo "</td>";
												echo "<td class=\"amount\">";
												echo number_format((int) (($product["price"] * $product["count"]) * (100 - $product["discount"]) / 100)) . "đ";
												echo "</td>";
												echo "</td></tr>";
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
		<script type="text/javascript" src="<?php echo base_url() ?>static/js/Action.min.js"></script>
	</body>

	</html>