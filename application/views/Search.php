<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title><?php echo app_title() ?> - Kết quả tìm kiếm</title>
	<link rel="icon" type="image/png" href="<?php echo base_url() ?>static/image/LOGO.ico" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/stylesheet.css" data-minify="1" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/styleProduct.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/styleListProducts.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
	<script type="text/javascript" src="<?php echo base_url() ?>static/js/jquery-3.3.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
	<!-- Phần header cho trang Web -->
	<?php require_once("comp/Header.php") ?>


	<div class="container" id="content">
		<div class="row">
			<div class="col-sm-12">
				<ul class="breadcrumb" itemtype="http://schema.org/BreadcrumbList" style="margin-top: 30px; margin-bottom: 5px;">
					<li itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?php echo base_url() ?>"> <span itemprop="name"> <i class="fa fa-home"></i> Trang chủ
							</span>
						</a> <span><i class="fa fa-angle-right"></i></span>
						<meta itemprop="position" content="1">
					</li>
					<li itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a itemprop="item" href="javascript:void(0)"> <strong itemprop="name">Tìm kiếm</strong></a>
						<meta itemprop="position" content="3">
					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3 col-md-4 col-sm-5">
				<div class="menu-product">
					<h3>
						<span>
							Sản phẩm
						</span>
					</h3>
					<ul class="level0">
						<li><span><a href="<?php echo base_url() ?>category/ca-bien.html"><i class="fa fa-arrow-circle-right" style="padding-right:15px;"></i> Cá biển</a></span></li>
						<li><span><a href="<?php echo base_url() ?>category/tom.html"><i class="fa fa-arrow-circle-right" style="padding-right:15px;"></i> Tôm</a></span></li>
						<li><span><a href="<?php echo base_url() ?>category/muc.html"><i class="fa fa-arrow-circle-right" style="padding-right:15px;"></i> Mực</a></span></li>
						<li><span><a href="<?php echo base_url() ?>category/ngao-so.html"><i class="fa fa-arrow-circle-right" style="padding-right:15px;"></i> Ngao - sò</a></span></li>
						<li><span><a href="<?php echo base_url() ?>category/oc.html"><i class="fa fa-arrow-circle-right" style="padding-right:15px;"></i> Các loại ốc</a></span></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-9 col-md-8 col-sm-7 bookshelf" style="padding: 10px 20px;">
				<div class="row descrip">
					<div class="col-sm-6 col-xs-12" style="padding-left: 0;">
						<div class="title none-bg none-detail large-text inline" style="text-transform: capitalize; padding-right: 0; clip-path: none; color: #333 !important;">
							<?php
							echo "Kết quả tìm kiếm cho: ";
							echo "<span style=\"font-weight: 400; text-transform: none;\">";
							echo $query;
							echo "</span>";
							?>
						</div>
					</div>
				</div>
				<div class="row products-list layout-2-column">
					<?php
					if ($products !== null) {
						if (0 < sizeof($products)) {
							for ($i = 0; $i < sizeof($products); $i++) {
								$product = $products[$i];
								$url_product = base_url() . 'product/' . vn_to_str($product['name_product'] . '-' . substr('00000' . $product["id_product"], strlen('00000' . $product["id_product"]) - 5, 5)) . '.html';
								$url_thumbnail = base_url() . 'images/' . $product['DuongDan'];
								$price = strval(intval($product['price'] * (100 - intval($product['discount'])) / 100));
								echo '<a href="' . $url_product . '" title="' . $product["name_product"] . '" class="product ">';
								echo '<div class="thumbnail">';
								echo '<img src="' . $url_thumbnail . '" alt="' . $product["name_product"] . '">';
								echo '</div>';
								echo '<p class="title">' . $product["name_product"] . '</p>';
								echo '<p class="price">' . number_format($price);
								echo '<span class="percent deal">-' . $product['discount'] . '%</span>';
								echo '<span class="original deal">' . number_format($product['price']) . '</span>';
								echo '</p>';
								echo '</a>';
							}
						} else {
							echo '<p style="margin-left: 10px; text-align: left;">Sản phẩm đã hết hàng hoặc không có trong danh mục sản phẩm</p>';
						}
					}
					?>
				</div>
				<?php
				if (true == isset($paging_links)) {
					echo $paging_links;
				}
				?>
			</div>
		</div>
	</div>

	<?php require_once("comp/Footer.php") ?>

	<script type="text/javascript" src="<?php echo base_url() ?>static/js/Cookies.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>static/js/Action.js"></script>
</body>

</html>