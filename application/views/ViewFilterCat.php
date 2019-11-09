<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Tìm kiếm</title>
<link rel="icon" type="image/png" href="<?php echo base_url()?>static/image/LOGO.ico" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>static/css/stylesheet.css"
	data-minify="1" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>static/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>static/css/sheet.css">
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<script type="text/javascript" src="<?php echo base_url()?>static/js/jquery-3.3.1.min.js"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
	<!-- Phần header cho trang Web -->
	<?php require_once("comp/Header.php")?>

	<div class="container" id="content">
		<div class="bookshelf">
			<div class="row descrip">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6"  style="padding-left: 0;">
					<div class="title">
						<?php
							if ($products !== null) {
								$product = $products[0];
								echo $product["MaTheLoai"];
							}
						?>
					</div>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-6 col-xs-6"></div>
			</div>
			<div class="row content">
				<?php
					if ($products !== null) {
							for ($i = 0; $i < sizeof($products); $i++) {
								$product = $products[$i];
								echo "<div class=\"col-lg-3 col-md-4 col-sm-6 col-xs-12\">";
								echo "<div class=\"book\" id=\"" . $products[$i]["MaSach"] . "\"><div class=\"icon-bar vertical\">";
								echo "<ul><li><div class=\"button-modify\">";
								echo "<div class=\"button-arc forest right\" onclick=\"gotoPage('" . base_url() . "product/" . str_replace("_", "-", vn_to_str($product["TenSach"]). "-" . substr($product["MaSach"], 1, strlen($product["TenSach"]))) . ".html')\">";
								echo "<i class=\"fa fa-info-circle\" onclick=\"gotoPage('" . base_url() . "product/" . str_replace("_", "-", vn_to_str($product["TenSach"]). "-" . substr($product["MaSach"], 1, strlen($product["TenSach"]))) . ".html')\"></i>";
								echo "<div class=\"content content-right\"><span>Thông tin chi tiết</span></div></div></div></li>";
								echo "<li><div class=\"button-modify\"><div class=\"button-arc cool right\" style=\"transform: translateY(150%)\">";
								echo "<i class=\"fa fa-cart-plus\" onclick=\"addBookToCart('" . $products[$i]["MaSach"] . "', 1)\"></i>";
								echo "<div class=\"content content-right\"><span>Cho vào giỏ hàng</span></div></div></div></li>";
								echo "<li><div class=\"button-modify\"><div class=\"button-arc danger right\" style=\"transform: translateY(300%)\">";
								echo "<i class=\"fa fa-money\" onclick=\"buyNow('" . $products[$i]["MaSach"] . "', 1)\"></i>";
								echo "<div class=\"content content-right\"><span>Mua ngay</span></div></div></div></li></ul></div>";
								echo "<div class=\"thumbnail\">";
								echo "<img onclick=\"gotoPage('" . base_url() . "product/" . str_replace("_", "-", vn_to_str($product["TenSach"]). "-" . substr($product["MaSach"], 1, strlen($product["TenSach"]))) . ".html')\" 
									style=\"cursor:pointer\" alt=\"" . $products[$i]["MaSach"] . "\" src=\"" . base_url() . "static/image/" . $products[$i]["DuongDan"] . "\"></div>";
								echo "<div class=\"info-book\"><div class=\"title\">" . $products[$i]["TenSach"] . "</div>";
								echo "<div class=\"price\">" . $products[$i]["GiaBan"] . "</div></div></div></div>";
							}
					}
				?>
			</div>
		</div>
	</div>

	<!-- Phần footer cho trang Web -->
	<?php require_once("comp/Footer.php")?>
</body>
</html>