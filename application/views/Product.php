<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Thông tin chi tiết</title>
	<link rel="icon" type="image/png" href="<?php echo base_url() ?>static/image/LOGO.ico" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/stylesheet.css" data-minify="1" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/styleView.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/styleDialog.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/sheet.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/BEM_Style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>static/css/comment.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<script type="text/javascript" src="<?php echo base_url() ?>static/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>static/js/Cookies.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>static/js/Action.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>static/js/ActionBook.js"></script>

</head>

<body>
	<!-- Phần header cho trang Web -->
	<?php require_once "comp/Header.php" ?>

	<div class="container-fluid" id="content">
		<div class="row">
			<div class="col-sm-12">
				<ul class="breadcrumb" itemtype="http://schema.org/BreadcrumbList" style="margin-top: 30px; margin-bottom: 5px;">
					<li itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?php echo base_url() ?>"> <span itemprop="name"> <i class="fa fa-home"></i> Trang chủ
							</span>
						</a> <span><i class="fa fa-angle-right"></i></span>
						<meta itemprop="position" content="1">
					</li>
					<li itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?php echo base_url() . "category/" . vn_to_str($product["name_category"]) . ".html" ?>"> <span itemprop="name" style="text-transform: capitalize"><?php echo $product["name_category"] ?>
							</span>
						</a> <span><i class="fa fa-angle-right"></i></span>
						<meta itemprop="position" content="1">
					</li>
					<li itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a itemprop="item" href="javascript:void(0)"> <strong itemprop="name">
								<?php
								if ($product != null) {
									echo $product["name_product"];
								}
								?>
							</strong></a>
						<meta itemprop="position" content="3">
					</li>
				</ul>
			</div>
		</div>
		<div class="row" style="padding-left: 3rem; padding-right: 3rem;">
			<div class="col-md-9 col-sm-8 col-xs-12">
				<article>
					<div class="row">
						<div class="board">
							<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
								<div class="thumbnail">
									<?php
									if ($product != null) {
										echo "<img src=\"" . base_url() . "images/" . $product["DuongDan"] . "\" id=\"zoom-image\" style=\"content: url('" . base_url() . "images/" . $product["DuongDan"] . "');\">";
									}
									?>
								</div>
							</div>
							<div class="col-lg-8 col-md-6 col-sm-6 col-xs-12" style="padding-left: 2rem">
								<div id="info">
									<?php
									if ($product == null) {
										echo "<p class=\"error\">Sản phẩm không tồn tại</p>";
									} else {
										echo "<ul>";
										echo "<li>";
										echo "<div class=\"row\">";
										echo "<div class=\"col-xs-12\"><span style=\"font-size: 1.85rem; font-weight: 600\">" . $product["name_product"] . "</span></div></div></li>";
										echo "<li>";
										echo "<div class=\"row\">";
										echo "<div class=\"col-xs-12\">";
										echo "<span style=\"color: #d83808; font-size: 2.2rem; line-height: 1.5rem; margin-top: 15px;\">" . number_format((int) (($product["price"] * (100 - $product["discount"])) / 100)) . "đ";
										echo "<p style=\"display: block;color: #333; font-size: 1.35rem; margin-top: 15px;\">Giá gốc: <span style=\"font-weight: 700; text-decoration: line-through;\">" . number_format($product["price"]) . "đ</span></p>";
										echo "<p style=\"display: block;color: #333; font-size: 1.35rem; margin-top: 0px;\">Khuyến mãi: <span style=\"color: #00c4ff; font-weight: 700\">" . number_format((int) (($product["price"] * $product["discount"]) / 100)) . "đ (" . $product["discount"] . "%)</span></p>";
										echo "</span></div></div></li>";
										echo "<li>";
										echo "<div class=\"row\">";
										echo "<div class=\"col-xs-12\">";
										echo "<span>";
										echo "Nguồn gốc: " . $product["name_origin"];
										echo "</span></div>";
										echo "<div class=\"col-xs-12\">";
										echo "<span>";
										if (strlen($product["descript"]) > 0)
											echo $product["descript"];
										else
											echo "Đang cập nhật nội dung";
										echo "</span></div>";
										echo "<div class=\"col-xs-12\">";
										echo "<span>";
										echo "Trọng lượng: " . $product["size"] . " " . $product["name_unit"];
										echo "</span></div></div></li>";
									}
									?>
								</div>

								<div class="row" style="margin-top: 20px; margin-left: 6.5rem;">
									<span style="font-weight: 500; margin-right: 2rem;">Khối lượng (kg): </span>
									<div id="countInput" style="text-align: center;display: inline-block;">
										<input type="number" name="quantity" min="0.5" max="100" value="1" id="count" step="0.1" style="font-size: 1.5rem;padding: 0.6rem;">
									</div>
								</div>
								<div class="row" style="padding: 1rem 2rem;">
									<div class="col-xs-6" style="text-align: center">
										<div class="button-modify">
											<?php
											if ($product != null) {
												echo "<div class=\"button-rect forest\" style=\"width: 100%\" onclick='addToCart(\"" . $product["id_product"] . "\", getNumberBuy());'>";
												echo "<i class=\"fa fa-cart-plus\"></i>";
												echo "<span class=\"content content-inner\">Cho vào giỏ</span></div>";
											}
											?>
										</div>
									</div>
									<div class="col-xs-6" style="text-align: center">
										<div class="button-modify">
											<?php
											if ($product != null) {
												echo "<div class=\"button-rect danger\" style=\"width: 100%\" onclick='buyNow(\"" . $product["id_product"] . "\", getNumberBuy());'>";
												echo "<i class=\"fa fa-money\"></i>";
												echo "<span class=\"content content-inner\">Mua ngay</span></div>";
											}
											?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</article>
			</div>

			<div class="col-md-3 col-sm-4 col-xs-12">
				<div class="board mini-board">
					<div class="title">Sản phẩm tương tự</div>
					<ul class="content" style="overflow-y: scroll">
						<?php
						if ($similarProducts != null && sizeof($similarProducts) > 0) {
							$length = sizeof($similarProducts);
							foreach ($similarProducts as $product) {
								echo '<a href="' . vn_to_str($product["name_product"] . "-" . substr("00000" . $product["id_product"], strlen("00000" . $product["id_product"]) - 5, 5)) . ".html\">";
								echo "<li class=\"item\"><img src=\"" . base_url() . "images/" . $product["DuongDan"] . "\"></img> <span>" . $product["name_product"];
								echo "</span></li></a>";
							}
						}
						?>
					</ul>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="board" id="board_comment">
					<p class="board__title">Đánh giá</p>
					<!-- Contenedor Principal -->
					<div class="comments-container">
						<ul id="comments-list" class="comments-list">
							<li>
								<div class="comment-main-level">
									<!-- Avatar -->
									<div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>
									<!-- Contenedor del Comentario -->
									<div class="comment-box">
										<div class="comment-head">
											<h6 class="comment-name by-author"><a href="http://creaticode.com/blog">Agustin Ortiz</a></h6>
											<span>hace 20 minutos</span>
											<i class="fa fa-reply"></i>
											<i class="fa fa-heart"></i>
										</div>
										<div class="comment-content">
											Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
										</div>
									</div>
								</div>
								<!-- Respuestas de los comentarios -->
								<ul class="comments-list reply-list">
									<li>
										<!-- Avatar -->
										<div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg" alt=""></div>
										<!-- Contenedor del Comentario -->
										<div class="comment-box">
											<div class="comment-head">
												<h6 class="comment-name"><a href="http://creaticode.com/blog">Lorena Rojero</a></h6>
												<span>hace 10 minutos</span>
												<i class="fa fa-reply"></i>
												<i class="fa fa-heart"></i>
											</div>
											<div class="comment-content">
												Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
											</div>
										</div>
									</li>

									<li>
										<!-- Avatar -->
										<div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>
										<!-- Contenedor del Comentario -->
										<div class="comment-box">
											<div class="comment-head">
												<h6 class="comment-name by-author"><a href="http://creaticode.com/blog">Agustin Ortiz</a></h6>
												<span>hace 10 minutos</span>
												<i class="fa fa-reply"></i>
												<i class="fa fa-heart"></i>
											</div>
											<div class="comment-content">
												Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
											</div>
										</div>
									</li>
								</ul>
							</li>

							<li>
								<div class="comment-main-level">
									<!-- Avatar -->
									<div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg" alt=""></div>
									<!-- Contenedor del Comentario -->
									<div class="comment-box">
										<div class="comment-head">
											<h6 class="comment-name"><a href="http://creaticode.com/blog">Lorena Rojero</a></h6>
											<span>hace 10 minutos</span>
											<i class="fa fa-reply"></i>
											<i class="fa fa-heart"></i>
										</div>
										<div class="comment-content">
											Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>

				<div class="board">
					<p class="board__title">Thêm đánh giá</p>
					<div class="comment__new">
						<!-- <%
							Account account = null;
							if ((account = (Account) request.getSession().getAttribute("User")) != null) {
								echo "<input type=\"text\" value=\"" + account.getTenTaiKhoan()
										+ "\" placeholder=\"Tên của bạn...\" class=\"comment__new__name\" id=\"name\" disabled=\"disabled\"></input>");
							} else {
								echo 
										"<input type=\"text\" value=\"\" placeholder=\"Tên của bạn...\" class=\"comment__new__name\" id=\"name\"></input>");
							}

							echo "<div class=\"comment__new__rate\">");
							echo "<span style=\" margin: 0em 1em; font-weight: bold;\">  Đánh giá của bạn:</span>");
							echo "<span id=\"danhGia\" style=\"margin: 5px 0px;\">");
							for (int i = 0; i < 5; i++) {
								echo 
										"<i class=\"fa fa-star\" style=\"display: inline-block; color:gold; cursor:default;\" onclick=\"setUserRate("
												+ (i + 1) + ")\"></i>");
							}
							echo "</span></div>");
						%> -->
						<textarea rows="5" placeholder="Nội dung bình luận..." class="comment__new__content" id="comment"></textarea>
						<div class="comment__new__button button-modify">
							<div class="button-rect cool" style="cursor: pointer;" onclick="sendCommentOfUser(false)">
								<i class="fa fa-send"></i> <span class="content-inner">Gửi
									đánh giá</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php require_once("comp/Footer.php") ?>

	<script type="text/javascript">
		$(document).ready(function() {
			let max_height = $('.board').height() - 2 * $('.board .title').height();
			$('.board ul.content').css({
				"max-height": max_height
			});
		});

		function getNumberBuy() {
			return $('input[type="number"]').val();
		}
	</script>
</body>

</html>