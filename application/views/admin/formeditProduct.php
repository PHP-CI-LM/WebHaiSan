<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>Chợ Hải Sản</title>

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
	<?php require("comp/nav.php")?>


	<!-- Right side -->
	<div id="rightSide">

		<!-- Account panel top -->

		<div class="topNav">
			<div class="wrapper">
				<div class="welcome">
					<span>Xin chào: <b>admin!</b></span>
				</div>

				<div class="userNav">
					<ul>
						<li><a href="http://localhost/webphp/" target="_blank">
								<img style="margin-top:7px;" src="<?php echo public_url() ?>/images/icons/light/home.png" />
								<span>Trang chủ</span>
							</a></li>

						<!-- Logout -->
						<li><a href="<?php echo base_url()?>ci-admin/logout.html">
								<img src="<?php echo public_url() ?>/images/icons/topnav/logout.png" alt="" />
								<span>Đăng xuất</span>
							</a></li>

					</ul>
				</div>

				<div class="clear"></div>
			</div>
		</div>

		<!-- Main content -->

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
						<li><a href="add-product.html">
								<img src="<?php echo public_url() ?>/images/icons/control/16/add.png" />
								<span>Thêm mới</span>
							</a></li>

						<li>
							<!-- <a href="product/?feature=1.html">
								<img src="<?php echo public_url() ?>/images/icons/control/16/feature.png" />
								<span>Tiêu biểu</span>
							</a>
						</li>

						<li><a href="product.html">
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
		<div class="wrapper">

			<!-- Form -->
			<form class="form" id="form" action="<?php echo base_url() . "ci-admin/update-product.html/" . $data_product["id_product"] . "/save" ?>" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="widget">
						<div class="title">
							<img src="<?php echo public_url() ?>/images/icons/dark/add.png" class="titleIcon" />
							<?php

							echo "<h6>Sửa Sản phẩm</h6>";

							?>
						</div>

						<ul class="tabs">
							<li><a href="#tab1">Thông tin chung</a></li>
							<!-- Form <li><a href="#tab2">SEO Onpage</a></li>
		                <li><a href="#tab3">Bài viết</a></li>-->

						</ul>

						<div class="tab_container">
							<div id='tab1' class="tab_content pd0">
								<div class="formRow">
									<label class="formLeft" for="param_name">Tên:<span class="req">*</span></label>
									<div class="formRight">
										<span class="oneTwo"><input name="name" value="<?php echo $data_product["name_product"] ?>" id="param_name" _autocheck="true" type="text" required /></span>
										<span name="name_autocheck" class="autocheck"></span>
										<div name="name_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>
								<div class="formRow">
									<label class="formLeft" for="param_name">Nguồn gốc:<span class="req">*</span></label>
									<div class="formRight">
										<select name="origin" _autocheck="true" id='param_cat' class="left">

											<!-- kiem tra danh muc co danh muc con hay khong -->
											<?php
											if ($data_origin !== null && isset($data_origin) && sizeof($data_origin) > 0) {
												foreach ($data_origin as $row) {
													if ($data_product["name_origin"] === $row["name_origin"])
														echo "<option selected value=" . $row["id"] . ">";
													else
														echo "<option value=" . $row["id"] . ">";
													echo $row["name_origin"] . " </option>";
												}
											}
											?>
										</select>
										<span name="cat_autocheck" class="autocheck"></span>
										<div name="cat_error" class="clear error"></div>
									</div>
								</div>
								<div class="formRow">
									<label class="formLeft" for="param_name">Link hình ảnh:<span class="req">*</span></label>
									<div class="formRight">
										<span class="oneTwo"><input name="linkanh" value="<?php echo $data_product["DuongDan"] ?>" id="param_name" _autocheck="true" type="text" required /></span>
										<span name="name_autocheck" class="autocheck"></span>
										<div name="name_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>


								<!-- Price -->
								<div class="formRow">
									<label class="formLeft" for="param_price">
										Giá :
										<span class="req">*</span>
									</label>
									<div class="formRight">
										<span class="oneTwo">
											<input name="price" style='width:100px' value="<?php echo $data_product["price"] ?>" id="param_price" class="format_number" _autocheck="true" type="text" required />
											<img class='tipS' title='Giá bán sử dụng để giao dịch' style='margin-bottom:-8px' src='<?php echo public_url() ?>/crown/images/icons/notifications/information.png' />
										</span>
										<span name="price_autocheck" class="autocheck"></span>
										<div name="price_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>

								<!-- Price -->
								<div class="formRow">
									<label class="formLeft" for="param_discount">
										Giảm giá (%)
										<span></span>:
									</label>
									<div class="formRight">
										<span>
											<input name="discount" style='width:100px' value="<?php echo $data_product["discount"] ?>" id="param_discount" class="format_number" type="text" max="99" min="0" />
											<img class='tipS' title='Số tiền giảm giá' style='margin-bottom:-8px' src='<?php echo public_url() ?>/crown/images/icons/notifications/information.png' />
										</span>
										<span name="discount_autocheck" class="autocheck"></span>
										<div name="discount_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>
								<div class="formRow">
									<label class="formLeft" for="param_cat">Thể loại:<span class="req">*</span></label>
									<div class="formRight">
										<select name="cat" _autocheck="true" id='param_cat' class="left">

											<!-- kiem tra danh muc co danh muc con hay khong -->


											<?php
											if ($data_category !== null && isset($data_category) && sizeof($data_category) > 0) {
												foreach ($data_category as $row) {
													if ($data_product["name_category"] === $row["name_category"])
														echo "<option selected value=" . $row["id_category"] . ">" . $row["name_category"] . "</option>";
													else
														echo "<option value=" . $row["id_category"] . ">" . $row["name_category"] . "</option>";
												}
											}
											?>
										</select>
										<span name="cat_autocheck" class="autocheck"></span>
										<div name="cat_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>
								<div class="formRow">
									<label class="formLeft" for="param_name">Kích thước:<span class="req">*</span></label>
									<div class="formRight">
										<span class="oneTwo"><input name="size" value="<?php echo $data_product["size"] ?>" id="param_name" _autocheck="true" type="text" required /></span>
										<span name="name_autocheck" class="autocheck"></span>
										<div name="name_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>
								<div class="formRow">
									<label class="formLeft" for="param_cat">Đơn vị:<span class="req">*</span></label>
									<div class="formRight">
										<select name="unit" _autocheck="true" id='param_cat' class="left">

											<!-- kiem tra danh muc co danh muc con hay khong -->

											<?php
											if ($data_unit !== null && isset($data_unit) && sizeof($data_unit) > 0) {
												foreach ($data_unit as $row) {
													if ($data_product["name_unit"] === $row["name_unit"])
														echo "<option selected value=" . $row["id_unit"] . ">" . $row["name_unit"] . "</option>";
													else
														echo "<option value=" . $row["id_unit"] . ">" . $row["name_unit"] . "</option>";
												}
											}
											?>

										</select>
										<span name="cat_autocheck" class="autocheck"></span>
										<div name="cat_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>
								<div class="formRow">
									<label class="formLeft">Mô tả:</label>
									<div class="formRight">
										<textarea name="content" id="param_content" rows="10" style="resize: none;"><?php echo $data_product["descript"] ?></textarea>
										<div name="content_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>
								<!-- warranty -->
								<div class="formRow hide"></div>
							</div>
						</div>
						<div class="formSubmit">
							<input type="submit" value="Cập nhật" class="redB" />
							<input type="reset" value="Hủy bỏ" class="basic" />
						</div>
						<div class="clear"></div>
					</div>
				</fieldset>
			</form>
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