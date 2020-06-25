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
	<?php require("comp/nav.php")?>


	<!-- Right side -->
	<div id="rightSide">

		<!-- Account panel top -->
		<?php require("comp/topNav.php")?>

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

				<!-- <div class="horControlB menu_action">
					<ul>
						<li><a href="<?php echo base_url() ?>admin/add-product.html">
								<img src="<?php echo public_url() ?>images/icons/control/16/add.png" />
								<span>Thêm mới</span>
							</a>
						</li>
					</ul>
				</div> -->

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
					<h6>
						Danh sách từ vựng </h6>
					<!-- <div class="num f12">Số lượng: <b><?php echo $nums_row; ?></b></div> -->
				</div>

				<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">

					<thead class="filter">
						<tr>
							<td colspan="4">
								<form class="list_filter form" action="admin/product.html" method="get">
									<table cellpadding="0" cellspacing="0" width="80%">
										<tbody>

											<tr>
												<td class="label" style="width:55px;"><label for="filter_type">Từ vựng</label></td>
												<td class="item">
													<input type="text" name="product" style="width: 150px;">
													</input>
												</td>
												<td style='width:300px; float: right'>
													<a href="javascript:void(0)" class="button blueB" style="padding: 7px 18px 8px 18px;color: black" onclick='fillterComment()' ;>Thêm</a>
													<!-- <input type="reset" class="basic" value="Reset" onclick="window.location.href = 'index.php/admin/product.html'; "> -->
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
									<!-- <a href="#submit" id="submit" class="button blueB" url="admin/product/del_all.html">
										<span style='color:white;'>Xóa hết</span>
									</a> -->
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
								echo "<td><input type=\"checkbox\" name=\"id[]\" value=\"" . $row["id_product"] . "\" /></td>";
								echo "<td class=\"textC\">" . $row["id_product"] . "</td>";
								echo "<td><div class=\"image_thumb\"><img src=\"" . base_url() . "images/" . $row['image_link'] . "\" height=\"50\"><div class=\"clear\"></div></div>";
								echo "<a href=\"" . base_url() . "admin/update-product.html/" . $row["id_product"] . "\" class=\"tipS\" title=\"\" target=\"_blank\"><b>" . $row["name_product"] . "</b></a>";
								echo "<div class=\"f11\">Đã bán: " . $row["count_buy"] . " | Xem: " . $row["count_view"] . " </div></td>";
								echo "<td class=\"textR\">" . number_format($row["price"]) . " đ</td>";
								echo "<td class=\"textC\">" . $row["importDate"] . "</td>";
								echo "<td class=\"option textC\">";
								echo "<a href=\"" . base_url() . "admin/update-product.html/" . $row["id_product"] . "\" title=\"Chỉnh sửa\" class=\"tipS\"><img src=\"" . public_url() . "/images/icons/color/edit.png" . "\" /></a>";
								echo "<a href=\"javascript:void(0)\" title=\"Xóa\" class=\"tipS\" onclick='deleteProduct(this)'><img src=\"" . public_url() . "/images/icons/color/delete.png" . "\" /></a></td></tr>";
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
	</script>
</body>

</html>