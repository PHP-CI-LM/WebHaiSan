<!DOCTYPE html>

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Cảng hải sản tươi ngon</title>
	<link rel="icon" type="image/png" href="<?php echo base_url() ?>static/image/LOGO.ico" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/stylesheet.css" data-minify="1" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/sheet.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/styleDialog.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/styleHome.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<script type="text/javascript" src="<?php echo base_url() ?>static/js/jquery-3.3.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body class="common-home">

	<!-- Phần header cho trang Web -->
	<?php require_once('comp/Header.php') ?>

	<div class="container-fluid" id="content">
		<section>
			<div clas="container" style="margin: 1.5rem 2rem;">
				<div class="row khung">
					<div class="col-md-3 col-sm-12 col-xs-12 vertical_menu">
						<div id="mb_verticle_menu" class="menu-quick-select">
							<div class="title_block">
								<span>Danh mục sản phẩm</span>
							</div>
							<div id="menuverti" class="block_content navbar_menuvertical">
								<ul class="nav_verticalmenu">
									<li class="level0">
										<a href="<?php echo base_url() ?>category/ca-bien.html">
											<img class="icon-menu" src="<?php echo base_url()?>static/image/icon/fish.png" alt="Nghao - Sò - Ốc"> 
											<span>Cá biển</span>
										</a>
									</li>
									<li class="level0">
										<a href="<?php echo base_url() ?>category/tomtom.html">
											<img class="icon-menu" src="<?php echo base_url()?>static/image/icon/shrimp.png" alt="Tôm"> 
											<span>Tôm</span>
										</a>
									</li>
									<li class="level0">
										<a href="<?php echo base_url() ?>category/muc.html" >
											<img class="icon-menu" src="<?php echo base_url()?>static/image/icon/cuttle.png" alt="Mực"> 
											<span>Mực</span>
										</a>
									</li>
									<li class="level0">
										<a href="<?php echo base_url() ?>category/bach-tuoc.html">
											<img class="icon-menu" src="<?php echo base_url()?>static/image/icon/octopus.png" alt="Bạch tuộc"> 
											<span>Bạch tuộc</span>
										</a>
									</li>
									<li class="level0">
										<a href="<?php echo base_url() ?>category/ngao-so.html">
											<img class="icon-menu" src="<?php echo base_url()?>static/image/icon/scallop.png" alt="Ngao - Sò"> 
											<span>Ngao - Sò</span>
										</a>
									</li>
									<li class="level0">
										<a href="<?php echo base_url() ?>category/oc.html">
											<img class="icon-menu" src="<?php echo base_url()?>static/image/icon/snail.png" alt="Ốc"> 
											<span>Ốc</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div id="my-carousel" class="col-md-9 col-sm-12 col-xs-12 p-l-0 carousel" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#my-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#my-carousel" data-slide-to="1" class=""></li>
							<li data-target="#my-carousel" data-slide-to="2" class=""></li>
						</ol>
						<div class="carousel-inner">
							<?php
							if ($bangTin !== null && sizeof($bangTin) > 0) {
								echo '<div class="item active"><a href="#"> <img src="' . base_url() . 'static/image/' . $bangTin[0]["path"]
									. '" style="width: 100%; background-repeat: no-repeat; cursor:pointer;"> </a></div>';
								for ($i = 1; $i < sizeof($bangTin); $i++) {
									echo '<div class="item"><a href="#"> <img src="' . base_url() . 'static/image/' . $bangTin[$i]["path"]
										. '" style="width: 100%; background-repeat: no-repeat; cursor:pointer;"></a></div>';
								}
							}
							?>
							<a class="left carousel-control" href="#my-carousel" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#my-carousel" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span></a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<div class="waiting"><div class="lds-roller"><div></div><div></div><div></div><div></div></div>
		<article class="container">
			<div class="bookshelf" style="margin: 1rem 2.85rem 1rem 1.05rem;" id="moi-ve">
				<div class="row descrip">
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" style="padding-left: 0;">
						<div class="title">Sản phẩm mới về</div>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-6 col-xs-6">
						<div class="view-detail">
							<a href="<?php echo base_url() ?>catalog/san-pham-moi-00001.html">Xem chi tiết >></a>
						</div>
					</div>
				</div>
				<div class="row content">
					<?php
					if ($newProducts !== null && sizeof($newProducts) > 0) {
						for ($i = 0; $i < sizeof($newProducts); $i++) {
							$product = $newProducts[$i];
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

			<div class="bookshelf" style="margin: 1rem 2.85rem 1rem 1.05rem;" id="ban-chay">
				<div class="row descrip">
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" style="padding-left: 0;">
						<div class="title">Sản phẩm bán chạy</div>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-6 col-xs-6">
						<div class="view-detail">
							<a href="<?php echo base_url() ?>catalog/san-pham-hot-00002.html">Xem chi tiết >></a>
						</div>
					</div>
				</div>
				<div class="row content">
					<?php
					if ($sellingProducts !== null && sizeof($sellingProducts) > 0) {
						for ($i = 0; $i < sizeof($sellingProducts); $i++) {
							$product = $sellingProducts[$i];
							echo "<div class=\"col-lg-3 col-md-4 col-sm-6 col-xs-12\">";
							echo "<div class=\"book\" id=\"" . $product["id_product"] . "\"><div class=\"icon-bar vertical\">";
							echo "<ul><li><div class=\"button-modify\">";
							echo "<div class=\"button-arc forest right\" onclick=\"gotoPage('product/". vn_to_str($product["name_product"] . "-" . substr("00000". $product["id_product"], strlen("00000". $product["id_product"]) - 5, 5)) . ".html')\">";
							echo "<i class=\"fa fa-info-circle\" onclick=\"gotoPage('ViewBook?id=" . $product["id_product"] . "')\"></i>";
							echo "<div class=\"content content-right\"><span>Thông tin chi tiết</span></div></div></div></li>";
							echo "<li><div class=\"button-modify\"><div class=\"button-arc cool right\" style=\"transform: translateY(150%)\">";
							echo "<i class=\"fa fa-cart-plus\" onclick=\"addToCart(" . $product["id_product"] . ", 1, " . $product["price"] . ")\"></i>";
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
		</article>
	</div>

	<!-- Phần footer cho trang Web -->
	<?php require_once('comp/Footer.php') ?>


	
	<script type="text/javascript" src="<?php echo base_url() ?>static/js/Cookies.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>static/js/Action.js"></script>
	<script type="text/javascript">
		function openNewTab(url) {
			window.open(url, '_blank');
		}
		
		function changeStateOrder(maHD, bool) {
			if (bool) {
				var url = window.location.href;
				$(".QLDH_tbDonHang").load(url + " #table", {
					maHD: maHD
				});
			}
		}

		function reloadKH() {
			var URL = window.location.href;
			var searchU = document.getElementById("btnSearch").value;
			document.getElementById("btnSearch").value = searchU;

		}

		function refreshPage() {
			window.location.href = window.location.href
		}
	</script>
</body>

</html>