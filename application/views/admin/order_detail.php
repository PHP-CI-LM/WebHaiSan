<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>Chợ Hải Sản</title>

	<meta name="robots" content="noindex, nofollow" />

	<link rel="shortcut icon" href="<?php echo public_url() ?>/images/icon.png" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="<?php echo public_url() ?>/crown/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo public_url() ?>/css/css.css" media="screen" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

	<script type="text/javascript">
		var admin_url = '';
		var base_url = '';
		var public_url = '';
	</script>

	<script type="text/javascript" src="<?php echo public_url() ?>/js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/js/jquery/jquery-ui.min.js"></script>

	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/spinner/jquery.mousewheel.js"></script>

	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/forms/uniform.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/forms/jquery.tagsinput.min.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/forms/autogrowtextarea.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/forms/jquery.maskedinput.min.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/forms/jquery.inputlimiter.min.js"></script>

	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/tables/datatable.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/tables/tablesort.min.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/tables/resizable.min.js"></script>

	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/ui/jquery.tipsy.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/ui/jquery.collapsible.min.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/ui/jquery.progress.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/ui/jquery.timeentry.min.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/ui/jquery.colorpicker.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/ui/jquery.jgrowl.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/ui/jquery.breadcrumbs.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/plugins/ui/jquery.sourcerer.js"></script>

	<script type="text/javascript" src="<?php echo public_url() ?>/crown/js/custom.js"></script>


	<script type="text/javascript" src="<?php echo public_url() ?>/js/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/js/jquery/chosen/chosen.jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/js/jquery/scrollTo/jquery.scrollTo.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/js/jquery/number/jquery.number.min.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/js/jquery/formatCurrency/jquery.formatCurrency-1.4.0.min.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>/js/jquery/zclip/jquery.zclip.js"></script>

	<script type="text/javascript" src="<?php echo public_url() ?>/js/jquery/colorbox/jquery.colorbox.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo public_url() ?>/js/jquery/colorbox/colorbox.css" media="screen" />

	<script type="text/javascript" src="<?php echo public_url() ?>/js/custom_admin.js" type="text/javascript"></script>
</head>

