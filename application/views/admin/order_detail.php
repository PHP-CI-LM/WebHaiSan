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
						<strong>1</strong>
					</a>

					<ul class="sub">
						<li>
							<a href="<?php echo base_url() ?>ci-admin/product.html">
								Sản phẩm </a>
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
							<td colspan="9">
								<form class="list_filter form" action="<?= base_url() ?>ci-admin/order.html/filter" method="post">
									<table cellpadding="0" cellspacing="0" width="100%">
										<tbody>
											<tr>
												<td class="label" style="width:60px;"><label for="filter_id">Mã số</label></td>
												<td class="item"><input name="id" value="<?php if (isset($arguments['id_order'])) echo $arguments['id_order'] ?>" id="filter_id" type="text" style="width:95px;" /></td>
												<td class="label" style="width:60px;"><label for="filter_type">Đơn hàng</label></td>
												<td class="item">
													<select name="status" id="filter_status">
														<option value="">Chọn trạng thái</option>
														<?php
														if (isset($list_stage)) {
															foreach ($list_stage as $stage) {
																if (isset($arguments['status'])) {
																	if ($arguments['status'] == $stage['id']) {
																		echo "<option value='" . $stage['id'] . "' selected>" . $stage['name'] . "</option>";
																	} else {
																		echo "<option value='" . $stage['id'] . "'>" . $stage['name'] . "</option>";	
																	}
																} else {
																	echo "<option value='" . $stage['id'] . "'>" . $stage['name'] . "</option>";
																}
															}
														}
														?>
													</select>
												</td>

												<td class="label" style="width:60px;"><label for="filter_created">Từ ngày</label></td>
												<td class="item"><input name="fromDate" value="<?php if (isset($arguments['from_date'])) echo $arguments['from_date'] ?>" id="filter_created" type="text" class="datepicker" /></td>

												<td class="label" style="width:60px;"><label for="filter_ended">Đến ngày</label></td>
												<td class="item"><input name="toDate" value="<?php if (isset($arguments['to_date'])) echo $arguments['to_date'] ?>" id="filter_ended" type="text" class="datepicker" /></td>

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
							<td style="width:25px;">Mã đơn</td>
							<td style="width:85px;">Người nhận</td>
							<td style="width:200px;">Địa Chỉ</td>
							<td style="width:80px;">Giá</td>
							<td style="width:75px;">Tình trạng</td>
							<td style="width:60px;">Ngày đặt</td>
							<td style="width:25px"></td>
							<td style="width:25px"></td>
							<td style="width:25px"></td>
						</tr>
					</thead>

					<tfoot class="auto_check_pages">
						<tr>
							<td colspan="9"></td>
							</td>
						</tr>
					</tfoot>
					<tbody class="list_item">
						<?php if ($data !== null && isset($data) && sizeof($data) > 0) {
							foreach ($data as $row) { ?>
								<tr class='row_20'>
									<td class="textC"><?php echo $row["OrderID"] ?></td>
									<td class="textC"><?php echo $row["Receiver"] ?></td>
									<td class="status textC"><?php echo $row["DiaChi"] ?></td>
									<td class="textC"><?php echo number_format($row["Price"]) . " đ" ?></td>
									<td class="textC"><?php echo $row["Status"] ?></td>
									<td class="status textC"><?php echo $row["OrderDate"] ?></td>
									<td class="textC"><a href="#" title="Xem chi tiết"><i class="fa fa-info" style="font-size: 16px !important;"></i></a></td>
									<?php
											if (1 == $row['StatusCode']) {
												echo '<td class="textC"><a href="javascript:void(0)" title="Hủy đơn hàng" onclick="cancel_order(\''. $row["OrderID"] .'\')"><i class="fa fa-trash" style="font-size: 16px !important;"></i></a></td>';
												echo '<td class="textC"><a href="javascript:void(0)" title="Bàn giao vận chuyển" onclick="switch_stage(\'' . $row["OrderID"] . '\', \'2\')"><i class="fa fa-car" style="font-size: 16px !important;"></i></a></td>';
											} else if (2 == $row['StatusCode']) {
												echo '<td class="textC"></td>';
												echo '<td class="textC"><a href="javascript:void(0)" title="Xác nhận giao hàng" onclick="switch_stage(\'' . $row["OrderID"] . '\', \'3\')"><i class="fa fa-check" style="font-size: 16px !important;"></i></a></td>';
											} else {
												echo '<td class="textC"></td>';
												echo '<td class="textC"></td>';
											}
											?>
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

	<script>
		$(document).ready(function() {
			$('.list_filter').submit(event => {
				event.preventDefault();

				var url = $('form').prop('action');
				var id_order = $('#filter_id').val();
				var status = $('#filter_status option:selected').val();
				var fromDate = $('#filter_created').val().split('-').join('/');
				var toDate = $('#filter_ended').val().split('-').join('/');

				$('.widget').load(url + ' .title, #checkAll', {
					'idOrder': id_order,
					'status': status,
					'fromDate': fromDate,
					'toDate': toDate
				})
			});
		});

		function switch_stage(id_order, new_stage) {
			$.ajax({
				'url': '<?= base_url() ?>ci-admin/order.html/switch',
				'type': 'post',
				'data': {
					'id_order': id_order,
					'new_stage': new_stage
				},
				success: res => {
					let data = JSON.parse(JSON.stringify(res));
					if (typeof data == 'string' || data instanceof String) {
						data = JSON.parse(res);
					}
					if (true == data['status']) {
						alert('Cập nhật thành công');
						location.reload();
					} else {
						alert(data['message'], true);
					}
				}
			});
		}

		function cancel_order(id_order) {
			$.ajax({
				'url': '<?= base_url() ?>ci-admin/order.html/switch',
				'type': 'post',
				'data': {
					'id_order': id_order,
					'new_stage': 4 
				},
				success: res => {
					let data = JSON.parse(JSON.stringify(res));
					if (typeof data == 'string' || data instanceof String) {
						data = JSON.parse(res);
					}
					if (true == data['status']) {
						alert('Hủy đơn hàng thành công');
						location.reload();
					} else {
						alert(data['message'], true);
					}
				}
			});
		}
	</script>
</body>

</html>