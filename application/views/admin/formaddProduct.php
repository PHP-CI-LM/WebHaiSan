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

		<?php require("comp/topNav.php")?>

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
						<li><a href="product/add.html">
								<img src="<?php echo public_url() ?>/images/icons/control/16/add.png" />
								<span>Thêm mới</span>
							</a></li>
						<!-- 
						<li>
							<a href="product/?feature=1.html">
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
			<form class="form" id="form" action="<?php echo base_url() ?>ci-admin/add-product.html" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="widget">
						<div class="title">
							<img src="<?php echo public_url() ?>/images/icons/dark/add.png" class="titleIcon" />
							<?php
							// if ($state)
							// 	echo "<h6>Sửa Sản phẩm</h6>";
							// else 
							echo "<h6>Thêm Sản phẩm</h6>";
							?>
						</div>

						<ul class="tabs">
							<li><a href="#tab1">Thông tin chung</a></li>
						</ul>

						<div class="tab_container">
							<div id='tab1' class="tab_content pd0">
								<!-- Name -->
								<div class="formRow">
									<label class="formLeft" for="param_name">Tên:<span class="req">*</span></label>
									<div class="formRight">
										<span class="oneTwo"><input name="name" id="param_name" _autocheck="true" type="text" autocomplete="off" required /></span>
										<span name="name_autocheck" class="autocheck"></span>
										<div name="name_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>

								<!-- Origin -->
								<div class="formRow">
									<label class="formLeft" for="param_name">Nguồn gốc:<span class="req">*</span></label>
									<div class="formRight">
										<select name="origin" _autocheck="true" id='param_cat' class="left input-origin">
											<?php
											if ($data_origin !== null && isset($data_origin) && sizeof($data_origin) > 0)
												foreach ($data_origin as $row) {
													?>
												<option value="<?php echo $row["id"] ?>">
													<?php echo $row["name_origin"] ?> </option>
											<?php } ?>
											<option value="-1">-- Thêm nơi nhập --</option>
										</select>
										<span name="cat_autocheck" class="autocheck"></span>
										<div name="cat_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>

								<!-- Add new origin -->
								<div class="formRow hidden" id="add-origin">
									<label class="formLeft" for="param_cat">Thêm nơi nhập:<span class="req">*</span></label>
									<div class="formRight">
										<span class="oneTwo"><input name="new_origin" id="param_name" _autocheck="true" type="text" autocomplete="off" /></span>
										<span name="cat_autocheck" class="autocheck"></span>
										<div name="cat_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>

								<!-- Thumbnail -->
								<div class="formRow">
									<label class="formLeft" for="param_name">Link hình ảnh:<span class="req">*</span></label>
									<div class="formRight">
										<span class="oneTwo">
											<input name="img" id="param_name" _autocheck="true" type="file" accept="image/png, image/jpeg, image/webp" autocomplete="off" required />
										</span>
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
											<input name="price" style='width:100px' id="param_price" class="format_number" _autocheck="true" type="text" autocomplete="off" required />
											<img class='tipS' title='Giá bán sử dụng để giao dịch' style='margin-bottom:-8px' src='<?php echo public_url() ?>/crown/images/icons/notifications/information.png' />
										</span>
										<span name="price_autocheck" class="autocheck"></span>
										<div name="price_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>

								<!-- Promotion -->
								<div class="formRow">
									<label class="formLeft" for="param_discount">
										Giảm giá (%)
										<span></span>:
									</label>
									<div class="formRight">
										<span>
											<input name="discount" style='width:100px' id="param_discount" class="format_number" type="text" max="99" min="0" autocomplete="off" />
											<img class='tipS' title='Số tiền giảm giá' style='margin-bottom:-8px' src='<?php echo public_url() ?>/crown/images/icons/notifications/information.png' />
										</span>
										<span name="discount_autocheck" class="autocheck"></span>
										<div name="discount_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>
								
								<!-- Category -->
								<div class="formRow">
									<label class="formLeft" for="param_cat">Thể loại:<span class="req">*</span></label>
									<div class="formRight">
										<select name="cat" _autocheck="true" id='param_cat' class="left input-category" style="text-transform: capitalize;">
											<?php
											if ($data_category !== null && isset($data_category) && sizeof($data_category) > 0)
												foreach ($data_category as $row) {
													?>
												<option value="<?php echo $row["id_category"] ?>">
													<?php echo $row["name_category"] ?> </option>
											<?php } ?>
											<option value="-1">-- Thêm mới --</option>
										</select>
										<span name="cat_autocheck" class="autocheck"></span>
										<div name="cat_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>

								<!-- Add Category -->
								<div class="formRow hidden" id="add-category">
									<label class="formLeft" for="param_cat">Thêm loại mới:<span class="req">*</span></label>
									<div class="formRight">
										<span class="oneTwo"><input name="new_category" id="param_name" _autocheck="true" type="text" autocomplete="off"/></span>
										<span name="cat_autocheck" class="autocheck"></span>
										<div name="cat_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>

								<!-- Unit -->
								<div class="formRow">
									<label class="formLeft" for="param_cat">Đơn vị:<span class="req">*</span></label>
									<div class="formRight">
										<select name="unit" _autocheck="true" id='param_cat' class="left">
											<?php
											if ($data_unit !== null && isset($data_unit) && sizeof($data_unit) > 0)
												foreach ($data_unit as $row) {
													?>
												<option value="<?php echo $row["id_unit"] ?>">
													<?php echo $row["name_unit"] ?> </option>
											<?php } ?>
										</select>
										<span name="cat_autocheck" class="autocheck"></span>
										<div name="cat_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>

								<!-- Size -->
								<div class="formRow">
									<label class="formLeft" for="param_name">Kích thước:<span class="req">*</span></label>
									<div class="formRight">
										<span class="oneTwo"><input type="number" step="0.1" name="size" id="param_name" _autocheck="true" type="text" autocomplete="off" required style="width: 50px;" value="1.0"/></span>
										<span name="name_autocheck" class="autocheck"></span>
										<div name="name_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>
								
								<!-- Description -->
								<div class="formRow">
									<label class="formLeft">Mô tả:</label>
									<div class="formRight">
										<textarea name="content" id="param_content" rows="10" style="resize: none;"></textarea>
										<div name="content_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>
								<!-- warranty -->
								<div class="formRow hide"></div>
							</div>
						</div><!-- End tab_container-->
						<div class="formSubmit">
							<input type="submit" value="Thêm mới" class="redB" />
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

	<script>
		$(document).ready(function() {
			$('.input-origin').change(function() {
				var val = $(this).val();
				if (-1 == val) {
					// Show add category input
					$('#add-origin').removeClass('hidden');
					$('#add-origin input').prop('required', true);
					$('#add-origin input').val('');
				} else {
					// Hide add category input
					$('#add-origin').addClass('hidden');
					$('#add-origin input').prop('required', false);
				}
			});

			$('.input-category').change(function() {
				var val = $(this).val();
				if (-1 == val) {
					// Show add category input
					$('#add-category').removeClass('hidden');
					$('#add-category input').prop('required', true);
					$('#add-category input').val('');
				} else {
					// Hide add category input
					$('#add-category').addClass('hidden');
					$('#add-category input').prop('required', false);
				}
			});
		});
	</script>
</body>

</html>