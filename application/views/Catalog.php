<!DOCTYPE html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Yêu Sách Bookstore</title>
<link rel="icon" type="image/png" href="<?php echo base_url()?>static/image/LOGO.ico" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>static/css/stylesheet.css"
	data-minify="1" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>static/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>static/css/sheet.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>static/css/styleDialog.css">
<link rel="stylesheet" type="text/css"
	href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css"
	href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link href="https://fonts.googleapis.com/css?family=Montserrat"
	rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url()?>static/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>static/js/Cookies.js"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body class="common-home">

	<!-- Phần header cho trang Web -->
	<?php require_once "comp/Header.php"?>

	<div class="container-fluid" id="content">
		<div class="bookshelf">
			<div class="row descrip">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
					<div class="title">
						<?php echo $name;?>
					</div>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-6 col-xs-6"></div>
			</div>
			<div class="row content">
				<?php
					if ($products !== null && sizeof($products) > 0) {
						for ($i = 0; $i < sizeof($product); $i++) {
							$product = $products[$i];
							echo "<div class=\"col-lg-3 col-md-4 col-sm-6 col-xs-12\">";
							echo "<div class=\"book\" id=\"" . $product["id_product"] . "\"><div class=\"icon-bar vertical\">";
							echo "<ul><li><div class=\"button-modify\">";
							echo "<div class=\"button-arc forest right\" onclick=\"gotoPage('product/". vn_to_str($product["name_product"] . "-" . substr("00000". $product["id_product"], strlen("00000". $product["id_product"]) - 5, 5)) . ".html')\">";
							echo "<i class=\"fa fa-info-circle\" onclick=\"gotoPage('product/". vn_to_str($product["name_product"] . "-" . substr("00000". $product["id_product"], strlen("00000". $product["id_product"]) - 5, 5)) . ".html')\"></i>";
							echo "<div class=\"content content-right\"><span>Thông tin chi tiết</span></div></div></div></li>";
							echo "<li><div class=\"button-modify\"><div class=\"button-arc cool right\" style=\"transform: translateY(150%)\">";
							echo "<i class=\"fa fa-cart-plus\" onclick=\"addToCart(" . $product["id_product"] . ", 1, " . $product["price"] .")\"></i>";
							echo "<div class=\"content content-right\"><span>Cho vào giỏ hàng</span></div></div></div></li>";
							echo "<li><div class=\"button-modify\"><div class=\"button-arc danger right\" style=\"transform: translateY(300%)\">";
							echo "<i class=\"fa fa-money\" onclick=\"buyNow('" . $product["id_product"] . "', 1)\"></i>";
							echo "<div class=\"content content-right\"><span>Mua ngay</span></div></div></div></li></ul></div>";
							echo "<div class=\"thumbnail\">";
							echo "<img onclick=\"gotoPage('product/". vn_to_str($product["name_product"] . "-" . substr("00000". $product["id_product"], strlen("00000". $product["id_product"]) - 5, 5)) . ".html')\" style=\"cursor:pointer\" alt=\"" . $product["id_product"] . "\" src=\"" . $product["DuongDan"] . "\"></div>";
							echo "<div class=\"info-book\"><div class=\"title\">" . $product["name_product"] . "</div>";
							echo "<div class=\"price\">" . number_format($product["price"]) . "đ/kg</div></div></div></div>";
						}
					}
				?>
			</div>
		</div>
	</div>

	<div>
		<div class="dialog" id="confirm-form" style="width: 60%;">
			<div class="header">
				<div class="title">Thanh toán</div>
				<a class="f-right close" href="#"><i class="fa fa-close"></i></a>
			</div>
			<ul class="content">
				<li class="item" style="height: 100px;"><span class="title">Tên
						người mua</span>
					<div class="detail">
						<input id="username" type="text" autocomplete="on" name="username"
							placeholder="Name..." value="" />
					</div></li>
				<li class="item" style="height: 100px;"><span class="title">Địa
						chỉ giao hàng</span>
					<div class="detail">
						<input id="address" type="text" name="address"
							placeholder="Address..." value="" />
					</div></li>
				<li class="item" style="height: 100px;"><span class="title">Số
						điện thoại</span>
					<div class="detail">
						<input id="phone" type="text" name="phone" placeholder="Phone..."
							value="" />
					</div></li>
				<li class="item">
					<button class="button submit-button" onclick="addCart()">Đặt
						hàng</button>
				</li>
			</ul>
		</div>
	</div>

	<!-- Phần footer cho trang Web -->
	<?php require_once "comp/Footer.php"?>

	<script type="text/javascript">
	</script>
</body>
</html>