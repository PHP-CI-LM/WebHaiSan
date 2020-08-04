<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>Chợ hải sản</title>

	<meta name="robots" content="noindex, nofollow" />

	<link rel="shortcut icon" href="<?php echo public_url() ?>/images/icon.png" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="<?php echo public_url() ?>/crown/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo public_url() ?>/css/css.css" media="screen" />


	<script type="text/javascript">
		var admin_url = '';
		var base_url = '';
		var public_url = '';
	</script>

	<script type="text/javascript" src="<?php echo public_url() ?>/js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo public_url() ?>	/js/jquery/jquery-ui.min.js"></script>

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

					<a href="ci-admin/tran.html" class=" exp">
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

					<a href="javascript:void(0)" class="active exp">
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

		<!-- Main content -->
		<script type="text/javascript">
			(function($) {
				$(document).ready(function() {
					var main = $('#main_product');

					// Tips
					main.find('.tipN').tipsy({
						gravity: 'n',
						fade: false,
						html: true
					});
					main.find('.tipS').tipsy({
						gravity: 's',
						fade: false,
						html: true
					});
					main.find('.tipW').tipsy({
						gravity: 'w',
						fade: false,
						html: true
					});
					main.find('.tipE').tipsy({
						gravity: 'e',
						fade: false,
						html: true
					});

					// Tooltip
					main.find('[_tooltip]').nstUI({
						method: 'tooltip'
					});
				});
			})(jQuery);
		</script>
		<!-- Common view -->
		<script type="text/javascript">
			(function($) {
				$(document).ready(function() {
					var main = $('#form');

					// Tabs
					main.contentTabs();
				});
			})(jQuery);
		</script>

		<!-- Title area -->
		<div class="titleArea">
			<div class="wrapper">
				<div class="pageTitle">
					<h5>Lọc bình luận</h5>
					<span>Quản lý danh sách tự vựng</span>
				</div>

				<div class="clear"></div>
			</div>
		</div>
		<div class="line"></div>


		<!-- Message -->

		<!-- Main content wrapper -->
		<div class="wrapper" id="main_product">
			<div class="widget">

				<div class="title">
					<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
					<h6>Danh sách từ vựng </h6>
				</div>

				<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">

					<thead class="filter">
						<tr>
							<td colspan="4">
								<form class="list_filter form" action="<?= base_url() ?>ci-admin/comment/filter.html/add" method="get">
									<table cellpadding="0" cellspacing="0" width="80%">
										<tbody>
											<tr>
												<td class="item" style="width: 70%">
													<label for="filter">Từ vựng</label>
													<input type="text" name="filter" style="width: 80%; margin-left: 10px;">
													</input>
												</td>
												<td style='width:30%;'>
													<a href="javascript:void(0)" class="button blueB" style="padding: 7px 18px 8px 18px;color: black" onclick='addFilter()'>Thêm</a>
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
							<td style="width: 5%;"><img src="<?php echo public_url() ?>/images/icons/tableArrows.png" /></td>
							<td style="width: 10%;">Mã số</td>
							<td style="width: 60%;">Nội dung</td>
							<td style="width: 20%">Hành động</td>
						</tr>
					</thead>

					<tfoot class="auto_check_pages">
						<tr>
							<td colspan="4">
								<div class="list_action itemActions">
								</div>
								<?php echo $paging_links ?>
							</td>
						</tr>
					</tfoot>

					<tbody class="list_item">
						<?php
						if ($data !== null && isset($data) && sizeof($data) > 0) {
							foreach ($data as $row) {
								echo "<tr class='row_9'>";
								echo "<td><input type=\"checkbox\" name=\"id[]\" value=\"" . $row["id"] . "\" /></td>";
								echo "<td class=\"textC\">" . $row["id"] . "</td>";
								echo "<td class=\"textL\">" . $row["key_word"] . "</td>";
								echo "<td class=\"option textC\">";
								echo "<a href=\"javascript:void(0)\" title=\"Xóa\" class=\"tipS\" onclick='removeFilter(\"" . $row["id"] . "\")'><img src=\"" . public_url() . "/images/icons/color/delete.png" . "\" /></a></td></tr>";
							}
						}
						?>
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

	<script type="text/javascript">
		function addFilter() {
			let url = $('form').attr('action');
			let filter = $($('form').find('input')[0]).val();
			$.ajax({
				"url": url + '?t=' + filter,
				"method": 'get',
				"success": res => {
					let data = JSON.parse(JSON.stringify(res));
					if (typeof data == 'string' || data instanceof String) {
						data = JSON.parse(res);
					}
					if (true == data['status']) {
						alert('Đã thêm thành công');
						location.reload();
					} else {
						alert(data['message']);
					}
				},
				'error': (request, status, error) => {
					alert('Lỗi trong quá trình thêm filter. Vui lòng thử lại')
				}
			});
		}

		function removeFilter(id_filter) {
			if (true == window.confirm('Bạn có chắc muốn xóa?')) {
				let url = '<?= base_url() ?>ci-admin/comment/filter.html/remove';
				$.ajax({
					"url": url + '?id=' + id_filter,
					"method": 'get',
					"success": res => {
						let data = JSON.parse(JSON.stringify(res));
						if (typeof data == 'string' || data instanceof String) {
							data = JSON.parse(res);
						}
						if (true == data['status']) {
							alert('Đã xóa thành công');
							location.reload();
						} else {
							alert(data['message']);
						}
					},
					'error': (request, status, error) => {
						alert('Lỗi trong quá trình xóa. Vui lòng thử lại')
					}
				});
			}
		}
	</script>
</body>

</html>