<body>

	<!-- Left side content -->
	<div id="left_content">
		<div id="leftSide" style="padding-top:30px;">

			<!-- Account panel -->

			<div class="sideProfile">
				<a href="#" title="" class="profileFace"><img width="40" src="<?php echo public_url() ?>/images/user.png" /></a>
				<span>Xin chào: <strong>admin!</strong></span>
				<span>ADMIN</span>
				<div class="clear"></div>
			</div>
			<div class="sidebarSep"></div>
			<!-- Left navigation -->

			<ul id="menu" class="nav">

				<li class="home">

					<a href="<?php echo base_url() ?>ci-admin" id="current">
						<span>Bảng điều khiển</span>
						<strong></strong>
					</a>


				</li>
				<li class="tran">

					<a href="ci-admin/tran.html" class="active exp">
						<span>Quản lý bán hàng</span>
						<strong>2</strong>
					</a>

					<ul class="sub">
						<li>
							<a href="<?php echo base_url() ?>ci-admin/order.html">
								Thông tin đơn hàng</a>
						</li>
						<li>
							<a href="<?php echo base_url() ?>ci-admin/order-detail.html">
								Chi tiết đơn hàng</a>
						</li>
					</ul>

				</li>
				<li class="product">

					<a href="<?php echo base_url() ?>ci-admin/product.html" class=" exp">
						<span>Sản phẩm</span>
						<strong>2</strong>
					</a>

					<ul class="sub">
						<li>
							<a href="<?php echo base_url() ?>ci-admin/product.html">
								Danh sách sản phẩm </a>
						</li>
						<li>
							<a href="<?php echo base_url() ?>ci-admin/add-product.html">
								Thêm sản phẩm mới</a>
						</li>
					</ul>

				</li>
				<li class="account">

					<a href="<?php echo base_url() ?>ci-admin/user.html" class=" exp">
						<span>Tài khoản</span>
						<strong>1</strong>
					</a>

					<ul class="sub">
						<li>
							<a href="<?php echo base_url() ?>ci-admin/user.html">
								Thành viên </a>
						</li>
					</ul>

				</li>
				<li class="product">

					<a href="javascript:void(0)" class=" exp">
						<span>Bình luận</span>
						<strong>2</strong>
					</a>

					<ul class="sub">
						<li>
							<a href="<?php echo base_url() ?>ci-admin/comment.html">
								Bình luận </a>
						</li>
						<li>
							<a href="<?php echo base_url() ?>ci-admin/comment/filter.html">
								Lọc bình luận</a>
						</li>
					</ul>

				</li>
			</ul>

		</div>
		<div class="clear"></div>
	</div>


	<!-- Right side -->
	<div id="rightSide">

		<!-- Account panel top -->
		<?php require("comp/topNav.php") ?>

		<!-- Common -->
		<!-- Title area -->
		<div class="titleArea">
			<div class="wrapper">
				<div class="pageTitle">
					<h5>Thông tin đơn hàng </h5>
					<span>Quản lý đơn hàng</span>
				</div>

				<div class="horControlB menu_action">
					<ul>
					</ul>
				</div>

				<div class="clear"></div>
			</div>
		</div>
		<div class="line"></div>

		<!-- Main content wrapper -->
		<div class="wrapper">
			<div class="widget">
				<div class="title">
					<span class="titleIcon"><img src="<?php echo public_url() ?>/images/icons/tableArrows.png" /></span>
					<h6>Danh sách đơn hàng</h6>

					<!-- <div class="num f12">Tổng số: <b></b></div> -->
				</div>

				<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
					<thead class="filter">
						<tr>
							<td colspan="5">
								<form class="list_filter form" action="" method="post">
									<table cellpadding="0" cellspacing="0" width="70%">
										<tbody>
											<tr>
												<td class="label" style="width:60px;"><label for="filter_id">Mã đơn</label></td>
												<td class="item"><input name="order_id" value="<?php if (isset($arguments['id_order'])) echo $arguments['id_order'] ?>" id="filter_id" type="text" style="width:95px;" /></td>
												<td class="label" style="width:60px;"><label for="filter_type">Sản phẩm</label></td>
												<td class="item">
													<select name="product_id" id="filter_product">
														<option value="">Tất cả sản phẩm</option>
														<?php
														if (isset($products)) {
															foreach ($products as $product) {
																if (isset($arguments['id_product'])) {
																	if ($arguments['id_product'] == $product['id_product']) {
																		echo "<option value='" . $product['id_product'] . "' selected>" . $product['name_product'] . "</option>";
																	} else {
																		echo "<option value='" . $product['id_product'] . "'>" . $product['name_product'] . "</option>";
																	}
																} else {
																	echo "<option value='" . $product['id_product'] . "'>" . $product['name_product'] . "</option>";
																}
															}
														}
														?>
													</select>
												</td>
												<td colspan='2' style='width:60px'>
													<input type="submit" class="button blueB" value="Lọc" />
												</td>

											</tr>
										</tbody>
									</table>
								</form>
							</td>
						</tr>
					</thead>
					<thead>
						<tr>
							<td style="width: 50px;">Mã đơn</td>
							<td>Người nhận</td>
							<td>Tên sản phẩm</td>
							<td>Giá</td>
							<td>Số lượng</td>
						</tr>
					</thead>

					<tfoot class="auto_check_pages">
						<tr>
							<td colspan="5"></td>
							</td>
						</tr>
					</tfoot>
					<tbody class="list_item">
						<?php if ($data !== null && isset($data) && sizeof($data) > 0) {
							foreach ($data as $row) { ?>
								<tr class='row_20'>
									<td class="textC"><?php echo $row["OrderID"] ?></td>
									<td class="textL"><?php echo $row["receiver"] ?></td>
									<td class="textL"><?php echo $row["name_product"] ?></td>
									<td class="textL"><?php echo number_format($row["Price"]) . " đ" ?></td>
									<td class="textC"><?php echo $row["Amount"] ?></td>
								</tr>
						<?php }
						} ?>

					</tbody>

				</table>
			</div>

		</div>
		<div class="clear mt30"></div>

		<!-- Footer -->
		<div id="footer">
			<div class="wrapper">
				<div></div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</body>

</html>