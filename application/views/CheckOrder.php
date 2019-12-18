<!DOCTYPE html>
<>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Xem thông tin đơn hàng</title>
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
							<li itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a itemprop="item" href="javascript:void(0)"> <strong itemprop="name">Kiểm tra đơn hàng</strong></a>
								<meta itemprop="position" content="3">
							</li>
						</ul>
					</div>

					<div class="cart-content ng-scope">
						<h1 style="font-size: 24px;"><span>Kiểm tra đơn hàng</span></h1>
						<div class="order-tracking-block">
							<?php
							if ($status === false) {
								if ($oid !== null) {
									echo "<div class=\"alert alert-danger\">";
									echo "Không tìm thấy đơn hàng trong hệ thống. Vui lòng kiểm tra lại mã đơn hàng của bạn.";
									echo "</div>";
								}
							}
							?>
							<form class="form-inline order-input">
								<div class="form-group">
									<label>Nhập mã đơn hàng</label>
									<?php
									if ($status === true){
										echo "<input type=\"text\" class=\"form-control\" placeholder=\"Mã số đơn hàng (VD:123456789)\" value=\"". $oid ."\" name=\"oid\" required>";
									}
									else {
										echo "<input type=\"text\" class=\"form-control\" placeholder=\"Mã số đơn hàng (VD:123456789)\" name=\"oid\" required>";
									}
									?>
									<button class="btn btn-primary">Xem ngay</button>
								</div>
							</form>
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
										if (!(isset($products) == false || sizeof($products) == 0) && $status === true) {
											for ($i = 0; $i < sizeof($products); $i++) {
												$product = (array) $products[$i];
												echo "<tr id=\"" . $product["id_product"] . "\">";
												echo "<td class=\"image\">";
												echo "<a href=\"" . base_url() . "product/" . vn_to_str($product["name_product"] . "-" . substr("00000" . $product["id_product"], strlen("00000" . $product["id_product"]) - 5, 5)) . ".html\"> <img class=\"img-responsive\" src=\"" . $product["DuongDan"] . "\"></a>";
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
						</div>
					</div>
				</div>
			</article>
		</div>
	</body>

	</html>