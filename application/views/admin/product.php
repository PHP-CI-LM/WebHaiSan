<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>Chợ hải sản</title>

	<meta name="robots" content="noindex, nofollow" />

	<link rel="shortcut icon" href="<?php echo public_url() ?>/images/icon.png" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="<?php echo public_url() ?>/crown/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo public_url() ?>/css/css.css" media="screen" />

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
					<h5>Sản phẩm</h5>
					<span>Quản lý sản phẩm</span>
				</div>

				<div class="horControlB menu_action">
					<ul>
						<li><a href="<?php echo base_url() ?>ci-admin/add-product.html">
								<img src="<?php echo public_url() ?>images/icons/control/16/add.png" />
								<span>Thêm mới</span>
							</a></li>

						<!-- <li>
							<a href="admin/product/?feature=1.html">
								<img src="<?php echo public_url() ?>/images/icons/control/16/feature.png" />
								<span>Tiêu biểu</span>
							</a>
						</li> -->

						<!-- <li><a href="admin/product.html">
								<img src="<?php echo public_url() ?>/images/icons/control/16/list.png" />
								<span>Danh sách</span>
							</a></li> -->

					</ul>
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
					<h6>
						Danh sách sản phẩm </h6>
					<div class="num f12">Số lượng: <b><?php echo $nums_row; ?></b></div>
				</div>

				<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">

					<thead class="filter">
						<tr>
							<td colspan="8">
								<form class="list_filter form" action="ci-admin/product.html" method="get">
									<table cellpadding="0" cellspacing="0" width="80%">
										<tbody>

											<tr>
												<td class="label" style="width:40px;"><label for="filter_id">Mã số</label></td>
												<td class="item"><input name="id" value="" id="filter_id" type="text" style="width:55px;" /></td>

												<td class="label" style="width:40px;"><label for="filter_id">Tên</label></td>
												<td class="item" style="width:155px;"><input name="name" value="" id="filter_iname" type="text" style="width:155px;" /></td>

												<td class="label" style="width:60px;"><label for="filter_status">Thể loại</label></td>
												<td class="item">
													<select name="catalog">
														<option value="0" selected>Chọn thể loại</option>
														<?php foreach ($data_category as $row) { ?>
																<option value="<?php echo $row['id_category'] ?>" style="text-transform: capitalize;">
																	<?php echo $row['name_category'] ?> </option>
														<?php } ?>
													</select>
												</td>

												<td style='width:150px; float: right'>
													<a href="javascript:void(0)" class="button blueB" style="padding: 7px 18px 8px 18px;color: black" onclick='fillterProduct(this)' ;>LỌC</a>
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
							<td style="width:21px;"><img src="<?php echo public_url() ?>/images/icons/tableArrows.png" /></td>
							<td style="width:60px;">Mã số</td>
							<td>Tên</td>
							<td>Giá</td>
							<td style="width:50px;">Lượt xem</td>
							<td style="width:50px;">Lượt bán</td>
							<td style="width:75px;">Ngày tạo</td>
							<td style="width:120px;">Hành động</td>
						</tr>
					</thead>

					<tfoot class="auto_check_pages">
						<tr>
							<td colspan="8">
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
								echo "<a href=\"" . base_url() . "ci-admin/update-product.html/" . $row["id_product"] . "\" class=\"tipS\" title=\"\" target=\"_blank\"><b>" . $row["name_product"] . "</b></a>";
								echo "<div class=\"f11\">Đã bán: " . $row["count_buy"] . " | Xem: " . $row["count_view"] . " </div></td>";
								echo "<td class=\"textR\">" . number_format($row["price"]) . " đ</td>";
								echo "<td class=\"textC\">". $row["count_view"] ."</td>";
								echo "<td class=\"textC\">". $row["count_buy"] ."</td>";
								echo "<td class=\"textC\">" . toDatetime($row["importDate"]) . "</td>";
								echo "<td class=\"option textC\">";
								echo "<a href=\"" . base_url() . "ci-admin/update-product.html/" . $row["id_product"] . "\" title=\"Chỉnh sửa\" class=\"tipS\"><img src=\"" . public_url() . "/images/icons/color/edit.png" . "\" /></a>";
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
		function deleteProduct(selector) {
			//Xác thực xóa dữ liệu
			$.ajax({
				url: "<?php echo base_url() ?>ci-admin/delete-product.html/save",
				type: "post",
				dataType: "text",
				data: {
					id: $($($(selector).parents("tr")).find("td")[1]).text()
				},
				success: function(result) {
					let data = JSON.parse(result);
					if (data["status"] == true) {
						alert("Xóa sản phẩm thành công");
						$("table#checkAll").load(document.URL + " thead, tfoot.auto_check_pages, tbody.list_item");
					} else {
						alert("Xóa sản phẩm thất bại");
					}
				}
			});
		}


		function fillterProduct(selector) {
			var id = $('#filter_id').val();
			var name = $('#filter_iname').val();
			var theloai = $('select').val();


			$.ajax({
				url: "<?php echo base_url() ?>ci-admin/fill-product.html",
				type: "post",
				dataType: "text",
				data: {
					id: id,
					name: name,
					theloai: theloai

				},
				success: function(res) {
					let result = JSON.parse(res);
					if (result["status"] == true) {
						//Set value input fillter
						let optionSelector = "option[value='" + result["data"]["id_category"] + "']";
						$("#filter_id").val(result["data"]["id_product"]);
						$("#filter_iname").val(result["data"]["name_product"]);
						$("option[seleted]").removeAttr("selected");
						$(optionSelector).attr("selected", "");
						//Set result into table
						$("tbody.list_item tr").remove();
						result["data"]["products"].forEach(product => {
							$("tbody.list_item").append(
								'<tr class="row_9">' +
								'<td><div class="checker" id="uniform-undefined"><span><input type="checkbox" name="id[]" value="' + product["id_product"] + '" style="opacity: 0;"></span></div></td>' +
								'<td class="textC">' + product["id_product"] + '</td>' +
								'<td><div class="image_thumb"><img src="<?php echo base_url()."images/"?>' + product["image_link"] + '" height="50"><div class="clear"></div></div>' +
								'<a href="<?php echo base_url() ?>ci-admin/update-product.html/' + product["id_product"] + '" class="tipS" target="_blank" original-title=""><b>' + product["name_product"] + '</b></a><div class="f11">Đã bán: ' + product["count_buy"] + ' | Xem: ' + product["count_view"] + ' </div></td>' +
								'<td class="textR">265,000 đ</td><td class="textC">' + product["importDate"] + '</td>' +
								'<td class="option textC">' +
								'<a href="<?php echo base_url() ?>ci-dmin/update-product.html/' + product["id_product"] + '" title="Chỉnh sửa" class="tipS">' +
								'<img src="<?php echo public_url() ?>/images/icons/color/edit.png" />' +
								'</a>' +
								'<a href="javascript:void(0)" class="tipS" onclick="deleteProduct(this)" original-title="Xóa">' +
								'<img src="<?php echo public_url() ?>/images/icons/color/delete.png" />' +
								'</a>' +
								'</td></tr>'
							);
						});
						// Remove paging links
						$('tfoot.auto_check_pages tr').remove();
						// Update total product
						document.querySelectorAll('.num b')[0].innerText = result["data"]["products"].length;
					}
				}
			});
		}
	</script>
</body>

</html>