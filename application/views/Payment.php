<!DOCTYPE html>
<>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Xác nhận đơn hàng</title>
		<link rel="icon" type="image/png" href="<?php echo base_url() ?>static/image/LOGO.ico" />

		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/stylesheet.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/styleView.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/styleDialog.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/stylePayment.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<script type="text/javascript" src="<?php echo base_url() ?>static/js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>static/js/Cookies.js"></script>
	</head>

	<body>
		<?php require_once("comp/Header.php") ?>

		<div class="container-fluid" id="content">
			<article>
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb" itemtype="http://schema.org/BreadcrumbList">
							<li itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?php echo base_url() ?>"> <span itemprop="name"> <i class="fa fa-home"></i> Trang chủ
									</span>
								</a> <span><i class="fa fa-angle-right"></i></span>
								<meta itemprop="position" content="1">
							</li>
							<li itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a itemprop="item" href="javascript:void(0)"> <strong itemprop="name">Thanh toán</strong></a>
								<meta itemprop="position" content="3">
							</li>
						</ul>
					</div>

					<div class="payment-content ng-scope" ng-controller="orderController" ng-init="initCheckoutController()">
						<h1 class="title"><span>Thanh toán</span></h1>
						<div class="steps clearfix">
							<ul class="clearfix">
								<li class="cart active col-md-2 col-xs-12 col-sm-4 col-md-offset-3 col-sm-offset-0 col-xs-offset-0"><span><i class="glyphicon glyphicon-shopping-cart"></i></span><span>Giỏ hàng của tôi</span><span class="step-number"><a>1</a></span></li>
								<li class="payment active col-md-2 col-xs-12 col-sm-4"><span><i class="glyphicon glyphicon-usd"></i></span><span>Thanh toán</span><span class="step-number"><a>2</a></span></li>
								<li class="finish col-md-2 col-xs-12 col-sm-4"><span><i class="glyphicon glyphicon-ok"></i></span><span>Hoàn tất</span><span class="step-number"><a>3</a></span></li>
							</ul>
						</div>
						<form class="payment-block clearfix" id="checkout-container">
							<div class="col-md-4 col-sm-12 col-xs-12 payment-step step2">
								<h4>1. Địa chỉ thanh toán và giao hàng</h4>
								<div class="step-preview clearfix">
									<h2 class="title">Thông tin thanh toán</h2>
									<!-- ngIf: CustomerId>0 -->
									<!-- ngIf: CustomerId<=0 -->
									<div class="form-block" ng-if="CustomerId<=0">
										<?php
										if (isset($info) == false) {
											echo "<div class=\"user-login\"><a href=\"" . base_url() . "dang-ky-thanh-vien.html\">Đăng ký tài khoản mua hàng</a>";
											echo "<a href=\"" . base_url() . "dang-nhap.html\">Đăng nhập</a></div>";
											echo "<label>Mua hàng không cần tài khoản</label>";
										}
										?>
										<div class="form-group">
											<?php
											if (isset($info["CustomerName"]) == false) {
												echo "<input class=\"form-control\" placeholder=\"Họ &amp; Tên\" type=\"text\" required=\"\">";
											} else {
												echo "<input class=\"form-control\" placeholder=\"Họ &amp; Tên\" type=\"text\" required=\"\" value=\"" . $info["CustomerName"] . "\">";
											}
											?>
										</div>
										<div class="form-group">
											<?php
											if (isset($info["Phone"]) == false) {
												echo "<input class=\"form-control\" placeholder=\"Số điện thoại\" type=\"text\" required=\"\">";
											} else {
												echo "<input class=\"form-control\" placeholder=\"Số điện thoại\" type=\"text\" required=\"\" value=\"" . $info["Phone"] . "\">";
											}
											?>
										</div>
										<div class="form-group">
											<?php
											if (isset($info["Address"]) == false) {
												echo "<input class=\"form-control\" placeholder=\"Địa chỉ giao hàng\" type=\"text\" required=\"\">";
											} else {
												echo "<input class=\"form-control\" placeholder=\"Địa chỉ giao hàng\" type=\"text\" required=\"\" value=\"" . $info["Address"] . "\">";
											}
											?>
										</div>
										<div class="form-group">
											<select class="form-control" onchange="changedProvince()" required="">
												<option value="number:0" label="Vui lòng chọn tỉnh/thành phố" selected>Vui lòng chọn tỉnh/thành phố</option>
												<option value="number:4" label="Hồ Chí Minh">Hồ Chí Minh</option>
												<option value="number:23" label="Bình Dương">Bình Dương</option>
												<option value="number:22" label="Đồng Nai">Đồng Nai</option>
												<option value="number:12" label="Long An">Long An</option>
												<option value="number:37" label="Tây Ninh">Tây Ninh</option>
											</select>
										</div>
										<div class="form-group">
											<select class="form-control" onchange="changedDistrict()" required="">
												<option value="number:0" label="Vui lòng chọn huyện" selected>Vui lòng chọn huyện</option>
											</select>
											<img class="wait" src="http://localhost/WebBanHang/static/image/gif/loading.gif">
										</div>
										<div class="form-group">
											<select class="form-control" required="">
												<option value="number:0" label="Vui lòng chọn xã/phường" selected>Vui lòng chọn xã/phường</option>
											</select>
											<img class="wait" src="http://localhost/WebBanHang/static/image/gif/loading.gif">
										</div>
										<textarea class="form-control" rows="4" placeholder="Ghi chú đơn hàng" styte="resize:none;"></textarea>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-12 col-xs-12 payment-step step3">
								<h4>2. Thanh toán và vận chuyển</h4>
								<div class="step-preview clearfix">
									<h2 class="title">Vận chuyển</h2>
									<div class="form-group ">
										<select class="form-control" onchange="changedShipper()">
											<option value="number:0" label="Vui lòng chọn hình thức giao hàng" selected>Vui lòng chọn hình thức giao hàng</option>
										</select>
									</div>
									<h2 class="title">Thanh toán</h2>
									<p class="time_delivery">Thời gian giao hàng:
										<span></span>
									</p>
								</div>
							</div>
							<div class="col-md-4 col-sm-12 col-xs-12 payment-step step1">
								<h4>3. Thông tin đơn hàng</h4>
								<div class="step-preview">
									<div class="cart-info">
										<div class="cart-items">
											<?php
											if (isset($products) == true) {
												$totalPrice = 0;
												foreach ($products as $product) {
													echo "<div class=\"cart-item clearfix\">";
													echo "<span class=\"image pull-left\" style=\"margin-right:10px;\">";
													echo "<a href=\"" . base_url() . "product/" . vn_to_str($product["name_product"] . "-" . substr("00000" . $product["id_product"], strlen("00000" . $product["id_product"]) - 5, 5)) . ".html\">";
													echo "<img src=\"" . base_url() . "images/" . $product["DuongDan"] . "\" class=\"img-responsive\">";
													echo "</a></span>";
													echo "<div class=\"product-info pull-left\">";
													echo "<span class=\"product-name\">";
													echo "<a href=\"" . base_url() . "product/" . vn_to_str($product["name_product"] . "-" . substr("00000" . $product["id_product"], strlen("00000" . $product["id_product"]) - 5, 5)) . ".html\">" . $product["name_product"] . "</a> x <span>1</span>";
													echo "</span></div>";
													echo "<span class=\"price\">" . number_format((int) ($product["price"] * (100 - $product["discount"]) / 100)) . "₫</span></div>";
													$totalPrice += (int) ($product["price"] * $product["count"] * (100 - $product["discount"])) / 100;
												}
											}
											?>
										</div>
										<div class="total-price">Thành tiền
											<label>
												<?php
												if (isset($totalPrice) == false)
													echo "0đ";
												else
													echo number_format($totalPrice) . "đ";
												?>
											</label>
										</div>
										<div class="shiping-price">
											Phí vận chuyển <label>0 ₫</label>
										</div>
										<div class="total-payment">Thanh toán
											<span>
												<?php
												if (isset($totalPrice) == false)
													echo "0đ";
												else
													echo number_format($totalPrice) . "đ";
												?>
											</span>
										</div>
										<div class="button-submit">
											<button class="btn btn-primary" type="submit">Đặt hàng</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</article>
		</div>
		<div id="open-modal" class="modal-window">
			<div>
				<span class="modal-close">Close</span>
				<h1>Thông báo</h1>
				<div class="content">
					<img src="<?php echo base_url() ?>static/image/gif/loading.gif">
					<span class="label">Đang xử lý đơn hàng của bạn</span>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			String.prototype.replaceAll = function(search, replacement) {
				var target = this;
				return target.split(search).join(replacement);
			};

			$(document).ready(() => {
				$('.modal-close').on("click", event => {
					$('#open-modal').css({
						"display": "none"
					});
				})
				$('.payment-block').submit(sendData);
			});

			function sendData(event) {
				event.preventDefault();
				let selectElements = $('select');
				for (let i = 0; i < selectElements.length; i++) {
					let element = selectElements[i];
					//Check if select element is selected?
					if ($(element).val() == "number:0") {
						alert("Vui lòng chọn nơi giao hàng và hình thức giao hàng");
						$(element).focus();
						return;
					}
				}
				//Config and open modal notification
				changeModalLabel("Đang xử lý đơn hàng của bạn...");
				disableCloseButton();
				showModal();
				//Send request to server
				$.ajax({
					url: "<?php echo base_url(); ?>xac-nhan-thanh-toan.html",
					method: 'post',
					data: {
						data: packData()
					},
					success: res => {
						let data = JSON.parse(JSON.stringify(res));
						if (data["status"] == true) {
							alert("Đơn hàng của bạn đã được tiếp nhận. Chúng tôi sẽ liên hệ lại ngay cho bạn để xác nhận đơn hàng");
							deleteAllCookie();
							//Go to page check detail order
							window.location.replace('<?php echo base_url() . "ket-qua-dat-hang.html?oid=" ?>' + data["data"]["oid"]);
						} else {
							enableCloseButton();
							changeModalLabel("Quá trình đặt hàng có trục trặc. Làm phiền quý khách thực hiện lại thao tác")
						}
					}
				});
			}

			function showModal() {
				$(".modal-window").css({
					"display": "block"
				});
			}

			function hideModal() {
				$(".modal-window").css({
					"display": "none"
				});
			}

			function changeModalLabel(content) {
				$(".modal-window content span.label").text(content);
			}

			function disableCloseButton() {
				$(".modal-close").css({
					"display": "none"
				});
			}

			function enableCloseButton() {
				$(".modal-close").css({
					"display": "block"
				});
			}

			function packData() {
				let name = $($('.form-group input')[0]).val();
				let phone = $($('.form-group input')[1]).val();
				let address = $($('.form-group input')[2]).val();
				let ward = $($('.form-group select option:selected')[2]).text();
				let district = $($('.form-group select option:selected')[1]).text();
				let province = $($('.form-group select option:selected')[0]).text();
				let note = $('textarea').val();
				let shipper = $($('.form-group select option:selected')[3]).text();
				let price = removeNumberFormat($('.total-payment span').text());
				return JSON.stringify({
					name: name,
					phone: phone,
					address: address,
					ward: ward,
					district: district,
					province: province,
					note: note,
					shipper: shipper,
					price: price
				});
			}

			function changedProvince() {
				let selected = $($('select')[0]).val();
				let idProvince = 0;
				let nameProvince = "";
				if (selected.split(":")[1] !== 0) {
					idProvince = selected.split(":")[1];
					nameProvince = $($('select option:selected')[0]).text();
					$($('img.wait')[0]).css({
						"display": "block"
					});
					$.ajax({
						url: "https://forwardapi.herokuapp.com/",
						method: "post",
						data: {
							idProvince: idProvince
						},
						success: result => {
							$($('img.wait')[0]).css({
								"display": "none"
							});
							let districts = JSON.parse(result);
							$($("select")[1]).empty();
							$($("select")[1]).append(new Option("Vui lòng chọn huyện", "number:0"));
							$($("select")[1]).val("number:0");
							$($("select")[3]).empty();
							$($("select")[3]).append(new Option("Vui lòng chọn hình thức giao hàng", "number:0"));
							$($("select")[3]).append(new Option("365Express", "number:1"));
							$($("select")[3]).val("number:0");
							for (let i = 0; i < districts.length; i++) {
								let district = districts[i];
								if (district["Title"].indexOf(nameProvince) !== -1) continue;
								$($("select")[1]).append(new Option(district["Title"], "number:" + district["ID"]));
							}
						}
					});
				}
			}

			function changedDistrict() {
				let selected = $($('select')[1]).val();
				let idDistrict = 0;
				let nameDistrict = "";
				if (selected.split(":")[1] !== 0) {
					idDistrict = selected.split(":")[1];
					nameDistrict = $($('select option:selected')[1]).text();
					$($('img.wait')[1]).css({
						"display": "block"
					});
					$.ajax({
						url: "https://forwardapi.herokuapp.com/",
						method: "post",
						data: {
							idDistrict: idDistrict
						},
						success: result => {
							$($('img.wait')[1]).css({
								"display": "none"
							});
							let wards = JSON.parse(result);
							$($("select")[2]).empty();
							$($("select")[2]).append(new Option("Vui lòng chọn xã/phường", "number:0"));
							$($("select")[2]).val("number:0");
							for (let i = 0; i < wards.length; i++) {
								let ward = wards[i];
								if (ward["Title"].indexOf(nameDistrict) !== -1) continue;
								$($("select")[2]).append(new Option(ward["Title"], "number:" + ward["ID"]));
							}
						}
					});
				}
			}

			function changedShipper() {
				let selected = $($("select")[3]).val();
				//Check if choose 365Express
				if (selected === "number:1") {
					let sendFrom = "hcm";
					let sendTo = getRecipients();
					let weight = <?php
									$total = 0;
									if (isset($products) === true && sizeof($products) > 0) {
										foreach ($products as $product) {
											$total += $product["count"];
										}
									}
									echo $total;
									?>;
					if (sendTo == false) return;
					else getShipmentInformation(sendFrom, sendTo, weight, changeShipmentInfomation);
				}

				function getRecipients() {
					let selected = $($('select')[0]).val();
					if (selected.split(":")[1] !== "0") {
						let sendTo = "hcm";
						if (selected.split(":")[1] !== "4") {
							sendTo = 300;
						}
						return sendTo;
					}
					return false;
				}

				function getShipmentInformation(sendFrom, sendTo, weight, callback) {
					let info = [];
					if (sendTo == 300) {
						info["price"] = "45000";
						info["time_delivery"] = "24h-48h";
					} else {
						info["price"] = "21000";
						info["time_delivery"] = "8h-12h";
					}
					callback(info);
				}
			}

			function changeShipmentInfomation(info) {
				//Change price
				let price_delivery = info["price"].split(/(((\d+),)+)(\d+)\sđ/);
				let price_products = <?php echo $totalPrice ?>;
				$(".shiping-price label").text(formatNumber(price_delivery) + "đ");
				//Change time delivery
				$(".time_delivery span").text(info["time_delivery"]);
				//Change total price
				$(".total-payment span").text(formatNumber(parseInt(price_products) + parseInt(price_delivery)) + "đ");
			}

			function formatNumber(num) {
				return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
			}

			function removeNumberFormat(money) {
				return parseInt(money.substring(0, money.length - 1).replaceAll(",", ""));
			}
		</script>
	</body>

	</html>